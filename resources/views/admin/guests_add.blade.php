@extends('layouts.wed')
@section('content')

@include('partials.hamburger')
<div class="content mt-70">
    <div class="container-fluid">
        <div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h4 class="title">Add Guest</h4>
            <p class="category">Send an invite or just add someone to your provisional guest list.</p>
        </div>
        <div class="card-content">
            
            <div class="row">
                <div class="col-md-6 col-xs-12 col-md-offset-6 text-right">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="couple_invite" class="couple_invite">
                            Convert to Couple Invitation.
                        </label>
                    </div>
                </div>
            </div>
            
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
                            <label class="control-label">First Name</label>
                            <input type="text" class="form-control" name="name" required>
                        <span class="material-input"></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Last Name</label>
                            <input type="text" class="form-control" name="surname" required>
                        <span class="material-input"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Cell Number</label>
                            <input type="number" class="form-control" name="cell" required min="10">
                        <span class="material-input"></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Email Address</label>
                            <input type="email" class="form-control" name="email" required>
                        <span class="material-input"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="plus_one">
                                This guest is allowed to bring a plus one. <br><br> Guests will be required to provide the name of their plus one.
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="rsvp">
                                Manually add this guest to your RSVP list. <br><br> Guests who do not have access to email or that have already RSVP'd and do not need to receive an invite. They will be added to your <strong>RSVP List</strong>.
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <button type="submit" class="btn btn-primary btn-block">+ Add to Guest List<div class="ripple-container"></div></button>
                    </div>
                </div>
                <hr>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <p>Note: This guest will be added to your <strong>Provisional Guests</strong> list. When you are ready, you can click on the <strong>Send Email Invites</strong> button to send them an official invite.</p>
                    </div>
                </div>
            </form>
            
            <form role="form" action="/guests_add_couple" method="post" class="invite_form" style="display:none;">
                
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
                            <label class="control-label">Name One</label>
                            <input type="text" class="form-control" name="name[]" required>
                        <span class="material-input"></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Surname One (Optional)</label>
                            <input type="text" class="form-control" name="name[]">
                        <span class="material-input"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Name Two</label>
                            <input type="text" class="form-control" name="surname[]" required>
                        <span class="material-input"></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Surname Two (Optional)</label>
                            <input type="text" class="form-control" name="surname[]">
                        <span class="material-input"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Cell Number</label>
                            <input type="number" class="form-control" name="cell" required min="10">
                        <span class="material-input"></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Email Address</label>
                            <input type="email" class="form-control" name="email" required>
                        <span class="material-input"></span></div>
                    </div>
                </div>
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
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <button type="submit" class="btn btn-primary btn-block">+ Add Couple to Guest List<div class="ripple-container"></div></button>
                    </div>
                </div>
                <hr>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <p>Note: These guests will be added to your <strong>Provisional Guests</strong> list. When you are ready, you can click on the <strong>Send Email Invites</strong> button to send them an official invite.</p>
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
        $('#guests').addClass('active');
        $('.couple_invite').on('change', function(){ $('.invite_form').slideToggle();})
    });
</script>
@endsection