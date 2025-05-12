@extends('layouts.admin')

@section('title', 'Project Details')

@section('content')
    <h1 class="text-primary"><b>Chi tiết bài viết</b></h1>
    <p></p>
    <hr>
    <div>
        <h3>{{ $knowledge->title }}</h3>
        <p>{!! html_entity_decode($knowledge->content ?? 'No content available.') !!}</p>
    </div>
@endsection