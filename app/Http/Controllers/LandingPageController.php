<?php
namespace App\Http\Controllers;
use App\Models\Announcements;
use App\Models\FaqModel;
use App\Models\Feedback;
use App\Models\Gallery;
use App\Models\GalleryUploadModel;
use App\Models\PollQuestionModel;
use App\Models\Reports;
use App\Models\Threads;
use App\Models\Visitors;
use App\Models\WebSettingsModel;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class LandingPageController extends Controller
{
    //
    public function index(Request $request){
        
    $ip = $request->ip();
    $visitor = Visitors::firstOrCreate(['ip_address' => $ip]);
    $visitor->increment('visits');
    $visitor->save();


        $date_now  =  date('Y-m-d h:i:s');
        $data = ['web' => WebSettingsModel::where('settings_id' , 1)->first(),
                 'gallery' => Gallery::all(),
                 'feedbacks' => Feedback::all(),
                 'threads' => Threads::
                 select('forum_categories.title as cat_title' , 'forum_threads.title as thread_title' , 'users.name as author_name' , 'forum_threads.created_at as created_at' , 'users.profile_photo as photo')
                 ->orderBy('forum_threads.created_at' , 'desc')
                 ->join('forum_categories' , 'forum_categories.id' , '=' , 'forum_threads.category_id')
                 ->join('users', 'users.id', '=', 'forum_threads.author_id')
                 ->get(),
                 'gallery_photos' => GalleryUploadModel::all(),
                 'faqs' => FaqModel::all()
        ];
        return view('home' , $data);
    }
    public function announcements(){

        $date_now  =  date('Y-m-d h:i:s');
        $data = ['announcements' => Announcements::
        where('announcement_status' , 'Active')
        ->select('announcements.id as annId' , 'announcements.*')
        ->whereDate('announcements.valid_from'  , '<=' , $date_now)
        ->WhereDate('announcements.valid_to'  , '>=' , $date_now)
        ->join('users', 'users.id', '=', 'announcements.created_by')
        ->paginate(3)
        ];
        return view('announcements' , $data);

    }
    public function viewAnnouncement($id){

        $data = ['ann' => Announcements::
        where('announcements.id' , $id)
        ->join('users', 'users.id', '=', 'announcements.created_by')
        ->first()
        ];
        return view('announcement-detail' , $data);
    }

    public function fileUpload(Request $request) 
    {
        $this->validate($request, [
            'fileUpload.*' => 'mimes:png,jpg,jpeg,gif',
            'fileUpload' => 'max:5120', //5MB 
        ]);
 
        $file = $request->file('fileUpload');
        if($file){
            $file->store('attendance_images', 'public');
            return $file->hashName();
         }else{
            return false;
        }
    }
    public function polls(){
        $date_now  =  date('Y-m-d h:i:s');
        $data = ['polls' => PollQuestionModel::where('status' , 'Active')
        ->whereDate('valid_from'  , '<=' , $date_now)
        ->WhereDate('valid_to'  , '>=' , $date_now)
        ->orderBy('question_id')
        ->paginate(4)];
        return view('polls' , $data);

    }

    public function gallery($program_id) {

        if( isset($_GET['albumId'])) {
            $data = ['gall' => GalleryUploadModel::where('gallery.status' , 'Active' )
            ->where('gallery.program_id' , $program_id)
            ->where('gallery.id' , $_GET['albumId'])
            ->join('gallery' , 'gallery.id' , '=' , 'gallery_images.gallery_id')
            ->paginate(9),
            'album' => Gallery::where('program_id' , $program_id)->get(),
            'program_id' => $program_id
            ];
        }else{

            $data = ['gall' => GalleryUploadModel::where('gallery.status' , 'Active' )
            ->where('gallery.program_id' , $program_id)
            ->join('gallery' , 'gallery.id' , '=' , 'gallery_images.gallery_id')
            ->paginate(9),
            'album' => Gallery::where('program_id' , $program_id)->get(),
            'program_id' => $program_id
            ];

        }
        return view('gallery' , $data);
    }
    public function reports($type){

        $newType = str_replace('%20' , ' ' , $type);
        $data = ['reports' => Reports::where('type' , $newType)
        ->paginate(9)];
        return view('reports' , $data);

    }
    public function feedback(){

        return view('feedback');

    }

 
   public function python(){

      $process = new Process(['python']);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        echo $process->getOutput();
    }
}
