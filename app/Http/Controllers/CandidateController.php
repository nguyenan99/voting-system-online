<?php

namespace App\Http\Controllers;

use App\Model\Candidate;
use App\Model\Position;
use App\Model\Vote;
use App\User;
use Illuminate\Http\Request;



class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

        $vote2 = Vote::query()
            ->selectRaw('positions.id as position_id,count(*) as positions_count_vote')
            ->leftJoin('candidates','candidates.id','=','votes.cadidate_id')
            ->leftJoin('positions','positions.id','=','candidates.position_id')
            ->groupBy('positions.id')->get()->keyBy('position_id');
        $position = Position::all()->keyBy('id');
        foreach ($position as $posi)
        {
            if(isset($vote2[$posi->id]))
            {
                $posi->positionCountVote = $vote2[$posi->id]->positions_count_vote;
            }
            else
            {
                $posi->positionCountVote = 0;
            }
        }
        foreach ($candidates as $candi)
        {
            $candi->positionCountVote = $position[$candi->position_id]->positionCountVote;
            $candi->position_name = $position[$candi->position_id]->position_name;
            if($candi->positionCountVote>0)
            {
                $candi->percen = ($candi->countVote/$candi->positionCountVote)*100;
            }
            else{
                $candi->percen = 0;
            }


        }

       return response()->json($candidates);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        return new \App\Http\Resources\Candidate($candidate);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
    public function getList(){
        $candidates = Candidate::all();
        $positions = Position::all();
        return view('admin.candidates.list',['candidates'=>$candidates,'positisons'=>$positions]);
    }
    public function getadd(){
        $positions = Position::all();

        return view('admin.candidates.add',['positions'=> $positions]);
    }
    public function postadd(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100|unique:candidates,candidate_name'
            ],
            [
                'name.required'=>'Bạn phải nhập tên',
                'name.min'=>'Tên quá ngắn',
                'name.max'=>'Tên quá dài',
                'name.unique'=>'Đã có tên này',

            ]);
        $candidate = new Candidate;
        $candidate->candidate_name = $request->name;

        $candidate->position_id = $request->position;

        $candidate->save();
        return redirect('admin/candidate/add')->with('thongbao','Thêm thành công ');
    }
    public function getrepair($id){
        $candidate = Candidate::find($id);
        $position = Position::all();
        return view('admin.candidates.repair',['candidate'=>$candidate,'positions'=>$position]);

    }
    public function postrepair(Request $request,$id){
        $candidate = Candidate::find($id);
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100',
            ],
            [
                'name.required'=>'Bạn phải nhập tên',
                'name.min'=>'Tên quá ngắn',
                'name.max'=>'Tên quá dài',
            ]);
        if($request->name != $candidate->name)
        {
            $this->validate($request,[
                'name'=>'unique:users,name',
            ],[
                'name.unique'=>'Đã có tên ứng viên này',
            ]);
        }
        $candidate->position_id = $request->positon_id;
        $candidate->candidate_name = $request->name;
        $candidate->save();
        return redirect('admin/candidate/list')->with('thongbao','Thay đổi thành công ');
    }
    public function getxoa($id){
        $candidate = Candidate::query()->find($id);
        $candidate->delete();
        return redirect('admin/candidate/list')->with('thongbao','Xóa thành công');
    }
    public function Winner (){
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
        foreach ($position as $posi)
        {

            $posi->maxOfPosition = -1;
            $posi->nameMax = "a";
            foreach ($candidates as $candi)
            {
                if ($posi->maxOfPosition == -1 && $posi->id == $candi->position_id)
                {
                    $posi->maxOfPosition = $candi->countVote;
                    $posi->nameMax = $candi->candidate_name;

                }
                else if($candi->countVote > $posi->maxOfPosition && $posi->id == $candi->position_id)
                {
                    $posi->maxOfPosition = $candi->countVote;
                    $posi->nameMax = $candi->candidate_name;
                }
            }
        }
        return view('admin.pollResult2',['position'=>$position]);
    }
    public function voteOfPosition($id)
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
        foreach ($position as $posi)
        {
            $posi->candidateList = new \ArrayObject();
            foreach ($candidates as $candi)
            {
                if($candi->position_id == $posi->id)
                {
                    $index = $candi->id;
                    $posi->candidateList->append($candi) ;
                }
            }
        }

        foreach ($position as $posi)
        {
            if ($posi->id == $id)
            {
                $posiId = $posi;

                return view('admin/pollResult3',['posiId'=>$posiId]);
            }
        }
    }




}
