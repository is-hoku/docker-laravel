@extends('oya')
@section('home')
    <br>
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search TechBook" aria-label="Search">
        <button class="btn btn-info" type="submit" onclick="location.href='/techbook/search/'">Search</button>
    </form>
@foreach ($book_image as $image)
    <a href="{{ route('details', ['id'=>$image['id']]) }}"><img src={{$image['image_link']}}></a>
@endforeach
@endsection
