<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('styles')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @php
        $user = Auth::user();
    @endphp
</head>
<body>
    <div id="app">
        <v-app id="inspire">
            @auth
            <v-navigation-drawer
                v-model="drawer"
                app
            >
                <v-list>
                    <a href="/" style="text-decoration: none">
                        <v-list-item link>
                            <v-list-item-icon>
                                <v-icon>mdi-view-dashboard</v-icon>
                            </v-list-item-icon>
                    
                            <v-list-item-content>
                                <v-list-item-title>{{ 'Dashboard' }}</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </a>
                    <a href="/profile" style="text-decoration: none">
                        <v-list-item link>
                            <v-list-item-icon>
                                <v-icon>mdi-account-outline</v-icon>
                            </v-list-item-icon>
                    
                            <v-list-item-content>
                                <v-list-item-title>{{ 'Profile' }}</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </a>
                    @if($user->roleIs(['Super Admin', 'Admin']))
                    <a href="{{route('users.index')}}" style="text-decoration: none">
                        <v-list-item link>
                            <v-list-item-icon>
                                <v-icon>mdi-account-box</v-icon>
                            </v-list-item-icon>
                    
                            <v-list-item-content>
                                <v-list-item-title>{{ 'Users' }}</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </a>
                    @endif
                    <a href="{{route('research-data.collect')}}" style="text-decoration: none">
                        <v-list-item link>
                            <v-list-item-icon>
                                <v-icon>mdi-content-paste</v-icon>
                            </v-list-item-icon>
                    
                            <v-list-item-content>
                                <v-list-item-title>{{ 'Research Form' }}</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </a>
                    <a href="{{route('research-data')}}" style="text-decoration: none">
                        <v-list-item link>
                            <v-list-item-icon>
                                <v-icon>mdi-content-paste</v-icon>
                            </v-list-item-icon>
                    
                            <v-list-item-content>
                                <v-list-item-title>{{ 'Research Data' }}</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </a>
                </v-list>
              
                <template v-slot:append>
                    <v-list>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <v-list-item
                                link
                            >
                                <v-list-item-icon>
                                    <v-icon>mdi-logout</v-icon>
                                </v-list-item-icon>
                        
                                <v-list-item-content>
                                    <v-list-item-title>{{ 'Log out' }}</v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>    
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </v-list>
                </template>
            </v-navigation-drawer>
            @endauth
        
            <v-app-bar app>
                @auth
                <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
                @endauth

                <v-toolbar-title>
                    <a href="/" tag style="cursor: pointer; text-decoration: none; color: grey">{{config('app.name')}}</a>
                </v-toolbar-title>
            </v-app-bar>
        
            <!-- Sizes your content based upon application components -->
            <v-main>
                @yield('content')
            </v-main>

            <v-footer app>
                @include('layouts.footers.auth')
            </v-footer>
        </v-app>
    </div>

    @stack('script')
    <script>
        $('.copyright').append(new Date().getFullYear());
        // Laravel ajax-token integration
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': _token
            }
        });
    </script>
</body>
</html>
