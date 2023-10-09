<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;
use App\Models\Diary;

class DiaryController extends Controller
{

    public function show_top()
    {
        $latestId = Diary::max('id');

        return view('top', ['latestId' => $latestId]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $diarys = Diary::findOrFail($id);
        // $latestId = DB::table('diarys')->max('id');
        $latestId = Diary::max('id');
        $firstId = Diary::min('id');
        // dd($latestId);

        return view('history', ['diarys' => $diarys, 'latestId' => $latestId, 'firstId' => $firstId]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $latestId = Diary::max('id');
        $firstId = Diary::min('id');

        return view('create', ['latestId' => $latestId, 'firstId' => $firstId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $latestId = Diary::max('id');
        $diary = Diary::create([
            'sentence' => $request->input('sentence'),
            'sentence_en' => $request->input('sentence_en'),
        ]);
        if ($diary) {
            \Session::flash('success_msg', '日記を登録しました。');
            return redirect()->route('history', ['latestId' => $latestId + 1]);
        } else {
            \Session::flash('err_msg', '日記の登録に失敗しました。');
            return back(); // 直前のページにリダイレクト
        }
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
        $diarys = Diary::findOrFail($id);
        $latestId = Diary::max('id');
        // dd(Diary::findOrFail($id));
        return view('edit', ['id' => $latestId + 1], compact('diarys'));
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
}
