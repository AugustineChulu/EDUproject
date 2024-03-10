<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\Classes;
use App\Models\Pupil;
use App\Models\Teacher;
use App\Models\Subject;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        
        if ($user->hasRole('admin')) {

            $teachers = Teacher::latest()->get();
            $pupils = Pupil::latest()->get();
            $subjects = Subject::latest()->get();
            $classes = Classes::latest()->get();

            return view('dashboard', compact('teachers','pupils','subjects','classes'));

        } elseif ($user->hasRole('teacher')) {

            $teacher = Teacher::with(['user','subjects','classes','pupils'])->withCount('subjects','classes')->findOrFail($user->teacher->id);

            return view('dashboard', compact('teacher'));

        } elseif ($user->hasRole('pupil')) {
            
            $student = Pupil::with(['user','parent','class','attendances'])->findOrFail($user->student->id); 

            return view('dashboard', compact('student'));

        } else {
            return 'NO ROLE ASSIGNED YET!';
        }
        
    }

}
