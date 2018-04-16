// $(document).ready(function(){
//     $("#userInfo").on("submit",function(e){
//         e.preventDefault();
//
//         // var form_data = $(this).serialize();
//
//         $.ajax({
//             method: "POST",
//             data: $(this).serialize(),
//             success: function () {
//
//                 $("#userPageBlock").css("display", "table-row");
//                 $("#autorizationBlock").css("display", "none");
//                 $('#userEdit').modal('show');
//             }
//         });
//     });
// });

$(document).ready(function(){
    $("#userInfo").submit(function(e) {
        e.preventDefault();

        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            data: form_data,
            success: function () {
                $("#userPageBlock").css("display", "table-row");
                $("#autorizationBlock").css("display", "none");
                $('#userEdit').modal('show');
            }
        });
    });
});

// $(document).ready(function() {
//     $(".edit_form").submit(function(e) {
//         e.preventDefault();
//
//         var form_data = $(this).serialize();
//
//         $.ajax({
//             type: "POST",
//             url: "../edit.php",
//             data: form_data,
//             success: function(response) {
//                 console.log(response);
//             }
//         });
//     });
// });