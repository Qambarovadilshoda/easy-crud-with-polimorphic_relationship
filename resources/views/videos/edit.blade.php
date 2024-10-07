@extends('components.layouts.app')

@section('title', 'Videoni Tahrirlash')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Video tahrirlash</h1>
    <form action="{{route('videos.update',$video->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="video_id" value="{{$video->id}}">
        <div class="mb-3">
            <label for="title" class="form-label">Video Sarlavhasi</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$video->title}}" required>
        </div>
        @error('title')
            <p style="color:red">{{'* ' . $message}}</p>
        @enderror
        <div class="mb-3">
            <label for="url" class="form-label">Video URL</label>
            <input type="url" class="form-control" id="url" name="url" value="{{$video->url}}" required>
        </div>
        @error('url')
            <p style="color:red">{{'* ' . $message}}</p>
        @enderror
        <button type="submit" class="btn btn-primary">Yangilash</button>
        <a href="{{route('videos.index')}}" class="btn btn-secondary">Orqaga</a>
    </form>
</div>
@endsection