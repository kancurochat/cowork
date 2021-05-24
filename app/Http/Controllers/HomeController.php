<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->user()->getRoleNames()[0] == 'root' || $request->user()->getRoleNames()[0] == 'owner'){
            return view('dashboard');
        }else {
            $workspaces = Workspace::paginate(6);
            return view('home', compact('workspaces'));
        }
        
    }
}
