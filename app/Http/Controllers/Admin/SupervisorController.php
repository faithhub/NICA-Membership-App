<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Schools;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SupervisorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->create_new = new User();
    }

    public function index()
    {
        $data['title'] = 'All Lecturer';
        $data['sn'] = 1;
        $data['supervisors'] = $s = User::where('role', 'Supervisor')->with('school:id,name')->with('dept:id,name')->get();
        //dd($s);
        return view('admin.supervisor.index', $data);
    }


    public function create(Request $request)
    {
        if ($_POST) {
            if ($request->id) {

                $rules = array(
                    'department_id' => ['required', 'max:255'],
                    'school_id' => ['required', 'max:255'],
                    'name' => ['required', 'max:255'],
                    'email' => ['required', 'max:255', 'email', 'unique:users,email,' . $request->id],
                );
                $fieldNames = array(
                    'school_id'   => 'Supervisor School',
                    'department_id' => 'Supervisor Department',
                    'name'   => 'Supervisor Name',
                    'email' => 'Supervisor Email',
                );
                //dd($request->all());
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    Session::flash('warning', 'Please check the form again!');
                    return back()->withErrors($validator)->withInput();
                } else {
                    try {
                        $user = User::find($request->id);
                        $user->email = $request->email;
                        $user->name = $request->name;
                        $user->school_id = $request->school_id;
                        $user->department_id = $request->department_id;
                        $user->save();
                        // $this->check_student();
                        Session::flash('success', 'Supervisor Updated Successfully');
                        return redirect('admin/supervisors');
                    } catch (\Throwable $th) {
                        Session::flash('error', $th->getMessage());
                        return \back();
                    }
                }
            } else {
                $rules = array(
                    'department_id' => ['required', 'max:255'],
                    'school_id' => ['required', 'max:255'],
                    'name' => ['required', 'max:255'],
                    'email' => ['required', 'max:255', 'email', 'unique:users,email'],
                    'password' => ['required', 'string', 'min:8', 'max:16'],
                );
                $fieldNames = array(
                    'school_id'   => 'Supervisor School',
                    'department_id' => 'Supervisor Department',
                    'name'   => 'Supervisor Name',
                    'email' => 'Supervisor Email',
                    'password' => 'Supervisor Password'
                );
                //dd($request->all());
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    Session::flash('warning', 'Please check the form again!');
                    return back()->withErrors($validator)->withInput();
                } else {
                    try {
                        $this->create_new->create_supervisor($request);
                        // $this->check_student();
                        Session::flash('success', 'Supervisor Created Successfully');
                        return redirect('admin/supervisors');
                    } catch (\Throwable $th) {
                        Session::flash('error', $th->getMessage());
                        return \back()->withInput();
                    }
                }
            }
        } else {
            $data['title'] = 'Add New Supervisor';
            $data['sn'] = 1;
            $data['schools'] = Schools::orderBy('name', 'ASC')->get();
            $data['departments'] = Department::orderBy('name', 'ASC')->get();
            return view('admin.supervisor.create', $data);
        }
    }

    public function view($id)
    {
        try {
            $data['supervisor'] = $u = User::where(['id' => $id, 'role' => 'Supervisor'])->with('school:id,name')->with('dept:id,name')->first();
            $data['title'] = $u->first_name . ' ' . $u->last_name;
            return view('admin.supervisor.view', $data);
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }


    public function course(Request $request)
    {
        try {
            $course = Course::where(['faculty_id' => $request->faculty_id, 'department_id' => $request->department_id, 'level' => $request->level_id, 'semester' => $request->semester_id])->orderBy('course_title', 'ASC')->get();
            return $course;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function dept(Request $request)
    {
        try {
            $departments = Department::where('school_id', $request->id)->orderBy('name', 'ASC')->get();
            return $departments;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function edit($id)
    {
        try {
            $data['schools'] = Schools::orderBy('name', 'ASC')->get();
            $data['departments'] = Department::orderBy('name', 'ASC')->get();
            $data['supervisor'] = User::where(['id' => $id, 'role' => 'Supervisor'])->first();
            $data['title'] = 'Edit Lecturer';
            $data['sn'] = 1;
            $data['mode'] = 'edit';
            return view('admin.supervisor.edit', $data);
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }

    public function block($id)
    {
        try {
            $check = User::where(['id' => $id, 'role' => 'Supervisor', 'status' => 'Active'])->first();
            $check->status = 'Inactive';
            $check->save();
            Session::flash('success', 'Supervisor Inactive Successfully');
            return \back();
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }

    public function unblock($id)
    {
        try {
            $check = User::where(['id' => $id, 'role' => 'Supervisor', 'status' => 'Inactive'])->first();
            $check->status = 'Active';
            $check->save();
            Session::flash('success', 'Supervisor Unblocked Successfully');
            return \back();
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }

    public function delete($id)
    {
        try {
            $teacher = User::where(['id' => $id, 'role' => 'Supervisor'])->first();
            // $check = Subject::where('teacher_id', $id)->first();
            // $check->teacher_id = null;
            // $check->save();
            $teacher->delete();
            Session::flash('success', 'Supervisor Deleted Successfully');
            return \back();
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }
}
