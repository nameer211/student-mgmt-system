<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index(){
        $data['enrollments'] = Enrollment::paginate(10);
        return view('enrollments.index',$data);
    }

    public function create(){
        $data['students'] = Student::get();
        $data['subjects'] = Subject::get();
        return view('enrollments.create',$data);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'subject_id' => 'required|integer',
            'status' => 'required',
        ]);
        $enrollmentExists = Enrollment::where(['student_id' => $validated['student_id'], 'subject_id' => $validated['subject_id']])->exists();
        if($enrollmentExists) {
            return redirect(route('enrollments.create'))->with('error', 'Enrollment already exists for this student and subject.');
        }
        Enrollment::create($validated);
        return redirect(route('enrollments.index'))->with('success','Enrollment created successfully');
    }

    public function edit($id){
        $data['students'] = Student::get();
        $data['subjects'] = Subject::get();
        $data['enrollment'] = Enrollment::findOrfail($id);
        return view('enrollments.edit',$data);
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'subject_id' => 'required|integer',
            'status' => 'required',
        ]);
        Enrollment::findOrFail($id)->update($validated);
        return redirect(route('enrollments.index'))->with('success','Enrollment updated successfully');
    }

    public function destroy($id){
        Enrollment::findOrFail($id)->delete();
        return redirect(route('enrollments.index'))->with('success','Enrollment deleted successfully');
    }
}
