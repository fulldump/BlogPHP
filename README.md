BlogPHP
=======

A demo blog written in PHP for learning purpose

# ¿Qué tiene esta rama (step 1)?

El objetivo de esta rama es disponer de plantillas básicas con las que obtendremos el aspecto visual de las dos páginas principales del blog:

* templates/article.html - Para mostrar un artículo completo con sus comentarios
* templates/main.html - Para mostrar un listado con los últimos artículos (resumidos)

Para cumplir este objetivo utilizamos algo de HTML y CSS.

Cosas buenas:

* DTD de HTML 5
* Tag meta con la codificación UTF-8
* Una hoja de estilos común
* Tags semánticos
* Diseño mínimamente adaptativo

Cosas malas:
* No se visualiza de forma óptima en pantallas móviles
* Las plantillas tienen mucho código duplicado, lo que dificultará bastante el mantenimiento


## DTD de HTML 5

El DTD es la primera línea que hemos colocado en los HTML. Sirve para indicarle al navegador qué versión de HTML estamos utilizando. Es muy importante ya que afecta, entre otras cosas, a cómo se verá la página en nuestro navegador.

```
<!DTD html>
```

## Tag meta con la codificación UTF-8

Los archivos article.html y main.html están codificados en UTF-8 pero además debemos indicarle al navegador que sí están en UTF-8. Lo hacemos con:

```
<meta http-equiv="Content-Type" CONTENT="text/html; charset=UTF-8">
```

## Hoja de estilos común

Las plantillas html utilizan la misma hoja de estilos. La forma de incluirla es:

```
<link rel="stylesheet" type="text/css" href="/css/style.css">
```

## Tags semánticos

Se utilizan algunos tags semánticos para organizar el contenido como <code>header</code>, <code>article</code>, <code>footer</code>, <code>section</code>.

Además, en el main.html utilizamos un <code>li</code> para mostrar el listado de los últimos artículos publicados. Para evitar mostrar los típicos bullets y márgenes, utilizamos el siguiente CSS:

```
.listado-de-articulos {
	list-style-type: none;
	margin: 0;
	padding: 0;
	display: block;
}
```

## Diseño mínimamente adaptativo

El diseño consiste en una franja central de 1000px de ancho en la que se introduce todo el contenido de la web. De esta forma, con monitores muy grandes las líneas de texto no llegarán de lado a lado de la pantalla.

Si observamos con más detenimiento, podemos observar también que si el navegador mide menos de 1000px de ancho, la franja central también disminuye el ancho adaptándose de forma automática. Con esto conseguimos evitar el scroll horizontal que es muy molesto para leer.

Todo este comportamiento se consigue con muy poco CSS:

```
.frame {
	max-width: 1000px; /* Fija el ancho máximo en 1000px */
	margin: auto;  /* Centra el contenedor (al aplicar margen automático, intenta igualar los márgenes laterales)*/
}
```

