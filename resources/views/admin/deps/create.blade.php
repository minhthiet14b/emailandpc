@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Dep
                </div>
                <div class="float-end">
                    <a href="{{ route('deps.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('deps.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                            <label class="col-md-4 col-form-label text-md-end text-start form-control-label ">Publish:</label>
                        <div class="col-md-6">
                            <div class="form-check-inline mb-1">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input " name="publish" value="0" checked="">
                                    <span class="bg-secondary nb-check text-white">No</span>
                                </label>
                            </div>
                            <div class="form-check-inline mb-1 ">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input " name="publish" value="1">
                                    <span class="bg-success text-white nb-check">Yes</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Dep">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
