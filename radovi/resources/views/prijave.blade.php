@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('messages.see_applied')}}</div>

                <div class="card-body">
                    @if (!$appliedStudents->count() > 0)
                        <p class="text-center">{{__('messages.no_applied')}}</p>
                    @else
                        <form action="{{ route('assignStudent', $paper->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            @foreach($appliedStudents as $student)
                                <div>
                                    <input type="radio" id="student_{{ $student->id }}" name="student_id" value="{{ $student->id }}">
                                    <label for="student_{{ $student->id }}">{{ $student->name }}</label>
                                </div>
                            @endforeach
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">{{__('messages.set')}}</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
