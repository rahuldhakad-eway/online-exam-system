@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{ route('question.submit') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="technology_id" class="form-label">Technology</label>
            <select class="form-control" aria-label="Default select example" name="technology_id">
                <option selected>Choose Technology</option>
                @foreach($technologies as $technology)
                    <option value="{{ $technology->id }}">{{ $technology->name }}</option>
                @endforeach
              </select>
            @error('technology_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology_id" class="form-label">Level</label>
            <select class="form-control" aria-label="Default select example" name="level_id">
                <option selected>Choose Level</option>
                @foreach($levels as $level)
                    <option value="{{ $level->id }}">{{ $level->level }}</option>
                @endforeach
              </select>
            @error('level_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Question</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="question_text"></textarea>
            @error('question_text')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Option 1</label>
            <input type="text" class="form-control" name="option1" placeholder="option1" class="@error('name') is-invalid @enderror">
            @error('option1')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Option 2</label>
            <input type="text" class="form-control" name="option2" placeholder="option2" class="@error('name') is-invalid @enderror">
            @error('option2')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Option 3</label>
            <input type="text" class="form-control" name="option3" placeholder="option3" class="@error('name') is-invalid @enderror">
            @error('option3')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Option 4</label>
            <input type="text" class="form-control" name="option4" placeholder="option4" class="@error('name') is-invalid @enderror">
            @error('option')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="answer_type" class="form-label">Answer Type</label>
            <select class="form-control" aria-label="Default select example" name="answer_type" id="answer_type">
                <option selected>Choose Answer Type</option>
                <option value="1">Single Select</option>
                <option value="2">Multi Select</option>
              </select>
            @error('answer_type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology_id" class="form-label">Correct Answer</label>
            <select class="form-control" aria-label="Default select example" name="answer" id="answer">
                <option selected>Choose Answer Type</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                <option value="4">Option 4</option>
              </select>
            @error('answer')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Time Required (in mins)</label>
            <input type="number" class="form-control" name="time_required" placeholder="" class="@error('name') is-invalid @enderror">
            @error('time_required')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection

@push('page-specific-scripts')
<script>
$(document).ready(function() {
    // Get the first dropdown element
    const select1 = $("#answer_type");

    // Get the second dropdown element
    const select2 = $("#answer");

    // Add an event listener to the first dropdown element
    select1.on("change", function() {
      // Get the selected value of the first dropdown
      const selectedValue = select1.val();

      // Toggle the 'multiple' attribute of the second dropdown based on the selected value of the first dropdown
      if (selectedValue == 2) {
        select2.attr("multiple", true);
      } else {
        select2.removeAttr("multiple");
      }
    });
  });
</script>
@endpush