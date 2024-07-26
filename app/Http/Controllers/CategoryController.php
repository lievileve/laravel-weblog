<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a list of all categories.
     */
    public function index(){
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create(){
        return view('categories.create');
    }

    /**
     * Store a newly created category in database.
     */
    public function store(StoreCategoryRequest $request){
        $validated = $request->validated();

        $category = new Category([
            'name' => $validated['name'],
        ]);
        $category->save();

        return redirect('/categories');
    }

    public function posts(Category $category){
        $posts = $category->posts;

        return view('categories.posts', compact('category', 'posts'));
    }

}
