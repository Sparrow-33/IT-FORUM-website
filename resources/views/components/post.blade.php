@props(['post'=>$post])

<div class="mb-4"> 
    <a href="{{ route('users.posts', $post->user)}}" class="font-bold">{{$post->user->name}}</a> <span class="text-gray-500 text-sm">{{$post->created_at->diffForHumans()}}</span>
   
    <p class="mb-2">{{$post->body}}</p>
    
    <div class="flex item-center">
@auth
     @if (!$post->likedBy(auth()->user()))
          
        <form action="{{ route('posts.likes', $post)}}" method="POST" class="mr-1">
           @csrf

            <button type="submit" class="text-blue-500">Like</button>
        </form>

      @else  
        <form action="{{ route('posts.likes', $post)}}" method="post" class="mr-1">
           @csrf
           @method('DELETE')
           <button type="submit" class="text-blue-500">Unlike</button>
        </form>
      @endif 
         
     @can('delete', $post) 
      <form action="{{route('posts.destroy', $post)}}" method="POST">
       @csrf
       @method('DELETE')
       <button type="submit" class="text-red-400">Delete</button>
      </form>
     @endcan

@endauth
    <span class="ml-2 text-gray-600">{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>
    </div>
</div>