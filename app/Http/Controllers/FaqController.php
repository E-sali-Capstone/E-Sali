<?php

namespace App\Http\Controllers;

use App\Models\FaqModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;


class FaqController extends Controller
{
    //
    public function index(){
        $data = ['faqs' => FaqModel::all()];
        return view('dashboard.faqs', $data);
    }
    public function newFaq(){
        return view('dashboard.newFaq');
    }
    public function editFaq($faq_id){
        $param = Crypt::decrypt($faq_id);
        $data = ['faq' => FaqModel::where('faq_id' , $param)->first()];
        return view('dashboard.editFaq' , $data);
    }
    public function saveFaq(Request $request){
        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string'
        ]);
        if($validated){
            if (FaqModel::where('question', $request->question)->exists()) {
                return redirect()->back()->with('error' , 'FAQ question already exists!');
            } else {
                $saveFaq = FaqModel::create([
                    'question' => $request->question,
                    'answer' => $request->answer,
                    'created_by' => Auth::id(),
                ]);
                return redirect()->route('faqs')->with('success' , 'New Faq has been added successfuly!');
            }
        }
    }
    public function saveUpdatedFaq(Request $request){
        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string'
        ]);
        if($validated){
                $updateFaq = FaqModel::where('faq_id' , $request->faqId)->update([
                    'question' => $request->question,
                    'answer' => $request->answer,
                    'created_by' => Auth::id(),
                ]);
                return redirect()->back()->with('success' , 'Faq has been updated successfuly!');
            
        }
    }
    public function deleteFaq($faq_id){
        $deleted = FaqModel::where('faq_id', $faq_id)->delete();
        if($deleted){
            return redirect()->route('faqs')->with('success' , 'Faq has been removed!');
        }else{
            
        }
    }
}
