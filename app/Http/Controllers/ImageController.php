<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;

class ImageController extends Controller
{
    public function store(Request $request, $productId)
    {
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $product = Product::findOrFail($productId);

    $path = $request->file('image')->store('product_images', 'public');

    $image = new Image(['path' => $path]);
    $product->images()->save($image);

    return response()->json(['message' => 'Imagem salva com sucesso', 'path' => $path], 201);
    }   
}
