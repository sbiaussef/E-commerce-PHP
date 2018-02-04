-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 13 Octobre 2017 à 17:01
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(11) NOT NULL DEFAULT '0',
  `brand_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(1, 'samsung', 1, 1),
(2, 'HTC', 1, 1),
(3, 'LG', 1, 1),
(4, 'APPLE', 1, 1),
(5, 'SONY', 1, 1),
(6, 'NOKIA', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT '0',
  `categories_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(1, 'Mobile Phone', 1, 1),
(2, 'Home accesseries', 1, 1),
(3, 'LED TV', 1, 1),
(4, 'Computer', 1, 1),
(5, 'Gadets', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `order_status`) VALUES
(1, '2016-07-15', 'John Doe', '9807867564', '2700.00', '351.00', '3051.00', '1000.00', '2051.00', '1000.00', '1051.00', 2, 2, 2),
(2, '2016-07-15', 'John Doe', '9808746573', '3400.00', '442.00', '3842.00', '500.00', '3342.00', '3342', '0', 2, 1, 2),
(3, '2016-07-16', 'John Doe', '9809876758', '3600.00', '468.00', '4068.00', '568.00', '3500.00', '3500', '0', 2, 1, 2),
(4, '2016-08-01', 'Indra', '19208130', '1200.00', '156.00', '1356.00', '1000.00', '356.00', '356', '0.00', 2, 1, 2),
(5, '2016-07-16', 'John Doe', '9808767689', '3600.00', '468.00', '4068.00', '500.00', '3568.00', '3568', '0', 2, 1, 1),
(19, '2017-10-02', 'ussef', '0688554477', '2200', '0', '2200', '0', '2200', '2200', '0', 1, 2, 2),
(20, '2017-10-02', 'ussef', '0688554477', '2200', '0', '2200', '0', '2200', '2200', '0', 1, 2, 2),
(21, '2017-10-03', 'ussef', '0688554477', '3400', '0', '3400', '0', '3400', '3400', '0', 1, 2, 2),
(22, '2017-10-03', 'ussef', '0688554477', '3400', '0', '3400', '0', '3400', '3400', '0', 1, 2, 2),
(23, '2017-10-03', 'ussef', '0688554477', '2400', '0', '2400', '0', '2400', '2400', '0', 1, 2, 2),
(24, '2017-10-03', 'ussef', '0688554477', '2400', '0', '2400', '0', '2400', '2400', '0', 2, 2, 2),
(25, '2017-10-03', 'kamal raji', '0688554477', '2400', '0', '2400', '0', '2400', '2400', '0', 1, 2, 2),
(26, '2017-10-03', 'kamal raji', '0688554477', '2400', '0', '2400', '0', '2400', '2400', '0', 1, 2, 2),
(27, '2017-10-03', 'kamal raji', '0688554477', '2200', '0', '2200', '0', '2200', '2200', '0', 1, 2, 2),
(28, '2017-10-03', 'kamal rajiwi', '0688554477', '2200', '0', '2200', '0', '2200', '2200', '0', 1, 2, 2),
(29, '2017-10-03', 'inji ali', '0655221144', '1200', '0', '1200', '0', '1200', '1200', '0', 1, 2, 2),
(30, '2017-10-04', 'kamal raji', '0688554477', '1200', '0', '1200', '0', '1200', '1200', '0', 2, 2, 2),
(31, '2017-10-07', 'ussef', '0688554477', '2400', '0', '2400', '0', '2400', '2400', '0', 2, 2, 2),
(32, '2017-10-13', 'youssef', '0688554477', '11500', '0', '11500', '0', '11500', '11500', '0', 1, 2, 2),
(33, '2017-10-13', 'kamal raji', '0688554477', '19500', '0', '19500', '0', '19500', '19500', '0', 1, 2, 2),
(34, '2017-10-13', 'ussef', '0688554477', '3500', '0', '3500', '0', '3500', '3500', '0', 1, 2, 2),
(35, '2017-10-13', 'ussef', '0688554477', '8000', '0', '8000', '0', '8000', '8000', '0', 1, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(1, 1, 1, '1', '1500', '1500.00', 2),
(2, 1, 2, '1', '1200', '1200.00', 2),
(3, 2, 3, '2', '1200', '2400.00', 2),
(4, 2, 4, '1', '1000', '1000.00', 2),
(5, 3, 5, '2', '1200', '2400.00', 2),
(6, 3, 6, '1', '1200', '1200.00', 2),
(7, 4, 5, '1', '1200', '1200.00', 2),
(8, 5, 7, '2', '1200', '2400.00', 1),
(12, 19, 0, '1', '1000', '1000', 2),
(13, 19, 0, '1', '1200', '1200', 2),
(14, 20, 0, '1', '1000', '1000', 2),
(15, 20, 0, '1', '1200', '1200', 2),
(16, 21, 4, '1', '1000', '1000', 2),
(17, 21, 3, '1', '1200', '1200', 2),
(18, 21, 2, '1', '1200', '1200', 2),
(19, 22, 4, '1', '1000', '1000', 2),
(20, 22, 3, '1', '1200', '1200', 2),
(21, 22, 2, '1', '1200', '1200', 2),
(22, 23, 6, '1', '1200', '1200', 2),
(23, 23, 5, '1', '1200', '1200', 2),
(24, 24, 6, '1', '1200', '1200', 2),
(25, 24, 5, '1', '1200', '1200', 2),
(26, 25, 6, '1', '1200', '1200', 2),
(27, 25, 5, '1', '1200', '1200', 2),
(28, 26, 6, '1', '1200', '1200', 2),
(29, 26, 5, '1', '1200', '1200', 2),
(30, 27, 4, '1', '1000', '1000', 2),
(31, 27, 3, '1', '1200', '1200', 2),
(32, 28, 4, '1', '1000', '1000', 2),
(33, 28, 3, '1', '1200', '1200', 2),
(34, 29, 3, '1', '1200', '1200', 2),
(35, 30, 3, '1', '1200', '1200', 2),
(36, 31, 6, '1', '1200', '1200', 2),
(37, 31, 5, '1', '1200', '1200', 2),
(38, 32, 1, '2', '8000', '8000', 2),
(39, 32, 2, '1', '3500', '3500', 2),
(40, 33, 2, '3', '10500', '10500', 2),
(41, 33, 3, '2', '9000', '9000', 2),
(42, 34, 2, '1', '3500', '3500', 2),
(43, 35, 1, '2', '8000', '8000', 2);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `details`, `active`, `status`) VALUES
(1, 'samsung s7', 'administration/assests/images/stock/product-1.jpg', 1, 1, '7', '4000', 'good phone', 1, 1),
(2, 'nokia lumia 5', 'administration/assests/images/stock/product-2.jpg', 6, 1, '10', '3500', 'great phone', 1, 1),
(3, 'LG L9', 'administration/assests/images/stock/product-3.jpg', 3, 1, '8', '4500', 'nice phone', 1, 1),
(4, 'SONY experia Z', 'administration/assests/images/stock/product-4.jpg', 5, 1, '6', '2300', 'funny phone', 1, 1),
(5, 'IPHONE 4S', 'administration/assests/images/stock/product-5.jpg', 4, 1, '12', '3200', 'apple phone', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` text NOT NULL,
  `telephone` int(11) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `adresse`, `telephone`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 0, 'administrator'),
(5, 'ussef', '927640', 'vortex-666@hotmail.fr', '8 bloc 11 safi', 688554477, 'user'),
(6, 'ussef', '927640', 'vortex-666@hotmail.fr', '8 bloc 11 safi', 688554477, 'user'),
(10, 'ussef', '2124c6c4d9b2fa9693ef9c5d7da58914', 'vortex-666@hotmail.fr', 'fhgfjhgjh', 688554477, 'user'),
(11, 'kamal raji', '2124c6c4d9b2fa9693ef9c5d7da58914', 'vortex-666@hotmail.fr', '8 bloc 545 safi', 688554477, 'user'),
(12, 'kamal raji', '2124c6c4d9b2fa9693ef9c5d7da58914', 'vortex-666@hotmail.fr', 'kkaokkaop', 688554477, 'user'),
(13, 'kamal raji', '2124c6c4d9b2fa9693ef9c5d7da58914', 'ussef@gmail.com', 'pokokoi', 688554477, 'user');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Index pour la table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
