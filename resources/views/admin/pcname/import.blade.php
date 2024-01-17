@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Import Excel
                </div>
                <div class="float-end">
                    <a href="{{ route('pcnames.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('pcnames.import')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="excel_file">
                    <button type="submit">Import PC Name</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
