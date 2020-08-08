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
    primary key (user_name)
);
insert into all_user(user_name, email, password)
values ('caren', 'c123en@hello.com', '123');
insert into all_user(user_name, email, password)
values ('carenloyee', 'c123ee@hello.com', '123');

create table category
(
    c_name varchar(15),
    primary key (c_name)
);

insert into category(c_name)
values ('Part-time');
insert into category(c_name)
values ('Full-time');
insert into category(c_name)
values ('Intern');

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

create table chequing
(
    account_no int,
    bank_no    int,
    transit_no int,
    primary key (account_no)
);

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


create table post
(
    job_id    int auto_increment,
    user_name varchar(20),
    primary key (job_id, user_name),
    foreign key (job_id) references job (job_id),
    foreign key (user_name) references employer (user_name)
);

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

create table loyer_credit_pays
(
    user_name        varchar(20),
    card_number      int(20),
    automatic_manual varchar(20),
    primary key (user_name, card_number),
    foreign key (user_name) references employer (user_name)
);

create table loyee_credit_pays
(
    user_name        varchar(20),
    card_number      int(20),
    automatic_manual varchar(20),
    primary key (user_name, card_number),
    foreign key (user_name) references employee (user_name)
);

create table loyer_chequing
(
    account_no       int,
    user_name        varchar(20),
    automatic_manual varchar(20),
    primary key (account_no, user_name),
    foreign key (account_no) references chequing (account_no),
    foreign key (user_name) references employer (user_name)

);
create table loyee_chequing
(
    account_no       int,
    user_name        varchar(20),
    automatic_manual varchar(20),
    primary key (account_no, user_name),
    foreign key (account_no) references chequing (account_no),
    foreign key (user_name) references employee (user_name)
);
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
CREATE EVENT IF NOT EXISTS remove_temp_password
    ON SCHEDULE EVERY 15 MINUTE
    ON COMPLETION PRESERVE
    ENABLE
    DO
    DELETE
    FROM temp_password
    WHERE timestamp < DATE_SUB(NOW(), INTERVAL 15 MINUTE)
;