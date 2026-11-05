<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\ClassroomLink;
use App\Http\Controllers\ClassroomLinkController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CalendarController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| SIGN UP
|--------------------------------------------------------------------------
*/

// Display signup page
Route::get('/signup', function () {
    return view('SIGN_UP');
})->middleware('guest');

// Process signup form
Route::post('/signup', function (Request $request) {
    $validated = $request->validate([
        'fullname' => 'required|string|min:2|max:100',
        'address' => 'required|string|min:5|max:255',
        'age' => 'required|integer|min:1|max:100',
        'username' => 'required|string|min:4|max:30|alpha_dash|unique:users,username',
        'password' => 'required|string|min:8|max:255|confirmed',

        'invite_code' => [
            'required',
            function ($attribute, $value, $fail) {
                $expected = config('services.instructor_signup_code');

                if (
                    !is_string($expected) ||
                    $expected === '' ||
                    !hash_equals($expected, $value)
                ) {
                    $fail('The instructor invitation code is invalid.');
                }
            },
        ],
    ]);

    User::create([
        'name' => $validated['fullname'],
        'username' => $validated['username'],
        'address' => $validated['address'],
        'age' => $validated['age'],
        'password' => $validated['password'],
    ]);

    return redirect('/login')->with(
        'success',
        'Account created successfully! Please login.'
    );
})->middleware('guest');

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return view('LOGIN');
})->middleware('guest');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended('/dashboard');
    }

    return back()
        ->withErrors([
            'username' => 'Invalid username or password.',
        ])
        ->onlyInput('username');
})->middleware('guest');

/*
|--------------------------------------------------------------------------
| PROTECTED PAGES
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard_layout.homepage');
    });

    // Chat
Route::get('/chat', [ChatController::class, 'index'])
    ->name('chat.index');

Route::post('/chat', [ChatController::class, 'store'])
    ->name('chat.store');

   // Calendar
Route::get('/calendar', [CalendarController::class, 'index'])
    ->name('calendar.index');

Route::post('/calendar', [CalendarController::class, 'store'])
    ->name('calendar.store');

Route::put('/calendar/{id}', [CalendarController::class, 'update'])
    ->name('calendar.update');

Route::delete('/calendar/{id}', [CalendarController::class, 'destroy'])
    ->name('calendar.destroy');

    // Online Classes
    Route::get('/online-classes', function () {
        return view('dashboard_layout.online_classes');
    });

    /*
    |--------------------------------------------------------------------------
    | SIA CLASSROOM
    |--------------------------------------------------------------------------
    */

    // Display classroom and saved Google Classroom link
    Route::get('/online-classes/classroom/{block}', function ($block) {

        $allowedBlocks = ['3-A', '3-B', '3-C', '3-D', '3-E', '3-L'];

        abort_unless(in_array($block, $allowedBlocks, true), 404);

        $classroomLink = ClassroomLink::where('block', $block)->first();

        return view(
            'dashboard_layout.sia_classroom',
            compact('block', 'classroomLink')
        );

    })->name('sia.classroom');

    // Add Google Classroom link
    Route::post(
        '/online-classes/classroom/{block}/link',
        [ClassroomLinkController::class, 'store']
    )->name('sia.classroom.link.store');

    // Edit Google Classroom link
    Route::put(
        '/online-classes/classroom/{block}/link',
        [ClassroomLinkController::class, 'update']
    )->name('sia.classroom.link.update');

    // Delete Google Classroom link
    Route::delete(
        '/online-classes/classroom/{block}/link',
        [ClassroomLinkController::class, 'destroy']
    )->name('sia.classroom.link.destroy');

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */
    Route::get('/logout', function () {
        return view('dashboard_layout.logout');
    });

    Route::post('/logout', function (Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with(
            'success',
            'You have successfully logged out.'
        );
    });

});
