@props(['post'=>$post])

<div class="mb-8  p-2 pt-5  bg-slate-700 rounded-lg relative ">
  <p class="mb-2 px-3 py-2 bg-indigo-600 w-fit rounded-full opacity-75  text-zinc-200 absolute -top-5 ">Category</p>
 
    <a href="{{ route('users.posts', $post->user)}}" class="font-bold text-zinc-200 mb-3 mt-9"><span class="text-gray-500 text-sm ml-2 mr-2">Posted by</span>{{$post->user->name}}</a> <span class="text-gray-500 text-sm ml-2">{{$post->created_at->diffForHumans()}}</span>
    <h2 class="mb-2 mt-5 font-semibold text-xl  p-2  text-zinc-400 bg-slate-800 rounded-xl w-fit">{{$post->title}}</h2>
    <p class="mb-2 mt-3 text-zinc-200 border-l-zinc-400">{{$post->body}}</p>
    
    <div class="flex item-center ">
@auth
     @if (!$post->likedBy(auth()->user()))
          
        <form action="{{ route('posts.likes', $post)}}" method="POST" class="mr-1">
           @csrf

            <button type="submit" class="text-blue-500 ml-2"><i class="fa-solid fa-heart"></i></button>
        </form>

      @else  
        <form action="{{ route('posts.likes', $post)}}" method="post" class="mr-1">
           @csrf
           @method('DELETE')
           <button type="submit" class="text-blue-500 ml-2 checked:text-green-400"><i class="fa-solid fa-heart-crack"></i></button>
        </form>
      @endif 
         
     @can('delete', $post) 
      <form action="{{route('posts.destroy', $post)}}" method="POST">
       @csrf
       @method('DELETE')
       <button type="submit" class="text-red-400 ml-2 "><i class="fa-solid fa-trash-can"></i></button>
      </form>
     @endcan

@endauth
    <span class="ml-2 text-gray-500">{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>
    </div>
</div>