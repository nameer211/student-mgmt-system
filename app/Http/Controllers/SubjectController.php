<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $data['subjects'] = Subject::paginate(10);
        return view('subjects.index',$data);
    }

    public function create(){
        return view('subjects.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'credit_hours' => 'required|integer|min:1',
            'instructor' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        Subject::create($validated);
        return redirect(route('subjects.index'))->with('success','Subject created successfully');
    }

    public function edit($id){
        $data['subject'] = Subject::findOrfail($id);
        return view('subjects.edit',$data);
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'credit_hours' => 'required|integer|min:1',
            'instructor' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        Subject::findOrFail($id)->update($validated);
        return redirect(route('subjects.index'))->with('success','Subject updated successfully');
    }

    public function destroy($id){
        Subject::findOrFail($id)->delete();
        return redirect(route('subjects.index'))->with('success','Subject deleted successfully');
    }
}
