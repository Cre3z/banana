@extends('layouts.wed')
@section('content')
@include('partials.hamburger')
<div class="content mt-70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Add New Event</h4>
                        <p class="category">I bet you are planning something special. Naughty or Nice?</p>
                    </div>
                    <div class="card-content table-responsive">

                        <form role="form" action="" method="post" class="invite_form">

                            {{ csrf_field() }}
                            <div class="row">

                                @if(session('error'))
                                <div class="col-md-10 col-md-offset-1 text-center">
                                    <div class="alert alert-warning">
                                        <p>{{ session('error') }}</p>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="secret" class="public_list">
                                            This event is a surprise.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Title</label><br>
                                        <input type="text" class="form-control" name="title" required>
                                    <span class="material-input"></span></div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Type</label><br>
                                        <select name="type" class="form-control" required>
                                            <option value="nice">Nice</option>
                                            <option value="naughty">Naughty</option>
                                        </select>
                                    <span class="material-input"></span></div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Date</label><br>
                                        <input type="date" class="form-control" name="date" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Time</label><br>
                                        <input type="time" class="form-control" name="time" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Enter event location here...</label>
                                        <input type="text" class="form-control" name="location" required>
                                    <span class="material-input"></span></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Enter event description here...</label>
                                        <textarea name="description" id="emailBody" required class="form-control" placeholder="" rows="10"></textarea>
                                    <span class="material-input"></span></div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 text-center">
                                    <p>Want to invite guests? One thing at a time.<br>Once you have successfully added this event you will be able to invite guests.</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 text-center">
                                    <button type="submit" class="btn btn-primary btn-block">+ Add Event<div class="ripple-container"></div></button>
                                </div>
                            </div>

                        </form>

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
