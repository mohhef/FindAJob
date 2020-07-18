
/*customer*/
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c1", 'Priscilla', 'todor', null, '294-600-9853', '95940 Aberg Alley', 'quebec', 'H3H2C3', 'Starobin', 'ptodor0@sciencedirect.com', 2);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c2", 'Corrina', 'Embury', null, '278-466-7843', '3 Kensington Point', 'quebec', 'H3G2C3', 'Montbéliard', 'cembury1@nature.com', 1);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c3", 'Aguistin', 'Wessel', null, '249-511-5222', '91 Lake View Park', 'ontario', 'G3G2C3', 'Halden', 'awessel2@java.com', 5);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c4", 'Stephana', 'Cavil', null, '614-553-4903', '90913 Mesta Court', 'quebec', 'G3U2C3', 'Ondoy', 'scavil3@360.cn', 3);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c5", 'Rouvin', 'Weeke', null, '720-405-0928', '4102 Karstens Center', 'ontario', 'G3P2C3', 'Przeworsk', 'rweeke4@nyu.edu', 7);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c6", 'Annabal', 'Ducket', null, '240-322-1222', '492 Shasta Center', 'ontario', 'G3G4C3', 'Kousséri', 'aducket5@dyndns.org', 8);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c7", 'Fifi', 'Aspey', null, '571-821-0822', '9 Tennessee Way', 'quebec', 'G3G1C3', 'Eldama Ravine', 'faspey6@gmpg.org', 3);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c8", 'Trenna', 'Lammerding', null, '333-468-4652', '7857 Forest Run Circle', 'ontario', 'H3G2C3', 'Watulimo', 'tlammerding7@bizjournals.com', 8);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c9", 'Hew', 'Cochrane', 'Bubblebox', '314-942-0200', '10 Clarendon Crossing', 'ontario', 'C3G2C3', 'Masjid', 'hcochrane8@imgur.com', 9);
insert into customer (cid, first_name, last_name, company_name, telephone_number, address, province, postal_code, city, email, cumulative_purchases) values ("c10", 'Rob', 'Sailes', null, '255-310-8617', '81727 Loomis Road', 'quebec', 'G3E2C3', 'Xiongzhang', 'rsailes9@topsy.com', 10);

/*book*/
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bs_id) values ('958599307-4', 'p1', 'Better Than Sex', 44, 'Diomedea irrorata', 78, 'BS1');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bs_id) values ('173127435-1', 'p2', 'Master of Disguise, The', 20, 'Geochelone elegans', 76, 'BS1');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bs_id) values ('240258028-3', 'p3', 'Old Man Made in Spain (Abuelo made in Spain)', 40, 'Laniarius ferrugineus', 52, 'BS1');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bs_id) values ('346111992-X', 'p4', 'Dark City', 23, 'Psittacula krameri', 57, 'BS1');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bs_id) values ('549652903-4', 'p5', 'To the Limit (Am Limit)', 40, 'Varanus salvator', 82, 'BS1');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bs_id) values ('326314786-2', 'p6', 'Spy in Black, The', 31, 'Geochelone elephantopus', 39, 'BS1');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bs_id) values ('698507015-9', 'p7', 'Last Time I Saw Archie, The', 45, 'Gyps fulvus', 52, 'BS1');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bs_id) values ('266608745-X', 'p8', 'Maze, The', 43, 'Castor canadensis', 78, 'BS1');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bs_id) values ('272521287-1', 'p9', 'A Story of Children and Film', 35, 'Anas bahamensis', 44, 'BS1');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bs_id) values ('205217918-6', 'p10', 'Last Stand, The', 61, 'Mirounga leonina', 89, 'BS1');
insert into book (ISBN, publisher_number, title, cost_price, book_subject, selling_price, bs_id) values ('205242918-6', 'p3', 'Mr. Bean', 21, 'Funny', 89, 'BS1');

