<li>
    <a href=" {{ route('alumni.dashboard') }} "><i class="fa fa-home"></i>Dashboard</a>
</li>

<li>
    <a href=" {{ route('alumni.personal') }} "><i class="fa fa-user"></i>Data Personal</a>
</li>

<li>
    <a href=" {{ route('alumni.pendidikan') }} "><i class="fa fa-graduation-cap"></i>Data Pendidikan</a>
</li>

<li>
    <a href=" {{ route('alumni.pekerjaan') }} "><i class="fa fa-briefcase"></i>Data Pekerjaan</a>
</li>

<li>
    <a href=" {{ route('alumni.wirausaha') }} "><i class="fa fa-list-alt"></i>Data Wirausaha</a>
</li>

<li style="padding-left:2px;">
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off text-danger"></i>{{__('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</li>
