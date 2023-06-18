-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 18 juin 2023 à 19:09
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `FILL-ROUGE`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admin`
--

CREATE TABLE `Admin` (
  `id_admin` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Admin`
--

INSERT INTO `Admin` (`id_admin`, `name`, `email`, `password`) VALUES
(1, 'ikram', 'elghaliikram@gmail.com', '$2y$10$57qzPvnRPM2773BZk9SrROVZiT0Rw/LWzhGnk213uuG/kLXCFlzPm'),
(2, 'Hicham  ELGHALI', 'elghalihicham1@gmail.com', '$2y$10$Eadgrqm5lxORjWDsVWuXKeVb/0RXPfqUdc93SZu4lrtrfYhZnhspO');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Kids');

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

CREATE TABLE `color` (
  `Id_color` int(11) NOT NULL,
  `name_color` varchar(50) NOT NULL,
  `code_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`Id_color`, `name_color`, `code_color`) VALUES
(1, 'Red', '#FF0000'),
(2, 'Blue', '#0000FF'),
(3, 'Green', '#00FF00'),
(4, 'Yellow', '#FFFF00'),
(5, 'Orange', '#FFA500'),
(6, 'Black', '#000000'),
(7, 'White', '#FFFFFF');

-- --------------------------------------------------------

--
-- Structure de la table `Contact`
--

CREATE TABLE `Contact` (
  `Id_message` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Contact`
--

INSERT INTO `Contact` (`Id_message`, `Name`, `Email`, `Message`) VALUES
(1, 'ELGHALI IKRAM', 'IKRAM12@gmail.com', 'your pyjamas is super'),
(2, 'ELGHALI IKRAM', 'ikram.elghali.solicode@gmail.com', 'i like your site'),
(3, 'soukaina', 'soukaina@gmail.com', 'TU PEUX m\'qider');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `url_image` varchar(50) NOT NULL,
  `Id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id_image`, `url_image`, `Id_product`) VALUES
(1, 'men-pyjamas-set1-img1.jpeg', 1),
(2, 'men-pyjamas-set1-img2.jpeg', 1),
(3, 'men-pyjamas-set1-img3.jpeg', 1),
(7, 'children-pyjamas-set1-img1.jpeg', 3),
(8, 'children-pyjamas-set1-img2.jpeg', 3),
(9, 'children-pyjamas-set1-img3.jpeg', 3),
(10, 'men-pyjamas-set1-img1.jpeg', 4),
(11, 'men-pyjamas-set1-img2.jpeg', 4),
(12, 'men-pyjamas-set1-img3.jpeg', 4),
(13, 'women-pyjamas-set1-img1.jpeg', 5),
(14, 'women-pyjamas-set1-img2.jpeg', 5),
(15, 'women-pyjamas-set1-img3.jpeg', 5),
(16, 'children-pyjamas-set1-img1.jpeg', 6),
(17, 'children-pyjamas-set1-img2.jpeg', 6),
(18, 'children-pyjamas-set1-img3.jpeg', 6),
(19, 'men-pyjamas-set1-img1.jpeg', 7),
(20, 'men-pyjamas-set1-img2.jpeg', 7),
(21, 'men-pyjamas-set1-img3.jpeg', 7),
(22, 'women-pyjamas-set1-img1.jpeg', 8),
(23, 'women-pyjamas-set1-img2.jpeg', 8),
(24, 'women-pyjamas-set1-img3.jpeg', 8),
(25, 'children-pyjamas-set1-img1.jpeg', 9),
(26, 'children-pyjamas-set1-img2.jpeg', 9),
(27, 'children-pyjamas-set1-img3.jpeg', 9),
(28, 'men-pyjamas-set1-img1.jpeg', 10),
(29, 'men-pyjamas-set1-img2.jpeg', 10),
(30, 'men-pyjamas-set1-img3.jpeg', 10);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `Id_product` int(11) NOT NULL,
  `nom_product` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `id_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`Id_product`, `nom_product`, `description`, `price`, `id_category`) VALUES
(1, 'Men Pyjamas Pyjamas Set 1', 'Comfortable cotton pyjamas for men', 250, 1),
(3, 'Children Pyjamas Set 1', 'Adorable pyjamas for kids', 200, 3),
(4, 'Men Pyjamas PyjamasSet 2', 'Stylish and breathable men pyjamas', 350, 1),
(5, 'Women Pyjamas Set 2', 'Elegant and comfortable pyjamas for women', 280, 2),
(6, 'Children Pyjamas Set 2', 'Cute and colorful pyjamas for kids', 180, 3),
(7, 'Men Pyjamas Pyjamas Set 3', 'Luxurious silk pyjamas for men', 500, 1),
(8, 'Women Pyjamas Set 3', 'Silky smooth pyjamas for women', 450, 2),
(9, 'Children Pyjamas Set 3', 'Cozy and warm pyjamas for kids', 220, 3),
(10, 'Men Pyjamas PyjamasSet 4', 'Casual and comfortable men pyjamas', 300, 1);

-- --------------------------------------------------------

--
-- Structure de la table `products_color`
--

CREATE TABLE `products_color` (
  `Id_product` int(11) NOT NULL,
  `Id_association` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products_color`
