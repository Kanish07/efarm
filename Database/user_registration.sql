CREATE TABLE `user_registration` (
    `ID` int(10) NOT NULL AUTO_INCREMENT,
    `UserName` varchar(20) NOT NULL,
    `FirstName` varchar(20) NOT NULL,
    `LastName` varchar(20) NOT NULL,
    `EmailID` varchar(50) NOT NULL,
    `PhoneNumber` bigint(10) NOT NULL,
    `HouseNumber` varchar(50) NOT NULL,
    `Area` varchar(100) NOT NULL,
    `District` varchar(25) NOT NULL,
    `PinCode` int(6) NOT NULL,
    `Password` varchar(20) NOT NULL,
    PRIMARY KEY (`ID`),
    UNIQUE KEY `UserName` (`UserName`)
) 