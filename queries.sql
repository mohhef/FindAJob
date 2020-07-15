/*customer*/
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c1", 'Priscilla', 'todor', 'Avaveo', '294-600-9853', '95940 Aberg Alley', 'quebec', 'H3H2C3', 'Starobin', 'ptodor0@sciencedirect.com', 2);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c2", 'Corrina', 'Embury', 'Feedfire', '278-466-7843', '3 Kensington Point', 'quebec', 'H3G2C3', 'Montbéliard', 'cembury1@nature.com', 1);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c3", 'Aguistin', 'Wessel', 'Feedmix', '249-511-5222', '91 Lake View Park', 'ontario', 'G3G2C3', 'Halden', 'awessel2@java.com', 5);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c4", 'Stephana', 'Cavil', 'Eimbee', '614-553-4903', '90913 Mesta Court', 'quebec', 'G3U2C3', 'Ondoy', 'scavil3@360.cn', 3);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c5", 'Rouvin', 'Weeke', 'Ailane', '720-405-0928', '4102 Karstens Center', 'ontario', 'G3P2C3', 'Przeworsk', 'rweeke4@nyu.edu', 7);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c6", 'Annabal', 'Ducket', 'Realmix', '240-322-1222', '492 Shasta Center', 'ontario', 'G3G4C3', 'Kousséri', 'aducket5@dyndns.org', 8);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c7", 'Fifi', 'Aspey', 'Mydeo', '571-821-0822', '9 Tennessee Way', 'quebec', 'G3G1C3', 'Eldama Ravine', 'faspey6@gmpg.org', 3);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c8", 'Trenna', 'Lammerding', 'JumpXS', '333-468-4652', '7857 Forest Run Circle', 'ontario', 'H3G2C3', 'Watulimo', 'tlammerding7@bizjournals.com', 8);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c9", 'Hew', 'Cochrane', 'Bubblebox', '314-942-0200', '10 Clarendon Crossing', 'ontario', 'C3G2C3', 'Masjid', 'hcochrane8@imgur.com', 9);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c10", 'Rob', 'Sailes', 'Voonix', '255-310-8617', '81727 Loomis Road', 'quebec', 'G3E2C3', 'Xiongzhang', 'rsailes9@topsy.com', 10);

/*special order*/
insert into special_order (order_id, order_date, qty) values ('so1', '4/3/2020', 5, 'c1');
insert into special_order (order_id, order_date, qty) values ('so2', '3/14/2020', 2, 'c4');
insert into special_order (order_id, order_date, qty) values ('so3', '6/29/2020', 3, 'c3');
insert into special_order (order_id, order_date, qty) values ('so4', '1/14/2020', 2, 'c2');
insert into special_order (order_id, order_date, qty) values ('so5', '2/2/2020', 3, 'c7');
insert into special_order (order_id, order_date, qty) values ('so6', '3/11/2020', 5, 'c6');
insert into special_order (order_id, order_date, qty) values ('so7', '1/18/2020', 2, 'c5');
insert into special_order (order_id, order_date, qty) values ('so8', '4/6/2020', 4, 'c8');
insert into special_order (order_id, order_date, qty) values ('so9', '1/26/2020', 3, 'c9');
insert into special_order (order_id, order_date, qty) values ('so10', '7/4/2020', 4, 'c10');
