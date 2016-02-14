var loader_image = "<img src='img/loader.gif' width='40' alt='loading...' style='margin-bottom: 30px;' />";
function checkuser() {
    var data = false;
    var error='';
    $("#adduser :text").each(function() {
        if ($(this).val() == '') {
            $(this).css('background', '#f2dede');
            data = true;
        }
    });
    if ($('#adduser :password').val() == '') {
        $('#adduser :password').css('background', '#f2dede');
        data = true;
    }else{
        if($('#adduser #pwd').val()!=$('#adduser #cpwd').val()){
           data = true;
           error='email not matched';
        }
    }
    if ($('#adduser #email').val() == '') {
        data = true;
    }
    if ($('#adduser #select').val() == '') {
        $('#adduser #select').css('background', '#f2dede');
        data = true;
    }
    if ($('#adduser :file').val() == '') {
        $('#adduser :file').css('background', '#f2dede');
        data = true;
    }
    if (data) {
       if(error!=''){
        $('.result').html(error);
        $('.result').show();

       }  
        return false;

    }else{
       
    $(".result").html(loader_image);

           return 1;

   }
}