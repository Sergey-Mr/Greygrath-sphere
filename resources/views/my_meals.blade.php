use App\Http\Controllers\MyMealsController;

Route::get('/my-meals', [MyMealsController::class, 'index']);

// FILEPATH: /var/www/greygarth_booker/app/Http/Controllers/MyMealsController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Registration;

class MyMealsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $registrations = Registration::where('user_id', $user->id)->get();
        return view('my_meals', ['registrations' => $registrations]);
    }
}

<!-- FILEPATH: /var/www/greygarth_booker/resources/views/my_meals.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>My Meals</h1>
    <table>
        <thead>
            <tr>
                <th>Meal</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrations as $registration)
                <tr>
                    <td>{{ $registration->date }}</td>
                    <td>{{ $registration->time }}</td>
                    <td>{{ $registration->note}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
