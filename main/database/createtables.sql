drop SCHEMA web_career;
create database web_career;
use web_career;
SET FOREIGN_KEY_CHECKS = 0;

create table all_user
(
    user_name varchar(20),
    email     varchar(100),
    balance   int,
    password  varchar(200),
    last_payment datetime,
    primary key (user_name)
);
insert into all_user(user_name, email, balance, password)
values ('caren', 'c123en@hello.com',1000, '123');
insert into all_user(user_name, email, balance, password)
values ('carenloyee', 'c123ee@hello.com',1000,  '123');
insert into all_user(user_name, email, balance, password)
values ('rob', 'robs@hello.com', 1000, '123');
insert into all_user(user_name, email, balance, password)
values ('robloyee', 'robs@hello.com',1000,  '123');
insert into all_user(user_name, email, balance, password)
values ('moh', 'mohs@hello.com',1000,  '123');
insert into all_user(user_name, email, balance, password)
values ('mohloyee', 'mohs@hello.com',1000,  '123');
insert into all_user(user_name, email, balance, password)
values ('ahmed', 'ahmed@hello.com',1000,  '123');
insert into all_user(user_name, email, balance, password)
values ('rep1', 'rep1@hello.com',1000,  '123');
insert into all_user(user_name, email, balance, password)
values ('rep2', 'rep2@hello.com',1000,  '123');
insert into all_user(user_name, email, balance, password)
values ('rep3', 'rep2@hello.com',1000,  '123');


create table category
(
    c_name varchar(15),
    primary key (c_name)
);

insert into category(c_name)
values ('Sofware Engineering');
insert into category(c_name)
values ('Accounting');
insert into category(c_name)
values ('Finance');
insert into category(c_name)
values ('Civil engineering');
insert into category(c_name)
values ('computer engineering');
insert into category(c_name)
values ('Business studies');
insert into category(c_name)
values ('Marketing');

create table subscription_category_loyer
(
    category varchar(100),
    price    varchar(5),
    primary key (category)
);

insert into subscription_category_loyer(category, price)
values ('prime', '$50');
insert into subscription_category_loyer(category, price)
values ('gold', '$100');

create table employer
(
    user_name        varchar(20),
    category         varchar(100),
    company_name     varchar(50),
    preferred_method int,
    primary key (user_name),
    -- foreign key (user_name,preferred_method) references loyer_credit_pays(user_name,card_number),
    -- foreign key (user_name,preferred_method) references loyer_checquing_pays(user_name,account_no),
    foreign key (user_name) references all_user (user_name) on delete cascade,
    foreign key (category) references subscription_category_loyer (category)
);
insert into employer(user_name, category)
values ('caren', 'prime');
insert into employer(user_name, category)
values ('moh', 'prime');
insert into employer(user_name, category)
values ('rob', 'prime');
insert into employer(user_name, category)
values ('ahmed', 'gold');

create table contact_info
(
    telephone_number varchar(20),
    user_name        varchar(20),
    primary key (telephone_number),
    foreign key (user_name) references employer (user_name)
);

create table representatives
(
    rep_user_name      varchar(20),
    employer_user_name varchar(20),
    primary key (rep_user_name),
    foreign key (employer_user_name) references employer (user_name),
    foreign key (rep_user_name) references all_user (user_name)
);
insert into representatives(rep_user_name, employer_user_name)
values ('rep1', 'caren');
insert into representatives(rep_user_name, employer_user_name)
values ('rep2', 'caren');
insert into representatives(rep_user_name, employer_user_name)
values ('rep3', 'caren');
insert into representatives(rep_user_name, employer_user_name)
values ('rep4', 'caren');
insert into representatives(rep_user_name, employer_user_name)
values ('rep5', 'caren');


create table job
(
    job_id          int auto_increment,
    title           varchar(100),
    description     varchar(200),
    date_posted     date,
    employee_needed int,
    category        varchar(15),
    foreign key (category) references category (c_name) on delete cascade,
    primary key (job_id)
);

insert into job(job_id,title,description,date_posted,employee_needed,category) values(1,'C++ job','professional in C++','1/12/2020',5,'Sofware Engineering');
insert into job(job_id,title,description,date_posted,employee_needed,category) values(2,'C job','professional in C','1/12/2020',5,'Sofware Engineering');
insert into job(job_id,title,description,date_posted,employee_needed,category) values(3,'C# job','professional in C#','1/12/2020',5,'Sofware Engineering');
insert into job(job_id,title,description,date_posted,employee_needed,category) values(4,'Java job','professional in Java','1/12/2020',5,'Sofware Engineering');
insert into job(job_id,title,description,date_posted,employee_needed,category) values(5,'GO job','professional in GO','1/12/2020',5,'Sofware Engineering');


