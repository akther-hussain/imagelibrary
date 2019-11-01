@extends('layouts.app')

@section('content')

    <div class="row">
        @include('pages.images.components.form')
    </div>

    <div class="band">
        @foreach($photos as $key => $photo)
            <div class="item-{{ $key+1 }}">
                <a href= '{{ url('photos/'.$photo->id ) }}' class="card">
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
        <div class="col">
            {{ $photos->links() }}
        </div>        
    </div>

@endsection