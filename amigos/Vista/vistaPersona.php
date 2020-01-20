<?php
    if(isset($_SESSION["duplicado"])){
        ?>
        <script> window.alert("Error"); </script>
        <?php
    }
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Personas</title>
        
        <meta charset="UTF-8">
            
        <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <title>Personas</title>
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous">
        </script>
        
        <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <script src="https://kit.fontawesome.com/ee3cf325ae.js" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                (function ($) {
                    $('#filtro').keyup(function () {
                        var rex = new RegExp($(this).val(), 'i');
                        $('.buscar tr').hide();
                        $('.buscar tr').filter(function () {
                            return rex.test($(this).text());
                        }).show();
                    })
                }(jQuery));
            });
        </script>           
	</head>
    <body>
        <?php            
            include_once 'formPersona.php';                    
        ?>        
    </body>
</html>
            
