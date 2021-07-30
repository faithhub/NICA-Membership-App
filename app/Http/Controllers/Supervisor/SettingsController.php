<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('supervisor');
    }

    public function index(Request $request)
    {
        if ($_POST) {
            $rules = array(
                'email' => ['required', 'email', 'max:255', 'unique:users,email,' . Auth::user()->id],
                'name' => ['required', 'max:255'],
                'phone_number' => ['max:255'],
                'avatar' => 'image|mimes:jpg,jpeg,png|max:5000',
            );
            $fieldNames = array(
                'email' => 'Email',
                'name'     => 'Name',
                'phone_number'   => 'Mobile Number',
                'avatar'   => 'Profile Picture',
            );
            //dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);
            if ($validator->fails()) {
                Session::flash('warning', 'Please check the form again!');
                return back()->withErrors($validator)->withInput();
            } else {
                //dd($request->all());
                if ($request->file('avatar')) {
                    $file = $request->file('avatar');
                    $picture = 'SPP' . date('dMY') . time() . '.' . $file->getClientOriginalExtension();
                    $pictureDestination = 'uploads/student_avatar';
                    $file->move($pictureDestination, $picture);
                }
                $user = User::find(Auth::user()->id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone_number = $request->phone_number;
                $user->avatar = $request->hasFile('avatar') ? $picture : $user->avatar;
                $user->save();
                Session::flash('success', 'Profile Updated Successfully');
                return \back();
            }
        } else {
            $data['title'] = 'My Profile';
            return view('supervisor.settings.profile', $data);
        }
    }
}
