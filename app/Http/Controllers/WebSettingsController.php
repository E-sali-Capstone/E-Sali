<?php

namespace App\Http\Controllers;

use App\Models\WebSettingsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebSettingsController extends Controller
{
    //
    public function index(){
        $data = ['settings' => WebSettingsModel::where('settings_id' , 1)->first()];
        return view('dashboard.webSettings' ,$data);
    }
    public function saveSettings(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'email_address' => 'required|email',
            'about' => 'required',
        ]);
        if($validated){

                $saveSettings = WebSettingsModel::where('settings_id' , 1)->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'email_address' => $request->email_address,
                    'contact_number' => $request->contact_number,
                    'about' => $request->about,
                    'contact_number' => $request->contact_number,
                    'address' => $request->address,
                    'created_by' => Auth::id(),
                ]);
                $this->fileUpload($request);
                $this->fileUploadBg($request);
                return redirect()->route('sitesettings')->with('success' , 'Settings has been updated successfuly!');
        }
    }
    public function fileUpload(Request $request) 
    {
        $this->validate($request, [
            'fileUpload.*' => 'mimes:png,jpg,jpeg,gif',
            'fileUpload' => 'max:5120', //5MB 
        ]);
 
        $file = $request->file('fileUpload');
        if($file){

            $file->store('images', 'public');
            $saveLogo = WebSettingsModel::where('settings_id' , 1)->update([
                'logo' => $file->hashName(),
            ]);

         }else{
            return false;
        }

    }
    public function fileUploadBg(Request $request) 
    {
        $this->validate($request, [
            'fileUpload.*' => 'mimes:png,jpg,jpeg,gif',
            'fileUpload' => 'max:5120', //5MB 
        ]);
 
        $file = $request->file('fileUploadBg');
        if($file){

            $file->store('images', 'public');
            $saveLogo = WebSettingsModel::where('settings_id' , 1)->update([
                'landing_page_bg' => $file->hashName(),
            ]);

         }else{
            return false;
        }

    }
   
}
