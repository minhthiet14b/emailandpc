@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit New Pc Name
                </div>
                <div class="float-end">
                    <a href="{{ route('pcnames.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('pcnames.update',$pcname->id) }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="network_name" class="col-md-4 col-form-label text-md-end text-start">Network Name <span class="text-danger">(*)</span></label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('network_name') is-invalid @enderror" id="network_name" name="network_name" value="{{ $pcname->network_name }}">
                            @if ($errors->has('network_name'))
                                <span class="text-danger">{{ $errors->first('network_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ip_address" class="col-md-4 col-form-label text-md-end text-start">IP Address <span class="text-danger">(*)</span></label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('ip_address') is-invalid @enderror" id="ip_address" name="ip_address" value="{{ $pcname->ip_address }}">
                            @if ($errors->has('ip_address'))
                                <span class="text-danger">{{ $errors->first('ip_address') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="model" class="col-md-4 col-form-label text-md-end text-start">Model</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="model" name="model" value="{{ $pcname->model }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="processor" class="col-md-4 col-form-label text-md-end text-start">Processor</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="processor" name="processor" value="{{ $pcname->processor }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="total_HDD" class="col-md-4 col-form-label text-md-end text-start">Total HDD</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="total_HDD" name="total_HDD" value="{{ $pcname->total_HDD }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="operating_system" class="col-md-4 col-form-label text-md-end text-start">Oprerating System</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="operating_system" name="operating_system" value="{{ $pcname->operating_system }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ram" class="col-md-4 col-form-label text-md-end text-start">Ram</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="ram" name="ram" value="{{ $pcname->ram }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="hark_disk" class="col-md-4 col-form-label text-md-end text-start">Hark Disk</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="hark_disk" name="hark_disk" value="{{ $pcname->hark_disk }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="motherboard_summary" class="col-md-4 col-form-label text-md-end text-start">Motherboard Summary</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="motherboard_summary" name="motherboard_summary" value="{{ $pcname->motherboard_summary }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="description" name="description" value="{{ $pcname->description }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="current_user" class="col-md-4 col-form-label text-md-end text-start">Current User</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="current_user" name="current_user" value="{{ $pcname->current_user }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="status" class="col-md-4 col-form-label text-md-end text-start">Status</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="status" name="status" value="{{ $pcname->status }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="monitors_summary" class="col-md-4 col-form-label text-md-end text-start">Monitors Summary</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="monitors_summary" name="monitors_summary" value="{{ $pcname->monitors_summary }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="screen_size" class="col-md-4 col-form-label text-md-end text-start">Sreen Size</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="screen_size" name="screen_size" value="{{ $pcname->screen_size }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="year_used" class="col-md-4 col-form-label text-md-end text-start">Year Used</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control" id="year_used" name="year_used" min="1924-09-08" max="2124-09-08" value="{{ date("Y-m-d",$pcname->year_used) }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="location" class="col-md-4 col-form-label text-md-end text-start">Location</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="location" name="location" value="{{ $pcname->location }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update PC Name">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
