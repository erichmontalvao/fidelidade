drop database if exists Fidelidade;
create database Fidelidade;
use Fidelidade;

drop table if exists activity_types;
CREATE TABLE activity_types (
	Id_activity_types INT PRIMARY KEY AUTO_INCREMENT,
	ActivityName varchar(255)
);

drop table if exists permission;
CREATE TABLE permission (
    Id_permission INT PRIMARY KEY AUTO_INCREMENT,
    PerType VARCHAR(255),
    TableName VARCHAR(255)
);

drop table if exists user;
CREATE TABLE user (
	Id_user INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255),
	surname VARCHAR(255),
	email VARCHAR(255),
	password_user VARCHAR(255),
	status_user BOOL,
	Id_team INT,
	FOREIGN KEY (Id_team ) REFERENCES team (Id_team)
);

drop table if exists vehicle;
CREATE TABLE vehicle (
    Id_vehicle INT PRIMARY KEY AUTO_INCREMENT,
    Id_user INT,
    brand VARCHAR(255),
    plate VARCHAR(255),
    FOREIGN KEY (Id_user)
        REFERENCES user (Id_user)
);

drop table if exists user_with_permissions;
CREATE TABLE user_with_permissions (
    Id_user_with_permissions INT PRIMARY KEY AUTO_INCREMENT,
    CodPer VARCHAR(255),
    userType INT,
    FOREIGN KEY (userType)
        REFERENCES user (Id_user)
);

drop table if exists session;
CREATE TABLE session (
    Id_session INT PRIMARY KEY AUTO_INCREMENT,
    Id_user_session INT,
    date DATE,
    hour TIME,
    FOREIGN KEY (Id_user_session)
        REFERENCES user (Id_user)
);

drop table if exists session_log;
CREATE TABLE session_log (
    Id_session_activities INT PRIMARY KEY AUTO_INCREMENT,
    CodActivity INT,
    CodSession INT,
    date DATE,
    hour TIME,
    FOREIGN KEY (CodActivity)
        REFERENCES activity_types (Id_activity_types),
    FOREIGN KEY (CodSession)
        REFERENCES session (Id_session)
);

drop table if exists building;
CREATE TABLE building (
    Id_building INT PRIMARY KEY AUTO_INCREMENT,
    CodBuiding INT
);

drop table if exists floor;
CREATE TABLE floor (
    Id_floor INT PRIMARY KEY AUTO_INCREMENT,
    CodFloor INT,
    CodBuilding INT,
    FloorType VARCHAR(255),
    FOREIGN KEY (CodBuilding)
        REFERENCES building (Id_building)
);

drop table if exists space;
CREATE TABLE space (
    Id_space INT PRIMARY KEY AUTO_INCREMENT,
    CodSpace INT,
    CodFloor INT,
    SpaceType VARCHAR(55),
    status_space BOOL,
    FOREIGN KEY (CodFloor)
        REFERENCES Floor (Id_Floor)
);

drop table if exists spaceQrCode;
CREATE TABLE spaceQrCode (
    Id_spaceQrCode INT PRIMARY KEY AUTO_INCREMENT,
    QR_code BLOB,
    Id_space INT,
    FOREIGN KEY (Id_space)
        REFERENCES space (Id_space)
);

drop table if exists reservationType;
CREATE TABLE reservationType (
    Id_reservationType INT PRIMARY KEY AUTO_INCREMENT,
    name_reservationType VARCHAR(55)
);

drop table if exists period;
CREATE TABLE period (
    Id_period INT PRIMARY KEY AUTO_INCREMENT,
    periodType VARCHAR(55)
);

drop table if exists team;
CREATE TABLE team (
    Id_team INT PRIMARY KEY AUTO_INCREMENT,
    team_name VARCHAR(55),
    total_vacancies INT
);

drop table if exists reservation;
CREATE TABLE reservation (
    Id_reservation INT PRIMARY KEY AUTO_INCREMENT,
    username INT,
    CodSpace INT,
    Id_vehicle INT,
    Reservation_Date DATE,
    Id_spaceQrCode INT,
    Id_reservationType INT,
    Id_period INT,
    Id_team INT,
    FOREIGN KEY (username)
        REFERENCES user (Id_user),
    FOREIGN KEY (CodSpace)
        REFERENCES space (Id_space),
    FOREIGN KEY (Id_spaceQrCode)
        REFERENCES spaceQrCode (Id_spaceQrCode),
    FOREIGN KEY (Id_reservationType)
        REFERENCES reservationType (Id_reservationType),
    FOREIGN KEY (Id_period)
        REFERENCES period (Id_period),
    FOREIGN KEY (Id_team)
        REFERENCES team (Id_team)
);