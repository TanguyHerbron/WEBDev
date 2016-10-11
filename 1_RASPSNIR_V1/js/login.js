$(function(){

    $("#valid").click(function(){

        $.ajax({
            url: 'includes/execLogin.php',
            data: $("#login").serialize(),
            type: 'POST',
            dataType: 'html',
            success:
            function(donnees,status,xhr) {
                $("#adresse").text(donnees);
            },
            error:
            function (xhr, status, error) {
                alert("param : " + xhr.responseText);
                alert("status : " + status);
                alert("error : " + error);
            }
        });


    });

});


