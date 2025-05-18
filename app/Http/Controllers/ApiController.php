<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use TeamTeaTime\Forum\Models\Post;
use App\Models\PollChoicesModel;
use App\Models\PollResponsesModel;
use Illuminate\Http\Request;
use App\Models\User;
use TeamTeaTime\Forum\Models\Thread;

class ApiController extends Controller
{
    //
    public function getInsights(Request $request){

        $responses = PollResponsesModel::where('poll_responses.question_id' , $request->question_id)
        ->select('poll_choices.choice as choice' , PollResponsesModel::raw('count(*) as responses'))
        ->join('poll_choices' , 'poll_choices.choice_id' , '=' , 'poll_responses.choice_id')
        ->groupBy('poll_choices.choice_id')
        ->get();
        return response()->json($responses);

    }
}
