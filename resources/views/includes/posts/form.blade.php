@extends('layouts.app')

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif

@if($post->exists)
    <form action="{{route('admin.posts.update', $post->id)}}" method="POST" novalidate>
        @method('PUT')
        @else
        <form action="{{ route('admin.posts.store') }}" method="POST" novalidate>
            @endif
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title Post</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title', $post->title) }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image URL</label>
                        <input type="url" class="form-control" id="image" name="image" placeholder="Insert Image URL" value="{{ old('image', $post->image) }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="content" class="form-label">Description</label>
                        <textarea class="form-control" id="content" name="content" rows="5" placeholder="Insert post description">{{ old('content', $post->content) }}</textarea>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                </div>
            </div>
    </form>

@endsection