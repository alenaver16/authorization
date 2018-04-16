$(document).ready(function(){
    $("#registration").on("submit",function(e){
        e.preventDefault();
        $.ajax({
            url: "php/registration.php",
            method: "POST",
            data: $(this).serialize(),
            success: function (result) {
                $('#myModal').modal('show');
                $("#myModalLabel").text(result);
            }
        });
    });
});