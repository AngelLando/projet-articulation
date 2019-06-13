<?php

namespace App\Http\Controllers;

use Session;
use App\Promotion;
use Illuminate\Http\Request;

class PromotionAdminController extends Controller
{
    public function index()
    {
        return view('admin.promotions.index')->with('promotions', Promotion::orderBy('created_at', 'desc')->paginate(10));
    }

    public function create()
    {
        return view('admin.promotions.create')->with('promotions', Promotion::all());
    }

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

    public function edit($id)
    {
        $promotion = Promotion::find($id);
        return view('admin.promotions.edit')->with('promotion', $promotion);
    }

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

    public function destroy($id)
    {
        Promotion::destroy($id);

        Session::flash('success', 'La promotion a été supprimée!');

        return redirect()->route('promotions.index');
    }
}
