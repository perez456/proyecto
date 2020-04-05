create database login;
	use login;
	create table registros(
		nombre varchar (255) not null,
		apellido varchar (255) not null,
		documento varchar (255) not null,
		tipodocumento varchar (255) not null,
		direccion varchar (255) not null,
		telefono varchar (255) not null,
		email varchar (255) not null,
		password varchar (255) not null

		)Engine mysqli default charset=latin1;