@extends('layouts.app')

@section('title', 'Details - '. $photo->title)

@section('content')
    <div class="container">        
        <div class="card">
            <img src="{{ $photo->file_path }}" alt="{{ $photo->title }}" class="img-fluid" />
            <div class="card-body">
                <h5 class="card-title">{{ $photo->title }}</h5>            
                <a href="{{ url('/photos') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection