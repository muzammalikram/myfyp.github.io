@extends('layouts.app')

@section('content')

    <br>

          <div>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="">
                  @csrf
                 <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  LOGOUT
              </a>
              </form>
          </div>


          <router-view></router-view>
    <vue-progress-bar></vue-progress-bar>
          
@endsection
