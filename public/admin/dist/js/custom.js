$('document').ready(function(){
    var nama_state = false;
    var email_state = false;
    $('.nama').on('blur', function(){
     var nama = $('.nama').val();
     if (nama == '') {
         nama_state = false;
         return;
     }
     $.ajax({
       url: 'slider/addnew',
       type: 'post',
       data: {
           'nama_check' : 1,
           'nama' : nama,
       },
       success: function(response){
         if (response == 'taken' ) {
             nama_state = false;
             $('.nama').parent().removeClass();
             $('.nama').parent().addClass("form_error");
             $('.nama').siblings("span").text('nama telah Digunakan');
         }else if (response == 'not_taken') {
             nama_state = true;
             $('.nama').parent().removeClass();
             $('.nama').parent().addClass("form_success");
             $('.nama').siblings("span").text('nama available');
         }
       }
     });
    });		
   });