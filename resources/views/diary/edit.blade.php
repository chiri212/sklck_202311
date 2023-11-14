@extends('page')
@section('title','日記編集')
@include('head')

@section('content')
    <form action="{{route('diary.update', $diary->id)}}" method="post" class="" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="text" class="form-label">投稿内容 <span class="text-danger">*</span>
            @error('text')
            <span class="fs-6 text-danger"> {{$message}}</span>
            @enderror
        </label>
        <input type="text" class="form-control" id="text" name="text" value="{{old('text', $diary->text)}}" placeholder="投稿内容を記入">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">画像 <span class="text-danger">*</span>
            @error('image')
            <span class="fs-6 text-danger"> {{$message}}</span>
            @enderror
        </label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="mb-3 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary px-4">更新</button>
    </div>
@endsection
