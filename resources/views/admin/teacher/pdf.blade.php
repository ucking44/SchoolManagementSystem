<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

<style>
    .names{
        color: red;
        font-family: 'Times New Roman', Times, serif;
        font-display: bold;
        font-size: large;
    }
    table{
        border: 1px solid;
    }
    .v1 {
        border-left: 6px solid green;
        height: 500px;
        position: absolute;
        left: 50%;
        margin-left: -3px;
        top: 0;
    }

    h6{
        display: inline-block;
    }
    h5{
        display: inline-block;
    }
</style>
<body>

    <div class="table-responsive-lg">
        <h1 style="float-right; color:blue; margin-top: 20px;"><i>Academic Information System</i> </h1>
        <h5><i>Name:</i> Success University</h5>
        <h5><i>Location:</i> Lagos</h5><br>
        <h6><i>Email:</i> university@gmail.com</h6>
        <h6><i>Phone: (+234)</i> 8768889 / 9887776</h6>
    </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                {{-- <h4 class="card-title "><b>All Students</b></h4> --}}
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table" class="table table-striped table-bordered" style="width:100%">
                                            <thead class=" text-primary">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Gender</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Date Of Birth</th>
                                                    <th>Address</th>
                                                    <th>Nationality</th>
                                                    <th>Passport</th>
                                                    {{-- <th>Image</th> --}}
                                                    <th>Date Registered</th>
                                                    <th>Status</th>
                                                    {{-- <th style="text-align: center">Class</th>
                                                    <th style="text-align: center">Details</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($teachers as $key => $teacher)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                    <td>{{ $teacher->name }}</td>
                                                    <td>{{ $teacher->gender }}</td>
                                                    <td>{{ $teacher->email }}</td>
                                                    <td>{{ $teacher->phone }}</td>
                                                    <td>{{ $teacher->dob }}</td>
                                                    <td>{{ $teacher->address }}</td>
                                                    <td>{{ $teacher->nationality }}</td>
                                                    <td>{{ $teacher->passport }}</td>
                                                    <td>{{ $teacher->dateregistered }}</td>

                                                    {{-- <td>
                                                        <img class="img-responsive img-thumbnail" src="{{ asset('uploads/teacher/' . $teacher->image) }}" style="height: 80px; width: 80px" alt="">
                                                    </td> --}}

                                                    <td>
                                                        @if($teacher->status == 'Single')
                                                            <span class="badge bg-blue">Single</span>
                                                        @else
                                                            <span class="badge bg-pink">Married</span>
                                                        @endif
                                                    </td>


                                                        {{-- <td style="text-align: center; border-right: 1px solid;
                                                        border-bottom: 1px solid; border-top: 1px solid;
                                                        border-left: 1px solid;" class="col-md-3">
                                                        <span class="names">Class:</span> {{ $teacher->class_name }}
                                                        </td>
                                                        <div class="v"></div>
                                                        <td style="text-align: center; border-bottom: 1px solid;
                                                        border-right: 1px solid; border-top: 1px solid;
                                                        border-left: 1px solid;" class="col-md-3">
                                                    </td>

                                                        <span class="names">Class:</span> {{ $teacher->class_name }} |
                                                        <span class="names">Semester:</span> {{ $teacher->semester_name }} |
                                                        <span class="names">Course:</span> {{ $teacher->course_name }} |

                                                        <span class="names">Batch:</span> {{ $teacher->batch }} |
                                                        <span class="names">Day:</span> {{ $teacher->day_name }} |
                                                        <span class="names">Level:</span> {{ $teacher->level }} |
                                                        <span class="names">Shift:</span> {{ $teacher->shift }} |
                                                        <span class="names">Time:</span> {{ $teacher->time }} |
                                                        <span class="names">Class Room:</span> {{ $teacher->classroom_name }} |
                                                        <span class="names">Start Time:</span> {{ $teacher->start_time }} |
                                                        <span class="names">End Time:</span> {{ $teacher->end_time }} | --}}

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</body>
</html>
