<?php

namespace App\Http\Controllers;

use App\Models\{Classes, User, Student};
use Illuminate\Http\Request;

class ClassController extends Controller
{

    public function index()
    {
        $classes = Classes::all();

        return view('Student.classes.index', compact('classes'));
    }

    public function storeClass(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);

        $data = array(
            'name' => $request->name,
            'date' => $request->date,
            'start' => $request->start,
            'end' => $request->end
        );

        Classes::create($data);

        return redirect()->route('class.index')->with('success','Class created successfully');

    }

    public function create(Student $student)
    {
        $student = Student::all();

        return view('Student.classes.assign', compact('student'));
    }

    public function createClass()
    {
        $classes = Classes::all();

        return view('Student.classes.create', compact('classes'));
    }

    public function assignClass()
    {
        $classes = Classes::all();

        return view('Student.classes.assign_class', compact('classes'));
    }

    public function studentList()
    {
        $classes = Classes::all();

        return view('Student.classes.student_list', compact('classes'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
