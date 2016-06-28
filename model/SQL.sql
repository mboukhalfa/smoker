DROP TABLE IF EXISTS stop;
DROP TABLE IF EXISTS profile;
DROP TABLE IF EXISTS smoker;


CREATE TABLE smoker (

    id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstName varchar(30) NOT NULL,
    lastName varchar(30) NOT NULL,
    email varchar(255) NOT NULL,
    passWord varchar(255) NOT NULL,
    creationDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    confirmationId varchar (255), 
    CONSTRAINT uc_email UNIQUE (email)
    
) ENGINE=InnoDB DEFAULT CHARSET= utf8;



CREATE TABLE profile (
    
    id int(10) UNSIGNED PRIMARY KEY,
    birthDate date DEFAULT NULL, #check at least 5 years from today 
    sex char(1) DEFAULT NULL,
    birthPlace varchar(30) DEFAULT NULL,
    residence varchar(255) DEFAULT NULL,
    photo varchar(255) DEFAULT NULL,
    firstCigarette date DEFAULT NULL, #check greaterthan birth
    regret char(1) DEFAULT NULL, 
    hopeStop char(1) DEFAULT NULL, 
    loveSmoking char(1) DEFAULT NULL, 
    creationDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT profile_fk_id FOREIGN KEY (id) REFERENCES smoker (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE stop (
fkId int(10) UNSIGNED,
leaved date NOT NULL,
returned date DEFAULT NULL,#check not older than leave
CONSTRAINT stop_fk_id FOREIGN KEY (fkId) REFERENCES profile (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;