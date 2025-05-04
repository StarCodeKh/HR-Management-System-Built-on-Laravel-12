<ul class="nav nav-tabs nav-tabs-solid nav-justified">
    <li class="nav-item"><a class="nav-link {{set_active(['user/dashboard/index'])}}" href="{{ route('user/dashboard/index') }}">Dashboard</a></li>
    <li class="nav-item"><a class="nav-link {{set_active(['user/dashboard/all'])}}" href="{{ route('user/dashboard/all') }}">All </a></li>
    <li class="nav-item"><a class="nav-link {{set_active(['user/dashboard/save'])}}" href="{{ route('user/dashboard/save') }}">Saved</a></li>
    <li class="nav-item"><a class="nav-link {{set_active(['user/dashboard/applied/jobs'])}}" href="{{ route('user/dashboard/applied/jobs') }}">Applied</a></li>
    <li class="nav-item"><a class="nav-link {{set_active(['user/dashboard/interviewing'])}}" href="{{ route('user/dashboard/interviewing') }}">Interviewing</a></li>
    <li class="nav-item"><a class="nav-link {{set_active(['user/dashboard/offered/jobs'])}}" href="{{ route('user/dashboard/offered/jobs') }}">Offered</a></li>
    <li class="nav-item"><a class="nav-link {{set_active(['user/dashboard/visited/jobs'])}}" href="{{ route('user/dashboard/visited/jobs') }}">Visitied </a></li>
    <li class="nav-item"><a class="nav-link {{set_active(['user/dashboard/archived/jobs'])}}" href="{{ route('user/dashboard/archived/jobs') }}">Archived </a></li>
</ul>