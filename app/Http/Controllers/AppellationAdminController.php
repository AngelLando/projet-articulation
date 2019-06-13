<?php

namespace App\Http\Controllers;

use Session;
use App\Appellation;
use Illuminate\Http\Request;

class AppellationAdminController extends Controller
{
    public function index()
    {
        return view('admin.appellations.index')->with('appellations', Appellation::orderBy('created_at', 'desc')->paginate(10));
    }

    public function create()
    {
        return view('admin.appellations.create')->with('appellations', Appellation::all());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'appellation' => 'required'
        ]);

        $appellation = Appellation::create([
            'name' => $request->appellation
        ]);

        Session::flash('success', 'L\'appellation a été créée!');

        return redirect()->route('appellations.index');
    }

    public function edit($id)
    {
        $appellation = Appellation::find($id);
        return view('admin.appellations.edit')->with('appellation', $appellation);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'appellation' => 'required'
        ]);

        $appellation = Appellation::find($id);
        $appellation->name = $request->appellation;
        $appellation->save();

        Session::flash('success', 'Appellation mise à jour!');

        return redirect()->route('appellations.index');
    }

    public function destroy($id)
    {
        Appellation::destroy($id);

        Session::flash('success', 'L\'appellation a été supprimée!');

        return redirect()->route('appellations.index');
    }
}
