<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Schools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SchoolsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        // $this->create_new = new User();
        $this->create_new = new Schools();
    }

    public function create(Request $request)
    {
        if ($_POST) {
            if ($request->id) {
                $rules = array(
                    'name' => ['required', 'max:255', 'unique:schools,name,' . $request->id],
                );
                $fieldNames = array(
                    'name'   => 'School Name'
                );
                //dd($request->all());
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    Session::flash('warning', 'Please check the form again!');
                    return back()->withErrors($validator)->withInput();
                } else {
                    try {
                        $school = Schools::find($request->id);
                        $school->name = $request->name;
                        $school->save();
                        Session::flash('success', 'School Updated Successfully');
                        return redirect('admin/schools');
                    } catch (\Throwable $th) {
                        Session::flash('error', $th->getMessage());
                        return redirect('admin/schools');
                    }
                }
            } else {
                $rules = array(
                    'name' => ['required', 'max:255', 'unique:schools'],
                );
                $fieldNames = array(
                    'name'   => 'School Name',
                );
                //dd($request->all());
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    Session::flash('warning', 'Please check the form again!');
                    return back()->withErrors($validator)->withInput();
                } else {
                    try {
                        $this->create_new->create($request);
                        Session::flash('success', 'School Added Successfully');
                        return redirect('admin/schools');
                    } catch (\Throwable $th) {
                        Session::flash('error', $th->getMessage());
                        return \back();
                    }
                }
            }
        } else {
            // ->with('subjects:id,name')->paginate(15)
            $data['schools'] = $f = Schools::withCount('department')->orderBy('id', 'ASC')->get();
            $data['title'] = 'Schools';
            $data['sn'] = 1;
            $data['mode'] = 'index';
            return view('admin.schools.index', $data);
        }
    }

    public function view($id)
    {
        try {
            $data['faculty'] = $f = Schools::where(['id' => $id])->first();
            $data['departments'] = Department::where('school_id', $id)->get();
            $data['title'] = 'Faculty of ' . $f->name . ' ' . $f->code;
            $data['sn'] = 1;
            return view('admin.schools.view', $data);
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }
    public function create_new()
    {
        try {
            $data['title'] = 'School';
            $data['sn'] = 1;
            $data['mode'] = 'create';
            return view('admin.schools.create', $data);
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }

    public function edit($id)
    {
        try {
            $data['school'] = $f = Schools::where(['id' => $id])->first();
            $data['title'] = 'Edit School ' . $f->name;
            $data['sn'] = 1;
            $data['mode'] = 'edit';
            return view('admin.schools.create', $data);
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }

    public function delete($id)
    {
        try {
            Schools::where(['id' => $id])->first()->delete();
            Department::where(['school_id' => $id])->delete();
            Session::flash('success', 'School Deleted Successfully');
            return \back();
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return \back();
        }
    }
}
