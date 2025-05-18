<?php

namespace App\Http\Controllers;

use App\Models\FaqModel;
use App\Models\Feedback;
use App\Models\Gallery;
use App\Models\GalleryUploadModel;
use App\Models\Threads;
use App\Models\WebSettingsModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = ['web' => WebSettingsModel::where('settings_id' , 1)->first(),
                 'gallery' => Gallery::all(),
                 'gallery_photos' => GalleryUploadModel::all(),
                'threads' => Threads::
                 select('forum_categories.title as cat_title' , 'forum_threads.title as thread_title' , 'users.name as author_name')
                 ->orderBy('forum_threads.created_at' , 'desc')
                 ->join('forum_categories' , 'forum_categories.id' , '=' , 'forum_threads.category_id')
                 ->get(),
                 'feedbacks' => Feedback::all(),
                 'faqs' => FaqModel::all()
        ];
        return view('home' , $data);
    }


}
