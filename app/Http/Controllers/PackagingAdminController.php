<?php

namespace App\Http\Controllers;

use Session;
use App\Packaging;
use Illuminate\Http\Request;

class PackagingAdminController extends Controller
{
    public function index()
    {
        return view('admin.packagings.index')->with('packagings', Packaging::orderBy('created_at', 'desc')->paginate(10));
    }

    public function create()
    {
        return view('admin.packagings.create')->with('packagings', Packaging::all());
    }

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

    public function edit($id)
    {
        $packaging = Packaging::find($id);
        return view('admin.packagings.edit')->with('packaging', $packaging);
    }

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

    public function destroy($id)
    {
        Packaging::destroy($id);

        Session::flash('success', 'Le conditionnement a été supprimé!');

        return redirect()->route('conditionnements.index');
    }
}