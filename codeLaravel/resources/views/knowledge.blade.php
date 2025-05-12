<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kho kiến thức</title>
    <link href="css/all.css" rel="stylesheet">
    <link href="css/knowledge.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
</head>
<body>
@include('layouts.header')
<main>
    <div class="container mt-5 mb-5">
        <div class="col-12 text-center mb-5">
            <h2 class="mb-3 text-primary knowledge-title"><b>Kiến thức của tôi</b></h2>
            <p class="text-muted knowledge-subtitle">Những kiến thức tôi đã tích lũy được trong quá trình học tập và làm việc.</p>
        </div>
        <div class="accordion knowledge-accordion" id="knowledgeAccordion">
            @foreach($knowledgeTypes as $index => $knowledgeType)
                <div class="accordion-item knowledge-accordion-item">
                    <h2 class="accordion-header" id="heading{{ $knowledgeType->id }}">
                        <button class="accordion-button knowledge-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $knowledgeType->id }}" aria-expanded="false" aria-controls="collapse{{ $knowledgeType->id }}">
                            <b>{{$index + 1}}. {{ $knowledgeType->name }}</b>
                        </button>
                    </h2>
                    <div id="collapse{{ $knowledgeType->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $knowledgeType->id }}" data-bs-parent="#knowledgeAccordion">
                        <div class="accordion-body">
                            <ul class="knowledge-list">
                                @foreach($knowledgeType->knowledges as $knowledge)
                                <li class="knowledge-item">
                                    <i class="bi bi-book knowledge-icon"></i>
                                    <a class="a-knowledge" href="{{ route('knowledge.details', $knowledge->id) }}">{{ $knowledge->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>
@include('layouts.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>