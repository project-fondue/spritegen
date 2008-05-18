<p>Esta herramienta te permite automatizar el proceso de generación de sprites CSS. Simplemente dale un fichero ZIP que contenga 2 o m&aacute;s im&aacute;genes (GIF, PNG o JPG) y se generar&aacute; una imagen sprite con las correspondientes reglas CSS para localizar y mostrar cada imagen que lo compone.</p>
<h2>Opciones</h2>
<p>La herramienta tiene muchas opciones que puedes configurar para modificar las caracter&iacute;sticas de la imagen sprite y CSS generados para que se adapten mejor a las especificaciones de tu sitio web. Estas opciones se detallan a continuación:</p>
<h3>Redimensionar im&aacute;genes originales</h3>
<dl>
   <dt>Ancho y Alto</dt>
   <dd>Si el ancho o el alto se informan por debajo del 100% de las im&aacute;genes originales, se reducir&aacute;n en ese tamaño antes de ser copiadas en la imagen destino. La herramienta no te dejar&aacute; especificar un valor mayor de 100% como incremento porque dar&iacute;a como resultado una reducción en la calidad de la imagen. El valor por defecto de ancho y alto es 100% (no redimensionar).</dd>
</dl>
<h3>Im&aacute;genes duplicadas</h3>
<dl>
   <dt>Ignorar im&aacute;genes duplicadas</dt>
   <dd>Las im&aacute;genes duplicadas se copian en la imagen sprite y se crean reglas CSS independientes para cada duplicado.</dd>
   <dt>Quitar im&aacute;genes duplicadas pero combinar las clases en una sola</dt>
   <dd>La herramienta compara un MD5 de los contenidos de cada imagen para determinar con precisión cu&aacute;les son duplicados exactos de otras que est&aacute;n en el ZIP. Estos duplicados son descartados y las reglas CSS de estos duplicados se combinan en una &uacute;nica regla CSS.</dd>
</dl>
<h3>Opciones del Sprite generado</h3>
<dl>
   <dt>Desplazamiento horizontal</dt>
   <dd>Determina el espacio horizontal entre filas de im&aacute;genes en la imagen generada. Este valor necesita ser lo bastante grande como para solucionar el <a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">bug de repetición de fondo de Safari</a>. Sugerimos dejar el valor predeterminado.</dd>
   <dt>Desplazamiento vertical</dt>
   <dd>Determina el espacio vertical entre im&aacute;genes consecutivas. Debe ser lo bastante grande para tener en cuenta el incremento del tamaño de la fuente de letra del usuario. Generalmente recomendamos que diseñes tu sitio de manera que los visitantes puedan incrementar el doble su fuente de letra antes de que la siguiente imagen de fondo en la secuencia se haga visible.</dd>
   <dt>Color de fondo</dt>
   <dd>Establece el color del fondo para la imagen generada. Este campo necesita un valor de color de 6 d&iacute;gitos hexadecimales. Si se deja en blanco and el formato de salida esta puesto como GIF o PNG, el color de fondo ser&aacute; transparente.</dd>
   <dt>Formato del fichero Sprite</dt>
   <dd>Soporta GIF, PNG y JPG. GIF y PNG pueden tener fondos transparentes. El valor por defecto es PNG.</dd>
</dl>
<h3>Opciones del CSS generado</h3>
<dl>
   <dt>Prefijo CSS</dt>
   <dd>Se le asigna un prefijo con el texto indicado a cada regla de posición CSS generada. Se permite anteponer ID y selectores de clase. Se permiten los siguientes caracteres - <em>a-z</em>, <em>0-9</em>, <em>_</em>, <em>-</em>, <em>#</em> y <em>.</em></dd>
   <dt>Plantilla de nombre de fichero</dt>
   <dd>Se puede utilizar cualquier expresión regular v&aacute;lida. Indica par&eacute;ntesis alrededor de la sección de la plantilla en el punto que deseas que sea extra&iacute;do de cada nombre de fichero de las im&aacute;genes. Estos ser&aacute;n usados como base para los nombres de las clases que indican el posicionamiento.</dd>
   <dt>Prefijo de Clase</dt>
   <dd>El texto indicado ser&aacute; puesto antes de cada nombre de clase generado. Es particularmente importante especificarlo cuando los nombres de clase generados pueden empezar con un n&uacute;mero como resultado de un selector no v&aacute;lido (recomendaci&oacute;n definida por W3C). Son permitidos los caracteres - <em>a-z</em>, <em>0-9</em>, <em>_</em> and <em>-</em>. El prefijo indicado no puede empezar por un n&uacute;mero.</dd>
   <dt>Sufijo CSS</dt>
   <dd>El texto indicado ser&aacute; añadido al final de cada regla CSS. El &quot;Sufijo CSS&quot; permite los mismos caracteres que el &quot;Prefijo de Clase&quot;.</dd>
</dl>