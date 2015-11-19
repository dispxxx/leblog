-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Novembre 2015 à 16:22
-- Version du serveur :  5.6.26
-- Version de PHP :  5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_unk`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL,
  `title` varchar(31) COLLATE utf8_bin NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` int(11) NOT NULL,
  `content` varchar(2045) COLLATE utf8_bin NOT NULL,
  `id_category` int(11) NOT NULL,
  `date_validation` datetime NOT NULL,
  `thumbnail` varchar(511) COLLATE utf8_bin NOT NULL DEFAULT 'https://placeholdit.imgix.net/~text?txtsize=75&txt=1200%C3%97300&w=1200&h=300'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `title`, `id_user`, `date_published`, `note`, `content`, `id_category`, `date_validation`, `thumbnail`) VALUES
(1, 'Titre du billet ahahahahah', 1, '2015-11-17 09:18:38', 1, 'Lorem Elsass ipsum gal sagittis baeckeoffe vulputate mamsell hopla ante lotto-owe gravida ChuliaÂ Roberstau dui in, quam. id dolor varius knack sed DNA, elementum semper RichardÂ Schirmeck CoopÃ©Â deÂ Truchtersheim libero. tellus leo kougelhopf condimentum tristique rÃ©chime gewurztraminer sit kartoffelsalad Morbi consectetur mÃ¤nele nullam wie geÃ¯z turpis, suspendisse auctor, und s''guelt Wurschtsalad PfourtzÂ ! yeuh. non mollis jetzÂ gehtsÂ los hop et chambon amet ftomi! bissame blottkopf, SaluÂ bissame tellus mÃ©tÃ©or merciÂ vielmols messtiÂ deÂ Bischheim Racing. commodo elit Gal. risus, id, leo hopla salu Mauris ornare turpis Kabinetpapier morbi eget Verdammi leverwurscht lacus ornare sed Strasbourg Hans hoplageiss flammekueche amet, purus SalutÂ bisamme dignissim nÃ¼dle schpeck kuglopf ac quam, piconÂ biÃ¨re habitant senectus porta SpÃ¤tzle hopla tchaoÂ bissame libero, hopla aliquam pellentesque libero, ChristkindelsmÃ¤rik MissÂ Dahlias YoÂ dÃ». GalÂ ! Carola placerat ch''ai bredele rucksack Heineken adipiscing amet Oberschaeffolsheim eleifend ac knepfle so geht''s schneck sit sit schnaps non wurscht rossbolla ullamcorper munster vielmols, Oberschaeffolsheim Chulien Pellentesque rhoncus barapli Huguette .', 1, '2015-11-17 15:17:53', 'https://placeholdit.imgixnet/~text?txtsize=75&txt=1200%C3%97300&w=1200&h=300'),
(2, 'Titre du billet 2', 1, '2015-11-17 09:18:38', 4, 'Lorem Elsass ipsum gal sagittis baeckeoffe vulputate mamsell hopla ante lotto-owe gravida ChuliaÂ Roberstau dui in, quam. id dolor varius knack sed DNA, elementum semper RichardÂ Schirmeck CoopÃ©Â deÂ Truchtersheim libero. tellus leo kougelhopf condimentum tristique rÃ©chime gewurztraminer sit kartoffelsalad Morbi consectetur mÃ¤nele nullam wie geÃ¯z turpis, suspendisse auctor, und s''guelt Wurschtsalad PfourtzÂ ! yeuh. non mollis jetzÂ gehtsÂ los hop et chambon amet ftomi! bissame blottkopf, SaluÂ bissame tellus mÃ©tÃ©or merciÂ vielmols messtiÂ deÂ Bischheim Racing. commodo elit Gal. risus, id, leo hopla salu Mauris ornare turpis Kabinetpapier morbi eget Verdammi leverwurscht lacus ornare sed Strasbourg Hans hoplageiss flammekueche amet, purus SalutÂ bisamme dignissim nÃ¼dle schpeck kuglopf ac quam, piconÂ biÃ¨re habitant senectus porta SpÃ¤tzle hopla tchaoÂ bissame libero, hopla aliquam pellentesque libero, ChristkindelsmÃ¤rik MissÂ Dahlias YoÂ dÃ». GalÂ ! Carola placerat ch''ai bredele rucksack Heineken adipiscing amet Oberschaeffolsheim eleifend ac knepfle so geht''s schneck sit sit schnaps non wurscht rossbolla ullamcorper munster vielmols, Oberschaeffolsheim Chulien Pellentesque rhoncus barapli Huguette .', 1, '2015-11-17 15:22:07', 'https://placeholdit.imgix.net/~text?txtsize=75&txt=1200%C3%97300&w=1200&h=300'),
(3, 'Titre du billet 3', 1, '2015-11-10 09:18:38', 2, 'Lorem Elsass ipsum gal sagittis baeckeoffe vulputate mamsell hopla ante lotto-owe gravida ChuliaÂ Roberstau dui in, quam. id dolor varius knack sed DNA, elementum semper RichardÂ Schirmeck CoopÃ©Â deÂ Truchtersheim libero. tellus leo kougelhopf condimentum tristique rÃ©chime gewurztraminer sit kartoffelsalad Morbi consectetur mÃ¤nele nullam wie geÃ¯z turpis, suspendisse auctor, und s''guelt Wurschtsalad PfourtzÂ ! yeuh. non mollis jetzÂ gehtsÂ los hop et chambon amet ftomi! bissame blottkopf, SaluÂ bissame tellus mÃ©tÃ©or merciÂ vielmols messtiÂ deÂ Bischheim Racing. commodo elit Gal. risus, id, leo hopla salu Mauris ornare turpis Kabinetpapier morbi eget Verdammi leverwurscht lacus ornare sed Strasbourg Hans hoplageiss flammekueche amet, purus SalutÂ bisamme dignissim nÃ¼dle schpeck kuglopf ac quam, piconÂ biÃ¨re habitant senectus porta SpÃ¤tzle hopla tchaoÂ bissame libero, hopla aliquam pellentesque libero, ChristkindelsmÃ¤rik MissÂ Dahlias YoÂ dÃ». GalÂ ! Carola placerat ch''ai bredele rucksack Heineken adipiscing amet Oberschaeffolsheim eleifend ac knepfle so geht''s schneck sit sit schnaps non wurscht rossbolla ullamcorper munster vielmols, Oberschaeffolsheim Chulien Pellentesque rhoncus barapli Huguette .', 1, '2015-11-17 15:50:57', 'https://placeholdit.imgix.net/~text?txtsize=75&txt=1200%C3%97300&w=1200&h=300'),
(4, 'Super', 1, '2015-11-19 07:40:19', 0, 'Integer elementum massa at nulla placerat varius. Suspendisse in libero risus, in interdum massa. Vestibulum ac leo vitae metus faucibus gravida ac in neque. Nullam est eros, suscipit sed dictum quis, accumsan a ligula. In sit amet justo lectus. Etiam feugiat dolor ac elit suscipit in elementum orci fringilla. Aliquam in felis eros. Praesent hendrerit lectus sit amet turpis tempus hendrerit. Donec laoreet volutpat molestie. Praesent tempus dictum nibh ac ullamcorper. Sed eu consequat nisi. Quisque ligula metus, tristique eget euismod at, ullamcorper et nibh. Duis ultricies quam egestas nibh mollis in ultrices turpis pharetra. Vivamus et volutpat mi. Donec nec est eget dolor laoreet iaculis a sit amet diam. \r\n\r\n', 2, '0000-00-00 00:00:00', 'https://placeholdit.imgix.net/~text?txtsize=75&txt=1200%C3%97300&w=1200&h=300');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Ma life'),
(2, 'Ta life');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `content` varchar(510) COLLATE utf8_bin NOT NULL,
  `date_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `id_user`, `id_article`, `content`, `date_published`) VALUES
(2, 1, 3, 'Un deuxiÃ¨me', '2015-11-19 14:54:10');

-- --------------------------------------------------------

--
-- Structure de la table `private_msg`
--

CREATE TABLE IF NOT EXISTS `private_msg` (
  `id` int(11) NOT NULL,
  `id_recipient` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `date_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_prev` int(11) NOT NULL,
  `subject` varchar(63) COLLATE utf8_bin NOT NULL,
  `content` varchar(510) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `private_msg`
--

INSERT INTO `private_msg` (`id`, `id_recipient`, `id_sender`, `date_published`, `id_prev`, `subject`, `content`) VALUES
(1, 1, 1, '2015-11-17 02:24:47', 0, 'suj', 'zoruvhRVBvubegvb%OUEVBHOeuvÃ¹oizv'),
(2, 1, 1, '2015-11-17 15:32:51', 1, 'Re: suj', 'zreheTHQTRQRYQRHHQ'),
(3, 1, 1, '2015-11-18 07:24:05', 0, 'nouveau message', 'Mercredi matin'),
(4, 1, 1, '2015-11-18 07:24:28', 3, 'Re: nouveau message', 'rÃ©ponse jeudi matin'),
(5, 1, 1, '2015-11-18 07:32:24', 0, 'Hello', 'salut tu vas bieng ?\r\n'),
(6, 1, 4, '2015-11-18 07:39:10', 0, 'La forme ?', 'Tu me mets les droits ???'),
(7, 4, 1, '2015-11-18 07:39:54', 6, 'Re: La forme ?', 'Non tu n''es qu''un user de plus !'),
(8, 4, 1, '2015-11-18 13:11:54', 0, 'hu', 'gngng\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `star`
--

CREATE TABLE IF NOT EXISTS `star` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `star`
--

INSERT INTO `star` (`id`, `id_article`, `id_user`, `rating`) VALUES
(1, 2, 1, 4),
(2, 1, 1, 1),
(3, 1, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(31) COLLATE utf8_bin NOT NULL,
  `surname` varchar(31) COLLATE utf8_bin NOT NULL,
  `avatar` varchar(63) COLLATE utf8_bin NOT NULL,
  `email` varchar(63) COLLATE utf8_bin NOT NULL,
  `password` varchar(510) COLLATE utf8_bin NOT NULL,
  `username` varchar(31) COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL,
  `date_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `avatar`, `email`, `password`, `username`, `status`, `date_register`) VALUES
(1, 'name', 'surname', './public/img/big.png', 'admin@admin.com', '$2y$10$Jud5mO1dZ0bhPwlslID5OuYExpEeRXcj4iwkV7wjgZHA2.MxekmTK', 'admin', 2, '2015-11-16 06:37:36'),
(4, '', '', '', 'user@user.com', '$2y$10$.1w5UMirBHOUTLykfMQOwO.k9Hzn.hwsvZ6aKnY/beoC3.GpfkHVK', 'user', 1, '2015-11-18 07:38:14');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `private_msg`
--
ALTER TABLE `private_msg`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `star`
--
ALTER TABLE `star`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `private_msg`
--
ALTER TABLE `private_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `star`
--
ALTER TABLE `star`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
