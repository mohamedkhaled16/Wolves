function checkeddata() {
    var data = false;
    $("#form :text").each(function() {
        if ($(this).val() == '') {
            $(this).css('background', '#f2dede');
            data = true;
        }
    });
    if ($('#form :password').val() == '') {
        $('#form :password').css('background', '#f2dede');
        data = true;
    }
    if ($('#form #select').val() == '') {
        $('#form #select').css('background', '#f2dede');
        data = true;
    }
    if (data) {
        return false;
    }else{
        return true;
    }
}
//$(function(){
//	$('.dropdown-toggle').hover(function(){
//		$(this).dropdown('toggle');
//	},function(){
//		$(this).dropdown('toggle');
//	});
//	$('.dropdown').on('show.bs.dropdown shown.bs.dropdown hide.bs.dropdown hidden.bs.dropdown',function(e){
//		//alert(e.type);
//	});
//});
