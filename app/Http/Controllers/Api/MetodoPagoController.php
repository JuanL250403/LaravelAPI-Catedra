<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MetodoPagoResource;
use App\Models\MetodosPago;
use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metodos = MetodosPago::all();
        return MetodoPagoResource::collection($metodos);
    }

}
