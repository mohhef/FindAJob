
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

/*book*/
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bookstore_name) values ('958599307-4', 'p1', 'Better Than Sex', 44, 'Diomedea irrorata', 38, 'BetterBook');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bookstore_name) values ('173127435-1', 'p2', 'Master of Disguise, The', 20, 'Geochelone elegans', 20, 'BetterBook');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bookstore_name) values ('240258028-3', 'p3', 'Old Man Made in Spain (Abuelo made in Spain)', 80, 'Laniarius ferrugineus', 52, 'BetterBook');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bookstore_name) values ('346111992-X', 'p4', 'Dark City', 83, 'Psittacula krameri', 77, 'BetterBook');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bookstore_name) values ('549652903-4', 'p5', 'To the Limit (Am Limit)', 6, 'Varanus salvator', 82, 'BetterBook');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bookstore_name) values ('326314786-2', 'p6', 'Spy in Black, The', 31, 'Geochelone elephantopus', 39, 'BetterBook');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bookstore_name) values ('698507015-9', 'p7', 'Last Time I Saw Archie, The', 45, 'Gyps fulvus', 52, 'BetterBook');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bookstore_name) values ('266608745-X', 'p8', 'Maze, The', 43, 'Castor canadensis', 18, 'BetterBook');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bookstore_name) values ('272521287-1', 'p9', 'A Story of Children and Film', 55, 'Anas bahamensis', 74, 'BetterBook');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bookstore_name) values ('205217918-6', 'p10', 'Last Stand, The', 61, 'Mirounga leonina', 89, 'BetterBook');

/*special order*/
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so1', 4/3/2020, 5, 'c1','b1','p1','958599307-4');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so2', 3/14/2020, 2, 'c4','b2','p2','173127435-1');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so3', 6/29/2020, 3, 'c3','b3','p3','240258028-3');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so4', 1/14/2020, 2, 'c2','b4','p4','346111992-X');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so5', 2/2/2020, 3, 'c7','b5','p5','549652903-4');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so6', 3/11/2020, 5, 'c6','b6','p6','326314786-2');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so7', 1/18/2020, 2, 'c5','b7','p7','698507015-9');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so8', 4/6/2020, 4, 'c8','b8','p8','266608745-X');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so9', 1/26/2020, 3, 'c9','b9','p9','272521287-1');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so10', 7/4/2020, 4, 'c10','b10','p10','205217918-6');


/*publisher branch*/
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b1','p1', '819-277-8936', 'mhise0@msu.edu', 'Garoua Boulaï', '58 Westerfield Court', 'c7S6b1');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b2','p2', '329-585-5963', 'lsteels1@spotify.com', 'Itaqui', '6637 Clove Trail', 'F6o1j2');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b3','p3', '626-379-7430', 'ccopestake2@walmart.com', 'Siedlce', '010 Esker Road', 'V5r8W3');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b4','p4', '254-589-3862', 'scurley3@kickstarter.com', 'Malaruhatan', '1 Northfield Court', 'J0w7v9');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b5','p5', '737-842-3513', 'dsylvaine4@csmonitor.com', 'Kibonsod', '8 Eliot Hill', 'S3q9Q5');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b6','p6', '194-757-9650', 'aormrod5@friendfeed.com', 'São Brás de Alportel', '281 Bartillon Avenue', 'f4t8n8');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b7','p7', '838-885-9802', 'pwhyatt6@plala.or.jp', 'Praia da Vagueira', '2 Logan Court', 'K7V9F8');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b8','p8', '322-435-4367', 'athrift7@deviantart.com', 'Noginsk', '3 Dunning Junction', 'W5j9L3');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b9','p9', '307-331-2906', 'astennett8@phpbb.com', 'Idi Iroko', '46911 Anhalt Circle', 'N5c1M4');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b10','p10', '611-720-7818', 'rbirdis9@weather.com', 'Bryukhovetskaya', '39138 Atwood Street', 'y8d0z1');