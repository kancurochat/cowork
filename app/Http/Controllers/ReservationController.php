<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{
    public function getReservations(Request $request)
    {

        if ($request->user()->getRoleNames()[0] == 'owner') {
            $reservations = Reservation::join('workspaces', 'workspaces.id', '=', 'reservations.workspace_id')
                ->where('workspaces.user_id', $request->user()->id)->get('reservations.*');
        } else {
            $reservations = Reservation::all();
        }

        return view('reservations.index', compact('reservations'));
    }

    public function show($id)
    {
        $reservation = Reservation::find($id);

        return view('reservations.show', compact('reservation'));
    }

    public function getCreate(Request $request)
    {
        $data = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->where('model_has_roles.role_id', '=', 3)
            ->select('users.*')->get();

        if ($request->user()->getRoleNames()[0] == 'owner') {
            $workspaces = Workspace::where('user_id', $request->user()->id)->get();
        } else {
            $workspaces = Workspace::all();
        }



        return view('reservations.create', compact('data', 'workspaces'));
    }

    public function postCreate(ReservationRequest $request)
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

    public function getEdit(Request $request, $id)
    {
        $reservation = Reservation::find($id);

        $data = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->where('model_has_roles.role_id', '=', 3)
            ->select('users.*')->get();

        if ($request->user()->getRoleNames()[0] == 'owner') {
            $workspaces = Workspace::where('user_id', $request->user()->id)->get();
        } else {
            $workspaces = Workspace::all();
        }

        return view('reservations.edit', compact('reservation', 'data', 'workspaces'));
    }


    public function putEdit(ReservationRequest $request, $id)
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

    public function destroy(Request $request, $id)
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
        $reservation->start = $request->input('start');
        $reservation->end = $request->input('end');

        $reservation->save();

        $redirection = 'workspace/' . $reservation->workspace_id;

        // Esto puede cambiar
        return redirect($redirection);
    }

    public function calendarReservations($id)
    {
        $data = DB::table('reservations')->where('workspace_id', '=', $id)->select('user_id as title', 'date as start', 'date as end', 'start as time_start', 'end as time_end')->get();

        foreach ($data as $event) {
            $event->start = $event->start . 'T' . $event->time_start;
            $event->end = $event->end . 'T' . $event->time_end;
        }

        return Response()->json($data);
    }
}
