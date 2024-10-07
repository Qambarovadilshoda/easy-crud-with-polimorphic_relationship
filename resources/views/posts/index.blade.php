@extends('components.layouts.app')
@section('title', 'Postlar Ro\'yxati')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Postlar Ro'yxati</h1>
    <div class="text-end mb-3">
        <a href="{{route('posts.create')}}" class="btn btn-primary">Yangi Post Qo'shish</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sarlavha</th>
                <th>Mazmun</th>
                <th>Harakatlar</th>
            </tr>
        </thead>
        @foreach ($posts as $post)
            
        <tbody>
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->context}}</td>
                <td>
                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-info btn-sm">Ko'rish</a>
                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning btn-sm">Tahrirlash</a>
                    <form style="display:inline;" action="{{route('posts.destroy' ,$post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">O'chirish</button>
                    </form>
                </td>
            </tr>
            <!-- Yana postlar qo'shilishi mumkin -->
        </tbody>
        @endforeach
    </table>
</div>
@endsection