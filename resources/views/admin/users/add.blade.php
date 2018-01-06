@extends('layouts.wed')
@section('content')
@include('partials.hamburger')
<div class="content mt-70">
    <div class="container-fluid">
        <div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h4 class="title">Add User</h4>
            <p class="category"></p>
        </div>
        <div class="card-content">
            
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
                            <label class="control-label">Name</label><br><br>
                            <input type="text" class="form-control" name="name" required>
                        <span class="material-input"></span></div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Role</label><br><br>
                            <select name="role" class="form-control" required>
                                <option value="bridesmaid">Bridesmaid</option>
                                <option value="groomsmen">Groom's Men</option>
                                <option value="family member">Family Member</option>
                                <option value="friend">Friend</option>
                            </select>
                        <span class="material-input"></span></div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">User Color</label><br><br>
                            <select name="color" class="form-control" required>
                                <option value="blue">Blue</option>
                                <option value="red">Red</option>
                                <option value="orange">Orange</option>
                                <option value="green">Green</option>
                                <option value="purple">Purple</option>
                                <option value="default">Grey</option>
                            </select>
                        <span class="material-input"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Email Address</label><br><br>
                            <input type="email" class="form-control" name="email" required>
                        <span class="material-input"></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Password</label><br><br>
                            <input type="password" class="form-control" name="password" required>
                        <span class="material-input"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="send">
                                Send this user an email notification. <br><br> They will also receive their login details as supplied by you.
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <button type="submit" class="btn btn-primary btn-block">+ Add User<div class="ripple-container"></div></button>
                    </div>
                </div>
                <hr>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <p>Note: Users added have <strong>limited access</strong> as dictated by you. Their access can be revoked any time by clicking on <strong>Deactivate Users</strong> on the <strong>Users Page.</strong></p>
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
        $('#users').addClass('active');
    });
</script>
@endsection