{{-- @if (Auth::user()->role_id == 4) --}}

<li class="treeview">
    <a href="#">
        <i class="fa fa-dashboard"></i>
        <span>General</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">

        <li class="{{ Request::is('class*') ? 'active' : '' }}">
            <a href="{{ route('class.index') }}"><i class="fa fa-edit"></i><span>Classes</span></a>
        </li>

        <li class="{{ Request::is('classroom*') ? 'active' : '' }}">
            <a href="{{ route('classroom.index') }}"><i class="fa fa-edit"></i><span>Classrooms</span></a>
        </li>

        <li class="{{ Request::is('level*') ? 'active' : '' }}">
            <a href="{{ route('level.index') }}"><i class="fa fa-edit"></i><span>Levels</span></a>
        </li>

        <li class="{{ Request::is('batch*') ? 'active' : '' }}">
            <a href="{{ route('batch.index') }}"><i class="fa fa-edit"></i><span>Batches</span></a>
        </li>

        <li class="{{ Request::is('shift*') ? 'active' : '' }}">
            <a href="{{ route('shift.index') }}"><i class="fa fa-edit"></i><span>Shifts</span></a>
        </li>

        <li class="{{ Request::is('course*') ? 'active' : '' }}">
            <a href="{{ route('course.index') }}"><i class="fa fa-edit"></i><span>Courses</span></a>
        </li>

        <li class="{{ Request::is('faculty*') ? 'active' : '' }}">
            <a href="{{ route('faculty.index') }}"><i class="fa fa-edit"></i><span>Faculties</span></a>
        </li>

        <li class="{{ Request::is('time*') ? 'active' : '' }}">
            <a href="{{ route('time.index') }}"><i class="fa fa-edit"></i><span>Times</span></a>
        </li>

        <li class="{{ Request::is('academic*') ? 'active' : '' }}">
            <a href="{{ route('academic.index') }}"><i class="fa fa-edit"></i><span>Academics</span></a>
        </li>

        <li class="{{ Request::is('day*') ? 'active' : '' }}">
            <a href="{{ route('day.index') }}"><i class="fa fa-edit"></i><span>Days</span></a>
        </li>

        <li class="{{ Request::is('semester*') ? 'active' : '' }}">
            <a href="{{ route('semester.index') }}"><i class="fa fa-edit"></i><span>Semesters</span></a>
        </li>

    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-dashboard"></i>
        <span>Schedule</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">

        <li class="{{ Request::is('classAssignings*') ? 'active' : '' }}">
            <a href="#"><i class="fa fa-edit"></i><span>Class Assignings</span></a>
        </li>

        <li class="{{ Request::is('classScheduling*') ? 'active' : '' }}">
            <a href="{{ route('classScheduling.index') }}"><i class="fa fa-edit"></i><span>Class Schedulings</span></a>
        </li>

    </ul>
</li>
{{-- @endif --}}

<li class="{{ Request::is('admission*') ? 'active' : '' }}">
    <a href="{{ route('admission.index') }}"><i class="fa fa-user"></i><span>Admissions</span></a>
</li>

<li class="{{ Request::is('teachers*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-user-circle"></i><span>Teachers</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-user"></i><span>Users</span></a>
</li>

{{-- @if (Auth::user()->role_id == 4) --}}
<li class="{{ Request::is('attendances*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-calendar"></i><span>Attendances</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('transactions*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-money"></i><span>Transactions</span></a>
</li>
{{-- @endif --}}

    {{-- </ul>
</li> --}}


<li class="{{ Request::is('classScheduling*') ? 'active' : '' }}">
    <a href="{{ route('classScheduling.index') }}"><i class="fa fa-edit"></i><span>Class  Schedulings</span></a>
</li>





