@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white ">
           <div class="p-6">
               <h1 class="text-2xl font-medium mb-1">{{ $user->name}}</h1>
               <p>has {{$posts->count() }} {{ Str::plural('post', $posts->count())}}</p>
               <p>{{$user->receivedLikes()->count()}} {{Str::plural('like',$user->receivedLikes()->count())}}</p>

            
            

            @if ($posts->count())
            @foreach($posts as $post)
            <x-post :post="$post"/>
            @endforeach

            {{ $posts->links() }}
        @else
        <p>{{$user->name}} does not have any posts</p>    
        @endif 

        </div>
    </div>
    </div>
@endsection