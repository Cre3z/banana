@extends('layouts.wed')
@section('content')
@include('partials.hamburger')
<div class="content mt-70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">{{ ucfirst($event->title) }}</h4>
                        <p class="category">This event is marked as {{ ucfirst($event->type) }}.</p>
                    </div>
                    <div class="card-content table-responsive">
                        <div class="row">
                          <div class="col-md-6"><p>Date: <strong>{{ $event->date }}</strong></p></div>
                          <div class="col-md-6"><p>Time: <strong>{{ $event->time }}</strong></p></div>
                        </div>
                        <div class="row">
                          <div class="col-md-6"><p>Location: <strong>{{ $event->location }}</strong></p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              <p>Description: {{ $event->description }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="/events/update/{{ str_replace(' ', '-', $event->title) }}" class="btn btn-default btn-block">Edit Event<div class="ripple-container"></div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
