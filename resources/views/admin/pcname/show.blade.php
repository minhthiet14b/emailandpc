@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Pc Name Information
                </div>
                <div class="float-end">
                    <a href="{{ route('pcnames.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <label for="network_name" class="col-md-4 col-form-label text-md-end text-start"><strong>Network Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $pcname->network_name }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="ip_address" class="col-md-4 col-form-label text-md-end text-start"><strong>Ip Address:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $pcname->ip_address }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="model" class="col-md-4 col-form-label text-md-end text-start"><strong>Model:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $pcname->model }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="processor" class="col-md-4 col-form-label text-md-end text-start"><strong>Processor:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $pcname->processor }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="operating_system" class="col-md-4 col-form-label text-md-end text-start"><strong>Operating System:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{$pcname->operating_system}}
                        </div>
                    </div>
                    <div class="row">
                        <label for="ram" class="col-md-4 col-form-label text-md-end text-start"><strong>Ram:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{$pcname->ram}}
                        </div>
                    </div>
                    <div class="row">
                        <label for="hark_disk" class="col-md-4 col-form-label text-md-end text-start"><strong>Hark Disk:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{$pcname->hark_disk}}
                        </div>
                    </div>
                    <div class="row">
                        <label for="motherboard_summary" class="col-md-4 col-form-label text-md-end text-start"><strong>Motherboard summary:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{$pcname->motherboard_summary}}
                        </div>
                    </div>
                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{$pcname->description}}
                        </div>
                    </div>
                    <div class="row">
                        <label for="current_user" class="col-md-4 col-form-label text-md-end text-start"><strong>Current User:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{$pcname->current_user}}
                        </div>
                    </div>
                    <div class="row">
                        <label for="status" class="col-md-4 col-form-label text-md-end text-start"><strong>Status:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{$pcname->status}}
                        </div>
                    </div>
                    <div class="row">
                        <label for="monitors_summary" class="col-md-4 col-form-label text-md-end text-start"><strong>Monitors Summary:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{$pcname->monitors_summary}}
                        </div>
                    </div>
                    <div class="row">
                        <label for="screen_size" class="col-md-4 col-form-label text-md-end text-start"><strong>Screen Size:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{$pcname->screen_size}}
                        </div>
                    </div>
                    <div class="row">
                        <label for="year_used" class="col-md-4 col-form-label text-md-end text-start"><strong>Year Used:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ date("d-m-Y",$pcname->year_used) }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="location" class="col-md-4 col-form-label text-md-end text-start"><strong>Location:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{$pcname->location}}
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
