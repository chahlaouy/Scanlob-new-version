@extends('layouts.master')

@section('title')
    Editer l'offre
@endsection

@section('content')
<section class="container mx-auto bg-profile flex justify-between">
    <div class="w-96 text-gray-600 text-sm" style="background: #e7eeed;">
        @include('admin.navbar')
    </div>  
    <div class="bg-gray-800 bg-opacity-50 rounded-3xl p-12 w-full">

        @if (Session::get('success'))
            <div class="bg-green-300 w-full py-4 text-center rounded my-4">
                {{Session::get('success')}}
            </div>
        @endif
        @if (Session::get('fail'))
            <div class="bg-red-300 w-full py-4 text-center rounded my-4">
                {{Session::get('fail')}}
            </div>
        @endif
        <div class="bg-indigo-600 rounded-2xl shadow-2xl py-4 text-center text-gray-100">
            <h1 class="text-center text-2xl">Mise A jour d'un Offre</h1>
 
        </div>
        <div class="bg-white rounded-2xl shadow-2xl p-6 text-center text-gray-700 mt-8">
            <form action="{{route('admin.update-offer')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="text" class="hidden" name="id">
                <label class="block mt-4">
                    <div class="text-gray-700 text-left">Titre</div>
                    <input type="text" class="form-input mt-1 block w-full py-2 border-2 border-gray-300 rounded focus:outline-indigo-600" placeholder="titre ici" name="title" value="{{$offer->title}}">
                </label>
                <span class="text-red-400">
                    @error('title')
                        {{$message}}
                    @enderror
                </span>
                <label class="block mt-4">
                    <div class="text-gray-700 text-left">Tag</div>
                    <input type="text" class="form-input mt-1 block w-full py-2 border-2 border-gray-300 rounded focus:outline-indigo-600" placeholder="tag ici" name="tag" value="{{$offer->tag}}">
                </label>
                <span class="text-red-400">
                    @error('teg')
                        {{$message}}
                    @enderror
                </span>
                <label class="block mt-4">
                    <div class="text-gray-700 text-left">Prix</div>
                    <input type="number" class="form-input mt-1 block w-full py-2 border-2 border-gray-300 rounded focus:outline-indigo-600" placeholder="60$" name="price" value="{{$offer->price}}">
                </label>
                <label class="block mt-4">
                    <div class="text-gray-700 text-left">Description</div>
                    <textarea type="text" class="form-input mt-1 block w-full p-2 border-2 border-gray-300 rounded focus:outline-indigo-600" placeholder="description ici" rows="5" name="description" >
                        {{$offer->description}}
                    </textarea>
                </label>
                <label class="block mt-4">
                    <div class="text-gray-700 text-left">Categorie</div>
                    <select class="form-select my-4 block w-full py-2 border-2 border-gray-300 rounded focus:outline-indigo-600" name="category">
                        <option value="visit-card">carte visite</option>
                        <option value="accessoire">accessoire</option>
                    </select>
                </label>
                
                <label class="text-gray-700 block mt-4 text-left">Thumbnails Image</label>
                <input type="file" class="form-input mt-1 block w-full py-2 border-2 border-gray-300 rounded focus:outline-indigo-600" name="image" accept="image/*">
            
                <span class="text-red-400">
                    @error('image')
                        {{$message}}
                    @enderror
                </span>
                <button type="submit" class="w-full py-4 bg-gray-300 rounded my-4">Enregistrer</button>
            </form>
 
        </div>
        
    </div>
     
</section>
@endsection