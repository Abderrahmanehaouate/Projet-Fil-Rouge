<?php

namespace App\Http\Controllers;
use App\Models\Compaign;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Compaign $compaign)
    {
        request()->validate([
            'body' => 'required'
        ]);
        $compaign->comments()->create([
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);
        return back();
    }
}
