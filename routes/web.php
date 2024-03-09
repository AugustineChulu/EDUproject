<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PupilController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LessonsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

// AUTO GENERATED ROUTES FOR LOGIN REGISTRATION AND VERYFICATION PROCESSES
// Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

require __DIR__.'/auth.php';
// ///////////////////////////////////////////////////////////////////////

Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:admin'])->group(function () {

        // Route::get('/roles-permissions', [RolePermissionController::class, 'roles'])->name('roles-permissions');
        // Route::get('/role-create', [RolePermissionController::class, 'createRole'])->name('role.create');
        // Route::post('/role-store', [RolePermissionController::class, 'storeRole'])->name('role.store');
        // Route::get('/role-edit/{id}', [RolePermissionController::class, 'editRole'])->name('role.edit');
        // Route::put('/role-update/{id}', [RolePermissionController::class, 'updateRole'])->name('role.update');

        // Route::get('/permission-create', [RolePermissionController::class, 'createPermission'])->name('permission.create');
        // Route::post('/permission-store', [RolePermissionController::class, 'storePermission'])->name('permission.store');
        // Route::get('/permission-edit/{id}', [RolePermissionController::class, 'editPermission'])->name('permission.edit');
        // Route::put('/permission-update/{id}', [RolePermissionController::class, 'updatePermission'])->name('permission.update');

        Route::get('assign-subject-to-class/{id}', [ClassesController::class, 'assignSubject'])->name('class.assign.subject');
        Route::post('assign-subject-to-class/{id}', [ClassesController::class, 'storeAssignedSubject'])->name('store.class.assign.subject');

        // Route::resource('assignrole', RoleAssignController::class);
        Route::resource('classes', ClassesController::class);
        Route::resource('subject', SubjectController::class);
        Route::resource('teacher', TeacherController::class);
        Route::resource('guardian', GuardianController::class);
        Route::resource('pupil', PupilController::class);

        Route::get('attendanceReport', [AttendanceController::class, 'generatedByAdmin'])->name('attendance.admin');

    });

//     // Route::middleware(['role:teacher'])->group(function () {
//     //     Route::post('attendance', [AttendanceController::class, 'store'])->name('teacher.attendance.store');
//     //     Route::get('attendance-create/{classid}', [AttendanceController::class, 'createByTeacher'])->name('teacher.attendance.create');
//     //     Route::get('attendanceManagement', [AttendanceController::class, 'teacher'])->name('attendance.teacher');
//     //     Route::get('lessons', [LessonsController::class, 'teacher'])->name('attendance.teacher');
//     // });

//     // Route::middleware(['role:pupil'])->group(function () {
//     //     // No routes for students currently
//     // });

});
