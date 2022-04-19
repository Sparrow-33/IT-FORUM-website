@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="md:w-4/12 bg-slate-700 p-6 rounded-lg w-6/12">
            <div class="mb-4">
                <div class="flex items-center justify-center">
                   <p  class="text-blue-400 font-bold text-xl text-center ">Please Register</p>
                </div>
            </div>

            <form action="{{route('register')}}" method="POST">
                @csrf
                  <div class="mb-4">
                      <label for="name" class="sr-only">Name</label>
                      <input type="text" name="name" id="name" placeholder="Your name"
                      class="bg-slate-500  w-full p-4 rounded-lg text-zinc-300
                       @error('name') border-red-600 @enderror "
                      
                      value="{{old('name')}}">

                      @error('name')
                           <div class="text-red-500 mt-2 text-sm">
                               {{$message}}
                           </div>
                      @enderror
                  </div>

                  <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username"
                    class="bg-slate-500  w-full p-4 rounded-lg  text-zinc-300"value="{{old('username')}}">

                    @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
               @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your Email"
                    class="bg-slate-500  w-full p-4 rounded-lg text-zinc-300 "value="{{old('email')}}">

                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
               @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="password"
                    class="bg-slate-500 text-zinc-300  w-full p-4 rounded-lg "value="">

                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
               @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password again</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="confirm_password"
                    class="bg-slate-500  w-full p-4 rounded-lg text-zinc-300 "value="">

                    @error('password_confirmation')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
               @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                       <p class="text-gray-400 mx-auto mt-2">Already a member ?  <a href="{{ route('login')}}" class="text-blue-400">LogIn</a></p>
                    </div>
                </div>

                <div class="">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3
                     rounded font-medium w-full">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection