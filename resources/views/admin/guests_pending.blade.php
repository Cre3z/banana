@include('modals.send_emails')
@extends('layouts.wed')
@section('content')
@include('partials.hamburger')
<div class="content mt-70">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-4 col-md-12">
                <a href="/guests_all">
                    <div class="card card-nav-tabs">
                        <div class="card-header" data-background-color="green">
                            <h4 class="title">All Guests</h4>
                            <p class="category">All guests guests, invited, pending and RSVP.</p>
                        </div>
                        <div class="card-content">

                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-12">
                <a href="/guests_rsvp">
                    <div class="card card-nav-tabs">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title">RSVP Guests</h4>
                            <p class="category">All guests that have received an invitation and accepted.</p>
                        </div>
                        <div class="card-content">

                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-12">
                <a href="/guests_invited">
                    <div class="card card-nav-tabs">
                        <div class="card-header" data-background-color="">
                            <h4 class="title">Provisional Guests</h4>
                            <p class="category">All guests that you are considering to invite.</p>
                        </div>
                        <div class="card-content">

                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Invites Pending</h4>
                        <p class="category">All guests that have received an invitation but not yet accepted.</p>
                    </div>
                    <div class="card-content table-responsive">
                        <div id="">
                            <a href="/guests_add" class="btn btn-primary floatRight">+ Invite Guest</a>
                        </div>
                        <div class="clearfix"></div>
                        <div id="toolbar">
                            <a href="#" class="btn btn-default send"><i class="material-icons">mail</i>  Resend Email Invites</a>
                            <p>Note: Plus one's will not receive an email.</p>
                        </div>
                        <table data-pagination="true" data-search="true" data-toggle="table" data-url="/guests_pending_json" class="table" data-toolbar="#toolbar" data-value="guests">
                            <thead class="text-primary">
                                <tr>
                                    <th data-checkbox="true" data-field="id">ID</th>
                                    <th data-sortable="true" data-field="name">Name</th>
                                    <th data-field="cell">Cell</th>
                                    <th data-sortable="true" data-field="email">Email</th>
                                    <th data-sortable="true" data-field="plus_one">Plus One</th>
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
        $('#guests').addClass('active');
    });
</script>
@endsection
