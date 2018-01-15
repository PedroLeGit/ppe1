CREATE TABLE "candidate"(
    id_candidate SERIAL,
    firstname varchar(20) NOT NULL,
    lastname varchar(20) NOT NULL,
    email varchar(70) NOT NULL,
    address varchar(100) NOT NULL,
    city varchar(50) NOT NULL,
    postalcode varchar(5) NOT NULL,
    username varchar (20) NOT NULL UNIQUE,
    password varchar(250) NOT NULL,
    created TIMESTAMP WITHOUT TIME ZONE,
    updated TIMESTAMP WITHOUT TIME ZONE,
    CONSTRAINT pk_candidate PRIMARY KEY(id_candidate)
);
CREATE TABLE "experience"(
    id_experience SERIAL,
    candidate int NOT NULL,
    label varchar(100) NOT NULL,
    CONSTRAINT pk_experience PRIMARY KEY (id_experience),
    CONSTRAINT fk_candidate FOREIGN KEY (candidate) REFERENCES candidate(id_candidate)
);
CREATE TABLE "formation"(
    id_formation SERIAL,
    candidate int NOT NULL,
    label varchar(100) NOT NULL,
    CONSTRAINT pk_formation PRIMARY KEY(id_formation),
    CONSTRAINT fk_candidate FOREIGN KEY (candidate) REFERENCES candidate(id_candidate)
);
CREATE TABLE "skill"(
    id_skill SERIAL,
    label varchar(100) NOT NULL,
    CONSTRAINT pk_skill PRIMARY KEY(id_skill)
);
CREATE TABLE "level"(
    id_level SERIAL,
    label varchar(100) NOT NULL,
    CONSTRAINT pk_level PRIMARY KEY(id_level)
);
CREATE TABLE "skill_candidate_level"(
    skill int NOT NULL,
    candidate int NOT NULL,
    level int NOT NULL,
    CONSTRAINT pk_skill_candidate_level PRIMARY KEY(skill,candidate),
    CONSTRAINT fk1_skill_candidate_level FOREIGN KEY (skill) REFERENCES skill(id_skill),
    CONSTRAINT fk2_skill_candidate_level FOREIGN KEY (candidate)  REFERENCES candidate(id_candidate),
    CONSTRAINT fk3_skill_candidate_level FOREIGN KEY (level)  REFERENCES level(id_level)
);

CREATE TABLE "hrm"(
    id_hrm SERIAL,
    username varchar (20) NOT NULL UNIQUE,
    password varchar(250) NOT NULL,
    firstname varchar(20) NOT NULL,
    lastname varchar(20) NOT NULL,
    email varchar(70) NOT NULL,
    address varchar(100) NOT NULL,
    city varchar(50) NOT NULL,
    postalcode varchar(5) NOT NULL,
    created TIMESTAMP WITHOUT TIMEZONE,
    updated TIMESTAMP WITHOUT TIMEZONE,
    CONSTRAINT pk_drh PRIMARY KEY(id_hrm)
);

