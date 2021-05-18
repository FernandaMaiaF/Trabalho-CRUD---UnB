drop table if exists loja;
drop table if exists funcionarios;
drop table if exists tipo_produtos;
drop table if exists catalogo_produtos;
drop table if exists metodo_pagamento;
drop table if exists clientes;
drop table if exists vendas;
drop table if exists sexo_pet;
drop table if exists porte_pet;
drop table if exists raca_pet;
drop table if exists pet;
drop table if exists servico;
drop table if exists convenio;
drop table if exists agendamento;
 
create schema bd_petshop;
use bd_petshop;

create table loja (
	ID integer unsigned primary key auto_increment,
    Nome varchar(65) not null,
    Endereco varchar(150) not null,
    Telefone integer,
    CNPJ varchar(35)
);

create table funcionarios (
	ID integer unsigned primary key auto_increment,
    Nome varchar(65) not null,
    Endereco varchar(150) not null,
    Telefone integer,
    IDLoja integer unsigned references loja(ID)
);

create table tipo_produtos (
	ID integer unsigned primary key auto_increment,
    Descricao varchar(150) not null
);

create table catalogo_produtos (
	ID integer unsigned primary key auto_increment,
    Descricao varchar(65) not null,
    IDTipo integer unsigned references tipo_produtos(ID),
    Quantidade integer not null,
    Preco float not null
);

create table metodo_pagamento (
	ID integer unsigned primary key auto_increment,
    Descricao varchar(20) not null
);

create table clientes (
	ID integer unsigned primary key auto_increment,
    Nascimento date not null,
    Nome varchar(150) not null,
    Endereco varchar(150) not null,
    CPF varchar(25) not null
);

create table telefone_cliente (
	IDCliente integer unsigned references clientes(ID),
    Telefone varchar(20) not null
);

create table vendas (
	ID integer unsigned primary key auto_increment,
    IDCliente integer unsigned references clientes(ID),
    IDMetodoPagamento integer unsigned references metodo_pagamento(ID),
    IDFuncionario integer unsigned references funcionarios(ID),
    IDProdutos integer unsigned references catalogo_produto(ID),
    IDServicos integer unsigned references servico(ID),
    Total float not null,
    DataVenda datetime not null
);

alter table vendas add Quantidade integer;

create table sexo_pet (
	ID integer unsigned primary key auto_increment,
    Descricao varchar(150) not null
);

create table porte_pet (
	ID integer unsigned primary key auto_increment,
    Descricao varchar(150) not null
);

create table raca_pet (
	ID integer unsigned primary key auto_increment,
    Descricao varchar(150) not null
);

create table pet (
	ID integer unsigned primary key auto_increment,
    IDono integer unsigned references clientes(ID),
    Nome varchar(150) not null,
    IDSexo integer unsigned references sexo_pet(ID),
    IDPorte integer unsigned references porte_pet(ID),
    IDRaca integer unsigned references raca_pet(ID)
);

create table servico(
	ID integer unsigned primary key auto_increment,
    IDCliente integer unsigned references clientes(ID),
	NomeServico varchar(150) not null,
    Valor float not null
);

create table convenio(
	ID integer unsigned primary key auto_increment,
    Nome varchar(150) not null,
    Desconto float not null
);

create table agendamento(
	ID integer unsigned primary key auto_increment,
    Dia date not null,
    Horario time not null,
	IDConvenio integer unsigned references convenio(ID),
    IDServico integer unsigned references servico(ID),
    IDDono integer unsigned references clientes(ID),
    IDPet integer unsigned references pet(ID),
    IDMetodoPag integer unsigned references metodo_pagamento(ID)
);

-- Adicionando as FK's
alter table agendamento add constraint fk_AgendamentoIDConvenio foreign key(IDConvenio) references convenio(ID);
alter table agendamento add constraint fk_AgendamentoIDServico foreign key(IDServico) references servico(ID);
alter table agendamento add constraint fk_AgendamentoIDCliente foreign key(IDDono) references clientes(ID);
alter table agendamento add constraint fk_AgendamentoIDPet foreign key(IDPet) references pet(ID);
alter table agendamento add constraint fk_AgendamentoIDMetPag foreign key(IDMetodoPag) references metodo_pagamento(ID);

alter table catalogo_produtos add constraint fk_CatalogoIDTipo foreign key(IDTipo) references tipo_produtos(ID);

alter table pet add constraint fk_PetIDSexo foreign key(IDSexo) references sexo_pet(ID);
alter table pet add constraint fk_PetIDPorte foreign key(IDPorte) references porte_pet(ID);
alter table pet add constraint fk_PetIDRaca foreign key(IDRaca) references raca_pet(ID);

alter table servico add constraint fk_ServicoIDCliente foreign key(IDCliente) references clientes(ID);

