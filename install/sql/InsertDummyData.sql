-- Dummy Farbthemen
INSERT INTO `farbthema` (`FarbthemaID`, `Name`, `Dateiname`) VALUES (NULL, 'Dark', 'dark');
INSERT INTO `farbthema` (`FarbthemaID`, `Name`, `Dateiname`) VALUES (NULL, 'Light', 'light');

-- Dummy Nutzer
INSERT INTO `nutzer` (`NutzerID`, `Nutzername`, `Passwort`, `istOnline`, `gewaehltesThema`) VALUES (NULL, 'Benny', 'PASSWORT1', '0', '2'), (NULL, 'Philipp', 'PASSWORT2', '0', '1'), (NULL, 'Mert', 'PASSWORT3', '0', '1');

-- Dummy Chatnachrichten
INSERT INTO `nachricht` (`NachrichtID`, `Verfasser`, `Nachricht`, `Zeitpunkt`, `Chatraum`) VALUES (NULL, '1', 'Hey Leute was geht?', CURRENT_TIMESTAMP, '1'), (NULL, '2', 'Jo, alles cool.', CURRENT_TIMESTAMP, '1'), (NULL, '3', 'Bei mir auch.', CURRENT_TIMESTAMP, '1');
