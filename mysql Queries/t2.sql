USE cdws;
CREATE DATABASE CDWS;
DROP DATABASE CDWS;

CREATE TABLE adj_id(
	id INT, 
    state VARCHAR (255),
    PRIMARY KEY (id)
);
INSERT INTO adj_id VALUES(1, ".رئيس مجلس الإدارة أو العُضو المُنتدب في شركات الأموال بحسب الأحوال");
INSERT INTO adj_id VALUES(2, ".الشريك المُتضامن المنوط به الإدارة في شركات الأشخاص");
INSERT INTO adj_id VALUES(3, ".عُضو مجلس الإدارة من مالكي لأسهُم في شركات المُساهمة");
INSERT INTO adj_id VALUES(4, ".من أصحاب الحصص بالشركات ذات المسئولية المحدودة");
INSERT INTO adj_id VALUES(5, ".مالك المُنشأة الفردية");


CREATE TABLE authorize(
	ssn int,
    phone VARCHAR(250),
    email VARCHAR(250),
    idNumber int, -- rkm el odweya
    PRIMARY KEY(ssn)
);
INSERT INTO authorize VALUES(1 , "01066445323" , "OMARESSAMDESOUKY@GMAI.COM" , 201900520 );


CREATE TABLE category(
	id INT,
    name VARCHAR(250),
    PRIMARY KEY(id)
);
INSERT INTO category VALUES(1 , "مركز غوص");
INSERT INTO category VALUES(2 , "مركز أنشطة بحرية");
INSERT INTO category VALUES(3 , "يخت سفاري");


CREATE TABLE persons( -- THAT TABLE STANDS FOR THE OWNERS
	ssn int,
    name VARCHAR(255),
    phone VARCHAR(255),
	email VARCHAR(255),
    adjId int,
    ssnVisitor int DEFAULT NULL,
    approven boolean DEFAULT NULL,
	PRIMARY KEY(ssn),
	FOREIGN KEY (adjId) REFERENCES adj_id(id),
	FOREIGN KEY (ssnVisitor) REFERENCES authorize(ssn)
);
INSERT INTO persons VALUES(1, "AHMED" , "045454545" , "ahmed@gmail.com" , 1 , DEFAULT(SSNVISITOR) ,  DEFAULT(APPROVEN));
INSERT INTO persons VALUES(2, "OMAR" , "69845345" , "omar34@gmail.com" , 2 , 1 , false);
INSERT INTO persons VALUES(3, "ali" , "786786787" , "ali87@gmail.com" , 3 ,DEFAULT(SSNVISITOR) ,  DEFAULT(APPROVEN));
INSERT INTO persons VALUES(4, "mostafa" , "5876555" , "Mo87@gmail.com" , 4 ,DEFAULT(SSNVISITOR) ,  DEFAULT(APPROVEN));


CREATE TABLE foundation(
	id int AUTO_INCREMENT ,
	ssnPerson int,
	name VARCHAR(250),
    place VARCHAR(250),
    foundationId int,
    licenceId int,
    idNumberRoom int,
    PRIMARY KEY (id),
    FOREIGN KEY (ssnPerson) REFERENCES persons(ssn),
    FOREIGN KEY (foundationId) REFERENCES category(id)
);
INSERT INTO foundation(ssnPerson ,name , place ,foundationId , licenceId ,idNumberRoom) VALUES(1 , "microsoft" , "cairo" , 2 , 1200 , 155);
INSERT INTO foundation(ssnPerson ,name , place ,foundationId , licenceId ,idNumberRoom) VALUES(3 , "google" , "cairo" , 3 , 1200 , 155);
INSERT INTO foundation(ssnPerson ,name , place ,foundationId , licenceId ,idNumberRoom) VALUES(2 , "amazon" , "cairo" , 1 , 1200 , 155);
INSERT INTO foundation(ssnPerson ,name , place ,foundationId , licenceId ,idNumberRoom) VALUES(4 , "twitter" , "cairo" , 1 , 1200 , 155);


CREATE TABLE LOGIN(
	EMAIL VARCHAR(250),
    PASSWORD VARCHAR(250),
    PRIMARY KEY(EMAIL)
);
INSERT INTO LOGIN VALUES ("admin" , "123");
