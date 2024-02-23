@extends('layouts.main')

@section('title', 'MakitaOnRails - Create a post')

@section('content')
    <div class="max-w-screen-md mx-auto p-4">
        <form action="/posts" method="POST" class="w-full">
            @csrf

            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                <input type="text" minlength="5" id="title" name="title"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <div class="mb-5">
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900">Content</label>
                <textarea id="body" name="body"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
            </div>

            <div class="mb-5">
                <label for="tags" class="block mb-2 text-sm font-medium text-gray-900">Add tags</label>
                <div class="flex gap-2 items-center">
                    <input type="text" id="tags[]" name="tags[]"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
            </div>

            <div>
                <input type="submit" value="Create"
                       class="w-full bg-akita mt-5 p-2 rounded text-white font-bold cursor-pointer">
            </div>
        </form>
    </div>
@endsection
