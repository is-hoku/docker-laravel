@extends('oya')
@section('search')
    <h2>Register technical books</h2>
    @foreach ($data as $book)
        <table>
            <tr>
                <th><img src={{$book[4]}}></th>
                <th>
                    {{$book[0]}}
                    <form method="post" action="{{ route('register', ['title'=>$book[0], 'author'=>$book[1], 'publish_date'=>$book[2], 'page_cnt'=>$book[3], 'image_link'=>$book[4]]) }}">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-primary">登録</button>
                    </form>
                </th>
            </tr>
        </table>
    @endforeach
@endsection

