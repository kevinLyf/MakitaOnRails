@extends('layouts.main')

@section('title', $post->title)

@section('content')
<div class="max-w-screen-md mx-auto p-4">
    <h3 class="font-semibold text-4xl text-center">{{ $post->title }}</h3>
    <h4 class="text-center text-xl mt-3 italic mb-5">{{ $post->created_at->format('Y F j, H:i') }} h </h4>

    <div>
        {!! $post->body !!}
    </div>

</div>
@endsection