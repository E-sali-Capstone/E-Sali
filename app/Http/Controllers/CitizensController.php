<?php

namespace App\Http\Controllers;
use App\Models\User;

class CitizensController extends Controller
{
    //
    public function index(){
        $data = ['citizens' => User::
        where('user_type' , 'Citizen')
        ->get()];
        return view('dashboard.citizens' , $data);
    }
}
