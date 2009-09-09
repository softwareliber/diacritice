-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Gazda: localhost
-- Timp de generare: Sep 09, 2009 at 10:06 PM
-- Versiune server: 5.1.37
-- Versiune PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Baza de date: `submit-word`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `submit_word_sent_log`
--

CREATE TABLE IF NOT EXISTS `submit_word_sent_log` (
  `word_sent_log_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(64) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `date_sent` datetime NOT NULL,
  `word_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`word_sent_log_id`),
  KEY `word_id` (`word_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Salvarea datelor din tabel `submit_word_sent_log`
--


-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `submit_word_status_type`
--

CREATE TABLE IF NOT EXISTS `submit_word_status_type` (
  `status_type_id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `status_type` varchar(255) NOT NULL,
  PRIMARY KEY (`status_type_id`),
  UNIQUE KEY `status_type` (`status_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Salvarea datelor din tabel `submit_word_status_type`
--

INSERT INTO `submit_word_status_type` (`status_type_id`, `status_type`) VALUES
(1, 'Accepted'),
(2, 'Pending'),
(3, 'Rejected');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `submit_word_word`
--

CREATE TABLE IF NOT EXISTS `submit_word_word` (
  `word_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(255) NOT NULL,
  `status_type_id` tinyint(4) unsigned NOT NULL,
  `proposal_count` bigint(20) NOT NULL,
  `last_sent` datetime NOT NULL,
  PRIMARY KEY (`word_id`),
  UNIQUE KEY `word` (`word`),
  KEY `status_id` (`status_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Salvarea datelor din tabel `submit_word_word`
--


-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `submit_word_word_status_log`
--

CREATE TABLE IF NOT EXISTS `submit_word_word_status_log` (
  `word_status_log_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `word_id` bigint(20) unsigned NOT NULL,
  `status_type_id` tinyint(3) unsigned NOT NULL,
  `changed_by` varchar(255) NOT NULL,
  `changed_at` datetime NOT NULL,
  PRIMARY KEY (`word_status_log_id`),
  KEY `word_id` (`word_id`),
  KEY `status_type_id` (`status_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Salvarea datelor din tabel `submit_word_word_status_log`
--


--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `submit_word_sent_log`
--
ALTER TABLE `submit_word_sent_log`
  ADD CONSTRAINT `submit_word_sent_log_ibfk_1` FOREIGN KEY (`word_id`) REFERENCES `submit_word_word` (`word_id`);

--
-- Restrictii pentru tabele `submit_word_word`
--
ALTER TABLE `submit_word_word`
  ADD CONSTRAINT `submit_word_word_ibfk_1` FOREIGN KEY (`status_type_id`) REFERENCES `submit_word_status_type` (`status_type_id`);

--
-- Restrictii pentru tabele `submit_word_word_status_log`
--
ALTER TABLE `submit_word_word_status_log`
  ADD CONSTRAINT `submit_word_word_status_log_ibfk_1` FOREIGN KEY (`word_id`) REFERENCES `submit_word_word` (`word_id`),
  ADD CONSTRAINT `submit_word_word_status_log_ibfk_2` FOREIGN KEY (`status_type_id`) REFERENCES `submit_word_status_type` (`status_type_id`);
