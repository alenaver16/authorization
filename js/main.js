$(document).ready(function(){
    $(document).on("click", "#log_in",function(){
        $('#registration_form').css("display","none");
        $('#log_form').css("display","block");
        $("#password_recovery_form").css("display","none");
    });
    $(document).on("click", "#sign_up",function(){
        $('#log_form').css("display","none");
        $('#registration_form').css("display","block");
        $("#password_recovery_form").css("display","none");
    });
    $(document).on("click", "#forget",function(){
        $('#log_form').css("display","none");
        $('#registration_form').css("display","none");
        $("#password_recovery_form").css("display","block");
    });
    $('.navbar-toggle').on('click', function() {
        $('body').css('background-size', '100% 800px');
    });
});