USE iGrowp;

-- -------------------------------------- PROCEDIMIENTOS -------------------------------------- --

-- VER CONTENIDO --

delimiter $
create procedure ver_contenido(in idContenidos int)
begin
	SELECT nombreUsuario, nombreInteres, tituloContenido, contenido, imagenContenido, fecha
	FROM interes inner join contenido
		ON interes.idInteres=contenido.idInteres
			inner join usuario
		ON contenido.idUsuario=usuario.idUsuario
	WHERE idContenido=idContenidos;
end
$


-- CONSULTAR CONTENIDO --

delimiter $
create procedure consulta_contenido(in nombreIntereses varchar(70))
begin
	SELECT nombreUsuario, interes.idInteres, nombreInteres, idContenido, imagenContenido, tituloContenido, contenido, fecha
	FROM interes inner join contenido
		ON interes.idInteres=contenido.idInteres
		inner join usuario
		ON contenido.idUsuario=usuario.idUsuario
	WHERE nombreInteres=nombreIntereses
    ORDER BY fecha desc;
end
$

-- CONSULTAR CONTENIDO DADO UN EMAIL DE USUARIO Y UN NOMBRE DE INTERÉS --

delimiter $
create procedure consulta_content_user(in correoElectronico varchar(50), nomInteres varchar(70))
begin
	SELECT nombreUsuario, interes.idInteres, nombreInteres, idContenido, imagenContenido, tituloContenido, contenido, fecha
	FROM interes inner join contenido
		ON interes.idInteres=contenido.idInteres
		inner join usuario
		ON contenido.idUsuario=usuario.idUsuario
	WHERE emailUsuario=correoElectronico and nombreInteres=nomInteres;
end
$


-- CONSULTAR BIOGRAFIA --

delimiter $
create procedure consulta_biografia(in nombreDeInteres varchar(70))
begin
	SELECT idUsuario, nombreUsuario, tipoUsuario, tituloBiografia, biografia,  nombreInteres, imagenBiografia
	FROM interes inner join biografia
		ON interes.idInteres=biografia.idInteresRelacionado
		inner join usuario
		ON biografia.idBiografia=usuario.idBiografia
	WHERE nombreInteres=nombreDeInteres;
end
$


-- MODIFICAR CONTENIDO PERFUL --

delimiter $
CREATE PROCEDURE modificar_cont_perfil (in id_Contenido int, titulo_Contenido varchar(100), content text, id_Interes int)
begin
	UPDATE contenido
	SET  tituloContenido=titulo_Contenido, contenido=content, idInteres=id_Interes
	WHERE idContenido=id_Contenido;
end
$

-- VER BIOGRAFIA --

delimiter $
CREATE PROCEDURE ver_biografia (in idDeUsuario int)
begin
	SELECT nombreUsuario, tipoUsuario, imagenPerfilUsuario, tituloBiografia, biografia, imagenBiografia, nombreInteres, biografia.idBiografia
	FROM interes inner join biografia
		ON interes.idInteres=biografia.idInteresRelacionado
			inner join usuario
		ON biografia.idBiografia=usuario.idBiografia
	WHERE idUsuario=idDeUsuario;
end
$

-- CONSULTAR FORMULARIO PARA MODIFICAR BIOGRAFIA --

delimiter $
CREATE PROCEDURE form_biografia (in idDelUsuario int)
begin
	SELECT nombreinteres, tituloBiografia, biografia, imagenBiografia, biografia.idBiografia
	FROM interes inner join biografia
		ON 	interes.idInteres=biografia.idInteresRelacionado
				inner join usuario
		ON biografia.idBiografia=usuario.idBiografia
	WHERE idUsuario=idDelUsuario;
end
$

-- LLENAR FORMULARIO CREAR BIOGRAFIA --

delimiter $
CREATE PROCEDURE formulario_biografia (titulo_biografia varchar(100), cont_biografia text, imagen_biografia varchar(150), idDeInteresRelacionado int, idDeUsuario int)
begin
	INSERT INTO biografia (tituloBiografia, biografia, imagenBiografia, idInteresRelacionado, Usuario)
	VALUES (titulo_biografia, cont_biografia, imagen_biografia, idDeInteresRelacionado, idDeUsuario);
end
$

-- drop procedure formulario_biografia;

-- MODIFICAR BIOGRAFIA --

