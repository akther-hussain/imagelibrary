@extends('layouts.app')

@section('content')

<div class="row">
    @include('pages.images.components.form')
</div>
    

{{-- <div class="row">

    @foreach($photos as $key => $photo)
    <div class="col-md-4 col-sm-6">
        <div class="card mb-2">
            
            <img src="{{ $photo->thumb_url }}" class="card-img-top" alt="{{ $photo->title }}">
            
            <div class="card-body">
                <h5 class="card-title">{{ $photo->title }}</h5>            
                <a href="{{ url('/'.$photo->id.'/show') }}" class="btn btn-primary">View Image</a>
            </div>
        </div>
    </div>
    @endforeach  
</div> --}}

    <div class="band">
        @foreach($photos as $key => $photo)
            <div class="item-{{ $key+1 }}">
                <a href= '{{ url("/{$photo->id}/show") }}' class="card">
                <div class="thumb" style="background-image: url({{ $photo->thumb_url }})"></div>
                <article>
                    <h1>{{ $photo->title }}</h1>
                    <span>view image</span>            
                </article>
            </a>
            </div>
        @endforeach
    </div>


  

    <div class="row mt-3">
        {{ $photos->links() }}
    </div>

@endsection