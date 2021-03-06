<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if(Auth::check()){
            if($request->user()->getRoleNames()[0] == 'root' || $request->user()->getRoleNames()[0] == 'owner'){
                return view('dashboard');
            }else {
                $texto = trim($request->get('texto'));
                $services = $request->get('services') ?? [];
                $servicesQuery = implode(',', $services) ?? '';
    
                // Queda pendiente filtrar por servicios
                $workspaces = DB::table('workspaces')
                ->select()
                ->where('name', 'LIKE', '%'.$texto.'%')
                ->where('services', 'LIKE', '%'.$servicesQuery.'%')
                ->paginate(6);
    
                return view('home', compact('workspaces', 'texto', 'services'));
            }
        }else {
            $texto = trim($request->get('texto'));
                $services = $request->get('services') ?? [];
                $servicesQuery = implode(',', $services) ?? '';
    
                // Queda pendiente filtrar por servicios
                $workspaces = DB::table('workspaces')
                ->select()
                ->where('name', 'LIKE', '%'.$texto.'%')
                ->where('services', 'LIKE', '%'.$servicesQuery.'%')
                ->paginate(6);
    
                return view('home', compact('workspaces', 'texto', 'services'));
        }

        
        
    }
}
