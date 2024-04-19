@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('messages.dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{__('messages.user_name')}}</th>
                                <th>{{__('messages.email')}}</th>
                                <th>{{__('messages.role')}}</th>
                                <th>{{__('messages.study')}}</th>
                                <th>{{__('messages.actions')}}</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->tip_studija }}</td>
                                <td>
                                    <a href="{{ url('/editUserRole', ['id' => $user->id]) }}" class="btn btn-primary">{{__('messages.edit_role')}}</a>
                                    @if($user->role === 'Student')
                                        <span style="margin-right: 10px;"></span>
                                        <a href="{{ url('/editTypeOfStudy', ['id' => $user->id]) }}" class="btn btn-success">{{__('messages.edit_study')}}</a>
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
