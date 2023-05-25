CREATE DATABASE campusv2

CREATE TABLE campers(
    id INT primary key AUTO_INCREMENT,
    nombre VARCHAR (50) NOT NULL,
    direccion VARCHAR (50),
    logros VARCHAR (60),
    skills VARCHAR (50),
    ser VARCHAR (50),
    ingles VARCHAR (50),
    review VARCHAR (50)
);