<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AccountSettingsController extends Controller
{
    //
    public function index(){
        $data = ['account' => User::where('id' ,  Auth::id())->first()];
        return view('dashboard.accountSettings' ,$data);
    }

    public function updateAccount(Request $request){
        $validated = $request->validate([
            'name' => 'required'
        ]);
        if($validated){
                if($request->password != ""){
                    $saveSettings = User::where('id' , Auth::id())->update([
                        'name' => $request->name,
                        'password' => Hash::make($request->password)
                    ]);

                }else{
                    $saveSettings = User::where('id' , Auth::id())->update([
                        'name' => $request->name
                    ]);
                }
               
                $this->fileUpload($request);
                return redirect()->route('accountsettings')->with('success' , 'Account has been updated successfuly!');
        }
    }
    public function updateCitizenAccount(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'contactNumber' => 'required',
        ]);
        if($validated){
                if($request->password != ""){
                    $saveSettings = User::where('id' , Auth::id())->update([
                        'name' => $request->name,
                        'contact_number' => $request->contactNumber,
                        'password' => Hash::make($request->password)
                    ]);

                }else{
                    $saveSettings = User::where('id' , Auth::id())->update([
                        'name' => $request->name,
                        'contact_number' => $request->contactNumber,
                     ]);
                }
               
                $this->fileUpload($request);
                return redirect()->route('accountsettings')->with('success' , 'Account has been updated successfuly!');
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
            $file->store('users-avatar', 'public');
            $savePhoto = User::where('id' ,  Auth::id())->update([
                'profile_photo' => $file->hashName(),
            ]);
         }else{
            return false;
        }
    }
}
