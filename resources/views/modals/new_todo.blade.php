<div class="row overlay todo_list_new">
  <form role="form" method="post" action="/todo/new">
    <div class="col-sm-12 col-md-6 col-md-offset-3 overlay_txt mt-5">
         <div class="panel panel-default">
             <div class="panel-body">
                <div class="text-left">
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                      <h3>New To Do List</h3>
                    </div>
                    {{ csrf_field() }}
                    <div class="col-xs-12">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">List Name</label>
                            <input type="text" class="form-control" name="name">
                        <span class="material-input"></span></div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">List Details</label>
                            <input type="text" class="form-control" name="details">
                        <span class="material-input"></span></div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center">
                      <button type="submit" class="btn btn-success btn-block">+ Add New List<div class="ripple-container"></div></button>
                      <br><a href="#" class="add_new_list">Cancel</a>
                    </div>
                </div>
             </div>
        </div>
    </div>
  </form>
</div>
