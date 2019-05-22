<?php

namespace App\Http\Controllers;

use \App\Travel;
use \App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        $travels = Travel::orderBy('datestart', 'ASC')
            ->get();
        return view('welcome', ['travel' => $travels]);
    }

    public function show($id)
    {
        $travels = Travel::where('id', $id)->first();
        $user = User::where('travelId',$id)->count('id');
        return view('travels', compact('travels'), ['userCount' => 'user']);
    }

    public function travelJoin($id)
    {
        $travel = Travel::findOrFail($id);
        $user = Auth::user();

        $user['travelId'] = $travel->id;
        $user->save();
        session()->flash('success', 'Successfully joined for the journey');
        return back();
    }

    public function travelResing($id)
    {
        $user = Auth::user();

        $user['travelId'] = 0;
        $user->save();
        session()->flash('cancel', 'You canceled the trip');
        return back();
    }

    public function store(Request $request)
    {
        $request->validate
        ([
            'title' => 'required|max:150',
            'content' => 'required|max:250',
            'date' => 'required|date',
            'endDate' => 'required|date',
            'maxNumber' => 'required'
        ]);

        $travel = new Travel();
        $travel->title = $request->get('title');
        $travel->content = $request->get('content');
        $travel->datestart = $request->get('date');
        $travel->dateend = $request->get('endDate');
        $travel->maxnumber = $request->get('maxNumber');
        $travel->created_at = NOW();
        $travel->updated_at = NOW();

        $travel->save();

        return redirect('/');
    }

    public function showNew()
    {
        return view('newtravel');
    }
}
