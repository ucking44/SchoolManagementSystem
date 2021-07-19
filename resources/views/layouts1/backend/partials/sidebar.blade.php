<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('asset/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('asset/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

          {{-- <li class="nav-item has-treeview {{ Request::is('prospective-student*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('prospective-student*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
              <p>
                Prospective Student
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('prosstudent.create') }}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create Prospective Student</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('prosstudent.index') }}" class="nav-link active {{ Request::is('prospective-student*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Prospective Student</p>
                    </a>
                </li>
            </ul>
          </li> --}}

          {{-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}
            <li class="nav-item has-treeview {{ Request::is('class*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('class*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Class
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('class.create') }}" class="nav-link {{ Request::is('class/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Class</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('class.index') }}" class="nav-link {{ Request::is('class/index*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Classes</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('admission*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('admission*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Admission
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admission.create') }}" class="nav-link {{ Request::is('admission/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Admission</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('admission.index') }}" class="nav-link {{ Request::is('admission/index*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Admission List</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('academic*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('academic*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Academic
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('academic.create') }}" class="nav-link {{ Request::is('academic/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Academic</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('academic.index') }}" class="nav-link {{ Request::is('academic/index*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Academics</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('batch*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('batch*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Batch
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('batch.create') }}" class="nav-link {{ Request::is('batch/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Batch</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('batch.index') }}" class="nav-link {{ Request::is('batch/index*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Batches</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('faculty*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('faculty*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Faculty
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('faculty.create') }}" class="nav-link {{ Request::is('faculty/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Faculty</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('faculty.index') }}" class="nav-link {{ Request::is('faculty/index*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Faculties</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('department*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('department*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Department
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('department.create') }}" class="nav-link {{ Request::is('department/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Department</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('department.index') }}" class="nav-link {{ Request::is('department/index*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Departments</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('course*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('course*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Course
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('course.create') }}" class="nav-link {{ Request::is('course/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Course</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('course.index') }}" class="nav-link {{ Request::is('course/index*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Course</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('level*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('level*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Level
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('level.create') }}" class="nav-link {{ Request::is('level/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Level</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('level.index') }}" class="nav-link {{ Request::is('level/index*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Level</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('day*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('day*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Day
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('day.create') }}" class="nav-link {{ Request::is('day/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Day</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('day.index') }}" class="nav-link {{ Request::is('day/index*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Days</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('shift*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('shift*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Shift
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('shift.create') }}" class="nav-link {{ Request::is('shift/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Shift</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('shift.index') }}" class="nav-link {{ Request::is('shift/index*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Shift</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('time*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('time*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Time
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('time.create') }}" class="nav-link {{ Request::is('time/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Time</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('time.index') }}" class="nav-link {{ Request::is('time/index*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Times</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('feestructure*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('feestructure*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Fee Structure
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('feestructure') }}" class="nav-link {{ Request::is('feestructure/index*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fee Structures</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('classAssigning*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('classAssigning*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Class Assigning
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('classAssigning/create') }}" class="nav-link {{ Request::is('classAssigning/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Class Assigning</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ url('classAssigning') }}" class="nav-link {{ Request::is('classAssigning/index*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Class Assignings</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('semester*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('semester*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Semester
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('semester.create') }}" class="nav-link {{ Request::is('semester/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Semester</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('semester.index') }}" class="nav-link {{ Request::is('semester/index*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Semesters</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('classroom*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('classroom*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Class Room
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('classroom.create') }}" class="nav-link {{ Request::is('classroom/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Class Room</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('classroom.index') }}" class="nav-link {{ Request::is('classroom/index*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Class Rooms</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('classScheduling*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('classScheduling*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Class Scheduling
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('classScheduling.create') }}" class="nav-link {{ Request::is('classScheduling/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Class Scheduling</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('classScheduling.index') }}" class="nav-link {{ Request::is('classScheduling/index*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Class Schedulings</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('teacher*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('teacher*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Teacher
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('teacher.create') }}" class="nav-link {{ Request::is('teacher/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Teacher</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('teacher.index') }}" class="nav-link {{ Request::is('teacher/index*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Teachers</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('student*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('student*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Student
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('student.create') }}" class="nav-link {{ Request::is('student/create*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Student</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('student.index') }}" class="nav-link {{ Request::is('student/index*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Students</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ Request::is('stock/report*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('stock/report*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Reports
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="" class="nav-link {{ Request::is('stock/report*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Stock Reports</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
