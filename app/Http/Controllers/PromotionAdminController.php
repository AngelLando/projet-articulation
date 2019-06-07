<?php

namespace App\Http\Controllers;

use Session;
use App\Promotion;
use Illuminate\Http\Request;

class PromotionAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.promotions.index')->with('promotions', Promotion::orderBy('created_at', 'desc')->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promotions.create')->with('promotions', Promotion::all());
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
            'promotion' => 'required',
            'amount' => 'required|numeric|max:100'
        ]);

        $promotion = Promotion::create([
            'type' => $request->promotion,
            'amount' => $request->amount
        ]);

        Session::flash('success', 'La promotion a été créée!');

        return redirect()->route('promotions.index');
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
        $promotion = Promotion::find($id);
        return view('admin.promotions.edit')->with('promotion', $promotion);
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
            'promotion' => 'required',
            'amount' => 'required|numeric|max:100'
        ]);

        $promotion = Promotion::find($id);
        $promotion->type = $request->promotion;
        $promotion->amount = $request->amount;
        $promotion->save();

        Session::flash('success', 'Promotion mise à jour!');

        return redirect()->route('promotions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Promotion::destroy($id);

        Session::flash('success', 'La promotion a été supprimée!');

        return redirect()->route('promotions.index');
    }
}
