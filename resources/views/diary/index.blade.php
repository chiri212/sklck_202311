@extends('page')
@section('title','日記一覧')
@include('head')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-outline-primary" onclick="location.href='{{route('diary.create')}}'">投稿する</button>
</div>
@if(count($diaries) > 0)
    <table class="table">
        <tr>
            <th class="col-3 text-center">投稿日時</td>
            <th class="col-2 text-center">画像</td>
            <th class="col-6 text-center">コメント</td>
            <td class="col-1 text-center">編集</td>
        </tr>
        @foreach ($diaries as $diary)
        <tr>
            <td>{{$diary->created_at->format('Y/m/d H:i')}}</td>
            <td><img src="{{$diary->image ? asset($diary->image) : asset('no_image.png')}}" alt="" width="100"></td>
            <td>{{$diary->text}}</td>
            <td class="text-center"><i class="bi bi-pencil-square" onclick="location.href='{{route('diary.edit', $diary)}}'"></i></td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center my-4">
        {{$diaries->onEachSide(1)->links()}}
    </div>
@else
    <p>投稿がありません</p>
@endif
@endsection
