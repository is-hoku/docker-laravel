@extends('oya')
@section('home')
@foreach ($book_image as $image)
    <a href="{{ route('details', ['id'=>$image['id']]) }}"><img src={{$image['image_link']}}></a>
@endforeach
@endsection
