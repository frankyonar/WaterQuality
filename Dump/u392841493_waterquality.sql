-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creato il: Giu 04, 2024 alle 14:50
-- Versione del server: 10.11.7-MariaDB-cll-lve
-- Versione PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u392841493_waterquality`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `dati_sensore`
--

CREATE TABLE `dati_sensore` (
  `ID_Dati_Sensore` int(11) NOT NULL,
  `ID_Sensore` int(11) DEFAULT NULL,
  `Valore_pH` decimal(4,2) NOT NULL,
  `Temperatura` decimal(4,2) NOT NULL,
  `Livello_Contaminazione` decimal(5,2) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `dati_sensore`
--

INSERT INTO `dati_sensore` (`ID_Dati_Sensore`, `ID_Sensore`, `Valore_pH`, `Temperatura`, `Livello_Contaminazione`, `Timestamp`) VALUES
(1, 1, '5.00', '20.00', '22.00', '2024-05-17 15:27:23'),
(2, 1, '5.00', '20.00', '22.00', '2024-05-17 15:27:37'),
(3, 3, '2.00', '25.00', '40.00', '2024-06-04 14:48:32');

-- --------------------------------------------------------

--
-- Struttura della tabella `inserimento`
--

CREATE TABLE `inserimento` (
  `ID_Inserimento` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `ID_Utente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `inserimento`
--

