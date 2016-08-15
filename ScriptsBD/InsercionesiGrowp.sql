USE iGrowp;

-- ----------------------------------------Insertar intereses---------------------------------------------- --

INSERT INTO interes (idInteres, nombreInteres) VALUES 
(1, 'Música'),
(2, 'Informática'),
(3, 'Turismo'),
(4, 'Gastronomía'),
(5, 'Astronomía'),
(6, 'Física'),
(7, 'Química'),
(8, 'Biología'),
(9, 'Psicología'),
(10, 'Ecología'),
(11, 'Economía'),
(12, 'Finanzas'),
(13, 'Pintura'),
(14, 'Danza'),
(15, 'Escultura'),
(16, 'Literatura'),
(17, 'Arquitectura'),
(18, 'Ciencia y tecnología'),
(19, 'Taekwondo'),
(20, 'Diseño'),
(21, 'Electrónica'),
(22, 'Mecánica automotriz'),
(23, 'Ingeniería de software'),
(24, 'Mercadotecnia'),
(25, 'Programación'),
(26, 'Derecho'),
(27, 'Filosofía'),
(28, 'Pedagogía'),
(29, 'Medicina'),
(30, 'Teatro'),
(31, 'Historia'),
(32, 'Cinematografía'),
(33, 'Matemáticas');

-- ----------------------------------------Insertar instituciones---------------------------------------------- --

INSERT INTO institucion (idInstitucion, nivelEducativo, nombreInstitucion) VALUES
(1, 'Superior', 'UPIICSA'),
(2, 'Superior', 'ESIME Zacatenco'),
(3, 'Superior', 'ESIME Culhuacán'),
(4, 'Superior', 'ESIME Azcapotzalco'),
(5, 'Superior', 'ESIA Tecamachalco'),
(6, 'Superior', 'ESIA Zacatenco'),
(7, 'Superior', 'ESCOM'),
(8, 'Superior', 'UPIITA'),
(9, 'Superior', 'UPIBI'),
(10, 'Superior', 'UPIIG'),
(11, 'Superior', 'UPIIZ'),
(12, 'Superior', 'ESIME Ticomán'),
(13, 'Superior', 'ESIA Ticomán'),
(14, 'Superior', 'ESIT'),
(15, 'Superior', 'ESIQIE'),
(16, 'Superior', 'ESFM'),
(17, 'Superior', 'ENCB'),
(18, 'Superior', 'ESM'),
(19, 'Superior', 'ESMyH'),
(20, 'Superior', 'CICS Milpa Alta'),
(21, 'Superior', 'CICS Santo Tomás'),
(22, 'Superior', 'ESCA Tepepan'),
(23, 'Superior', 'ESCA Santo Tomás'),
(24, 'Superior', 'ESE'),
(25, 'Superior', 'EST'),
(26, 'Superior', 'FES Aragón'),
(27, 'Superior', 'FES Acatlán'),
(28, 'Superior', 'FES Zaragoza'),
(29, 'Superior', 'FES Cuautitlán'),
(30, 'Superior', 'FES Iztacala'),
(31, 'Medio Superior', 'CECyT 1 Gonzalo Vázquez Vela'),
(32, 'Medio Superior', 'CET 1 Walter Cross Buchanan'),
(33, 'Medio Superior', 'CECyT 8 Narciso Bassols García'),
(34, 'Medio Superior', 'ENP 2 Erasmo Castellanos Quinto');


-- ----------------------------------------Insertar biogarfias---------------------------------------------- --

