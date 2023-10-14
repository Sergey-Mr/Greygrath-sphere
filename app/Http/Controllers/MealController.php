<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MealController extends Controller
{
    public function create()
    {
        return view('create');
    }
    
    public function index(): View
    {
        $registrations = auth()->user()->registrations;
        return view('my_meals', compact('registrations'));
    }

    public function store(Request $request)
    {
        Meal::create([
            'date'=> $request->get('date'),
            'flag'=> $request->get('flag'),
            'note'=> $request->get('note'),
            'user_id' => auth()->user()->getKey(),
        ]);

        return redirect()->route('dashboard');

    }
}
