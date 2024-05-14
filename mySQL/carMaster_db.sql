use carmaster_db;

create table carOwner
(
    id int unsigned auto_increment primary key,
    name varchar(50) not null,
    surname varchar(50) not null,
    fatherName varchar(50) default null,
    telephoneNumber bigint not null
);
insert into carOwner (name, surname, telephoneNumber)
VALUES ("Alex", "Lesli", 380996548561),
       ("Ivan", "Durak", 380502254413);
insert into carOwner (name, surname, fatherName, telephoneNumber)
VALUES ("Tommy", "Hilfiger", "Vladimirovich", 380639874562),
       ("Misha", "Sosed", "Sverhu",380662693574);

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
alter table auto add
    FOREIGN KEY (carOwner_id) REFERENCES carOwner (id);
insert into auto(carOwner_id, brand, model, bodyType, yearOfIssue, engineCapacity, winNumber, registrationNumber, carMileage)
VALUES (1, "Honda", "Civic", "Sedan", 2008, 1.8, "NLAFD78908W350773", "KE5110AB", 165328),
       (3, "Mazda", "3", "Hatchback", 2010, 2.0, "MZRAG44589L212217", "KE3440ME", 201085),
       (3, "Mitsubishi", "Colt", "Hatchback", 2006, 1.3, "FGBNA7489C327655", "AE6190PE", 113570),
       (2, "Meno", "Regan", "Wagon", 2013, 1.5, "PTRKG1133M789456", "KA7865AB", 173008),
       (4, "Nissan", "Juke", "Crossover", 2015, 1.6, "VVTRDF7548Z369258", "KA1245MI", 99258),
       (2, "Chrysler", "Saratoga", "Sedan", 1989, 2.5, "MNBF6936R745246", "AE2020PE", 381231);

create table client
(
    id int unsigned auto_increment primary key,
    name varchar(50) not null,
    surname varchar(50) not null,
    fatherName varchar(50) default null,
    telephoneNumber bigint not null,
    status varchar(50) not null
);
insert into client (name, surname, telephoneNumber, status)
VALUES ("Gusein", "Gasanov", 380506621589, "Personal driver");

create table spareParts
(
    id int unsigned auto_increment primary key,
    name varchar(50) not null,
    partNumber int not null,
    count tinyint not null,
    unitPrice mediumint not null,
    totalMaterialPrice mediumint default (count * unitPrice)
);
insert into spareParts (name, partNumber, count, unitPrice)
VALUES ("Cooling radiator", 2589647, 1, 3500),
       ("Front left ball joint", 141516, 1, 987),
       ("front right ball joint", 141517, 1, 987);

# create table totalPrice
# (
#     id int unsigned auto_increment primary key,
#     standardHourPrice smallint unsigned not null default 600,
#     numbersOfStandardHours tinyint unsigned not null,
#     totalMaterialPrice int not null,
#     totalPrice int not null default standardHourPrice * numbersOfStandardHours + totalMaterialPrice,
#     FOREIGN KEY (numbersOfStandardHours) references workOrder (id, numbersOfStandardHours),
#     FOREIGN KEY (totalMaterialPrice) references spareParts (id, totalMaterialPrice)
# );

create table workOrder
(
    id int unsigned auto_increment primary key,
    workOrderNumber int not null,
    date timestamp,
    auto_id int unsigned not null,
    serviceCodes varchar(200) not null,
    spareParts_id int unsigned not null,
    completedWorks tinytext not null,
    numbersOfStandardHours tinyint not null,
    totalPrice mediumint unsigned not null,
    gaveAwayTheCar varchar(100) not null DEFAULT "Petrov V.P",
    receivedTheCar_id int unsigned not null,
    FOREIGN KEY (auto_id) references auto (id),
#     FOREIGN KEY (spareParts_id) references workOrder_spareParts (workOrder_id) ,
    FOREIGN KEY (receivedTheCar_id) references client (id)
);
insert into workOrder (workOrderNumber, date, auto_id, serviceCodes, spareParts_id, completedWorks, numbersOfStandardHours, totalPrice, receivedTheCar_id)
VALUES (1234567890, now(), 2, "1456, 1457", 1, "Replacing the front left ball joint, Replacing the front right ball joint, Replacing cooling radiator", 5, 7800, 1);

create table workOrder_spareParts
(
    workOrder_id int unsigned not null ,
    spareParts_id int unsigned not null
);
alter table workOrder_spareParts add foreign key (workOrder_id) references workOrder (id),
    add foreign key (spareParts_id) references spareParts (id);
insert into workOrder_spareParts (workOrder_id, spareParts_id)
VALUES (1, 1),
       (1, 2),
       (1, 3);

