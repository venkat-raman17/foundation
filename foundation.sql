<!--SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";-->

DROP TABLE IF EXISTS data;
CREATE TABLE data (
  did int NOT NULL PRIMARY KEY,
  likes int NOT NULL
) ENGINE=InnoDB;

INSERT INTO data VALUES (101,0);
INSERT INTO data VALUES (102,0);
INSERT INTO data VALUES (103,0);
INSERT INTO data VALUES (104,0);
INSERT INTO data VALUES (105,0);
INSERT INTO data VALUES (106,0);

INSERT INTO data VALUES (501,0);
INSERT INTO data VALUES (502,0);
INSERT INTO data VALUES (503,0);
INSERT INTO data VALUES (504,0);
INSERT INTO data VALUES (505,0);

DROP TABLE IF EXISTS member;

CREATE TABLE member (
  mid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  phone varchar(10) NOT NULL,
  mname varchar(20) NOT NULL,
  place varchar(20) NOT NULL,
  mcode int NOT NULL DEFAULT 0,
  joindate timestamp DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

ALTER TABLE member AUTO_INCREMENT=1001;

DROP TABLE IF EXISTS memdetails;

CREATE TABLE memdetails (
  mid int NOT NULL references member(mid),
  mlike int NOT NULL
) ENGINE=InnoDB;


DROP TABLE IF EXISTS feedback;

CREATE TABLE feedback (
  mid int NOT NULL references member(mid),
  feed varchar(510) NOT NULL
) ENGINE=InnoDB;


