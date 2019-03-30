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

SELECT account.accountName, postcomment.comment, postcomment.commentID, postcomment.datePosted FROM account INNER JOIN postcomment ON account.accountID = postcomment.accountID;

-- SAMPLE DATA
-- accounts
INSERT INTO `Account` (`accountID`, `accountName`, `email`, `password`) VALUES
('5c9da4054b8d06.58596558', 'FatBoogerThing', 'junyu_huang@hotmail.com', '$2y$10$vP3LqhIKTXzGcGXAOpo9/.4sneQHFS7RPOjsSfTbP5arRSp.ktLMa'),
('5c9da876a75299.77259514', 'Papa Franku', 'gmiller@gmail.com', '$2y$10$/55Pq8Ytr6tAvJ859wik1Oacpw.uPqQ0RGJIlZIocesIc8jquoQ1y'),
('5c9daa3858e542.16812950', 'yeehaw', 'goober@aol.net', '$2y$10$hoPjVwLldLIM6LO4A4C19eRfaHJ2UwEmfO/529dhehDhH1SRkBuz2'),
('5c9dad433e9207.82480928', 'BIG CHUNGUS', 'bchung@aol.net', '$2y$10$hgq7zLsED8SuvHBOpR.A5eAsV1mBH4S6cX5FfgNl5L2VJdTXuCE/W');

-- posts
INSERT INTO `Post` (`accountID`, `postID`, `postName`, `postDesc`, `postImageExt`, `datePosted`) VALUES
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
('5c9da4054b8d06.58596558', '5c9db4e33ce3a0.51421226', 'PLATELET CHAN', 'uwu', 'jpg', '2019-03-29 00:00:00');

-- comments
INSERT INTO `postcomment` (`accountID`, `postID`, `commentID`, `datePosted`, `comment`) VALUES
('5c9da4054b8d06.58596558', '5c9da52e013183.78990681', '5c9da6080eb379.05103199', '2019-03-29', 'no u');

-- omit creating a user if user account below has already been created
CREATE USER 'pg_user'@'localhost' IDENTIFIED BY 'pg_user';
GRANT SELECT, DELETE, INSERT, UPDATE ON PictureGramDB.* TO 'pg_user'@'localhost';