@extends('components.layouts.app')

@section('title', 'Video Tafsilotlari')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Video tafsilotlari</h1>
    <div class="card mb-3">
        <div class="card-header">
            Video: {{$video->id}}
        </div>
        <div class="card-body">
            <h5 class="card-title">Video URL: <a href="{{$video->url}}">{{$video->url}}</a></h5>
            <h5 class="card-title">Video Sarlavhasi: {{$video->title}}</h5>
            <a href="{{route('videos.index', 1)}}" class="btn btn-secondary">Orqaga</a>
            <a href="{{route('videos.edit', 1)}}" class="btn btn-warning">Tahrirlash</a>
            <form style="display:inline;" action="{{route('videos.destroy', 1)}}" method="POST">
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
        <form action="{{route('video_comments.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="video_id" value="{{$video->id}}">
                <label for="name" class="form-label">Ismingiz</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            @error('name')
                <p style="color:red">{{'* ' . $message}}</p>
            @enderror
            <div class="mb-3">
                <label for="comment" class="form-label">Izohingiz</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            @error('comment')
                <p style="color:red">{{'* ' . $message}}</p>
            @enderror
            <button type="submit" class="btn btn-primary">Izoh qoldirish</button>
        </form>
        <br>
        <h2>Izohlar</h2>

        <!-- Mavjud izohlar -->
        @foreach ($video->comments as $comment)

        <div class="comment mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$comment->name}}</h5>
                    <p class="card-text">{{$comment->comment}}</p>
                    <small class="text-muted">{{$comment->created_at}}</small>
                    <!-- O'chirish tugmasi -->
                    <form action="{{route('video_comments.destroy',$comment->id)}}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="comment_id" value="1">
                        <button type="submit" class="btn btn-danger btn-sm">O'chirish</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection