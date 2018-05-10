@include('modals.new_todo')
@extends('layouts.wed')
@section('content')
@include('partials.hamburger')
<div class="content mt-70">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-1 col-lg-offset-10 col-md-12">
                <a href="#" class="btn btn-primary add_new_list">
                    + Add New List
                </a>
            </div>
        </div>

        <hr>

        <div class="row">

            @foreach($all as $key=>$one)
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
                                            <input type="checkbox" name="public_list" class="public_list" checked data-id="{{ $one->id }}">
                                            @else
                                            <input type="checkbox" name="public_list" class="public_list" data-id="{{ $one->id }}">
                                            @endif
                                            Make this list public.
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <table class="table">
                                <tbody>
                                  @if(count($one->entries) > 0)
                                    @foreach($one->entries as $key=>$entry)
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    @if($entry['checked'] == true)
                                                    <input type="checkbox" name="todo_entry" class="todo_entry" checked data-index="{{ $key }}" data-id="{{ $one->id }}">
                                                    @else
                                                    <input type="checkbox" name="todo_entry" class="todo_entry" data-index="{{ $key }}" data-id="{{ $one->id }}">
                                                    @endif
                                                </label>
                                            </div>
                                        </td>
                                        <td class="input_hidden hidden" id="input_{{ $key }}"><input name="new" class="edit_entry_input form-control" value="{{ $entry['body']}}" type="text" id="input_value_{{ $key }}" required></td>
                                        <td class="input_hidden edit_entry_input_value" id="value_{{ $key }}">{{ $entry['body']}}</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs edit_entry" data-original-title="Edit Task" data-index="{{ $key }}" data-id="{{ $one->id }}" id="btn_edit_{{ $key }}">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs edit_entry hidden entry_save_input" data-original-title="Save" data-index="{{ $key }}" data-id="{{ $one->id }}" id="btn_save_{{ $key }}">
                                                <i class="material-icons">done</i>
                                            </button>
                                            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs remove_entry" data-original-title="Remove" data-index="{{ $key }}" data-id="{{ $one->id }}" id="btn_delete_{{ $key }}">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <br><br><tr><td class="text-center" colspan="3">I am sure there is a reason you created me...</td></tr>
                                    @endif
                                </tbody>
                            </table>
                            <hr>
                            <div class="clearfix"></div>
                              <form action="/todo/entry/new" method="post" role="form">
                                {{ csrf_field() }}
                                <div class="col-xs-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Please remember...</label>
                                        <input type="text" class="form-control" name="new" required>
                                    <span class="material-input"></span></div>
                                </div>

                                <div class="col-xs-12">
                                    <input type="hidden" data-id="{{ $one->id }}" class="form_id" name="id" value="{{ $one->id }}">
                                    <button type="submit" class="btn btn-success btn-block">+ Add to List<div class="ripple-container"></div>
                                    </button>
                                </div>
                              </form>
                              <form role="form" action="/todo/delete" method="post">
                                {{ csrf_field() }}
                                <div class="col-xs-12 text-right">
                                    <input type="hidden" data-id="{{ $one->id }}" class="form_id" name="id" value="{{ $one->id }}">
                                    <button type="submit" rel="tooltip" title="" class="btn btn-simple btn-xs remove_entry" data-original-title="Remove this List" data-index="{{ $key }}" data-id="{{ $one->id }}">
                                        <i class="material-icons">close</i>Remove list
                                    </button>
                                </div>
                              </form>
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
