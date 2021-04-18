<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view('workspaces.show', compact('workspace'));
    }

    public function getCreate()
    {
        $data = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->where('model_has_roles.role_id', '=', 2)
            ->select('users.*')->get();

        return view('workspaces.create', compact('data'));
    }

    public function postCreate(Request $request)
    {
        $workspace = new Workspace();

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
