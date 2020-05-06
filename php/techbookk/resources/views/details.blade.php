@extends('oya')
@section('details')
<h2>Details of the book</h2>

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
            <th>読んでいない</th>
        @elseif ($book_details['status'] == 'b')
            <th>読んでいる</th>
        @elseif ($book_details['status'] == 'c')
            <th>読んだ</th>
        @endif
    </tr>
</table>
<form method="post" action="/techbook/delete/{{$book_details['id']}}">
    {{ csrf_field() }}
    <input type="submit" value="Delete" onclick="return confirm('Do you really want to delete it?')">
</form>
@endsection
