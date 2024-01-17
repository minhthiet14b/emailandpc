@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Email List</div>
    <div class="card-body">
        @can('create-dep')
            <a href="{{ route('emails.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Email</a>
        @endcan
        <div class="float-right">
            <form action="{{route('emails.search')}}" method="get">
                <input type="text" name="search" placeholder="Search by name">
                <select name="field" style="height: 29px;">
                    <option value="name" {{ $field == 'name' ? 'selected' : '' }}>Name</option>
                    <option value="chinese_name" {{ $field == 'chinese_name' ? 'selected' : '' }}>Chinese Name</option>
                    <option value="pc_name" {{ $field == 'pc_name' ? 'selected' : '' }}>Pc Name</option>
                    <option value="email" {{ $field == 'email' ? 'selected' : '' }}>Email</option>
                    <option value="ip" {{ $field == 'ip' ? 'selected' : '' }}>IP</option>
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
                <th scope="col">PC Name</th>
                <th scope="col">Name</th>
                <th scope="col">Chinese Name</th>
                <th scope="col">Email</th>
                <th scope="col">IP</th>
                <th scope="col">Publish</th>
                <th scope="col">Off Job</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($emails as $key => $email)
                <tr lass="text-center nb-tr-{{$email->id}}" data-url="{{route('emails.status')}}">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $email->pc_name }}</td>
                    <td>{{ $email->name }}</td>
                    <td>{{ $email->chinese_name }}</td>
                    <td>{{ $email->email }}</td>
                    <td>{{ $email->ip }}</td>
                    <td>
                        @if ($email->publish == 1)
                        <span class="nb-check-publish-{{$key}} nb-check nb-publish-status" data-change="0" id="{{$email->id}}" title="Status" data-name="publish">
                            <i class="fa fa-check fa-lg text-success"></i>
                        </span>
                        @else
                            <span class="nb-check-publish-{{$key}} nb-check nb-publish-status" data-change="1" id="{{$email->id}}" title="Status" data-name="publish">
                                <i class="fa fa-times fa-lg text-secondary"></i>
                            </span>
                        @endif
                    </td>
                    <td>
                        @if ($email->off_job == 1)
                        <span class="">
                            <i class="fa fa-check fa-lg text-danger"></i>
                        </span>
                        @else
                            <span class="">
                                <i class="fa fa-times fa-lg text-secondary"></i>
                            </span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('emails.destroy', $email->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('emails.show', $email->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-dep')
                                <a href="{{ route('emails.edit', $email->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-dep')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this email list?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="9">
                        <span class="text-danger">
                            <strong>No Email Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>
        @if(isset($search))
            {{ $emails->appends(['search' => $search,'field' => $field])->links() }}
        @else
            {{ $emails->links() }}
        @endif
    </div>
</div>
@endsection
