<?php

namespace App\Http\Controllers;

use App\Model\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Position::all();
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
     * @param  \App\Model\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {

        return new \App\Http\Resources\Position($position);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        //
    }
    public function getlist()
    {
        $position = Position::all();
        return view('admin/positions/list',['position'=> $position]);
    }
    public function getxoa($id)
    {
        $positions = Position::query()->find($id);
        $positions->delete();
        return redirect('admin/position/list')->with('thongbao','Xóa thành công');
    }
    public function getadd()
    {
        return view('admin/positions/add');
    }
    public function postadd(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100|unique:positions,position_name'
            ],
            [
                'name.required'=>'Bạn phải nhập tên',
                'name.min'=>'Tên quá ngắn',
                'name.max'=>'Tên quá dài',
                'name.unique'=>'Đã có tên này',

            ]);
        $position = new Position();
        $position->position_name = $request->name;
        $position->save();
        return redirect('admin/position/list')->with('thongbao','Thêm thành công ');
    }


}
