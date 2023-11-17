<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiaryRequest;
use App\Http\Requests\UpdateDiaryRequest;
use App\Models\Diary;
use Illuminate\Support\Facades\Storage;

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
        // 画像を保存してファイルパスを取得
        $file_name = null;
        if ($request->file('image')){
            $image_path = $request->file('image')->store('public');
            $file_name = basename($image_path);
        }
        Diary::create([
            'text' => $request->text,
            'image' => $file_name,
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
        // 画像を保存してファイルパスを取得
        $file_name = null;
        if ($request->file('image')){
            $image_path = $request->file('image')->store('public');
            $file_name = basename($image_path);
        }
        $diary->text = $request->text;
        $diary->image= $file_name;
        $diary->save();
        // TODO : 古い画像の削除処理
        return redirect()->route('diary.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diary $diary)
    {
        $diary->delete();
        if ($diary->image){
            Storage::disk('public')->delete($diary->image);
        }
        return redirect()->route('diary.index');
    }
}
