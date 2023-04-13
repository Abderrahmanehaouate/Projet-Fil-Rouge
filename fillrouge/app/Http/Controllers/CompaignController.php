<?php

namespace App\Http\Controllers;

use App\Models\Compaign;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class CompaignController extends Controller
{
    public function index()
    {
        return view('compaigns.index', [
            'compaigns' => Compaign::take(3)->get(),
        ]);
    }

    public function donation()
    {
        return view('compaigns.donation', [
            'compaigns' => Compaign::all(),
        ]);
    }

    public function create()
    {
        return view('dashboard.dashboard');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('compaigns', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->id();

        Compaign::create($attributes);

        return redirect('/dashboard');
    }

    public function show(Compaign $compaign)
    {
        return view('compaigns.show', [
            'compaign' => $compaign,
        ]);
    }

    public function edit(Compaign $compaign)
    {
    }

    public function update(Request $request, Compaign $compaign)
    {
    }

    public function destroy(Compaign $compaign)
    {
    }
}
