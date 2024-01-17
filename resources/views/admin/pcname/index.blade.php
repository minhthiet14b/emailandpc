@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Pc Name List</div>
    <div class="card-body">
        @can('create-pcname')
            <a href="{{ route('pcnames.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Create PC Name</a>
        @endcan
        @can('import_pcname')
            <a href="{{ route('pcnames.addimport') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Import Excel</a>
        @endcan
        @can('export_pcname')
            <a href="{{ route('pcnames.export') }}" class="btn btn-warning btn-sm my-2"><i class="bi bi-plus-circle"></i> Export Excel</a>
        @endcan
        <div class="float-right">
            <form action="{{route('pcnames.search')}}" method="get" enctype="multipart/form-data">
                <input type="text" name="search" placeholder="Search by name" value="">
                <select name="field" style="height: 29px;">
                    <option value="network_name" {{ $field == 'network_name' ? 'selected' : '' }}>PC Name</option>
                    <option value="ip_address" {{ $field == 'ip_address' ? 'selected' : '' }}>IP Address</option>
                    <option value="model" {{ $field == 'model' ? 'selected' : '' }}>Model</option>
                </select>
                <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-search-heart"></i> Search</button>
            </form>
            @if(isset($search))
            <p>Search results for: {{ $search }}. From: {{$field}}</p>
            @endif
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Network Name</th>
                <th scope="col">IP Address</th>
                <th scope="col">Model</th>
                <th scope="col">Status</th>
                <th scope="col">Screen Size</th>
                <th scope="col">Year used</th>
                <th scope="col">Location</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pcnames as $key => $pcname)
                <tr lass="text-center nb-tr-{{$pcname->id}}">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $pcname->network_name }}</td>
                    <td>{{ $pcname->ip_address }}</td>
                    <td>{{ $pcname->model }}</td>
                    <td>{{ $pcname->status }}</td>
                    <td>{{ $pcname->screen_size }}</td>
                    <td>{{ date("Y") - date("Y",$pcname->year_used) }}</td>
                    <td>{{ $pcname->location }}</td>
                    <td>
                        <a href="{{ route('pcnames.show', $pcname->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                        @can('edit-pcname')
                            <a href="{{ route('pcnames.edit', $pcname->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                        @endcan
                        @can('delete-pcname')
                        <a href="{{ route('pcnames.delete', $pcname->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this PC Name?');"><i class="bi bi-trash"></i> Delete</a>
                        @endcan
                    </td>
                </tr>
                @empty
                    <td colspan="9">
                        <span class="text-danger">
                            <strong>No Dep Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>
        @if(isset($search))
        {{ $pcnames->appends(['search' => $search, 'field'=> $field])->links() }}
        @else
            {{ $pcnames->links() }}
        @endif
    </div>
</div>
@endsection
