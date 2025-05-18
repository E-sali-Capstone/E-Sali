<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reports;
use App\Models\ReportsUploadModel;
use Illuminate\Support\Facades\Crypt;

class ReportsController extends Controller
{
    //
    public function index(){

        $data = ['reports' => Reports::all()];
        return view('dashboard.reports' , $data);

    }
    public function newReport(){
        return view('dashboard.newReport');
    }
    public function editReport($report_id){
        $param = Crypt::decrypt($report_id);
        $data = ['report' => Reports::where('id' , $param)->first()
        ];
        return view('dashboard.editReport' , $data);
    }
    public function saveReport(Request $request){

        $validated = $request->validate([
            'type' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string'
        ]);
        if($validated){
            if (Reports::where('title', $request->title)->exists()) {
                return redirect()->back()->with('error' , 'Report title already exists!');
            } else {
                $saveReport = Reports::create([
                    'type' => $request->type,
                    'title' => $request->title,
                    'description' =>  $request->description,
                    'created_by' => Auth::id(),
                ]);
                if($saveReport){
                    $report_id = Reports::orderBy('id', 'desc')->take(1)->first();
                    $this->multipleUpload($request , $report_id->id);
                }
                return redirect()->route('reports')->with('success' , 'New report has been added successfuly!');
            }
        }
    }
    public function saveUpdatedReport(Request $request){
        $validated = $request->validate([
            'type' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string'
        ]);
        if($validated){
                $saveReport = Reports::where('id' , $request->reportId)->update([
                    'type' => $request->type,
                    'title' => $request->title,
                    'description' => $request->description,
                    'created_by' => Auth::id(),
                ]);
                if($saveReport){
                    $this->multipleUpload($request , $request->reportId);
                }
                return redirect()->back()->with('success' , 'Report has been updated successfuly!');
        }
    }
    public function multipleUpload(Request $request , $announcement_id) 
    {
        $this->validate($request, [
            'fileUploads' => 'max:5120', //5MB 
        ]);
 
        $files = $request->file('fileUploads');
        if($files){
        foreach($files as $file){
            $file->store('report_files', 'public');
            $uploadFile = ReportsUploadModel::create([
                'file_name' => $file->hashName(),
                'reports_id' => $announcement_id,
                'created_by' => Auth::id(),
            ]);
        } }else{
            return false;
        }  
    }
    public function deleteReport($report_id){
        $param = Crypt::decrypt($report_id);
        $deleted = Reports::where('id', $param)->delete();
        if($deleted){
            return redirect()->route('reports')->with('success' , 'Report has been removed!');
        }else{
            
        }
    }
    public function deleteFile($file_id , $file_name){
        $deleted = ReportsUploadModel::where('file_id', $file_id)->delete();
        if($deleted){
            $file_path = public_path().'/report_files/'.$file_name;
            unlink($file_path);
            return redirect()->back()->with('success' , 'File has been removed!');
        }else{
            
        }
    }
}
