use site_carlos;
create table contatus(
    id_cont  int not null primary key auto_increment,
    email varchar(64) not null,
    nome varchar(64) not null,
    fone varchar(15) not null
)


use site_carlos;
create table loginadm(
    login varchar(64) not null primary key,
    pass varchar(64) not null
)

use site_carlos;
INSERT INTO loginadm (login, pass) VALUES ('admin', SHA2('admin',256));

use site_carlos;
create table servico(
    id_serv int not null primary key auto_increment,
    nomepet varchar(64) not null,
    especie varchar(64) not null,
    porte varchar(64) not null,
    nomedono varchar(64) not null,
    fone varchar(64) not null,
    email varchar(64) not null,
    serv varchar(64) not null
)

