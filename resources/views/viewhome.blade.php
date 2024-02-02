<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- favicon --}}
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Ty Thanh PC and Email list</title>
     <!-- js and css -->
     <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/jquery/jquery-3.7.0.js')}}"></script>
    <script src="{{asset('js/ajax/jquery.min.js')}}"></script>
     @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    @auth
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-white shadow-sm" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href=" {{ route('users.show',Auth::user()->id) }}">
                                Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                </li>
            </ul>
        </div>
    </nav>

    @endauth
    <div class="" style="margin:0px 20px">
        <div class="row justify-content-center mt-3">
            <div class="col-md-12">
                <h3 class="text-center mt-3 mb-3">TY THANH PC & EMAIL LIST</a></h3>
            </div>
        </div>
        <div class="row">
            <div class="form-group flex" style="margin-bottom:30px">
                    <label class="search">Search Name:</label>
                    <form action="{{route('search')}}" method="get" enctype="multipart/form-data">
                        <input type="text" name="search" placeholder="Search by name" value="">
                        <select name="field" style="height: 29px;">
                            <option value="name" {{ $field == 'name' ? 'selected' : '' }}>Name</option>
                            <option value="chinese_name" {{ $field == 'chinese_name' ? 'selected' : '' }}>Chinese Name</option>
                            <option value="pc_name" {{ $field == 'pc_name' ? 'selected' : '' }}>Pc Name</option>
                            <option value="email" {{ $field == 'email' ? 'selected' : '' }}>Email</option>
                            <option value="ip" {{ $field == 'ip' ? 'selected' : '' }}>IP</option>
                        </select>
                        <button type="submit" class="btn btn-warning btn-sm"><i class="bi bi-search-heart"></i> Search</button>
                        @auth
                            <a href="{{route('home')}}" class="btn-login" target="_blank">Admin page</a>
                        @else
                            <a href="{{asset('login')}}" class="btn-login" target="_blank">Admin page</a>
                        @endauth
                    </form>
                    @if(isset($search))
                    <p>Search results for: {{ $search }}. From: {{$field}}</p>
                    @endif
                </div>
                <div class="row" style="justify-content: center;">
                    <div class="content-off_job col-sm-3" style="text-align: center;">
                        <label for="" class="search">User Off</label>
                        <table class="table table-size ">
                            <thead>
                                <tr class="bg-success">
                                    <th scope="col">#</th>
                                    <th scope="col">PC name</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Chinese name</th>
                                </tr>
                                </thead>
                                <tbody class="table-danger">
                                <th scope="row">1</th>
                                <td>PC00</td>
                                <td>AA</td>
                                <td>AA</td>
                                </tbody>
                            </table>
                    </div>
                    <div class="content-new col-sm-3" style="text-align: center;">
                        <label for="" class="search">User New</label>
                        <table class="table table-size ">
                            <thead>
                                <tr class="bg-success">
                                <th scope="col">#</th>
                                <th scope="col">PC name</th>
                                <th scope="col">Name</th>
                                <th scope="col">Chinese name</th>
                                </tr>
                            </thead>
                            <tbody class="table-info">
                                <th scope="row">1</th>
                                <td>PC00</td>
                                <td>AA</td>
                                <td>AA</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            <div class="content-email ">
                <table class="table table ">
                    <thead>
                        <tr class="bg-success">
                          <th scope="col">#</th>
                          <th scope="col">PC name</th>
                          <th scope="col">Name</th>
                          <th scope="col">Chinese name</th>
                          <th scope="col">Dep</th>
                          <th scope="col">Email</th>
                          <th scope="col">IP</th>
                          <th scope="col">User</th>
                          <th scope="col">Skype</th>
                          <th scope="col">Zalo</th>
                          <th scope="col">WebChat</th>
                          <th scope="col">Line</th>
                          @auth
                          <th scope="col">Action</th>
                          @endauth
                        </tr>
                      </thead>
                      <tbody class="">
                        @foreach ($emails as $key =>  $email)
                        @if ($email->publish == 1)
                        <tr class="text-center @if ( $email->off_job == 0 & strtotime(date('Y-m-d H:i:s')) - strtotime($email->created_at)<= 2592000)table-info @elseif($email->off_job == 1) table-danger @endif ">
                          <th scope="row">{{ $key+1 }}</th>
                          <td>{{ $email->pc_name }}</td>
                          <td>{{ $email->name }}</td>
                          <td>{{ $email->chinese_name }}</td>
                          <td>
                            {{$email->deps->name}}
                          </td>
                          <td>{{ $email->email }}</td>
                          <td>{{ $email->ip }}</td>
                          <td>
                            {{$email->users->email ?? 'no'}}
                          </td>
                            <td>
                                @if ($email->skype)
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked disabled>
                                @else
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" disabled>
                                @endif
                            </td>
                            <td>
                                @if ($email->zalo)
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked disabled>
                                @else
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" disabled>
                                @endif
                            </td>
                            <td>
                                @if ($email->webchat)
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked disabled>
                                @else
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" disabled>
                                @endif
                            </td>
                            <td>
                                @if ($email->line)
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked disabled>
                                @else
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" disabled>
                                @endif
                            </td>
                            @auth
                                <td>
                                <a href="{{ route('emails.show', $email->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                </td>
                            @endauth
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                  </table>
                  <div id="paginate" class="paginate">
                    @if(isset($search))
                        {{ $emails->appends(['search' => $search,'field' => $field])->links() }}
                    @else
                        {{ $emails->links() }}
                    @endif
                  </div>

                <ul id="search-results"></ul>
                <div id="pagination"></div>

            </div>
        </div>
        <div class="row justify-content-center text-center mt-3">
            <div class="col-md-12">
                <p>
                    Ty Thanh Footwear Co., Ltd. Designed and Developed by IT YC.
                </p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // //search Name
        // $('#search').on('input', function() {
        //     search();
        // });
        // // $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

        // //reset search
        // $('#resetBtn').on('click', function() {
        //     $('#search').val('');
        //     search();
        // });
        // function search() {
        //     var search = $('#search').val();
        //     var url = $('.content-email tbody').attr('data-url');
        //     $.ajax({
        //         type: 'get',
        //         url: url,
        //         data: {
        //             'search': search
        //         },
        //         success:function(data){
        //             console.log(data);
        //             $('.content-email tbody').html(data['body']);
        //             $('#paginate').html(data['page']);
        //         },
        //         error: function(error) {
        //         console.error('Ajax request failed: ', error);
        //         }
        //     })
        // }
    </script>
</body>
</html>
