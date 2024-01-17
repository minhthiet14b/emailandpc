@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Dep List</div>
    <div class="card-body">
        @can('create-dep')
            <a href="{{ route('deps.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Dep</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Publish</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($deps as $key => $dep)
                <tr lass="text-center nb-tr-{{$dep->id}}" data-url="{{route('deps.status')}}">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $dep->name }}</td>
                    <td>
                        @if ($dep->publish == 1)
                        <span class="nb-check-publish-{{$key}} nb-check nb-publish-status" data-change="0" id="{{$dep->id}}" title="Status" data-name="publish">
                            <i class="fa fa-check fa-lg text-success"></i>
                        </span>
                        @else
                            <span class="nb-check-publish-{{$key}} nb-check nb-publish-status" data-change="1" id="{{$dep->id}}" title="Status" data-name="publish">
                                <i class="fa fa-times fa-lg text-secondary"></i>
                            </span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('deps.destroy', $dep->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('deps.show', $dep->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-dep')
                                <a href="{{ route('deps.edit', $dep->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-dep')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this dep?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Dep Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $deps->links() }}

    </div>
</div>
@endsection
