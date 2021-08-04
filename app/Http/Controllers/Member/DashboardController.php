<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Resource;
use App\Models\Settings;
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
        $this->middleware(['auth', 'member', 'verified']);
    }


    public function index()
    {
        $data['title'] = 'My Dashboard';
        $data['member'] = $u = User::find(Auth::user()->id);
        return view('member.dashboard.index', $data);
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
                'dob' => ['required'],
                'sex' => ['required'],
                'marital_status' => ['required'],
                'country' => ['required'],
                'address' => ['required', 'max:255'],
                'zone' => ['required', 'max:255'],
                'sec_sch' => ['required', 'max:255'],
                'uni_sch' => ['required', 'max:255'],
                'prof_qualification' => ['required', 'max:255'],
                'present_org' => ['required', 'max:255'],
                'present_appointment' => ['required', 'max:255'],
                'area_specs' => ['required', 'max:255'],
                'other_info' => ['max:255'],
                'referees' => ['required'],
                'terms' => ['required'],
            );
            $fieldNames = array(
                'email' => 'Email Address',
                'surname'     => 'Surname',
                'other_name'     => 'Other Name',
                'phone_number'   => 'Phone Number',
                'avatar'   => 'Profile Picture',
                'dob'     => 'Date of Birth',
                'sex'     => 'Sex',
                'marital_status' => 'Marital Status',
                'country'  => 'Nationality',
                'address'  => 'Contact Address',
                'zone'     => 'Chapter & Zone To Which You Belong',
                'sec_sch'  => 'Secondary',
                'uni_sch'  => 'University',
                'prof_qualification'  => 'Professional Qualification',
                'present_org'  => 'Present Institution/Organisation',
                'present_appointment'  => 'Present Appointment',
                'area_specs'  => 'Area(S) Of Specialisation',
                'other_info'  => 'Any Other Information You Think Will Help The Council In Considering Your Application',
                'referees'  => 'Referees Details',
                'terms' => 'Declaration',
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
                    $user->dob = $request->dob;
                    $user->sex = $request->sex;
                    $user->marital_status = $request->marital_status;
                    $user->country = $request->country;
                    $user->address = $request->address;
                    $user->zone = $request->zone;
                    $user->sec_sch = $request->sec_sch;
                    $user->uni_sch = $request->uni_sch;
                    $user->prof_qualification = $request->prof_qualification;
                    $user->present_org = $request->present_org;
                    $user->present_appointment = $request->present_appointment;
                    $user->area_specs = $request->area_specs;
                    $user->other_info = $request->other_info;
                    $user->referees = $request->referees;
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
            $data['title'] = 'Membership Profile';
            $data['member'] = $u = User::find(Auth::user()->id);
            $data['countries'] = Country::orderBy('nicename', 'ASC')->get();
            return view('member.dashboard.profile', $data);
        }
    }

    public function plan()
    {
        $data['title'] = 'Membership Plan';
        $data['sn'] = 1;
        $data['plans'] = $u = Subscription::orderby('id', 'ASC')->get();
        return view('member.dashboard.subscription', $data);
    }

    public function resources()
    {
        $data['title'] = 'Resources';
        $data['sn'] = 1;
        $data['resources'] = Resource::orderBy('id', 'ASC')->get();
        return view('member.dashboard.resources', $data);
    }

    public function view_resources($id)
    {
        $data['title'] = 'View Resources';
        $data['resource'] = Resource::find($id);
        return view('member.dashboard.view_res', $data);
    }

    public function subscribe($id)
    {
        $data['title'] = 'Membership Sucbscription';
        $data['plan'] = Subscription::find($id);
        $data['setting'] = Settings::find(1);
        return view('member.dashboard.subscribe', $data);
    }

    public function subscribe_now($id)
    {
        $data['plan'] = Subscription::find($id);
        $data['setting'] = Settings::find(1);
        return view('member.dashboard.save', $data);
    }

    public function subscribe_now_new(Request $request)
    {
        $rules = array(
            'payer_name' => ['required', 'max:255'],
            'trans_id' => ['required', 'max:255'],
            'prove' => 'max:5000',
        );
        $fieldNames = array(
            'payer_name'     => 'Payer Name',
            'trans_id'     => 'Transaction ID',
            'prove'   => 'Payment Prove',
        );
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($fieldNames);
        if ($validator->fails()) {
            Session::flash('warning', 'Please check the form again!');
            return back()->withErrors($validator)->withInput();
        } else {
            if ($request->file('prove')) {
                $file = $request->file('prove');
                $picture = 'PP' . date('dMY') . time() . '.' . $file->getClientOriginalExtension();
                $pictureDestination = 'uploads/payment_prove';
                $file->move($pictureDestination, $picture);
            }
            try {
                Session::flash('success', 'Profile Updated Successfully');
                return \back();
            } catch (\Throwable $th) {
                Session::flash('error', $th->getMessage());
                return \back();
                //throw $th;
            }
        }
    }
}
