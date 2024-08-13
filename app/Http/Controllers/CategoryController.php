<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_Category = Category::all();
        return view('admin.add_category',compact('all_Category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required||unique:categories,name'
           ]);

         try {
            // Create the category using validated data
            Category::create($validateData);

            // Redirect with success message
            return redirect()->route('type.index')->with('success', 'Category added successfully.');

        } catch (QueryException $e) {
            // Handle query exception and redirect with error message
            return redirect()->back()->withErrors(['name' => 'The category name already exists.'])->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.edit_category', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //return $id;
        // Validate and update the category
        $validatedData = $request->validate([
            'name' => 'required|string|unique:categories,name,' . $id,
        ]);
        try {
            $category = Category::find($id);
            $category->name = $request->name;
            $category->save();

            return redirect()->route('type.index')->with('success', 'Category updated successfully.');
        } catch (QueryException $e) {
            // Handle query exception and redirect with error message
            return redirect()->back()->withErrors(['name' => 'The category name already exists.'])->withInput();
        }

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
           // Find the category by ID
           $category = Category::find($id);

           // Check if the category exists
           if ($category) {
               // Delete the category
               $category->delete();
   
               // Return a success message
               return redirect()->route('type.index')->with('success', 'Category deleted successfully.');
           } else {
               // Return an error message if the category doesn't exist
               return redirect()->route('type.index')->with('error', 'Category not found.');
           }
    }
}
