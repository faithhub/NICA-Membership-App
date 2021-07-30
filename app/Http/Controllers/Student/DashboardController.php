<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'student', 'verified']);
    }

    public function index()
    {
        $data['title'] = 'My Dashboard';
        // $data['class'] = Classes::where('class_id', Auth::user()->class_id)->first();
        $data['student'] = $u = User::where('id', Auth::user()->id)->with('school:id,name')->with('dept:id,name')->with('sup:id,name')->first();
        // dd($u)->faculty;
        return view('student.dashboard.index', $data);
    }
}