INSERT INTO biografia (tituloBiografia, biografia, imagenBiografia, idInteresRelacionado, Usuario) VALUES
('Mi Biografía', 'Es normal perderse en las aguas de una música incitante. Es normal responder al estímulo de una música armoniosa. Es normal 
recordar experiencias de vida a través de una música específica, así como es normal buscar en la música un refugio. La música, como una esfera, 
encierra un ambiente y lo protege. Cuando a solas canto en mi estudio, ya con los audífonos sonando y 
un micrófono encendido, no existe nada más que ese inmenso mar de notas frente a mi. El aire, mi respiración y su ritmo me alejan del mundo y puedo 
sentir cómo van cambiando en mí las formas, puedo notar cómo se limpian mis pensamientos, cómo se aclaran mis visiones, cómo se enaltecen mis 
emociones.', 'ImagenesUsuario/Musica.jpg',1,2),
('Mi historia', 'Lo primero que hice cuando tuve mi primera novela, la cual me pareció una obra maestra, fue visitar todas las editoriales de la zona 
buscando que la publicaran. Todas ellas me dijeron que mi obra merecía ser publicarla, por calidad literaria, pero que no publicaban a autores noveles o 
que debía pagar una cantidad desproporcionada para una ridícula primera edición de 100 ejemplares. Sentí que buscaban llenarse los bolsillos con las 
ilusiones de gente como yo.','ImagenesUsuario/Literatura.jpg', 16,4), 
('Un consejo', 'En el mundo de la informática siempre necesitarás consejos y ayudas de otras personas para conseguir algún objetivo que te propongas.
En Aportes tratamos de darte esos consejos y ayudas que necesitas, pero si no recibimos ninguna sugerencia trataremos temas que creamos que puedan ser 
de tu interés. Para realizar tu sugerencia simplemente deja un comentario abajo.', 'ImagenesUsuario/Informatica.jpg',2,3);


-- ----------------------------------------Insertar usuarios---------------------------------------------- --

INSERT INTO usuario (nombreUsuario, tipoUsuario, emailUsuario, passwordUsuario, edadUsuario, imagenPerfilUsuario, idInteresUno, idInteresDos, idInteresTres, idInteresCuatro, idInteresCinco, idInteresSeis, idInteresSiete, idInteresOcho, idInteresNueve, idInteresDiez, idBiografia) VALUES
('Victor Uriel Pacheco García', 'Educando', 'victorurielp@gmail.com', '41e410d960d2455c14532ca012712288', 15, 'ImagenesUsuario/ImagenIndex.png', 2, 1, 3, 4, 5, 6, 7, 8, 9, 10, 3),
('Tania Michelle López Martínez', 'Educador', 'mich.tan95@gmail.com', '650b17382813a082b4241554afe0d621', 18, 'ImagenesUsuario/ImagenIndex.png', 1, 2, 4, 6, 7, 3, 8, 10, 20, 1, 1),
('José Jesús Guzmán Eusebio', 'Educador', 'josejesus1824@gmail.com', '0a71cdae91ead84466a922faa47f6042', 20, 'ImagenesUsuario/ImagenIndex.png', 2, 4, 9, 14, 16, 20, 25, null, null, null, null),
('Oscar Salvador López Martínez', 'Educando', 'oscarslm@hotmail.com', '63a9f0ea7bb98050796b649e85481845', 16, 'ImagenesUsuario/ImagenIndex.png', 9, 6, 4, 6, 2, 1, 10, 16, 15, 3, 2),
('Yolanda Estefanía Pacheco García', 'Educador', 'yolanda.estefania@hotmail.com', '6202d6395ceb22de1e38b7ac8332e788', 18, 'ImagenesUsuario/ImagenIndex.png', 7, 4, 1, 2, 11, 22, 30, null, null, null, null),
('Magdalena García', 'Educando', 'magdi@gmail.com', '575e527e5729c0457fbd3922e96b0c30', 30, 'ImagenesUsuario/ImagenIndex.png', 17, 1, 3, 4, 5, 15, 17, 29, null, null, null),
('Rocío Martinez Valdez', 'Educando', 'cici@gmail.com', '4fff1497cc40d7b8e7c3b2e0f3c7d59c', 31, 'ImagenesUsuario/ImagenIndex.png', 12, 30, 1, 2, 25, 16, 24, 10, 31, null, null);



INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES (1,2,
        'Diagrama de despliegue',
        'El Diagrama de despliegue es un diagrama estructurado que muestra la arquitectura del sistema desde el punto de vista del despliegue (distribución) de los los artefactos del software en los destinos de despliegue.
Los artefactos representan elementos concretos en el mundo físico que son el resultado de un proceso de desarrollo. Ejemplos de artefactos son archivos ejecutables, bibliotecas, archivos, esquemas de bases de datos, archivos de configuración, etc

Destino de despliegue está generalmente representado por un nodo que es o bien de los dispositivos de hardware o bien algún entorno de ejecución de software. Los nodos pueden ser conectados a través de vías de comunicación para crear sistemas en red de complejidad arbitraria.

Hay que tener en cuenta, que en los diagramas  UML 1.x de despliegue los componentes eran enviados directamente a los nodos. En UML 2.x, los artefactos se despliegan en los nodos, y los artefactos pueden manifestar componentes (aplicar). Los componentes se implementa en nodos indirectamente a través de los  artefactos.',
        NULL,
        '2015-11-29 11:50:43'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES (2,
        6,
        'Teoria de la relatividad',
        'La teoría de la relatividad incluye tanto a la teoría de la relatividad especial como la de relatividad general, formuladas por Albert Einstein a principios del siglo XX, que pretendían resolver la incompatibilidad existente entre la mecánica newtoniana y el electromagnetismo.

La teoría de la relatividad especial, publicada en 1905, trata de la física del movimiento de los cuerpos en ausencia de fuerzas gravitatorias, en el que se hacían compatibles las ecuaciones de Maxwell del electromagnetismo con una reformulación de las leyes del movimiento.

La teoría de la relatividad general, publicada en 1915, es una teoría de la gravedad que reemplaza a la gravedad newtoniana, aunque coincide numéricamente con ella para campos gravitatorios débiles y "pequeñas" velocidades. La teoría general se reduce a la teoría especial en ausencia de campos gravitatorios.

No fue hasta el 7 de marzo de 2010 que fueron mostrados públicamente los manuscritos originales de Einstein por parte de la Academia Israelí de Ciencias, aunque la teoría se había publicado en 1905. El manuscrito contiene 46 páginas de textos y fórmulas matemáticas redactadas a mano, y fue donado por Einstein a la Universidad Hebrea de Jerusalén en 1925 con motivo de su inauguración.
',
        NULL,
        '2015-11-20 05:03:43'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('3',
        '14',
        'Historia del baile',
        'La danza o el baile es un arte donde se utiliza el movimiento del cuerpo usualmente con música, como una forma de expresión, de interacción social, con fines de entretenimiento, artísticos o religiosos. Es el movimiento en el espacio que se realiza con una parte o todo el cuerpo del ejecutante, con cierto compás o ritmo como expresión de sentimientos individuales, o de símbolos de la cultura y la sociedad. En este sentido, la danza también es una forma de comunicación, ya que se usa el lenguaje no verbal entre los seres humanos, donde el bailarín o bailarina expresa sentimientos y emociones a través de sus movimientos y gestos. Se realiza mayormente con música, ya sea una canción, pieza musical o sonidos.

Dentro de la danza existe la coreografía, que es el arte de crear danzas. La persona que crea coreografía, se le conoce como coreógrafo. La danza se puede bailar con un número variado de bailarines, que va desde solitario, en pareja o grupos, pero el número por lo general dependerá de la danza que se va a ejecutar y también de su objetivo, y en algunos casos más estructurados, de la idea del coreógrafo.
        ',
        NULL,
        '2015-12-03 10:23:46'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('4',
        '25',
        'Ruby on Rails',
        'Los principios fundamentales de Ruby on Rails incluyen No te repitas (del inglés Dont repeat yourself, DRY) y Convención sobre Configuración.

No te repitas significa que las definiciones deberían hacerse una sola vez. Dado que Ruby on Rails es un framework de pila completa, los componentes están integrados de manera que no hace falta establecer puentes entre ellos. Por ejemplo, en ActiveRecord, las definiciones de las clases no necesitan especificar los nombres de las columnas; Ruby puede averiguarlos a partir de la propia base de datos, de forma que definirlos tanto en el código como en el programa sería redundante.

Convención sobre configuración significa que el programador sólo necesita definir aquella configuración que no es convencional. Por ejemplo, si hay una clase Historia en el modelo, la tabla correspondiente de la base de datos es historias, pero si la tabla no sigue la convención (por ejemplo blogposts) debe ser especificada manualmente (set_table_name "blogposts"). Así, cuando se diseña una aplicación partiendo de cero sin una base de datos preexistente, el seguir las convenciones de Rails significa usar menos código (aunque el comportamiento puede ser configurado si el sistema debe ser compatible con un sistema heredado anterior)
',
        NULL,
        '2015-12-01 04:56:12'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('5',
        '24',
        'Modelo de Plablov',
        'Es modelo se refiere a los reacciones a los estímulos de la conducta humana, y se basa en cuatro conceptos centrales: implulsos, claves, respuestas y reacciones. Los impulsos, denominados necesidades o motivos, son los estímulos fuertes que incitan al individuo a actuar (hambre, sed, frío, dolor, sexo, etc). El impulso es general e induce a una reacción respecto a una confifuración de claves. La reacción es una respuesta del organismo ante l configuración de claves; si la respuestra ha sido agradable, se refuerza, disminuye su vigor y con el tiempo llega a extinguirse.La versión moderna de Pavlov no pretende presentar una teoría completa del comportamieto sino que ofrece algunas ideas originales sobre aspectos de la conducta. 
        El modelo de Pavlov proporciona guías que orientan en el campo de la estrategia publicitaria.
        Este modelo proporciona derectrices para la estrategia de las copias; un anuncio tiene que producir impulsos más fuertes relacionados con el producto; el anunciados tiene que explotar a forndo su tesoro de palabras, colores e imágenes para esos impulsos. 
        ',
        NULL,
        '2015-11-01 07:30:06'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('6',
        '12',
        'Acciones',
        'Una acción o acción ordinaria es un título emitido por una sociedad que representa el valor de una de las fracciones iguales en que se divide su capital social. Las acciones, generalmente, confieren a su titular, llamado accionista, derechos políticos, como el de voto en la junta de accionistas de la entidad, y económicos, como participar en los beneficios de la empresa.1
        Normalmente las acciones son transmisibles sin ninguna restricción, es decir, libremente.
        Como inversión, supone una inversión en renta variable, dado que no tiene un retorno fijo establecido por contrato, sino que depende de la buena marcha de la empresa.
',
        NULL,
        '2015-11-13 09:36:45'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('7',
        '2',
        'VPN',
        'Una red VPN (red privada virtual) es una red privada construida dentro de una infraestructura de red pública, como por ejemplo Internet. Las empresas pueden usar una red VPN para conectar de manera segura oficinas y usuarios remotos por medio de un acceso a Internet económico suministrado por un tercero, en lugar de a través de enlaces WAN dedicados o enlaces de acceso telefónico de larga distancia.

Las organizaciones pueden usar una red VPN para reducir sus costes de ancho de banda de WAN, a la vez que aumentan las velocidades de conexión al usar la conectividad a Internet de ancho de banda elevado, tales como DSL, Ethernet o cable.

Una red VPN proporciona el máximo nivel de seguridad posible a través de Seguridad IP cifrada (IPsec) o túneles VPN Secure Sockets Layer (SSL) y tecnologías de autenticación. Estas redes protegen los datos que se transmiten por VPN de un acceso no autorizado. Las empresas pueden aprovechar la infraestructura de Internet fácil de aprovisionar de la VPN, para añadir rápidamente nuevos emplazamientos y usuarios. También pueden aumentar enormemente el alcance de la red VPN sin ampliar la infraestructura de forma significativa.
',
        NULL,
        '2015-11-29 11:33:46'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('1',
        '3',
        'Playa',
        'Playa es un concepto que proviene del latín tardío plagia y que hace referencia a la ribera del mar, un río u otro curso de agua de importantes dimensiones. El término se utiliza, por extensión, para nombrar a las ciudades balnearias, generalmente en un contexto relacionado con las vacaciones que se llevan a cabo con el plan de disfrutar del mar y el sol.

Por ejemplo: “Las playas de México están entre las más bonitas del mundo”, “Rusia tiene playas muy extensas, pero las bajas temperaturas hacen que bañarse en el mar sea casi imposible”, “Este año voy a la playa, y el año que viene, elegiré la montaña”, “Mi sueño es conocer las playas del Caribe”.
',
        NULL,
        '2015-12-06 12:11:10'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('3',
        '25',
        'XML',
        'XML, siglas en inglés de eXtensible Markup Language (lenguaje de marcas extensible), es un lenguaje de marcas desarrollado por el World Wide Web Consortium (W3C) utilizado para almacenar datos en forma legible. Proviene del lenguaje SGML y permite definir la gramática de lenguajes específicos (de la misma manera que HTML es a su vez un lenguaje definido por SGML) para estructurar documentos grandes. A diferencia de otros lenguajes, XML da soporte a bases de datos, siendo útil cuando varias aplicaciones deben comunicarse entre sí o integrar información.1

XML no ha nacido sólo para su aplicación para Internet, sino que se propone como un estándar para el intercambio de información estructurada entre diferentes plataformas. Se puede usar en bases de datos, editores de texto, hojas de cálculo y casi cualquier cosa imaginable.

XML es una tecnología sencilla que tiene a su alrededor otras que la complementan y la hacen mucho más grande y con unas posibilidades mucho mayores. Tiene un papel muy importante en la actualidad ya que permite la compatibilidad entre sistemas para compartir la información de una manera segura, fiable y fácil.
',
        NULL,
        '2015-12-02 04:55:31'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('3',
        '9',
        '¿Que es la depresion?',
        'La depresión (del latín depressio, que significa ‘opresión’, ‘encogimiento’ o ‘abatimiento’) es el diagnóstico psiquiátrico que describe un trastorno del estado de ánimo, transitorio o permanente, caracterizado por sentimientos de abatimiento, infelicidad y culpabilidad, además de provocar una incapacidad total o parcial para disfrutar de las cosas y de los acontecimientos de la vida cotidiana (anhedonia). Los trastornos depresivos pueden estar, en mayor o menor grado, acompañados de ansiedad.

El término médico hace referencia a un síndrome o conjunto de síntomas que afectan principalmente a la esfera afectiva: como es la tristeza constante, decaimiento, irritabilidad, sensación de malestar, impotencia, frustración a la vida y puede disminuir el rendimiento en el trabajo o limitar la actividad vital habitual, independientemente de que su causa sea conocida o desconocida. Aunque ése es el núcleo principal de síntomas, la depresión también puede expresarse a través de afecciones de tipo cognitivo, volitivo o incluso somático. En la mayor parte de los casos, el diagnóstico es clínico, aunque debe diferenciarse de cuadros de expresión parecida, como los trastornos de ansiedad. La persona aquejada de depresión puede no vivenciar tristeza, sino pérdida de interés e incapacidad para disfrutar las actividades lúdicas habituales, así como una vivencia poco motivadora y más lenta del transcurso del tiempo.

El origen de la depresión es multifactorial. En su aparición influyen factores biológicos, genéticos y psicosociales. La Psico-Neuro-Inmunología plantea un puente entre los enfoques estrictamente biológicos y psicológicos.1

Diversos factores ambientales aumentan el riesgo de padecer depresión, tales como factores de estrés psicosocial, mala alimentación, permeabilidad intestinal aumentada, intolerancias alimentarias, inactividad física, obesidad, tabaquismo, atopia, enfermedades periodontales, sueño y deficiencia de vitamina D.1 2

Entre los factores psicosociales destacan el estrés y ciertos sentimientos negativos (derivados de una decepción sentimental, la contemplación o vivencia de un accidente, asesinato o tragedia, el trastorno por malas noticias, pena, contexto social, aspectos de la personalidad, el haber atravesado una experiencia cercana a la muerte) o una elaboración inadecuada del duelo (por la muerte de un ser querido).
',
        NULL,
        '2015-11-25 08:15:36'
);



-- INSERT URIEL --

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('3', '31',
        'La traición: el lado oscuro que signó la historia de la especie humana',
        '¿Fue la traición un elemento indispensable para la propagación de la especie humana en el mundo? 
Al menos eso indica una reciente investigación de arqueólogos de la Universidad de York, Reino Unido.
El artículo publicado por la revista Open Cuaternary propone que el cambio de velocidad a la que los humanos pasaron a desplazarse por el planeta hace unos 100.000 años se puede haber debido a alteraciones en el intercambio 
emocional de las relaciones humanas. 
Hasta entonces, todas las migraciones habían sido determinadas por eventos ambientales causados por cambios demográficos o ecológicos. 
Algo cambió hace 100.000 años… Para Penny Spikins, autora principal de la investigación, fue cuando los compromisos vinculares se volvieron vitales para la supervivencia, y se desarrollaron 
técnicas para identificar y castigar a quienes los rompieran; de esta manera, los conflictos morales, la falta de confianza y el sentido de traición crearon la necesidad de tomar distancia de los rivales.
        Esto, más que cualquier cambio ambiental, propició la gran velocidad a la que los humanos comenzaron a viajar por todos los 
        rincones del mudo, superando barreras geográficas de todo tipo. Fueron las deslealtades las que habrían llevado a los humanos 
        a dispersarse por entornos incluso poco acogedores: para evitar a antiguos amigos o aliados descontentos. “Aunque vemos en la
        dispersión mundial de nuestra especie un símbolo de nuestro éxito”, concluye Spikins, “parte de las motivaciones de esta 
        dispersión reflejan en realidad un lado más oscuro, aunque no menos "colaborativo", de la humanidad”.',
        'ImagenesContenidos/historia.jpg',
        '2015-12-09 22:31:36'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('1', '7',
        'Se descubre la estructura química del ADN',
        'Un día como hoy en 1953 los científicos de la Universidad de Cambridge James D. Watson y Frances H.C. Crick anunciaban el
        descubrimiento de la estructura de doble hélice del ADN. El ácido desoxirribonucleico, conocido como ADN, fue descubierto en 1869,
        pero recién en 1943 se demostró su rol clave en la determinación de la herencia genética. En la década de 1950, muchos científicos 
        intentaron averiguar la estructura de esta molécula, entre ellos el químico californiano Linus Pauling, quien propuso un modelo 
        incorrecto a comienzos de 1953. En la mañana del 28 de febrero de ese año, Watson y Crick determinaron que la estructura del ADN es 
        un polímero de doble hélice o una espiral de dos hebras enrolladas entre sí, cada una de ellas conteniendo una larga cadena de nucleótidos. <br>
        El descubrimiento de Watson y Crick fue anunciado oficialmente el 25 de abril de 1953, con la publicación de su artículo en la revista Nature. <br>
        A partir de allí se sucedieron numerosos e importantes avances en el estudio de la biología y la medicina, entre ellos los alimentos genéticamente
        modificados, el diseño de tratamientos para enfermedades tales como el SIDA y la capacidad de detectar enfermedades hereditarias. ',
        'ImagenesContenidos/quimica.jpg',
        '2015-09-03 22:41:28'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('2', '6',
        'STEPHEN HAWKING <br> Se destaca en: Física',
        'Stephen Hawking es un renombrado físico y cosmólogo inglés. Se lo reconoce como el heredero de Albert Einstein y una de las mentes más 
        brillantes de la historia. Stephen William Hawking nació en Oxford el 8 de enero de 1942. Tras una infancianormal, en la que comenzaba 
        a dar muestras de su brillantez, ingresó en 1959 en la “Universidad de Oxford”, de donde se graduó en Física en 1962. En aquel tiempo, 
        Hawking reparó en que se había vuelto más torpe y físicamente débil. A principios de 1963, le fue diagnosticada una enfermedad neuronal 
        motora: “Esclerosis Lateral Amiotrófica” o enfermedad de “Lou Gehrig”.<br>
        Su estado se deterioró rápidamente y los médicos le pronosticaron que no viviría más de dos o tres años. Noobstante, según declaraciones 
        del propio Hawking, nunca se había sentido más feliz y con ánimo de vivir. Es uno de los muy raros casos de pacientes con esta enfermedad 
        que han logrado tener una vida larga, aunque su movilidad se ha visto muy limitada con el tiempo, llegando a ser prácticamente nula al día 
        de hoy.Tras terminar su doctorado en 1966, Hawking se trasladó a Cambridge, en donde se unió al Departamento de Matemáticas Aplicadas y 
        Física Teórica. Fue Profesor de Física Gravitacional en 1977, y, en 1979, fue nombrado Catedrático Lucasiano de Matemáticas, la histórica 
        cátedra de Isaac Newton en Cambridge. Desde 1970, Hawking empezó a aplicar sus ideas previas al estudio de los agujeros negros y descubrió
        una propiedad notable: usando la Teoría Cuántica y la Relatividad General, fue capaz de demostrar que los agujeros negros pueden emitir 
        radiación. El éxito al confirmarlo, le hizo trabajar a partir de aquel momento en la unificación de ambas, la relatividad general y la 
        teoría cuántica. En 1971 investigó la creación del Universo y, más tarde, presentaría varios teoremas con el matemático Roger Penrose, 
        demostrando que la teoría general de la relatividad implicaba que el espacio-tiempo tendría un comienzo en la explosión del Big Bang y un 
        final en los agujeros negros.<br>
		En 1985, Hawking sufrió una grave pulmonía, lo que, aunado a su problema de esclerosis, puso en serio riesgo su vida. Finalmente una 
        traqueotomía de urgencia le salvó la vida pero, como consecuencia, perdió definitivamente la voz. Desde entonces, se vio obligado a utilizar
        un sistema informático para tener una voz electrónica. En 1988 publicó Breve Historia del Tiempo, un libro de divulgación científica que 
        venía escribiendo desde 1982. La obra explica varios temas de cosmología, entre otros el Big Bang, los agujeros negros, los conos de luz 
        y la teoría de super cuerdas al lector no especializado en el tema. El libro se convirtió en un Best Seller de inmediato, dio aconocer la
        obra de Hawking y lo convirtió en la personalidad más conocida del mundo científico. Sus libros de divulgación continuaron con Agujeros
        negros y pequeños universos y otros ensayos en 1993 y El Universo en una cáscara de nuez, en 2001, obteniendo nuevamente un enorme éxito 
        editorial.',
        'ImagenesContenidos/fisica.jpg',
        '2015-10-10 23:43:58'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('4', '32',
        'Dulces sueños, mamá <br> (Ich seh, Ich seh, Austria, 2014, 100 mins.)',
        'Director: Severin Fiala y Veronika Franz. Guión: Severin Fiala y Veronika Franz. F en C.: Martin Gschlacht. Música: Olga Neuwirth. 
        Edición: Michael Palm. Con: Susanne Wuest (la madre), Elias Schwarz (Elias), Lukas Schwarz  (Lukas), Elfriede Schatz 
        (la mujer de la Cruz Roja). . Productor: Ulrich Seidl. Distribuidora: Caníbal. Clasificación: B-15.<br>
		En una casa solitaria en el campo, entre bosques y terrenos de cultivo, viven Lukas y Elias, dos hermanos gemelos de nueve años de 
        edad que están esperando a su madre en medio del duro calor del verano. Cuando ella llega a casa con el rostro vendado, después de una 
        cirugía estética, nada parece ser como antes. En la opera prima de Veronika Franz (la guionista de cajón de Ulrich Seidl) y Severin Fiala 
        emerge una lucha existencial  que toca temas como la identidad y la confianza fundamental.',
        'ImagenesContenidos/cine.jpg',
        '2015-10-11 13:14:15'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('5', '32',
        'Colocarte el pelo detrás de la oreja con la mano, rascarte la nariz, frotarte un ojo o mover los dedos de los pies.',
        'Lo haces a menudo, incluso sin darte cuenta. Son gestos que haces de forma imediata para acomodarte o de forma involuntaria cuando 
        estás nervioso.<br>
		Parece algo tonto, pero para aquellos que sufren parálisis resulta imposible.<br>
		Pero pronto podría tener solución gracias a un traje robot que ha diseñado Miguerl Nicolelis, un neuroingeniero de la Universidad de Duke.<br>
		Cada pensamiento de nuestro cerebro lo dispara un conjunto de neuronas. Es como una "lluvia de ideas" que hay que desentrañar para codificar
        cada uno de nuestros movimientos, según explica Nicolelis a Wired. <br>
		Para ayudar a los afectados de parálisis, el laboratorio de Nicolelis ha desarrollado exosqueletos: trajes robot que traducen las señales
        eléctricas del cerebro del usuario en instrucciones mecánicas, es decir, en movimientos.<br>
		Esta idea no es nueva, pero está altamente perfeccionada. Los prototipos anteriores eran más aparatosos y parecían salidos de un manga 
        viejo de ciencia ficción.',
        'ImagenesContenidos/lenguaje2.jpg',
        '2015-01-28 18:14:54'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('1', '15',
        'Esculturas surrealistas de híbridos de animales y plantas, por Ellen Jewett.',
        'La artista Ellen Jewett crea hermosas esculturas surrealistas que mezclan formas de animales y plantas.<br>
		Describe su propio trabajo como "esculturas de historia natural surrealista".<br>
		Las esculturas tienen un aspecto casi anatómico y biológico, algo que se deriva en sus experiencias en antropología, 
        ilustración médica e incluso animación stop-motion.<br>
		Jewett se esfuerza mucho por conseguir una sensación "realista" en sus esculturas utilizando sólo materiales de origen 
        local y dejando pequeñas imperfecciones en su trabajo tales como marcas y huellas dactilares, con la esperanza de que esto 
        creará una mayor sensación de autenticidad.',
        'ImagenesContenidos/arte.jpg',
        '2015-01-28 18:14:54'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('1', '10',
        'Así es como una ciudad sueca subsistirá sin combustibles fósiles en 2030<br>',
        'Växjö pretende subsistir sin combustibles fósiles dentro de 15 años.<br>
        “Al final, el amor que te llevas es equivalente al amor que das”. Con esta cita de The End, de los Beatles, Bo Frank despide sus correos 
        electrónicos. El alcalde de Växjö, en Suecia, es fan acérrimo del grupo. Y tiene como objetivo que su ciudad subsista sin combustibles 
        fósiles en 2030.<br>
		Como una idea propuesta en 1991, Växjö se convirtió en la primera ciudad del mundo con tal pretensión. Fuera de dejarlo como una falsa
        promesa electoral, hoy en día siguen mejorando sus medidas para cumplir el objetivo en el plazo estipulado.<br>
		Frank tiene lo que él mismo define como una mentalidad beatle. Cuando entró en el gobierno hace más de 40 años, tenía la idea de aplicar 
        lo que narraban sus canciones. “Entonces yo era muy pesimista. Ni siquiera creía que viviríamos después del año 1984 —haciendo referencia 
        a la obra de George Orwell—. Pero ahora soy muy optimista. Sabemos qué hacer y tenemos las técnicas para hacerlo. Todo es cuestión de que 
        los políticos seamos lo suficientemente valientes como para tomar las decisiones adecuadas”, explica el alcalde de la ciudad.<br>
		El alcalde de Växjö es fan acérrimo de los Beatles y tiene como objetivo que su ciudad subsista sin combustibles fósiles en 2030.<br>
		Hasta el momento, sus decisiones le han llevado a construir una de las ciudades más sostenibles de Europa. El pasado año, la ciudad solo 
        produjo 2,4 toneladas de emisiones de CO2 por habitante, un número menor a otras metrópolis como Copenhague y que se ha reducido un 48% 
        desde que comenzaran a medir las cantidades en 1993.<br>
		Además, no es que haya sacrificado el crecimiento económico de la ciudad para conseguir tal objetivo. Entre 1993 y 2012, el PIB de Växjö 
        creció un 90%, un número envidiable conseguido a base de esfuerzo común.<br>
		“Cada ciudadano debe contribuir. No se puede culpar al resto y esperar que otros hagan algo. Hay que empezar con uno mismo: la forma en 
        cómo compras, cómo vives, cómo conduces, cómo usas el transporte, la calefacción y la electricidad”, comenta Frank sobre el secreto de su 
        éxito.<br>
		Desde que tienen 1 año, en Växjö enseñan a los niños a ordenar los residuos.<br>
		Para conseguir tal objetivo, en Växjö saben que la educación es básica. Desde que tienen 1 año, en la guardería enseñan a los niños a 
        ordenar los residuos. Además, organizan salidas frecuentes a los bosques cercanos para enseñar a los más pequeños a valorar la naturaleza.<br>
		El secreto de la producción de energía renovable en Växjö proviene de la biomasa. A través de una planta de energía de propiedad municipal, 
        transforman los residuos de madera de los bosques en electricidad para sus ciudadanos. Esto les permite, incluso, disponer de coches 
        eléctricos eléctricos que funcionan a través de este combustible.<br>
		“Estoy muy orgulloso de nuestros transportes eléctricos porque se producen a nivel local. Es la energía del medio ambiente” presume Frank.<br>
		Frank presentará su plan de energía delante de la ONU.<br>
		Bo Frank cree que Växjö es la ciudad perfecta que los Beatles soñaron. “He aplicado la ideología de sus canciones a mi manera de ser y de 
        hacer política”, cuenta el alcalde de una de las ciudades más sostenibles del planeta.
		En la próxima conferencia climática de ONU en París, Frank promoverá su ciudad con la llamada “Declaración de Växjö”. Con la intención de 
        hacer un llamamiento a las autoridades locales europeas para que apliquen sus ideas de utilizar energías renovables, hará gigante a una 
        ciudad de 60.000 habitantes.<br>',
        'ImagenesContenidos/arquitectura.jpg',
        '2015-03-29 15:30:54'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('1', '10',
        'Si hablamos de ciudades limpias, ¿estamos más cerca de Pekín o de Växjö? ',
        'Madrid se despertaba esta semana con una amenaza recurrente: nivel 1 de alerta por contaminación. No es la primera vez que la principal 
        ciudad de España está cubierta de una masa de humo que la acerca más a Pekín que a las ciudades del norte de Europa a las que quiere 
        parecerse.<br>
		¿Y qué significa el nivel 1? Que la velocidad quedaba limitada a 70 kilómetros por hora en el anillo que rodea a la ciudad y que se 
        restringía el tráfico en algunas zonas.<br>
		Y no, no era una medida para provocar atascos mayúsculos ni quejas gratuitas de cuñaos contra la alcaldesa: se trataba de una medida 
        contra el cambio climático dentro de las que están adoptando las ciudades españolas, al igual que muchas otras en el mundo.<br>
		Llegar tarde un día al trabajo puede ser algo molesto, pero tener que ponerse una mascarilla, respirar aire contaminado o, ya a escala 
        global, pensar en una migración masiva por las alteraciones del clima, será algo mucho más desagradable.<br>
		La cumbre del clima de París, el COP21, trazará en las próximas dos semanas compromisos atrevidos para aliviar los efectos del calentamiento
        global y tratar de mantener el techo de este hasta un máximo de 2 grados. Y para evitar la catástrofe las ciudades tienen que ponerse las 
        pilas.<br>
        Ajustes como el de esta semana en Madrid, que incluso pueden llegar a la prohibición de circulación para coches pares o impares, se están 
        viendo en las principales ciudades españolas. Con la llegada de los nuevos alcaldes, la lucha contra el cambio climático y la disminución 
        de las emisiones se ha convertido en un asunto prioritario.<br>
		Para Mariano González, responsable de campañas de energía y clima de Greenpeace España, las principales ciudades aún “están haciendo 
        bastante poco” para combatir el cambio climático. Sin embargo, él celebra y ve con optimismo las medidas que los nuevos gobiernos de Madrid 
        y Barcelona están aplicando.<br>
		“Se están haciendo cosas puntuales y estos gobiernos llevan apenas desde mayo. Hay que esperar a que se apliquen los planes”, 
        dice González.<br>
		Los planes medioambientales siempre han tenido una prioridad secundaria<br>
		Los planes de medioambiente y para combatir al cambio climático no son ninguna novedad. González señala que siempre se han quedado en 
        papel mojado por falta de voluntad política en el momento de establecer plazos inflexibles y asignar presupuesto. "Cuando se aplica un 
        plan de austeridad siempre se va rápido y se ejecuta de manera impecable. Cuando se trata de un tema de medioambiente, siempre se piden 
        prórrogas", asegura.<br><br>
		Lo que las ciudades pueden hacer<br>
		El decálogo de Gonzlález para que una ciudad y sus habitantes comiencen a aportar su grano de arena en la lucha contra el cambio climático 
        es:<br>
		-Un plan urbanístico que no refuerce la dispersión para evitar ampliar el volumen de desplazamiento.<br>
		-Un plan de movilidad que priorice el transporte limpio y minimice el uso de coches y vehículos que emiten gases contaminantes.<br>
		-Un plan de ahorro y eficiencia energética, con promoción de energías renovables y del autoconsumo.<br>
		-Un plan de gestión de residuos, que se oriente hacia el reciclaje y la recogida puerta a puerta.<br><br>
		Los ciudadanos tienen mucho poder en evitar escenarios adversos por culpa del cambio climático<br>
		Ambas ciudades han dado pasos en cada una de estas líneas, pero aún queda mucho por hacer. Para él, hay ejemplos de ciudad que están 
        adoptando verdaderas medidas para luchar contra el cambio climático, como Oslo o Hamburgo, con planes para eliminar totalmente la 
        circulación de coches en un plazo de 20 años.<br>
		“El principal problema con ciudades como Madrid o Barcelona es que en los últimos 50 años se han basado en un modelo urbanístico 
        precisamente para los que ahora se quejan de las medidas contra la contaminación: son ciudades que han girado en torno al varón de entre 
        35 y 50 años, con coche. Pero hay mucha más gente que acoge estas medidas de manera positiva”.<br>
		Para González, estamos en un momento en el que parece que “se ha superado el negacionismo” del cambio climático y que la sociedad está 
        mucho más concienciada, aunque el papel de la gente de a pie sigue siendo crucial: “Los ciudadanos tienen mucho poder en evitar escenarios 
        adversos por culpa del cambio climático. Tiene que afrontarse de abajo a arriba, y de arriba a abajo”, añade.<br>
		Un plan con 800 entidades locales<br>
        Barcelona, de hecho, presenta en París su plan contra el cambio climático elaborado a partir de la coordinación del ayuntamiento con 
        800 entidades locales, después de años de conversaciones.<br>
		El cambio climático amenaza con traer fenómenos naturales incontrolables y situaciones completamente distintas a las que conocemos.<br>
        No obstante, González descarta que las ciudades españolas vayan a enfrentarse a escenarios catastróficos.<br>
		“Ahora mismo en Madrid ya mueren 3.000 personas al año de manera prematura por los efectos de la contaminación, y en todo el Estado 30.000. 
        No hace falta imaginarse un escenario apocalíptico”, asegura.<br>
		Cada año mueren 3.000 personas al año en Madrid de forma prematura a causa de la contaminación, y en todo el país 30.000. No hace falta 
        imagianrse un escenario apocalíptico<br>',
        'ImagenesContenidos/ecologia.jpg',
        '2015-01-28 18:14:54'
);


INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('5', '9',
        '¿Te gusta compartir frases profundas en redes sociales? Estudio sugiere que tienes poca inteligencia?',
        'Según una reciente investigación de una universidad canadiense, compartir frases pseudotrascendentales en Facebook denota menores 
        capacidades cognitivas<br><br>
		Históricamente, la retórica autosuperacional ha generado severos cuestionamientos. Una mezcla entre pretensión, cursilería y ego 
        disfrazado de evolución personal sustentan buena parte de las críticas ante este recurso. Sin embargo, con la masificación de las 
        redes sociales en los últimos años, el flujo de mensajes autosuperacionales, neomísticos, cuasi espirituales y demás ha alcanzado 
        niveles inéditos de intensificación.<br>
        Un estudio de la Universidad de Waterloo en Canadá determinó que aquellos usuarios que acostumbran publicar mensajes de superación e 
        inspiración melosa en Facebook denotaron ser en promedio menos reflexivos y carecer de ciertas habilidades cognitivas, por ejemplo fluidez 
        verbal. En pocas palabras, es como si este hábito (por cierto, muy popular y en el cual hemos caído, al menos intermitentemente, la mayoría 
        de nosotros) apela a una comodidad mental y semántica. Además, de acuerdo con las pruebas a las que fueron expuestos los participantes, 
        aquellos usuarios que gustan de publicar frases pseudotrascendentales en Facebook también demostraron una pobre capacidad para detectar 
        frases inconexas o con nulo sentido mientras éstas dieran la apariencia de estar refiriendo a algo importante.<br>
		La “espiritualidad pop” es un fenómeno que se ha caracterizado no sólo por incorporar esta veta tan distintiva del new age que combina, 
        a veces irresponsablemente, preceptos de diversas tradiciones místicas para acuñar modelos adaptados a las necesidades contemporáneas de 
        la sociedad; también conlleva una alta dosis de retórica autosuperacional, práctica que apunta a cuestiones cotidianas y en muchos casos 
        poco trascendentales, como alcanzar una mayor productividad o mistificar ciertas inercias consumistas.<br>
		En todo caso, sin duda esta investigación, sin olvidar que como cualquier otro estudio es insuficiente, representa un duro golpe al discurso
        new age tan popular en las redes sociales, sobre todo en Facebook, ya que nos invita a reflexionar de forma auténtica (algo a lo que 
        aparentemente le rehuyen un buen número de usuarios) sobre cuál es el discurso que queremos proyectar, cuál es su relación o sintonía con 
        nuestros actos y si esta comodidad inspiracional realmente tiene un sentido benéfico para nosotros y para nuestros “amigos”.<br>
		Estas superficialidades son un aspecto inherente a la condición humana. Utilizar vaguedades e ideas ambiguas para esconder un sinsentido 
        es algo común en el discurso político, el marketing e incluso el mundo académico, aunque todos echamos mano de ello en alguna medida.',
        'ImagenesContenidos/psicologia.jpg',
        '2015-01-15 09:14:54'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('1', '16',
        'Glosario del encantamiento de la Tierra: una colección de palabras perdidas para describir la naturaleza.',
        'No sólo debemos proteger la naturaleza, también las palabras que la describen en todos sus detalles y esplendores, 
        muchas de las cuales se encuentran en vías de extinción <br><br>
		El lenguaje es una forma de ver el mundo. A veces sólo si conocemos ciertas palabras podemos ver otras tantas cosas, 
        de otra forma permanecen ocultas o la riqueza de sus detalles y significados no lograría iluminarnos. Hace unos años, 
        por ejemplo, un estudio mostró que las personas que hablan ruso son capaces de percibir más matices de azules, aparentemente 
        debido a que su lengua tiene más palabras para describir este color. Las palabras son una suerte de sentidos prostéticos que a 
        veces amplifican el espectro de la realidad. (Abusar de nuestra dependencia para experimentar el mundo a través del lenguaje seguramente 
        tiene el efecto contrario: amputa nuestra percepción, encadenando a lo meramente verbal).<br>
		En este espíritu, el naturalista británico Robert Macfarlane ha compilado lo que llama “un glosario del encantamiento de toda la Tierra”, 
        una definición un poco ambiciosa, pero que sin embargo delata un delicioso dejo poético. Se trata de una colección de palabras de más de 
        30 dialectos utilizadas para describir aspectos de la naturaleza que han caído en desuso o que no han sido integradas al inglés –más de 
        10 mil ya se habrían perdido, según sus cálculos. Generalmente son términos de una especialización silvestre, que describen los detalles, 
        las variedades, las intensidades y las sensaciones que generan ciertos fenómenos naturales. Evidentemente en las islas británicas hay una 
        profusión de términos para describir la lluvia. Más palabras para decir la lluvia significa también más y más ricas formas de entender la 
        lluvia y de experimentarla. Un amplio vocabulario de naturaleza es una hiperestesia de la naturaleza.<br>
		La BBC destaca algunas palabras del catalogo de protección de Macfarlane: “zawn” es córnico para un desfiladero que da al mar y en el que 
        truenan olas vehementes; “rionnach maoim” es gaélico para “las sombras que proyectan las nubes sobre un páramo en un día de mucho viento”. 
        La labor no es sólo de campo, también busca encontrar términos acuñados por poetas o geólogos. La primera estrella de la noche es la 
        “lámpara del pastor”, según el poeta John Clare; “heavengravel” (grava del cielo) es el granizo, según Gerard Manley Hopkins.<br> 
		El léxico de la lluvia es especialmente lírico. “Virga” es gaélico para “racha de precipitación que cae de una nube y que se evapora antes 
        de tocar el suelo”; “neum-sléibhe” es “torrente súbito provocado por una nube de trueno”; “smirr” es “una lluvia muy fina, parecida al 
        humo en apariencia cuando se observa desde lejos”; “burraglas” es una “lluvia torrencial de furia brutal” (la fonética lo dice bien); 
        “letty” es “tanta lluvia que hace el trabajo al exterior difícil”; y así varias más. Como la lluvia ante un sol despiadado, estas palabras 
        –estos sistemas de percepción– están en peligro de extinción. Y, como vemos, lo que tenemos aquí es también una historia de la percepción 
        humana, de cómo hemos alcanzado a mirar la naturaleza.<br>
		No sólo es una cuestión de poesía, según Macfarlane se trata también de precisión. Si utilizamos términos genéricos como “campo”, “bosque”
        o”colina” operamos con “un lenguaje empobrecido” y nos perdemos “de los detalles y las particularidades”. Pensándolo bien, sí se trata 
        también de una cuestión de poesía, en el detalle está la poesía. Imagina no sólo ver las preciosas perlas de rocío en el amanecer, sino 
        saber distinguirlas y tener palabras para diferenciar el tipo de rocío –ya sea que tenga una relación con ciertas plantas (el rocío en el 
        pistilo de un diente de léon) o que pueda explicarse por su temporada, su temperatura, su estado de condensación o si está reflejando la 
        luz del Sol. Es un ejemplo quizás un poco precipitado, pero así habría miles de aspectos de la naturaleza que podríamos alcanzar a percibir 
        y enriquecer si los estudiamos y encontramos las palabras.<br>
		Macfarlane cuenta cómo su hijo lo inspiró a acuñar neologismos para aspectos aún no reconocidos de la naturaleza y su renovación perenne. 
        Su hijo le sugirió llamar “currentbum” a “la protuberancia de agua brillante que emerge sobre una peña sumergida en un río”. Este ejercicio 
        ha sido emulado por otras personas con las que mantiene una red de correspondencia para hacer una especie de anatomía oculta del cuerpo de 
        la Tierra.<br><br>
		La labor no sólo tiene una intención diletante, es sobre todo un llamado a la acción y a la transformación de la conciencia a través del 
        reconocimiento que otorga el lenguaje. Macfarlane cree que rescatar y poner en circulación estas palabras cumple una función importante, 
        puesto que nos versa en el lenguaje de la naturaleza y nos incrusta en un diálogo con y sobre la naturaleza. Incrementar nuestro vocabulario 
        de la naturaleza “nos ayudaría a escuchar”. Esta es una noción importante; a diferencia de lo que pensaba Sartre 
        (que la naturaleza era muda), para los oídos sensibles la tierra es una polifonía: estas palabras son de alguna manera las traducciones 
        del lenguaje de la naturaleza, realizadas por aquellas personas más sensibles que alcanzan a percibir los matices y los tonos secretos de 
        la gran matriz telúrica. Al final, el proceso de descubrir el cuerpo de la tierra con las herramientas del lenguaje tiene la feliz 
        consecuencia de enramarnos (y enamorarnos), de descubrir un cuerpo más vasto, un tejido físico y literario que nos envuelve. Tal vez 
        trasponer los límites que nos separan en el sentido de la frase de Wittgenstein de que “Los límites de mi lenguaje son los límites de 
        mi mundo”. Macfarlane recalca que al conferirle un nombre, estamos también dotando a la naturaleza de una identidad, una identidad que 
        nos llama a respetarla en todo su esplendor personal (y con la que podemos tener un intercambio más profundo). Es cuando apreciamos los
        detalles de la naturaleza que la dejamos de ver como una gran masa inerte y nos abrimos a la posibilidad de defenderla.<br>
		Sería estupendo crear una red para poder compilar estas palabras perdidas también en nuestros países, rescatando una forma de ver el mundo 
        tan propia de las culturas indígenas, cuya vida estaba tan estrechamente vinculada con la naturaleza. Una Wild Word Web. Si conoces algunas,
        empecemos aquí.',
        'ImagenesContenidos/literaturaUno.jpg',
        '2015-05-29 20:14:34'
);

INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('6', '9',
        '7 consejos para manejar un buen lenguaje corporal ',
        'Toda relación de poder supone una coacción, y algunas pueden ser incluso un caso extremo, como el personaje interpretado por Kevin 
        Spacey en la película Swimming with Sharks (El factor sorpresa), donde un jefe insufrible termina siendo secuestrado por su subordinado.<br><br>
		Es posible evitar esos extremos de forma muy sencilla. De acuerdo con Teresa Amabile, profesora de la Escuela de Negocios de Harvard, 
        es cuestión de adoptar estrategias capaces de mostrar el lado más apacible del líder sin denostar su autoridad.<br><br>
		Amabile aconseja mandar las señales correctas a través de un lenguaje físico imponente:
		Un fuerte apretón de manos<br>
		Mantener siempre una postura erecta<br>
		Dominar el espacio (aprovechándolo de forma semejante a las dinámicas exposiciones de Steve Jobs)<br>
		Mantener contacto visual<br>
		Sincronizar los movimientos<br>
		Asentir con la cabeza<br>
		Sonreír<br><br>
		Las características anteriores permiten mostrar un mayor dominio y compostura ante cualquier situación sin violentar el lugar del otro. 
        Asimismo, el lenguaje físico es básico en cualquier interacción social y, si ésta se encuentra atravesada por la lógica del poder, lo mejor 
        que puede hacer cualquier figura de autoridad es practicar las sugerencias de Amabile para hacer el ambiente laboral no sólo más saludable, 
        sino también más productivo.<br>',
        'ImagenesContenidos/lenguaje.jpg',
        '2015-01-28 18:14:54'
);


INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('1', '9',
		'10 errores del lenguaje corporal que pueden costarte caro en una entrevista de trabajo',
        'El lenguaje no verbal es más importante de lo que creemos… <br><br>
        Las expresiones faciales, la postura y los gestos, entre otras características físicas, pueden revelar mucho más que las palabras; 
        para el observador atento develan nuestros pensamientos, intenciones y sentimientos. Sabemos muy bien cuando alguien se siente mal 
        físicamente, porque adopta una postura encorvada y cambia sus gestos faciales.<br><br>
		Según la compañía CareerBuilder, abocada a la búsqueda de empleos vía digital, el lenguaje corporal es extremadamente importante e 
        "indica el nivel de profesionalismo del candidato y si éste encaja para el trabajo", es más, dentro de los 5 primeros minutos de la 
        entrevista, el empleador ya es capaz de decir si el candidato encaja en el puesto. Para el minuto 15 de la entrevista, el empleador 
        ya está 90% seguro de su opinión sobre el candidato. CareerBuilding concluyó un estudio sobre lenguaje corporal y trabajo, usando 
        información generada en más de 2 mil entrevistas de trabajo, para llegar a lo siguiente:<br><br>
		Existen 10 errores muy frecuentes a la hora de una entrevista, y no tienen que ver con palabras ni razonamientos, son errores silenciosos, 
        errores del cuerpo humano.<br><br>
		Esta es la lista:<br><br>
		1. No hacer contacto visual<br>
		Dicen que los ojos no mienten: una persona que no tiene la capacidad de mirar a los ojos a otra aparece como alguien sospechoso, 
        en quien no se puede confiar.<br><br>
		2. No sonreír<br>
		La sonrisa también es un espejo del alma, evoca relajación, confianza en sí, optimismo y buena disposición. Aunque cuidado, 
        también puede evocar poca seriedad, cinismo y sarcasmo, así que sonrisa con moderación.<br>
		3. Estar jugando con algún objeto a lo largo de la entrevista<br>
		Estar ocupado en algo más sugiere poca concentración en la entrevista, además de que interfiere con el contacto visual.<br><br>
		4. Tener mala postura<br>
		Una mala colocación corporal, como estar encorvado o semiacostado en la silla puede sugerir desinterés, aburrimiento, poca confianza en sí 
        y poca disciplina.<br><br>
		5. Moverse constantemente al estar sentado<br>
		Estar en constante movimiento denota hiperactividad, mente disipada y poca concentración.<br><br>
		6. Cruzar los brazos sobre el pecho<br>
		Es una posición que podría denotar un comportamiento defensivo, dominante y agresivo. Como los intimidantes guardias de seguridad a 
        la entrada del antro.<br><br>
		7. Tocarse el cabello o la cara repetidamente<br>
		Son movimientos que pueden ser involuntarios y que denotan nerviosismo, además de que generan desconcentración.<br><br>
		8. Saludar de mano con debilidad<br>
		Un saludo débil denota eso mismo: debilidad, poca convicción, inseguridad.<br><br>
		9. Saludar de mano con excesiva fuerza<br>
		Un saludo tan fuerte que resulta doloroso puede percibirse como agresivo, invasivo y dominante.<br><br>
		10. Gesticular excesivamente<br>
		Abusar de los gestos con las manos y los brazos genera distracción.<br><br>
		Probablemente todos hemos cometido al menos siete de los 10 errores capitales en alguna entrevista. Así que, en lugar de concentrarnos en 
        lo malo, busquemos enfocarnos en los numerosos tips que los empleadores nos ofrecen para tener éxito en la tan temida entrevista:<br><br>
		• Práctica: es verdad, la práctica hace al maestro. Tendremos que pasar por varias entrevistas para poder aprender a manejarnos en tal 
        situación de estrés. Pero si anticipamos las cosas y preparamos un discurso organizado, podremos dominar el estrés como el surfer las olas.<br>
		• Video: la mejor manera para entender qué estamos haciendo mal o en qué momento trastabillamos es tomándonos un video y analizarlo a 
        detalle. Gracias a él descubriremos nuestros puntos débiles y los podremos convertir en puntos fuertes. Veámoslo como un tipo de ‘selfie 
        laboral’ con un buen propósito.<br>
		• Discurso relámpago: la mejor manera de convencer de que somos el candidato perfecto es tener un corto discurso bien justificado, 
        que representa la mejor respuesta a la típica pregunta: "cuéntame acerca de ti".<br>
		• Infórmate, infórmate: así como es clave conocer las noticias de nuestro día a día, es importantísimo averiguar la visión y la 
        misión de la compañía de tu interés, con el fin de justificar por qué te interesa, qué puedes aportar y cómo encajas en ella. 
        El hecho de que demuestres conocimiento en este ámbito habla de que eres una persona informada y responsable y que realmente te 
        interesa incorporarte. Es como llegar a la escuela habiendo hecho la tarea.<br>
		• Inhala y exhala: cuando estamos estresados dejamos de respirar, nuestro cuerpo se tensa y la energía no fluye como debiera. 
        El cuerpo necesita calma para que el cerebro se oxigene y trabaje al 100.<br>',
        'ImagenesContenidos/lenguaje2.jpg',
        '2015-03-21 21:10:14'
);


INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
VALUES ('1', '33',
        'Mexicanos generan modelo matemático para agilizar el tráfico en las ciudades.',
        'Analizando los patrones de movilidad urbana pueden crearse modelos para que las personas se muevan por ángulos estratégicos que 
        aligeren el tráfico<br><br>
        Los patrones, definidos como la repetición sistemática de sucesos, crean un referente matemático predecible. Los flujos de tránsito en 
        las ciudades repiten patrones muy similares. Aspectos como los horarios de oficina, que suelen ser homogéneos, o las avenidas o 
        intersecciones más accesibles y los  lugares más conectados que otros, hacen que la ciudad pueda analizarse estratégicamente.<br><br>
		Siguiendo los patrones de circulación es muy sencillo hacer predicciones; por ejemplo, los estados ambientales pueden entorpecer o 
        dinamizar el tránsito. Las matemáticas son una herramienta por demás útil para generar nuevos patrones. Si una caseta de boletos en 
        el metro está situada en un lugar estratégico es posible agilizar el tráfico. Igual sucede con el sitio exacto en el que un tren debe 
        pararse; es plausible hacer intersecciones y cálculos sobre geometrías que acoten los tiempos.<br><br>
		Cuando se analiza el flujo de tráfico de las ciudades a distintas horas, es sencillo acoplarlo para que responda a nuevas dinámicas. 
        Respondiendo a esta ventaja, un grupo de especialistas de la ciudad de México está haciendo un método matemático para agilizar el tráfico 
        en esta urbe:<br><br>
		A través de ese desarrollo matemático se logró establecer una base de conocimiento para realizar tomas de decisiones como el lugar 
        adecuado para colocar contenciones peatonales, los puntos más precisos para colocar máquinas expendedoras de boletos o estaciones de
        recarga, así como señalizaciones adecuadas para manipular el tráfico peatonal. Actualmente se ha transferido ese conocimiento al propio 
        Sistema de Transporte Colectivo.<br>
		(Joaquín Delgado Fernández,  investigador de la UAM-I)<br><br>
		El objetivo del  modelo también es incentivar el uso aplicado de las matemáticas desde una perspectiva cotidiana. Aunque las matemáticas 
        están en todos lados, se conciben poco en la cultura como una vía para solucionar problemas sociales cercanos. Si la realidad genera
        patrones matemáticos es posible modificar éstos con nuevas estructuras que arrojen resultados distintos, un juego por demás útil.<br><br>',
        'ImagenesContenidos/mate.jpg',
        '2015-01-28 18:14:54'
);







