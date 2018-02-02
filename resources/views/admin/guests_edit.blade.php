@extends('layouts.wed')
@section('content')

@include('partials.hamburger')
<div class="content mt-70">
    <div class="container-fluid">
        <div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h4 class="title">Update Guest Details</h4>
            <p class="category">Change a guests personal details, so you always know where to find them.</p>
        </div>
        <div class="card-content">
            
            @if(!$guest['couple'])
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
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">First Name</label><br>
                            <input type="text" class="form-control" name="name" required value="{{ $guest->name }}">
                        <span class="material-input"></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Last Name</label><br>
                            <input type="text" class="form-control" name="surname" required value="{{ $guest->surname }}">
                        <span class="material-input"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Cell Number</label><br>
                            <input type="number" class="form-control" name="cell" required value="{{ $guest->cell }}">
                        <span class="material-input"></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Email Address</label><br>
                            <input type="email" class="form-control" name="email" required value="{{ $guest->email }}">
                        <span class="material-input"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="plus_one" @if($guest->plus_one == 'yes'){ checked }@endif @if($guest->invited == '1' || $guest->rsvp == '1'){ disabled }@endif>
                                This guest is allowed to bring a plus one. <br><br> Guests will be required to provide the name of their plus one.
                            </label>
                        </div>
                        <p>This guest has already received/accepted your invitation, you are unable to deselect this feature.</p>
                    </div>
                    @if($guest->rsvp == 'no')
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="rsvp">
                                Manually add this guest to your RSVP list. <br><br> Guests who do not have access to email or that have already RSVP'd and do not need to receive an invite. They will be added to your <strong>RSVP List</strong>.
                            </label>
                        </div>
                    </div>
                    @endif
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <button type="submit" class="btn btn-primary btn-block">Update guest details<div class="ripple-container"></div></button>
                    </div>
                </div>
            </form>
            @else
            <form role="form" action="/guests/couple/{{ $guest->id }}" method="post" class="invite_form">
                
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
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Name One</label><br>
                            <input type="text" class="form-control" name="name[]" required value="{{ $guest->name }}">
                        <span class="material-input"></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Surname One (Optional)</label><br>
                            <input type="text" class="form-control" name="surname[]" value="{{ $guest['couple']->name }}">
                        <span class="material-input"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Name Two</label><br>
                            <input type="text" class="form-control" name="name[]" required value="{{ $guest->surname }}">
                        <span class="material-input"></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Surname Two (Optional)</label><br>
                            <input type="text" class="form-control" name="surname[]" value="{{ $guest['couple']->surname }}">
                        <span class="material-input"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Cell Number</label><br>
                            <input type="number" class="form-control" name="cell" required value="{{ $guest->cell }}">
                        <span class="material-input"></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Email Address</label><br>
                            <input type="email" class="form-control" name="email" required value="{{ $guest->email }}">
                        <span class="material-input"></span></div>
                    </div>
                </div>
                @if($guest->rsvp == 'no')
                <div class="row">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="rsvp">
                                Manually add this couple to your RSVP list. <br><br> Guests who do not have access to email or that have already RSVP'd and do not need to receive an invite. They will be added to your <strong>RSVP List</strong>.
                            </label>
                        </div>
                    </div>
                </div>
                @endif
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <button type="submit" class="btn btn-primary btn-block">Update couple details<div class="ripple-container"></div></button>
                    </div>
                </div>
            </form>
            @endif
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
        $('.couple_invite').on('change', function(){ $('.invite_form').slideToggle();})
    });
</script>
@endsection