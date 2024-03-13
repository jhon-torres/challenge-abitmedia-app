<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Software;
use App\Models\License;
use Illuminate\Support\Facades\Validator;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allSoftware = Software::all();
        return $allSoftware;
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
            'os' => 'required|string',
            'stock' => 'required|integer',
            'sku' => 'required|string|max:10|unique:software'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $software = new Software();

        $software->description = $request->description;
        $software->price = $request->price;
        $software->os = $request->os;
        $software->stock = $request->stock;
        $software->sku = $request->sku;

        $software->save();

        // se genera la licencia al crear un software
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        function generate_string($input, $strength = 100)
        {
            $input_length = strlen($input);
            $random_string = '';
            for ($i = 0; $i < $strength; $i++) {
                $random_character = $input[mt_rand(0, $input_length - 1)];
                $random_string .= $random_character;
            }
            return $random_string;
        }
        $license = new License();
        $serial = generate_string($permitted_chars, 100);

        // se valida si ya existe el serial en la BD
        $licenseFound = License::where('serial', $serial)->first();

        while ($licenseFound != null) {
            $serial = generate_string($permitted_chars, 100);
            $licenseFound = License::where('serial', $serial)->first();
        }

        $license->product_id = $software->id;
        $license->serial = $serial;

        $license->save();

        return response()->json(['message' => 'Successfully registered software'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
            'os' => 'string',
            'stock' => 'integer',
            'sku' => 'string|max:10'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $software = Software::findOrFail($request->id);

        $software->description = $request->description;
        $software->price = $request->price;
        $software->os = $request->os;
        $software->stock = $request->stock;
        $software->sku = $request->sku;

        $software->save();
        return $software;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Software::destroy($request->id);
        return response()->json(['message' => 'Successfully removed software']);
    }
}
