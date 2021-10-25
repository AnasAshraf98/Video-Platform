@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    Blocked Channels
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
                        <th>Created Date</th>
                        <th>Remove Block</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($channels as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>
                                <form action="{{route('channels.open.block',$user)}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('PATCH')
                                    
                                    @if ($user->block)
                                        <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Are you sue you want to remove the block channel')">
                                            <i class="fa fa-lock-open"></i> Remove Block
                                        </button>
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