create table admin
(
    user_name varchar(20),
    telephone varchar(20),
    password  varchar(200),
    primary key (user_name)
);
insert into admin(user_name, password)
values ('bigboss', '123456');

create table card_method
(
    card_number     int,
    name            varchar(20),
    expiration_date date,
    primary key (card_number)
);

INSERT INTO `card_method`(`card_number`, `name`, `expiration_date`) VALUES (12340,"caren","2021/03/21");
INSERT INTO `card_method`(`card_number`, `name`, `expiration_date`) VALUES (11340,"mo","2022/11/10");
INSERT INTO `card_method`(`card_number`, `name`, `expiration_date`) VALUES (11140,"rob","2023/01/01");

create table chequing
(
    account_no int,
    bank_no    int,
    transit_no int,
    primary key (account_no)
);

INSERT INTO `chequing`(`account_no`, `bank_no`, `transit_no`) VALUES(1234,1,8);
INSERT INTO `chequing`(`account_no`, `bank_no`, `transit_no`) VALUES(5678,2,9);
INSERT INTO `chequing`(`account_no`, `bank_no`, `transit_no`) VALUES(91011,3,6);


create table subscription_category_loyee
(
    category varchar(100),
    price    varchar(5),
    primary key (category)
);
insert into subscription_category_loyee(category, price)
values ('basic', '$0');
insert into subscription_category_loyee(category, price)
values ('prime', '$10');
insert into subscription_category_loyee(category, price)
values ('gold', '$20');

create table employee
(
    user_name        varchar(20),
    category         varchar(100),
    preferred_method int,
    primary key (user_name),
    foreign key (user_name) references all_user (user_name),
    -- foreign key (user_name,preferred_method) references loyee_credit_pays(user_name,card_number),
    -- foreign key (user_name,preferred_method) references loyee_checquing_pays(user_name,account_no),
    foreign key (category) references subscription_category_loyee (category)
);

insert into employee(user_name, category)
values ('carenloyee', 'basic');
insert into employee(user_name, category)
values ('mohloyee', 'basic');
insert into employee(user_name, category)
values ('amrloyee', 'basic');
insert into employee(user_name, category)
values ('robloyee', 'basic');


create table post
(
    job_id    int auto_increment,
    user_name varchar(20),
    primary key (job_id, user_name),
    foreign key (job_id) references job (job_id),
    foreign key (user_name) references employer (user_name)
);

insert into post (job_id,user_name) values (1,'caren');
insert into post (job_id,user_name) values (2,'caren');
insert into post (job_id,user_name) values (3,'caren');
insert into post (job_id,user_name) values (4,'caren');
insert into post (job_id,user_name) values (5,'caren');

create table offer
(
    job_id          int,
    user_name_loyer varchar(20),
    user_name_loyee varchar(20),
    offer_status    varchar(20),
    accept_deny     varchar(10),
    primary key (job_id, user_name_loyer, user_name_loyee),
    foreign key (job_id) references job (job_id),
    foreign key (user_name_loyer) references employer (user_name),
    foreign key (user_name_loyee) references employee (user_name)
);

insert into offer (job_id, user_name_loyer, user_name_loyee, offer_status, accept_deny) values (1,'caren','carenloyee','Offered','accept');
insert into offer (job_id, user_name_loyer, user_name_loyee, offer_status, accept_deny) values (2,'caren','carenloyee','Offered','accept');
insert into offer (job_id, user_name_loyer, user_name_loyee, offer_status, accept_deny) values (3,'caren','carenloyee','Offered','accept');
create table applies
(
    job_id             int auto_increment,
    user_name          varchar(20),
    application_status varchar(20),
    date_applied       date,
    primary key (job_id, user_name),
    foreign key (job_id) references job (job_id),
    foreign key (user_name) references employee (user_name)
);

insert into applies(job_id,user_name,application_status,date_applied) values (1,'carenloyee','applied','12/12/2020');
insert into applies(job_id,user_name,application_status,date_applied) values (2,'carenloyee','applied','12/12/2020');
insert into applies(job_id,user_name,application_status,date_applied) values (3,'carenloyee','applied','12/12/2020');

