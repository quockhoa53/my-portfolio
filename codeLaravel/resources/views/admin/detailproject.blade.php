@extends('layouts.admin')

@section('title', 'Project Details')

@section('content')
    <h1 class="text-primary"><b>Project Details</b></h1>
    <p></p>
    <hr>
    <div>
        <h3>{{ $project->name }}</h3>
        <p>{!! html_entity_decode($project->description ?? 'No content available.') !!}</p>
    </div>
    <!-- Scroll to Top Button -->
    <a href="#" id="scrollToTopBtn" class="unline">
        <i class="bi-chevron-up"></i>
    </a>
    <script>
        let scrollToTopBtn = document.getElementById("scrollToTopBtn");
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollToTopBtn.style.display = "block";
            } else {
                scrollToTopBtn.style.display = "none";
            }
        }
        scrollToTopBtn.onclick = function() {
            window.scrollTo({top: 0, behavior: 'smooth'});
        }
    </script>
@endsection
