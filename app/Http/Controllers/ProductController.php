<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $produto = Product::create($request->all());
        return response()->json($produto, 201);
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $produto = Product::findOrFail($id);
        $produto->update($request->all());
        return response()->json($produto, 200);
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(null, 204);
    }
}