--

INSERT INTO `products_color` (`Id_product`, `Id_association`) VALUES
(1, 4),
(1, 6),
(1, 7),
(3, 7),
(3, 4),
(3, 6),
(4, 4),
(4, 6),
(4, 7),
(5, 6),
(5, 4),
(5, 7),
(6, 7),
(6, 6),
(6, 4),
(7, 4),
(7, 6),
(7, 7),
(8, 7),
(8, 4),
(8, 6),
(9, 4),
(9, 6),
(9, 7),
(10, 6),
(10, 7),
(10, 4);

-- --------------------------------------------------------

--
-- Structure de la table `products_size`
--

CREATE TABLE `products_size` (
  `Id_product` int(11) NOT NULL,
  `Id_association` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products_size`
--

INSERT INTO `products_size` (`Id_product`, `Id_association`) VALUES
(1, 1),
(1, 2),
(1, 3),
(3, 3),
(3, 4),
(3, 5),
(4, 1),
(4, 4),
(4, 5),
(5, 1),
(5, 3),
(5, 4),
(6, 2),
(6, 4),
(6, 5),
(7, 1),
(7, 2),
(7, 3),
(8, 3),
(8, 4),
(8, 5),
(9, 1),
(9, 2),
(9, 5),
(10, 2),
(10, 3),
(10, 4);

-- --------------------------------------------------------

--
-- Structure de la table `size`
--

CREATE TABLE `size` (
  `Id_size` int(11) NOT NULL,
  `name_size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `size`
--

INSERT INTO `size` (`Id_size`, `name_size`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(10, 'xXL');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`Id_color`);

--
-- Index pour la table `Contact`
--
ALTER TABLE `Contact`
  ADD PRIMARY KEY (`Id_message`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `Id_product` (`Id_product`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id_product`),
  ADD KEY `fk_category` (`id_category`);

--
-- Index pour la table `products_color`
--
ALTER TABLE `products_color`
  ADD KEY `Id_association` (`Id_association`),
  ADD KEY `Id_product` (`Id_product`);

--
-- Index pour la table `products_size`
--
ALTER TABLE `products_size`
  ADD KEY `Id_association` (`Id_association`),
  ADD KEY `Id_product` (`Id_product`);

--
-- Index pour la table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`Id_size`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `Id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `Contact`
--
ALTER TABLE `Contact`
  MODIFY `Id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `Id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `size`
--
ALTER TABLE `size`
  MODIFY `Id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`Id_product`) REFERENCES `products` (`Id_product`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Contraintes pour la table `products_color`
--
ALTER TABLE `products_color`
  ADD CONSTRAINT `products_color_ibfk_1` FOREIGN KEY (`Id_association`) REFERENCES `color` (`Id_color`),
  ADD CONSTRAINT `products_color_ibfk_2` FOREIGN KEY (`Id_product`) REFERENCES `products` (`Id_product`);

--
-- Contraintes pour la table `products_size`
--
ALTER TABLE `products_size`
  ADD CONSTRAINT `products_size_ibfk_1` FOREIGN KEY (`Id_association`) REFERENCES `size` (`Id_size`),
  ADD CONSTRAINT `products_size_ibfk_2` FOREIGN KEY (`Id_product`) REFERENCES `products` (`Id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