/*special order*/
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so1', '2020-4-3', 5, 'c1','b1','p1','958599307-4');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so2', '2020-2-4', 2, 'c4','b2','p1','173127435-1');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so3', '2020-1-3', 3, 'c3','b3','p1','240258028-3');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so4', '2020-5-3', 2, 'c2','b4','p4','346111992-X');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so5', '2020-6-3', 3, 'c7','b5','p5','549652903-4');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so6', '2020-7-3', 5, 'c6','b6','p6','326314786-2');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so7', '2020-8-3', 2, 'c5','b7','p7','698507015-9');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so8', '2020-9-3', 4, 'c8','b8','p8','266608745-X');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so9', '2020-10-3', 3, 'c9','b9','p9','272521287-1');
insert into special_order (order_id, order_date, Quantity, cid, branch_name, publisher_number, ISBN) values ('so10', '2020-4-1', 4, 'c10','b10','p10','205217918-6');

/*publisher branch*/
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b1','p1', '819-277-8936', 'mhise0@msu.edu', 'Garoua Boulaï', '58 Westerfield Court', 'c7S6b1');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b2','p1', '329-585-5963', 'lsteels1@spotify.com', 'Itaqui', '6637 Clove Trail', 'F6o1j2');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b3','p1', '626-379-7430', 'ccopestake2@walmart.com', 'Siedlce', '010 Esker Road', 'V5r8W3');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b4','p4', '254-589-3862', 'scurley3@kickstarter.com', 'Malaruhatan', '1 Northfield Court', 'J0w7v9');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b5','p5', '737-842-3513', 'dsylvaine4@csmonitor.com', 'Kibonsod', '8 Eliot Hill', 'S3q9Q5');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b6','p6', '194-757-9650', 'aormrod5@friendfeed.com', 'São Brás de Alportel', '281 Bartillon Avenue', 'f4t8n8');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b7','p7', '838-885-9802', 'pwhyatt6@plala.or.jp', 'Praia da Vagueira', '2 Logan Court', 'K7V9F8');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b8','p8', '322-435-4367', 'athrift7@deviantart.com', 'Noginsk', '3 Dunning Junction', 'W5j9L3');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b9','p9', '307-331-2906', 'astennett8@phpbb.com', 'Idi Iroko', '46911 Anhalt Circle', 'N5c1M4');
insert into publisher_branch (branch_name, publisher_number, telephone_number, rep_email_address, province, address, postal_code) values ('b10','p10', '611-720-7818', 'rbirdis9@weather.com', 'Bryukhovetskaya', '39138 Atwood Street', 'y8d0z1');

/*sale to*/
insert into sale_to (ISBN, cid, transaction_id, quantity, order_date) values ('958599307-4', 'c1', 't1', 94, '2020-06-05');
insert into sale_to (ISBN, cid, transaction_id, quantity, order_date) values ('272521287-1', 'c2', 't2', 56, '2020-05-04');
insert into sale_to (ISBN, cid, transaction_id, quantity, order_date) values ('346111992-X', 'c3', 't3', 55, '2020-05-08');
insert into sale_to (ISBN, cid, transaction_id, quantity, order_date) values ('205217918-6', 'c4', 't4', 31, '2020-01-02');
insert into sale_to (ISBN, cid, transaction_id, quantity, order_date) values ('958599307-4', 'c5', 't5', 38, '2020-06-07');
insert into sale_to (ISBN, cid, transaction_id, quantity, order_date) values ('958599307-4', 'c6', 't6', 16, '2020-01-03');
insert into sale_to (ISBN, cid, transaction_id, quantity, order_date) values ('205217918-6', 'c7', 't7', 3, '2020-01-05');
insert into sale_to (ISBN, cid, transaction_id, quantity, order_date) values ('958599307-4', 'c8', 't8', 61, '2020-02-08');
insert into sale_to (ISBN, cid, transaction_id, quantity, order_date) values ('698507015-9', 'c0', 't9', 86, '2020-01-09');
insert into sale_to (ISBN, cid, transaction_id, quantity, order_date) values ('205217918-6', 'c10', 't10', 24, '2020-01-08');

