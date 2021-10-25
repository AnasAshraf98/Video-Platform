<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasoub video</title>

    <!-- bootstrap -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/597cb1f685.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{!! asset('theme/css/sb-admin-2.css') !!}">

</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white">
            <a class="navbar-brand" href="#">Hasoub video</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item  {{request()->is('/') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('main')}}">                           
                            <i class="fas fa-home"></i>
                                Home Page  
                        </a>
                    </li>

                    @auth

                    <li class="nav-item {{request()->is('history') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('history')}}">                                
                            <i class="fas fa-history"></i>
                                Watch History 
                        </a>
                    </li>

                    <li class="nav-item {{request()->is('videos/create*') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('videos.create')}}">                                
                            <i class="fas fa-upload"></i>
                                Upload Video      
                        </a>
                    </li>

                    <li class="nav-item {{request()->is('videos') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('videos.index')}}">                                
                            <i class="far fa-play-circle"></i>
                                My Videos    
                        </a>
                    </li>
                    
                    @endauth

                    <li class="nav-item {{request()->is('channel*') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('channel.index')}}">                                
                            <i class="fas fa-film"></i>
                                 Channels  
                        </a>
                    </li>
                </ul>
            
                <ul class="navbar-nav mr-auto">

                        <div class="topbar" style="z-index: 1">
                            @auth
                                <li class="nav-item dropdown alert-dropdown no-arrow mx-1">
                                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-bell fa-fw fa-lg"></i>
                                        <!-- Counter - Alerts -->
                                        <span class="badge badge-danger badge-counter notif-count" data-count="{{App\Models\Alert::where('user_id',Auth::user()->id)->first()->alert}}">{{App\Models\Alert::where('user_id',Auth::user()->id)->first()->alert}}</span>
                                    </a>
                                    <!-- Dropdown - Alerts -->
                                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="alertsDropdown">
                                        
                                        
                                       

                                        <div class="alert-body">

                                        </div>
                                        <a class="dropdown-item text-center small text-gray-500" href="{{route('all.notification')}}">Show All Alerts</a>
                                    </div>
                                </li>
                            @endauth
                        </div>
                    @guest
                        <li class="nav-item mt-2">
                            <a href="{{route('login')}}" class="nav-link">{{__('Login')}}</a>
                        </li>
                        @if(Route::has('register'))
                            <li class="nav-item mt-2">
                                <a href="{{route('register')}}" class="nav-link">{{__('Register')}}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown justify-content-left mt-2">
                            <a id="navbarDropdown" class="nav-link" href="#" data-toggle="dropdown">
                                <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </a>        

                            <div class="dropdown-menu dropdown-menu-left px-2 text-left mt-2">
                            
                                <div class="pt-4 pb-1 border-t border-gray-200">
                                    <div class="flex items-center px-4">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <div class="flex-shrink-0 mr-3">
                                                <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                            </div>
                                        @endif
                        
                                        <div class="mr-3">
                                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                                        </div>
                                    </div>
                        
                                    <div class="mt-3 space-y-1">
                                        <!-- Account Management -->
                                        <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                            {{ __('Profile') }}
                                        </x-jet-responsive-nav-link>
                        
                                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                            <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                                {{ __('API Tokens') }}
                                            </x-jet-responsive-nav-link>
                                        @endif
                        
                                        @can('update-videos')
                                            <a href="{{route('admin.index')}}" class="dropdown-item">Admin Panel</a>
                                        @endcan

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                        
                                            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-jet-responsive-nav-link>
                                        </form>
                        
                                        <!-- Team Management -->
                                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                            <div class="border-t border-gray-200"></div>
                        
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Manage Team') }}
                                            </div>
                        
                                            <!-- Team Settings -->
                                            <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                                {{ __('Team Settings') }}
                                            </x-jet-responsive-nav-link>
                        
                                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                                    {{ __('Create New Team') }}
                                                </x-jet-responsive-nav-link>
                                            @endcan
                        
                                            <div class="border-t border-gray-200"></div>
                        
                                            <!-- Team Switcher -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Switch Teams') }}
                                            </div>
                        
                                            @foreach (Auth::user()->allTeams() as $team)
                                                <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                               
                            </div>
                        </li>

                       
                    @endguest
                </ul>
            </div>
          </nav>

          <main class="py-4">
              @if (Session::has('success'))
                  <div class="p-3 mb-2 bg-success text-white rounded mx-auto col-8">
                      <span class="text-center">{{session('success')}}</span>
                  </div>
              @endif

              @yield('content')
          </main>
    </div>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('6996997487ecf8248678', {
          cluster: 'eu'
        });
    
    </script>

    <script src="{{asset('js/pushNotifications.js')}}"></script>
    <script src="{{asset('js/failedNotifications.js')}}"></script>

    <script>
        var token = '{{ Session::token() }}';
        var urlNotify = '{{ route('notification') }}';

        $('#alertsDropdown').on('click', function(event) {
            event.preventDefault();
            var notificationsWrapper = $('.alert-dropdown');
            var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
            var notificationsCountElem = notificationsToggle.find('span[data-count]');
            
            notificationsCount = 0;
            notificationsCountElem.attr('data-count', notificationsCount);
            notificationsWrapper.find('.notif-count').text(notificationsCount);
            notificationsWrapper.show();

            $.ajax({
                method: 'POST',
                url: urlNotify,
                data: {
                    _token: token
                },
                success : function(data) {
                    var resposeNotifications = "";
                    $.each(data.someNotifications , function(i, item) {
                        var responseDate = new Date(item.created_at);
                        var date = responseDate.getFullYear()+'-'+(responseDate.getMonth()+1)+'-'+responseDate.getDate();
                        var time = responseDate.getHours() + ":" + responseDate.getMinutes() + ":" + responseDate.getSeconds();
                        
                        if (item.success) {
                            resposeNotifications += '<a class="dropdown-item d-flex align-items-center" href="#">\
                                                        <div class="mr-3">\
                                                            <div class="icon-circle bg-secondary">\
                                                                <i class="far fa-bell text-white"></i>\
                                                            </div>\
                                                        </div>\
                                                        <div>\
                                                            <div class="small text-gray-500">'+date+' time '+time+'</div>\
                                                            <span> Video clip <b>'+item.notification+'</b> is processed successfully </span>\
                                                        </div>\
                                                    </a>';
                        }
                        else {
                            resposeNotifications += '<a class="dropdown-item d-flex align-items-center" href="#">\
                                                        <div class="mr-3">\
                                                            <div class="icon-circle bg-secondary">\
                                                                <i class="far fa-bell text-white"></i>\
                                                            </div>\
                                                        </div>\
                                                        <div>\
                                                            <div class="small text-gray-500">'+date+' time '+time+'</div>\
                                                            <span>Sorry their is an error happened while processing video clip <b>'+item.notification+'</b>. So, may you please upload the video again </span>\
                                                        </div>\
                                                    </a>';
                        } 

                        $('.alert-body').html(resposeNotifications);
                   });
                }
            });
        });
    </script>

    @yield('script')
</body>
</html>