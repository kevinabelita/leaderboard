<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showAllParticipants()
    {
        return response()->json(Participant::orderByDesc('points')->get(['id', 'name', 'points']));
    }

    public function showParticipant($id, Request $request)
    {
        return response()->json(Participant::find($id));
    }

    public function addNewParticipant(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required|numeric|min:0',
            'address' => 'required',
        ]);

        $participant = Participant::create($request->all());

        return response()->json($participant, 201);
    }

    public function updateParticipantPoint($id, $action, Request $request)
    {
        $participant = Participant::findOrFail($id);
        $participant->{$action}('points');
        $participant->save();

        return response()->json(['points' => $participant['points']], 200);
    }

    public function removeParticipant($id)
    {
        Participant::findOrFail($id)->delete();

        return response('Removed Successfully', 200);
    }
}
