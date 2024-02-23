<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index() {
        $applications = JobApplication::orderBy('created_at','DESC')    
                            ->with('job','user','employer')
                            ->paginate(10);
        return view('admin.job-applications.list',[
            'applications' => $applications
        ]);
    }
}
