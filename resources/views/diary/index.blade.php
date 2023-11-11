@extends('page')
@section('title','日記一覧')
@include('head')

@section('content')
<table>
    @foreach ($diaries as $diary)
    <tr>
        <td>{{$diary->text}}</td>
    </tr>
    @endforeach
</table>
@endsection
