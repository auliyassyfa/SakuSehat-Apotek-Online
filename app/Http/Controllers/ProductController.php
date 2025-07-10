<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //pengambilan data
        $products = Product::with('category')->orderBy('id', 'DESC')->get();
        return view('admin.products.index',[
          'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //pengambilan data
        $categories = Category::all();
        return view('admin.products.create',[
          'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'about' => 'required|string',
            'category_id' => 'required|integer',
            'photo' => 'required|image|mimes:png,jpg,svg',
       ]);

       DB::beginTransaction();

       try{
            if($request->hasFile('photo')){
                $iconPath = $request->file('photo')->store('product_photos', 'public');
                $validated['photo'] = $iconPath;
            }
            //slug diisi otomatis menggunakan str
            $validated['slug'] = Str::slug($request->name); //misal: obat sakit -> obat-sakit

            //penyimpanan data
            $newProduct = Product::create($validated);

            DB::commit();

            return redirect()->route('admin.products.index');

       }catch(\Exception $e){
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['system error!' . $e->getmessage()],
            ]);
            throw $error;
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
        $categories = Category::all();
        return view('admin.products.edit',[
          'product' => $product,
          'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'category_id' => 'required|integer',
            'about' => 'required|string',
            'photo' => 'sometimes|image|mimes:png,jpg,svg',
       ]);

       DB::beginTransaction();

       try{
            if($request->hasFile('photo')){
                $photoPath = $request->file('photo')->store('product_photo', 'public');
                $validated['photo'] = $photoPath;
            }
            //slug diisi otomatis menggunakan str
            $validated['slug'] = Str::slug($request->name); //misal: obat sakit -> obat-sakit
            
            //penyimpanan data
            $product->update($validated);

            DB::commit();

            return redirect()->route('admin.products.index');

       }catch(\Exception $e){
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['system error!' . $e->getmessage()],
            ]);
            throw $error;
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
        try{
            $product->delete();
            return redirect()->back();
        }catch(\Exception $e){
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['system error!' . $e->getmessage()],
            ]);
            throw $error;
       }
    }
}
