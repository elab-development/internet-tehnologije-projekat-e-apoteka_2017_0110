<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Musterija;
use Illuminate\Http\Request;
use App\Http\Resources\MusterijaResource;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musterije = Musterija::all();
        return MusterijaResource::collection($musterije);
    }
}

