<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('supervisor');
    }

    public function index()
    {
        $data['title'] = 'My Dashboard';
        $data['supervisor'] = $u = User::where('id', Auth::user()->id)->with('school:id,name')->with('dept:id,name')->first();
        return view('supervisor.dashboard.index', $data);
    }
}
