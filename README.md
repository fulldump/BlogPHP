BlogPHP
=======

A demo blog written in PHP for learning purpose

# ¿Qué tiene esta rama (step 2)?

El objetivo de esta rama es almacenar la información del blog en base de datos y mostrarla en la web. El diseño es muy simple

Para ello utilizaremos la base de datos relacional MySQL con la siguiente estructura de tablas:

* Article
	* id - autonumérico
	* title - varchar(64)
	* text - text
	* time_creation - int
	* time_publication - int

* Comment
	* id - autonumérico
	* id_article - relacionado con la tabla blog
	* text - text
	* time - int

Cosas buenas:

* Permite almacenar y servir una gran cantidad de artículos
* El diseño es muy simple
* Todas las consultas a base de datos pasan a través de un único punto (la clase Database) 
* Usa UTF-8 para la codificación de las conexiones con la base de datos

Cosas malas:

* No tiene protección contra ataques CSRF
* No tiene paginación automática
* No tiene ningún tipo de caché
* No tiene manejo de sesiones
* No tiene interfaz de edición
* No tiene tags
* No utiliza una capa (tipo ORM) para acceder a la base de datos


## ¿Cómo se usa UTF-8 para la codificación de las conexiones con la base de datos?

La clase Database.class.php tiene un método estático privado en el que se establece la conexión con la base de datos. Justo después de establecer la conexión, le decimos que vamos a usar UTF-8:

```
mysql_query("SET NAMES 'utf8'");
```

