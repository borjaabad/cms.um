<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Lauoutit CMS.UM</title>
        <meta name="description" content="CMS.UM">
        <meta name="author" content="Borja Abad">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <script type="text/javascript" src="http://cms.um/back/public/js/alertify.min.js"></script>
        <script type="text/javascript" src="http://cms.um/back/components/paginas/public/js/jquery.min.js"></script>
        <script type="text/javascript" src="http://cms.um/back/components/paginas/public/js/jquery.ui.touch-punch.min.js"></script>
        <script type="text/javascript" src="http://cms.um/back/components/paginas/public/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="http://cms.um/back/components/paginas/public/js/scripts.min.js"></script>
        <script type="text/javascript" src="http://cms.um/back/components/paginas/public/js/jquery.htmlClean.js"></script>
        <link rel="StyleSheet" href="http://cms.um/back/public/css/alertify.default.css" id="toggleCSS" type="text/css">
        <link rel="StyleSheet" href="http://cms.um/back/components/paginas/public/css/bootstrap.min.css" type="text/css">
        <link rel="StyleSheet" href="http://cms.um/back/components/paginas/public/css/layoutit.css" type="text/css">
        <link rel="StyleSheet" href="http://cms.um/back/public/css/alertify.core.css" type="text/css">
        <link rel="StyleSheet" href="http://cms.um/back/public/css/alertify.default.css" id="toggleCSS" type="text/css">
        
        
    </head>
    
    
    <body class="edit">
        <div class="navbar navbar-inverse navbar-fixed-top navbar-layoutit">
            <div class="navbar-header">
                <button data-target="navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="glyphicon-bar"></span>
                    <span class="glyphicon-bar"></span>
                    <span class="glyphicon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                
                <ul class="nav pull-right">
                    <li>
                        
                        
                    </li>
                </ul>
                <ul class="nav" id="menu-layoutit">
                    <li>
                        <div class="btn-group">
                            <button type="button" id="fullscreen"     class="btn btn-xs btn-primary">Fullscreen</button>
                        </div>
                        <div class="btn-group" data-toggle="buttons-radio" style="padding-left:1em">
                            <button type="button" id="edit"           class="active btn btn-xs btn-primary">Editar</button>
                            <button type="button" id="devpreview"     class="btn btn-xs btn-primary" >Desarrollo</button>
                            <button type="button" id="sourcepreview"  class="btn btn-xs btn-primary" >Prevista</button>
                        </div>
                        
                        <div class="btn-group" style="padding-left:1em">							
                            <button class="btn btn-xs btn-primary" href="#clear" id="clear" >Vaciar página</button>
                        </div>
                        
                        <div class="btn-group" style="padding-left:1em">							
                            <button type="button" class="btn btn-xs btn-primary" id="button-download-modal" data-target="#downloadModal" href="/build_v3/downloadAjax" role="button" data-toggle="modal">Guardar página</button>
                        </div>
                    </li>
                </ul>
            </div><!--/.navbar-collapse -->
        </div><!--/.navbar-fixed-top -->
        
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="sidebar-nav">
                        
                        <ul class="nav nav-list accordion-group">
                            <li class="nav-header">
                                Maquetación
                            </li>
                            <li class="rows" id="estRows">
                                <div class="lyrow">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label " ><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <div class="preview"><input type="text" value="12" class="form-control"></div>
                                    <div class="view">
                                        <div class="row clearfix">
                                            <div class="col-md-12 column"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="lyrow">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <div class="preview"><input  type="text" value="6 6" class="form-control"></div>
                                    <div class="view">
                                        <div class="row clearfix">
                                            <div class="col-md-6 column"></div>
                                            <div class="col-md-6 column"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="lyrow">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <div class="preview"><input type="text" value="8 4" class="form-control"></div>
                                    <div class="view">
                                        <div class="row clearfix">
                                            <div class="col-md-8 column"></div>
                                            <div class="col-md-4 column"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="lyrow">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <div class="preview"><input type="text" value="4 4 4" class="form-control"></div>
                                    <div class="view">
                                        <div class="row clearfix">
                                            <div class="col-md-4 column"></div>
                                            <div class="col-md-4 column"></div>
                                            <div class="col-md-4 column"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="lyrow">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <div class="preview"><input type="text" value="2 6 4" class="form-control"></div>
                                    <div class="view">
                                        <div class="row clearfix">
                                            <div class="col-md-2 column"></div>
                                            <div class="col-md-6 column"></div>
                                            <div class="col-md-4 column"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </li>
                        </ul>
                        
                        
                        <ul class="nav nav-list accordion-group">
                            <li class="nav-header">
                                Estáticos
                            </li>
                            <li class="boxes" id="elmBase">
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <span class="configuration">
                                        <span class="btn-group btn-group-xs">
                                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">Align <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li class="active" ><a href="#" rel="">Default</a></li>
                                                <li class="" ><a href="#" rel="text-left">Left</a></li>
                                                <li class="" ><a href="#" rel="text-center">Center</a></li>
                                                <li class="" ><a href="#" rel="text-right">Right</a></li>
                                            </ul>
                                        </span>
                                        <span class="btn-group btn-group-xs">
                                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">Emphasis <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li class="active" ><a href="#" rel="">Default</a></li>
                                                <li class="" ><a href="#" rel="text-muted">Muted</a></li>
                                                <li class="" ><a href="#" rel="text-primary">Primary</a></li>
                                                <li class="" ><a href="#" rel="text-success">Success</a></li>
                                                <li class="" ><a href="#" rel="text-info">Info</a></li>
                                                <li class="" ><a href="#" rel="text-warning">Warning</a></li>
                                                <li class="" ><a href="#" rel="text-danger">Danger</a></li>
                                            </ul>
                                        </span>
                                    </span>
                                    <div class="preview">Título</div>
                                    <div class="view">
                                        <h3 contenteditable="true">h3. Lorem ipsum dolor sit amet.</h3>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    
                                    <div class="preview">Párrafo</div>
                                    <div class="view">
                                        <p contenteditable="true">Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. <em>Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.</em> Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. <small>Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu. </small></p>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <div class="preview">Dirección</div>
                                    <div class="view">
                                        <address contenteditable="true">
                                            <strong>Twitter, Inc.</strong><br>
                                            795 Folsom Ave, Suite 600<br>
                                            San Francisco, CA 94107<br>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <span class="configuration">		  
                                        <a class="btn btn-xs btn-default" href="#" rel="pull-right">Pull right</a>
                                    </span>
                                    <div class="preview">Cita</div>
                                    <div class="view clearfix">
                                        <blockquote contenteditable="true">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                            <small>Someone famous <cite title="Source Title">Source Title</cite></small>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <span class="configuration">		  
                                        <a class="btn btn-xs btn-default" href="#" rel="list-unstyled">Unstyled</a>
                                        <a class="btn btn-xs btn-default" href="#" rel="list-inline">Inline</a>
                                    </span>
                                    <div class="preview">Lista desord.</div>
                                    <div class="view">
                                        <ul contenteditable="true">
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Consectetur adipiscing elit</li>
                                            <li>Integer molestie lorem at massa</li>
                                            <li>Facilisis in pretium nisl aliquet</li>
                                            <li>Nulla volutpat aliquam velit</li>
                                            <li>Faucibus porta lacus fringilla vel</li>
                                            <li>Aenean sit amet erat nunc</li>
                                            <li>Eget porttitor lorem</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <span class="configuration">		  
                                        <a class="btn btn-xs btn-default" href="#" rel="list-unstyled">Unstyled</a>
                                        <a class="btn btn-xs btn-default" href="#" rel="list-inline">Inline</a>
                                    </span>
                                    <div class="preview">Lista ordenada</div>
                                    <div class="view">
                                        <ol contenteditable="true">
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Consectetur adipiscing elit</li>
                                            <li>Integer molestie lorem at massa</li>
                                            <li>Facilisis in pretium nisl aliquet</li>
                                            <li>Nulla volutpat aliquam velit</li>
                                            <li>Faucibus porta lacus fringilla vel</li>
                                            <li>Aenean sit amet erat nunc</li>
                                            <li>Eget porttitor lorem</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <span class="configuration">		  
                                        <a class="btn btn-xs btn-default" href="#" rel="dl-horizontal">Horizontal</a>
                                    </span>
                                    <div class="preview">Descripción</div>
                                    <div class="view">
                                        <dl contenteditable="true">
                                            <dt>Description lists</dt>
                                            <dd>A description list is perfect for defining terms.</dd>
                                            <dt>Euismod</dt>
                                            <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                                            <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                            <dt>Malesuada porta</dt>
                                            <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                            <dt>Felis euismod semper eget lacinia</dt>
                                            <dd>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <span class="configuration">
                                        <span class="btn-group btn-group-xs">
                                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">Style <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li class="active" ><a href="#" rel="">Default</a></li>
                                                <li class="" ><a href="#" rel="table-striped">Striped</a></li>
                                                <li class="" ><a href="#" rel="table-bordered">Bordered</a></li>
                                            </ul>
                                        </span>
                                        <a class="btn btn-xs btn-default" href="#" rel="table-hover">Hover</a>
                                        <a class="btn btn-xs btn-default" href="#" rel="table-condensed">Condensed</a>
                                    </span>
                                    <div class="preview">Tabla</div>
                                    <div class="view">
                                        <table class="table" contenteditable="true">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product</th>
                                                    <th>Payment Taken</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>TB - Monthly</td>
                                                    <td>01/04/2012</td>
                                                    <td>Default</td>
                                                </tr>
                                                <tr class="active">
                                                    <td>1</td>
                                                    <td>TB - Monthly</td>
                                                    <td>01/04/2012</td>
                                                    <td>Approved</td>
                                                </tr>
                                                <tr class="success">
                                                    <td>2</td>
                                                    <td>TB - Monthly</td>
                                                    <td>02/04/2012</td>
                                                    <td>Declined</td>
                                                </tr>
                                                <tr class="warning">
                                                    <td>3</td>
                                                    <td>TB - Monthly</td>
                                                    <td>03/04/2012</td>
                                                    <td>Pending</td>
                                                </tr>
                                                <tr class="danger">
                                                    <td>4</td>
                                                    <td>TB - Monthly</td>
                                                    <td>04/04/2012</td>
                                                    <td>Call in to confirm</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <span class="configuration">
                                        <a class="btn btn-xs btn-default" href="#" rel="form-inline">Inline</a>
                                    </span>
                                    <div class="preview">Formulario</div>
                                    <div class="view">
                                        <form role="form">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">File input</label>
                                                <input type="file" id="exampleInputFile">
                                                <p class="help-block">Example block-level help text here.</p>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Check me out
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <span class="configuration">
                                    </span>
                                    <div class="preview">Form horiz.</div>
                                    <div class="view">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> Remember me
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-default">Sign in</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <span class="configuration">
                                        <span class="btn-group btn-group-xs">
                                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">Styles <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li class="" ><a href="#" rel="btn-default">Default</a></li>
                                                <li class="" ><a href="#" rel="btn-primary">Primary</a></li>
                                                <li class="" ><a href="#" rel="btn-success">Success</a></li>
                                                <li class="" ><a href="#" rel="btn-info">Info</a></li>
                                                <li class="" ><a href="#" rel="btn-warning">Warning</a></li>
                                                <li class="" ><a href="#" rel="btn-danger">Danger</a></li>
                                                <li class="" ><a href="#" rel="btn-link">Link</a></li>
                                            </ul>
                                        </span>
                                        <span class="btn-group btn-group-xs">
                                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">Size <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li class="" ><a href="#" rel="btn-lg">Large</a></li>
                                                <li class="" ><a href="#" rel="btn-default">Default</a></li>
                                                <li class="" ><a href="#" rel="btn-sm">Small</a></li>
                                                <li class="" ><a href="#" rel="btn-xs">Mini</a></li>
                                            </ul>
                                        </span>
                                        
                                        <a class="btn btn-xs btn-default" href="#" rel="btn-block">Block</a>
                                        <a class="btn btn-xs btn-default" href="#" rel="active">Active</a>
                                        <a class="btn btn-xs btn-default" href="#" rel="disabled">Disabled</a>
                                    </span>
                                    <div class="preview">Botón</div>
                                    <div class="view">
                                        <button type="button" class="btn btn-default" contenteditable="true">Default</button>		
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <span class="configuration">
                                        <a class="btn btn-xs btn-default" href="#" rel="well">Well</a>
                                    </span>
                                    <div class="preview">Destacado</div>
                                    <div class="view">
                                        <div class="jumbotron" contenteditable="true">
                                            <h1>Destaca</h1>
                                            <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                                            <p><a class="btn btn-primary btn-large" href="#">Learn more</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <div class="preview">Cabecera</div>
                                    <div class="view">
                                        <div class="page-header">
                                            <h1 contenteditable="true">Example page header <small>Subtext for header</small></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <div class="preview">Texto</div>
                                    <div class="view">
                                        <h2 contenteditable="true">Heading</h2>
                                        <p contenteditable="true">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
                                        <p><a class="btn" href="#" contenteditable="true">View details &raquo;</a></p>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <span class="configuration">
                                    </span>
                                    <div class="preview">Lista diseño</div>
                                    <div class="view">
                                        <div class="list-group" contenteditable="true">
                                            <a href="#" class="list-group-item active">Home</a>
                                            <div class="list-group-item">List header</div>
                                            <div class="list-group-item">
                                                <h4 class="list-group-item-heading">List group item heading</h4>
                                                <p class="list-group-item-text">...</p>
                                            </div>
                                            <div class="list-group-item"><span class="badge">14</span>Help</div>
                                            <a class="list-group-item active"><span class="badge">14</span>Help</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <span class="configuration">
                                        <span class="btn-group btn-group-xs">
                                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">Styles <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li class="" ><a href="#" rel="panel-default">Default</a></li>
                                                <li class="" ><a href="#" rel="panel-primary">Primary</a></li>
                                                <li class="" ><a href="#" rel="panel-success">Success</a></li>
                                                <li class="" ><a href="#" rel="panel-info">Info</a></li>
                                                <li class="" ><a href="#" rel="panel-warning">Warning</a></li>
                                                <li class="" ><a href="#" rel="panel-danger">Danger</a></li>
                                            </ul>
                                        </span>
                                        
                                    </span>
                                    <div class="preview">Lista</div>
                                    <div class="view">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title" contenteditable="true">Panel title</h3>
                                            </div>
                                            <div class="panel-body" contenteditable="true">
                                                Panel content
                                            </div>
                                            <div class="panel-footer" contenteditable="true">
                                                Panel footer
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <span class="configuration">
                                        <span class="btn-group btn-group-xs">
                                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">Styles <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li class="" ><a href="#" rel="alert-success">Success</a></li>
                                                <li class="" ><a href="#" rel="alert-info">Info</a></li>
                                                <li class="" ><a href="#" rel="alert-warning">Warning</a></li>
                                                <li class="" ><a href="#" rel="alert-danger">Danger</a></li>
                                            </ul>
                                        </span>
                                        
                                    </span>
                                    <div class="preview">Alertas</div>
                                    <div class="view">
                                        <div class="alert alert-success alert-dismissable" contenteditable="true">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h4>Alert!</h4>
                                            <strong>Warning!</strong> Best check yo self, you're not looking too good. <a href="#" class="alert-link">alert link</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
                <!--/span-->
                <div class="demo">
                    
                </div>
                <!--/span-->
                <div id="download-layout"><div class="container"></div></div>
            </div>
            <!--/row-->
            
            <script type="text/javascript">
                $(document).ready(function() {

                });
            </script>
        </div><!--/.fluid-container-->
        
        <script type="text/javascript">
            function saveLayout() {
                //	$.ajax({  
                //		type: "POST",  
                //		url: "/build_v3/saveLayout",  
                //		data: { 'layout-v3': $('.demo').html() },  
                //		success: function(data) {
                //			//updateButtonsVisibility();
                //		}
                //	});
            }

            function downloadLayout() {
                $.ajax({
                    type: "POST",
                    url: "/build_v3/downloadLayout",
                    data: {'layout-v3': $('#download-layout').html()},
                    success: function(data) {
                        window.location.href = '/build_v3/download';
                    }
                });
            }

            function downloadHtmlLayout() {
                $.ajax({
                    type: "POST",
                    url: "/build_v3/downloadLayout",
                    data: {'layout-v3': $('#download-layout').html()},
                    success: function(data) {
                        window.location.href = '/build_v3/downloadHtml';
                    }
                });
            }

            function undoLayout() {

                $.ajax({
                    type: "POST",
                    url: "/build_v3/getPreviousLayout",
                    data: {},
                    success: function(data) {
                        undoOperation(data);
                    }
                });
            }

            function redoLayout() {

                $.ajax({
                    type: "POST",
                    url: "/build_v3/getPreviousLayout",
                    data: {},
                    success: function(data) {
                        redoOperation(data);
                    }
                });
            }

            $(document).on('hidden.bs.modal', function(e) {
                $(e.target).removeData('bs.modal');
            });

            $('body').on('click', '#continue-share-non-logged', function() {
                $('#share-not-logged').hide();
                $('#share-logged').removeClass('hide');
                $('#share-logged').show();
            });

            $('body').on('click', '#continue-download-non-logged', function() {
                $('#download-not-logged').hide();
                $('#download').removeClass('hide');
                $('#download').show();
                $('#downloadhtml').removeClass('hide');
                $('#downloadhtml').show();
                $('#download-logged').removeClass('hide');
                $('#download-logged').show();
            });


        </script>
        
        <div class="modal fade" id="downloadModal" tabindex="-1" role="dialog" aria-labelledby="downloadModalLabel" aria-hidden="true"></div>
        <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true"></div>
        <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true"></div>
        
    </body>
</html>


