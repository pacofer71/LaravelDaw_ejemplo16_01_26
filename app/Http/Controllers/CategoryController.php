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
        $categorias=Category::orderBy('id', 'desc')->get();
        return view('categories.inicio', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(self::rules());
        Category::create($request->all());
        return redirect()->route('categories.index')->with('mensaje', 'Categoria guardada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('mensaje', 'Categoria borrada');

    }

    private static function rules(?int $id=null): array{
        return [
            'nombre'=>['required', 'string', 'min:3', 'max:30', 'unique:categories,nombre,'.$id],
            'color'=>['required', 'color'],
        ];
    }
}
