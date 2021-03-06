<?php
session_start();
if (!isset($_SESSION['autenticado'])) {
    session_destroy();
    header('Location: /back');
}

error_reporting(E_ALL);
ini_set('display_errors', '1');

$modulosDinamicosHTML = '';
$XML = simplexml_load_file('http://cmsum.com/modules/modules.xml');
$XML = $XML->modules;
foreach ($XML->module as $modulo) {
    $modulosDinamicosHTML .= '
                    <div class="box box-element">
                        <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                        <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                        <div class="preview">' . $modulo->displayname . '</div>
                        <div class="view editable">
                            [[' . $modulo->parent . '::' . $modulo->controller . '::' . $modulo->method . ']]
                        </div>
                    </div>';
}

    $conexion = mysql_connect("localhost", "root","contra");  mysql_select_db("cms_um",$conexion);
    $query = mysql_query("select * from modulos",$conexion) or die(mysql_error());
    $tot = mysql_num_rows($query);
    $modulosPropiosHTML = '';
    if ($tot> 0) {
        while ($row = mysql_fetch_assoc($query)){
            $modulosPropiosHTML .= '
                    <div class="box box-element">
                        <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                        <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                        <div class="preview">' . $row['nombre'] . '</div>
                        <div class="view editable">
                           '. $row['content'] .'
                        </div>
            </div>';
        }
 }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Lauoutit CMS.UM</title>
        <meta name="description" content="CMS.UM">
        <meta name="author" content="Borja Abad">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <script type="text/javascript" src="http://cmsum.com/back/public/js/alertify.min.js"></script>
        <script type="text/javascript" src="http://cmsum.com/back/components/paginas/public/js/jquery.min.js"></script>
        <script type="text/javascript" src="http://cmsum.com/back/components/paginas/public/js/jquery.ui.touch-punch.min.js"></script>
        <script type="text/javascript" src="http://cmsum.com/back/components/paginas/public/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="http://cmsum.com/back/components/paginas/public/js/scripts.min.js"></script>
        <script type="text/javascript" src="http://cmsum.com/back/components/paginas/public/js/jquery.htmlClean.js"></script>
        <link rel="StyleSheet" href="http://cmsum.com/back/public/css/alertify.default.css" id="toggleCSS" type="text/css">
        <link rel="StyleSheet" href="http://cmsum.com/back/components/paginas/public/css/bootstrap.min.css" type="text/css">
        <link rel="StyleSheet" href="http://cmsum.com/back/components/paginas/public/css/layoutit.css" type="text/css">
        <link rel="StyleSheet" href="http://cmsum.com/back/public/css/alertify.core.css" type="text/css">
        <link rel="StyleSheet" href="http://cmsum.com/back/public/css/alertify.default.css" id="toggleCSS" type="text/css">
        <link rel="StyleSheet" href="http://cmsum.com/back/public/js/aloha/css/aloha.css" type="text/css">
        <link rel="StyleSheet" href="http://cmsum.com/back/public/css/jquery.ui.dialog.css" type="text/css">
        
        
        <script type="text/javascript" src="http://cmsum.com/back/public/js/aloha/lib/require.js"></script>
        
        <script>
            var Aloha = {
                settings: {
                    toolbar: {
                        tabs: [
                            {
                                label: 'tab.format.label'
                            },
                            {
                                label: 'tab.insert.label'
                            },
                            {
                                label: 'Actions',
                                showOn: {
                                    scope: 'Aloha.continuoustext'
                                },
                                components: [['htmlsource']]
                            }
                        ]
                    }
                },
                plugins: {
                    format: {
                        config: ['b', 'i', 'p', 'sub', 'sup', 'del', 'title', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'pre', 'removeFormat'],
                        editables: {
                            // no formatting allowed for title
                            '#title': []
                        }
                    },
                    link: {
                        editables: {
                            // No links in the title.
                            '#title': []
                        }
                    },
                    list: {
                        editables: {
                            // No lists in the title.
                            '#title': []
                        }
                    },
                    abbr: {
                        editables: {
                            // No abbr in the title.
                            '#title': []
                        }
                    },
                    image: {
                        'fixedAspectRatio': true,
                        'maxWidth': 1024,
                        'minWidth': 10,
                        'maxHeight': 786,
                        'minHeight': 10,
                        'globalselector': '.global',
                        'ui': {
                            'oneTab': false
                        },
                        editables: {
                            // No images in the title.
                            '#title': []
                        }
                    }
                },
                sidebar: {
                    disabled: false
                },
                contentHandler: {
                    allows: {
                        elements: [
                            'a', 'abbr', 'b', 'blockquote', 'br', 'caption', 'cite', 'code', 'col',
                            'colgroup', 'dd', 'del', 'dl', 'dt', 'em', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
                            'i', 'img', 'li', 'ol', 'p', 'pre', 'q', 'small', 'strike', 'strong',
                            'sub', 'sup', 'table', 'tbody', 'td', 'tfoot', 'th', 'thead', 'tr', 'u',
                            'ul', 'span', 'hr', 'object', 'div'
                        ],
                        attributes: {
                            'a': ['href', 'title', 'id', 'class', 'target', 'data-gentics-aloha-repository', 'data-gentics-aloha-object-id'],
                            'div': ['id', 'class'],
                            'abbr': ['title'],
                            'blockquote': ['cite'],
                            'br': ['class'],
                            'col': ['span', 'width'],
                            'colgroup': ['span', 'width'],
                            'img': ['align', 'alt', 'height', 'src', 'title', 'width', 'class'],
                            'ol': ['start', 'type'],
                            'q': ['cite'],
                            'p': ['class'],
                            'table': ['summary', 'width'],
                            'td': ['abbr', 'axis', 'colspan', 'rowspan', 'width'],
                            'th': ['abbr', 'axis', 'colspan', 'rowspan', 'scope', 'width'],
                            'ul': ['type'],
                            'span': ['class', 'style', 'lang', 'xml:lang']
                        },
                        protocols: {
                            'a': {'href': ['ftp', 'http', 'https', 'mailto', '__relative__']},
                            'blockquote': {'cite': ['http', 'https', '__relative__']},
                            'img': {'src': ['http', 'https', '__relative__']},
                            'q': {'cite': ['http', 'https', '__relative__']}
                        }
                    }
                }
            };

        </script>
        
        <script type="text/javascript" src="http://cmsum.com/back/public/js/aloha/lib/aloha.js"
                data-aloha-plugins="common/ui,
                common/format,
                common/table,
                common/list,
                common/link,
                common/highlighteditables,
                common/undo,
                common/contenthandler,
                common/paste,
                common/characterpicker,
                common/commands,
                common/block,
                common/image,
                common/abbr,
                common/horizontalruler,
                common/align,
                common/dom-to-xhtml,
                extra/textcolor,
                extra/formatlesspaste,

        extra/htmlsource"></script>
        
        
        
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
                            <button class="btn btn-xs btn-primary" href="#abrir" id="abrir" >Abrir página</button>
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
                            <li class="boxes" id="elmEstaticos">
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <div class="preview">Separador vertical</div>
                                    <div class="view editable">
                                        <br /><br />
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <div class="preview">Separador horizontal</div>
                                    <div class="view editable">
                                        <hr />
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <div class="preview">Volver atrás</div>
                                    <div class="view editable">
                                        <a href="javascript:history.back(1)">Volver Atrás</a>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <span class="configuration">
                                        
                                    </span>
                                    <div class="preview">Título</div>
                                    <div class="view editable">
                                        <h3 contenteditable="true">h3. Lorem ipsum dolor sit amet.</h3>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    
                                    <div class="preview">Párrafo</div>
                                    <div class="view editable">
                                        <p contenteditable="true">Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. <em>Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.</em> Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. <small>Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu. </small></p>
                                    </div>
                                </div>
                                
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <div class="preview">Dirección</div>
                                    <div class="view editable">
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
                                    <div class="view editable">
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
                                    <div class="view editable">
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
                                    <div class="view editable">
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
                                    <div class="view editable">
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
                                    <div class="view editable">
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
                                    <div class="view editable">
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
                                    <div class="view editable">
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
                                    <div class="view editable">
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
                                    <div class="view editable">
                                        <div class="page-header">
                                            <h1 contenteditable="true">Example page header <small>Subtext for header</small></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-element">
                                    <a href="#close" class="remove label label-danger"><img class="dragimga" src="../../public/img/papelera.png" />eliminar</a>
                                    <span class="drag label label-default"><img class="dragimga" src="../../public/img/drag.png" /></span>
                                    <div class="preview">Texto</div>
                                    <div class="view editable">
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
                                    <div class="view editable">
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
                                    <div class="view editable">
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
                                    <div class="view editable">
                                        <div class="alert alert-success alert-dismissable" contenteditable="true">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h4>Alert!</h4>
                                            <strong>Warning!</strong> Best check yo self, you're not looking too good. <a href="#" class="alert-link">alert link</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="nav nav-list accordion-group">
                            <li class="nav-header">
                                Dinámicos
                            </li>
                            <li class="boxes" id="elmDinamicos">
                                
                                <?php
                                echo $modulosDinamicosHTML;
                                ?>
                            </li>
                        </ul>
                        <ul class="nav nav-list accordion-group">
                            <li class="nav-header">
                                Propios
                            </li>
                            <li class="boxes" id="elmDinamicos">
                                <?php
                                echo $modulosPropiosHTML;
                                ?>
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
                j.ajax({
                    type: "POST",
                    url: "/build_v3/downloadLayout",
                    data: {'layout-v3': $('#download-layout').html()},
                    success: function(data) {
                        window.location.href = '/build_v3/download';
                    }
                });
            }

            function downloadHtmlLayout() {
                j.ajax({
                    type: "POST",
                    url: "/build_v3/downloadLayout",
                    data: {'layout-v3': $('#download-layout').html()},
                    success: function(data) {
                        window.location.href = '/build_v3/downloadHtml';
                    }
                });
            }

            function undoLayout() {

                j.ajax({
                    type: "POST",
                    url: "/build_v3/getPreviousLayout",
                    data: {},
                    success: function(data) {
                        undoOperation(data);
                    }
                });
            }

            function redoLayout() {

                j.ajax({
                    type: "POST",
                    url: "/build_v3/getPreviousLayout",
                    data: {},
                    success: function(data) {
                        redoOperation(data);
                    }
                });
            }


            j(document).on('hidden.bs.modal', function(e) {
                j(e.target).removeData('bs.modal');
            });

            j('body').on('click', '#continue-share-non-logged', function() {
                j('#share-not-logged').hide();
                j('#share-logged').removeClass('hide');
                j('#share-logged').show();
            });

            j('body').on('click', '#continue-download-non-logged', function() {
                j('#download-not-logged').hide();
                j('#download').removeClass('hide');
                j('#download').show();
                j('#downloadhtml').removeClass('hide');
                j('#downloadhtml').show();
                j('#download-logged').removeClass('hide');
                j('#download-logged').show();
            });


        </script>
        
        <div class="modal fade" id="downloadModal" tabindex="-1" role="dialog" aria-labelledby="downloadModalLabel" aria-hidden="true"></div>
        <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true"></div>
        <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true"></div>
    </body>
</html>


