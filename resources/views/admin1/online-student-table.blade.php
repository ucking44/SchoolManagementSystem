<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>

    input:read-only {
        border: none;
        border-color: transparent;
    }

</style>

<body>

    <div class="table-responsive">
        <div class="panel">
            <div class="panel-body">
                <div id="wait"></div>
            </div>
        </div>

        <table class="table table-striped table-bordered table-hover" id="batches-table">
            <thead>
                <tr>
                    <th>SN <sup>o</sup></th>
                    <th style="text-align: center">Status</th>
                    <th style="text-align: center">Student</th>
                    <th style="text-align: center">Login Time</th>
                    <th style="text-align: center">IP Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Roll::join('admissions', 'admissions.id', '=', 'rolls.student_id')->get() as $key => $students)

                @if($students->isonline == 1)

                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td><a href="#"><i class="fa fa-circle text-success"></i> Online</a></td>
                    <td>{{ $students->name }}</td>
                    <td style="text-align: center">{{ date('H:i:s', strtotime($students->created_at)) }}</td>
                    <td style="text-align: center">{{ $students->ip_address }}</td>
                </tr>

                @endif

                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>
