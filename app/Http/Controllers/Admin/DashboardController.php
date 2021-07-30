<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Department;
use App\Models\Faculties;
use App\Models\Schools;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        $data['student'] = User::where('role', 'Student')->count();
        $data['admin'] = User::where('role', 'Admin')->count();
        $data['supervisor'] = User::where('role', 'Supervisor')->count();
        $data['school'] = Schools::count();
        $data['dept'] = Department::count();
        return view('admin.dashboard.index', $data);
    }
}
