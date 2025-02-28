<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function index()
    {
        $genre = DB::table('genres')->get();
        return view('genre.index', compact('genre'));
    }
    public function create()
    {
        return view('genre.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres',
            'description' => 'required',
        ]);
        $query = DB::table('genres')->insert([
            "name" => $request["name"],
            "description" => $request["description"],
            "created_at" => now(),
            "updated_at" => now()
        ]);
        return redirect('/genre');
    }
    public function show($id)
    {
        $genre = DB::table('genres')->where('id', $id)->first();
        return view('genre.show', compact('genre'));
    }
    public function edit($id)
    {
        $genre = DB::table('genres')->where('id', $id)->first();
        return view('genre.edit', compact('genre'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres',
            'description' => 'required',
        ]);

        $query = DB::table('genres')
            ->where('id', $id)
            ->update([
                'name' => $request["name"],
                'description' => $request["description"],
                "updated_at" => now()
            ]);
        return redirect('/genre');
    }
    
    public function destroy($id)
    {
        $query = DB::table('genres')->where('id', $id)->delete();
        return redirect('/genre');
    }
}