INSERT INTO `inserimento` (`ID_Inserimento`, `Timestamp`, `ID_Utente`) VALUES
(1, '2024-06-02 14:07:35', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `segnalazione`
--

CREATE TABLE `segnalazione` (
  `ID_Segnalazione` int(11) NOT NULL,
  `Posizione` varchar(255) NOT NULL,
  `Descrizione` text NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `ID_Inserimento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `segnalazione`
--

INSERT INTO `segnalazione` (`ID_Segnalazione`, `Posizione`, `Descrizione`, `Timestamp`, `ID_Inserimento`) VALUES
(1, 'Firenze', 'test segnalazione Firenze', '2024-06-02 14:07:35', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `sensore`
--

CREATE TABLE `sensore` (
  `ID_Sensore` int(11) NOT NULL,
  `Posizione` varchar(255) NOT NULL,
  `Tipo` varchar(100) NOT NULL,
  `ID_Utente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `sensore`
--

INSERT INTO `sensore` (`ID_Sensore`, `Posizione`, `Tipo`, `ID_Utente`) VALUES
(1, 'Napoli', 'A', NULL),
(2, 'Bologna', 'Tipo A', NULL),
(3, 'Bologna', 'Tipo A', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `ID_Utente` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Ruolo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`ID_Utente`, `Nome`, `Email`, `Password`, `Ruolo`) VALUES
(2, 'Fra', 'francescoranno3@gmail.com', '$2y$10$DO7HwWzBxBqsJGnupN0.OeL1.GIrTjZrm2NGiNJpTGGuOP6ZSzKmu', 'admin'),
(4, 'test', 'test@gmail.com', '$2y$10$QydNb0GgvJILfmkUmWvFaeGWBmpdmKn2c4uzlDh8xV249mgXJqHQy', 'user'),
(10, 'Francesco', 'test55@gmail.com', '$2y$10$mH9Gm2UZbHrKOc2FbHIP7eKKzEKDPG2HNQRwd/zgP8b8CbvMLID4.', 'user'),
(11, 'Francesco', 'onarprime@gmail.com', '$2y$10$MclsabaveIzrk6Yqy1Cmu.wfwZF3yY3K.y2X1RzOrNUJ.Lr5.InSy', 'user'),
(12, 'test', 'testetsjuhfdi@gmail.com', '$2y$10$yp8GTPqy1ohJQ6.FdkpgbeTAKItdyCl6ueiuEJaoDk9gIYUYMrFQm', 'user'),
(13, 'testtdf', 'gefuigasdfd@gmail.com', '$2y$10$lQnXS2ETdZOqScdrLEiw8.qnwQgBYKDy1V6VGVS/6Dp47IxmEWotu', 'user'),
(14, 'testdjifoh', 'cuidgasliufgsdugfl@gmail.com', '$2y$10$KZ4klKrfrqiSeaATCBTL.uOsuZfDJYHPpMcNcSBby1w16HUKWZX4G', 'user'),
(15, 'bdfbsbsd', 'fdvdfsfdbhs@gmail.com', '$2y$10$.Bzlpg2oz5RZwz1qNWSrdeKrvBKNpsMbamowQx5WLUMWh1QL0msMq', 'user'),
(16, 'Francesco', 'ghdwghdsghd@gmail.com', '$2y$10$M2xqwuMlpak1.5pZke3NiukDakSUnMF0JduI3BA.zjwkOGSuucUom', 'user'),
(17, 'fdafdsafsd', 'erjhjthhwdf@gmail.com', '$2y$10$kww7r4BWxik3MAnzx7GPAOxfI9pnr7xSmXs2XznPyhX.IQlxezNpK', 'user'),
(18, 'hgfgfghgh', 'fdsiljgaisd@gmail.com', '$2y$10$.ETm0M2B2k6wp6zVlZjPueCIxhjmuvs4ao8sYmjMpkTHkJh.5BzB2', 'user'),
(19, 'utente1', 'utente1@gmail.com', '$2y$10$u/43zLU4PlPF.HbofJONmOoXy0QCtHlLQpBSydKWTfcyOoNC5DcwW', 'user'),
(20, 'admin', 'admin@gmail.com', '$2y$10$RJxKcKWDRsoo7vimAugF7egQjae64Z39xmr2oGUlLXlWdr/rI/Ml2', 'admin');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `dati_sensore`
--
ALTER TABLE `dati_sensore`
  ADD PRIMARY KEY (`ID_Dati_Sensore`),
  ADD KEY `ID_Sensore` (`ID_Sensore`);

--
-- Indici per le tabelle `inserimento`
--
ALTER TABLE `inserimento`
  ADD PRIMARY KEY (`ID_Inserimento`),
  ADD KEY `ID_Utente` (`ID_Utente`);

--
-- Indici per le tabelle `segnalazione`
--
ALTER TABLE `segnalazione`
  ADD PRIMARY KEY (`ID_Segnalazione`),
  ADD KEY `ID_Inserimento` (`ID_Inserimento`);

--
-- Indici per le tabelle `sensore`
--
ALTER TABLE `sensore`
  ADD PRIMARY KEY (`ID_Sensore`),
  ADD KEY `ID_Utente` (`ID_Utente`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`ID_Utente`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `dati_sensore`
--
ALTER TABLE `dati_sensore`
  MODIFY `ID_Dati_Sensore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `inserimento`
--
ALTER TABLE `inserimento`
  MODIFY `ID_Inserimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `segnalazione`
--
ALTER TABLE `segnalazione`
  MODIFY `ID_Segnalazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `sensore`
--
ALTER TABLE `sensore`
  MODIFY `ID_Sensore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `ID_Utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `dati_sensore`
--
ALTER TABLE `dati_sensore`
  ADD CONSTRAINT `dati_sensore_ibfk_1` FOREIGN KEY (`ID_Sensore`) REFERENCES `sensore` (`ID_Sensore`) ON DELETE CASCADE;

--
-- Limiti per la tabella `inserimento`
--
ALTER TABLE `inserimento`
  ADD CONSTRAINT `inserimento_ibfk_1` FOREIGN KEY (`ID_Utente`) REFERENCES `utente` (`ID_Utente`) ON DELETE CASCADE;

--
-- Limiti per la tabella `segnalazione`
--
ALTER TABLE `segnalazione`
  ADD CONSTRAINT `segnalazione_ibfk_1` FOREIGN KEY (`ID_Inserimento`) REFERENCES `inserimento` (`ID_Inserimento`) ON DELETE CASCADE;

--
-- Limiti per la tabella `sensore`
--
ALTER TABLE `sensore`
  ADD CONSTRAINT `sensore_ibfk_1` FOREIGN KEY (`ID_Utente`) REFERENCES `utente` (`ID_Utente`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
