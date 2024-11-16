<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        return response()->json($foods); // Mengembalikan daftar makanan dalam bentuk JSON
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'description' => 'required|max:255',
        'price' => 'required|numeric',
        'image' => 'required|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public');
        $validated['image'] = $path;
    }

    $food = Food::create($validated);

    return response()->json($food, 201); // Mengembalikan respons JSON
}


    public function destroy(Food $food)
    {
        $food->delete();
        return response()->json(null, 204); // Mengembalikan respons JSON setelah penghapusan
    }
}
