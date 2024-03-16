<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\User;
use App\Models\Pupil;
use App\Models\Classes;
use Illuminate\Http\Request;
use App\Http\Requests\StorePupilRequest;
use App\Http\Requests\UpdatePupilRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PupilController extends Controller
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
    // public function store(StorePupilRequest $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Pupil $pupil)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Pupil $pupil)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(UpdatePupilRequest $request, Pupil $pupil)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Pupil $pupil)
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
        $pupils = Pupil::with('class')->latest()->paginate(10);

        return view('backend.pupils.index', compact('pupils'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classes::latest()->get();
        // $guardians = Guardian::with('user')->latest()->get();
        
        return view('backend.pupils.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     // PUPILS DETAILS //
        //     'name'                => 'required|string|max:255',
        //     'email'                     => 'required|string|email|max:255|unique:pupils',
        //     'password'                  => 'required|string|min:8',
        //     'guardian_id'               => 'required|numeric',
        //     'class_id'                  => 'required|numeric',
        //     'roll_number'               => [
        //         'required',
        //         'numeric',
        //         Rule::unique('pupils')->where(function ($query) use ($request) {
        //             return $query->where('class_id', $request->class_id);
        //         })
        //     ],
        //     'gender'              => 'required|string',
        //     'phone'               => 'required|string|max:255',
        //     'dateofbirth'         => 'required|date',
        //     'current_address'     => 'required|string|max:255',
        //     'permanent_address'   => 'required|string|max:255',
        
        //     // GUARDIAN DETAILS //
        //     'name'             => 'required|string|max:255',
        //     'email'            => 'required|string|email|max:255|unique:guardians',
        //     'gender'           => 'required|string',
        //     'phone'            => 'required|string|max:255',
        //     'current_address'  => 'required|string|max:255',
        //     'permanent_address'=> 'required|string|max:255'
        // ]);

        $request->validate([
            // PUPILS DETAILS //
            'pupil_name'                => 'required|string|max:255',
            'pupil_email'               => 'required|string|email|max:255|unique:users,email',
            'password'                  => 'required|string|min:8',
            'class_id'                  => 'required|numeric',
            'roll_number'               => [
                'required',
                'numeric',
                Rule::unique('pupils')->where(function ($query) use ($request) {
                    return $query->where('class_id', $request->class_id);
                })
            ],
            'pupil_gender'              => 'required|string',
            'pupil_phone'               => 'required|string|max:255',
            'pupil_dateofbirth'         => 'required|date',
            'pupil_current_address'     => 'required|string|max:255',
            'pupil_permanent_address'   => 'required|string|max:255',
        
            // GUARDIAN DETAILS //
            'guardian_first_name'       => 'required|string|max:255',
            'guardian_last_name'       => 'required|string|max:255',
            'guardian_email'            => 'required|string|email|max:255',
            'guardian_gender'           => 'required|string',
            'guardian_phone'            => 'required|string|max:255',
            'guardian_current_address'  => 'required|string|max:255',
            'guardian_permanent_address'=> 'required|string|max:255'
        ]);
        
        
        // GUARDIAN USER
        // $guardian_user = User::create([
        //     'name'                      => $request->guardian_name,
        //     'email'                     => $request->guardian_email,
        //     'password'                  => Hash::make($request->password)
        // ]);

        $guardian_user = Guardian::create([
            'first_name'       => $request->guardian_first_name,
            'last_name'        => $request->guardian_last_name,
            'email'            => $request->guardian_email,
            'gender'           => $request->guardian_gender,
            'phone'            => $request->guardian_phone,
            'current_address'  => $request->guardian_current_address,
            'permanent_address'=> $request->guardian_permanent_address
        ]);
        
        // $guardian_user->guardian()->create([
        //     'gender'           => $request->guardian_gender,
        //     'phone'            => $request->guardian_phone,
        //     'current_address'  => $request->guardian_current_address,
        //     'permanent_address'=> $request->guardian_permanent_address
        // ]);
        

        
        // PUPIL USER
        $pupil_user = User::create([
            'name'                      => $request->pupil_name,
            'email'                     => $request->pupil_email,
            'password'                  => Hash::make($request->password)
        ]);

        $guardian = Guardian::where('email', $request->guardian_email)->first();
        
        $pupil_user->pupil()->create([
            'guardian_id'               => $guardian->id,
            'class_id'                  => $request->class_id,
            'roll_number'               => $request->roll_number,
            'gender'                    => $request->pupil_gender,
            'phone'                     => $request->pupil_phone,
            'dateofbirth'               => $request->pupil_dateofbirth,
            'current_address'           => $request->pupil_current_address,
            'permanent_address'         => $request->pupil_permanent_address
        ]);
        
        $pupil_user->assignRole('pupil');        
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // $guardian_user->assignRole('Parent');

        // PUPIL ACCOUNT PROFILE PICTURE ////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($pupil_user->name).'-'.$pupil_user->id.'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = 'avatar.png';
        }
        
        $pupil_user->update([
            'profile_picture' => $profile
        ]);
        
        
        return redirect()->route('pupil.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pupil  $pupil
     * @return \Illuminate\Http\Response
     */
    public function show(Pupil $pupil)
    {
        $class = Classes::with('subjects')->where('id', $pupil->class_id)->first();
        
        return view('backend.pupils.show', compact('class','pupil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pupil  $pupil
     * @return \Illuminate\Http\Response
     */
    public function edit(Pupil $pupil)
    {
        $classes = Classes::latest()->get();
        $guardians = Guardian::latest()->get();

        return view('backend.pupils.edit', compact('classes','pupil','guardians'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pupil  $pupil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pupil $pupil)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email,'.$pupil->user_id,
            'parent_id'         => 'required|numeric',
            'class_id'          => 'required|numeric',
            'roll_number'       => [
                'required',
                'numeric',
                Rule::unique('pupil')->ignore($pupil->id)->where(function ($query) use ($request) {
                    return $query->where('class_id', $request->class_id);
                })
            ],
            'gender'            => 'required|string',
            'phone'             => 'required|string|max:255',
            'dateofbirth'       => 'required|date',
            'current_address'   => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255'
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($pupil->user->name).'-'.$pupil->user->id.'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = $pupil->user->profile_picture;
        }

        $pupil->user()->update([
            'name'              => $request->name,
            'email'             => $request->email,
            'profile_picture'   => $profile
        ]);

        $pupil->update([
            'parent_id'         => $request->parent_id,
            'class_id'          => $request->class_id,
            'roll_number'       => $request->roll_number,
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            'dateofbirth'       => $request->dateofbirth,
            'current_address'   => $request->current_address,
            'permanent_address' => $request->permanent_address
        ]);

        return redirect()->route('pupil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pupil  $pupil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pupil $pupil)
    {
        $user = User::findOrFail($pupil->user_id);
        $user->student()->delete();
        $user->removeRole('pupil');

        if ($user->delete()) {
            if($user->profile_picture != 'avatar.png') {
                $image_path = public_path() . '/images/profile/' . $user->profile_picture;
                if (is_file($image_path) && file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }

        return back();
    }

}
