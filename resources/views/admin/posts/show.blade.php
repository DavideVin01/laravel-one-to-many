@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Post #{{ $post->id }}</h1>
        <div><strong>Slug - </strong>{{ $post->slug }}</div>
    </div>
    @include('includes.posts.alert')
    <hr>
    <div class="row">
        <div class="col-4 mt-5">
            <div class="shadow">
                <img class="img-fluid" src="{{ $post->image }}" alt="Image">
            </div>
        </div>
        <div class="col-8 mt-5">
            <h2><strong>{{ $post->title }}</strong></h2>
            <p>{{ $post->content }}</p>
        </div>
        <div class="col-12 d-flex justify-content-end">

            {{-- Back Button --}}
            <a href="{{ route('admin.posts.index') }}">
            <button class="btn btn-secondary mx-2" type="submit">
                <i class="fa-solid fa-arrow-rotate-left"> Back</i>
            </button>
            </a>

            {{-- Edit Button --}}
            <a href="{{ route('admin.posts.edit', $post->id) }}">
            <button class="btn btn-warning mx-2" type="submit">
                <i class="fas fa-pencil"> Edit</i>
            </button>
            </a>

            {{-- Delete Button --}}
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" class="delete-form">
                @csrf
                @method('delete')

                <button class="btn btn-danger mx-2" type="submit">
                    <i class="fas fa-trash"> Delete</i>
                </button>
            </form>

        </div>
    </div>
@endsection


@section('scripts')
<script src="{{ asset('js/delete-form.js') }}"></script>
@endsection