alter table telefone_cliente add constraint fk_TelefoneCliente foreign key(IDCliente) references clientes(ID);

alter table vendas add constraint fk_VendasIDCliente foreign key(IDCliente) references clientes(ID);
alter table vendas add constraint fk_VendasIDMetPag foreign key(IDMetodoPagamento) references metodo_pagamento(ID);
alter table vendas add constraint fk_VendasIDFuncionario foreign key(IDFuncionario) references funcionarios(ID);
alter table vendas add constraint fk_VendasIDProdutos foreign key(IDProdutos) references catalogo_produtos(ID);
alter table vendas add constraint fk_VendasIDServico foreign key(IDServicos) references servico(ID);

-- Inserindo registros 
insert into clientes (Nascimento,Nome,Endereco,CPF) values ("2000/04/25","Breno Eduardo", "Taguatinga-Centro", "123.456.789-01"); 
insert into clientes (Nascimento,Nome,Endereco,CPF) values ("1997/05/23","Clarice Bertoni", "Asa-Norte", "111.222.333-45");
insert into clientes (Nascimento,Nome,Endereco,CPF) values ("1999/07/15","Heber Fernandes", "Samambaia", "010.020.030-99");
insert into clientes (Nascimento,Nome,Endereco,CPF) values ("2001/10/11","Renato Trindade", "Sudoeste", "456.123.789-00");
insert into clientes (Nascimento,Nome,Endereco,CPF) values ("1979/11/02","Luiz Antonio", "Sobradinho 2", "987.654.321-88");

insert into telefone_cliente(IDCliente,Telefone) values (1,"61 98444-4179");
insert into telefone_cliente(IDCliente,Telefone) values (2,"61 99987-6710");
insert into telefone_cliente(IDCliente,Telefone) values (3,"61 98123-5100");
insert into telefone_cliente(IDCliente,Telefone) values (4,"61 98289-9090");
insert into telefone_cliente(IDCliente,Telefone) values (5,"61 91234-5678");

insert into sexo_pet (Descricao) values ("Macho");
insert into sexo_pet (Descricao) values ("Fêmea");

insert into porte_pet(Descricao) values ("Pequeno");
insert into porte_pet(Descricao) values ("Médio");
insert into porte_pet(Descricao) values ("Grande");

insert into raca_pet (Descricao) values ("Cachorro");
insert into raca_pet (Descricao) values ("Gato");
insert into raca_pet (Descricao) values ("Papagaio");
insert into raca_pet (Descricao) values ("Peixe");
insert into raca_pet (Descricao) values ("Hamster");
insert into raca_pet (Descricao) values ("Porquinho da India");
insert into raca_pet (Descricao) values ("Coelho");
insert into raca_pet (Descricao) values ("Pássaro");

insert into pet (IDono,Nome,IDSexo,IDPorte,IDRaca) values (1,"Taurus",1,3,1); 
insert into pet (IDono,Nome,IDSexo,IDPorte,IDRaca) values (2,"Nika",2,1,7); 
insert into pet (IDono,Nome,IDSexo,IDPorte,IDRaca) values (3,"Rakan",1,2,3); 
insert into pet (IDono,Nome,IDSexo,IDPorte,IDRaca) values (4,"Steve",1,1,4); 
insert into pet (IDono,Nome,IDSexo,IDPorte,IDRaca) values (5,"Livia",2,1,6); 
insert into pet (IDono,Nome,IDSexo,IDPorte,IDRaca) values (2,"Bela",2,2,2); 

insert into convenio (Nome,Desconto) values ("Fusex",20.00);
insert into convenio (Nome,Desconto) values ("Amil",15.00);
insert into convenio (Nome,Desconto) values ("Unimed",25.00);
insert into convenio (Nome,Desconto) values ("Bradesco Saude",20.00);
insert into convenio (Nome,Desconto) values ("Golden Cross",10.00);
insert into convenio (Nome,Desconto) values ("Nenhum",0);

insert into loja values (1, "Pet Mania", "Guara", 34658899, "70.123.567/0001-99");

insert into metodo_pagamento(Descricao) values ("Credito");
insert into metodo_pagamento(Descricao) values ("Debito");
insert into metodo_pagamento(Descricao) values ("Dinheiro");
insert into metodo_pagamento(Descricao) values ("Pix");
insert into metodo_pagamento(Descricao) values ("Boleto Bancario");

insert into funcionarios (Nome,Endereco,Telefone, IDLoja) values ("Fernando Abreu","Recantos das Emas", 987691156,1);
insert into funcionarios (Nome,Endereco,Telefone, IDLoja) values ("Silvania Gonçalves","Paranoa", 999876532,1);
insert into funcionarios (Nome,Endereco,Telefone, IDLoja) values ("Ricardo Borges","Cruzeiro", 982224356,1);
insert into funcionarios (Nome,Endereco,Telefone, IDLoja) values ("Rafael Souza","Ceilandia", 981213412,1);
insert into funcionarios (Nome,Endereco,Telefone, IDLoja) values ("Jefferson Duarte","Candangolandia", 998760843,1);

