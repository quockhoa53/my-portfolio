<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project</title>
    <link href="css/all.css" rel="stylesheet">
    <link href="css/project.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
@include('layouts.header')
<main>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="mb-4 text-primary"><b>Dự án của tôi</b></h2>
                <p>Bao gồm các dự án từ 2021-2025</p>
            </div>
        </div>

        <div class="row">
            @foreach ($projects as $index => $project)
            <div class="col-md-4 mb-4">
                <div class="card project-card shadow h-100">
                    <img src="{{ $project->images ? asset('storage/' . $project->images) : 'https://via.placeholder.com/300x200' }}" class="card-img-top project-image" alt="Dự án {{ $index + 1 }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Dự án {{ $index + 1 }}: {{ $project->title }}</h5>
                        <span class="badge bg-success mb-2 w-25">{{ $project->status ?? 'Hoàn thành' }}</span>
                        <p class="card-text flex-grow-1">{{ $project->content }}</p>
                        <div class="d-flex gap-2 mt-3">
                            <a href="{{ route('projectdetail', ['id' => $project->id]) }}" class="btn btn-primary">Xem chi tiết</a>
                            @if ($project->url_demo)
                                <a href="{{ $project->url_demo }}" class="btn btn-outline-primary" target="_blank">Live Demo</a>
                            @else
                                <button class="btn btn-outline-primary disabled" disabled>Live Demo</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @if ($projects->isEmpty())
            <div class="col-12 text-center">
                <p class="text-muted">Chưa có dự án nào.</p>
            </div>
            @endif
        </div>

        <div class="d-flex justify-content-center">
            {{ $projects->links() }}
        </div>
    </div>
</main>
@include('layouts.footer')
</body>
</html>