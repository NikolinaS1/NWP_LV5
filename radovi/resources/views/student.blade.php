@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{__('messages.papers_can_applied')}}</div>

                <div class="card-body">
                    <table class="table">
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
                                    <form action="{{ route('assignTask') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="task_id" value="{{ $paper->id }}">
                                        <input type="hidden" name="action" value="{{ $paper->students->contains($user->id) ? 'cancel' : 'apply' }}">
                                        <button type="submit" class="btn {{ $paper->students->contains($user->id) ? 'btn-danger' : 'btn-success' }}">
                                            {{ $paper->students->contains($user->id) ? __('messages.cancel') : __('messages.apply') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">{{__('messages.applied')}}</div>
                        <div class="card-body">
                            @if ($appliedPapers->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{__('messages.paper_name')}}</th>
                                        <th>{{__('messages.paper_name_en')}}</th>
                                        <th>{{__('messages.paper_task')}}</th>
                                        <th>{{__('messages.study')}}</th>
                                        <th>{{__('messages.status')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appliedPapers as $paper)
                                    <tr>
                                        <td>{{ $paper->naziv_rada }}</td>
                                        <td>{{ $paper->naziv_rada_en }}</td>
                                        <td>{{ $paper->zadatak_rada }}</td>
                                        <td>{{ $paper->tip_studija }}</td>
                                        <td>
                                            @if ($paper->student_id === $user->id)
                                                <span class="text-success">{{__('messages.accepted')}}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <p>{{__('messages.no_applied_papers')}}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
