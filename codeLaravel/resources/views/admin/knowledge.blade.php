@extends('layouts.admin')

@section('title', 'Admin Knowledge')

@section('content')
    <!-- Content Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 fw-bold text-primary d-flex align-items-center gap-2">
            <i class="bi bi-book-half text-primary"></i>
            Knowledge
        </h1>
        <!-- Align buttons to the right -->
        <div class="ms-auto d-flex align-items-center gap-2">
            <button id="addButton" type="button" class="btn btn-primary d-flex align-items-center gap-2">
                <i class="bi bi-plus-circle-fill"></i>
                Add New
            </button>
            <button class="btn btn-primary d-flex align-items-center gap-2" id="addKnowledgeTypeButton" data-bs-toggle="modal" data-bs-target="#addKnowledgeTypeModal">
                <i class="bi bi-plus-circle-fill"></i>
                Add Knowledge Type
            </button>
        </div>
    </div>
    <hr class="border-gray-200 mb-8">

    <!-- Filter Form -->
    <form id="form-fillter" method="GET" action="{{ route('admin.knowledge') }}">
        <div class="form-group">
            <label for="type" class="mb-2">Filter by type:</label>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <select name="type" id="type" class="form-control">
                        <option value="">All</option>
                        @foreach($knowledgeTypes as $type)
                            <option value="{{ $type->id }}" {{ $selectedType == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1">
                    <button id="btn-fillter" type="submit" class="btn btn-primary w-100">OK</button>
                </div>
            </div>
        </div>
    </form>    
    <hr class="border-gray-200 mb-8">

    <!-- Knowledge List -->
    <div class="knowledge-list" id="knowledge-list">
        @if($knowledges->isEmpty())
            <p>No knowledge found.</p>
        @else
            <ul class="list-group">
                @foreach($knowledges as $knowledge)
                    <li class="list-group-item">
                        <div>
                            <p>{{ $knowledge->title }}</p>
                            <small>Type: <b>{{ $knowledge->knowledgeType->name }}</b></small>
                        </div>
                        <div class="action-buttons">
                            <a href="{{ route('admin.knowledge.details', ['id' => $knowledge->id]) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('admin.knowledge.edit', $knowledge->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('admin.knowledge.delete', $knowledge->id) }}" id="delete-form-{{ $knowledge->id }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $knowledge->id }}">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-{{ $knowledge->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $knowledge->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel-{{ $knowledge->id }}">Confirm Deletion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete the post <strong>{{ $knowledge->title }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger" onclick="document.getElementById('delete-form-{{ $knowledge->id }}').submit();">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <!-- Add Knowledge Form -->
    <div id="addKnowledgeForm" style="display: none;">
        <h2>Add New Knowledge Post</h2>
        <form method="POST" action="{{ route('admin.knowledge.create') }}">
            @csrf
            <div class="mb-3">
                <label for="knowledge_type_id" class="form-label"><b>Document about:</b></label>
                <select name="knowledge_type_id" id="knowledge_type_id" class="form-control">
                    @foreach($knowledgeTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label"><b>Title:</b></label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label"><b>Content:</b></label>
                <textarea name="content" id="content" class="form-control" rows="10" required></textarea>
            </div>
            <button type="submit" class="btn btn-success mt-3">Add New</button>
        </form>
    </div>

    <!-- Modal for adding Knowledge Type -->
    <div class="modal fade" id="addKnowledgeTypeModal" tabindex="-1" aria-labelledby="addKnowledgeTypeLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addKnowledgeTypeLabel">Add Knowledge Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addKnowledgeTypeForm" method="POST" action="{{ route('admin.knowledgeType.create') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="knowledgeTypeName" class="form-label">Knowledge Type Name:</label>
                            <input type="text" class="form-control" id="knowledgeTypeName" name="name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('addButton').addEventListener('click', function() {
            var addKnowledgeForm = document.getElementById('addKnowledgeForm');
            var knowledgeList = document.querySelector('.knowledge-list');
            var formFillter = document.getElementById('form-fillter');
            var btnFillter = document.getElementById('btn-fillter');
            if (addKnowledgeForm.style.display === 'none') {
                addKnowledgeForm.style.display = 'block';
                knowledgeList.style.display = 'none';
                formFillter.style.display = 'none'; 
                btnFillter.style.display = 'none';
            } else {
                addKnowledgeForm.style.display = 'none';
                knowledgeList.style.display = 'block';
                formFillter.style.display = 'block'; 
                btnFillter.style.display = 'block';
            }
        });
    </script>    
@endsection
