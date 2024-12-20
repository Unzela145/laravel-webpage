<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Store the image and get its path
    $imagePath = $request->file('image')->store('images', 'public');

    // Save the product with the image URL in the database
    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'image_url' => $imagePath, // Store the relative path
    ]);

    return redirect()->route('products.index');
}
public function index()
    {
        // Fetch all products
        $products = Product::all();

        // Return the view with products data
        return view('products.index', compact('products'));
    }
    

}
