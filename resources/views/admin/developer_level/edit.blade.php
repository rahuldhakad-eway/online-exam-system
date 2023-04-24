@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{ route('developer.level.update', ['id' => $level->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="developer_level" class="form-label">Level</label>
            <input type="text" class="form-control" name="level" placeholder="php" class="@error('level') is-invalid @enderror" value="{{ $level ? $level->level : '' }}">
            @error('level')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>    
</div>
@endsection