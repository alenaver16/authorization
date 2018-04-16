$(document).ready(function(){
    $("#log_in_form").on("submit",function(e){
        e.preventDefault();
        $.ajax({
            url: "php/login.php",
            method: "POST",
            data: $(this).serialize(),
            success: function (result) {
                $result = $.parseJSON(result);
                $("#myModal").modal('show');
                $("#myModalLabel").text($result.res);
                $("#users-log").text($result.log);
                if($result.res =="Welcome to your account!"){
                    $("#userPageBlock").css("display", "table-row");
                    $("#autorizationBlock").css("display", "none");
                }
            }
        });
    });
});