@extends('oya')
@section('search')
    <h2>Register technical books</h2>
    @foreach ($data as $book)
        <table>
            <tr>
                <th><img src={{$book[4]}} width="128" height="158"></th>
                <th>
                    {{$book[0]}}
                    <form method="post" action="{{ route('register') }}">
                        {{csrf_field()}}
                        <input type="hidden" name="title" value={{$book[0]}}>
                        <input type="hidden" name="author" value={{$book[1]}}>
                        <input type="hidden" name="publish_date" value={{$book[2]}}>
                        <input type="hidden" name="page_cnt" value={{$book[3]}}>
                        <input type="hidden" name="image_link" value={{$book[4]}}>
                        <button type="submit" class="btn btn-primary">登録</button>
                    </form>
                </th>
            </tr>
        </table>
    @endforeach
@endsection

