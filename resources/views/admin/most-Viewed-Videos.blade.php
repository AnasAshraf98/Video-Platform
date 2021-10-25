@extends('theme.default')

@section('heading')
    Most Watched Channels 
@endsection

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table id="videos-table" class="table table-stribed" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Video Name</th>
                        <th>Channel Name</th>
                        <th>Number Of Views</th>
                        <th>Date of Creation</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($mostViewedVideos as $view)
                        <tr>
                            <td><a href="/videos/{{$view->video->id}}">{{$view->video->title}}</a></td>
                            <td>{{$view->user->name}}</td>
                            <td>{{$view->views_number}}</td>
                            <td>
                                <p>{{$view->video->created_at}}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    
        </div>
    </div>

    <div>
        <canvas id="myChart" class="mt-4"></canvas>
    </div>
    
@endsection

@section('script')

    <script>

        var names = <?php echo $videoNames; ?> ;
        var totalViews = <?php echo $videoViews; ?> ;

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: names,
                datasets: [{
                    label: 'Most Viewed Channels',
                    data: totalViews,
                    backgroundColor: [
                        'rgb(0, 33, 47)',
                        'rgb(0, 33, 47)',
                        'rgb(0, 33, 47)',
                        'rgb(0, 33, 47)',
                        'rgb(0, 33, 47)',
                        'rgb(0, 33, 47)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection