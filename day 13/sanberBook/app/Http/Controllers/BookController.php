<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\genres;
use App\Models\books;
use App\Models\comments;
use Illuminate\Support\Facades\File; 
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller implements HasMiddleware
{
    // Middleware 
    public static function middleware(): array
    {
        return [
            new Middleware(isAdmin::class, except: ['index','show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book=books::all();
        return view('book.index',['book'=>$book]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre=genres::all();
        return view('book.create',['genre'=>$genre]);    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:books',
            'summary' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
            'stok' => 'required',
            'genre_id' => 'required'
        ]);
        $books = new books;


        $newImageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('image'), $newImageName);

        $books->title = $request->input('title');
        $books->summary = $request->input('summary');
        $books->stok = $request->input('stok');
        $books->genre_id = $request->input('genre_id');
        $books->image = $newImageName;
        $books->save();
 
        return redirect('/book');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = books::find($id);
        return view ('book.show',['book'=>$book]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = books::find($id);
        $genre= genres::all();
        return view ('book.edit',['book'=>$book,'genre'=> $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|unique:books',
            'summary' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
            'stok' => 'required',
            'genre_id' => 'required'
        ]);

        $book = books::find($id);

        if( $request->has('image')){
            // hapus data lama
            File::delete('image/' . $book->image);
            $newImageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('image'), $newImageName);
            $book->image = $newImageName;
        }
        $book->title = $request->input('title');
        $book->summary = $request->input('summary');
        $book->stok = $request->input('stok');
        $book->genre_id = $request->input('genre_id');
        $book->save();

        return redirect('/book');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = books::find($id);
        File::delete('image/' . $book->image);
        $book->delete();
        return redirect('/book');
    }
    

}
