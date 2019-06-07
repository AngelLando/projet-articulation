<?php

namespace App\Http\Controllers;

use Session;
use App\Format;
use Illuminate\Http\Request;

class FormatAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.formats.index')->with('formats', Format::orderBy('created_at', 'desc')->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.formats.create')->with('formats', Format::all());
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
            'format' => 'required'
        ]);

        $format = Format::create([
            'name' => $request->format
        ]);

        Session::flash('success', 'Le format a été créé!');

        return redirect()->route('formats.index');
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
        $format = Format::find($id);
        return view('admin.formats.edit')->with('format', $format);
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
            'format' => 'required'
        ]);

        $format = Format::find($id);
        $format->name = $request->format;
        $format->save();

        Session::flash('success', 'Format mis à jour!');

        return redirect()->route('formats.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Format::destroy($id);

        Session::flash('success', 'Le format a été supprimé!');

        return redirect()->route('formats.index');
    }
}
