@extends('layouts.wed')
@section('content')
@include('partials.hamburger')
<div class="content mt-70">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="green">
                        <h4 class="title">All Events</h4>
                        <p class="category">Upcoming events that you or your bridal party have scheduled before the big day.</p>
                    </div>
                    <div class="card-content table-responsive">
                        <div id="">
                            <a href="/events/add" class="btn btn-primary floatRight">+ Add Event</a>
                        </div>
                        <div class="clearfix"></div>
                        <table data-pagination="true" data-search="true" data-toggle="table" data-url="/events/json" class="table" data-toolbar="#toolbar">
                            <thead class="text-primary">
                                <tr>
                                    <th data-sortable="true" data-field="title">Title</th>
                                    <th data-field="date">Date</th>
                                    <th data-field="time">Time</th>
                                    <th data-sortable="true" data-field="organizer">Organizer</th>
                                    <th data-sortable="true" data-field="count">Attendees</th>
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
        $('#events').addClass('active');
    });
</script>
@endsection
