@extends('layouts.frontend.app')

@section('title', 'Student')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/jquery-ui/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/jquery-ui/jquery-ui.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush

@section('content')
<style>
    input[readonly], textarea {
        background: white !important;
        border: none;
    }
    span {
        padding-left: 20px;
    }
    .input-icon {
        position: absolute;
        right: 3px;
        top: calc(50% - 0.5em);
    }
    #input-wrapper {
        position: relative;
    }
</style>

  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    {{-- <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('uploads/students/' . $students->image) }}" width="60" height="120"
                       alt="User profile picture"> --}}
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('uploads/admission/' . $students->image) }}" width="50" height="50"
                       {{-- src="{{ asset('asset/dist/img/user4-128x128.jpg') }}" --}}
                       style="border-radius: 50%; width: 150px; vartical-align: middle;"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $students->name }}</h3>

                <p class="text-muted text-center">students</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
                @include('layouts.flash-message')
                {{-- @include('layouts.backend.partials.msg') --}}
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Student Timetable</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Full Detail</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>

              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <section class="content-header">
                            <h1>
                                Class Time Table
                                <hr>
                            </h1>
                        </section>
                        <div class="content">
                            {{-- @include('layouts.backend.partials.msg') --}}
                            <div class="box box-primary">
                                <div class="box-body"> <br>

                                </div>
                            </div>
                        </div>
                        <h1> This is Class Time Table</h1>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        <section class="content-header">
                            <h1>
                                Student Bio-data / Profile
                                <hr>
                            </h1>
                        </section>
                        <div class="content">
                            {{-- @include('layouts.backend.partials.msg') --}}
                            <div class="box box-primary">
                                <div class="box-body"> <br>
                        <form action="" class="form-horizontal">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Full Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputName" value="{{ $students->name }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail" value="{{ $students->email }}" readonly>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="inputName" class="col-sm-3 control-label">Gender</label>
                                    <div class="col-sm-4">
                                        @if ($students->gender === "male")
                                        <span> Male </span>
                                        @else
                                        <span> Female </span>
                                        @endif
                                    </div>

                                    <label for="inputName" class="col-sm-2 control-label">Marrital Status</label>
                                    <div class="col-sm-3">
                                        <p>
                                            @if ($students->status === "enable")
                                            <span> Single </span>
                                            @else
                                            <span> Married </span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Date Of Birth</label>
                                <div class="col-sm-9">
                                    <input type="text" id="inputName" class="form-control" value="{{ $students->dob }}" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Phone No.</label>
                                <div class="col-sm-9">
                                    <input type="text" id="inputName" class="form-control" value="+{{ $students->phone }}" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Passport No.</label>
                                <div class="col-sm-9">
                                    <input type="text" id="inputName" class="form-control" value="{{ $students->passport }}" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-9">
                                    <textarea id="inputExperience" class="form-control" readonly="">{{ $students->address }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-3 control-label">Nationality</label>
                                <div class="col-sm-9">
                                    <input type="text" id="inputSkills" class="form-control" value="{{ $students->nationality }}" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-3 control-label">Register Date</label>
                                <div class="col-sm-9">
                                    <input type="text" id="inputSkills" class="form-control" value="{{ date("Y-m-d", strtotime ($students->dateregistered)) }}" readonly="">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
                  {{-- <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="{{ asset('asset/dist/img/user1-128x128.jpg') }}" src="http://placehold.it/150x100" alt="...">
                            <img src="{{ asset('asset/dist/img/user1-128x128.jpg') }}" src="http://placehold.it/150x100" alt="...">
                            <img src="{{ asset('asset/dist/img/user1-128x128.jpg') }}" src="http://placehold.it/150x100" alt="...">
                            <img src="{{ asset('asset/dist/img/user1-128x128.jpg') }}" src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div> --}}
                  <!-- /.tab-pane -->

                  {{-- @include('layouts.backend.partials.msg') --}}
                    <div class="tab-pane" id="settings">
                        <section class="content-header">
                            <h1>
                                Change Password
                                <hr>
                            </h1>
                        </section>
                        <div class="content">
                            {{-- @include('layouts.backend.partials.msg') --}}
                            <div class="box box-primary">
                                <div class="box-body"> <br>
                        <form action="{{ URL::to('/student-update-password') }}" method="POST" class="form-horizontal">
                            @csrf
                        <div class="form-group row">
                            <input type="hidden" class="form-control" name="email" id="" value="{{ $students->email }}">
                            <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                            <div id="input-wrapper" class="col-sm-10">
                            {{-- <div class="input-wrapper"> --}}
                            <input type="password" class="form-control" name="old_password" id="oldpassword" placeholder="Old Password">
                            <i class="input-icon" id="messageError"></i>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                            <input type="password" class="form-control" name="new_password" id="newpassword" placeholder="New Password">
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                            <input type="password" class="form-control" name="confirm_password" id="confirmpassword" placeholder="Confirm Password">
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                </label>
                            </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-info float-right">Update Password</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  {{-- </div> --}}
  <!-- /.content-wrapper -->

{{-- </div> --}}
<!-- ./wrapper -->


@endsection

{{-- @push('js') --}}
    <!-- DataTables -->


    {{-- <script>
        $(function() {
            $('#startDate').datepicker({
                autoclose:true,
                dateFormat:'dd-mm-yy',
            });
            $('#endDate').datepicker({
                autoclose:true,
                dateFormat:'dd-mm-yy',
            });
        })
    </script> --}}


{{-- @endpush --}}
@section('scripts')
<script>
    $(document).ready(function() {
        $("#oldpassword").keyup(function() {
            var old_password = $("#oldpassword").val();
            //alert(old_password);
            $.ajax({
                type: 'get',
                url: '/verify-password',
                data: {old_password:old_password},
                success: function(response) {
                    if (response == "false") {
                        $("#messageError").html("<font color='red'> <b>Password Incorrect</b> </font>");
                    }
                    else if (response == "true") {
                        $("#messageError").html("<font color='green'> <b>Password Correct</b> </font>");
                    }
                }
            });
        });
    });
</script>
@endsection

