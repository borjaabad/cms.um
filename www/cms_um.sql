/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : cms_um

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2013-11-13 18:18:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `config`
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `clave` varchar(255) NOT NULL,
  `valor` text,
  PRIMARY KEY (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES ('cabecera', 'http://cms.um/public/img/cabecera.png');
INSERT INTO `config` VALUES ('descripcion', 'CMS (content managment system) con cachÃ© bajo demanda en php5 bajo MVC orientado a componentes\r\n\r\nSe trata de desarrollar un CMS tradicional, con su back para administrar el front. TratarÃ¡ de ser muy liviano para el servidor ya que la mayorÃ­a de solicitudes son atendidas por cachÃ© estÃ¡tica. La estructura del CMS permitirÃ¡ el desarrollo en equipos por ser orientado a componentes.\r\n\r\nDemostrar que los sitios webs apenas cambian su contenido en proporciÃ³n al nÃºmero de veces que son visitados, reforzando asÃ­ la tendencia a usar sistemas inteligentes de cachÃ©.\r\n\r\nPor un lado, el back, ha de ser robusto y no importa si pesado, confiable, escalable, etc. Por ello se usarÃ¡ php5 + mysql. El tema de orientarlo a componentes, significa que una vez esta');
INSERT INTO `config` VALUES ('keywords', 'cms, um, cms.um, Gestor, contenidos, universidad, mendoza, argentina');
INSERT INTO `config` VALUES ('pie', 'Borja Abad :: 5544     CMS UM @ 2013');
INSERT INTO `config` VALUES ('titulo', 'CMS UM');
INSERT INTO `config` VALUES ('url', 'http://cms.um');

-- ----------------------------
-- Table structure for `firmantes`
-- ----------------------------
DROP TABLE IF EXISTS `firmantes`;
CREATE TABLE `firmantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of firmantes
-- ----------------------------
INSERT INTO `firmantes` VALUES ('1', 'Santiago Serna', 'sernas@hotmail.com');
INSERT INTO `firmantes` VALUES ('3', 'Borja Abad', 'borja@cibeles.net');
INSERT INTO `firmantes` VALUES ('8', 'Juan Bravo', '');
INSERT INTO `firmantes` VALUES ('10', 'Flor OcaÃ±a', '');
INSERT INTO `firmantes` VALUES ('25', 'Laura IbÃ¡Ã±ez', 'libaz@gmail.com');
INSERT INTO `firmantes` VALUES ('26', 'Hernesto Caballero', 'hercab@gmail.com');
INSERT INTO `firmantes` VALUES ('27', 'Jose Enrique', '');

-- ----------------------------
-- Table structure for `noticias`
-- ----------------------------
DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `entradilla` varchar(255) DEFAULT NULL,
  `texto` varchar(255) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `id_seccion` int(11) DEFAULT NULL,
  `id_firmante` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of noticias
-- ----------------------------
INSERT INTO `noticias` VALUES ('4', 'Venezuela encabezÃ³ la lista de objetivos de espionaje de la NSA', 'EEUU Integraba en 2007 una lista de seis objetivos prioritarios', 'La agencia estaba preocupada por la amenaza de la posible influencia de Hugo ChÃ¡vez contra los intereses de EEUU en LatinoamÃ©rica.\r\n', 'Venezuela integraba en 2007 una lista de seis objetivos prioritarios para el espionaje de la Agencia Nacional de Seguridad (NSA) estadounidense, preocupada por la amenaza que la influencia del Gobierno de Hugo ChÃ¡vez podÃ­a suponer para los intereses de ', '1', '2', '1');
INSERT INTO `noticias` VALUES ('6', 'BMW introduce los primeros faros lÃ¡ser para el automÃ³vil', '', 'Los estilizados faros que parecen observarnos en esta foto son los ojos del BMW i8, el nuevo deportivo hÃ­brido que el fabricante alemÃ¡n va a comercializar en 2014. Los faros son, ademÃ¡s, los primeros en utilizar haces lÃ¡ser como sistema de alumbrado.\r', 'Antes de que pensemos en conductores gritando y quedÃ¡ndose ciegos al cruzarse con este bÃ³lido hay que aclarar que el sistema es completamente seguro. El haz lÃ¡ser, de color azul, no estÃ¡ enfocado, sino que varias lentes lo abren para generar un haz de', '1', '18', '1');
INSERT INTO `noticias` VALUES ('7', 'Una gran supernova se verÃ¡ desde la Tierra en los prÃ³ximos 50 aÃ±os', '', 'De vez en cuando, una estrella se colapsa y explota en un brillante fenÃ³meno conocido como supernova. AstrÃ³nomos de la Universidad Ohio State han hecho sus cÃ¡lculos, y estÃ¡n seguros casi al 100% de que podremos contemplar una nueva supernova en la VÃ­', 'El estudio se ha realizado analizando la frecuencia con la que han tenido lugar estos fenÃ³menos anteriormente (uno de los mÃ¡s recientes data de 1975), y la evoluciÃ³n de la masa de las estrellas en nuestra galaxia.\r\n\r\nLejos de ser un evento que comporte', '4', '18', '3');
INSERT INTO `noticias` VALUES ('8', 'Una cÃ¡mara lee tu mente y convierte lo que te gusta en un GIF', '', 'Â¿Alguna vez has soÃ±ado con poder sacar una foto a algo que estÃ¡s viendo simplemente pensando en que quieres fotografiarlo? Entonces bienvenido a tu sueÃ±o. La compaÃ±Ã­a japonesa Neurowear trabaja en una cÃ¡mara que hace precisamente eso, sacar una fot', '\r\nRELACIONADO\r\n\r\nKevin Warwick: &quot;Pronto controlaremos la tecnologÃ­a con el pensamiento&quot;\r\nKevin Warwick (Coventry, Reino Unido) lo reconoce orgulloso y con una sonrisa: &quot;he sido cyborg&quot;. Este ingeniero de 59 aÃ±os, profesor deâ€¦ Leer ', '1', '18', '1');
INSERT INTO `noticias` VALUES ('9', 'Elisa CarriÃ³: &quot;Lorenzetti reconociÃ³ que cometiÃ³ el delito republicano mÃ¡s grave&quot;', 'La diputada nacional dijo que el presidente de la Corte, que admitiÃ³ que dialogÃ³ con Carlos Zannini por la ley de medios, &quot;violÃ³ la divisiÃ³n de poderes&quot;; ratificÃ³ que pedirÃ¡ juicio polÃ­tico', 'Luego de que el presidente de la Corte Suprema, Ricardo Lorenzetti, admitiera que dialogÃ³ con el secretario de Legal y TÃ©cnica, Carlos Zannini, sobre la ley de medios, antes de que el mÃ¡ximo tribunal declarara la constitucionalidad de la normativa, la ', '&quot;El Presidente de la Corte ha reconocido el mÃ¡s grave delito republicano que es la violaciÃ³n a la divisiÃ³n de poderes. Esto es causal de Juicio PolÃ­tico&quot;, dijo CarriÃ³, sobre las declaraciones de Lorenzetti.\r\n\r\n&quot;El seÃ±or Lorenzetti ha ', '12', '16', '1');
INSERT INTO `noticias` VALUES ('10', 'Carlos Kunkel admitiÃ³ que al Gobierno &quot;se le fueron votos&quot;', 'Kunkel dijo que confÃ­an en Scioli: &quot;No serÃ¡ desleal&quot;', '&quot;Se fueron votos&quot;. El diputado nacional por el Frente para la Victoria, Carlos Kunkel, reconociÃ³ hoy la derrota electoral que sufriÃ³ el kirchnerismo el domingo pasado. SegÃºn el legislador, &quot;el principal error fue no renovar las autoridad', '\r\nAntes de las elecciones internas del justicialismo, que se realizarÃ¡n el 15 de diciembre prÃ³ximo, Kunkel dejÃ³ algunas definiciones: advirtiÃ³ que estÃ¡ &quot;seguro de que [Daniel, gobernador bonaerense y presidente del Consejo Nacional del PJ] Sciol', '2', '16', '3');
INSERT INTO `noticias` VALUES ('15', 'asd', '', '', '', '0', '2', '4');
INSERT INTO `noticias` VALUES ('16', '', '', '', '', '0', '0', '0');
INSERT INTO `noticias` VALUES ('17', '', '', '', '', '0', '0', '0');
INSERT INTO `noticias` VALUES ('18', 'Inspectores de la AFIP visitaron a Magdalena Ruiz GuiÃ±azÃº', 'La periodista regresÃ³ el lunes de Washington, donde denunciÃ³ intimidaciones y amenazas a periodistas por parte del Gobierno\r\n', '', '\r\nLa periodista relatÃ³ ante la ComisiÃ³n Interamericana de Derechos Humanos, que depende de la OEA, que fue victima de un juicio pÃºblico en la Plaza de Mayo, con el testimonio de un funcionario oficial, por supuestas vinculaciones con la dictadura milit', '16', '16', '10');
INSERT INTO `noticias` VALUES ('19', '', '', '', '', '0', '0', '0');
INSERT INTO `noticias` VALUES ('20', '', '', '', '', '0', '0', '0');
INSERT INTO `noticias` VALUES ('21', '', '', '', '', '0', '0', '0');
INSERT INTO `noticias` VALUES ('22', '1', '', '', '', '0', '0', '0');

-- ----------------------------
-- Table structure for `paginas`
-- ----------------------------
DROP TABLE IF EXISTS `paginas`;
CREATE TABLE `paginas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of paginas
-- ----------------------------
INSERT INTO `paginas` VALUES ('11', 'Portada', 'Index del sitio');
INSERT INTO `paginas` VALUES ('15', 'QuiÃ©nes somos', 'CMS UM es el trabajo final de Borja Abad, para obtener el tÃ­tulo de Licenciado en Sistemas en la facultad de IngenierÃ­a de la Universidad de Mendoza.');
INSERT INTO `paginas` VALUES ('16', 'PolÃ­tica de privacidad', null);
INSERT INTO `paginas` VALUES ('17', 'Condiciones de uso', null);
INSERT INTO `paginas` VALUES ('18', 'Contacto', null);
INSERT INTO `paginas` VALUES ('19', 'Secciones', null);
INSERT INTO `paginas` VALUES ('20', 'Noticias', null);

-- ----------------------------
-- Table structure for `secciones`
-- ----------------------------
DROP TABLE IF EXISTS `secciones`;
CREATE TABLE `secciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seccion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of secciones
-- ----------------------------
INSERT INTO `secciones` VALUES ('1', 'Cultura');
INSERT INTO `secciones` VALUES ('4', 'Blogs');
INSERT INTO `secciones` VALUES ('5', 'Deportes');
INSERT INTO `secciones` VALUES ('6', 'Nacional');
INSERT INTO `secciones` VALUES ('16', 'Internacional');
INSERT INTO `secciones` VALUES ('17', 'OpiniÃ³n');
INSERT INTO `secciones` VALUES ('18', 'TecnologÃ­a');
INSERT INTO `secciones` VALUES ('19', 'NanotecnologÃ­a');
