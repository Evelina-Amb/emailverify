<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Auth::routes(['verify' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function ($id, $hash, Request $request) {
    $user = User::findOrFail($id);

    // Validate the hash from the URL
    if (! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        abort(403, 'Neteisinga nuoroda.');
    }

    // Mark email as verified if it's not already
    if (! $user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
    }

    // Log the user in automatically
    Auth::login($user);

    return redirect('/students')->with('message', 'El. paštas patvirtintas! Sveiki prisijungę.');
})->middleware(['signed'])->name('verification.verify');


Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Patvirtinimo laiškas išsiųstas!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// Studentų sąrašas prieinamas visiems
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Grupė, prieinama tik prisijungusiems vartotojams
Route::middleware(['auth'])->group(function () {
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/students/trashed', [StudentController::class, 'trashed'])->name('students.trashed');
    Route::post('/students/{id}/restore', [StudentController::class, 'restore'])->name('students.restore');
    Route::delete('/students/{id}/force-delete', [StudentController::class, 'forceDelete'])->name('students.forceDelete');

});
