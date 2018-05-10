@extends('layouts.wed')
@section('content')
@include('partials.hamburger')
<div class="content mt-70">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-4 col-lg-offset-8 col-md-12">
                <a href="/guests_add">
                    <div class="card card-nav-tabs">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Invite a Guest</h4>
                            <p class="category">Add a new guest to the list.</p>
                        </div>
                        <div class="card-content">

                        </div>
                    </div>
                </a>
            </div>
        </div>
        
        <hr>
        
        <div class="row">
            <div class="col-lg-6 col-md-12">
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
            
            <div class="col-lg-6 col-md-12">
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
            
            <div class="col-lg-6 col-md-12">
                <a href="/guests_pending">
                    <div class="card card-nav-tabs">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title">Invites Pending</h4>
                            <p class="category">All guests that have received an invitation but not yet accepted.</p>
                        </div>
                        <div class="card-content">

                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-6 col-md-12">
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