<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Course;
use App\Models\Days;
use App\Models\Department;
use App\Models\Faculties;
use App\Models\Level;
use App\Models\Log;
use App\Models\Logbook;
use App\Models\Semester;
use App\Models\Weeks;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Week;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('student');
    }

    public function index()
    {
        $data['title'] = 'Siwes Weeks';
        $data['sn'] = 1;
        $data['class'] = [];
        $data['assignments'] = [];
        $data['weeks'] = $w = Weeks::orderBy('id', 'ASC')->get();
        return view('student.log-book.index', $data);
    }

    public function week($id)
    {
        $data['week'] = $week = Weeks::find($id);
        $data['days'] = $d = Days::orderBy('id', 'ASC')->with(['log' => function ($query) use ($id) {
            $query->where(['week_id' => $id, 'user_id' => Auth::user()->id]);
        }])->get();
        $data['title'] = 'Week ' . $week->name;
        return view('student.log-book.log', $data);
    }

    public function download_pdf()
    {
        $subjects = DB::table('users')
            ->join('results', 'results.student_id', '=', 'users.email')
            ->join('subjects', 'subjects.id', '=', 'results.subject_id')
            ->where('users.email', Auth::user()->email)
            ->where('results.student_id', Auth::user()->email)
            ->select('results.*', 'users.*', 'subjects.*')
            ->get();
        $sn = 1;
        $class = Classes::where('class_id', Auth::user()->class_id)->first();
        $pdf = App::make('dompdf.wrapper');
        $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf->loadView('result', compact(['subjects', 'sn', 'class']));
        return $pdf->download(Auth::user()->surname . ' ' . Auth::user()->last_name . ' ' . $class->name . ' result.pdf');
    }
    public function log(Request $request)
    {
        $rules = array(
            'week_id' => ['required'],
            'log' => ['required'],
            'day_id' => ['required']
        );
        $fieldNames = array(
            'week_id' => 'Week',
            'log'     => 'Log Details',
            'day_id'  => 'Day',
        );

        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($fieldNames);
        if ($validator->fails()) {
            Session::flash('warning', 'Please check the form again!, ' . $request->day . ' ' . $request->week . ' log can not be empty');
            return back()->withErrors($validator)->withInput();
        } else {
            try {
                DB::table('logbooks')
                    ->updateOrInsert(
                        ['user_id' => Auth::user()->id, 'week_id' => $request->week_id, 'day_id' => $request->day_id],
                        ['log' => $request->log]
                    );
                Session::flash('success', $request->day . ' ' . $request->week . ' Log Saved Successfully');
                return redirect()->route('log-book');
            } catch (\Throwable $th) {
                Session::flash('error', $th->getMessage());
                return back()->withErrors($validator)->withInput();
            }
        }
    }
}
