<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
    <link href="css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
@include('layouts.header')
<main>
    <div class="container">
        <br>
        <h1 class="mb-4 text-primary text-center"><b>GIỚI THIỆU BẢN THÂN</b></h1>
        <hr>
        <div class="row align-items-center">
            <div class="col-md-12">
                <p class="mb-3">
                    {!! html_entity_decode($profile->content ?? 'Dữ liệu chưa được cập nhật!') !!}
                </p>
            </div>
        </div>
    </div>
</main>
@include('layouts.footer')
</body>
</html>
