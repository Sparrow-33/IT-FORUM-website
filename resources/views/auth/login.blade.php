@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="md:w-4/12 bg-slate-700 p-6 rounded-lg w-6/12">
            @if (session('status'))
                <div class="bg-red-400 p-4 rounded-lg mb-6 text-white text-center">
                    {{session('status')}}
                </div>
            @endif

            <div class="mb-4">
                <div class="flex items-center justify-center">
                   <p  class="text-blue-400 font-bold text-xl text-center ">Please Login</p>
                </div>
            </div>
            

            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your Email"
                    class="bg-slate-500 w-full p-4 rounded-lg text-zinc-400 "value="{{old('email')}}">

                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
               @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="password"
                    class="bg-slate-500  w-full p-4 rounded-lg text-zinc-400 "value="">

                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
               @enderror
                </div>
               
                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember " id="remember" class="mr-2 text-zinc-400">
                        <label for="remember" class="text-zinc-400 ">Remember me</label>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                       <p class="text-gray-400 mx-auto mt-2">Not a member ?  <a href="{{ route('register')}}" class="text-blue-400">Join Us</a></p>
                    </div>
                </div>
                

                <div class="">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3
                     rounded font-medium w-full hover:bg-blue-400">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

 

  
@endsection