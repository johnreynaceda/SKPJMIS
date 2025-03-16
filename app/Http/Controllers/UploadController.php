<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('canvas')) {
            $file = $request->file('canvas');
            $filename = uniqid() . '.png';
            $path = $file->storeAs('proofs', $filename, 'public'); // Save in storage/app/public/proofs

            return response()->json(['status' => 'success', 'filename' => $path]);
        }

        return response()->json(['status' => 'error', 'message' => 'No file uploaded']);
    }
}
