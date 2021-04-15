<?php

namespace App\Http\Controllers;

use App\Models\SpaceType;
use Illuminate\Http\Request;

class SpaceTypeController extends Controller
{
    public function getTypes()
    {

        $types = SpaceType::all();

        return view('types.index', compact('types'));
    }

    public function getCreate()
    {
        return view('types.create');
    }

    public function postCreate(Request $request)
    {
        $type = new SpaceType();

        $type->name = $request->input('name');

        $type->save();

        return redirect('types');
    }

    public function getEdit($id)
    {
        $type = SpaceType::find($id);

        return view('types.edit', compact('type'));
    }

    public function putEdit(Request $request, $id)
    {
        $type = SpaceType::find($id);

        $type->name = $request->input('name');

        $type->save();

        return redirect('types');
    }

    public function destroy($id)
    {
        $type = SpaceType::find($id);

        $type->delete();

        return redirect('types');
    }
}
