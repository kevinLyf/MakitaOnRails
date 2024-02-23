@extends('layouts.main')

@section('title', 'MakitaOnRails')

@section('content')
    <div class="max-w-screen-md mx-auto p-4">
        @if(isset($tag))
            <div class="flex items-center justify-center bg-akita w-min whitespace-nowrap h-14 px-5">
                <h3 class="text-xl font-bold text-white">Tag: {{ $tag }}</h3>
            </div>
        @endif
        <div class="flex flex-col gap-5 mt-5">
            @foreach($postsOrganized as $year => $postsByYear)
                @foreach($postsByYear as $month => $postsByMonth)
                    <div class="flex items-center justify-center bg-akita w-min whitespace-nowrap h-14 px-5">
                        <a href="#{{ date('Y-m', strtotime($year . '-' . $month)) }}">
                            <h3 class="text-xl font-bold text-white">{{ $year }} - {{ date('F', strtotime($month)) }}</h3>
                        </a>
                    </div>
                    @foreach($postsByMonth as $post)
                        <div id="{{ date('Y-m', strtotime($year . '-' . $month)) }}" class="bg-card w-full min-h-max px-4 py-2">
                            <a href="/posts/{{ $post->id }}">
                                <h4 class="text-akita font-extrabold text-2xl">{{ $post->title }}</h4>
                                <div class="w-1/4 bg-divider mt-2 mb-1" style="height: 1px;"></div>
                                <h3 class="text-akita font-medium text-sm">
                                    {{ $post->created_at->format('Y F j, H:i') }} h |
                                    <span>
                                        @foreach($post->tags as $tag)
                                        <span>
                                            <a href="/{{ $tag }}" class="font-bold hover:underline">{{ $tag }}</a>
                                        </span>
                                        @endforeach
                                    </span>
                                </h3>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            @endforeach
        </div>
    </div>
@endsection