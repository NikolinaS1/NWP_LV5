@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{__('messages.papers')}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ url('/addPaper') }}" class="btn btn-primary">{{__('messages.add_paper')}}</a>

                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th>{{__('messages.paper_name')}}</th>
                                <th>{{__('messages.paper_name_en')}}</th>
                                <th>{{__('messages.paper_task')}}</th>
                                <th>{{__('messages.study')}}</th>
                                <th>{{__('messages.actions')}}</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($papers as $paper)
                            <tr>
                                <td>{{ $paper->naziv_rada }}</td>
                                <td>{{ $paper->naziv_rada_en }}</td>
                                <td>{{ $paper->zadatak_rada }}</td>
                                <td>{{ $paper->tip_studija }}</td>
                                <td>
                                    <a href="{{ route('prijave', ['paper_id' => $paper->id]) }}" class="btn btn-info">{{__('messages.see_applied')}}</a>
                                     @if ($paper->student_id)
                                        @php
                                            $assignedStudent = $paper->getStudent();
                                        @endphp
                                        @if ($assignedStudent)
                                            <span class="text-success ml-2">{{__('messages.assigned')}} {{ $assignedStudent->name }}</span>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
