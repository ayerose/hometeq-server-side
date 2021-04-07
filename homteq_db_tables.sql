-- sql script to create product table

CREATE TABLE Product2
(


  prodId              INTEGER(4)         AUTO_INCREMENT,
  prodName            VARCHAR (30)       NOT NULL,
  prodPicNameSmall    VARCHAR (100)      NOT NULL,
  prodPicNameLarge    VARCHAR (100)      NOT NULL,
  prodDescripShort    VARCHAR (1000)    ,
  prodDescripLong     VARCHAR (3000)    ,
  prodPrice           DECIMAL (6,2)     NOT NULL,
  prodQuantity        INTEGER (4)       NOT NULL,
  CONSTRAINT          p_pid_pk          PRIMARY KEY (prodId)

);

--- paste into SQL in phpmyadmin


--- sql script to populate the product TABLE


INSERT INTO
Product
(prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES
('HP Printer', 'pic1.jpg', 'pic2.jpg', 'Print, copy, scan and fax', '6 month free trial of HP Instant Ink
WiFi / Apple AirPrint', 99.00, 35) -- VARCHAR IMMER IN SINGLE QUOTES

('HP Printer', 'pic1.jpg', 'pic2.jpg', 'Print, copy, scan and fax', '6 month free trial of HP Instant Ink
WiFi / Apple AirPrint', 99.00, 35)

('HP Printer', 'pic1.jpg', 'pic2.jpg', 'Print, copy, scan and fax', '6 month free trial of HP Instant Ink
WiFi / Apple AirPrint', 99.00, 35)

('HP Printer', 'pic1.jpg', 'pic2.jpg', 'Print, copy, scan and fax', '6 month free trial of HP Instant Ink
WiFi / Apple AirPrint', 99.00, 35)

-- sript to create product table

CREATE TABLE User 
(
  userId INTEGER(4) AUTO_INCREMENT,
  userType VARCHAR(1) NOT NULL,
    userFName VARCHAR(50) NOT NULL,
      userSName VARCHAR(50) NOT NULL,
        userAddress VARCHAR(100) NOT NULL,
          userPostcode VARCHAR(15) NOT NULL,
            userTelNo VARCHAR(20) NOT NULL,
              userEmail VARCHAR(100) NOT NULL UNIQUE,
                userPassword VARCHAR(50) NOT NULL,
                CONSTRAINT u_uid_pk PRIMARY KEY (userId)

)

CREATE TABLE Orders 
(
  orderNo INTEGER(4) AUTO_INCREMENT,
  userId INTEGER(4) NOT NULL,
  orderDateTime DATETIME NOT NULL,
  orderTotal DECIMAL(8, 2),
  orderStatus VARCHAR(50),
          
        CONSTRAINT o_ono_pk PRIMARY KEY (orderNo),
        CONSTRAINT o_uid_fk FOREIGN KEY (userId) REFERENCES User(userId)

);




CREATE TABLE Order_Line
(
  orderLineId INTEGER(4) AUTO_INCREMENT,
  orderNo     INTEGER(4) NOT NULL,
  prodId      INTEGER(4) NOT NULL,
  quantityOrdered INTEGER(3) NOT NULL,
  subTotal DECIMAL(8,2),


 CONSTRAINT ol_olid_pk PRIMARY KEY (orderLineId), 
 CONSTRAINT ol_ono_fk FOREIGN KEY (orderNo) REFERENCES Orders(orderNo),
 CONSTRAINT ol_pid_fk FOREIGN KEY (prodId) REFERENCES Product(prodId)
);