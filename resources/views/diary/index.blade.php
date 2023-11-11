@extends('page')
@section('title','日記一覧')
@include('head')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-outline-primary" onclick="location.href='{{route('diary.create')}}'">投稿する</button>
</div>
<table class="table">
    <tr>
        <th class="col-3 text-center">投稿日時</td>
        <th class="col-8 text-center" colspan=2>内容</td>
        <td class="col-1 text-center">編集</td>
    </tr>
    @foreach ($diaries as $diary)
    <tr>
        <td>{{$diary->created_at}}</td>
        <td>{{$diary->image}}</td>
        <td>{{$diary->text}}</td>
        <td class="text-center"><i class="bi bi-pencil-square" onclick="location.href='{{route('diary.edit', $diary->id)}}'"></i></td>
    </tr>
    @endforeach
</table>
@endsection
