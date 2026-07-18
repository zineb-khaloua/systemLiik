<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;
use Yajra\DataTables\Facades\DataTables;


class FournisseurController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $fournisseurs = Fournisseur::select([
                'id',
                'nom_fournisseur',
                'contact_nom',
                'telephone',
                'email',
                'adresse',
            ]);

            return Datatables::of($fournisseurs)
                ->addColumn('actions', function ($fournisseur) {
                    return view('datatables.actions', [
                        'id' => $fournisseur->id,
                        'route' => 'fournisseurs',
                        'edit' => true,
                        'delete' => true,
                    ]);
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('fournisseurs.index');
    }

    public function create()
    {
        return view('fournisseurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_fournisseur' => 'required|string|max:255',
            'contact_nom' => 'required|string|max:255',
            'type_fournisseur' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string',
            'documents' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
        ]);

        $data = $request->except(['_token', 'documents']);

        // Gestion de l'upload du document
        if ($request->hasFile('documents')) {
            $file = $request->file('documents');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/fournisseurs'), $filename);
            $data['documents'] = 'uploads/fournisseurs/' . $filename;
        }

        Fournisseur::create($data);

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur ajouté avec succès.');
    }

    public function edit(Fournisseur $fournisseur)
    {
        return view('fournisseurs.edit', compact('fournisseur'));
    }

    public function update(Request $request, Fournisseur $fournisseur)
    {
        $request->validate([
            'nom_fournisseur' => 'required|string|max:255',
            'contact_nom' => 'required|string|max:255',
            'type_fournisseur' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string',
            'documents' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
        ]);

        $data = $request->except(['_token', '_method', 'documents']);

        // Gestion de l'upload du document
        if ($request->hasFile('documents')) {
            // Supprimer l'ancien document s'il existe
            if ($fournisseur->documents && file_exists(public_path($fournisseur->documents))) {
                unlink(public_path($fournisseur->documents));
            }

            $file = $request->file('documents');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/fournisseurs'), $filename);
            $data['documents'] = 'uploads/fournisseurs/' . $filename;
        }

        $fournisseur->update($data);

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur mis à jour avec succès.');
    }

    public function destroy(Fournisseur $fournisseur)
    {
        // Supprimer le document associé s'il existe
        if ($fournisseur->documents && file_exists(public_path($fournisseur->documents))) {
            unlink(public_path($fournisseur->documents));
        }

        $fournisseur->delete();

        return response()->json(['success' => 'Fournisseur supprimé avec succès.']);
    }

}