insert into servico (IDCliente, NomeServico,Valor) values (1,"Banho",35.00);
insert into servico (IDCliente, NomeServico,Valor) values (1,"Tosa",20.00);
insert into servico (IDCliente, NomeServico,Valor) values (2,"Banho",35.00);
insert into servico (IDCliente, NomeServico,Valor) values (3,"Consulta",70.00);
insert into servico (IDCliente, NomeServico,Valor) values (5,"Consulta",70.00);

insert into tipo_produtos(Descricao) values ("Racao");
insert into tipo_produtos(Descricao) values ("Brinquedos");
insert into tipo_produtos(Descricao) values ("Remédios");
insert into tipo_produtos(Descricao) values ("Casinhas");
insert into tipo_produtos(Descricao) values ("Petiscos");

insert into catalogo_produtos (Descricao, IDTipo,Quantidade,Preco) values ("Pedigree",1,123,95.80);
insert into catalogo_produtos (Descricao, IDTipo,Quantidade,Preco) values ("Royal Canin",1,99,69.90);
insert into catalogo_produtos (Descricao, IDTipo,Quantidade,Preco) values ("Golden",1,150,109.90);
insert into catalogo_produtos (Descricao, IDTipo,Quantidade,Preco) values ("Bolinha Mastigável",2,200,14.90);
insert into catalogo_produtos (Descricao, IDTipo,Quantidade,Preco) values ("Varinha Mágica",2,199,18.90);
insert into catalogo_produtos (Descricao, IDTipo,Quantidade,Preco) values ("Roda para exercitar roedores",2,50,10.00);
insert into catalogo_produtos (Descricao, IDTipo,Quantidade,Preco) values ("Toca para Hamster",4,30,59.90);
insert into catalogo_produtos (Descricao, IDTipo,Quantidade,Preco) values ("Casa com arranhador",4,27,110.00);
insert into catalogo_produtos (Descricao, IDTipo,Quantidade,Preco) values ("Aquario Stilus",4,10,100.90);
insert into catalogo_produtos (Descricao, IDTipo,Quantidade,Preco) values ("Petisco para roedores",5,179,20.00);
insert into catalogo_produtos (Descricao, IDTipo,Quantidade,Preco) values ("Bifinho",5,300,13.50);
insert into catalogo_produtos (Descricao, IDTipo,Quantidade,Preco) values ("Antipugas e Carrapatos NEOPet",3,50,32.90);

insert into agendamento (Dia,Horario,IDConvenio,IDServico,IDDono,IDPet,IDMetodoPag) values ('2021/05/13','15:00',6,1,1,1,2);
insert into agendamento (Dia,Horario,IDConvenio,IDServico,IDDono,IDPet,IDMetodoPag) values ('2021/05/13','15:00',6,2,1,1,2);
insert into agendamento (Dia,Horario,IDConvenio,IDServico,IDDono,IDPet,IDMetodoPag) values ('2021/05/14','11:00',1,3,2,2,4);
insert into agendamento (Dia,Horario,IDConvenio,IDServico,IDDono,IDPet,IDMetodoPag) values ('2021/05/17','14:30',2,4,3,3,1);
insert into agendamento (Dia,Horario,IDConvenio,IDServico,IDDono,IDPet,IDMetodoPag) values ('2021/05/13','15:00',3,5,5,5,3);

-- view
create view DonosEPets as
select clientes.Nome, pet.Nome as Bichano, sexo_pet.Descricao as Sexo, porte_pet.Descricao as Porte, raca_pet.Descricao as Raca
from clientes,pet,sexo_pet,porte_pet,raca_pet
where pet.IDono=clientes.ID and pet.IDSexo = sexo_pet.ID and pet.IDPorte = porte_pet.ID and pet.IDRaca = raca_pet.ID;
-- procedure
delimiter $$
create procedure DonosEBichanos ()
begin
	select clientes.Nome, pet.Nome as Bichano, sexo_pet.Descricao as Sexo, porte_pet.Descricao as Porte, raca_pet.Descricao as Raca
    from clientes,pet,sexo_pet,porte_pet,raca_pet
    where pet.IDono=clientes.ID and pet.IDSexo = sexo_pet.ID and pet.IDPorte = porte_pet.ID and pet.IDRaca = raca_pet.ID
;
end $$

-- insert binario
create table ArqvBin (ID_Blob int(10) not null primary key, Image mediumblob);
select *from  ArqvBin;
insert into arqvbin (ID_Blob, Image) values (1,"C:\Users\cgdb2\Pictures\Saved Pictures");