/*publisher*/
insert into publisher (publisher_number, address, telephone_number, company_name, city, postal_code, province, email_address, website) values ('p1', '71 Menomonie Circle', '405-470-3544', 'Dabfeed', 'Oklahoma City', '73135', 'Oklahoma', 'gmuir0@e-recht24.de', 'www.biqao.com');
insert into publisher (publisher_number, address, telephone_number, company_name, city, postal_code, province, email_address, website) values ('p2', '6 Park Meadow Circle', '212-666-7532', 'Tanoodle', 'New York City', '10090', 'New York', 'mgreensides1@sohu.com', 'www.alofl.com');
insert into publisher (publisher_number, address, telephone_number, company_name, city, postal_code, province, email_address, website) values ('p3', '2 Lien Park', '309-295-5825', 'Vinder', 'Carol Stream', '60158', 'Illinois', 'apiolli2@oakley.com', 'www.pbfkm.com');
insert into publisher (publisher_number, address, telephone_number, company_name, city, postal_code, province, email_address, website) values ('p4', '35506 Clove Way', '478-359-5219', 'Yadel', 'Macon', '31210', 'Georgia', 'mrunnett3@e-recht24.de', 'www.zhsic.com');
insert into publisher (publisher_number, address, telephone_number, company_name, city, postal_code, province, email_address, website) values ('p5', '22 Fuller Point', '404-151-1774', 'Rhycero', 'Atlanta', '31132', 'Georgia', 'vedbrooke4@nps.gov', 'www.cfytu.com');
insert into publisher (publisher_number, address, telephone_number, company_name, city, postal_code, province, email_address, website) values ('p6', '79 Di Loreto Terrace', '816-412-9068', 'Eayo', 'Kansas City', '64109', 'Missouri', 'dpinnocke5@nhs.uk', 'www.uviya.com');
insert into publisher (publisher_number, address, telephone_number, company_name, city, postal_code, province, email_address, website) values ('p7', '49 Waubesa Alley', '505-326-2708', 'Yodoo', 'Albuquerque', '87105', 'New Mexico', 'msimmgen6@google.com', 'www.ibpby.com');
insert into publisher (publisher_number, address, telephone_number, company_name, city, postal_code, province, email_address, website) values ('p8', '1574 Roxbury Road', '515-425-8942', 'Camimbo', 'Des Moines', '50305', 'Iowa', 'fkinleyside7@friendfeed.com', 'www.orvra.com');
insert into publisher (publisher_number, address, telephone_number, company_name, city, postal_code, province, email_address, website) values ('p9', '270 Jay Terrace', '414-848-8492', 'Dynabox', 'Milwaukee', '53263', 'Wisconsin', 'rmcmurtyr8@naver.com', 'www.kwuox.com');
insert into publisher (publisher_number, address, telephone_number, company_name, city, postal_code, province, email_address, website) values ('p10', '71073 Mccormick Road', '619-795-7469', 'Livetube', 'San Diego', '92186', 'California', 'tabade9@reverbnation.com', 'www.xrnkq.com');

/*written_by*/
insert into written_by (ISBN, email) values ('958599307-4', 'kedmonstone0@rambler.ru');
insert into written_by (ISBN, email) values ('173127435-1', 'rbickerdike1@aol.com');
insert into written_by (ISBN, email) values ('240258028-3', 'ebruyns2@linkedin.com');
insert into written_by (ISBN, email) values ('346111992-X', 'gflacknell3@t-online.de');
insert into written_by (ISBN, email) values ('549652903-4', 'emaple4@geocities.jp');
insert into written_by (ISBN, email) values ('326314786-2', 'wbale5@de.vu');
insert into written_by (ISBN, email) values ('698507015-9', 'agoldson6@marriott.com');
insert into written_by (ISBN, email) values ('266608745-X', 'nnovak7@berkeley.edu');
insert into written_by (ISBN, email) values ('272521287-1', 'pkennally8@engadget.com');
insert into written_by (ISBN, email) values ('205217918-6', 'jismail9@fda.gov');

