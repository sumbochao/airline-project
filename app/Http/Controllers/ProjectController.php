<?php

namespace App\Http\Controllers;

use App\Flight;
use App\the;
use Illuminate\Http\Request;
use DB;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $the = new the();
        $the -> loai_the = $request->get('radio');
        $the ->ma_the = $request->get('sothe');
        $the -> ten = $request->get('ten');
        $the->hsd = $request->get('hsd');
        $the->save();
        return redirect('hoanthanh');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request){
        $flights = DB::table('chuyenbay')
            ->join('giave','chuyenbay.giave_id','=','giave.id')
            ->join('maybay','chuyenbay.maybay_id','=','maybay.id')
            ->where('noidi','LIKE',$request->diemdi)
            ->where('noiden','LIKE',$request->diemden)
            ->whereDate('ngaykhoihanh',$request->ngaydi)
            ->get();
        return view('Muave',compact('flights'));
    }
}
