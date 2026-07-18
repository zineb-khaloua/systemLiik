<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $clients = Client::select([
                'id',
                'nom_complet',
                'email',
                'telephone',
                'adresse',
                'type',
            ])->withCount('commandes')
              ->withSum('factures','total_ttc');
            return Datatables::of($clients)
                 ->addIndexColumn()
                 ->addColumn('commandes', function($client) {
                    return $client->commandes_count;
                    })
                    ->addColumn('chiffre_affaire', function($client) {
                        // On vérifie si la somme existe pour éviter les erreurs sur 0
                        $somme = $client->factures_sum_total_ttc ?? 0;
                        return number_format($somme, 2, ',', ' ') . ' €';
                    })
                 ->addColumn('actions',function($clients){
                       return view ('datatables.actions',[
                                'id' => $clients->id,
                                'route' => 'clients',
                                'edit' => true,
                                'delete' => true,
                                // 'show' => true,
                       ]);
                    })
                  ->rawColumns(['actions'])    
                 ->make(true);

        }
        return view('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $validated=$request->validate([
             'nom_complet'=>'required|string',
             'email'=>'required|email',
             'telephone'=>'required',
             'type'=>'required',
             'adresse'=>'required',
          ]);
          $client=Client::create($validated);
            return redirect()->route('clients.index')->with('success','Client créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validated=$request->validate([
            'nom_complet'=>'required|string',
            'email'=>'required|email',
            'telephone'=>'required',
            'type'=>'required',
            'adresse'=>'required',
         ]);
         $client->update($validated);
           return redirect()->route('clients.index')->with('success','Client mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        
        $client->delete();
        return response()->json(['success' => 'Client supprimé avec succès']);

    }
}
