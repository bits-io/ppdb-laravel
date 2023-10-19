@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2>{{ $post->title }}</h2>

            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <a href="" class="btn btn-danger"><span data-feather="x-circle"></span> Delete</a>

            <img class="img-fluid mt-3" src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>

            <a class="d-block mt-3" href="/blog">Back to Posts</a>

        </div>
    </div>
</div>

@endsection
