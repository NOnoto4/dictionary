@extends('layouts.template')
@section('title', 'ワード')

@section('content')
    <div class="container">
        <div class="row">
            <h2>{{ $dictionary_form->title }}</h2>
        </div>    
        <div class="row">   
            <p>{!! $dictionary_form->body !!}</p>
        </div
@endsection