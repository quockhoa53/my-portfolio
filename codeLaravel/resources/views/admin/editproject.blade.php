@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
    <h1 class="text-primary"><b>Edit Project</b></h1>
    <p>Update project details here.</p>
    <hr>

    <form action="{{ route('admin.project.update', ['id' => $project->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="project_image" class="form-label"><b>Ảnh đại diện</b></label>
            <input type="file" name="images" id="project_image" class="form-control" accept="image/*" onchange="previewImage(event)">
            @if($project->images)
                <p><img id="currentImage" src="{{ asset('storage/' . $project->images) }}" alt="Project Image" style="max-width: 200px; margin-top: 10px;"></p>
            @endif
        </div>
        
        <div class="mb-3">
            <label for="project_title" class="form-label"><b>Tên dự án</b></label>
            <input type="text" name="title" id="project_title" class="form-control" value="{{ old('title', $project->title) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="priority" class="form-label"><b>Độ ưu tiên</b></label>
            <input type="number" name="priority" id="priority" class="form-control" value="{{ old('priority', $project->priority) }}" min="0" required>
            <small class="text-muted">Số càng cao thì độ ưu tiên càng lớn</small>
        </div>
        
        <div class="mb-3">
            <label for="project_functionality" class="form-label"><b>Chức năng chính</b></label>
            <textarea name="content" id="project_functionality" class="form-control" rows="4" required>{{ old('content', $project->content) }}</textarea>
        </div>
    
        <div class="mb-3">
            <label for="project_content" class="form-label"><b>Chi tiết thiết kế</b></label>
            <textarea name="description" id="project_content" class="form-control" rows="1000" required style="margin-top: 60px;">
                {{ old('description', $project->description) }}
            </textarea>
        </div>
        
        <button type="submit" class="btn btn-success mt-3">Update</button>
        <a href="{{ route('admin.project') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
    <!-- Scroll to Top Button -->
    <a href="#" id="scrollToTopBtn" class="unline">
        <i class="bi-chevron-up"></i>
    </a>
    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var imgElement = document.getElementById('currentImage');
                imgElement.src = reader.result;
                imgElement.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
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
@endsection

