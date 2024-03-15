<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allServices = Service::all();
        return $allServices;
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
        $validator = Validator::make($request->all(), [
            'description' => 'required|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|max:10|unique:services'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $service = new Service();

        $user = Auth::user(); // Obtener la instancia del modelo de usuario actualmente autenticado

        $service->user_id = $user->id;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->sku = $request->sku;

        $service->save();
        return response()->json(['message'=>'Successfully registered service'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $serviceFound = Service::where('id', $id)->first();

        return $serviceFound;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'string',
            'price' => 'numeric',
            'sku' => 'string|max:10'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $service = Service::findOrFail($request->id);

        $service->description = $request->description;
        $service->price = $request->price;
        $service->sku = $request->sku;

        $service->save();
        return $service;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Service::destroy($request->id);
        return response()->json(['message' => 'Successfully removed service']);
    }
}
