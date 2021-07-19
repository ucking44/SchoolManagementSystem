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
                    <th style="text-align: center">User</th>
                    {{-- <th style="text-align: center">Login Time</th> --}}
                    <th style="text-align: center">IP Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\User::all() as $key => $teachers)

                <tr>
                    <td>{{ $key + 1 }}</td>
                    @if($teachers->UserisOnline())
                    <td><a href="#"><i class="fa fa-circle text-success"></i> Online</a></td>
                    @else
                    <td><a href="#"><i class="fa fa-circle text-danger"></i> Offline</a></td>
                    @endif
                    <td>{{ $teachers->name }}</td>
                    <td style="text-align: center">{{ date('d-M-Y', strtotime($teachers->created_at)) }}</td>
                    {{-- <td style="text-align: center">{{ $teachers->ip_address }}</td> --}}
                </tr>

                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>
