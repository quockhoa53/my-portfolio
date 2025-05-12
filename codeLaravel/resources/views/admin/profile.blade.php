@extends('layouts.admin')

@section('title', 'Admin Profile')

@section('content')
    <!-- Content Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 fw-bold text-primary d-flex align-items-center gap-2">
            <i class="bi bi-person-gear text-primary"></i>
            Admin Profile
        </h1>
        <button id="editButton" type="button"
            class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-pencil-square"></i>
            Edit profile
        </button>
    </div>

    <hr class="border-gray-200 mb-8">

    <!-- Profile Content Card -->
    <div id="profileContent" class="bg-white p-8 rounded-xl shadow-md mb-8 transition-all duration-300">
        <div class="prose prose-lg max-w-none text-gray-700">
            {!! html_entity_decode($profile->content ?? '<p class="text-gray-500 italic">Profile data not yet updated.</p>') !!}
        </div>
    </div>

    <!-- Editor Form Card -->
    <div id="editorContainer" style="display: none;" class="bg-white p-8 rounded-xl shadow-md transition-all duration-300">
        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            <div class="mb-6">
                <textarea name="profile_content" id="profile_content" class="form-control w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent resize-y" rows="20">{{ $profile->content }}</textarea>
                @error('profile_content')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-success d-flex align-items-center gap-2 text-white fw-semibold py-2 px-4 rounded">
                <i class="bi bi-check-circle-fill"></i>
                Save
            </button>
        </form>
    </div>
    <!-- JavaScript for Toggling Edit Form -->
    <script>
        document.getElementById('editButton').addEventListener('click', function() {
            const profileContent = document.getElementById('profileContent');
            const editorContainer = document.getElementById('editorContainer');
            if (editorContainer.style.display === 'none') {
                profileContent.style.display = 'none';
                editorContainer.style.display = 'block';
            } else {
                profileContent.style.display = 'block';
                editorContainer.style.display = 'none';
            }
        });
    </script>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endsection