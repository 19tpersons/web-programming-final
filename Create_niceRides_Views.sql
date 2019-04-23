
/***********************************************************************************/
/* Create Table Views Script                                                       */
/* Shane Birdsall, Tyler Persons, Brook Stang, Snowflower Yang                     */
/* 4-11-19                                                                         */
/* Version 1	                  		                                   */
/* 3 Views:                                        	                           */
/*    BasicUserView                                                                */
/*    BasicStationView                                                             */	                                                                   */
/*    BasicTripView	                                                           */
/* Niceride Analysis                                                               */
/***********************************************************************************/

USE niceRides; /*default database*/

DROP VIEW IF EXISTS BasicUserView;
CREATE VIEW BasicUserView AS

         SELECT	 UserID, UserType
	 FROM 	 USER;


DROP VIEW IF EXISTS BasicStationView;
CREATE VIEW BasicStationView AS

	SELECT S.StationName, COUNT(*) as NumberOfTrips 
	FROM STATION s, TRIP t
	WHERE s.stationid = t.startstationid
	Group by StationID;


DROP VIEW IF EXISTS BasicTripView;
CREATE VIEW BasicTripView AS

	 SELECT T.TripID, TU.UserID, TSS.StationName as StartStationName, TSE.StationName as EndStationName 
	 FROM TRIP as T JOIN USER as TU on T.UserID = TU.UserID 
	 	JOIN STATION as TSS on T.StartStationID = TSS.StationID 
		JOIN STATION as TSE on T.EndStationID = TSE.StationID;