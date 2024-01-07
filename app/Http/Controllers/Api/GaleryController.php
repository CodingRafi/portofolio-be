<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GaleryController extends Controller
{
    public function index()
    {
        dd('oke');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'file' => 'required|file|max:1024|mimes:jpg,jpeg,png',
            'status' => 'required',
            'ket' => 'required'
        ]);

        if($validate->fails()){
            return [
                'status' => false,
                'message' => 'validation error',
                'errors' => $validate->errors()
            ];
        }

        $file = $request->file('file')->store('galery');

        Galery::create([
            'file' => $file,
            'status' => (boolean) $request->status,
            'ket' => $request->ket
        ]);

        return response()->json([
            'message' => 'Berhasil disimpan'
        ], 200);
    }

    public function show(Galery $galery)
    {
        //
    }

    public function update(Request $request, Galery $galery)
    {
        //
    }

    public function destroy(Galery $galery)
    {
        //
    }
}
