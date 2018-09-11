<?php

namespace App\Http\Controllers\Admin;

 
use App\Events\SmsEvent;
use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\SessionDate;
use App\Model\StudentAttendance;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $admin_id = Auth::guard('admin')->user()->id;
         $classes = array_pluck(ClassType::where('admin_id',$admin_id)->get(['id','alias'])->toArray(),'alias', 'id');
        return view('admin.attendance.student.list',compact('centers','classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $admin_id = Auth::guard('admin')->user()->id; 
        $students = Student::where(['class_id'=>$request->class,'admin_id'=>$admin_id])->get(['id','name','father_name','mother_name']);  

        foreach ($students as $student) {
            $row = '<tr>
            <td>'.$student->id.'</td>
            <td>'.$student->name.'</td>
            <td>'.$student->father_name.'</td>
            ';
            foreach(\App\Model\AttendanceType::all() as $attendance){
                $checked = (\App\Model\StudentAttendance::where(['student_id'=>$student->id,'attendance_type_id'=>$attendance->id,'date'=>date('Y-m-d',strtotime($request->date))])->count())?'checked':'';
                      $row .='<td ><label class="radio-inline"><input type="radio" '.$checked.' name="value['.$student->id.']" class="'. str_replace(' ', '_', strtolower($attendance->name)).'" value="'. $attendance->id .'"> '. $attendance->name .' </label></td>';
            }
            $row .= '</tr>';
            $options[] = [$row];
        }   
        return response()->json($options);  
        // return view('admin.attendance.student.list',compact('students'));
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
        $admin_id = Auth::guard('admin')->user()->id;  
        $this->validate($request,['date'=>'required|date','value'=>'required']);
        foreach ($request->value as $key => $value) {

           $student = StudentAttendance::where(['date'=>date('Y-m-d',strtotime($request->date)),'student_id'=>$key])->firstOrNew(['student_id'=>$key]);
           $student->student_id = $key;
           $student->admin_id = $admin_id;
           $student->attendance_type_id = $value;
           $student->date = date('Y-m-d',strtotime($request->date));           
           $student->save();
           if ($value==2) {              
            $st = Student::findOrFail($key);
            if ($student->status!=1) {
             event(new SmsEvent($st->mobile,'Absent')); 
                $student->status=1;
                $student->save();   
            }
                
           }
        }
        return response()->json(['class'=>'success','message'=>'Attendance Mark Successfully']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentAttendance $studentAttendance)
    {
        //
    }
}
