<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectResult;
use Illuminate\Http\Request;

class SubjectResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('subjects')->paginate(10);
//        dd($students[0]->subjects->sum('achieve_number'));
        return view('admin.results',compact('students'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('admin.create_result',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'name'=>'required',
            'image' => 'required',
            'subjects' =>'required',
            'marks' =>'required'
        ]);
        $student = new Student();
        $student->name = $request->name;
        if ($request->hasFile('image')) {
                $file = $request->image;
                $path = 'student/image';
                $file->move($path, $file->getClientOriginalName());
                $student->image = $path . '/' . $file->getClientOriginalName();
        }
        $student->save();
        foreach ($request->subjects as $c=>$su){

            $studentResult = new SubjectResult();
            $studentResult->subject_id = $request->subjects[$c];
            $studentResult->achieve_number = $request->marks[$c];
            $studentResult->student_id = $student->id;
            $studentResult->save();
        }
        return redirect()->route('student.results');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubjectResult  $subjectResult
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectResult $subjectResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubjectResult  $subjectResult
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectResult $subjectResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubjectResult  $subjectResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubjectResult $subjectResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubjectResult  $subjectResult
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        unlink($student->image);
        $marks = SubjectResult::where('student_id','=',$id)->get();
        foreach ($marks as $m){
            SubjectResult::destroy($m->id);
        }
        Student::destroy($id);
        return redirect()->back();
    }
}
