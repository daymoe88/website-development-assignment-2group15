SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS Assignment02;
CREATE DATABASE Assignment02;

USE Assignment02;

CREATE TABLE Product
(
    productID   CHAR(5) NOT NULL,
    console     ENUM("Nintendo Switch", "Xbox One", "Xbox Series X", "PlayStation 4", "PlayStation 5") NOT NULL,
    name        VARCHAR(100) NOT NULL,
    descr       VARCHAR(2000) NOT NULL,
    price       DECIMAL(5, 2) NOT NULL,
    image       BLOB,
    stock       INT NOT NULL,
    PRIMARY KEY (productID)
);

CREATE TABLE UserAccount
(
    userID          INT NOT NULL AUTO_INCREMENT,
    firstName       VARCHAR(20) NOT NULL,
    lastName        VARCHAR(20) NOT NULL,
    email           VARCHAR(50) NOT NULL,
    password        VARCHAR(20) NOT NULL,
    streetAddress   VARCHAR(50),
    postcode        CHAR(4),
    cardNo          TINYINT,
    cardName        VARCHAR(30),
    cardExpiry      DATETIME,
    cardCVV         TINYINT,
    PRIMARY KEY (userID)
);

CREATE TABLE Cart
(
    userID      INT NOT NULL,
    totalCost   DECIMAL(7, 2) NOT NULL,
    PRIMARY KEY (userID),
    FOREIGN KEY (userID) REFERENCES UserAccount(userID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE CartProduct
(
    userID      INT NOT NULL,
    productID   CHAR(5) NOT NULL,
    quantity    INT NOT NULL,
    PRIMARY KEY (userID, productID),
    FOREIGN KEY (userID) REFERENCES UserAccount(userID) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (productID) REFERENCES Product(productID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Purchase
(
    purchaseNo      INT NOT NULL AUTO_INCREMENT,
    userID          INT NOT NULL,
    productID       CHAR(5) NOT NULL,
    dateAndTime     DATETIME NOT NULL,
    total           DECIMAL(7, 2) NOT NULL,
    quantity        INT NOT NULL,
    streetAddress   VARCHAR(50) NOT NULL,
    postcode        CHAR(4) NOT NULL,
    cardNo          TINYINT NOT NULL,
    cardName        VARCHAR(30) NOT NULL,
    cardExpiry      DATETIME NOT NULL,
    cardCVV         TINYINT NOT NULL,
    PRIMARY KEY (purchaseNo, userID, productID),
    FOREIGN KEY (userID) REFERENCES UserAccount(userID) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (productID) REFERENCES Product(productID) ON UPDATE CASCADE ON DELETE NO ACTION
);

CREATE TABLE ProductGenre
(
    productID   CHAR(5) NOT NULL,
    genre       ENUM("Platformer", "Open World") NOT NULL,
    PRIMARY KEY (productID, genre),
    FOREIGN KEY (productID) REFERENCES Product(productID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON Assignment02.Product TO dbadmin@localhost;
GRANT all privileges ON Assignment02.UserAccount TO dbadmin@localhost;
GRANT all privileges ON Assignment02.Cart TO dbadmin@localhost;
GRANT all privileges ON Assignment02.CartProduct TO dbadmin@localhost;
GRANT all privileges ON Assignment02.Purchase TO dbadmin@localhost;
GRANT all privileges ON Assignment02.ProductGenre TO dbadmin@localhost;