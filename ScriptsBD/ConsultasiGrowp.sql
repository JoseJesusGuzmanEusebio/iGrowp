USE iGrowp;


-- ---------------------------------------------- Consultas ------------------------------------------------ --

-- Ver contenido en perfil --
SELECT nombreInteres, idContenido, imagenContenido, tituloContenido, contenido, fecha
FROM interes inner join contenido
	ON interes.idInteres=contenido.idInteres;
    

-- LLAMAR A PROCEDIMIENTO MODIFICAR CONTENIDO PERFIL --

call modificar_cont_perfil (1, 'Modificar contenido', 'Contenido que contiene contenidos bla bla', 2);





-- Eliminar contenido en perfil --
DELETE FROM contenido
WHERE idContenido=2;

SELECT * FROM contenido;
 

-- Consultar nombre de interés con un email dado --
SELECT nombreInteres FROM interes inner join usuario
	ON interes.idInteres=usuario.idInteresUno
where emailUsuario='victorurielp@gmail.com';

-- Consultar interes dado un email especifico --
SELECT interes.idInteres, nombreInteres
FROM interes right join usuario
	ON interes.idInteres=usuario.idInteresUno  or interes.idInteres=usuario.idInteresDos or interes.idInteres=usuario.idInteresTres 
		or interes.idInteres=usuario.idInteresCuatro or interes.idInteres=usuario.idInteresCinco or interes.idInteres=usuario.idInteresSeis 
        or interes.idInteres=usuario.idInteresSiete or interes.idInteres=usuario.idInteresOcho or interes.idInteres=usuario.idInteresNueve 
        or interes.idInteres=usuario.idInteresDiez
WHERE emailUsuario='josejesus1824@gmail.com';

-- Ver TusContenidos --  
    
call consulta_contenido('Informática');


-- Consultar biografia --

call consulta_biografia ('Literatura');


-- VER CONTENIDO --

call ver_contenido(1);

-- Ver perfiles --

SELECT idUsuario
FROM usuario
WHERE emailUsuario='mich.tan95@gmail.com';


-- VER BIOGRAFIA --

call ver_biografia(1);


-- FORMULARIO BIOGRAFIA

call formulario_biografia('Biografía', 'La danza es algo hermoso, es sin duda una de las bellas artes más hermosas
del mundo. Si pudiera, atravesaría cielo, mar y tierra...', 'ImagenesUsuario/Literatura.jpg', 14);


-- CONSULTAR CONTENIDO DADO UN EMAIL DE USUARIO Y UN NOMBRE DE INTERÉS --

call consulta_content_user('victorurielp@gmail.com','Informática');


-- BUSCAR PERSONAS --

SELECT idUsuario, nombreUsuario, tipoUsuario, imagenPerfilUsuario 
FROM usuario 
WHERE nombreUsuario LIKE "tan%";

-- BUSCAR INTERESES --

SELECT * 
FROM interes
WHERE nombreInteres LIKE 'A%' ORDER BY nombreInteres;


-- CONSULTAR FORMULARIO PARA EDITAR BIOGRAFIA --

call form_biografia(2);


-- LLAMAR A PROCEDIMIENTO MODIFICAR BIOGRAFIA --

call modificar_biografia ();


select * from biografia;


-- ELIMINAR BIOGRAFIA --

DELETE FROM biografia
where idBiografia=3;