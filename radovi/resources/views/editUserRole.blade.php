@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('messages.edit_role') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('editUserRole', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('messages.role') }}</label>

                            <div class="col-md-6">
                                <select id="role" class="form-control" name="role">
                                    <option value="">{{__('messages.none')}}</option> 
                                    <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>{{__('messages.admin')}}</option>
                                    <option value="Teacher" {{ $user->role == 'Teacher' ? 'selected' : '' }}>{{__('messages.teacher')}}</option>
                                    <option value="Student" {{ $user->role == 'Student' ? 'selected' : '' }}>{{__('messages.student')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 mt-3 text-center"> 
                                <button type="submit" class="btn btn-primary">
                                    {{ __('messages.update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
