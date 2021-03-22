@extends('layouts.master')

@section('title')
    search page
@endsection

@section('content')
<div class="bg-gray-800 bg-opacity-5 rounded-3xl p-16 w-full">
    @if (isset($user))     
        <div class="p-4 bg-white shadow-2xl flex rounded-2xl">
            <div class="flex mr-8">
                @if (isset($user->userExtraInfo->img_url))
                    <img src="{{asset('assets/images/') . '/' .$user->userExtraInfo->img_url }}" class="w-24 rounded-2xl object-cover shadow-2xl" alt="">
                @else
                    <img src="{{asset('assets/images/profile.png') }}" class="w-24 rounded-2xl object-cover shadow-2xl" alt=""> 
                @endif
            </div>
            <div class="w-full">
                <div class="flex items-center justify-between w-full">
                    <div>
                        <h1 class="text-2xl text-gray-800">
                            {{$user->username}}
                        </h1>
                        <span class="text-sm block text-gray-600">{{$user->email}}</span>
                        @isset($$user->userExtraInfo->phone)
                            <span class="text-sm block text-indigo-700">{{$user->userExtraInfo->phone}}</span>
                        @endisset
                    </div>
                    <div>
                        <a href="/profile/{{$user->id}}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg shadow-2xl">
                            Voir le profil
                        </a>
                    </div>
                </div>
                <hr class="my-4">
                <p class="text-sm tracking-wide leading-loose text-gray-700">
                    @isset($user->userExtraInfo->summary)     
                        {{$user->userExtraInfo->summary}}
                    @endisset
                </p>
            </div>
        </div>
    @else
        <div>
            no results
        </div>
    @endif
</div>
@endsection