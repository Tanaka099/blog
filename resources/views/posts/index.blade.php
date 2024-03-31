<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
        Laravel9
    </x-slot>
     <h1>Blog Name</h1>
        <p>{{ Auth::user()->name }}</p>
        <a href='/posts/create'>作成</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>{{ $posts->links() }}</div>
        <script>
        function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();}
        }
        </script>
</x-app-layout>