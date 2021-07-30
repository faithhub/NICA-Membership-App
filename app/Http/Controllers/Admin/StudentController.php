<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Department;
use App\Models\Schools;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->create_new = new User();
    }

    public function index()
    {
        $data['title'] = 'All Students';
        $data['sn'] = 1;
        $data['students'] = User::where('role', 'Student')->with('school:id,name')->with('dept:id,name')->paginate(15);
        return view('admin.students.index', $data);
    }

    public function create(Request $request)
    {
        if ($_POST) {
            if ($request->id) {
                $rules = array(
                    'school_id' => ['required', 'max:255'],
                    'department_id' => ['required', 'max:255'],
                    'name' => ['required', 'max:255'],
                    'matric_number' => ['required', 'max:255', 'unique:users,unique,' . $request->id],
                    'email' => ['required', 'max:255', 'unique:users,email,' . $request->id],
                );
                $fieldNames = array(
                    'school_id'   => 'Student School',
                    'department_id' => 'Student Department',
                    'matric_number' => 'Student Matric Number',
                    'name'   => 'Student Name',
                    'email' => 'Student Email'
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
                        $user->unique = $request->matric_number;
                        $user->name = $request->name;
                        $user->school_id = $request->school_id;
                        $user->department_id = $request->department_id;
                        $user->save();
                        // $this->check_student();
                        Session::flash('success', 'Student Updated Successfully');
                        return redirect('admin/students');
                    } catch (\Throwable $th) {
                        Session::flash('error', $th->getMessage());
                        return \back();
                    }
                }
            } else {
                $rules = array(
                    'school_id' => ['required', 'max:255'],
                    'department_id' => ['required', 'max:255'],
                    'matric_number' => ['required', 'max:255', 'unique:users,unique'],
                    'name' => ['required', 'max:255'],
                    'email' => ['required', 'max:255', 'email', 'unique:users,email'],
                );
                $fieldNames = array(
                    'school_id'   => 'Student School',
                    'department_id' => 'Student Department',
                    'matric_number' => 'Student Matric Number',
                    'name'   => 'Student Name',
                    'email' => 'Student Email'
                );
                //dd($request->all());
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    Session::flash('warning', 'Please check the form again!');
                    return back()->withErrors($validator)->withInput();
                } else {
                    try {
                        $this->create_new->create_student($request);
                        // $this->check_student();
                        Session::flash('success', 'Student Created Successfully');
                        return redirect('admin/students');
                    } catch (\Throwable $th) {
                        Session::flash('error', $th->getMessage());
                        return \back();
                    }
                }
            }
        } else {
            $data['title'] = 'Create New Students';
            $data['sn'] = 1;
            $data['mode'] = 'create';
            $data['schools'] = Schools::orderBy('name', 'ASC')->get();
            $data['departments'] = Department::orderBy('name', 'ASC')->get();
            return view('admin.students.create', $data);
        }
    }


    public function create_bulk(Request $request)
    {
        $rules = array(
            'bulk_school_id' => ['required', 'max:255'],
            'bulk_department_id' => ['required', 'max:255'],
            'bulk_student' => ['required', 'mimes:csv,xlsx,xls'],
        );
        $fieldNames = array(
            'bulk_school_id'   => 'Student school',
            'bulk_department_id' => 'Student Department',
            'bulk_student'   => 'Student Bulk Excel File',
        );
        //dd($request->all());
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($fieldNames);
        if ($validator->fails()) {
            Session::flash('warning', 'Please check the form again!');
            return back()->withErrors($validator)->withInput();
        } else {
            try {
                $request->session()->put('bulk_school_id', $request->bulk_school_id);
                $request->session()->put('bulk_department_id', $request->bulk_department_id);
                Excel::import(new StudentsImport, request()->file('bulk_student'));
                Session::flash('success', 'Student Uploaded Successfully');
                $request->session()->forget('bulk_school_id');
                $request->session()->forget('bulk_department_id');
                return redirect('admin/students');
            } catch (\Throwable $th) {
                Session::flash('error', $th->getMessage());
                return \back();
            }
        }
    }

    public function edit($id)
    {
        try {
            $data['student'] = User::where(['id' => $id, 'role' => 'Student'])->first();
            $data['title'] = 'Edit Student';
            $data['schools'] = Schools::orderBy('name', 'ASC')->get();
            $data['departments'] = Department::orderBy('name', 'ASC')->get();
            return view('admin.students.edit', $data);
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }


    public function view($id)
    {
        try {
            $data['student'] = $u = User::where(['id' => $id, 'role' => 'Student'])->with('school:id,name')->with('dept:id,name')->first();
            $data['title'] = $u->first_name . ' ' . $u->last_name;
            return view('admin.students.view', $data);
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }

    public function block($id)
    {
        try {
            $check = User::where(['id' => $id, 'role' => 'Student', 'status' => 'Active'])->first();
            $check->status = 'Inactive';
            $check->save();
            Session::flash('success', 'Student Inactive Successfully');
            return \back();
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }

    public function unblock($id)
    {
        try {
            $check = User::where(['id' => $id, 'role' => 'Student', 'status' => 'Inactive'])->first();
            $check->status = 'Active';
            $check->save();
            Session::flash('success', 'Student Unblocked Successfully');
            return \back();
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }

    public function delete($id)
    {
        try {
            $teacher = User::where(['id' => $id, 'role' => 'Student'])->first();
            $teacher->delete();
            Session::flash('success', 'Student Deleted Successfully');
            return \back();
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }

    // public function check_student()
    // {
    //     $check = User::where('role', 'Student')->get();
    //     foreach ($check as $students) {
    //         $chk = Result::where('student_id', $students->email)->get();
    //         if ($chk->count() < 1) {
    //             $class = Classes::where('class_id', $students->class_id)->get();
    //             foreach ($class as $subject) {
    //                 $this->create_new_result->create($subject, $students->email);
    //             }
    //         } elseif ($chk->count() > 0) {
    //             $subjects = Classes::where('class_id', $students->class_id)->pluck('subject_id');
    //             $chk_std = Result::where('student_id', $students->email)->pluck('subject_id');
    //             $subject_id = json_decode($subjects);
    //             $chk_std = json_decode($chk_std);
    //             $different = array_diff($subject_id, $chk_std);
    //             if ($different != null) {
    //                 foreach ($different as $diff) {
    //                     $subjects = Classes::where('subject_id', $diff)->get();
    //                     $this->create_new_result->update_now($subjects, $students->email);
    //                 }
    //             }
    //         }
    //     }
    // }
}
