<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AnnouncementsUploadModel;
use App\Models\ProgramsCoursesModel;
use Illuminate\Support\Facades\Crypt;

class AnnouncementsController extends Controller
{
    //
    public function index(){

        $data = ['announcements' => Announcements::where('announcement_status' , 'Active')->get()];
        return view('dashboard.announcements' , $data);

    }
    public function newAnnouncement(){
        return view('dashboard.newAnnouncement');
    }
    public function editAnnouncement($announcement_id){
        $param = Crypt::decrypt($announcement_id);
        $data = ['announcement' => Announcements::where('id' , $param)->first()];
        return view('dashboard.editAnnouncement' , $data);
    }
    public function saveUpdatedAnnouncement(Request $request){

        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'validFrom' => 'required|date',
            'validTo' => 'required|date'
        ]);
        if($validated){

                if($request->category != ""){
                    $updateAnnouncement = Announcements::where('id' , $request->announcementId)->update([
                        'category' => $request->category,
                        'title' => $request->title,
                        'content' => $request->content,
                        'valid_from' => $request->validFrom,
                        'valid_to' => $request->validTo,
                        'announcement_status' => $request->status,
                        'created_by' => Auth::id(),
                    ]);
                }else{
                    $updateAnnouncement = Announcements::where('id' , $request->announcementId)->update([
                        'title' => $request->title,
                        'content' => $request->content,
                        'valid_from' => $request->validFrom,
                        'valid_to' => $request->validTo,
                        'announcement_status' => $request->status,
                        'created_by' => Auth::id(),
                    ]);
                }
               
                if($updateAnnouncement){
                    $this->multipleUpload($request , $request->announcementId);
                }
                return redirect()->back()->with('success' , 'Announcement has been updated successfuly!');
            
        }
    }
    public function saveAnnouncement(Request $request){
        $validated = $request->validate([
            'category' => 'required|string',
            'title' => 'required|string',
            'content' => 'required|string',
            'validFrom' => 'required|date',
            'validTo' => 'required|date'
        ]);
        if($validated){
            if (Announcements::where('title', $request->title)->exists()) {
                return redirect()->back()->with('error' , 'Announcement already exists!');
            } else {
                $saveAnnouncement = Announcements::create([
                    'category' => $request->category,
                    'title' => $request->title,
                    'content' => $request->content,
                    'valid_from' => $request->validFrom,
                    'valid_to' => $request->validTo,
                    'announcement_status' => "Active",
                    'created_by' => Auth::id(),
                ]);
                if($saveAnnouncement){
                    $announcement_id = Announcements::orderBy('id', 'desc')->take(1)->first();
                    $this->multipleUpload($request , $announcement_id->id);
                }
                return redirect()->route('announcements')->with('success' , 'New announcement has been added successfuly!');
            }
        }
    }

    public function multipleUpload(Request $request , $announcement_id) 
    {
        $this->validate($request, [
            'fileUploads.*' => 'mimes:png,jpg,jpeg,gif',
            'fileUploads' => 'max:5120', //5MB 
        ]);
 
        $files = $request->file('fileUploads');
        if($files){
        foreach($files as $file){
            $file->store('images', 'public');
            $uploadPhoto = AnnouncementsUploadModel::create([
                'file_name' => $file->hashName(),
                'announcements_id' => $announcement_id,
                'created_by' => Auth::id(),
            ]);
        }  }else{
            return false;
        }

    }
    public function deleteAnnouncement($announcement_id){
        $param = Crypt::decrypt($announcement_id);
        $deleted = Announcements::where('id', $param)->delete();
        if($deleted){
            return redirect()->route('announcements')->with('success' , 'Announcement has been removed!');
        }else{
            
        }
    }
    public function deleteImage($image_id , $file_name){
        $deleted = AnnouncementsUploadModel::where('image_id', $image_id)->delete();
        if($deleted){
            $file_path = public_path().'/images/'.$file_name;
            unlink($file_path);
            return redirect()->back()->with('success' , 'Image has been removed!');
        }else{
            
        }
    }
}
