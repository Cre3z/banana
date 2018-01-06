@extends('layouts.wed')
@section('content')

    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/email-scheduler"> User Management </a>
            </div>
        </div>
    </nav>

    <div class="content mt-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="red">
                            <h4 class="title">All Users</h4>
                            <p class="category">Users that have access to this system.</p>
                        </div>
                        <div class="card-content table-responsive">
                            <div id="">
                                <a href="/add-user" class="btn btn-primary floatRight">+ Add User</a>
                            </div>
                            <div id="toolbar">
                                <a href="#" class="btn btn-warning floatRight deactivate"><i class="material-icons">delete_forever</i> Deactivate Users</a>
                            </div>
                            <div class="clearfix"></div>
                            <table data-pagination="true" data-search="true" data-toggle="table" data-url="/users_json" class="table" data-toolbar="#toolbar" id="users_tbl">
                                <thead class="text-primary">
                                <tr>
                                    <th data-checkbox="true" data-field="id">#</th>
                                    <th data-sortable="true" data-field="name">Name</th>
                                    <th data-field="email" data-sortable="true">Email</th>
                                    <th data-sortable="true" data-field="role">Role</th>
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
        $('#users').addClass('active');
    });
</script>
@endsection