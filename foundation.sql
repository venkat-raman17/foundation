<!--SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";-->

DROP TABLE IF EXISTS member;

CREATE TABLE member (
  mid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  phone varchar(10) NOT NULL,
  mname varchar(20) NOT NULL,
  place varchar(20) NOT NULL,
  mcode int NOT NULL DEFAULT 0,
  vote int DEFAULT 0,
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

DROP TABLE IF EXISTS timeline;

CREATE TABLE timeline (
  tid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title varchar(50) NOT NULL,
  content varchar(510) NOT NULL,
  tdate timestamp DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE timeline AUTO_INCREMENT=101;

DROP TABLE IF EXISTS gallery;

CREATE TABLE gallery (
  gid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title varchar(50) NOT NULL,
  gdate timestamp DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE gallery AUTO_INCREMENT=5001;

DROP TABLE IF EXISTS admins;
CREATE TABLE admins (
  username varchar(15) NOT NULL PRIMARY KEY,
  password varchar(15) NOT NULL
) ENGINE=InnoDB;

INSERT INTO admins VALUES ('admin','admin123');
