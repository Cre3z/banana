@extends('layouts.wed')
@section('content')

    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/email-scheduler"> Email Scheduler </a>
            </div>
        </div>
    </nav>

    <div class="content mt-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title">All Emails</h4>
                            <p class="category">All guests guests, invited, pending and RSVP.</p>
                        </div>
                        <div class="card-content table-responsive">
                            <div id="">
                                <a href="/add-email" class="btn btn-primary floatRight">+ Add Email</a>
                            </div>
                            <div class="clearfix"></div>
                            <table data-pagination="true" data-search="true" data-toggle="table" data-url="/emails" class="table" data-toolbar="#toolbar">
                                <thead class="text-primary">
                                <tr>
                                    <th>Something Goes here</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $('.nav li').removeClass('active');
        $('#email-scheduler').addClass('active');
    });
</script>
@endsection