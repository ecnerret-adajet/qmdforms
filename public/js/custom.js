$(function () {

// datatables
$('#table-data').DataTable();
$('#table-data2').DataTable();
$('#table-data3').DataTable();
$('#table-data4').DataTable();

$('#trashed-data').DataTable();
$('#archive-data').DataTable();
$("[data-mask]").inputmask();

var checker = document.getElementById('checkme');
var sendbtn = document.getElementById('sendNewSms');
 // when unchecked or checked, run the function
 checker.onchange = function(){
if(this.checked){
    sendbtn.disabled = false;
} else {
    sendbtn.disabled = true;
}

}

});//end


$('.btnNext').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});

$('.btnPrevious').click(function(){
$('.nav-tabs > .active').prev('li').find('a').trigger('click');
});


