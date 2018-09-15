<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\StudentAttendance;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $today = Carbon::today();

        $admin = Auth::guard('admin')->user()->id;
        $totalStudents = Student::where('admin_id',$admin)->count();
        $present = StudentAttendance::where('admin_id',$admin)->where('attendance_type_id',1)->whereDate('created_at',$today)->count();
        $absent = StudentAttendance::where('admin_id',$admin)->where('attendance_type_id',2)->whereDate('created_at',$today)->count();
        $class = ClassType::where('admin_id',$admin)->count();
        return view('admin/dashboard',compact('totalStudents','present','absent','class'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

   
}
