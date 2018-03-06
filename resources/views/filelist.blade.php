<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;

            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .table {
            color: #333;
            font-family: Helvetica, Arial, sans-serif;
            width: 640px;
            border-collapse:
                    collapse; border-spacing: 0;
        }

        .table td, th {
            border: 1px solid transparent; /* No more visible border */
            height: 30px;
            transition: all 0.3s;  /* Simple transition for hover effect */
        }

        .table th {
            background: #DFDFDF;  /* Darken header a bit */
            font-weight: bold;
        }

        .table td {
            background: #FAFAFA;
            text-align: center;
        }

        /* Cells in even rows (2,4,6...) are one color */
        .table  tr:nth-child(even) td { background: #F1F1F1; }

        /* Cells in odd rows (1,3,5...) are another (excludes header cells)  */
        .table tr:nth-child(odd) td { background: #FEFEFE; }

        .table tr td:hover { background: #666; color: #FFF; }
        /* Hover cell effect! */
        .button {
            font: bold 11px Arial;
            text-decoration: none;
            background-color: #EEEEEE;
            color: #333333;
            padding: 2px 6px 2px 6px;
            border-top: 1px solid #CCCCCC;
            border-right: 1px solid #333333;
            border-bottom: 1px solid #333333;
            border-left: 1px solid #CCCCCC;
        }

    </style>
</head>
<body>
<div class=" links" align="right"> <a href="{{ URL('/save') }}" class="button">Save </a>
    <a href="{{ URL('/logout') }}">Logout</a></div>
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}" align="center" style="color: #c7254e;">{{ Session::get('message') }}</p>
@endif
<div class="flex-center position-ref full-height">


    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>DownloadUrl</th>
            <th>File size(KB)</th>
            <th>MimeType</th>
           <!-- <th>Id</th> -->
            <th></th>

        </tr>
        </thead>
        <tbody>
        @foreach($file_list as $eachfile)
            <tr>
            <td>{!! $eachfile['name'] !!}</td>
                <td>{!! $eachfile['webViewLink'] !!}</td>
            <td>{!! $eachfile['size'] !!}</td>
            <td>{!! $eachfile['mimetype'] !!}</td>
          <!--  <td>{!! $eachfile['id'] !!}</td>-->
            <td> </td>
            </tr>

        @endforeach

        </tbody>
    </table>


</div>
</body>
</html>
