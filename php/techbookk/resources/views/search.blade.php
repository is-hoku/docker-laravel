@extends('oya')
@section('search')
    <h2>Register technical books</h2>
    @foreach ($data as $book)
        <table>
            <tr>
                <th><img src={{$book['volumeInfo']['imageLinks']['smallThumbnail']}}></th>
                <th>
                    {{$book['volumeInfo']['title']}}
                    <form>
                        {{csrf_field()}}
                        <button type="button" class="btn btn-primary" onclick="location.href='/techbook'">登録</button>
                    </form>
                </th>
            </tr>
        </table>
    @endforeach
@endsection
