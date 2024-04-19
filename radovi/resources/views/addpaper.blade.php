@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('messages.add_paper')}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addPaper') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="naziv_rada" class="form-label">{{ __('messages.paper_name') }}</label>
                            <input type="text" class="form-control" id="naziv_rada" name="naziv_rada" required>
                        </div>

                        <div class="mb-3">
                            <label for="naziv_rada_en" class="form-label">{{ __('messages.paper_name_en') }}</label>
                            <input type="text" class="form-control" id="naziv_rada_en" name="naziv_rada_en" required>
                        </div>

                        <div class="mb-3">
                            <label for="zadatak_rada" class="form-label">{{ __('messages.paper_task') }}</label>
                            <textarea class="form-control" id="zadatak_rada" name="zadatak_rada" rows="5" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="tip_studija" class="form-label">{{ __('messages.study') }}</label>
                            <select class="form-select" id="tip_studija" name="tip_studija" required>
                                <option value="Stručni">{{ __('messages.strucni') }}</option>
                                <option value="Preddiplomski">{{ __('messages.preddiplomski') }}</option>
                                <option value="Diplomski">{{ __('messages.diplomski') }}</option>
                            </select>
                        </div>

                         <div class="text-center">
                            <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
