@extends('components.layouts.app')
@section('title', 'Postni Tahrirlash')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Postni Tahrirlash</h1>
    <form action="{{route('posts.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="_method" value="PUT"> <!-- PUT metodini ishlatish uchun -->
        <div class="mb-3">
            <label for="title" class="form-label">Sarlavha</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}" required>
        </div>
        @error('title')
        <p style="color:red">{{'* ' . $message}}</p>
        @enderror
        <div class="mb-3">
            <label for="contex  t" class="form-label">Mazmun</label>
            <textarea class="form-control" id="context" name="context" rows="3" required>{{$post->context}}</textarea>
        </div>
        @error('context')
        <p style="color:red">{{'* ' . $message}}</p>
        @enderror
        <button type="submit" class="btn btn-primary">Yangilash</button>
        <a href="{{route('posts.index')}}" class="btn btn-secondary">Orqaga</a>
    </form>
</div
    @endsection