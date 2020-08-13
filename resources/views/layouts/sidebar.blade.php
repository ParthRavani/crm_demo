@section('sidebar')

<!-- Sidebar Start-->
 {{-- <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">

        <div class="app-sidebar__user">
            <div class="profileImage"></div>
            <div>
                <p class="app-sidebar__user-name firstName"></p>
                <p class="app-sidebar__user-name lastName"></p>
            </div>
        </div>

        <ul class="app-menu">
            @php
            $routeName = Route::current()->getName();
            @endphp
            <li><a class="app-menu__item {{$routeName == 'home' ? 'active' : ''}}" href="{!!route('home')!!}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">{{__('adminPanel.dashboard')}}</span></a></li>
            <li><a class="app-menu__item {{$routeName == 'companies' ? 'active' : ''}}" href="{!!route('companies')!!}"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">{{__('adminPanel.betHistory')}}</span></a></li>
            <li><a class="app-menu__item {{$routeName == 'employees' ? 'active' : ''}}" href="{!!route('employees')!!}"><i class="app-menu__icon fa fa-gamepad"></i><span class="app-menu__label">{{__('adminPanel.gameHistory')}}</span></a></li>


        </ul>
    </aside> --}}

<!-- Sidebar End-->

@php
            $routeName = Route::current()->getName();
            @endphp
            {{-- {{$routeName}} --}}
<nav class="navbar navbar-expand navbar-light bg-dark">
    <ul class="nav navbar-nav">
        <li class="nav-item {{$routeName == 'home' ? 'active' : ''}}">
            <a  class="nav-link" href="{!!route('home')!!}">DashBoard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{$routeName == 'companies.index' ? 'active' : ''}}">
            <a  class="nav-link" href="{!!route('companies.index')!!}">Companies <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{$routeName == 'employees.index' ? 'active' : ''}}">
            <a  class="nav-link" href="{!!route('employees.index')!!}">Employees <span class="sr-only">(current)</span></a>
        </li>
    </ul>
</nav>
<style>
    .bg-dark{
        background-color: lightblue !important;
    }
    .nav-item .active{
        color: black !important;
    }
    .nav-item {
        color: white !important;
    }
</style>

@endsection