create table manages
(
    user_name           varchar(20),
    auser_name          varchar(20),
    activate_deactivate varchar(20),
    primary key (user_name, auser_name),
    foreign key (user_name) references all_user (user_name),
    foreign key (auser_name) references admin (user_name)
);
insert into manages(user_name, auser_name, activate_deactivate)
values ('caren', 'bigboss', 'active');
insert into manages(user_name, auser_name, activate_deactivate)
values ('carenloyee', 'bigboss', 'active');
insert into manages(user_name, auser_name, activate_deactivate)
values ('robloyee', 'bigboss', 'active');
insert into manages(user_name, auser_name, activate_deactivate)
values ('mohloyee', 'bigboss', 'active');

create table loyer_credit_pays
(
    user_name        varchar(20),
    card_number      int(20),
    automatic_manual varchar(20),
    primary key (user_name, card_number),
    foreign key (user_name) references employer (user_name),
    foreign key (card_number) references card_method (card_number)

);

INSERT INTO `loyer_credit_pays`(`user_name`, `card_number`, `automatic_manual`) VALUES ("caren",12340,"manual");
INSERT INTO `loyer_credit_pays`(`user_name`, `card_number`, `automatic_manual`) VALUES ("caren",11340,"manual");
INSERT INTO `loyer_credit_pays`(`user_name`, `card_number`, `automatic_manual`) VALUES ("caren",11140,"automatic");


create table loyee_credit_pays
(
    user_name        varchar(20),
    card_number      int(20),
    automatic_manual varchar(20),
    primary key (user_name, card_number),
    foreign key (user_name) references employee (user_name),
    foreign key (card_number) references card_method (card_number)
);

INSERT INTO `loyee_credit_pays`(`user_name`, `card_number`, `automatic_manual`) VALUES ("carenloyee",12340,"manual");
INSERT INTO `loyee_credit_pays`(`user_name`, `card_number`, `automatic_manual`) VALUES ("carenloyee",11340,"manual");
INSERT INTO `loyee_credit_pays`(`user_name`, `card_number`, `automatic_manual`) VALUES ("carenloyee",11140,"automatic");


create table loyer_chequing
(
    account_no       int,
    user_name        varchar(20),
    automatic_manual varchar(20),
    primary key (account_no, user_name),
    foreign key (account_no) references chequing (account_no),
    foreign key (user_name) references employer (user_name)

);

INSERT INTO `loyer_chequing`(`user_name`, `account_no`, `automatic_manual`) VALUES ("caren",1234,"manual");
INSERT INTO `loyer_chequing`(`user_name`, `account_no`, `automatic_manual`) VALUES ("caren",5678,"manual");
INSERT INTO `loyer_chequing`(`user_name`, `account_no`, `automatic_manual`) VALUES ("caren",91011,"automatic");


create table loyee_chequing
(
    account_no       int,
    user_name        varchar(20),
    automatic_manual varchar(20),
    primary key (account_no, user_name),
    foreign key (account_no) references chequing (account_no),
    foreign key (user_name) references employee (user_name)
);

INSERT INTO `loyee_chequing`(`account_no`, `user_name`, `automatic_manual`) VALUES (1234,"carenloyee","automatic");
INSERT INTO `loyee_chequing`(`account_no`, `user_name`, `automatic_manual`) VALUES (5678,"carenloyee","automatic");
INSERT INTO `loyee_chequing`(`account_no`, `user_name`, `automatic_manual`) VALUES (91011,"carenloyee","automatic");

SET @@global.event_scheduler = 1;

CREATE TABLE temp_password
(
    user_name varchar(20),
    temp_uuid varchar(255) NOT NULL,
    timestamp datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_name),
    FOREIGN KEY (user_name) REFERENCES all_user (user_name)
);

CREATE EVENT IF NOT EXISTS remove_temp_password
    ON SCHEDULE EVERY 15 MINUTE
    ON COMPLETION PRESERVE
    ENABLE
    DO
    DELETE
    FROM temp_password
    WHERE timestamp < DATE_SUB(NOW(), INTERVAL 15 MINUTE)
;

CREATE TABLE temp_admin_password
(
    user_name varchar(20),
    temp_uuid varchar(255) NOT NULL,
    timestamp datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_name),
    FOREIGN KEY (user_name) REFERENCES admin (user_name)
);
CREATE EVENT IF NOT EXISTS remove_temp_admin_password
    ON SCHEDULE EVERY 15 MINUTE
    ON COMPLETION PRESERVE
    ENABLE
    DO
    DELETE
    FROM temp_admin_password
    WHERE timestamp < DATE_SUB(NOW(), INTERVAL 15 MINUTE)
;