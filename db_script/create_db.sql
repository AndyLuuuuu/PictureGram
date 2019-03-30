-- Create the PictureGram database
DROP DATABASE IF EXISTS PictureGramDB;
CREATE DATABASE PictureGramDB;
USE PictureGramDB;

-- create the tables
CREATE TABLE Account (
    accountID CHAR(30) NOT NULL,
    accountName CHAR(25) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (accountID)
);

CREATE TABLE Post (
    accountID CHAR(30) NOT NULL,
    postID CHAR(30) NOT NULL,
    postName VARCHAR(255) NOT NULL,
    postDesc VARCHAR(255) DEFAULT "",
    postImageExt VARCHAR(4),
    datePosted DATETIME NOT NULL,
    PRIMARY KEY (postID),
    FOREIGN KEY (accountID)
        REFERENCES Account (accountID)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE PostComment (
    accountID CHAR(30) NOT NULL,
    postID CHAR(30) NOT NULL,
    commentID CHAR(30) NOT NULL,
    datePosted DATE NOT NULL,
    comment VARCHAR(255),
    PRIMARY KEY (commentID),
    FOREIGN KEY (accountID)
        REFERENCES Account (accountID)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);


-- CREATE USER 'pg_user'@'localhost' IDENTIFIED BY 'pg_user';
-- GRANT SELECT, DELETE, INSERT, UPDATE ON PictureGramDB.* TO 'pg_user'@'localhost';


SELECT account.accountName, postcomment.comment, postcomment.commentID, postcomment.datePosted FROM account INNER JOIN postcomment ON account.accountID = postcomment.accountID;

-- SAMPLE DATA
-- accounts
INSERT INTO `account` (`accountID`, `accountName`, `email`, `password`) VALUES
('5c9da4054b8d06.58596558', 'FatBoogerThing', 'junyu_huang@hotmail.com', '$2y$10$vP3LqhIKTXzGcGXAOpo9/.4sneQHFS7RPOjsSfTbP5arRSp.ktLMa'),
('5c9da876a75299.77259514', 'Papa Franku', 'gmiller@gmail.com', '$2y$10$/55Pq8Ytr6tAvJ859wik1Oacpw.uPqQ0RGJIlZIocesIc8jquoQ1y'),
('5c9daa3858e542.16812950', 'yeehaw', 'goober@aol.net', '$2y$10$hoPjVwLldLIM6LO4A4C19eRfaHJ2UwEmfO/529dhehDhH1SRkBuz2'),
('5c9dad433e9207.82480928', 'BIG CHUNGUS', 'bchung@aol.net', '$2y$10$hgq7zLsED8SuvHBOpR.A5eAsV1mBH4S6cX5FfgNl5L2VJdTXuCE/W');

-- posts
INSERT INTO `post` (`accountID`, `postID`, `postName`, `postDesc`, `postImageExt`, `datePosted`) VALUES
('5c9da4054b8d06.58596558', '5c9da52e013183.78990681', 'HHNNNNNGG', 'now this is epic', 'png', '2019-03-29 00:00:00'),
('5c9da4054b8d06.58596558', '5c9da72f89cbb8.20757548', 'BEST PROF NA', '#notsellingout', 'png', '2019-03-29 00:00:00'),
('5c9da4054b8d06.58596558', '5c9da779d09e87.44187755', 'TREE FIDDY...', 'on the bench press', 'jpg', '2019-03-29 00:00:00'),
('5c9da4054b8d06.58596558', '5c9da7ae530c59.77252660', 'MOON DOUGH', '', 'jpg', '2019-03-29 00:00:00'),
('5c9da876a75299.77259514', '5c9da9c67f8024.27987751', 'EY BOSS', 'Â¿Hablo espaÃ±ol?', 'jpeg', '2019-03-29 00:00:00'),
('5c9da876a75299.77259514', '5c9daa071a16d6.27403976', 'ã“ã‚Œã¾ã§ã«é–‹ã‹ã‚ŒãŸã™ã¹ã¦ã®ã‚¢ãƒ‹ãƒ¡', '', 'jpg', '2019-03-29 00:00:00'),
('5c9daa3858e542.16812950', '5c9daa7347af72.68604499', 'REEEEEEEEEE', 'N O R M I E S    G E T    O U T', 'png', '2019-03-29 00:00:00'),
('5c9daa3858e542.16812950', '5c9daac0d495f8.38484141', 'uwu', '', 'jpg', '2019-03-29 00:00:00'),
('5c9daa3858e542.16812950', '5c9dabe067c971.74840406', 'ðŸ‘ŒðŸ˜‚ðŸ‘Œ', 'mah boi BK', 'jpg', '2019-03-29 00:00:00'),
('5c9daa3858e542.16812950', '5c9dac56790870.47010659', 'next vacation spot', 'POGGERS', 'jpg', '2019-03-29 00:00:00'),
('5c9daa3858e542.16812950', '5c9dad04f3b826.66855394', 'brunch', 'it\'s okay i guess', 'jpg', '2019-03-29 00:00:00'),
('5c9dad433e9207.82480928', '5c9dadabc65d79.91239809', 'gf', '', 'jpeg', '2019-03-29 00:00:00'),
('5c9dad433e9207.82480928', '5c9dafc6327912.74656988', '2019 best wallpaper', 'me right u wrong', 'jpg', '2019-03-29 00:00:00'),
('5c9dad433e9207.82480928', '5c9db074057379.41304640', 'Y E E Z I E S', 'Boost 350\'s btw', 'jpg', '2019-03-29 00:00:00'),
('5c9dad433e9207.82480928', '5c9db0f03585a2.57003667', 'heh heh boi', '( Í¡Â° ÍœÊ– Í¡Â°)', 'png', '2019-03-29 00:00:00'),
('5c9dad433e9207.82480928', '5c9db19c4528f4.64273185', 'K', 'no java', 'png', '2019-03-29 00:00:00'),
('5c9dad433e9207.82480928', '5c9db21d4a43d0.56976930', 'M E E K E E', 'M A O S E', 'jpg', '2019-03-29 00:00:00'),
('5c9da4054b8d06.58596558', '5c9db4e33ce3a0.51421226', 'PLATELET CHAN', 'uwu', 'jpg', '2019-03-29 00:00:00'),

-- Newly added posts
('5c9da876a75299.77259514','5c9dc8b139be86.99288786','Arcade','Sportsland Arcade in Shinjuku','jpg','2019-03-22 08:20:02'),
('5c9da876a75299.77259514','5c9dc8b139c045.08270942','Seaside Park','Seaside Park in Nagasaki','jpg','2019-03-28 02:00:00'),
('5c9da876a75299.77259514','5c9dc8b139c070.91006422','Nighttime Streets Photo','Hong Kong street at night','jpg','2019-03-25 06:04:23'),
('5c9da876a75299.77259514','5c9dc8b139c082.77131843','Chinese Food','Deep-fried octopus','jpg','2019-03-24 07:00:00'),
('5c9da876a75299.77259514','5c9dc8b139c094.94506135','Hong Kong Streets','Streets of Hong Kong','jpg','2019-03-22 06:00:00'),
('5c9da876a75299.77259514','5c9dc8b139c0a0.10500960','Noodles','Great tasting noodles in Hong Kong','jpg','2019-03-23 09:00:00'),
('5c9da876a75299.77259514','5c9dc8b139c0b0.90588616','Korean Castle','View inside some Korean castle in Seoul','jpg','2019-03-27 12:00:00'),
('5c9da876a75299.77259514','5c9dc8b139c0c8.97314525','Japanese Teahouse','Teahouse in Kyoto','jpg','2019-03-27 05:34:00'),
('5c9da876a75299.77259514','5c9dc8b139c0e2.33991542','Kinkakuji','Kinkakuji in Kyoto','jpg','2019-03-21 04:40:00'),
('5c9da876a75299.77259514','5c9dc8b139c0f9.82311039','View of Kinkakuji','Nice view of Kinkakuji','jpg','2019-03-26 08:00:00'),
('5c9da876a75299.77259514','5c9dc8b139c104.12601877','Nice weather','Nice weather and view in Glover Garden','jpg','2019-03-25 02:06:00'),
('5c9da876a75299.77259514','5c9dc8b139c110.79706311','Glover Garden','Taking a break in Glover Garden','jpg','2019-03-20 01:00:00'),
('5c9da876a75299.77259514','5c9dc8b139c120.50686514','Nagasaki Port','Great weather in Nagasaki!','jpg','2019-03-22 22:00:00'),
('5c9da876a75299.77259514','5c9dc8b139c131.33187111','Pond','Nice little pond in Glover Garden','jpg','2019-03-19 04:00:00'),
('5c9da876a75299.77259514','5c9dc8b139c144.11163735','Stray Cat','Found a friendly stray cat in Kagoshima. It was very cute','jpg','2019-03-26 02:00:00'),
('5c9da876a75299.77259514','5c9dc8b139c153.26748856','Train Station','Cool train station in Ibusuki','jpg','2019-03-14 07:01:02'),
('5c9da876a75299.77259514','5c9dc8b139c168.05290563','Osaka','Dotonbori Glico man','jpg','2019-02-22 10:50:00'),
('5c9da876a75299.77259514','5c9dc8b139c179.07307729','Shrine','Hirano-Jinja','jpg','2019-03-23 08:00:00'),
('5c9da876a75299.77259514','5c9dc8b139c180.13918729','Yokohama','Went to Minato Mirai, but it looks like it is going to start raining...','jpg','2019-03-24 02:00:00'),
('5c9da876a75299.77259514','5c9dc8b139c196.04164930','Sky Tree','Going to go up Tokyo Sky Tree for the first time!','jpg','2019-03-26 10:00:00');


-- comments
INSERT INTO `postcomment` (`accountID`, `postID`, `commentID`, `datePosted`, `comment`) VALUES
('5c9da4054b8d06.58596558', '5c9da52e013183.78990681', '5c9da6080eb379.05103199', '2019-03-29', 'no u');