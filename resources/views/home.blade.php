@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <p>This is your application dashboard.</p>
                    @canany(['create-role', 'edit-role', 'delete-role'])
                        <a class="btn btn-danger" href="{{ route('roles.index') }}">
                            <i class="bi bi-person-fill-gear"></i> Manage Roles</a>
                    @endcanany
                    @canany(['create-user', 'edit-user', 'delete-user'])
                        <a class="btn btn-success" href="{{ route('users.index') }}">
                            <i class="bi bi-people"></i> Manage Users</a>
                    @endcanany
                    @canany(['create-pcname', 'edit-pcname', 'delete-pcname', 'import_pcname'])
                        <a class="btn btn-info" href="{{ route('pcnames.index') }}">
                        <i class="bi bi-pc-display"></i> Manage Pc Name</a>
                    @endcanany
                    @canany(['create-dep', 'edit-dep', 'delete-dep'])
                        <a class="btn btn-warning" href="{{ route('deps.index') }}">
                            <i class="bi bi-bag"></i> Manage Dep</a>
                    @endcanany
                    @canany(['create-email', 'edit-email', 'delete-email', 'show-email'])
                    <a class="btn btn-primary" href="{{ route('emails.index') }}">
                        <i class="bi bi-envelope"></i> Manage Email</a>
                    @endcanany
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
