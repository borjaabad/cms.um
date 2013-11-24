<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-8 column">
					<h3>
						RESUMEN
					</h3>
					<dl>
						<dt>
							<span>El trabajo final será una bitácora de experiencias, caminos, aprendizajes y conclusiones surgidas en la creación de la arquitectura fundamental de un CMS.</span>
						</dt>
						
						
						<dd>
							Se trata de desarrollar una aplicación con su backend para administrar el frontend. La estructura del CMS permitirá el desarrollo en equipos por ser orientado a componentes.
						</dd>
						
						<dd>
							Por un lado, el back, ha de ser robusto y no importa si pesado, confiable, escalable, etc. El tema de orientarlo a componentes, significa que una vez establecido el core de la aplicación cualquier desarrollador pueda agregar componentes si está bien definida la interfaz.
						</dd>
						
						<dd>
							Por otro lado, el front, ha de ser simple, y sobre todo muy liviano, ya que es el que sufre la mayor carga en el servidor. También será orientado a módulos, los cuales agregados, son los que conforman las páginas.
						</dd>
						
						<dd>
							Se profundizará en el concepto página, se desarrollará un sistema Drag&amp;Drop para que desde el back de puedan crear las páginas arrastrando módulos dinámicos o estáticos sobre ellas.
						</dd>
						
						<dd>
							Se hará manejo de los buffers del servidor web para implementar un sistema de caché bajo demanda apoyada en el sistema de archivos, con los outputs procesados como archivos planos, tratando así de demostrar que un sistema como el descrito puede ser de mayor rendimiento sin aumentar notablemente la complejidad del mismo y ni que la performance del usuario se vea afectada.
						</dd>
						
					</dl>
				</div>
				<div class="col-md-4 column">
					<h3>
						Metodología
					</h3>
					
					<div>
						Por trabajar solo, he podido ahorrar mucho tiempo en la comunicación con diagramas e información del sistema, puesta en común, etc. En grandes organizaciones, el uso de herramientas de modelado UML, o la producción bajo el concepto RUP, se vuelve imprescindible, ya que en la práctica a veces el programador no tiene ni idea de para qué programa.
					</div>
					
					<div>
						Se ha hecho uso del lenguaje de programación PHP5, apoyado en la BBDD Mysql para afrontar las funcionalidades y objetivos planteados en esta tesis. Ésta ha sido mi principal herramienta, y aunque he estado más cerca del ExtremeProgramming que del RUP, he incluido varios diagramas de análisis y diseño.
					</div>
					
					<div>
						El desarrollo ha estado espejado en GitHub como central de versionado.
					</div>
					
					
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-12 column">
					<h3>
						Avance establecido
					</h3>
					
					<div>
						Se parte del patrón MVC base de Jaisiel Delance. Se define el proyecto como la adición de dos aplicaciones, una el Front y otra el Back.
					</div>
					
					<div>
						Empezamos por el Back, agregamos una capa de abstracción al sistema con el recurso Componentes. Se definen algunos básicos y se genera una interfaz para su creación.
					</div>
					
					<div>
						En el Front, se introduce en el concepto de página, y por tanto el de módulo. Se usa una librería drag&amp;drop para la creación de páginas en el back. Se adapta al sistema y se le agrega la posibilidad de incluir módulos dinámicos.
					</div>
					
					<div>
						Por último, y en base al concepto página, se desarrolla un sistema de caché.
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
</div>