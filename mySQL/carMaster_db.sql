use carmaster_db;

create table auto
(
    id int unsigned auto_increment primary key,
    carOwner_id int unsigned not null,
    brand varchar(50) not null,
    model varchar(50) not null,
    bodyType varchar(50) null,
    yearOfIssue year not null,
    engineCapacity decimal not null,
    winNumber char(17) not null,
    registrationNumber char(15) not null,
    carMileage int not null
);
alter table auto add column carOwner_id int unsigned not null after id;

insert into auto(brand, model, bodyType, yearOfIssue, engineCapacity, winNumber, registrationNumber, carMileage)
VALUES ("Honda", "Civic", "Sedan", 2008, 1.8, "NLAFD78908W350773", "KE5110AB", 165328);

create table carOwner
(
    id int unsigned auto_increment primary key,
    name varchar(50) not null,
    surname varchar(50) not null,
    fatherName varchar(50) null,
    telephoneNumber bigint not null
);

insert into carOwner (name, surname, telephoneNumber)
VALUES ("Alex", "Lesli", 380996548561);

alter table auto add
    FOREIGN KEY (carOwner_id) REFERENCES auto (id);

create table client
(
    id int unsigned auto_increment primary key,
    name varchar(50) not null,
    surname varchar(50) not null,
    fatherName varchar(50) null,
    telephoneNumber bigint not null,
    status varchar(50) not null
);
insert into client (name, surname, telephoneNumber, status)
VALUES ("Gusein", "Gasanov", 380506621589, "personal driver");

create table spareParts
(
    id int unsigned auto_increment primary key,
    name varchar(50) not null,
    partNumber int not null,
    $count tinyint not null,
    unitPrice mediumint not null
);
insert into spareParts (name, partNumber, $count, unitPrice)
VALUES ("cooling radiator", 2589647, 1, 3500);

create table workOrder
(
    id int unsigned auto_increment primary key,
    workOrderNumber int not null,
    serviceCode smallint not null,
    completedWork tinytext not null,
    numberOfStandardHours tinyint not null,
    gaveAwayTheCar varchar(100) not null,
    receivedTheCar int unsigned not null DEFAULT "Petrov V.P",
    auto_id int unsigned not null,
    carOwner_id int unsigned not null,
    spareParts_id int unsigned not null,
    FOREIGN KEY (receivedTheCar) references client (id),
    FOREIGN KEY (auto_id) references auto (id),
    FOREIGN KEY (carOwner_id) references carOwner (id),
    FOREIGN KEY (spareParts_id) references spareParts (id)
);
insert into workOrder (workOrderNumber, serviceCode, completedWork, numberOfStandardHours, receivedTheCar, auto_id, carOwner_id, spareParts_id)
VALUES (1234567890, 15, "cooling radiator replacement", 2, 1, 1, 1 ,1)
