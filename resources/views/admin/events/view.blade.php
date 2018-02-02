@extends('layouts.wed')
@section('content')
@include('partials.hamburger')
<div class="content mt-70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">{{ ucfirst($event->title) }}</h4>
                        <p class="category">This event is marked as {{ ucfirst($event->type) }}.</p>
                    </div>
                    <div class="card-content table-responsive">
                        <div class="row">
                          <div class="col-md-6"><p>Date: <strong>{{ $event->date }}</strong></p></div>
                          <div class="col-md-6"><p>Time: <strong>{{ $event->time }}</strong></p></div>
                        </div>
                        <div class="row">
                          <div class="col-md-6"><p>Location: <strong>{{ $event->location }}</strong></p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              <p>Description: {{ $event->description }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="/events/update/{{ str_replace(' ', '-', $event->title) }}" class="btn btn-default btn-block">Edit Event<div class="ripple-container"></div></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" data-background-color="red">
                        <h4 class="title">Comments</h4>
                        <p class="category">Hear what people have to say.</p>
                    </div>
                    <div class="card-content table-responsive">
                      <form role="form" action="/events/comments" method="post">
                        {{ csrf_field() }}
                        <input name="id" value="{{ $event->id }}" type="hidden">
                        <div class="row">
                          <div class="col-xs-12">
                              <div class="form-group label-floating is-empty">
                                  <label class="control-label">I have something to say....</label>
                                  <input type="text" class="form-control" name="comment">
                              <span class="material-input"></span></div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-warning btn-block">Post Comment<div class="ripple-container"></div></button>
                            </div>
                        </div>
                      </form>
                      <div class="row">
                        <div class="col-xs-12">
                          @foreach($event->comments as $comment)
                          <div>
                            <p><strong>{{ $comment['name'] }}: </strong>{{ $comment['body'] }}</p>
                            <p class="text-right btn-xs"><small>{{ date('D d M Y', strtotime($comment['datetime'])) }} @ {{ date('H:i', strtotime($comment['datetime'])) }}</small></p>
                          </div>
                          <hr>
                          @endforeach
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-nav-tabs">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">To do List</h4>
                        <p class="category">A list referencing all the things that need to be attended to for this event.</p>
                    </div>
                    <div class="card-content">
                      @if(!$event->todo)
                        @if(!$todos)
                        <br><p class="text-center">You have no to do lists to link with this event. <br>Why not create one?</p>
                        <a href="/todo" class="btn btn-block btn-success">Create to do list</a>
                        @else
                        <form role="form" action="/events/todo/" method="post">
                          {{ csrf_field() }}
                          <select class="form-control" name="todo">
                            @foreach($todos as $todo)
                            <option value="{{ $todo->id }}">{{ $todo->name }}<option>
                            @endforeach
                          </select>
                          <input name="id" value="{{ $event->id }}" type="hidden">
                          <button class="btn btn-block btn-success" type="submit">Link to do List</button>
                        </form>
                        @endif
                      @else
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="checkbox floatRight">
                                    <label>
                                        @if($todos->public == true)
                                        <input type="checkbox" name="public_list" class="public_list" checked data-id="{{ $todos->id }}">
                                        @else
                                        <input type="checkbox" name="public_list" class="public_list" data-id="{{ $todos->id }}">
                                        @endif
                                        Make this list public.
                                    </label>
                                </div>
                            </div>
                        </div>

                        <table class="table">
                            <tbody>
                              @if(count($todos->entries) > 0)
                                @foreach($todos->entries as $key=>$entry)
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                @if($entry['checked'] == true)
                                                <input type="checkbox" name="todo_entry" class="todo_entry" checked data-index="{{ $key }}" data-id="{{ $todos->id }}">
                                                @else
                                                <input type="checkbox" name="todo_entry" class="todo_entry" data-index="{{ $key }}" data-id="{{ $todos->id }}">
                                                @endif
                                            </label>
                                        </div>
                                    </td>
                                    <td class="input_hidden hidden"><input name="new" class="edit_entry_input" value="{{ $entry['body']}}" type="text"></td>
                                    <td class="input_hidden edit_entry_input_value">{{ $entry['body']}}</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs edit_entry" data-original-title="Edit Task" data-index="{{ $key }}" data-id="{{ $todos->id }}">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs edit_entry hidden entry_save_input" data-original-title="Save" data-index="{{ $key }}" data-id="{{ $todos->id }}">
                                            <i class="material-icons">done</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs remove_entry" data-original-title="Remove" data-index="{{ $key }}" data-id="{{ $todos->id }}">
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
                                    <input type="text" class="form-control" name="new">
                                <span class="material-input"></span></div>
                            </div>

                            <div class="col-xs-12">
                                <input type="hidden" data-id="{{ $todos->id }}" class="form_id" name="id" value="{{ $todos->id }}">
                                <input name="event" value="{{ $event->title }}" type="hidden">
                                <button type="submit" class="btn btn-success btn-block">+ Add to List<div class="ripple-container"></div>
                                </button>
                            </div>
                          </form>
                          <div class="col-xs-12 col-md-6 text-left">
                            <form role="form" action="/events/unlink" method="post">
                              {{ csrf_field() }}
                                <input name="id" value="{{ $event->id }}" type="hidden">
                                <input type="hidden" data-id="{{ $todos->id }}" class="form_id" name="todo" value="{{ $todos->id }}">
                                <button type="submit" rel="tooltip" title="" class="btn btn-simple btn-xs" data-original-title="Unlink this List from this event" data-index="{{ $key }}" data-id="{{ $todos->id }}">
                                    <i class="material-icons">close</i>Unlink list
                                </button>
                            </form>
                          </div>
                          <div class="col-xs-12 col-md-6 text-right">
                            <form role="form" action="/todo/delete" method="post">
                              {{ csrf_field() }}
                                <input type="hidden" data-id="{{ $todos->id }}" class="form_id" name="id" value="{{ $todos->id }}">
                                <button type="submit" rel="tooltip" title="" class="btn btn-simple btn-xs remove_entry" data-original-title="Delete this List" data-index="{{ $key }}" data-id="{{ $todos->id }}">
                                    <i class="material-icons">close</i>Remove list
                                </button>
                            </form>
                          </div>
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
        $('#events').addClass('active');
    });
</script>
@endsection
