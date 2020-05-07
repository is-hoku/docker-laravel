@extends('oya')
@section('home')
    <br>
    <form class="form-inline" action="{{ route('search') }}" method="get">
        <input class="form-control mr-sm-2" type="search" placeholder="Search TechBook" aria-label="Search" name="book">
        <button class="btn btn-info" type="submit">Search</button>
    </form>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 col-xl-4">
            <h4>読んでいない</h4>
            @foreach($book_image[0] as $book)
                <a href="{{ route('details', ['id'=>$book['id']]) }}"><img src={{$book['image_link']}} width="96" height="118"></a>
            @endforeach
        </div>
        <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 col-xl-4">
            <h4>読んでいる</h4>
            @foreach($book_image[1] as $book)
                <a href="{{ route('details', ['id'=>$book['id']]) }}"><img src={{$book['image_link']}} width="96" height="118"></a>
            @endforeach
        </div>
        <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 col-xl-4">
            <h4>読んだ</h4>
            @foreach($book_image[2] as $book)
                <a href="{{ route('details', ['id'=>$book['id']]) }}"><img src={{$book['image_link']}} width="96" height="118"></a>
            @endforeach
        </div>
    </div>
</div>
@endsection
