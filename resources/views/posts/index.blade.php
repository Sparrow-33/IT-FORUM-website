@extends('layouts.app')

@section('content')
    <div class="flex justify-center mb-2 p-2 h-fit">
        <div class="w-8/12 bg-slate-700  p-6 rounded-lg mr-2  h-fit relative">
            <i class="fa-solid fa-ellipsis-vertical text-xl font-semibold absolute right-0 text-slate-100 hover:cursor-pointer px-5 py-2 bg-slate-400 rounded-lg"></i>
            <form action="{{route('posts')}}" method="POST" class="mb-4 ">
                @csrf

                <div class="mb-4">
                    <label for="title" id='title' class="sr-only">Title</label>
                    <input name="title" id="title" cols="30" rows="4" class="bg-slate-500 text-slate-100
                     border-3 w-full p-4 rounded-lg   @error('title') border-red-500 @enderror" placeholder="Post Title..."/>
  
                     @error('title')
                     <div class=" text-white mt-2 text-sm p-2 bg-red-500 rounded">
                        {{$message}}
                     </div>
                     @enderror
                </div>

              <div class="mb-4">
                  <label for="body" id='body' class="sr-only">Body</label>
                  <textarea name="body" id="body" cols="30" rows="4" class="bg-slate-500 text-slate-100
                   border-3 w-full p-4 rounded-lg  @error('body') border-red-500 @enderror" placeholder="Post something"></textarea>

                   @error('body')
                   <div class=" text-white mt-2 text-sm p-2 bg-red-500 rounded">
                      {{$message}}
                   </div>
                   @enderror
              </div>

              <div class="">
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 
                 rounded font-medium w-4/12">
                    Post
                </button>
            </div>
            </form>
        </div>
            <div class="w-8/12  p-6 rounded-lg ">
             @if ($posts->count())
                 @foreach($posts as $post)
                 <x-post :post="$post"/>
                 @endforeach

                 {{ $posts->links() }}
             @else
             <p>There is no posts</p>    
             @endif 

        </div>
    </div>
@endsection