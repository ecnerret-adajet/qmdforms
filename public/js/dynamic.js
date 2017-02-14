$(document).ready(function(){
  var i=1;
        $("#add_row").click(function(){
        $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='document_title[]' type='text' placeholder='Document title' class='form-control input-md' id='document_title_"+i+"'  /></td><td><input name='control_code[]' type='text' placeholder='Control code' class='form-control input-md' id='control_code_"+i+"'  /></td><td><input name='copy_no[]' type='text' placeholder='Copy no' class='form-control input-md' id='copy_no_"+i+"'  /></td><td><input name='copy_holder[]' type='text' placeholder='Copy holder' class='form-control input-md' id='copy_holder_"+i+"'  /></td><td><input name='recieved_by[]' type='text' placeholder='Recieved by' class='form-control input-md' id='recieved_by_"+i+"'  /></td><td><input name='date_list[]' type='date' class='form-control input-md' id='date_list_"+i+"'  /></td>");
        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
         if(i>1){
         $("#addr"+(i-1)).html('');
         i--;
         }
     });

});