<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\comments;

class CommentsController extends Controller
{
    public function comments(Request $request,$book_id)
    {
        $request->validate([
            'content' => 'required|min:1',
        ]);

        $userId = Auth::id();

        $comments = new comments;
        $comments->content = $request->input('content');
        $comments->book_id = $book_id;
        $comments->user_id = $userId ;
        $comments->save();
        return redirect('book/'.$book_id);
    }
}
