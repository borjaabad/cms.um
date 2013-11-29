		</div>
	<?php Alertify::mostrarMensajes();?>

                
                 <!-- wysihtml5 --> 
        <script src="<?php echo BASE_URL;?>public/js/bootstrap.min.js"></script>        

        
        <script type="text/javascript">
            less = {
              env: "development", // or "production"
              async: false,       // load imports async
              fileAsync: false,   // load imports async when in a page under
              // a file protocol
              poll: 1000,         // when in watch mode, time in ms between polls
              functions: {},      // user functions, keyed by name
              dumpLineNumbers: "comments", // or "mediaQuery" or "all"
              relativeUrls: false,// whether to adjust url's to be relative
              // if false, url's are already relative to the
              // entry less file
              rootpath: ":/cmsum.com/back/noticias"// a path to add on to the start of every url
              //resource
            };
        </script>
        <script src="<?php echo BASE_URL;?>public/js/less.min.js"></script>                
	</body>
</html>