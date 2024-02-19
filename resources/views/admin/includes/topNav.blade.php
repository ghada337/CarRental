<?php use Carbon\Carbon;?>
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                        data-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('Admin/images/img.jpg')}}" alt="">{{Auth::user()->username}}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:;"> Profile</a>
                        <a class="dropdown-item" href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                        </a>
                        <a class="dropdown-item" href="javascript:;">Help</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Log out') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                        data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">{{$Message->count()}}</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        @foreach ($Message as $message)
                        <li class="nav-item">
                            <a class="dropdown-item" href="{{route('admin.messages.Show',[$message->id])}}">
                                <span class="image"><img src="{{asset('admin/images/img.jpg')}}"
                                        alt="Profile Image" /></span>
                                <span>
                                    <span>{{$message->firstname}}{{$message->lastname}}</span>
                                    <span class="time">
                                        {{
                                        Carbon::parse($message['created_at'])->diffForHumans(Carbon::now())
                                        }}

                                    </span>
                                </span>
                                <span class="message">
                                    {{$message->message}}
                                </span>
                            </a>
                        </li>
                        @endforeach
                        <li class="nav-item">
                            <div class="text-center">
                                <a class="dropdown-item" href="{{route('admin.messages.unread')}}">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
