@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Email
                </div>
                <div class="float-end">
                    <a href="{{ route('emails.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('emails.update',$email->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row">
                        <label for="pc_name" class="col-md-4 col-form-label text-md-end text-start">PC Name <span class="text-danger">(*)</span></label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('pc_name') is-invalid @enderror" id="pc_name" name="pc_name" value="{{ $email->pc_name }}">
                            @if ($errors->has('pc_name'))
                                <span class="text-danger">{{ $errors->first('pc_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Full Name <span class="text-danger">(*)</span></label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $email->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="chinese_name" class="col-md-4 col-form-label text-md-end text-start">Chinese Name <span class="text-danger">(*)</span></label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('chinese_name') is-invalid @enderror" id="chinese_name" name="chinese_name" value="{{ $email->chinese_name }}">
                            @if ($errors->has('chinese_name'))
                                <span class="text-danger">{{ $errors->first('chinese_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="dep_id" class="col-md-4 col-form-label text-md-end text-start">Dep <span class="text-danger">(*)</span></label>
                        <div class="col-md-6">
                            <select class="form-select @error('dep_id') is-invalid @enderror" name="dep_id" aria-label="Default select example">
                                <option selected value="0">Open this select dep</option>
                                @foreach ($deps as $dep)
                                    @if ($dep->publish)
                                        <option value="{{$dep->id}}" @if ($email->dep_id == $dep->id)
                                            selected
                                        @endif>{{$dep->name}}</option>
                                    @endif
                                @endforeach
                              </select>
                            @if ($errors->has('dep_id'))
                                <span class="text-danger">{{ $errors->first('dep_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email <span class="text-danger">(*)</span></label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $email->email }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="role" class="col-md-4 col-form-label text-md-end text-start">Login Name</label>
                        <div class="col-md-6">
                            <select class="form-select @error('role') is-invalid @enderror" name="role" aria-label="Default select example">
                                <option selected value="0">Open this select login</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}" @if ($email->role == $user->id)
                                        selected
                                    @endif>{{$user->name}}</option>
                                @endforeach
                              </select>
                            @if ($errors->has('role'))
                                <span class="text-danger">{{ $errors->first('role') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ip" class="col-md-4 col-form-label text-md-end text-start">IP <span class="text-danger">(*)</span></label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('ip') is-invalid @enderror" id="ip" name="ip" value="{{ $email->ip }}">
                            @if ($errors->has('ip'))
                                <span class="text-danger">{{ $errors->first('ip') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="skype" class="col-md-4 col-form-label text-md-end text-start">Skype</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('skype') is-invalid @enderror" id="skype" name="skype" value="{{ $email->skype }}">
                            @if ($errors->has('skype'))
                                <span class="text-danger">{{ $errors->first('skype') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="zalo" class="col-md-4 col-form-label text-md-end text-start">Zalo</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('zalo') is-invalid @enderror" id="zalo" name="zalo" value="{{ $email->zalo }}">
                            @if ($errors->has('zalo'))
                                <span class="text-danger">{{ $errors->first('zalo') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="webchat" class="col-md-4 col-form-label text-md-end text-start">Web Chat</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('webchat') is-invalid @enderror" id="webchat" name="webchat" value="{{ $email->webchat }}">
                            @if ($errors->has('webchat'))
                                <span class="text-danger">{{ $errors->first('webchat') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="line" class="col-md-4 col-form-label text-md-end text-start">Line</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('line') is-invalid @enderror" id="line" name="line" value="{{ $email->line }}">
                            @if ($errors->has('line'))
                                <span class="text-danger">{{ $errors->first('line') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label text-md-end text-start form-control-label ">Off Job:</label>
                        <div class="col-md-6">
                            <div class="form-check-inline mb-1">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="off_job" value="1" {{$email->off_job == 1?"checked":""}}>
                                    <span class="bg-danger nb-check text-white">Yes</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                            <label class="col-md-4 col-form-label text-md-end text-start form-control-label ">Publish:</label>
                        <div class="col-md-6">
                            <div class="form-check-inline mb-1">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="publish" value="0" {{$email->publish == 0?"checked":""}}>
                                    <span class="bg-secondary nb-check text-white">No</span>
                                </label>
                            </div>
                            <div class="form-check-inline mb-1 ">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="publish" value="1" {{$email->publish == 1?"checked":""}}>
                                    <span class="bg-success text-white nb-check">Yes</span>
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update Email">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
    //ajax search pc name
    $('#pc_name').on('input', function() {
        search_Pcname();
    });
    //ajax search ip
    $('#ip').on('input', function() {
        search_ip();
    });
    function search_Pcname() {
        var search = $('#pc_name').val();
        var url = '{{route('emails.search_pcname')}}';
        $.ajax({
            type: 'get',
            url: url,
            data: {
                'search': search
            },
            success:function(data){
                console.log(data);
                if(data.length == 0){
                    $('#ip').val('');
                }else{
                    $('#ip').val(data['0']['ip_address']);
                }

            },
            error: function(error) {
            console.error('Ajax request failed: ', error);
            }
        })
    }
    function search_ip() {
        var search = $('#ip').val();
        var url = '{{route('emails.search_ip')}}';
        $.ajax({
            type: 'get',
            url: url,
            data: {
                'search': search
            },
            success:function(data){
                console.log(data);
                if(data.length == 0){
                    $('#pc_name').val('');
                }else{
                    $('#pc_name').val(data['0']['network_name']);
                }

            },
            error: function(error) {
            console.error('Ajax request failed: ', error);
            }
        })
    }
</script>
@endsection