delimiter $
CREATE PROCEDURE modificar_biografia (in idDeBiografia int, titulo_biografia varchar(100), cont_biografia text, imagen_biografia varchar(50), idDeInteresRelacionado int)
begin
	update biografia
	set tituloBiografia=titulo_biografia, biografia=cont_biografia, imagenBiografia=imagen_biografia, idInteresRelacionado=idDeInteresRelacionado
	WHERE idBiografia=idDeBiografia;
end
$

-- MODIFICAR ID DE BIOGARFIA A NULL EN TABLA USUARIO --

delimiter $
CREATE PROCEDURE modificar_usuario (in idDeBiografia int)
begin
	update usuario
	set idBiografia=null
	WHERE idBiografia=idDeBiografia;
end
$

-- ELIMINAR BIOGRAFIA --

delimiter $
CREATE PROCEDURE eliminar_biografia (in idDeBiografia int)
begin
	DELETE FROM biografia
	WHERE idBiografia=idDeBiografia;
end
$

-- AGREGAR UN INTERES UNO --

delimiter $
CREATE PROCEDURE interes_1 (in idDeUsuario int,interesUno int)
begin
	UPDATE usuario
    SET idInteresUno=interesUno
    WHERE idUsuario=idDeUsuario;
end
$

-- AGREGAR UN INTERES DOS --

delimiter $
CREATE PROCEDURE interes_2 (in idDeUsuario int, interesDos int)
begin
	UPDATE usuario
    SET idInteresDos=interesDos
    WHERE idUsuario=idDeUsuario;
end
$

-- AGREGAR UN INTERES TRES --

delimiter $
CREATE PROCEDURE interes_3 (in idDeUsuario int,interesTres int)
begin
	UPDATE usuario
    SET idInteresTres=interesTres
    WHERE idUsuario=idDeUsuario;
end
$

-- AGREGAR UN INTERES CUATRO --

delimiter $
CREATE PROCEDURE interes_4 (in idDeUsuario int,interesCuatro int)
begin
	UPDATE usuario
    SET idInteresCuatro=interesCuatro
    WHERE idUsuario=idDeUsuario;
end
$

-- AGREGAR UN INTERES CINCO --

delimiter $
CREATE PROCEDURE interes_5 (in idDeUsuario int,interesCinco int)
begin
	UPDATE usuario
    SET idInteresCinco=interesCinco
    WHERE idUsuario=idDeUsuario;
end
$

-- AGREGAR UN INTERES SEIS --

delimiter $
CREATE PROCEDURE interes_6 (in idDeUsuario int,interesSeis int)
begin
	UPDATE usuario
    SET idInteresSeis=interesSeis
    WHERE idUsuario=idDeUsuario;
end
$

-- AGREGAR UN INTERES SIETE -- 

delimiter $
CREATE PROCEDURE interes_7 (in idDeUsuario int,interesSiete int)
begin
	UPDATE usuario
    SET idInteresSiete=interesSiete
    WHERE idUsuario=idDeUsuario;
end
$

-- AGREGAR UN INTERES OCHO -- 

delimiter $
CREATE PROCEDURE interes_8 (in idDeUsuario int,interesOcho int)
begin
	UPDATE usuario
    SET idInteresOcho=interesOcho
    WHERE idUsuario=idDeUsuario;
end
$

-- AGREGAR UN INTERES NUEVE -- 

delimiter $
CREATE PROCEDURE interes_9(in idDeUsuario int,interesNueve int)
begin
	UPDATE usuario
    SET idInteresNueve=interesNueve
    WHERE idUsuario=idDeUsuario;
end
$

-- AGREGAR UN INTERES DIEZ -- 

delimiter $
CREATE PROCEDURE interes_10 (in idDeUsuario int,interesDiez int)
begin
	UPDATE usuario
    SET idInteresDiez=interesDiez
    WHERE idUsuario=idDeUsuario;
end
$

-- CONSULTAR NOMBRE INSTITUCIÓN ACTUAL--

delimiter $
CREATE PROCEDURE consulta_1 (in correoElectronico varchar(50))
begin
SELECT nombreInstitucion, nivelEducativo 
FROM  usuario inner join institucion 
	ON usuario.idInstitucionActual=institucion.idInstitucion
WHERE emailUsuario=correoElectronico;
end
$

-- CONSULTAR NOMBRE INSTITUCIÓN SECUNDARIA--

