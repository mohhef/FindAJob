INSERT INTO `all_user` 
(`user_name`, `email`, `balance`, `password`) VALUES 
("Caren", "caren@caren.com", 1000, "123123"),
("Mo", "mo@mo.com", 1000, "123123"),
("Aloys", "aloys@aloys.com", 1000, "123123"),
("Robert", "robert@robert.com", 1000, "123123"),
("eddie", "eddie@eddie.com", "1000", "123123");

INSERT INTO `card_method`(`card_number`, `name`, `expiration_date`) VALUES 
("123456789","caren","2021/03/21"),
("198375639","mo","2022/11/10"),
("194384956","robert","2023/01/01"),
("058463849","eddie","2021/03/22");

INSERT INTO `chequing`(`account_no`, `bank_no`, `transit_no`) VALUES
("00969423","123","2"), 
("09374638","546","32"),
("93746932","234","1"),
("93846593","089","3");

INSERT INTO `employee`(`user_name`, `category`, `preferred_method`) VALUES 
("mo", "gold", "198375639"),
("robert", "prime", "194384956"),
("caren","basic","9374638");

INSERT INTO `employer`(`user_name`, `category`, `company_name`, `preferred_method`) VALUES 
("aloys","prime","concordia","93846593"),
("eddie","gold","CN","058463849");


INSERT INTO `loyee_chequing`(`account_no`, `user_name`, `automatic_manual`) VALUES 
("9374638","caren","automatic");


INSERT INTO `loyee_credit_pays`(`user_name`, `card_number`, `automatic_manual`) VALUES 
("mo","198375639","manual"),
("robert","194384956","automatic");


INSERT INTO `loyer_chequing`(`account_no`, `user_name`, `automatic_manual`) VALUES 
("93846593","aloys","manual");

INSERT INTO `loyer_credit_pays`(`user_name`, `card_number`, `automatic_manual`) VALUES 
("eddie","058463849","automatic");










