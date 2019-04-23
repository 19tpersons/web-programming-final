
/***********************************************************************************/
/* Create Tables Script                                                            */
/* Shane Birdsall, Tyler Persons, Brook Stang, Snowflower Yang                     */
/* 4-11-19                                                                         */
/* Version 1	                  		                                   */
/* 4 Tables:                                        	                           */
/*    User                                                               	   */
/*    Station                                                                      */
/*    Bike	                                                                   */
/*    Trip	                                                                   */
/* Niceride Analysis                                                               */
/***********************************************************************************/

CREATE DATABASE IF NOT EXISTS niceRides;
USE niceRides;
DROP TABLE IF EXISTS USER;

CREATE  TABLE USER(
	UserID	Int             NOT NULL AUTO_INCREMENT,
	Gender		INT    NULL,
	UserType		VarChar(100)	NOT NULL,
	BirthYear		INT	        NULL,
	CONSTRAINT 	USER_PK     PRIMARY KEY(UserID)
);

DROP TABLE IF EXISTS STATION;
CREATE  TABLE STATION(
	StationID	Int 		NOT NULL AUTO_INCREMENT,
	StationName	VarChar(100) 	NOT NULL,
	Latitude    INT    NOT NULL,
	Longitude		INT        NOT NULL,
	CONSTRAINT 	STATION_PK 	PRIMARY KEY(StationID)
);

DROP TABLE IF EXISTS BIKE;
CREATE  TABLE BIKE(
	BikeID		Int		NOT NULL AUTO_INCREMENT,
	BikeType VarChar(100)   	NOT NULL,
	CONSTRAINT 	BIKE_PK	        PRIMARY KEY (BikeID)
);

DROP TABLE IF EXISTS TRIP;
CREATE  TABLE TRIP(
	TripID	 Int            NOT NULL AUTO_INCREMENT,
	StartStationID	 Int   Not NULL,
	EndStationID	 INT	NOT NULL,
	StartTime DateTime	NOT NULL,
	EndTime		 DateTime   Not NULL,
	BikeID		 Int   Not NULL,
	UserID		 Int	not NULL,
	CONSTRAINT 	 TRIP_PK      PRIMARY KEY(TripID),
	CONSTRAINT 	TRIP_USER_FK  FOREIGN KEY (UserID)
			      REFERENCES User(UserID)
			      ON UPDATE NO ACTION   ON DELETE NO ACTION,
	CONSTRAINT 	TRIP_STATION_START_FK  FOREIGN KEY(StartStationID)
			      REFERENCES Station(StationID)
			      ON UPDATE NO ACTION   ON DELETE NO ACTION,
	CONSTRAINT 	TRIP_STATION_END_FK  FOREIGN KEY(EndStationID)
			      REFERENCES Station(StationID)
			      ON UPDATE NO ACTION   ON DELETE NO ACTION
);
