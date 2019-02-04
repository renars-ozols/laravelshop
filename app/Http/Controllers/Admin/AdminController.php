<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    public function index()
    {
        return view('admin.dashboard');
    }

    public function settings()
    {
        toastr()->info('Functionality not created yet!', null, ['timeOut' => 4000]);
        return redirect()->back();
    }

}
