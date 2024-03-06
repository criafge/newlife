<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request, Application $application){
        Comment::create([
            'comment' => $request->comment,
            'user_id' => Auth::user()->id,
            'application_id' => $application->id,
        ]);
        return redirect()->back();
    }
}
