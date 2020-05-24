<?php

namespace App\Http\Controllers;

use App\Model\Candidate;
use App\Model\Position;
use App\Model\Vote;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\VoteResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return VoteResource
     */




    public function show($id)
    {
        return new VoteResource(Vote::find($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Vote $vote
     * @return void
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Vote $vote
     * @return void
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vote $vote
     * @return void
     */
    public function destroy(Vote $vote)
    {
        //
    }
    public function history_vote($userId){

        $customer = User::query()->find($userId);

        $user_id = $customer->id;


        $position = Position::all();
        $vote = Vote::query()
            ->select(['candidates.candidate_name','candidates.position_id','votes.voter_id'])
        ->leftJoin('candidates','cadidate_id','candidates.id')->leftJoin('positions','positions.id','candidates.position_id')
            ->where('votes.voter_id','=',$user_id)
        ->get();

//        $vote = Vote::query()
//            ->select(['votes.voter_id','candidates.candidate_name','positions.position_name','candidates.position_id'])
//            ->where('voter_id','=',$id)
//            ->leftJoin('candidates','candidates.id','=','votes.cadidate_id')
//            ->leftJoin('positions','positions.id','=','candidates.position_id')
//            ->get();


        return view('customer.history_vote',['position'=>$position,'vote'=>$vote]);
    }
    public function getStartVote($id)
    {
        $positionVote = Position::find($id);
        $cadidate = Candidate::query()->where('position_id','=',$id)->get();

        return view('customer.vote',['cadidateVote'=>$cadidate,'positionVote'=>$positionVote]);
    }
    public function postStartVote(Request $request)
    {

        $user = Auth::user();
        $vote = new Vote();
        $vote->cadidate_id = $request->candidate_id;

        $vote->voter_id = $user->id;

        $a = $vote->save();
        return redirect('customer/history_vote/'.$user->id);
    }
}
