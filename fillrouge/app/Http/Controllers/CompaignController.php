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
            'thumbnail' => 'required|image',
            'country' => 'required',
            'address' => 'required',
            'city' => 'required',
            'region' => 'required',
            'postal' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()
            ->file('thumbnail')
            ->store('thumbnails');

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
        return view('dashboard.edit',
        ['compaign' => $compaign,
    ]);
    }

    public function update(Request $request, Compaign $compaign)
    {
        $attributes = request()->validate([

            'title' => 'required',
            'slug' => ['required', Rule::unique('compaigns', 'slug')->ignore($compaign->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => 'image',
            'country' => 'required',
            'address' => 'required',
            'city' => 'required',
            'region' => 'required',
            'postal' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],

        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        $compaign->update($attributes);
        return redirect('/dashboard')->with('success', 'Post Updated!');
    }

    public function destroy(Compaign $compaign)
    {
        $compaign->delete();

        return back();
    }
}
