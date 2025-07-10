<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //pengambilan data
        $categories = category::all();
        return view('admin.categories.index',[
          'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|image|mimes:png,jpg,svg',
       ]);

       DB::beginTransaction();

       try{
            if($request->hasFile('icon')){
                $iconPath = $request->file('icon')->store('category_icons', 'public');
                $validated['icon'] = $iconPath;
            }
            //slug diisi otomatis menggunakan str
            $validated['slug'] = Str::slug($request->name); //misal: obat sakit -> obat-sakit
            
            //penyimpanan data
            $newCategory = category::create($validated);

            DB::commit();

            return redirect()->route('admin.categories.index');

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
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
        return view('admin.categories.edit',[
          'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        //
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'icon' => 'sometimes|image|mimes:png,jpg,svg',
       ]);

       DB::beginTransaction();

       try{
            if($request->hasFile('icon')){
                $iconPath = $request->file('icon')->store('category_icons', 'public');
                $validated['icon'] = $iconPath;
            }
            //slug diisi otomatis menggunakan str
            $validated['slug'] = Str::slug($request->name); //misal: obat sakit -> obat-sakit
            
            //penyimpanan data
            $category->update($validated);

            DB::commit();

            return redirect()->route('admin.categories.index');

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
    public function destroy(category $category)
    {
        //
        try{
            $category->delete();
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
