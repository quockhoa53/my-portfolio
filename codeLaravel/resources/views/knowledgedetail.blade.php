<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết dự án</title>
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
@include('layouts.header')
<main>
    <div class="container">
        <br>
        <div>
            <h3>{{ $knowledge->title }}</h3>
            <p>{!! html_entity_decode($knowledge->content ?? 'Dữ liệu chưa được cập nhật!') !!}</p>
        </div>
    </div>
</main>
@include('layouts.footer')
</body>
</html>

