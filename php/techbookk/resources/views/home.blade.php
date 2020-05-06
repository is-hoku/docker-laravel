@extends('oya')
@section('home')
    <br>
    <form class="form-inline" action="/techbook/search/" method="get">
        {{csrf_field()}}
        <input class="form-control mr-sm-2" type="search" placeholder="Search TechBook" aria-label="Search" name="book">
        <button class="btn btn-info" type="submit">Search</button>
    </form>
@foreach ($book_image as $image)
    <a href="{{ route('details', ['id'=>$image['id']]) }}"><img src={{$image['image_link']}}></a>
@endforeach
@endsection
