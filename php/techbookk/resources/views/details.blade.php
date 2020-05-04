@extends('oya')
@section('details')
<p>Details of the book</p>
<a href="{{ route('home') }}">back</a>
<table>
    <tr>
        <th><img src={{$book_details['image_link']}}></th>
    </tr>
    <tr>
        <th>Title</th>
        <th>{{ $book_details['title'] }}</th>
    </tr>
    <tr>
        <th>Author</th>
        <th>{{ $book_details['author'] }}</th>
    </tr>
    <tr>
        <th>Publish Date</th>
        <th>{{ $book_details['publish_date'] }}</th>
    </tr>
    <tr>
        <th>Page Count</th>
        <th>{{ $book_details['page_count'] }}p</th>
    </tr>
    <tr>
        <th>Status</th>
        @if ($book_details['status'] == 'a')
            <th>have but haven't read</th>
        @elseif ($book_details['status'] == 'b')
            <th>reading</th>
        @elseif ($book_details['status'] == 'c')
            <th>read</th>
        @endif
    </tr>
</table>
<form method="post" action="/techbook/delete/{{$book_details['id']}}">
    {{ csrf_field() }}
    <input type="submit" value="Delete" onclick="return confirm('Do you really want to delete it?')">
</form>
@endsection
