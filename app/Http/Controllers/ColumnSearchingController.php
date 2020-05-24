<?php

namespace App\Http\Controllers;
use App\Model\Candidate;
use App\Model\Position;
use App\Model\Vote;
use Illuminate\Http\Request;
class ColumnSearchingController extends Controller
{
    function index()
    {
                $vote  = Vote::query()->selectRaw('cadidate_id,count(*) as count_vote')->groupBy('cadidate_id')->get()->keyBy('cadidate_id');
                $candidates = Candidate::all()->keyBy('id');
                foreach ($candidates as $candi)
                {
                    if(isset($vote[$candi->id]))
                    {
                        $candi->countVote = $vote[$candi->id]->count_vote;
                    }
                    else
                    {
                        $candi->countVote = 0;
                    }
                }

                $position = Position::all();
                foreach ($candidates as $candi)
                {
                    foreach ($position as $posi)
                    {
                        if($candi->position_id == $posi->id)
                        {
                            $candi->position_name = $posi->position_name;
                            break;
                        }
                    }
                }
        return view('admin.pollResult5',['candidates'=>$candidates,'positi' => $position]);
    }
}
