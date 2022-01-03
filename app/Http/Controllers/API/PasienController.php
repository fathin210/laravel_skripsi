<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    //
    public function login(Request $request){
        if(!Auth::attempt($request->only(['nomor_pasien','nama']))){
            return response()->json(['message' => "Unauthorized"],401);
        }

        $pasien = Pasien::where('nomor_pasien', $request['nomor_pasien'])->firstOrFail();

        $token = $pasien->createToken('auth_token')->plainTextToken;

        return response()->json(
            ['message' => 'Hi '.$pasien->nama.', welcome to home', 'access_token' => $token, 'token_type' => 'Bearer']
        );
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'nullable'
        ]);

        $input = $request->all();
        try {
            $pasien = Pasien::create($input);
            return messageResponse("Sukses membuat data pasien baru");
        } catch (\Throwable $e) {
            return messageResponse($e);
        }
    }

    public function messageResponse($message){
        return response()->json([
            'message' => $message
        ]);
    }
}