/*author*/
insert into author (author_name, email) values ('Row Havill', 'kedmonstone0@rambler.ru');
insert into author (author_name, email) values ('Upton Southerton', 'rbickerdike1@aol.com');
insert into author (author_name, email) values ('Nadine Rubinfajn', 'ebruyns2@linkedin.com');
insert into author (author_name, email) values ('Germain Byrd', 'gflacknell3@t-online.de');
insert into author (author_name, email) values ('Kirby Micka', 'emaple4@geocities.jp');
insert into author (author_name, email) values ('Kennan Dunkerton', 'wbale5@de.vu');
insert into author (author_name, email) values ('Feliks Casperri', 'agoldson6@marriott.com');
insert into author (author_name, email) values ('Hamnet Ebbins', 'nnovak7@berkeley.edu');
insert into author (author_name, email) values ('Junia Gillow', 'pkennally8@engadget.com');
insert into author (author_name, email) values ('Jacqueline Duer', 'jismail9@fda.gov');

/*store*/
insert into stores (isbn, quantity_on_hand, bs_id) values ('958599307-4', 99, 'bs1');
insert into stores (isbn, quantity_on_hand, bs_id) values ('173127435-1', 61, 'bs1');
insert into stores (isbn, quantity_on_hand, bs_id) values ('240258028-3', 61, 'bs1');
insert into stores (isbn, quantity_on_hand, bs_id) values ('346111992-X', 82, 'bs1');
insert into stores (isbn, quantity_on_hand, bs_id) values ('549652903-4', 36, 'bs1');
insert into stores (isbn, quantity_on_hand, bs_id) values ('326314786-2', 69, 'bs1');
insert into stores (isbn, quantity_on_hand, bs_id) values ('698507015-9', 21, 'bs1');
insert into stores (isbn, quantity_on_hand, bs_id) values ('266608745-X', 41, 'bs1');
insert into stores (isbn, quantity_on_hand, bs_id) values ('272521287-1', 72, 'bs1');
insert into stores (isbn, quantity_on_hand, bs_id) values ('205217918-6', 27, 'bs1');
insert into stores (isbn, quantity_on_hand, bs_id) values ('305217918-6', 17, 'bs1');
insert into stores (isbn, quantity_on_hand, bs_id) values ('432217918-6', 87, 'bs1');
insert into stores (isbn, quantity_on_hand, bs_id) values ('921729318-6', 47, 'bs1');
insert into stores (isbn, quantity_on_hand, bs_id) values ('324259918-6', 57, 'bs1');

/*bookstore*/

insert into bookstore (bs_id, phone_number, address, bookstore_name) values ('bs1', '170-792-1904', '24806 Golden Leaf Parkway', 'betterbook');


/*order*/
insert into orders (order_id, order_date) values ('o1', '2019-11-07');
insert into orders (order_id, order_date) values ('o2', '2020-06-10');
insert into orders (order_id, order_date) values ('o3', '2020-06-05');
insert into orders (order_id, order_date) values ('o4', '2020-01-08');
insert into orders (order_id, order_date) values ('o5', '2020-05-05');
insert into orders (order_id, order_date) values ('o6', '2019-10-15');
insert into orders (order_id, order_date) values ('o7', '2019-12-01');
insert into orders (order_id, order_date) values ('o8', '2020-06-05');
insert into orders (order_id, order_date) values ('o9', '2020-03-04');
insert into orders (order_id, order_date) values ('o10', '2020-07-10');


/*back_order*/
insert into `book_order` (order_id,ISBN,qty,received) values ('o1', '958599307-4', 308, True);
insert into `book_order` (order_id,ISBN,qty,received) values ('o2', '958599307-4', 476, False);
insert into `book_order` (order_id,ISBN,qty,received) values ('o3', '346111992-X', 323, False);
insert into `book_order` (order_id,ISBN,qty,received) values ('o4', '346111992-X', 137, True);
insert into `book_order` (order_id,ISBN,qty,received) values ('o5', '205217918-6', 343, True);
insert into `book_order` (order_id,ISBN,qty,received) values ('o6', '205217918-6', 123, False);
insert into `book_order` (order_id,ISBN,qty,received) values ('o7', '698507015-9', 107, True);
insert into `book_order` (order_id,ISBN,qty,received) values ('o8', '698507015-9', 465, False);
insert into `book_order` (order_id,ISBN,qty,received) values ('o9', '272521287-1', 128, True);
insert into `book_order` (order_id,ISBN,qty,received) values ('o10', '272521287-1', 223, False);
