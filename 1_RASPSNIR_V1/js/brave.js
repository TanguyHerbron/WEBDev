$(function(){

    $("#valid").click(function(){

        $.ajax({
            url: "includes/getBrave.php",
            dataType: "html",
            type: "POST",
            success:
            function(donnees,status,xhr) {
                $("#result").html(donnees);
            },
            error:
            function(xhr,status,error) {
                alert("param : " + xhr.responseText);
                alert("status : " + status);
                alert("error : " + error);
            }
        });


    });

});