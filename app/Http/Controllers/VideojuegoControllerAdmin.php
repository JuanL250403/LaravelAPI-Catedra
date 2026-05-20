<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.videojuegos.listado');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videojuego $videojuego)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videojuego $videojuego)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videojuego $videojuego)
    {
        //
    }
}
