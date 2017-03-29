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

INSERT INTO timeline (title,content) VALUES ("மோர் மற்றும் தண்ணீர் பந்தல்","பட்டுக்கோட்டை பஸ்நிலையம் அருகில் கோடைகால மோர் மற்றும் தண்ணீர் பந்தல் திறக்கப்பட்டது.இதில் பொதுமக்களுக்கு Ex.அம்மா பேரவை மாவட்ட செயலாளர் சு.பாஸ்கர் MA.BL மற்றும் Ex. பட்டுக்கோட்டை நகர்மன்றத்தலைவர் S.R ஜவகர்பாபு BE.MBA அவர்கள் மோர் மற்றும் தண்ணீர் வழங்கிய போது.");
INSERT INTO timeline (title,content) VALUES ("இதயதெய்வம் அம்மா அவர்கள் பிறந்தநாள் ","தமிழ்நாடு முன்னாள் முதலமைச்சர் புரட்சித்தலைவி இதயதெய்வம் அம்மா அவர்கள் பிறந்தநாள் முன்னிட்டு இலவச வேஷ்டி சேலை மற்றும் மருத்துவ முகாம் இரத்ததான முகாம். மற்றும் நலத்திட்ட உதவிகள் நடைபெற்றது. இதில் நகர்மன்றத்தலைவர் S.R ஜவகர்பாபு BE.MBA, அவர்கள் வழங்கினார் இதில் அம்மா பேரவை முன்னாள் மாவட்ட செயலாளர் பண்ணவயல் சு.பாஸ்கர் அவர்களும் பட்டுக்கோட்டை சட்டமன்ற உறுப்பினர் CV.சேகர் அவர்களுக்கு தலைமை வகித்தனர்.");
INSERT INTO timeline (title,content) VALUES ("மாணவர்களுக்கு சீறுடை வழங்கியபோது","பாரம்பரியமிக்க பட்டுக்கோட்டை அரசு ஆண்கள் மேல்நிலைப்பள்ளியில் பல ஆண்டுகளுக்கு பிறகு நாடாளுமன்ற உறுப்பினர் அவர்கள் நிதியின் கீழ் நகர்மன்றத்தலைவர் அவர்கள் முயற்சியில் தற்போது புதிதாக கட்டப்பட்ட கூடைபந்து மைதானத்தில் மாணவர்கள் பயிற்சிபெற்று பத்து ஆண்டுக்கு பிறகு மாநில அளவில் சென்று இருக்கிறார்கள்.மாணவர்களை ஊக்குவிக்கும் விதமாக இராஜராஜன் நினைவு கூடைபந்து கழகம் சார்பாக நகர்மன்றத்தலைவர் இராஜராஜன் நினைவு கூடைபந்து கழகத்தின் மாவட்ட துணைதலைவரும் S.R ஜவகர்பாபு BE.MBA அவர்கள் சீறுடை வழங்கியபோது.");