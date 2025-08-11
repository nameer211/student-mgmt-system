<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $data['students'] = Student::paginate(10);
        return view('students.index',$data);
    }

    public function create(){
        return view('students.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'student_id' => 'required|unique:students,student_id',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required'
        ]);
        Student::create($validated);
        return redirect(route('students.index'))->with('success','Student created successfully');
    }

    public function show($id){
        $data['student'] = Student::findOrfail($id);
        return view('students.show',$data);
    }

    public function edit($id){
        $data['student'] = Student::findOrfail($id);
        return view('students.edit',$data);
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required',
            'student_id' => 'required|unique:students,student_id,'.$id,
            'email' => 'required|email|unique:students,email,'.$id,
            'phone' => 'required'
        ]);
        Student::findOrFail($id)->update($validated);
        return redirect(route('students.index'))->with('success','Student updated successfully');
    }

    public function destroy($id){
        Student::findOrFail($id)->delete();
        return redirect(route('students.index'))->with('success','Student deleted successfully');
    }
}
