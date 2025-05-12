@extends('layouts.admin')

@section('title', 'Edit Knowledge')

@section('content')
    <h1 class="text-primary"><b>Chỉnh sửa bài viết về kiến thức</b></h1>
    <hr>   
    <form method="POST" action="{{ route('admin.knowledge.update', $knowledge->id) }}">
        @csrf
        <div class="form-group">
            <label for="knowledge_type_id">Tài liệu về:</label>
            <select name="knowledge_type_id" id="knowledge_type_id" class="form-control">
                @foreach($knowledgeTypes as $type)
                    <option value="{{ $type->id }}" {{ $knowledge->knowledge_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $knowledge->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Chi tiết:</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ $knowledge->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Cập nhật</button>
    </form>
@endsection