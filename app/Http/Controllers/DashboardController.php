<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Events;
use App\Models\Feedback;
use App\Models\Polls;
use App\Models\Threads;
use App\Models\Visitors;
use TeamTeaTime\Forum\Models\Category;
use TeamTeaTime\Forum\Models\Thread;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){   
     $data = ['users' => User::where('user_type' , 'Citizen')->count(),
             'threads' => Threads::count(),
            'feedbacks' => Feedback::count(),
             'polls' => Polls::where('status' , 'active')->count(),
             'visitors' => Visitors::count()
        ];
        return view('dashboard.home', $data);

    }
    public function feedbacks(){
        $data = ['feedbacks' => Feedback::all()
        ];
        return view('dashboard.feedbacks' , $data);
    }

}
