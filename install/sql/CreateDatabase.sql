-- == Genutze Resourcen ==
-- MariaDB Datentypen: https://mariadb.com/kb/en/library/data-types/
-- MariaDB CREATE TABLE: https://mariadb.com/kb/en/library/create-table/
-- MariaDB Collation: https://mariadb.com/kb/en/library/setting-character-sets-and-collations/
-- MariaDB Trigger: https://mariadb.com/kb/en/library/trigger-overview/

DROP DATABASE IF EXISTS Chatinga;
CREATE DATABASE Chatinga
  CHARACTER SET = 'utf8'
  COLLATE = 'utf8_bin'; -- Case Sensitive -> Es können gleiche Nutzernamen mit verschiedenen Groß/Kleinschreibungen angelegt und korrekt abgefragt werden
USE Chatinga;

-- In MariaDB ist es scheinbar üblich, die meisten Spalteneigenschaften nicht über ein Constraint anzugeben, sondern Inline: https://mariadb.com/kb/en/library/constraint/
-- Ich habs trotzdem, meistens, wo möglich, Out-of-line gemacht
--
-- Die Zahl in Klammern nach VARCHAR bestimmt die Größe in Characters
-- https://mariadb.com/kb/en/library/varchar/

CREATE TABLE Farbthema (
    FarbthemaID SMALLINT NOT NULL AUTO_INCREMENT,
    Name VARCHAR(30) NOT NULL,
    ChatfensterTextfarbe VARCHAR(20) NOT NULL,
    ChatfensterRahmenfarbe VARCHAR(20) NOT NULL,
    ChatfensterHintergrundfarbe VARCHAR(20) NOT NULL,
    ChatfensterHintergrundbild VARCHAR(301) NULL,
    OnlinelisteTextfarbe VARCHAR(20) NOT NULL,
    OnlinelisteRahmenfarbe VARCHAR(20) NOT NULL,
    OnlinelisteHintergrundfarbe VARCHAR(20) NOT NULL,
    OnlinelisteHintergrundbild VARCHAR(300) NULL,
    TextfeldTextfarbe VARCHAR(20) NOT NULL,
    TextfeldRahmenfarbe VARCHAR(20) NOT NULL,
    TextfeldHintergrundfarbe VARCHAR(20) NOT NULL,
    TextfeldHintergrundbild VARCHAR(300) NULL,
    -- Erweiterung und Änderungen auf Anfrage des Designers

    CONSTRAINT Farbthema_PK PRIMARY KEY (FarbthemaID),
    CONSTRAINT Farbthema_Name_UNQ UNIQUE (Name)
);
-- Farben in Hexadzimalschreibweise #27bf45 oder html-Farbnamen. Größe gewählt, da der längste html-Farbname 20 Zeichen lang ist
-- Bilder sind Dateipfade oder Gradients, können null enthalten
-- Farbthema mit der ID 1 ist das Standardfarbthema

CREATE TABLE Nutzer (
	NutzerID INT NOT NULL AUTO_INCREMENT,
	Nutzername VARCHAR(30) NOT NULL,
	Passwort VARCHAR(255) NOT NULL,
	istOnline BOOL NOT NULL DEFAULT 0,
	gewaehltesThema SMALLINT NULL DEFAULT 1, -- FK auf Farbthema

	CONSTRAINT Nutzer_Nutzername_UNQ UNIQUE (Nutzername),
	CONSTRAINT Nutzer_PK PRIMARY KEY (NutzerID),
	CONSTRAINT Nutzer_gewaehltesThema_FK FOREIGN KEY (gewaehltesThema)
		REFERENCES Farbthema (FarbthemaID) ON DELETE SET NULL
);
-- Größe des Passwort Feldes vorgeschlagen von https://secure.php.net/manual/en/function.password-hash.php

-- Trigger, der das gewählte Farbthema eines Nutzers auf 1 zurücksetzt, wenn das vom Nutzer gewählte Thema aus der Datenbank gelöscht wird.
CREATE TRIGGER reset_Nutzer_gewaehltesThema
AFTER DELETE ON Farbthema
FOR EACH ROW
UPDATE Nutzer SET Nutzer.gewaehltesThema = 1
WHERE Nutzer.gewaehltesThema IS NULL;

CREATE TABLE Chatraum (
	ChatraumID INT NOT NULL AUTO_INCREMENT,
	Ersteller INT NULL, -- NULL für Standardräume
	Name VARCHAR(20) NOT NULL,
	Thema VARCHAR(100) NOT NULL,

	CONSTRAINT Chatraum_PK PRIMARY KEY (ChatraumID),
	CONSTRAINT Chatraum_Ersteller_FK FOREIGN KEY (Ersteller)
		REFERENCES Nutzer(NutzerID) ON DELETE RESTRICT,
		-- Ein Nutzer der einmal einen Raum angelegt hat, kann nicht mehr aus der Datenbank gelöscht werden.
	CONSTRAINT Chatraum_Name_UNQ UNIQUE (Name)
);

INSERT INTO `chatraum` (`Name`, `Thema`) VALUES ('General', 'Raum für Alles was das Herz begehrt.'), ('Ü20', 'Nur (halbwegs) Erwachsene erlaubt!');

CREATE TABLE Nachricht (
	NachrichtID INT NOT NULL AUTO_INCREMENT,
	Verfasser INT NOT NULL,
	Nachricht VARCHAR(2000) NOT NULL,
	Zeitpunkt TIMESTAMP NOT NULL,
	Chatraum INT(6) NOT NULL,

    CONSTRAINT Nachricht_PK PRIMARY KEY (NachrichtID),
	CONSTRAINT Nachricht_Verfasser_FK FOREIGN KEY (Verfasser)
		REFERENCES Nutzer(NutzerID) ON DELETE RESTRICT,
	CONSTRAINT Nachricht_Chatraum_FK FOREIGN KEY (Chatraum)
		REFERENCES Chatraum(ChatraumID) ON DELETE RESTRICT
		-- Ein Nutzer der einmal eine Nachricht geschrieben hat, kann nicht mehr aus der Datenbank gelöscht werden.
);
