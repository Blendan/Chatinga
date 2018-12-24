-- Dummy Farbthemen
INSERT INTO `farbthema` (`FarbthemaID`, `Name`, `ChatfensterTextfarbe`, `ChatfensterRahmenfarbe`, `ChatfensterHintergrundfarbe`, `ChatfensterHintergrundbild`, `OnlinelisteTextfarbe`, `OnlinelisteRahmenfarbe`, `OnlinelisteHintergrundfarbe`, `OnlinelisteHintergrundbild`, `TextfeldTextfarbe`, `TextfeldRahmenfarbe`, `TextfeldHintergrundfarbe`, `TextfeldHintergrundbild`) VALUES (NULL, 'Standard', 'black', 'black', 'MediumSlateBlue', NULL, 'black', 'black', 'SlateBlue', NULL, 'black', 'black', 'MediumSlateBlue', NULL);
INSERT INTO `farbthema` (`FarbthemaID`, `Name`, `ChatfensterTextfarbe`, `ChatfensterRahmenfarbe`, `ChatfensterHintergrundfarbe`, `ChatfensterHintergrundbild`, `OnlinelisteTextfarbe`, `OnlinelisteRahmenfarbe`, `OnlinelisteHintergrundfarbe`, `OnlinelisteHintergrundbild`, `TextfeldTextfarbe`, `TextfeldRahmenfarbe`, `TextfeldHintergrundfarbe`, `TextfeldHintergrundbild`) VALUES (NULL, 'Yellow', 'black', 'DarkOrange', 'LightGoldenrodYellow', NULL, 'black', 'DarkOrange', 'LemonChiffon', NULL, 'black', 'DarkOrange', 'LightGoldenrodYellow', NULL);

-- Dummy Nutzer
INSERT INTO `nutzer` (`NutzerID`, `Nutzername`, `Passwort`, `istOnline`, `gewaehltesThema`) VALUES (NULL, 'Benny', 'adfs', '0', '1'), (NULL, 'Philipp', 'sdaf', '0', '2'), (NULL, 'Mert', 'asfd', '0', '2');

-- Dummy Chatnachrichten
INSERT INTO `general` (`NachrichtID`, `Verfasser`, `Nachricht`, `Zeitpunkt`) VALUES (NULL, '3', 'Jo, was geht ab hier?', CURRENT_TIMESTAMP);
INSERT INTO `general` (`NachrichtID`, `Verfasser`, `Nachricht`, `Zeitpunkt`) VALUES (NULL, '1', 'Noch nicht viel', CURRENT_TIMESTAMP);
INSERT INTO `ü20` (`NachrichtID`, `Verfasser`, `Nachricht`, `Zeitpunkt`) VALUES (NULL, '2', 'hey leute, was geht?', CURRENT_TIMESTAMP);
INSERT INTO `ü20` (`NachrichtID`, `Verfasser`, `Nachricht`, `Zeitpunkt`) VALUES (NULL, '1', 'Hey du bist zu jung, du darfst hier nicht rein!', CURRENT_TIMESTAMP);
