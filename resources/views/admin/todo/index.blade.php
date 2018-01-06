@extends('layouts.wed')
@section('content')
@include('partials.hamburger')
<div class="content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-1 col-lg-offset-10 col-md-12">
                <a href="/" class="btn btn-primary">
                    + Add New List
                </a>
            </div>
        </div>
        
        <hr>
        
        <div class="row">
            
            @foreach($all as $one)
            <div class="col-lg-6 col-md-12">
                <a href="#">
                    <div class="card card-nav-tabs">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title">{{ $one->name }}</h4>
                            <p class="category">{{ $one->subtext }}</p>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-12"> 
                                    <div class="checkbox floatRight">
                                        <label>
                                            @if($one->public == true)
                                            <input type="checkbox" name="couple_invite" class="couple_invite" checked>
                                            @else
                                            <input type="checkbox" name="couple_invite" class="couple_invite">
                                            @endif
                                            Make this list public.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <table class="table">
                                <tbody>
                                    @foreach($one->entries as $entry)
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    @if($entry['checked'] == true)
                                                    <input type="checkbox" name="couple_invite" class="couple_invite" checked>
                                                    @else
                                                    <input type="checkbox" name="couple_invite" class="couple_invite">
                                                    @endif
                                                </label>
                                            </div>
                                        </td>
                                        <td>{{ $entry['body']}}</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs" data-original-title="Edit Task">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Remove">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-xs-12 col-md-8">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Please remember...</label>
                                        <input type="text" class="form-control" name="new">
                                    <span class="material-input"></span></div>
                                </div>
                                <div class="col-xs-12 col-md-4"><br>
                                    <button type="button" class="btn btn-success btn-block">+ Add to List<div class="ripple-container"></div>
                                    </button>
                                </div>
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
        $('#todo').addClass('active');
    });
</script>
@endsection