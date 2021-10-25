@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    Channels Permissions
@endsection

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table id="videos-table" class="table table-stribed" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Channel Name</th>
                        <th>Email</th>
                        <th>Channel Type</th>
                        <th>Update</th>
                        <th>Delete</th>
                        <th>Block</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->isSuperAdmin() ? 'Supervisor' : ($user->isAdmin() ? 'Manager' : 'User')}}</td>
                            <td>
                                <form class="mr-4 form-inline" action="{{route('channels.update',$user)}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <select class="form-control form-control-sm" name="administration_level">
                                        <option selected disabled>select type</option>
                                        <option value="0">User</option>
                                        <option value="1">Manager</option>
                                        <option value="2">Supervisor</option>
                                    </select>
                                    <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Update</button>
                                </form>
                            </td>
                            <td>
                                <form style="display: inline-block" action="{{route('channels.delete',$user)}}" method="post">
                                    @method('DELETE')
                                    @csrf

                                    @if (auth()->user()!=$user && !$user->isSuperAdmin())
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this channel ?')"><i class="fa fa-trash"></i> Delete</button>    
                                    @else
                                        <button type="submit" class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> Delete</button>    
                                    @endif
                                    
                                </form>
                            </td>
                            <td>
                                <form style="display: inline-block" action="{{route('channels.block',$user)}}" method="post">
                                    @method('PATCH')
                                    @csrf

                                    @if (auth()->user()!=$user && !$user->isSuperAdmin())
                                        @if ($user->block)
                                            <button type="submit" class="btn btn-warning btn-sm disabled"><i class="fas fa-lock"></i> Blocked</button>        
                                        @else
                                            <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure you want to delete this channel ?')"><i class="fas fa-lock"></i> Block</button>    
                                        @endif
                                       
                                    @else
                                        <button type="submit" class="btn btn-warning btn-sm disabled"><i class="fas fa-lock"></i> Block</button>        
                                    @endif
                                    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    
        </div>
    </div>
@endsection

@section('script')

    <!-- Page level plugins -->
    <script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#videos-table').DataTable({
            
            });
        });
    </script>

@endsection