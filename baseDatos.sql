use ficha_juego;

create table usuariosFicha(
    id_usuarios int not null auto_increment,
    nombre_completo char(50) not null,
    correoelectronico char(50) not null,
    numerodetelefono char(50) not null,
    nombredeusuario char(50) not null,
    nombresdeequipos char(50) not null,
    identificadoresjuego char(50) not null,
    nombredeljuego char(50) not null,
    plataforma char(50) not null,
    cuentadejuego text not null,
    primary key (id_usuarios)
)