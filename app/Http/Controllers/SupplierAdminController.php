<?php

namespace App\Http\Controllers;

use Session;
use App\Supplier;
use App\Region;
use Illuminate\Http\Request;

class SupplierAdminController extends Controller
{
    public function index()
    {
        return view('admin.suppliers.index')->with('suppliers', Supplier::orderBy('created_at', 'desc')->paginate(10));
    }

    public function create()
    {
        return view('admin.suppliers.create')->with('suppliers', Supplier::all())
                                             ->with('regions', Region::all());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'supplier' => 'required',
            'url_website' => 'required|url',
            'region' => 'required'
        ]);

        $supplier = Supplier::create([
            'name' => $request->supplier,
            'url_website' => $request->url_website,
            'region_id' => $request->region
        ]);

        Session::flash('success', 'Le fournisseur a été créé!');

        return redirect()->route('fournisseurs.index');
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.suppliers.edit')->with('supplier', $supplier)
                                            ->with('regions', Region::all());
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'supplier' => 'required',
            'url_website' => 'required|url'
        ]);

        $supplier = Supplier::find($id);
        $supplier->name = $request->supplier;
        $supplier->url_website = $request->url_website;
        $supplier->region_id = $request->region;
        $supplier->save();

        Session::flash('success', 'Fournisseur mis à jour!');

        return redirect()->route('fournisseurs.index');
    }

    public function destroy($id)
    {
        Supplier::destroy($id);

        Session::flash('success', 'Le fournisseur a été supprimé!');

        return redirect()->route('fournisseurs.index');
    }
}
