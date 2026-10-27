<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
Route::get('/signup', function () {
    return view('SIGN_UP');
})->middleware('guest');

Route::post('/signup', function (Request $request) {
    $validated = $request->validate([
        'fullname' => 'required|string|min:2|max:100',
        'address' => 'required|string|min:5|max:255',
        'age' => 'required|integer|min:1|max:100',
        'username' => 'required|string|min:4|max:30|alpha_dash|unique:users,username',
        'password' => 'required|string|min:8|max:255|confirmed',
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

    Route::get('/dashboard', function () {
        return view('dashboard_layout.homepage');
    });

    Route::get('/chat', function () {
        return view('dashboard_layout.chat');
    });

    Route::get('/calendar', function () {
        return view('dashboard_layout.calendar');
    });

    Route::get('/online-classes', function () {
        return view('dashboard_layout.online_classes');
    });

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
