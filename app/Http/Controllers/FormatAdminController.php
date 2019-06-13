<?php

namespace App\Http\Controllers;

use Session;
use App\Format;
use Illuminate\Http\Request;

class FormatAdminController extends Controller
{
    public function index()
    {
        return view('admin.formats.index')->with('formats', Format::orderBy('created_at', 'desc')->paginate(10));
    }

    public function create()
    {
        return view('admin.formats.create')->with('formats', Format::all());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'format' => 'required'
        ]);

        $format = Format::create([
            'name' => $request->format
        ]);

        Session::flash('success', 'Le format a été créé!');

        return redirect()->route('formats.index');
    }

    public function edit($id)
    {
        $format = Format::find($id);
        return view('admin.formats.edit')->with('format', $format);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'format' => 'required'
        ]);

        $format = Format::find($id);
        $format->name = $request->format;
        $format->save();

        Session::flash('success', 'Format mis à jour!');

        return redirect()->route('formats.index');
    }

    public function destroy($id)
    {
        Format::destroy($id);

        Session::flash('success', 'Le format a été supprimé!');

        return redirect()->route('formats.index');
    }
}
