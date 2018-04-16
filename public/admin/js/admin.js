$(document).ready(function(){

    //set headers
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

    //send emails on click
    $('a.send').on('click', function(){
        var data = $('table').bootstrapTable('getSelections');
        if(data.length != 0){
            $('.row.overlay').show();
            var count = 0;
            $.each(data, function(key, value){
                count++;
                if(value.email != null){
                    $('.text_name').text(value.name);
                    $.ajax({
                      url: "/guests_send",
                      data: {guest: value._id},
                      method: 'post',
                      success: function(data){console.log(data);}
                    });
                }
                if(count == data.length){$('.row.overlay').hide(); $('table').bootstrapTable('refresh');}
            });
        }
    });

    //deactivate users on the system
    $('a.deactivate').on('click', function(){
        var data = $('#users_tbl').bootstrapTable('getSelections');
        if(data.length != 0){
            $('.row.overlay').show();
            var count = 0;
            $.each(data, function(key, value){
                count++;
                if(value.email != null){
//                    $('.text_name').text(value.name);
                    $.ajax({
                      url: "/deactivate",
                      data: {email: value.email},
                      method: 'post',
                      success: function(data){console.log(data);}
                    });
                }
                if(count == data.length){$('.row.overlay').hide(); $('#users_tbl').bootstrapTable('refresh');}
            });
        }
    });

    //delete scheduled emails on table click
    $('a.delete_emails').on('click', function(){
        var data = $('#emails_tbl').bootstrapTable('getSelections');
        if(data.length != 0){
            $('.row.overlay').show();
            var count = 0;
            $.each(data, function(key, value){
                count++;
                if(value._id != null){
//                    $('.text_name').text(value.name);
                    $.ajax({
                      url: "/remove-email",
                      data: {id: value._id},
                      method: 'post',
                      success: function(data){console.log(data);}
                    });
                }
                if(count == data.length){$('.row.overlay').hide(); $('#emails_tbl').bootstrapTable('refresh');}
            });
        }
    });

    //toggle to do list public or private
    $('input.public_list').on('change', function(){
        var id = $(this).data('id');
        $.ajax({
          url: "/todo/status",
          data: {id: id},
          method: 'post',
          success: function(data){console.log(data);}
        });
    });

    //todo entry status
    $('input.todo_entry').on('change', function(){
        var id = $(this).data('id');
        var index = $(this).data('index');
        $.ajax({
          url: "/todo/entry",
          data: {id: id, index: index},
          method: 'post',
          success: function(data){console.log(data);}
        });
    });

    //todo entry delete
    $('button.remove_entry').on('click', function(){
        var id = $(this).data('id');
        var index = $(this).data('index');
        var parent = $(this).closest('tr');
        $.ajax({
          url: "/todo/entry/delete",
          data: {id: id, index: index},
          method: 'post',
          success: function(data){parent.remove();}
        });
    });

    //todo toggle hidden input
    $('button.edit_entry').on('click', function(){
        var key = $(this).data('index');
        $('#btn_edit_' + key + ', #btn_save_' + key + ', #input_' + key + ', #value_' + key).toggleClass('hidden');
    })

    //toggle new list modal
    $('a.add_new_list').on('click', function(){$('div.todo_list_new').toggle();})

    //save entry on edit_entry
    $('button.entry_save_input').on('click', function(){
      var key = $(this).data('index');
      var value = $('#input_value_' + key).val();
      var input = $('#value_' + key).text(value);
      var id = $(this).data('id');
      var index = $(this).data('index');
      $.ajax({
        url: "/todo/entry/update",
        data: {id: id, index: index, value: value},
        method: 'post',
        success: function(data){}
      });
    });

    //table view
    $('table').on('click-row.bs.table', function(e, row, $element){
      var value = $(this).data('value');
      if(value) { window.location = '/'+value+'/'+ row._id}
    });

});
