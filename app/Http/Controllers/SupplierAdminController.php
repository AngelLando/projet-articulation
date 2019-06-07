<?php

namespace App\Http\Controllers;

use Session;
use App\Supplier;
use App\Region;
use Illuminate\Http\Request;

class SupplierAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.suppliers.index')->with('suppliers', Supplier::orderBy('created_at', 'desc')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suppliers.create')->with('suppliers', Supplier::all())
                                             ->with('regions', Region::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.suppliers.edit')->with('supplier', $supplier)
                                            ->with('regions', Region::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::destroy($id);

        Session::flash('success', 'Le fournisseur a été supprimé!');

        return redirect()->route('fournisseurs.index');
    }
}
