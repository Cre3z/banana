@extends('layouts.wed')
@section('content')
@include('partials.hamburger')
<div class="content mt-70">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-4 col-md-6 col-lg-offset-8">
                <a href="/events/add">
                    <div class="card card-nav-tabs">
                        <div class="card-header" data-background-color="red">
                            <h4 class="title">+ Add a new Event.</h4>
                        </div>
                        <div class="card-content">
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="clearfix"></div><hr>
            
            @foreach($events as $event)
            <div class="col-lg-4 col-md-6">
                <a href="/events/{{ str_replace('-', ' ', $event->title) }}">
                    <div class="card card-nav-tabs">
                        <div class="card-header" data-background-color="{{ array_rand($colors) }}">
                            <h4 class="title">{{ ucfirst($event->title) }}</h4>
                        </div>
                        <div class="card-content">
                            <div class="col-xs-12 col-sm-7">
                                <p><strong>Date: </strong>{{ date('d M Y', strtotime($event->date)) }}</p>
                            </div>
                            <div class="col-xs-12 col-sm-5">
                                <p><strong>Time: </strong>{{ $event->time }}</p>
                            </div>
                            <div class="col-xs-12">
                                <p><strong>Location: </strong>{{ $event->location }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.nav li').removeClass('active');
        $('#events').addClass('active');
    });
</script>
@endsection
