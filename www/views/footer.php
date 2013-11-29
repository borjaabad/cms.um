
      <footer>
        <div class="row">
          <div class="col-lg-12">
            
            <ul class="list-unstyled">
              <li class="pull-right"><a href="#top">Back to top</a></li>
              <li><a href="https://github.com/borjaabad/cms.um" target="_blank">GitHub</a></li>
              <li><a href="">API</a></li>
            </ul>
              <p><a href="http://www.um.edu.ar/">Universidad de Mendoza</a></p> 
            <p>Facultad de ingeniería</p>
            <p>Trabajo final, Borja Abad</p>
          </div>
        </div>
      </footer>
    </div>
    <script src="<?php echo BASE_URL; ?>public/js/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/bootswatch.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/base.js"></script>
    <script>
        $(document).ready(function(){
        var b = parent.location.pathname.split("/");
        for(var i=0;i<b.length;i++){
          if(b[i]=="success"){
            alert("Operación exitosa");
          }
          if(b[i]=="error"){
            alert("Hubo un error");
          }
        }
        });
    </script>
  </body>
</html>