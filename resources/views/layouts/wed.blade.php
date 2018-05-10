<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Suzaan & Jovan</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="/admin/css/bootstrap-table.css" rel="stylesheet" />
    <link href="/admin/css/admin.css" rel="stylesheet" />
    <link href="/admin/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

    <script src="/admin/js/jquery-3.2.1.min.js" type="text/javascript"></script>

</head>
<body>
    <div class="wrapper">

        @include('partials.sidebar')

        <div class="main-panel">
            @yield('content')
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="/admin/js/admin.js"></script>
<script src="/admin/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/admin/js/material.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<!-- <script src="/admin/js/chartist.min.js"></script> -->
<!--  Dynamic Elements plugin -->
<script src="/admin/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="/admin/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<!-- <script src="/admin/js/bootstrap-notify.js"></script> -->
<script src="/admin/js/bootstrap-table.js"></script>
<!--  Google Maps Plugin    -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Material Dashboard javascript methods -->
<script src="/admin/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<!-- <script src="/admin/js/demo.js"></script> -->

<!-- <script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script> -->

</html>
