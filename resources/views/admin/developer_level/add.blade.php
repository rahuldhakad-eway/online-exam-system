@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{ route('developer.level.submit') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="developer_level" class="form-label">Level</label>
            <input type="text" class="form-control" name="level" id="developer_level" placeholder="Fresher" class="@error('level') is-invalid @enderror" value="{{old('level')}}">
            @error('level')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection