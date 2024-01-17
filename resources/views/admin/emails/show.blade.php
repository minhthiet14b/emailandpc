@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Email Information
                </div>
                <div class="float-end">
                    <a href="{{ route('emails.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <label for="pc_name" class="col-md-4 col-form-label text-md-end text-start"><strong>PC name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $email->pc_name }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $email->name }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="chinese_name" class="col-md-4 col-form-label text-md-end text-start"><strong>Chinese name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $email->chinese_name }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start"><strong>Email:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $email->email }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="ip" class="col-md-4 col-form-label text-md-end text-start"><strong>Dep:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            @foreach ($deps as $dep)
                                @if ($email->dep_id == $dep->id)
                                {{$dep->name}}
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <label for="ip" class="col-md-4 col-form-label text-md-end text-start"><strong>IP:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $email->ip }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="skype" class="col-md-4 col-form-label text-md-end text-start"><strong>Skype:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            @if ($email->skype)
                                {{ $email->skype }}
                            @else
                                <i class="fa fa-times fa-lg text-secondary"></i>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <label for="zalo" class="col-md-4 col-form-label text-md-end text-start"><strong>Zalo:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            @if ($email->zalo)
                                {{ $email->zalo }}
                            @else
                                <i class="fa fa-times fa-lg text-secondary"></i>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <label for="webchat" class="col-md-4 col-form-label text-md-end text-start"><strong>WebChat:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            @if ($email->webchat)
                                {{ $email->webchat }}
                            @else
                                <i class="fa fa-times fa-lg text-secondary"></i>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <label for="line" class="col-md-4 col-form-label text-md-end text-start"><strong>Line:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            @if ($email->line)
                                {{ $email->line }}
                            @else
                                <i class="fa fa-times fa-lg text-secondary"></i>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Publish:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <span class="nb-check-publish nb-check nb-publish-status" data-change="1" id="{{$email->id}}" title="Status" data-name="publish">
                            @if ($email->publish)
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
