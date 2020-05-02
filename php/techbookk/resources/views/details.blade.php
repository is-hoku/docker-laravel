<!DOCTYPE html>
<html lang="ja">
<head>
    <title>TechBook</title>
    <meta charset="utf-8">
</head>
<body>
<p>Details of the book</p>
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
</table>
</body>
</html>
