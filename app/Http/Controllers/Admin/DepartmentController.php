<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Department;
use App\Models\Faculties;
use App\Models\Level;
use App\Models\Schools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->create_new = new Department();
    }

    public function create(Request $request)
    {
        if ($_POST) {
            if ($request->id) {
                $rules = array(
                    'name' => ['required', 'max:255', 'unique:departments,name,' . $request->id],
                    'school_id' => ['required', 'max:255']
                );
                $fieldNames = array(
                    'name'   => 'Department Name',
                    'school_id'   => 'School Name',
                );
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    Session::flash('warning', 'Please check the form again!');
                    return back()->withErrors($validator)->withInput();
                } else {
                    try {
                        $faculty = Department::find($request->id);
                        $faculty->name = $request->name;
                        $faculty->school_id = $request->school_id;
                        $faculty->save();
                        Session::flash('success', 'Department Updated Successfully');
                        return redirect('admin/departments');
                    } catch (\Throwable $th) {
                        Session::flash('error', $th->getMessage());
                        return redirect('admin/departments');
                    }
                }
            } else {
                $rules = array(
                    'name' => ['required', 'max:255', 'unique:departments'],
                    'school_id' => ['required', 'max:255']
                );
                $fieldNames = array(
                    'name'   => 'Department Name',
                    'school_id'   => 'School Name',
                );
                //dd($request->all());
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    Session::flash('warning', 'Please check the form again!');
                    return back()->withErrors($validator)->withInput();
                } else {
                    try {
                        try {
                            $check = Department::where(['name' => $request->name, 'school_id' => $request->school_id])->count();
                            if ($check > 0) {
                                Session::flash('error', 'Department Name has already been created');
                                return \back();
                            } else {
                                try {
                                    $this->create_new->create($request);
                                    Session::flash('success', 'Department Added Successfully');
                                    return redirect('admin/departments');
                                } catch (\Throwable $th) {
                                    Session::flash('error', $th->getMessage());
                                    return \back();
                                }
                            }
                        } catch (\Throwable $th) {
                            Session::flash('error', $th->getMessage());
                            return \back();
                        }
                    } catch (\Throwable $th) {
                        Session::flash('error', $th->getMessage());
                        return \back();
                    }
                }
            }
        } else {
            $data['departments'] = Department::with('school:id,name')->orderBy('id', 'ASC')->get();
            $data['schools'] = Schools::orderBy('id', 'ASC')->get();
            $data['title'] = 'Departments';
            $data['sn'] = 1;
            $data['mode'] = 'index';
            return view('admin.departments.index', $data);
        }
    }

    public function edit($id)
    {
        try {
            $data['department'] = $d = Department::where(['id' => $id])->first();
            $data['schools'] = Schools::orderBy('id', 'ASC')->get();
            $data['title'] = 'Edit Department ' . $d->name;
            $data['sn'] = 1;
            $data['mode'] = 'edit';
            return view('admin.departments.create', $data);
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }

    public function view($id)
    {
        try {
            $data['department'] = $d = Department::where(['id' => $id])->first();
            $data['title'] = 'View Department ' . $d->name . 'Levels';
            $data['sn'] = 1;
            return view('admin.departments.view', $data);
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }

    public function dept_level($faculty, $id, $level)
    {
        try {
            $data['department'] = $d = Department::where(['id' => $id])->first();
            $data['level'] = $l = Level::where('level', $level)->first();
            $data['courses'] = $c = Course::where(function ($query) use ($faculty, $id, $level) {
                $query->where('department_id', '=', 0)->orWhere('department_id', '=', $id);
            })->Where(
                function ($query) use ($faculty, $id, $level) {
                    $query->where(['faculty_id' => $faculty, 'level' => $level]);
                }
            )->with('levels:*')->get();
            $data['title'] = 'Department of ' . $d->name . ' ' . $l->name . ' Courses';
            $data['sn'] = 1;
            return view('admin.departments.course', $data);
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }
    public function create_new()
    {
        try {
            $data['departments'] = Department::with('school:id,name,code')->orderBy('id', 'ASC')->get();
            $data['schools'] = Schools::orderBy('id', 'ASC')->get();
            $data['title'] = 'Departments';
            $data['sn'] = 1;
            $data['mode'] = 'create';
            return view('admin.departments.create', $data);
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }

    public function delete($id)
    {
        try {
            Department::where(['id' => $id])->first()->delete();
            Session::flash('success', 'Department Deleted Successfully');
            return \back();
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }
}
