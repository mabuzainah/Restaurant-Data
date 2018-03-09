CREATE TABLE LOCATION
(LocationID CHAR(3) PRIMARY KEY NOT NULL,
OPENING_DATE CHAR(15) NOT NULL,
MANAGER VARCHAR(10) NOT NULL,
PHONE_NUMBER CHAR (10) NOT NULL,
ADDRESS CHAR (35) NOT NULL,
OPENING_TIME CHAR (5),
CLOSING_TIME CHAR (5),
RestID CHAR(4) REFERENCES RESTAURANT(RestaurantID)
);

CREATE TABLE RESTAURANT
(RestaurantID CHAR(4) PRIMARY KEY NOT NULL,
NAME CHAR(15) NOT NULL,
TYPE VARCHAR(10) NOT NULL,
URL CHAR(50) NOT NULL
);

CREATE TABLE RATER   
(UserID CHAR(3) PRIMARY KEY,
NAME CHAR(15),
EMAIL CHAR(15),
JOINDATE CHAR(15) //Have to figure out how to set current date,
TYPE CHAR(3),
REPUTATION INTEGER DEFAULT '1',
CONSTRAINT rating CHECK (REPUTATION >= '1' AND REPUTATION <= '5') 
);

CREATE TABLE RATING
(UID CHAR(3) REFERENCES RATER(UserID),
PRICE_RATING INTEGER NOT NULL DEFAULT '1',
FOOD_RATING INTEGER NOT NULL,
MOOD_RATING INTEGER NOT NULL,
STAFF_RATING INTEGER NOT NULL,
COMMENTS VARCHAR(50),
RestID CHAR(4) REFERENCES RESTAURANT(RestaurantID),
CONSTRAINT price_Rating CHECK (PRICE_RATING >= '1' AND PRICE_RATING <= '5'),
CONSTRAINT food_Rating CHECK (FOOD_RATING >= '1' AND FOOD_RATING <= '5'),
CONSTRAINT mood_Rating CHECK (MOOD_RATING >= '1' AND MOOD_RATING <= '5'),
CONSTRAINT staff_Rating CHECK (STAFF_RATING >= '1' AND STAFF_RATING <= '5')
);

CREATE TABLE MENUITEM
(ItemID CHAR(3) PRIMARY KEY NOT NULL,
NAME CHAR(15) NOT NULL,
TYPE VARCHAR(10) NOT NULL,
CATEGORY VARCHAR(8) NOT NULL,
DESCRIPTION VARCHAR(50) NOT NULL,
PRICE DECIMAL (3,2) NOT NULL,
RestaurantID CHAR(4) REFERENCES RESTAURANT(RestaurantID),
CONSTRAINT type_Const CHECK (TYPE = 'Food' OR TYPE = 'Beverage')
);

CREATE TABLE RATINGITEM
(UserID CHAR(4) REFERENCES RATER(UserID),
DATE_RATED VARCHAR(10) ,
ItemID CHAR(3) REFERENCES MENUITEM(ItemID),
RATING INTEGER NOT NULL,
COMMENTS VARCHAR(50)
);

CREATE TABLE REFERS 
(RID CHAR(4) REFERENCES RESTAURANT(RestaurantID),
MI CHAR(3) REFERENCES MENUITEM(ItemID));

ALTER TABLE RESTAURANT
ADD COLUMN LocationID CHAR (3) REFERENCES LOCATION (LocationID);

INSERT INTO RESTAURANT
VALUES
('001','Jimmy The Greek','Greek','www.jimmythegreek.com','256');

INSERT INTO RESTAURANT
VALUES
('002','Shawarma Palace','Middle Eastern','www.shawarmapalace.ca','367');

INSERT INTO RESTAURANT
VALUES
('003','Topkapi','Turkish','www.topkapi.com','489');

INSERT INTO RESTAURANT
VALUES
('004','Matar Kebab','Middle Eastern','www.matarkebab.com','591');

INSERT INTO RESTAURANT
VALUES
('005','Thai Express','Thai','www.thaiexpress.com','612');

INSERT INTO RESTAURANT
VALUES
('006','Mucho Burrito','Mexican','www.muchoburrito.com','723');

INSERT INTO RESTAURANT
VALUES
('007','Ten Sushi','Japanese','www.tensushi.com','834');

INSERT INTO RESTAURANT
VALUES
('008','Subway','American','www.subway.com','945');

INSERT INTO RESTAURANT
VALUES
('009','Tche Tche','Middle Eastern','www.tchetchecafe.com','056');

INSERT INTO RESTAURANT
VALUES
('010','La Mer','French','www.omanicuisine.com/la-mer-shatti-al-qurum','167');

INSERT INTO RESTAURANT
VALUES
('011','Cora','American','www.chezcora.com','289');

INSERT INTO RESTAURANT
VALUES
('012','TAJ Indian Cuisine','Indian','https://tajindiancuisine.com/en','390');

INSERT INTO RATER
VALUES
('100','Alexander Black','alexblack@gmail.com','09/03/2018','1');

INSERT INTO RATER
VALUES
('101','Erik Rhodes','erik@gmail.com','07/03/2018','1');

INSERT INTO RATER
VALUES
('102','Osama Al Mazloum','osama_almazloum@gmail.com','09/03/2016','4');

INSERT INTO RATER
VALUES
('103','Alex White','alexwhite@gmail.com','09/03/2018','4');

INSERT INTO RATER
VALUES
('104','Alexis Morningstar','alexis@gmail.com','09/03/2018','1');

INSERT INTO RATER
VALUES
('105','Alexander Black','alexblack@gmail.com','09/03/2018','4');

INSERT INTO RATER
VALUES
('106','Alexander Black','alexblack@gmail.com','09/03/2018','4');

INSERT INTO RATER
VALUES
('107','Alexander Black','alexblack@gmail.com','09/03/2018','3');

INSERT INTO RATER
VALUES
('108','Alexander Black','alexblack@gmail.com','09/03/2018','5');

INSERT INTO RATER
VALUES
('109','Alexander Black','alexblack@gmail.com','09/03/2018','5');

INSERT INTO RATER
VALUES
('110','Alexander Black','alexblack@gmail.com','09/03/2018','5');

INSERT INTO RATER
VALUES
('111','Alexander Black','alexblack@gmail.com','09/03/2018','5');

INSERT INTO RATER
VALUES
('112','Alexander Black','alexblack@gmail.com','09/03/2018','3');

INSERT INTO RATER
VALUES
('113','Sherif El Hajj','sherif@gmail.com','01/09/2017','3');

INSERT INTO RATER
VALUES
('114','Amanda Black','amandablack@gmail.com','10/08/2017','4');