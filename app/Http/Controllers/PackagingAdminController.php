<?php

namespace App\Http\Controllers;

use Session;
use App\Packaging;
use Illuminate\Http\Request;

class PackagingAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.packagings.index')->with('packagings', Packaging::orderBy('created_at', 'desc')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.packagings.create')->with('packagings', Packaging::all());
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
            'packaging' => 'required',
            'capacity' => 'required|numeric'
        ]);

        $packaging = Packaging::create([
            'type' => $request->packaging,
            'capacity' => $request->capacity
        ]);

        Session::flash('success', 'Le conditionnement a été créé!');

        return redirect()->route('conditionnements.index');
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
        $packaging = Packaging::find($id);
        return view('admin.packagings.edit')->with('packaging', $packaging);
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
            'packaging' => 'required',
            'capacity' => 'required|numeric'
        ]);

        $packaging = Packaging::find($id);
        $packaging->type = $request->packaging;
        $packaging->capacity = $request->capacity;
        $packaging->save();

        Session::flash('success', 'Conditionnement mis à jour!');

        return redirect()->route('conditionnements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Packaging::destroy($id);

        Session::flash('success', 'Le conditionnement a été supprimé!');

        return redirect()->route('conditionnements.index');
    }
}
