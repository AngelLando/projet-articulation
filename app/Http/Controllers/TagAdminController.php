<?php

namespace App\Http\Controllers;

use Session;
use App\Tag;
use Illuminate\Http\Request;

class TagAdminController extends Controller
{
    public function index()
    {
        return view('admin.tags.index')->with('tags', Tag::orderBy('created_at', 'desc')->paginate(10));
    }

    public function create()
    {
        return view('admin.tags.create')->with('tags', Tag::all());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tag' => 'required'
        ]);

        $tag = Tag::create([
            'name' => $request->tag
        ]);

        Session::flash('success', 'Le tag a été créé!');

        return redirect()->route('tags.index');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit')->with('tag', $tag);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tag' => 'required'
        ]);

        $tag = Tag::find($id);
        $tag->name = $request->tag;
        $tag->save();

        Session::flash('success', 'Tag mis à jour!');

        return redirect()->route('tags.index');
    }

    public function destroy($id)
    {
        Tag::destroy($id);

        Session::flash('success', 'Le tag a été supprimé!');

        return redirect()->route('tags.index');
    }
}
