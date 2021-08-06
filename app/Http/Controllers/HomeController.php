<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        if ($_POST) {
            //dd($request->all());
            $data['results'] = $r = User::where(['role' => 'Member', 'status' => 'Active'])->where('member', '!=', 'None')
                ->orWhere('surname', 'LIKE', '%' . $request->surname . '%')
                ->orWhere('other_name', 'LIKE', '%' . $request->other_name . '%')
                ->orWhere('zone', 'LIKE', '%' . $request->zone . '%')
                ->orWhere('area_specs', 'LIKE', '%' . $request->spec . '%')
                ->get();
            $data['title'] = 'NIGERIAN CORROSION ASSOCIATION, Search Member';
            $data['sn'] = 1;
            // dd($r);
            return view('index', $data);
        } else {
            $data['title'] = 'NIGERIAN CORROSION ASSOCIATION, Search Member';
            return view('index', $data);
        }
    }
}
