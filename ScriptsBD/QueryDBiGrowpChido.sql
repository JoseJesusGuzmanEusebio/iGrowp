DROP DATABASE IF EXISTS iGrowp;

CREATE DATABASE iGrowp;

USE iGrowp;

CREATE TABLE interes (
idInteres					int				not null	primary key auto_increment,
nombreInteres				varchar(70)		not null
);

CREATE TABLE institucion (
idInstitucion				int				not null	primary key auto_increment,
nivelEducativo				varchar(20)		not null,
nombreInstitucion			varchar(200)	not null
);

CREATE TABLE biografia (
idBiografia					int				not null 	primary key auto_increment,
Usuario 					int 			not null 	unique key,
biografia					text			not null,
tituloBiografia				varchar(100),	
imagenBiografia				varchar(150),
idInteresRelacionado		int				not null,
foreign key (idInteresRelacionado) references interes(idInteres) on delete cascade on update cascade
);

CREATE TABLE usuario (
idUsuario 					int				not null	primary key auto_increment, 
nombreUsuario 				varchar(100)	not null,
tipoUsuario					varchar(15)		not null,
emailUsuario				varchar(50)		not null	unique,
passwordUsuario				varchar(32)		not null,
edadUsuario					int,
imagenPerfilUsuario			varchar(150),
idInteresUno				int,
idInteresDos				int,
idInteresTres				int,
idInteresCuatro				int,
idInteresCinco				int,
idInteresSeis				int,
idInteresSiete				int,
idInteresOcho				int,
idInteresNueve				int,
idInteresDiez				int,
idInstitucionActual			int,
idInstitucionSecundaria		int,
idInstitucionMedioSuperior	int,
idInstitucionSuperior		int,
idInstitucionMaestria		int,
idInstitucionDoctorado		int,
idBiografia					int,
foreign key (idInteresUno) references interes(idInteres) on delete cascade on update cascade,
foreign key (idInteresDos) references interes(idInteres) on delete cascade on update cascade,
foreign key (idInteresTres) references interes(idInteres) on delete cascade on update cascade,
foreign key (idInteresCuatro) references interes(idInteres) on delete cascade on update cascade,
foreign key (idInteresCinco) references interes(idInteres) on delete cascade on update cascade,
foreign key (idInteresSeis) references interes(idInteres) on delete cascade on update cascade,
foreign key (idInteresSiete) references interes(idInteres) on delete cascade on update cascade,
foreign key (idInteresOcho) references interes(idInteres) on delete cascade on update cascade,
foreign key (idInteresNueve) references interes(idInteres) on delete cascade on update cascade,
foreign key (idInteresDiez) references interes(idInteres) on delete cascade on update cascade,
foreign key (idInstitucionActual) references institucion(idInstitucion) on delete cascade on update cascade,
foreign key (idInstitucionSecundaria) references institucion(idInstitucion) on delete cascade on update cascade,
foreign key (idInstitucionMedioSuperior) references institucion(idInstitucion) on delete cascade on update cascade,
foreign key (idInstitucionSuperior) references institucion(idInstitucion) on delete cascade on update cascade,
foreign key (idInstitucionMaestria) references institucion(idInstitucion) on delete cascade on update cascade,
foreign key (idInstitucionDoctorado) references institucion(idInstitucion) on delete cascade on update cascade,
foreign key (idBiografia) references biografia(idBiografia) on delete cascade on update cascade
);

CREATE TABLE contenido (
idContenido					int				not null	primary key auto_increment,
idUsuario					int				not null,
idInteres					int				not null,
tituloContenido				varchar(200),
contenido					text,
imagenContenido				varchar(150),
fecha						datetime		not null,
foreign key (idUsuario) references usuario(idUsuario) on delete cascade on update cascade,
foreign key (idInteres) references interes(idInteres) on delete cascade on update cascade
);