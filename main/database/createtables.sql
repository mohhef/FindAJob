
create table contact_info(
telephone_number varchar(20),
fax varchar(20),
primary key(telephone_number)
);

create table job(
job_id varchar(10),
title varchar(100),
description varchar(200),
date_posted date,
employee_needed int,
primary key(job_id)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table category(
c_name varchar(10),
primary key(c_name)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table subscription_category(
category varchar(100),
price varchar(5),
primary key(category)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table employer(
euser_name varchar(20),
password varchar(200),
category varchar(100),
primary key(euser_name),
foreign key (category) references subscription_category(category)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;



create table admin(
auser_name varchar(20),
password varchar(200),
primary key(auser_name)
);

create table payment_method(
card_number int(20),
name varchar(20),
expiration_date date,
balance int,
primary key(card_number)
);

create table subscription_category_user(
category varchar(100),
price varchar(5),
primary key(category)
);

create table user_employee(
user_name varchar(20),
password varchar(200),
category varchar(100),
primary key(user_name),
foreign key (category) references subscription_category_user(category)
);

create table contact(
telephone_number varchar(15),
euser_name varchar(20),
primary key (telephone_number,euser_name),
foreign key (telephone_number) references contact_info(telephone_number),
foreign key (euser_name) references employer(euser_name)
);

create table belong_to(
c_name varchar(10),
job_id varchar(10),
primary key(c_name,job_id),
foreign key(c_name) references category(c_name),
foreign key(job_id) references job(job_id)
);

create table post(
job_id varchar(10),
euser_name varchar(20),
primary key(job_id, euser_name),
foreign key (job_id) references job(job_id),
foreign key (euser_name) references employer(euser_name)
);

create table offer(
job_id varchar(10),
euser_name varchar(20),
user_name varchar(20),
offer_status varchar(20), 
primary key(job_id, euser_name,user_name),
foreign key (job_id) references job(job_id),
foreign key(euser_name) references employer(euser_name),
foreign key(user_name) references user_employee(user_name)
);

create table applies(
job_id varchar(10),
user_name varchar(20),
application_staus varchar(20), 
date_applied date,
primary key(job_id, user_name),
foreign key(job_id) references job(job_id),
foreign key(user_name) references user_employee(user_name)
);

create table manages(
user_name varchar(20),
auser_name varchar(20),
activate_deactivate varchar(20),
primary key(user_name,auser_name),
foreign key(user_name) references employer(euser_name),
foreign key(user_name) references user_employee(user_name),
foreign key(auser_name) references admin(auser_name)
);

create table pays(
user_name varchar(20),
frozen varchar(20),
automatic_manual varchar(20),
card_number int(20),
primary key(user_name,card_number),
foreign key (user_name) references employer(euser_name),
foreign key (user_name) references user_employee(user_name) 
);