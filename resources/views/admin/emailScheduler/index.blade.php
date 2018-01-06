@extends('layouts.wed')
@section('content')

    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/home"> Home </a>
                <a class="navbar-brand" href="/email-scheduler"> Email Scheduler </a>
            </div>
        </div>
    </nav>

    <div class="content mt-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="green">
                            <h4 class="title">All Guests</h4>
                            <p class="category">All guests guests, invited, pending and RSVP.</p>
                        </div>
                        <div class="card-content table-responsive">
                            <div id="">
                                <a href="/guests_add" class="btn btn-primary floatRight">+ Invite Guest</a>
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
@endsection