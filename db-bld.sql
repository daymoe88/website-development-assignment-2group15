SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS Assignment02;
CREATE DATABASE Assignment02;

USE Assignment02;

CREATE TABLE Product
(
    productID   INT NOT NULL
    name        VARCHAR(100) NOT NULL,
    descr       VARCHAR(2000) NOT NULL,
    price       SMALLMONEY NOT NULL,
    image       IMAGE,
    stock       INT NOT NULL,
    PRIMARY KEY (productID)
);

CREATE TABLE User
(
    userID          INT NOT NULL,
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
    totalCost   MONEY NOT NULL,
    PRIMARY KEY (userID),
    FOREIGN KEY (userID) REFERENCES User(userID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE CartProduct
(
    userID      INT NOT NULL,
    productID   INT NOT NULL,
    quantity    INT NOT NULL,
    PRIMARY KEY (userID),
    PRIMARY KEY (productID),
    FOREIGN KEY (userID) REFERENCES User(userID) ON UPDATE CASCADE ON DELETE CASCADE
    FOREIGN KEY (productID) REFERENCES Product(productID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Purchase
(
    purchaseNo      INT NOT NULL,
    userID          INT NOT NULL,
    productID       INT NOT NULL,
    dateAndTime     DATETIME NOT NULL,
    total           MONEY NOT NULL,
    quantity        INT NOT NULL,
    streetAddress   VARCHAR(50) NOT NULL,
    postcode        CHAR(4) NOT NULL,
    cardNo          TINYINT NOT NULL,
    cardName        VARCHAR(30) NOT NULL,
    cardExpiry      DATETIME NOT NULL,
    cardCVV         TINYINT NOT NULL,
    PRIMARY KEY (purchaseNo),
    PRIMARY KEY (userID),
    PRIMARY KEY (productID),
    FOREIGN KEY (userID) REFERENCES User(userID) ON UPDATE CASCADE ON DELETE CASCADE
    FOREIGN KEY (productID) REFERENCES Product(productID) ON UPDATE CASCADE ON DELETE NO ACTION
);

CREATE TABLE ProductConsole
(
    productID   INT NOT NULL,
    console     VARCHAR(20) NOT NULL,
    PRIMARY KEY (productID),
    PRIMARY KEY (console),
    FOREIGN KEY (productID) REFERENCES Product(productID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE ProductGenre
(
    productID   INT NOT NULL,
    genre       VARCHAR(20) NOT NULL,
    PRIMARY KEY (productID),
    PRIMARY KEY (genre),
    FOREIGN KEY (productID) REFERENCES Product(productID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON Assignment02.Product TO dbadmin@localhost;
GRANT all privileges ON Assignment02.User TO dbadmin@localhost;
GRANT all privileges ON Assignment02.Cart TO dbadmin@localhost;
GRANT all privileges ON Assignment02.CartProduct TO dbadmin@localhost;
GRANT all privileges ON Assignment02.Purchase TO dbadmin@localhost;
GRANT all privileges ON Assignment02.ProductConsole TO dbadmin@localhost;
GRANT all privileges ON Assignment02.ProductGenre TO dbadmin@localhost;