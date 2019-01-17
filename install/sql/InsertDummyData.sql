-- Dummy Farbthemen
INSERT INTO `farbthema` (`FarbthemaID`, `Name`, `ChatfensterTextfarbe`, `ChatfensterRahmenfarbe`, `ChatfensterHintergrundfarbe`, `ChatfensterHintergrundbild`, `OnlinelisteTextfarbe`, `OnlinelisteRahmenfarbe`, `OnlinelisteHintergrundfarbe`, `OnlinelisteHintergrundbild`, `TextfeldTextfarbe`, `TextfeldRahmenfarbe`, `TextfeldHintergrundfarbe`, `TextfeldHintergrundbild`) VALUES (NULL, 'Standard', 'black', 'black', 'MediumSlateBlue', NULL, 'black', 'black', 'SlateBlue', NULL, 'black', 'black', 'MediumSlateBlue', NULL);
INSERT INTO `farbthema` (`FarbthemaID`, `Name`, `ChatfensterTextfarbe`, `ChatfensterRahmenfarbe`, `ChatfensterHintergrundfarbe`, `ChatfensterHintergrundbild`, `OnlinelisteTextfarbe`, `OnlinelisteRahmenfarbe`, `OnlinelisteHintergrundfarbe`, `OnlinelisteHintergrundbild`, `TextfeldTextfarbe`, `TextfeldRahmenfarbe`, `TextfeldHintergrundfarbe`, `TextfeldHintergrundbild`) VALUES (NULL, 'Yellow', 'black', 'DarkOrange', 'LightGoldenrodYellow', NULL, 'black', 'DarkOrange', 'LemonChiffon', NULL, 'black', 'DarkOrange', 'LightGoldenrodYellow', NULL);

-- Dummy Nutzer
INSERT INTO `nutzer` (`NutzerID`, `Nutzername`, `Passwort`, `istOnline`, `gewaehltesThema`) VALUES (NULL, 'Benny', 'PASSWORT1', '0', '1'), (NULL, 'Philipp', 'PASSWORT2', '0', '2'), (NULL, 'Mert', 'PASSWORT3', '0', '2');

-- Dummy Chatnachrichten
INSERT INTO `nachricht` (`NachrichtID`, `Verfasser`, `Nachricht`, `Zeitpunkt`, `Chatraum`) VALUES (NULL, '1', 'Hey Leute was geht?', CURRENT_TIMESTAMP, '1'), (NULL, '2', 'Jo, alles cool.', CURRENT_TIMESTAMP, '1'), (NULL, '3', 'Bei mir auch.', CURRENT_TIMESTAMP, '1');
