@extends('layouts.admin')

@section('title', 'Admin Project')

@section('content')
    <!-- Content Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 fw-bold text-primary d-flex align-items-center gap-2">
            <i class="bi bi-person-gear text-primary"></i>
            Admin Project
        </h1>
        <button id="addButton" type="button"
            class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-plus-circle-fill"></i> 
            Add new project
        </button>
    </div>
    <hr class="border-gray-200 mb-8">
    <!-- Bảng danh sách dự án -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="projectTable">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên dự án</th>
                    <th scope="col">Độ ưu tiên</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $index => $project)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->priority }}</td>
                        <td>
                            <a href="{{ route('admin.project.details', ['id' => $project->id]) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Xem
                            </a>
                            <a href="{{ route('admin.project.edit', ['id' => $project->id])}}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <form action="{{ route('admin.project.delete', $project->id) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $project->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $project->id }}">
                                    <i class="fas fa-trash-alt"></i> Xóa
                                </button>
                            </form>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal-{{ $project->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $project->id }}" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel-{{ $project->id }}">Xác nhận xóa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    Bạn chắc chắn muốn xóa dự án <strong>{{ $project->title }}</strong> không?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-danger" onclick="document.getElementById('delete-form-{{ $project->id }}').submit();">Xóa</button>
                                  </div>
                                </div>
                              </div>
                            </div>                        
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Mẫu văn bản để thêm mới dự án -->
    <div id="editorContainer" style="display: none;">
        <form action="{{ route('admin.project.createproject') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="project_image" class="form-label"><b>Ảnh đại diện</b></label>
                <input type="file" name="images" id="project_image" class="form-control" accept="image/*" onchange="previewImage(event)">
                <div class="mt-2">
                    <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 200px; display: none;">
                </div>
            </div>
            <div class="mb-3">
                <label for="project_title" class="form-label"><b>Tên dự án</b></label>
                <input type="text" name="title" id="project_title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="priority" class="form-label"><b>Độ ưu tiên</b></label>
                <input type="number" name="priority" id="priority" class="form-control" value="0" min="0" required>
                <small class="text-muted">Số càng cao thì độ ưu tiên càng lớn</small>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label"><b>Trạng thái</b></label>
                <select name="status" id="status" class="form-control" required>
                    <option value="pending">Đang chờ</option>
                    <option value="in_progress">Đang thực hiện</option>
                    <option value="completed">Đã hoàn thành</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="url_demo" class="form-label"><b>URL Demo</b></label>
                <input type="url" name="url_demo" id="url_demo" class="form-control">
            </div>

            <div class="mb-3">
                <label for="project_type_id" class="form-label"><b>Loại dự án</b></label>
                <select name="project_type_id" id="project_type_id" class="form-control">
                    <option value="">Chọn loại dự án</option>
                    @foreach($projectTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="project_functionality" class="form-label"><b>Chức năng chính</b></label>
                <textarea name="content" id="project_functionality" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="project_content" class="form-label"><b>Chi tiết thiết kế</b></label>
                <textarea name="description" id="project_content" class="form-control" rows="1000" required></textarea>
            </div>
            <button type="submit" class="btn btn-success mt-3">Lưu</button>
            <button type="button" class="btn btn-secondary mt-3" id="cancelButton">Hủy</button>
        </form>
    </div>
   
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const addButton = document.getElementById('addButton');
        const cancelButton = document.getElementById('cancelButton');
        const projectTable = document.getElementById('projectTable');
        const editorContainer = document.getElementById('editorContainer');

        addButton.addEventListener('click', function() {
            projectTable.style.display = 'none';
            editorContainer.style.display = 'block';
        });

        cancelButton.addEventListener('click', function() {
            window.location.reload();
        });
    });
    </script>
        <script>
            function previewImage(event) {
                var input = event.target;
                var reader = new FileReader();
                reader.onload = function() {
                    var imgElement = document.getElementById('imagePreview');
                    imgElement.src = reader.result;
                    imgElement.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        </script>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .table th, .table td {
            vertical-align: middle;
        }

        .table th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }

        .table td {
            text-align: center;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .modal-dialog {
            max-width: 500px;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
        }
    </style>
@endsection
