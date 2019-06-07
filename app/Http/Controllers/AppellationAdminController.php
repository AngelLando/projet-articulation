<?php

namespace App\Http\Controllers;

use Session;
use App\Appellation;
use Illuminate\Http\Request;

class AppellationAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.appellations.index')->with('appellations', Appellation::orderBy('created_at', 'desc')->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appellations.create')->with('appellations', Appellation::all());
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
            'appellation' => 'required'
        ]);

        $appellation = Appellation::create([
            'name' => $request->appellation
        ]);

        Session::flash('success', 'L\'appellation a été créée!');

        return redirect()->route('appellations.index');
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
        $appellation = Appellation::find($id);
        return view('admin.appellations.edit')->with('appellation', $appellation);
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
            'appellation' => 'required'
        ]);

        $appellation = Appellation::find($id);
        $appellation->name = $request->appellation;
        $appellation->save();

        Session::flash('success', 'Appellation mise à jour!');

        return redirect()->route('appellations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Appellation::destroy($id);

        Session::flash('success', 'L\'appellation a été supprimée!');

        return redirect()->route('appellations.index');
    }
}
