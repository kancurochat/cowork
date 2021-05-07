<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function getReservations()
    {
        $reservations = Reservation::all();

        return view('reservations.index', compact('reservations'));
    }

    public function show($id)
    {
        $reservation = Reservation::find($id);

        return view('reservations.show', compact('reservation'));
    }

    public function getCreate()
    {
        $data = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->where('model_has_roles.role_id', '=', 3)
            ->select('users.*')->get();

        $workspaces = Workspace::all();

        return view('reservations.create', compact('data', 'workspaces'));
    }

    public function postCreate(Request $request)
    {
        $reservation = new Reservation();

        $reservation->user_id = $request->input('user');
        $reservation->date = $request->input('date');
        $reservation->start = $request->input('start');
        $reservation->end = $request->input('end');
        $reservation->workspace_id = $request->input('workspace');

        $reservation->save();

        return redirect('reservations');
    }

    public function getEdit($id)
    {
        $reservation = Reservation::find($id);

        $data = DB::table('users')
        ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->where('model_has_roles.role_id', '=', 3)
        ->select('users.*')->get();

        $workspaces = Workspace::all();

        return view('reservations.edit', compact('reservation', 'data', 'workspaces'));
    }

    public function putEdit(Request $request, $id)
    {
        $reservation = Reservation::find($id);

        $reservation->user_id = $request->input('user');
        $reservation->date = $request->input('date');
        $reservation->start = $request->input('start');
        $reservation->end = $request->input('end');
        $reservation->workspace_id = $request->input('workspace');

        $reservation->save();

        return redirect('reservations');
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id);

        $reservation->delete();

        return redirect('reservations');
    }

    public function makeReservation(Request $request)
    {
        $reservation = new Reservation();

        $reservation->user_id = $request->input('user');
        $reservation->date = $request->input('date');
        $reservation->workspace_id = $request->input('workspace');

        if(str_ends_with($request->input('start'), 'PM')){
            // TO-DO descubrir qué hacer para transformar las horas a formato 24h
        }

        $reservation->start = $request->input('start');
        $reservation->end = $request->input('end');

        $reservation->save();

        return redirect('reservations');
    }

}
