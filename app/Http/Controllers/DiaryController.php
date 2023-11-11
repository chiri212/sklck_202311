<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiaryRequest;
use App\Http\Requests\UpdateDiaryRequest;
use App\Models\Diary;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diaries = Diary::get();

        return view('diary.index', [
            'diaries' => $diaries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('diary.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiaryRequest $request)
    {
        Diary::create([
            'text' => $request->text,
        ]);
        return redirect()->route('diary.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Diary $diary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diary $diary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiaryRequest $request, Diary $diary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diary $diary)
    {
        //
    }
}
