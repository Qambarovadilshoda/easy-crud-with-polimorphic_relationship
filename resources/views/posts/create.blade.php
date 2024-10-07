@extends('components.layouts.app')
@section('title', 'Yangi Post Qo\'shish')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Yangi Post Qo'shish</h1>
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Sarlavha</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        @error('title')
        <p style="color:red">{{'* ' . $message}}</p>
        @enderror
        <div class="mb-3">
            <label for="context" class="form-label">Mazmun</label>
            <textarea class="form-control" id="content" name="context" rows="3" required></textarea>
        </div>
        @error('context')
        <p style="color:red">{{'* ' . $message}}</p>
        @enderror
        <button type="submit" class="btn btn-primary">Saqlash</button>
        <a href="{{route('posts.index')}}" class="btn btn-secondary">Orqaga</a>
    </form>
</div>
@endsection