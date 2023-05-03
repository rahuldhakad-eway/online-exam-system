@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{ route('question.update',['id' => $question->id]) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="technology_id" class="form-label">Technology</label>
            <select class="form-control" aria-label="Default select example" name="technology_id">
                <option value="">Choose Technology</option>
                @foreach($technologies as  $technology)
                    <option value="{{$technology->id}}" {{$technology->id == $question['technology_id'] ? 'selected' : ''}}>{{$technology->name}}</option>
                @endforeach
              </select>
            @error('technology_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology_id" class="form-label">Level</label>
            <select class="form-control" aria-label="Default select example" name="level_id">
                <option value="">Choose Level</option>
                @foreach($levels as $level)
                    <option value="{{ $level->id }}" {{$level->id == $question['level_id'] ? 'selected' : ''}}>{{ $level->level }}</option>
                @endforeach
              </select>
            @error('level_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Question</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="question_text">{{$question['question_text']}}</textarea>
            @error('question_text')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Option 1</label>
            <input type="text" class="form-control" name="option1" placeholder="option1" class="@error('name') is-invalid @enderror" value="{{$question['option1']}}">
            @error('option1')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Option 2</label>
            <input type="text" class="form-control" name="option2" placeholder="option2" class="@error('name') is-invalid @enderror" value="{{$question['option2']}}">
            @error('option2')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Option 3</label>
            <input type="text" class="form-control" name="option3" placeholder="option3" class="@error('name') is-invalid @enderror" value="{{$question['option3']}}">
            @error('option3')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Option 4</label>
            <input type="text" class="form-control" name="option4" placeholder="option4" class="@error('name') is-invalid @enderror" value="{{$question['option4']}}">
            @error('option')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="answer_type" class="form-label">Answer Type</label>
            <select class="form-control" aria-label="Default select example" name="answer_type" id="answer_type">
                <option value="">Choose Answer Type</option>
                <option value="1" {{$question['answer_type'] == 1 ? 'selected' : ''}}>Single Select</option>
                <option value="2" {{$question['answer_type'] == 2 ? 'selected' : ''}}>Multi Select</option>
              </select>
            @error('answer_type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology_id" class="form-label">Correct Answer</label>
            <select class="form-control" aria-label="Default select example" name="answer" id="answer">
                <option value="">Choose Answer Type</option>
                <option value="1" {{$question['answer'] == 1 ? 'selected' : ''}}>Option 1</option>
                <option value="2" {{$question['answer'] == 2 ? 'selected' : ''}}>Option 2</option>
                <option value="3" {{$question['answer'] == 3 ? 'selected' : ''}}>Option 3</option>
                <option value="4" {{$question['answer'] == 4 ? 'selected' : ''}}>Option 4</option>
              </select>
            @error('answer')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Time Required (in mins)</label>
            <input type="number" class="form-control" name="time_required" placeholder="" class="@error('name') is-invalid @enderror" value="{{$question['time_required']}}">
            @error('time_required')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
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