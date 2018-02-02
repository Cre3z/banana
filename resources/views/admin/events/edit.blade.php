@extends('layouts.wed')
@section('content')
@include('partials.hamburger')
<div class="content mt-70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Update {{ $event->title }}</h4>
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
                                            @if($event->secret == true)
                                            <input type="checkbox" name="secret" class="public_list" checked>
                                            @else
                                            <input type="checkbox" name="secret" class="public_list">
                                            @endif
                                            This event is a surprise.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Title</label><br>
                                        <input type="text" class="form-control" name="title" required value="{{ $event->title }}">
                                    <span class="material-input"></span></div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Type</label><br>
                                        <select name="type" class="form-control" required>
                                            <option value="nice"
                                            @if($event->type == 'nice')
                                            selected
                                            @endif>Nice</option>
                                            <option value="naughty"
                                            @if($event->type == 'naughty')
                                            selected
                                            @endif>Naughty</option>
                                        </select>
                                    <span class="material-input"></span></div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Date</label><br>
                                        <input type="date" class="form-control" name="date" required value="{{ $event->date }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Time</label><br>
                                        <input type="time" class="form-control" name="time" required value="{{ $event->time }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Enter event location here...</label><br>
                                        <input type="text" class="form-control" name="location" required value="{{ $event->location }}">
                                    <span class="material-input"></span></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Enter event description here...</label><br>
                                        <textarea name="description" id="emailBody" required class="form-control" placeholder="" rows="10">{{ $event->description }}</textarea>
                                    <span class="material-input"></span></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 text-center">
                                    <input type="hidden" value="{{ $event->id }}" name="id">
                                    <button type="submit" class="btn btn-primary btn-block">Update Event<div class="ripple-container"></div></button>
                                </div>
                            </div>

                        </form>

                        <form role="form" action="/events/delete" method="post">
                          {{ csrf_field() }}
                          <div class="col-xs-12 text-right">
                              <input type="hidden" data-id="{{ $event->id }}" class="form_id" name="id" value="{{ $event->id }}">
                              <button type="submit" rel="tooltip" title="" class="btn btn-simple btn-xs remove_entry" data-original-title="Remove this Event" data-id="{{ $event->id }}">
                                  <i class="material-icons">close</i>Remove this event
                              </button>
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
