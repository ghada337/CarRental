<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.categories.addCategory');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully.');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.editCategory', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->cars()->count() > 0) {
            return back()->with('error', 'Category cannot be deleted because it has associated cars.');
        }

        $category->delete();
        return back()->with('success', 'Category deleted successfully.');
    }
}
