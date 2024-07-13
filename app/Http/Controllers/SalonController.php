<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Salon;
use Illuminate\Http\Request;
use App\Http\Resources\SalonResource;
use Illuminate\Support\Facades\Validator;

class SalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saloni = Salon::all();
        return SalonResource::collection($saloni);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'naziv' => 'required|string',
            'vlasnik' => 'required|string',
            'adresa' => 'required|string',
            'grad' => 'required|string',
            'website' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $salon = Salon::create([
            'naziv' => $request->naziv,
            'vlasnik' => $request->vlasnik,
            'adresa' => $request->adresa,
            'grad' => $request->grad,
            'website' => $request->website
        ]);

        return response()->json(['Salon je ubačen u bazu!', new SalonResource($salon)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function show(Salon $salon)
    {
        return new SalonResource($salon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function edit(Salon $salon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salon $salon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salon $salon)
    {
        $salon->delete();
        return response()->json(['Salon je obrisan!', new SalonResource($salon)]);
    }
}
