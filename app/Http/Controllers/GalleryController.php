<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryUploadModel;
use App\Models\ProgramsCoursesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class GalleryController extends Controller
{
    //
    public function index(){
        $data = ['gallery' => Gallery::
        where('status' , 'Active')
        ->get()];
        return view('dashboard.gallery'  , $data);
    }
    public function newGallery(){
        return view('dashboard.newGallery');
    }
    public function editGallery($gallery_id){
        $param = Crypt::decrypt($gallery_id);
        $data = ['gall' => Gallery::where('id' , $param)->first()
        ];
        return view('dashboard.editGallery' , $data);
    }
    public function saveGallery(Request $request){

        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string'
        ]);
        if($validated){
            if (Gallery::where('title', $request->title)->exists()) {
                return redirect()->back()->with('error' , 'Gallery already exists!');
            } else {

                $saveGallery = Gallery::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'created_by' => Auth::id(),
                ]);
                
                if($saveGallery){
                    $gallery_id = Gallery::orderBy('id', 'desc')->take(1)->first();
                    $this->multipleUpload($request , $gallery_id->id);
                }
                return redirect()->route('gallery')->with('success' , 'New gallery has been added successfuly!');

            }
        }
    }
    public function saveUpdatedGallery(Request $request){
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string'
        ]);
        if($validated){
                $update = Gallery::where('id' , $request->galleryId)->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'status' => $request->status,
                    'created_by' => Auth::id(),
                ]);
                if($update){
                    $this->multipleUpload($request , $request->galleryId);
                }
                return redirect()->back()->with('success' , 'Gallery has been updated successfuly!');
        }
    }
    public function multipleUpload(Request $request , $gallery_id) 
    {
        $this->validate($request, [
            'fileUploads.*' => 'mimes:png,jpg,jpeg,gif',
            'fileUploads' => 'max:5120', //5MB 
        ]);
 
        $files = $request->file('fileUploads');
        if($files){
        foreach($files as $file){
            $file->store('gallery_images', 'public');
            $uploadPhoto = GalleryUploadModel::create([
                'file_name' => $file->hashName(),
                'gallery_id' => $gallery_id,
                'created_by' => Auth::id(),
            ]);
        } }else{
            return false;
        }  
    }
    public function deleteImage($image_id , $file_name){
        $deleted = GalleryUploadModel::where('image_id', $image_id)->delete();
        if($deleted){
            $file_path = public_path().'/gallery_images/'.$file_name;
            unlink($file_path);
            return redirect()->back()->with('success' , 'Image has been removed!');
        }else{
            
        }
    }
}
