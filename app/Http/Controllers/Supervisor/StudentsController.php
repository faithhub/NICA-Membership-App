<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\Days;
use App\Models\User;
use App\Models\Weeks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('supervisor');
    }

    public function index()
    {
        $data['title'] = 'My Siwes Students';
        $data['sn'] = 1;
        $data['students'] = $u = User::where(['role' => 'Student', 'supervisor_id' => Auth::user()->id])->with('school:id,name')->with('dept:id,name')->orderBy('name', 'ASC')->get();
        return view('supervisor.student.index', $data);
    }

    public function view($id)
    {
        $data['title'] = 'Siwes Students';
        $data['student'] = $u = User::where(['role' => 'Student', 'id' => $id])->with('school:id,name')->with('dept:id,name')->first();
        $data['weeks'] = Weeks::orderBy('id', 'ASC')->get();
        // $data['days'] = Days::orderBy('id', 'ASC')->get();
        $data['days'] = $d = Days::orderBy('id', 'ASC')->with(['log' => function ($query) use ($id) {
            $query->where('user_id', $id);
        }])->get();
        $data['dayss'] = $dayss = Weeks::orderBy('id', 'ASC')->with(['log' => function ($query) use ($id) {
            $query->where('user_id', $id);
        }])->get();
        //dd($dayss);
        return view('supervisor.student.view', $data);
    }
}
