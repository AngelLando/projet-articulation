<?php

namespace App\Http\Controllers;

use Session;
use App\Type;
use Illuminate\Http\Request;

class TypeAdminController extends Controller
{
    public function index()
    {
        return view('admin.types.index')->with('types', Type::orderBy('created_at', 'desc')->paginate(10));
    }

    public function create()
    {
        return view('admin.types.create')->with('types', Type::all());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required'
        ]);

        $type = Type::create([
            'name' => $request->type
        ]);

        Session::flash('success', 'Le type a été créé!');

        return redirect()->route('types.index');
    }

    public function edit($id)
    {
        $type = Type::find($id);
        return view('admin.types.edit')->with('type', $type);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'type' => 'required'
        ]);

        $type = Type::find($id);
        $type->name = $request->type;
        $type->save();

        Session::flash('success', 'Type mis à jour!');

        return redirect()->route('types.index');
    }

    public function destroy($id)
    {
        Type::destroy($id);

        Session::flash('success', 'Le type a été supprimé!');

        return redirect()->route('types.index');
    }
}
