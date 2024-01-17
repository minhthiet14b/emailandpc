@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Dep Information
                </div>
                <div class="float-end">
                    <a href="{{ route('deps.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $dep->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Publish:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <span class="nb-check-publish nb-check nb-publish-status" data-change="1" id="{{$dep->id}}" title="Status" data-name="publish">
                            @if ($dep->publish)
                                <i class="fa fa-check fa-lg text-success"></i>
                            @else
                                <i class="fa fa-times fa-lg text-secondary"></i>
                            @endif
                            </span>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>

@endsection
