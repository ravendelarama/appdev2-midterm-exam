<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response("Display all products.", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response("Product created successfully.", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response("Display product with ID: " . $id, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response("Product with ID: " . $id . " updated successfully.", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response("Product with ID: " . $id . " deleted successfully.", 200);
    }

    public function uploadImageLocal(Request $request)
    {
        $file = $request->file('image');

        Storage::disk('local')->put('/products/', $file);

        return response("Image successfully stored in local disk driver.", 201);
    }

    public function uploadImagePublic(Request $request)
    {
        $file = $request->file('image');

        Storage::disk('public')->put('/products/', $file);

        return response("Image successfully stored in public disk driver.", 201);
    }
}
