<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết dự án</title>
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/project.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Lightbox2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
</head>
<body>
@include('layouts.header')
<main class="container mt-5 mb-3">
    <div class="row">
        <aside class="col-md-3 toc-section">
            <div class="toc-container p-4 shadow rounded">
                @if($project->images)
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/'.$project->images) }}" class="toc-project-image rounded" alt="Project Image">
                    </div>
                @endif
                <h4 class="toc-title text-center text-primary mb-4">Nội dung chính</h4>
                <ul id="table-of-contents" class="list-unstyled toc-list"></ul>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('project') }}" class="btn btn-outline-primary toc-back-btn">
                    <i class="bi bi-arrow-left me-2"></i>Quay lại
                </a>
            </div>
        </aside>
        <section class="col-md-9 project-section">
            <div class="project-card p-3 shadow-lg rounded">
                <h2 class="text-primary text-center">{{ $project->title }}</h2>
                <hr>
                <div id="project-description" class="project-content">
                    {!! html_entity_decode($project->description ?? 'Dự án chưa được cập nhật!') !!}
                </div>
            </div>
        </section>
    </div>
</main>
<!-- Scroll to Top Button -->
<a href="#" id="scrollToTopBtn" class="unline">
    <i class="bi-chevron-up"></i>
</a>
<br><br>
@include('layouts.footer')
<!-- AOS Script -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 600,
        once: true,
    });
</script>
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
<!-- Lightbox2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tocContainer = document.getElementById("table-of-contents");
        const contentSection = document.getElementById("project-description");

        if (!tocContainer || !contentSection) return;

        let headers = contentSection.querySelectorAll("h2, h3, h4");
        if (headers.length === 0) return;

        headers.forEach((header, index) => {
            let id = "section-" + index;
            header.id = id;

            let listItem = document.createElement("li");
            listItem.classList.add("toc-item");
            listItem.innerHTML = `
                <a href="#${id}" class="toc-link">${header.innerText}</a>
            `;
            tocContainer.appendChild(listItem);
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const images = document.querySelectorAll("#project-description img");

        images.forEach((img, index) => {
            let src = img.getAttribute("src");
            img.outerHTML = `<a href="${src}" data-lightbox="project-gallery"><img src="${src}" class="img-fluid rounded shadow-sm"></a>`;
        });
    });
</script>
</body>
</html>