@extends('components.layouts.app')
@section('title', 'Post Tafsilotlari')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Post Tafsilotlari</h1>
    <div class="card mb-5">
        <div class="card-header">
            {{$post->id . ' - post'}}
        </div>
        <div class="card-body">
            <h5 class="card-title">Sarlavha: {{$post->title}}</h5>
            <p class="card-text">
                Mazmun: {{$post->context}}
            </p>
            <a href="{{route('posts.index')}}" class="btn btn-secondary">Orqaga</a>
            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning">Tahrirlash</a>
            <form style="display:inline;" action="{{route('posts.destroy', $post->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">O'chirish</button>
            </form>
        </div>
    </div>

    <!-- Izohlar qismi -->
    <div class="comments-section">

        <!-- Izoh qo'shish formasi -->
        <h4 class="mt-4">Izoh qoldirish</h4>
        <form action="{{route('post_comments.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <label for="name" class="form-label">Ismingiz</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Izohingiz</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Izoh qoldirish</button>
        </form>
        <br>
        <h2>Izohlar</h2>

        <!-- Mavjud izohlar -->
        @if (isset($post->comments))
        @foreach ($post->comments as $comment)

        <div class="comment mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$comment->name}}</h5>
                    <p class="card-text">{{$comment->comment}}</p>
                    <small class="text-muted">{{$comment->created_at}}</small>
                    <!-- O'chirish tugmasi -->
                    <form action="{{route('post_comments.destroy', $comment->id)}}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                        <input type="hidden" name="comment_id" value="1">
                        <button type="submit" class="btn btn-danger btn-sm">O'chirish</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @endif

    </div>
</div>
@endsection