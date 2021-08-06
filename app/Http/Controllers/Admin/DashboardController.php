<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Department;
use App\Models\Faculties;
use App\Models\Payment;
use App\Models\Resource;
use App\Models\Schools;
use App\Models\Settings;
use App\Models\Subject;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $this->create_res = new Resource();
    }

    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        $data['active'] = User::where(['role' => 'Member', 'status' => 'Active'])->where('member', '!=', 'None')->count();
        $data['inactive'] = User::where(['role' => 'Member', 'status' => 'Active'])->where('member', '=', 'None')->count();
        $data['resource'] = Resource::count();
        return view('admin.dashboard.index', $data);
    }


    public function profile(Request $request)
    {

        if ($_POST) {
            $rules = array(
                'email' => ['required', 'email', 'max:255', 'unique:users,email,' . Auth::user()->id],
                'phone_number' => ['required', 'numeric', 'unique:users,phone_number,' . Auth::user()->id],
                'surname' => ['required', 'max:255'],
                'other_name' => ['required', 'max:255'],
                'avatar' => 'max:5000',
                // 'dob' => ['required'],
                // 'sex' => ['required'],
                // 'marital_status' => ['required'],
                // 'country' => ['required'],
                // 'address' => ['required', 'max:255'],
                // 'zone' => ['required', 'max:255'],
                // 'sec_sch' => ['required', 'max:255'],
                // 'uni_sch' => ['required', 'max:255'],
                // 'prof_qualification' => ['required', 'max:255'],
                // 'present_org' => ['required', 'max:255'],
                // 'present_appointment' => ['required', 'max:255'],
                // 'area_specs' => ['required', 'max:255'],
                // 'other_info' => ['max:255'],
                // 'referees' => ['required'],
                // 'terms' => ['required'],
            );
            $fieldNames = array(
                'email' => 'Email Address',
                'surname'     => 'Surname',
                'other_name'     => 'Other Name',
                'phone_number'   => 'Phone Number',
                'avatar'   => 'Profile Picture',
                // 'dob'     => 'Date of Birth',
                // 'sex'     => 'Sex',
                // 'marital_status' => 'Marital Status',
                // 'country'  => 'Nationality',
                // 'address'  => 'Contact Address',
                // 'zone'     => 'Chapter & Zone To Which You Belong',
                // 'sec_sch'  => 'Secondary',
                // 'uni_sch'  => 'University',
                // 'prof_qualification'  => 'Professional Qualification',
                // 'present_org'  => 'Present Institution/Organisation',
                // 'present_appointment'  => 'Present Appointment',
                // 'area_specs'  => 'Area(S) Of Specialisation',
                // 'other_info'  => 'Any Other Information You Think Will Help The Council In Considering Your Application',
                // 'referees'  => 'Referees Details',
                // 'terms' => 'Declaration',
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
                    $picture = 'PP' . date('dMY') . time() . '.' . $file->getClientOriginalExtension();
                    $pictureDestination = 'uploads/member_avatar';
                    $file->move($pictureDestination, $picture);
                }
                try {
                    $user = User::find(Auth::user()->id);
                    $user->surname = $request->surname;
                    $user->other_name = $request->other_name;
                    $user->email = $request->email;
                    $user->phone_number = $request->phone_number;
                    $user->avatar = $request->hasFile('avatar') ? $picture : $user->avatar;
                    // $user->dob = $request->dob;
                    // $user->sex = $request->sex;
                    // $user->marital_status = $request->marital_status;
                    // $user->country = $request->country;
                    // $user->address = $request->address;
                    // $user->zone = $request->zone;
                    // $user->sec_sch = $request->sec_sch;
                    // $user->uni_sch = $request->uni_sch;
                    // $user->prof_qualification = $request->prof_qualification;
                    // $user->present_org = $request->present_org;
                    // $user->present_appointment = $request->present_appointment;
                    // $user->area_specs = $request->area_specs;
                    // $user->other_info = $request->other_info;
                    // $user->referees = $request->referees;
                    $user->acc_status = 'Updated';
                    $user->save();
                    Session::flash('success', 'Profile Updated Successfully');
                    return \back();
                } catch (\Throwable $th) {
                    Session::flash('error', $th->getMessage());
                    return \back();
                    //throw $th;
                }
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
        $data['payments'] = Payment::orderBy('id', 'ASC')->with('user:id,surname,other_name')->with('plan:id,name,price')->get();
        return view('admin.dashboard.payment', $data);
    }

    public function approve_subscribe($id){
        try {
            $payment = Payment::find($id);
            $payment->status = 'Approved';

            $user = User::find($payment->user_id);
            $user->member = $payment->plan_id;
            $user->member_expire = Carbon::now()->addYear();
            $user->save();

            $payment->save();
            Session::flash('success', 'Approved Successfully');
            return back();
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return back();
        }
    }

    public function decline_subscribe($id){
        try {
            $payment = Payment::find($id);
            $payment->status = 'Declined';
            $payment->save();
            Session::flash('success', 'Declined Successfully');
            return back();
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return back();
        }
    }

    public function add_payment(Request $request)
    {
        if ($_POST) {
            $rules = array(
                'bank' => ['required', 'max:255'],
                'acc_number' => ['required', 'numeric'],
                'acc_name' => ['required', 'max:255'],
            );
            $fieldNames = array(
                'bank'   => 'Bank Name',
                'acc_number'  => 'Account Number',
                'acc_name'  => 'Account Name'
            );
            //dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);
            if ($validator->fails()) {
                Session::flash('warning', 'Please check the form again!');
                return back()->withErrors($validator)->withInput();
            } else {
                try {
                    $settings = Settings::find(1);
                    $settings->bank = $request->bank;
                    $settings->acc_number = $request->acc_number;
                    $settings->acc_name = $request->acc_name;
                    $settings->save();
                    Session::flash('success', 'Account Details Updated Successfully');
                    return redirect('admin/update-payment-account');
                } catch (\Throwable $th) {
                    Session::flash('error', $th->getMessage());
                    return redirect('admin/update-payment-account');
                }
            }
        } else {
            $data['title'] = 'Update Subscription Payments Account Details';
            $data['settings'] = Settings::find(1);
            return view('admin.dashboard.account_details', $data);
        }
    }

    public function resources()
    {
        $data['title'] = 'All Resources';
        $data['sn'] = 1;
        $data['resources'] = Resource::orderBy('id', 'ASC')->get();
        return view('admin.dashboard.all_resources', $data);
    }

    public function edit_resource($id)
    {
        $data['title'] = 'Edit Resources';
        $data['resource'] = Resource::find($id);
        return view('admin.dashboard.add-resources', $data);
    }

    public function add_resource(Request $request)
    {
        if ($_POST) {
            if ($request->id) {
                $rules = array(
                    'title' => ['required', 'max:255'],
                    'content' => ['required'],
                );
                $fieldNames = array(
                    'title'   => 'Resource Title',
                    'content'  => 'Resource Content',
                    'file'  => 'Resource File'
                );
                //dd($request->all());
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    Session::flash('warning', 'Please check the form again!');
                    return back()->withErrors($validator)->withInput();
                } else {
                    try {
                        if ($request->file('file')) {
                            $file = $request->file('file');
                            $picture = 'RF' . date('dMY') . time() . '.' . $file->getClientOriginalExtension();
                            $pictureDestination = 'uploads/resources_file';
                            $file->move($pictureDestination, $picture);
                        }
                        $get = Resource::find($request->id);
                        $get->title = $request->title;
                        $get->content = $request->content;
                        $get->file = $request->hasFile('file') ? $picture : $get->file;
                        $get->save();
                        Session::flash('success', 'Updated Successfully');
                        return redirect('admin/resources');
                    } catch (\Throwable $th) {
                        Session::flash('error', $th->getMessage());
                        return back()->withInput();
                    }
                }
            } else {
                $rules = array(
                    'title' => ['required', 'max:255'],
                    'content' => ['required'],
                    'file' => ['required'],
                );
                $fieldNames = array(
                    'title'   => 'Resource Title',
                    'content'  => 'Resource Content',
                    'file'  => 'Resource File'
                );
                //dd($request->all());
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    Session::flash('warning', 'Please check the form again!');
                    return back()->withErrors($validator)->withInput();
                } else {
                    try {
                        if ($request->file('file')) {
                            $file = $request->file('file');
                            $picture = 'RF' . date('dMY') . time() . '.' . $file->getClientOriginalExtension();
                            $pictureDestination = 'uploads/resources_file';
                            $file->move($pictureDestination, $picture);
                        }
                        $this->create_res->create($request, $picture);
                        Session::flash('success', 'Created Successfully');
                        return redirect('admin/resources');
                    } catch (\Throwable $th) {
                        Session::flash('error', $th->getMessage());
                        return back()->withInput();
                    }
                }
            }
        } else {
            $data['title'] = 'Add New Resources';
            return view('admin.dashboard.add-resources', $data);
        }
    }

    public function delete_resources($id)
    {
        try {
            Resource::find($id)->delete();
            Session::flash('success', 'Deleted Successfully');
            return redirect('admin/resources');
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return redirect('admin/resources');
        }
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
