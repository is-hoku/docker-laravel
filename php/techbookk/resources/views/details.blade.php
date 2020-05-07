@extends('oya')
@section('details')
<h2>Details of the book</h2>

<table>
    <tr>
        <th><img src={{$book_details['image_link']}} width="128" height="158"></th>
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
        <th>{{ $book_details['page_count'] }}</th>
    </tr>
    <tr>
        <th>Status</th>

        @if ($book_details['status'] == 'a')
            <th>読んでいない</th>
            <th>
            <form method="post" action="{{ route('update') }}">
                {{ csrf_field() }}
                <input type="submit" name="status" value="読んだ">
                <input type="submit" name="status" value="読んでいる">
                <input type="hidden" name="id" value={{ $book_details['id'] }}>
            </form>
            </th>
        @elseif ($book_details['status'] == 'b')
            <th>読んでいる</th>
            <th>
            <form method="post" action="{{ route('update') }}">
                {{ csrf_field() }}
                <input type="submit" name="status" value="読んだ">
                <input type="submit" name="status" value="読んでいない">
                <input type="hidden" name="id" value={{ $book_details['id'] }}>
            </form>
            </th>
        @elseif ($book_details['status'] == 'c')
            <th>読んだ</th>
            <th>
            <form method="post" action="{{ route('update') }}">
                {{ csrf_field() }}
                <input type="submit" name="status" value="読んでいる">
                <input type="submit" name="status" value="読んでいない">
                <input type="hidden" name="id" value={{ $book_details['id'] }}>
            </form>
            </th>
        @endif
    </tr>
</table>

<form method="post" action="{{ route('delete') }}">
    {{ csrf_field() }}
    <input type="submit" value="Delete" onclick="return confirm('Do you really want to delete it?')">
    <input type="hidden" name="id" value={{ $book_details['id'] }}>
</form>
@endsection
