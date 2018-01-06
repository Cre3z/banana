@extends('layouts.wed')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Add New Email to Email Scheduler</h4>
                        <p class="category"></p>
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
                                <div class="col-md-4">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Email Name</label><br>
                                        <input type="text" class="form-control" name="name" required>
                                    <span class="material-input"></span></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Email Date</label><br>
                                        <input type="date" class="form-control" name="date" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Email Time</label><br>
                                        <input type="time" class="form-control" name="time" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Enter email message content here...</label>
                                        <textarea name="body" id="emailBody" required class="form-control" placeholder="" rows="10"></textarea>
                                    <span class="material-input"></span></div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 text-center">
                                    <button type="submit" class="btn btn-primary btn-block">+ Add Email<div class="ripple-container"></div></button>
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
        $('#email-scheduler').addClass('active');
    });
</script>
@endsection