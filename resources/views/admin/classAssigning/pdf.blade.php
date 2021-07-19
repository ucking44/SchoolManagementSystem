<style>
.pull{
    text-align: center;
    border: 1px solid;
}
th{
    text-align: center;
}
table{
    align-content: center;
}
</style>

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
                                            <th>Teacher</th>
                                            <th>Semester</th>
                                            <th >Course</th>
                                            <th style="text-align: center">Details</th>
                                            {{-- <th style="text-align: center">Edit</th>
                                            <th style="text-align: center">Delete</th> --}}
                                        </thead>
                                        <tbody>
                                            @foreach($classAssignings as $classAssigning)
                                                <tr>
                                                    <td>{{ $classAssigning->name }}</td>
                                                    <td>{{ $classAssigning->semester_name }}</td>
                                                    <td>{{ $classAssigning->course_name }}</td>
                                                    <td>{{ $classAssigning->class_name }} | {{ $classAssigning->batch }} |
                                                        {{ $classAssigning->day_name }} | {{ $classAssigning->level }} |
                                                        {{ $classAssigning->shift }} | {{ $classAssigning->time }} |
                                                        {{ $classAssigning->classroom_name }}
                                                    </td>
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

