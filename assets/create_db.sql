-- Create the PictureGram database
DROP DATABASE IF EXISTS PictureGramDB;
CREATE DATABASE PictureGramDB;
USE PictureGramDB;

-- create the tables
CREATE TABLE Account (
    accountID CHAR(13) NOT NULL,
    profilePath VARCHAR(255), -- make NOT NULL later???
    username VARCHAR(255) NOT NULL,
    userPassword VARCHAR(255) NOT NULL,
    PRIMARY KEY (accountID)
);

CREATE TABLE Post (
    accountID CHAR(13) NOT NULL,
    postID CHAR(13) NOT NULL,
    titleName VARCHAR(255) NOT NULL,
    datePosted DATETIME NOT NULL,
    imagePath VARCHAR(255), -- make NOT NULL later
    PRIMARY KEY (postID),
    FOREIGN KEY (accountID)
        REFERENCES Account (accountID)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE PostComment (
    accountID CHAR(13) NOT NULL,
    postID CHAR(13) NOT NULL,
    commentID CHAR(13) NOT NULL,
    datePosted DATETIME NOT NULL,
    comment VARCHAR(255),
    PRIMARY KEY (commentID),
    FOREIGN KEY (accountID)
        REFERENCES Account (accountID)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- insert data into the database
INSERT INTO Account VALUES
('ilhpstuegauaz', '', 'PurePete', 'P@$$w0rd'),
('lslmo7tbuj88l', '', 'NotABot', 'h00m4n'),
('gpelqsask17et', '', 'PapaFrank', '3yb0$$');

INSERT INTO Post VALUES
('ilhpstuegauaz', 'P000000000001', 'My First Post', now(), ''),
('ilhpstuegauaz', 'P000000000002', 'HBD', '2019-03-03 12:00:00', ''),
('gpelqsask17et', 'P000000000003', 'NYEESSSS', '2019-04-05 12:00:00', '');

INSERT INTO PostComment VALUES
('lslmo7tbuj88l', 'P000000000001', 'PC00000000001', 'HBD', '2019-01-03 12:00:00', 'Very nice fellow human. Not beep boop.'),
('gpelqsask17et', 'P000000000001', 'Pc00000000002', 'NYEESSSS', '2019-02-03 12:00:00', 'Go commit anti alive');

-- create the users and grant priveleges to those users
-- GRANT SELECT, INSERT, DELETE, UPDATE
-- ON PictureGramDB.*
-- TO PurePete@localhost
-- IDENTIFIED BY 'pa55word';

-- GRANT SELECT
-- ON products
-- TO mgs_tester@localhost
-- IDENTIFIED BY 'P@$$w0rd';

-- Create a user named mgs_user
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';