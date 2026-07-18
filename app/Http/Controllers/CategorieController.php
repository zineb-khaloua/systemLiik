<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = Categorie::withCount('produits')->get();
            return datatables()->of($categories)
                ->addColumn('actions', function ($row) {
                    return view('datatables.category_actions', [
                        'id' => $row->id,
                        'route' => 'categories',
                        'edit' => true,
                        'delete' => true,
                    ]);
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('categories.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_categorie' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Categorie::create($validated);

        return response()->json(['success' => 'Catégorie créée avec succès.']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $category)
    {
        $validated = $request->validate([
            'nom_categorie' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($validated);

        return response()->json(['success' => 'Catégorie mise à jour avec succès.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $category)
    {
        // On pourrait vérifier si la catégorie contient des produits
        if ($category->produits()->count() > 0) {
            return response()->json(['error' => 'Cette catégorie contient des produits et ne peut pas être supprimée.'], 422);
        }

        $category->delete();

        return response()->json(['success' => 'Catégorie supprimée avec succès.']);
    }
}
