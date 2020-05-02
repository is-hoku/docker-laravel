<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
</head>
<body>
@foreach ($book_image as $image)
    <a href="{{ route('details', ['id'=>$image['id']]) }}"><img src={{$image['image_link']}}></a>
@endforeach
</body>
</html>
