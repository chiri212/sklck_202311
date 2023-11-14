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
        $page_max_limit = config('diary.page_max_limit');
        $diaries = Diary::orderBy('created_at', 'desc')->paginate($page_max_limit)->withQueryString();
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
        // ファイル名を取得
        $image_path = $request->file('image')->store('public');

        Diary::create([
            'text' => $request->text,
            'image' => 'storage/' . basename($image_path),
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
        return view('diary.edit', [
            'diary' => $diary,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiaryRequest $request, Diary $diary)
    {
        $diary->text = $request->text;
        $diary->save();
        return redirect()->route('diary.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diary $diary)
    {
        //
    }
}
