<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreClassesRequest;
use App\Http\Requests\UpdateClassesRequest;

class ClassesController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(StoreClassesRequest $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Classes $classes)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Classes $classes)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(UpdateClassesRequest $request, Classes $classes)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Classes $classes)
    // {
    //     //
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::withCount('pupils')->latest()->paginate(10);

        return view('backend.classes.adminClasses', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::latest()->get();
        
        return view('backend.classes.create', compact('teachers'));
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
            'grade'             => 'required|numeric',
            'class'             => 'required|string|max:255',
            'class_description' => 'required|string|max:255',
            'teacher_id'        => 'required|numeric',
            // 'grade_class_combination' => [
            //     'required',
            //     Rule::unique('classes')->where(function ($query) use ($request) {
            //         return $query->where('grade', $request->grade)
            //                      ->where('class', $request->class);
            //     })
            // ],
        ]);

        Classes::create([
            'grade'             => $request->grade,
            'class'             => $request->class,
            'teacher_id'        => $request->teacher_id,
            'class_description' => $request->class_description
        ]);

        return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classes  $Classes
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $Classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classes  $Classes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = Teacher::latest()->get();
        $class = Classes::findOrFail($id);

        return view('backend.classes.edit', compact('class','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classes  $Classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'class_name'        => 'required|string|max:255|unique:Classes,class_name,'.$id,
            'class_numeric'     => 'required|numeric',
            'teacher_id'        => 'required|numeric',
            'class_description' => 'required|string|max:255'
        ]);

        $class = Classes::findOrFail($id);

        $class->update([
            'class_name'        => $request->class_name,
            'class_numeric'     => $request->class_numeric,
            'teacher_id'        => $request->teacher_id,
            'class_description' => $request->class_description
        ]);

        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes  $Classes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Classes::findOrFail($id);
        
        $class->subjects()->detach();
        $class->delete();

        return back();
    }

    /*
     * Assign Subjects to Classes 
     * 
     * @return \Illuminate\Http\Response
     */
    public function assignSubject($classid)
    {
        $subjects   = Subject::latest()->get();
        $assigned   = Classes::with(['subjects','pupils'])->findOrFail($classid);

        return view('backend.classes.assign-subject', compact('classid','subjects','assigned'));
    }

    /*
     * Add Assigned Subjects to Classes 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAssignedSubject(Request $request, $id)
    {
        $class = Classes::findOrFail($id);

        $class->subjects()->sync($request->selectedsubjects);

        return redirect()->route('classes.index');
    }

}
