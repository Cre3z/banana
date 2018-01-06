$(document).ready(function(){
   
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
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
                      data: {email: value.email},
                      method: 'post',
                      success: function(data){console.log(data);}
                    });
                }
                if(count == data.length){$('.row.overlay').hide(); $('table').bootstrapTable('refresh');}
            });
        }
    });
    
    $('a.deactivate').on('click', function(){ 
        var data = $('#users_tbl').bootstrapTable('getSelections');
        if(data.length != 0){
            $('.row.overlay').show(); 
            var count = 0;
            $.each(data, function(key, value){ 
                count++;
                if(value.email != null){
                    $('.text_name').text(value.name);
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
    
});