delimiter $
CREATE PROCEDURE consulta_2 (in correoElectronico varchar(50))
begin
SELECT nombreInstitucion, nivelEducativo 
FROM  usuario inner join institucion 
	ON usuario.idInstitucionSecundaria=institucion.idInstitucion
WHERE emailUsuario=correoElectronico;
end
$

-- CONSULTAR NOMBRE INSTITUCIÓN MEDIO SUPERIOR--

delimiter $
CREATE PROCEDURE consulta_3(in correoElectronico varchar(50))
begin
SELECT nombreInstitucion, nivelEducativo 
FROM  usuario inner join institucion 
	ON usuario.idInstitucionMedioSuperior=institucion.idInstitucion
WHERE emailUsuario=correoElectronico;
end
$

-- CONSULTAR NOMBRE INSTITUCIÓN SUPERIOR--

delimiter $
CREATE PROCEDURE consulta_4(in correoElectronico varchar(50))
begin
SELECT nombreInstitucion, nivelEducativo 
FROM  usuario inner join institucion 
	ON usuario.idInstitucionSuperior=institucion.idInstitucion
WHERE emailUsuario=correoElectronico;
end
$

-- CONSULTAR NOMBRE INSTITUCIÓN MAESTRIA --

delimiter $
CREATE PROCEDURE consulta_5(in correoElectronico varchar(50))
begin
SELECT nombreInstitucion, nivelEducativo 
FROM  usuario inner join institucion 
	ON usuario.idInstitucionMaestria=institucion.idInstitucion
WHERE emailUsuario=correoElectronico;
end
$

-- CONSULTAR NOMBRE INSTITUCIÓN DOCTORADO --

delimiter $
CREATE PROCEDURE consulta_6(in correoElectronico varchar(50))
begin
SELECT nombreInstitucion, nivelEducativo 
FROM  usuario inner join institucion 
	ON usuario.idInstitucionDoctorado=institucion.idInstitucion
WHERE emailUsuario=correoElectronico;
end
$

-- AGREGAR INSTITUCION --

delimiter $
CREATE PROCEDURE insert_institucion (nombreDeInstitucion varchar(50), nivelDeInstitucion varchar(20))
begin
	INSERT INTO institucion (nombreInstitucion, nivelEducativo) 
	values (nombreDeInstitucion, nivelDEInstitucion);
end
$


-- MODIFICAR O AGREGAR INSTITUCION ACTUAL --

delimiter $
CREATE PROCEDURE institucion_1(in correoElectronico varchar(50), idDeInstitucion int)
begin
	UPDATE usuario
    SET idInstitucionActual=idDeInstitucion
    WHERE emailUsuario=correoElectronico;
end
$

-- MODIFICAR O AGREGAR INSTITUCION SECUNDARIA --

delimiter $
CREATE PROCEDURE institucion_2(in correoElectronico varchar(50), idDeInstitucion int)
begin
	UPDATE usuario
    SET idInstitucionSecundaria=idDeInstitucion
    WHERE emailUsuario=correoElectronico;
end
$

-- MODIFICAR O AGREGAR INSTITUCION MEDIO SUPERIOR --

delimiter $
CREATE PROCEDURE institucion_3(in correoElectronico varchar(50), idDeInstitucion int)
begin
	UPDATE usuario
    SET idInstitucionMedioSuperior=idDeInstitucion
    WHERE emailUsuario=correoElectronico;
end
$

-- MODIFICAR O AGREGAR INSTITUCION SUPERIOR --

delimiter $
CREATE PROCEDURE institucion_4(in correoElectronico varchar(50), idDeInstitucion int)
begin
	UPDATE usuario
    SET idInstitucionSuperior=idDeInstitucion
    WHERE emailUsuario=correoElectronico;
end
$

-- MODIFICAR O AGREGAR INSTITUCION MAESTRIA --

delimiter $
CREATE PROCEDURE institucion_5(in correoElectronico varchar(50), idDeInstitucion int)
begin
	UPDATE usuario
    SET idInstitucionMaestria=idDeInstitucion
    WHERE emailUsuario=correoElectronico;
end
$

-- MODIFICAR O AGREGAR INSTITUCION POSGRADO --

delimiter $
CREATE PROCEDURE institucion_6(in correoElectronico varchar(50), idDeInstitucion int)
begin
	UPDATE usuario
    SET idInstitucionDoctorado=idDeInstitucion
    WHERE emailUsuario=correoElectronico;
end
$