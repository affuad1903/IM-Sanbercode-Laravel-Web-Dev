<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\isAdmin;
use App\Models\genres;

class GenreController extends Controller implements HasMiddleware
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
        $genre = genres::all();
        return view('genre.index', ["genre"=>$genre]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'name' => 'required|unique:genres',
            'description' => 'required',
        ]);
                
        //Insert Data
        DB::table('genres')->insert([
            "name" => $request["name"],
            "description" => $request["description"],
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
            ]);
        return redirect('/genre');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Show Data
        $genre = genres::find($id);
        return view('genre.show', ["genre"=>$genre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = DB::table('genres')->where('id', $id)->first();
        return view('genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:genres',
            'description' => 'required',
        ]);
        DB::table('genres')
            ->where('id', $id)
            ->update([
                'name' => $request["name"],
                'description' => $request["description"],
                "updated_at" => Carbon::now()
        ]);
        return redirect('/genre');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('genres')->where('id', $id)->delete();
        return redirect('/genre');
    }
}
