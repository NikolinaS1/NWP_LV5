@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('messages.edit_study') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('editTypeOfStudy', $user->id) }}">
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
                            <label for="tip_studija" class="col-md-4 col-form-label text-md-right">{{ __('messages.study') }}</label>

                            <div class="col-md-6">
                                <select id="tip_studija" class="form-control" name="tip_studija">
                                    <option value="">{{__('messages.none')}}</option> 
                                    <option value="Stručni" {{ $user->tip_studija == 'Stručni' ? 'selected' : '' }}>{{ __('messages.strucni') }}</option>
                                    <option value="Preddiplomski" {{ $user->tip_studija == 'Preddiplomski' ? 'selected' : '' }}>{{ __('messages.preddiplomski') }}</option>
                                    <option value="Diplomski" {{ $user->tip_studija == 'Diplomski' ? 'selected' : '' }}>{{ __('messages.diplomski') }}</option>
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
