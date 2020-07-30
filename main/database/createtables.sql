drop SCHEMA web_career;
create database web_career;
create table contact_info(
    telephone_number varchar(20) not null,
    company_name varchar(50),
    primary key(telephone_number)
);

create table all_user(
    user_name varchar(20) not null,
    email varchar(100),
    password varchar(200),
    primary key(user_name)
);

create table category(
    c_name varchar(15) not null,
    primary key(c_name)
);

create table subscription_category_loyer(
    category varchar(100) not null,
    price varchar(5),
    primary key(category)
);

create table employer(
    user_name varchar(20) not null,
    email varchar(100),
    password varchar(200),
    category varchar(100),  
    primary key(user_name),
    foreign key (user_name) references all_user(user_name),
    foreign key (category) references subscription_category_loyer(category)
);

create table representatives(
    rep_user_name varchar(20) not null,
    name varchar(50),
    password varchar(200),
    primary key (rep_user_name),
    foreign key (rep_user_name) references employer(user_name)
);

create table job(
    job_id int not null auto_increment,
    title varchar(100),
    description varchar(200),
    date_posted date,
    employee_needed int,
    primary key(job_id)
);

create table admin(
    user_name varchar(20) not null,
    password varchar(200),
    primary key(user_name)
);

create table card_method(
    card_number int(20) not null,
    name varchar(20),
    expiration_date date,
    balance int,
    primary key(card_number)
);

create table chequing(
    account_no int not null,
    bank_no int,
    transit_no int,
    primary key(account_no)
);

create table subscription_category_loyee(
    category varchar(100) not null,
    price varchar(5),
    primary key(category)
);

create table employee(
    user_name varchar(20) not null,
    password varchar(200),
    email varchar(100),
    category varchar(100),
    primary key(user_name),
    foreign key (user_name) references all_user(user_name),
    foreign key (category) references subscription_category_loyee(category)
);

create table contact(
    telephone_number varchar(15) not null,
    euser_name varchar(20) not null,
    primary key (telephone_number,euser_name),
    foreign key (telephone_number) references contact_info(telephone_number),
    foreign key (euser_name) references employer(user_name)
);

create table belong_to(
    c_name varchar(15) not null,
    job_id int not null,
    primary key(c_name,job_id),
    foreign key(c_name) references category(c_name),
    foreign key(job_id) references job(job_id)
);

create table post(
    job_id int not null,
    user_name varchar(20),
    primary key(job_id, user_name),
    foreign key (job_id) references job(job_id),
    foreign key (user_name) references employer(user_name)
);

create table offer(
    job_id int not null,
    user_name_loyer varchar(20),
    user_name_loyee varchar(20),
    offer_status varchar(20), 
    primary key(job_id, user_name_loyer,user_name_loyee),
    foreign key (job_id) references job(job_id),
    foreign key(user_name_loyer) references employer(user_name),
    foreign key(user_name_loyee) references employee(user_name)
);

create table applies(
    job_id int not null,
    user_name varchar(20),
    application_status varchar(20), 
    date_applied date,
    primary key(job_id, user_name),
    foreign key(job_id) references job(job_id),
    foreign key(user_name) references employee(user_name)
);

create table manages(
    user_name varchar(20) not null,
    auser_name varchar(20) not null,
    activate_deactivate varchar(20),
    primary key(user_name,auser_name),
    foreign key(user_name) references all_user(user_name),
    foreign key(user_name) references admin(user_name)
);

create table loyer_credit_pays(
    user_name varchar(20) not null,
    card_number int(20) not null,
    automatic_manual varchar(20),
    primary key(user_name,card_number),
    foreign key (user_name) references employer(user_name)
);

create table loyee_credit_pays(
    user_name varchar(20) not null,
    card_number int(20) not null,
    automatic_manual varchar(20),
    primary key(user_name,card_number),
    foreign key (user_name) references employee(user_name) 
);

create table loyer_chequing(
    account_no int not null,
    user_name varchar(20) not null,
    primary key(account_no,user_name),
    foreign key(account_no) references chequing(account_no),
    foreign key(user_name) references employer(user_name)

);
create table loyee_chequing(
    account_no int not null,
    user_name varchar(20) not null,
    primary key(account_no,user_name),
    foreign key(account_no) references chequing(account_no),
    foreign key(user_name) references employee(user_name)
);