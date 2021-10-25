@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    All Channels 
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
                        <th>Number Of Video Clips</th>
                        <th>Number Of Views</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($channels as $user)
                        <tr>
                            <td><a href="{{route('main.channels.videos',$user)}}">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->videos->count()}}</td>
                            <td>
                                <p>{{$user->views->sum('views_number')}}</p>
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