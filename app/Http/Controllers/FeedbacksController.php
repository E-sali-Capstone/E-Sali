<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Ahmedash95\Sentimento\Facade\Sentimento;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Sentiment\Analyzer;

class FeedbacksController extends Controller
{
    //
    public function submitFeedback(Request $request){
        
                $saveFeedback = Feedback::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'office' => $request->office,
                        'subject' => $request->subject,
                        'feedback' => $request->feedback,
                        'star_rating' => $request->starRating
                ]);
            return redirect()->route('landing-page' , '#feedback')->with('success' , 'Your feedback has been submitted. Thankyou!');
    }
}
