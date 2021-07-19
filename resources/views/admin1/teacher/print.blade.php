<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    .title {
        color: #636b6f;
        font-size: 25px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-decoration: underline;
        text-transform: uppercase;
        float: right; color: blue; margin-top: 20px; margin-right: 15%;
    }
    .pull {
        text-align: center;
        border: 1px solid;
        border-top: 1px solid;
        border-bottom: 1px solid;
    }
    td1 {
        text-align: center;
        border: 1px solid;
    }
</style>

<body>

    <div class="wrapper">
        <section class="invoice">
            <div class="row">
                <small class="pull-right"><?php echo date('D-M-Y'); ?></small>
                <div class="navbar-custom-menu">
                    <div class="col-xs-12">
                        {{-- <a href="#"><img src="{{ asset }}" alt="logo" srcset="" style="width: 70px; margin-left:30px"></a> --}}
                        <h1 class="title">Academic Information System</h1>
                        @foreach ($teachers as $teacher)

                    </div>
                </div>
                <br>
                <div class="row no-print">
                    <div class="col-xs-12">
                        <button type="button" class="btn btn-danger pull-right">
                            <a href="{{ URL::to('pdf-download-teacher-single', [$teacher->id]) }}" style="color: #fff"><i class="fa fa-download"></i> Generate PDF</a>
                        </button>
                        <button type="button" class="btn btn-info pull-right" style="margin-right: 5px;"><i class="fa fa-print" onclick="window.print();"></i> Print </button>
                    </div>
                </div>

                <div class="row-invoice-info">
                    <div class="col-sm-4 invoice-col" style="margin-left: 40px;">
                        <address>
                            <h3 style="font-weight: 300; font-size: 15px; font-style: bold"><b> Address, Uc King University</b></h3>
                            Surulere PO Box <br>
                            Adeshina, Block A 78431 <br>
                            Phone: (+234) 7065-9241-60 <br>
                            Email: ucking4niga@yahoo.com
                        </address>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 table-responsive" style="margin-left: 10px; padding-right: 50px;">
                        <table class="table table-striped" style="margin-left: 8px;">
                            <thead>
                                <h3 style="text-align: center; font-size: bold' font-width: 30px; font-weight: 600;"> <b style="color: red">Teacher</h3>
                                <tr>
                                    <td><img src="{{ asset('teacher_images/' . $teacher->image) }}" 
                                        alt="" class="rounded-circle" width="50" height="50" 
                                        style="border-radius: 50%; vertical-alight: middle;"></td>
                                    <td>
                                        <tr><th scope="col">Full Name </th> <td>{{ $teacher->name }}</td></tr>
                                        <tr><th scope="col">Nationality </th> <td>{{ $teacher->nationality }}</td></tr>
                                        <tr><th scope="col">Full Name </th> <td>{{ $teacher->name }}</td></tr>
                                        <tr><th scope="col">Date Of Birth </th> <td>{{ $teacher->dob }}</td></tr>
                                        <tr><th scope="col">Gender </th> <td>{{ $teacher->gender }}</td></tr>
                                        <tr><th scope="col">Phone </th> <td>{{ $teacher->phone }}</td></tr>
                                        <tr><th scope="col">Email </th> <td>{{ $teacher->email }}</td></tr>
                                        <tr><th scope="col">Address </th> <td>{{ $teacher->address }}</td></tr>
                                        <tr><th scope="col">Passport </th> <td>{{ $teacher->passport }}</td></tr>
                                        <tr><th scope="col">Status </th> 
                                            <td>@if ($teacher->status == 0)
                                                    Single
                                                @else
                                                    Married
                                                @endif
                                            </td>
                                        </tr>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
    </div>

</body>
</html>
