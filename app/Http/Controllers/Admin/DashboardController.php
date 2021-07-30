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
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->create_sub = new Subscription();
    }

    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        $data['active'] = User::where(['role' => 'Member', 'status' => 'Active'])->where('member', '!=', 'None')->count();
        $data['inactive'] = User::where(['role' => 'Member', 'status' => 'Active'])->where('member', '=', 'None')->count();
        return view('admin.dashboard.index', $data);
    }


    public function profile(Request $request)
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
            $data['title'] = 'Admin Profile';
            $data['member'] = $u = User::find(Auth::user()->id);
            return view('admin.dashboard.profile', $data);
        }
    }

    public function subscription(Request $request)
    {
        if ($_POST) {
            if ($request->id) {
                $rules = array(
                    'update_name' => ['required', 'max:255', 'unique:subscriptions,name,' . $request->id],
                    'update_price' => ['required', 'numeric']
                );
                $fieldNames = array(
                    'update_name'   => 'Subscription Name',
                    'update_price'  => 'Annual Subscription Fee',
                );
                //dd($request->all());
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    Session::flash('warning', 'Please check the form again!');
                    return back()->withErrors($validator)->withInput();
                } else {
                    try {
                        $faculty = Subscription::find($request->id);
                        $faculty->name = $request->update_name;
                        $faculty->price = $request->update_price;
                        $faculty->save();
                        Session::flash('success', 'Subscription Updated Successfully');
                        return redirect('admin/subscription');
                    } catch (\Throwable $th) {
                        Session::flash('error', $th->getMessage());
                        return redirect('admin/subscription');
                    }
                }
            } else {
                $rules = array(
                    'name'  => ['required', 'max:255', 'unique:subscriptions'],
                    'price' => ['required', 'numeric']
                );
                $fieldNames = array(
                    'name'  => 'Subscription Name',
                    'price' => 'Annual Subscription Fee',
                );
                //dd($request->all());
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    Session::flash('warning', 'Please check the form again!');
                    return back()->withErrors($validator)->withInput();
                } else {
                    try {
                        $this->create_sub->create_new($request);
                        Session::flash('success', 'Subscription Added Successfully');
                        return redirect('admin/subscription');
                    } catch (\Throwable $th) {
                        Session::flash('error', $th->getMessage());
                        return \back();
                    }
                }
            }
        } else {
            $data['title'] = 'Membership Subscription Plans';
            $data['sn'] = 1;
            $data['subs'] = $u = Subscription::orderBy('id', 'ASC')->get();
            return view('admin.dashboard.subscription', $data);
        }
    }

    public function payments()
    {
        $data['title'] = 'Membership Subscription Payments';
        $data['sn'] = 1;
        return view('admin.dashboard.payment', $data);
    }

    public function delete_plan($id)
    {
        try {
            Subscription::find($id)->delete();
            Session::flash('success', 'Deleted Successfully');
            return redirect('admin/subscription');
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return redirect('admin/subscription');
        }
    }

    public function active_member()
    {
        $data['title'] = 'Active Members';
        $data['sn'] = 1;
        $data['members'] = User::where(['role' => 'Member', 'status' => 'Active'])->where('member', '!=', 'None')->orderBy('id', 'ASC')->get();
        return view('admin.dashboard.active_member', $data);
    }

    public function inactive_member()
    {
        $data['title'] = 'Inactive Members';
        $data['sn'] = 1;
        $data['members'] = User::where(['role' => 'Member', 'member' => 'None', 'status' => 'Active'])->orderBy('id', 'ASC')->get();
        return view('admin.dashboard.inactive_member', $data);
    }

    public function delete_member($id)
    {
        try {
            $user = User::find($id);
            $user->status = 'Deleted';
            $user->save();
            Session::flash('success', 'Deleted Successfully');
            return redirect('admin/subscription');
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return redirect('admin/subscription');
        }
    }


    public function view_member($id)
    {
        try {
            $data['member'] = $m = User::where(['role' => 'Member', 'status' => 'Active', 'id' => $id])->first();
            $data['title'] = $m->surname . ' ' . $m->other_name . ' Profile';
            return view('admin.dashboard.view_member', $data);
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return redirect('admin');
        }
    }

    public function edit_member($id)
    {
        try {
            $data['member'] = $m = User::where(['role' => 'Member', 'status' => 'Active', 'id' => $id])->first();
            $data['title'] = 'Edit ' . $m->surname . ' ' . $m->other_name;
            return view('admin.dashboard.edit_member', $data);
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return redirect('admin');
        }
    }
}
