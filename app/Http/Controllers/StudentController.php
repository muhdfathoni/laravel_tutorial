<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Student, Faculty, Course};

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('Student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculty = Faculty::all();

        return view('Student.create', compact('faculty'));
    }

    public function createFaculty(Request $request)
    {
        $data=Course::select('name','id')->where('faculty_id',$request->id)->take(100)->get();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'student_id' => 'required|min:11',
            'faculty' => 'required',
            'course' => 'required'
        ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'student_id' => $request->student_id,
            'faculty_id' => $request->faculty,
            'courses_id' => $request->course
        );

        Student::create($data);
        
        return redirect()->route('student.index')->with('success','Student created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('Student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $faculty = Faculty::all();

        return view('Student.update', compact('student', 'faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'student_id' => 'required|min:11',
            'faculty' => 'required',
            'course' => 'required'
        ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'student_id' => $request->student_id,
            'faculty_id' => $request->faculty,
            'courses_id' => $request->course
        );

        $student->update($data);
        
        return redirect()->route('student.index')->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.index')->with('danger','Student deleted successfully');
    }

    public function addFaculty()
    {
        return view('Student.faculties.index');
    }

    public function storeFaculty(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = array(
            'name' => $request->name
        );

        Faculty::create($data);

        return redirect()->route('student.index')->with('success','Faculty created successfully');
    }

    public function addCourse()
    {
        $faculty = Faculty::all();

        return view('Student.courses.index', compact('faculty'));
    }

    public function storeCourse(Request $request)
    {
        $request->validate([
            'faculty_id' => 'required',
            'name' => 'required'
        ]);

        $data = array(
            'faculty_id' => $request->faculty_id,
            'name' => $request->name
        );

        Course::create($data);

        return redirect()->route('student.index')->with('success','Course created successfully');
    }
}
