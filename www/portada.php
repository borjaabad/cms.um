
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bootstrap, from Twitter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <!-- Le styles -->
        <link href="<?php echo BASE_URL .'public/css/bootstrap.min.css';?>" rel="stylesheet">
        
        <style>
            body {
                padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
            }
        </style>
        <link href="<?php echo BASE_URL .'public/css/bootstrap-responsive.min.css';?>" rel="stylesheet">
        <link href="<?php echo BASE_URL .'public/css/base.css';?>" rel="stylesheet">
        
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->
    </head>
    
    <body>
        
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    
                </div>
            </div>
            
            <div class="container">
                <div class="row-fluid">
                    <div class="span12  gris">
                        <div class="row-fluid">
                            <div class="span10 naranja">
                                CUERPO CENTRAL
                                <div class="span12 verde">TOP CABECERA
                                <div class="row-fluid">
                                    <div class="span12 marron"><img src="<?php echo CABECERA;?>" /></div>
                                </div>
                                    </div>
                                <div class="row-fluid">
                                    <div class="span6 azul">Fluid 6a</div>
                                    <div class="span6 rojo">Fluid 6b</div>
                                </div>
                            </div>
                            <div class="span2 verde">Fluid 6</div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12 amarillo">PIE DE PAGINA</div>
                        </div>
                    </div>
                </div>
            </div> <!-- /container -->
            
            <!-- Le javascript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="<?php echo BASE_URL .'public/js/jquery.js';?>"></script>
            <script src="<?php echo BASE_URL .'public/js/bootstrap.min.js';?>"></script>
    </body>
</html>
