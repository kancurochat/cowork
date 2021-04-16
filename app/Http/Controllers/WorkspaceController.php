<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function getWorkspaces()
    {
        $workspaces = Workspace::all();

        return view('workspaces.index', compact('workspaces'));
    }

    public function show($id)
    {
        $workspace = Workspace::find($id);

        return view('workspaces.show', compact('workspaces'));
    }

    public function getCreate()
    {
        return view('workspaces.create');
    }

    public function postCreate(Request $request)
    {
        $workspaces = new Workspace();

        // TO-DO

        return redirect('workspaces');
    }

    public function getEdit($id)
    {
        $workspace = Workspace::find($id);

        return view('workspaces.edit', compact('workspace'));
    }

    public function putEdit($id) {
        $workspace = Workspace::find($id);

        // TO-DO

        return redirect('workspaces');
    }

    public function destroy($id) {
        $workspace = Workspace::find($id);

        $workspace->delete();

        return redirect('workspaces');
    }
}
