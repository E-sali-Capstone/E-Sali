<?php

namespace App\Http\Controllers;

use App\Models\PollChoicesModel;
use App\Models\PollQuestionModel;
use App\Models\PollResponsesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PollController extends Controller
{
    //
    public function index(){

        if(Auth::user()->user_type ==  "Admin"){
            $data = ['polls' => PollQuestionModel::all()->sortByDesc('question_id')];
        }else{

            $date_now  =  date('Y-m-d h:i:s');
            $data = ['polls' => PollQuestionModel::
            whereDate('valid_from'  , '<=' , $date_now)
            ->WhereDate('valid_to'  , '>=' , $date_now)
            ->get()->sortByDesc('question_id')];
            
        }

        return view('dashboard.polls' , $data);
    }
    public function newPoll(){
        return view('dashboard.newPoll');
    }
    public function viewPoll($question_id){

        $param = Crypt::decrypt($question_id);
        // $studentResponse = PollResponsesModel::where('question_id' , $param)
        // ->count();

        // echo json_encode($studentResponse);
        $data = ['poll' => PollQuestionModel::where('question_id' , $param)->first()];
        return view('dashboard.viewPoll' , $data);

    }
    public function viewAllResponses($question_id){

        $param = Crypt::decrypt($question_id);
            $data = ['poll_responses' => PollResponsesModel::where('poll_responses.question_id' , $param)
            ->select('users.name as citizen_name' , 'poll_choices.choice as choice' , 'poll_responses.created_at as response_date')
            ->join('users' , 'users.id' , '=' , 'poll_responses.created_by')    
            ->join('poll_choices' , 'poll_choices.choice_id' , '=' , 'poll_responses.choice_id')
            ->join('poll_questions' , 'poll_questions.question_id' , '=' , 'poll_responses.question_id')    
            ->get()];
        
    
        return view('dashboard.viewPollResponses' , $data);

    }
    public function savePoll(Request $request){
        $validated = $request->validate([
            'question' => 'required|string',
            'pollTitle' => 'required',
            'validFrom' => 'required|date',
            'validTo' => 'required|date',
        ]);
        if($validated){
            if (PollQuestionModel::where('question', $request->question)->exists()) {
                return redirect()->back()->with('error' , 'Poll question already exists!');
            } else {

                $savePoll = PollQuestionModel::create([
                    'question' => $request->question,
                    'poll_title' => $request->pollTitle,
                    'valid_from' =>  $request->validFrom,
                    'valid_to' =>  $request->validTo,
                    'created_by' => Auth::id(),
                ]);
                if($savePoll){
                    $q_id = PollQuestionModel::orderBy('question_id', 'desc')->take(1)->first();
                    foreach ($request->choices as $ch) {
                        $savePollChoices = PollChoicesModel::create([
                            'question_id' => $q_id->question_id,
                            'choice' => $ch,
                            'responses' => 0,
                            'created_by' => Auth::id(),
                        ]);
                    }
                }
                return redirect()->route('polls')->with('success' , 'New poll has been added successfuly!');
            }
        }
    }
    public function saveUpdatedPoll(Request $request){
        $validated = $request->validate([
            'question' => 'required|string',
            'validFrom' => 'required|date',
            'validTo' => 'required|date',
        ]);
        if($validated){

                if($request->responded == 0){

                    if($request->pollTitle != ""){
                        $updatePoll = PollQuestionModel::where('question_id' , $request->questionId)->update([
                            'question' => $request->question,
                            'poll_title' => $request->pollTitle,
                            'valid_from' =>  $request->validFrom,
                            'status' =>  $request->status,
                            'valid_to' =>  $request->validTo,
                            'created_by' => Auth::id(),
                        ]);
                    }else{
                        $updatePoll = PollQuestionModel::where('question_id' , $request->questionId)->update([
                            'question' => $request->question,
                            'valid_from' =>  $request->validFrom,
                            'status' =>  $request->status,
                            'valid_to' =>  $request->validTo,
                            'created_by' => Auth::id(),
                        ]);
                    }

                   

                    if($updatePoll){
    
                        $deletedOldQuestion = PollChoicesModel::where('question_id', $request->questionId)->delete();
    
                        foreach ($request->choices as $ch) {
                            $updatePollChoices = PollChoicesModel::create([
                                'question_id' => $request->questionId,
                                'choice' => $ch,
                                'responses' => 0,
                                'created_by' => Auth::id(),
                            ]);
    
                        }
    
                    }
                }else{
                    $updatePoll = PollQuestionModel::where('question_id' , $request->questionId)->update([
                        'status' =>  $request->status
                    ]);
                }
            
                return redirect()->back()->with('success' , 'Poll has been updated successfuly!');

        }
    }

    public function submitPollAnswer(Request $request){

        $responded = PollResponsesModel::where('created_by' , Auth::user()->id)->where('question_id' , $request->questionId)->first();
        if($responded){
                $updateResponses = PollResponsesModel::where('created_by' , Auth::user()->id)->where('question_id' , $request->questionId)
                ->update(['choice_id' => $request->choice  , 'count' => \DB::raw('count + 1')]);
        }else{
                $saveResponses = PollResponsesModel::create([
                    'question_id' => $request->questionId,
                    'choice_id' => $request->choice,
                    'created_by' => Auth::id(),
                ]);
        }

        // $updatePollResponses = PollChoicesModel::where('choice_id' , $request->choice)->increment('responses' , 1);
        // if($updatePollResponses){
            return redirect()->back()->with('success' , 'Your poll response has been submitted. Thankyou for your participation.');
        // }
    }
      public function deletePoll($poll_id){
        $deleted = PollQuestionModel::where('question_id', $poll_id)->delete();
        if($deleted){
            return redirect()->route('polls')->with('success' , 'Poll has been removed!');
        }else{
            
        }
    }

}
