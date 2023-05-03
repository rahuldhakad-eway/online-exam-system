@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <form>
        @csrf
        <div class="mb-3">
            <label for="technology_id" class="form-label">Technology</label>
            <input type="text" class="form-control" name="option1" value="{{ $question['technology']['name'] }}" readonly> 
        </div>
        <div class="mb-3">
            <label for="technology_id" class="form-label">Level</label>
            <input type="text" class="form-control" name="option1" value="{{ $question['level']['level'] }}" readonly>
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Question</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="question_text" readonly>{{$question['question_text']}}</textarea>
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Option 1</label>
            <input type="text" class="form-control" name="option1" value="{{$question['option1']}}" readonly>
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Option 2</label>
            <input type="text" class="form-control" name="option2" value="{{$question['option2']}}" readonly>
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Option 3</label>
            <input type="text" class="form-control" name="option3" value="{{$question['option3']}}" readonly>
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Option 4</label>
            <input type="text" class="form-control" name="option4" value="{{$question['option4']}}" readonly>
        </div>
        <div class="mb-3">
            <label for="answer_type" class="form-label">Answer Type</label>
            <input type="text" class="form-control" name="option1" value="{{$question['answer_type'] == 1 ? 'Single select' : 'Multi select'}}" readonly> 
        </div>
        <div class="mb-3">
            <label for="technology_id" class="form-label">Correct Answer</label>
            <input type="text" class="form-control" name="option1" value="Option {{$question['answer']}}" readonly>
        </div>
        <div class="mb-3">
            <label for="technology_name" class="form-label">Time Required (in mins)</label>
            <input type="text" class="form-control" name="time_required" value="{{$question['time_required']}}" readonly>
        </div>
        <a href="{{ URL::previous() }}"class="btn btn-primary">Go back</a>
    </form>
</div>
@endsection
