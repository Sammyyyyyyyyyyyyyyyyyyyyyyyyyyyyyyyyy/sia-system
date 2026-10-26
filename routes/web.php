<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

// Show Sign Up page
Route::get('/signup', function () {
    return view('SIGN_UP');
});

// Process Sign Up
Route::post('/signup', function (Request $request) {

    $request->validate([
        'fullname' => 'required|string|min:2|max:100',
        'address' => 'required|string|min:5|max:255',
        'age' => 'required|integer|min:1|max:100',
        'username' => 'required|string|min:4|max:30|alpha_dash',
        'password' => 'required|string|min:8|max:255|confirmed',
    ]);

    return redirect('/login')->with(
        'success',
        'Sign up successful! Please login.'
    );
});


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

// Show Login page
Route::get('/login', function () {
    return view('LOGIN');
});

// Process Login
Route::post('/login', function (Request $request) {

    $request->validate([
        'username' => 'required|string|min:4|max:30',
        'password' => 'required|string|min:8|max:255',
    ]);

    return redirect('/dashboard');
});


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

// Main Dashboard / Homepage
Route::get('/dashboard', function () {
    return view('dashboard_layout.homepage');
});


/*
|--------------------------------------------------------------------------
| CHAT
|--------------------------------------------------------------------------
*/

Route::get('/chat', function () {
    return view('dashboard_layout.chat');
});


/*
|--------------------------------------------------------------------------
| CALENDAR
|--------------------------------------------------------------------------
*/

Route::get('/calendar', function () {
    return view('dashboard_layout.calendar');
});


/*
|--------------------------------------------------------------------------
| ONLINE CLASSES
|--------------------------------------------------------------------------
*/

Route::get('/online-classes', function () {
    return view('dashboard_layout.online_classes');
});


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

// Show Logout Confirmation
Route::get('/logout', function () {
    return view('dashboard_layout.logout');
});

// Process Logout
Route::post('/logout', function () {

    return redirect('/login')->with(
        'success',
        'You have successfully logged out.'
    );
});