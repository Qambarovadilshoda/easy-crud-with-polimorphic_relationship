@extends('components.layouts.app')
@section('title', 'Videolar ro\'yxati')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Videolar ro'yxati</h1>
    <a href="{{route('videos.create')}}" class="btn btn-primary mb-3">Yangi video qo'shish</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Video Sarlavhasi</th>
                <th>URL</th>
                <th>Harakatlar</th>
            </tr>
        </thead>
        @foreach ($videos as $video)
            
        <tbody>
            <tr>
                <td>{{$video->id}}</td>
                <td>{{$video->title}}</td>
                <td>{{$video->url}}</td>
                <td>
                    <a href="{{route('videos.show', $video->id)}}" class="btn btn-info btn-sm">Ko'rish</a>
                    <a href="{{route('videos.edit', $video->id)}}" class="btn btn-warning btn-sm">Tahrirlash</a>
                    <form style="display:inline;" action="{{route('videos.destroy', $video->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">O'chirish</button>
                    </form>
                </td>
            </tr>
            <!-- Yana ko'proq videolar uchun qatorlar -->
        </tbody>
        @endforeach
    </table>
</div>
@endsection