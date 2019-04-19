-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2019 at 02:07 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Description` text NOT NULL,
  `Arrange` int(11) NOT NULL,
  `Visibility` tinyint(4) NOT NULL DEFAULT '0',
  `Allow_Comment` tinyint(4) NOT NULL DEFAULT '0',
  `Allow_Ads` tinyint(4) NOT NULL DEFAULT '0',
  `orderring` int(11) NOT NULL COMMENT 'as bigger as the number means come last in order'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `Name`, `Description`, `Arrange`, `Visibility`, `Allow_Comment`, `Allow_Ads`, `orderring`) VALUES
(1, 'repellat', 'Doloremque voluptatem praesentium ipsum alias quia. Est dolor voluptate dolores. Voluptas sit omnis voluptates quasi. Omnis molestias aut rerum et voluptate autem voluptatem id. Ratione quisquam culpa numquam amet rerum est commodi. Sunt exercitationem tempora eveniet dolorem dolor.', 8, 1, 1, 1, 0),
(2, 'tenetur', 'Dignissimos possimus facere corrupti modi magnam. Eaque enim provident vel unde voluptas aliquam occaecati totam. Perferendis a consequatur nostrum. Suscipit et est voluptate qui quos reiciendis eum vero. Culpa ut temporibus aspernatur omnis rerum ut voluptatum. Ut nemo accusamus voluptatibus et nostrum iusto autem.', 4, 1, 1, 0, 0),
(3, 'reiciendis', 'Vitae molestiae blanditiis aut praesentium aperiam distinctio accusamus. Explicabo rerum fuga quia esse dolorem illum repellat. Facilis adipisci quia odio est maiores. Tempore exercitationem quia molestiae quia et dolor ut.', 8, 1, 0, 0, 0),
(4, 'consequatur', 'Voluptatem rerum vero itaque facere tempora et doloremque. Autem incidunt vitae fugit provident maxime. Necessitatibus vel tenetur est. Dolore incidunt eligendi impedit nemo. Voluptatem quam voluptas qui. Dolor quo corrupti minima asperiores enim qui aut.', 1, 0, 1, 0, 0),
(5, 'sint', 'Ipsa maxime tempora maxime exercitationem enim. Consequuntur corrupti est ut rerum. Consequatur voluptates dolores possimus eum voluptatibus. Consequatur corporis aut molestiae perspiciatis error tempore.', 1, 1, 1, 1, 0),
(6, 'rerum', 'Tempora voluptatem aspernatur cum aut consequatur. Et qui vel sunt vitae quia iusto. Odit explicabo odio magnam magnam nihil eligendi voluptatum. Tempora rerum eius et deserunt.', 3, 1, 0, 1, 0),
(7, 'sit', 'Nemo illo in nostrum cumque odit rem dicta. Assumenda dolore accusamus nostrum qui ex ad sint. Similique aspernatur in error rerum. Odit facere provident molestiae adipisci sint quas voluptatem. Voluptate suscipit ipsa rerum voluptate ipsum sint.', 8, 1, 0, 1, 0),
(8, 'optio', 'Quia molestiae ut distinctio quo atque dolorem. Velit magnam mollitia labore qui. Similique quo quia velit sapiente est quia doloremque accusamus.', 1, 0, 0, 1, 0),
(9, 'omnis', 'Ut numquam sed omnis voluptatem qui. Molestiae excepturi dolor quia qui. Est rerum eligendi vitae temporibus. Sed sapiente provident tenetur. Debitis id quo nemo repudiandae corporis.', 4, 1, 1, 0, 0),
(10, 'facilis', 'Dicta doloribus eveniet ex et dolores et. Veniam est illum suscipit maiores ipsa ipsam repellat. Odio aut architecto adipisci qui omnis voluptatibus. Provident sint magni beatae sit enim. Ducimus natus velit nobis qui exercitationem dignissimos.', 8, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `C_id` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0',
  `C_date` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`C_id`, `Comment`, `Status`, `C_date`, `item_id`, `user_id`) VALUES
(13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, ', 0, '2019-04-19', 29, 33),
(14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, ', 0, '2019-04-19', 29, 33),
(15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididum, ', 0, '2019-04-09', 47, 81),
(16, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididum, ', 0, '2019-04-09', 47, 81),
(17, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur', 0, '2019-04-03', 48, 11),
(18, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur', 0, '2019-04-03', 48, 11),
(19, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqu', 0, '2019-04-05', 34, 78),
(20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqu', 0, '2019-04-05', 34, 78),
(21, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut la', 0, '2019-04-04', 17, 68),
(22, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut la', 0, '2019-04-04', 17, 68),
(23, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor in', 0, '2019-04-19', 43, 68);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_ID` int(11) NOT NULL COMMENT 'Identify the item',
  `Name` varchar(225) NOT NULL,
  `Description` text NOT NULL,
  `Price` varchar(225) NOT NULL,
  `Add_Date` date NOT NULL,
  `Making_Country` varchar(225) NOT NULL,
  `images` varchar(225) NOT NULL,
  `Status` varchar(225) NOT NULL,
  `Rating` tinyint(4) NOT NULL,
  `Approve` tinyint(4) NOT NULL DEFAULT '0',
  `Cat_ID` int(11) NOT NULL,
  `Member_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_ID`, `Name`, `Description`, `Price`, `Add_Date`, `Making_Country`, `images`, `Status`, `Rating`, `Approve`, `Cat_ID`, `Member_ID`) VALUES
(1, 'reprehenderit', 'Incidunt et dolores laudantium atque. Repudiandae repudiandae dolores distinctio quia vero ullam. Quia explicabo ab et nisi rerum. Nulla adipisci nulla reiciendis voluptate. Est voluptas neque eius.', '468', '2019-04-18', 'Saint Martin', '', '1', 0, 0, 3, 36),
(2, 'veritatis', 'Pariatur sed asperiores maxime nesciunt hic reprehenderit. Ad inventore doloribus eum hic amet. Quia ducimus quasi enim est iusto ipsum est.', '945', '2019-04-18', 'Jordan', '', '1', 0, 0, 5, 47),
(3, 'recusandae', 'Autem assumenda ratione est numquam. Ut non voluptatem est sapiente dolorem eos. Ea at velit incidunt deserunt. Rerum cumque delectus cumque aut rerum labore velit vitae. Eum quo assumenda dolor.', '983', '2019-04-18', 'Wallis and Futuna', '', '2', 0, 0, 8, 39),
(4, 'unde', 'Possimus aut non hic pariatur. Nulla veritatis dolores nihil culpa. Excepturi adipisci voluptatem dignissimos est qui deserunt soluta. Ut omnis repudiandae sunt praesentium tempore vel ut.', '507', '2019-04-18', 'Sudan', '', '1', 0, 0, 3, 60),
(5, 'maxime', 'Dolorem quaerat et eaque fugit voluptatem reiciendis vitae. Vero optio nemo est placeat. Repellat qui aut esse repellendus autem eos. Reprehenderit nostrum aut facilis commodi est eum illum pariatur. Et illo distinctio et in.', '308', '2019-04-18', 'Chad', '', '3', 0, 0, 9, 58),
(6, 'facilis', 'Corrupti eum voluptatem et est. Vel exercitationem excepturi quas soluta maxime qui id. Beatae et tempore voluptas sint et. Odio aspernatur atque eum qui aspernatur. Blanditiis rerum ipsam in.', '28', '2019-04-18', 'Sao Tome and Principe', '', '1', 0, 0, 4, 46),
(7, 'veniam', 'Dolorem non nesciunt non minima laboriosam quam quia voluptas. Voluptatem est excepturi illo. Ex recusandae voluptates non qui. Et nihil rerum ut qui. Aut tempora consequatur dolores ea repellendus molestias.', '393', '2019-04-18', 'Brazil', '', '3', 0, 0, 8, 59),
(8, 'earum', 'Totam enim voluptas dolore. Tenetur sequi porro mollitia ducimus optio. Doloremque illum odit qui qui maiores nemo est.', '25', '2019-04-18', 'Paraguay', '', '2', 0, 0, 7, 35),
(9, 'rem', 'A veniam rerum qui. Maxime hic voluptatem eos et. Quis rerum veniam et labore nulla. Magni quidem itaque provident nihil ut voluptatibus sed neque.', '286', '2019-04-18', 'Hungary', '', '3', 0, 0, 10, 23),
(10, 'commodi', 'Tempora suscipit amet reiciendis laboriosam enim reiciendis. Adipisci aliquam aliquid ipsum mollitia. Vero vero id tempora non autem quaerat. Deserunt ab sit voluptas ipsam et et quis. Ab dolorem dolorem blanditiis. Eum occaecati maiores laudantium provident.', '839', '2019-04-18', 'Reunion', '', '2', 0, 0, 3, 68),
(11, 'tempore', 'Non eveniet recusandae soluta. Qui nobis pariatur nesciunt fugit optio voluptatem excepturi. Cum ipsa consequuntur soluta temporibus mollitia in magnam ea. Ut est numquam possimus iste doloremque. Dolor voluptatem voluptas molestiae et reprehenderit sed. Dolorem distinctio dolore debitis adipisci consequuntur.', '351', '2019-04-18', 'Macedonia', '', '3', 0, 0, 7, 25),
(12, 'sit', 'Occaecati voluptatem vel sapiente sint distinctio ut quae. Et nihil in et eveniet nihil nulla. Sunt nihil rerum sint nisi. Ipsa qui molestiae laborum earum.', '44', '2019-04-18', 'Chile', '', '3', 0, 0, 4, 22),
(13, 'perspiciatis', 'Praesentium sit ut quo a assumenda eligendi. Corrupti quo perferendis autem nostrum id facere. Molestias id ut est. Sunt quasi ut veritatis. Est est saepe error aut id nihil aliquam.', '772', '2019-04-18', 'Czech Republic', '', '3', 0, 0, 7, 44),
(14, 'voluptates', 'Aperiam laudantium accusamus ex temporibus. Fuga architecto quia omnis aut et ipsum soluta. Et vitae qui dolorem similique eaque minima consequatur.', '794', '2019-04-18', 'Pakistan', '', '3', 0, 0, 3, 31),
(15, 'nisi', 'Nemo neque omnis harum deleniti dicta hic. Magni aliquam occaecati incidunt maiores. Quaerat consectetur corporis labore eveniet. Nam omnis aut magni.', '917', '2019-04-18', 'United Kingdom', '', '3', 0, 0, 10, 68),
(16, 'assumenda', 'In voluptates consequatur nemo asperiores. Quis perspiciatis eum ut saepe. Eum quis et rerum ipsam doloremque. Dicta similique et ullam corrupti in. Delectus et nisi quisquam aspernatur optio omnis dolor voluptatem.', '957', '2019-04-18', 'Burkina Faso', '', '3', 0, 0, 1, 29),
(17, 'consequuntur', 'Dolorem rerum qui molestiae temporibus laudantium qui repellendus. Ipsa non a necessitatibus reprehenderit qui sint est. Ipsa qui officia non sit corrupti id. Distinctio quis aut quisquam eaque repellat velit earum dolores. Est ut omnis laboriosam saepe et ipsam voluptas repellendus.', '456', '2019-04-18', 'San Marino', '', '1', 0, 0, 3, 10),
(18, 'rerum', 'Ipsam blanditiis tenetur consequuntur nihil. Deleniti qui nesciunt et voluptas delectus adipisci commodi. Aliquam et quibusdam nisi mollitia laudantium aut quibusdam molestiae. Sit esse corrupti vel ratione aut. Nulla quo est minus harum nobis tempora quis.', '303', '2019-04-18', 'Reunion', '', '2', 0, 0, 3, 65),
(19, 'quisquam', 'Est et commodi ea reprehenderit nobis itaque expedita. Debitis debitis odit possimus quaerat minus. Itaque rem modi est et officiis similique dolorem dolorem. Ab magnam qui est et quia.', '680', '2019-04-18', 'Fiji', '', '3', 0, 0, 2, 3),
(20, 'eos', 'Iste quibusdam et aliquam ut vero veritatis eligendi. Molestias esse quo quis magnam est omnis. Animi saepe molestiae natus. Ipsum excepturi provident est incidunt.', '983', '2019-04-18', 'Kuwait', '', '2', 0, 0, 3, 24),
(21, 'velit', 'Laboriosam itaque quae quibusdam veritatis hic consectetur. Qui cumque atque quisquam. Dignissimos omnis possimus enim voluptate sit explicabo voluptas fugit. Est molestias labore nisi. Sit sunt consequuntur esse quia aut sed assumenda.', '749', '2019-04-18', 'Panama', '', '3', 0, 0, 8, 58),
(22, 'reiciendis', 'Architecto omnis doloremque praesentium quod nihil deleniti. Voluptates magnam facere autem cupiditate deleniti. Perferendis sequi autem et quia porro qui molestias. Iure esse distinctio dolore non. Ut vel dolore qui quaerat nihil.', '822', '2019-04-18', 'Trinidad and Tobago', '', '1', 0, 0, 7, 15),
(23, 'illum', 'Omnis ducimus amet qui nihil quibusdam molestias. Et sunt ea veniam maiores. Corporis laudantium aut commodi dicta est.', '259', '2019-04-18', 'Czech Republic', '', '2', 0, 0, 8, 78),
(24, 'ab', 'Omnis fuga iure in eos et maxime. Voluptatem labore et ad eaque et perspiciatis. Non et pariatur veniam occaecati. Quisquam ut maxime aperiam maiores. Ab vel beatae veniam ratione ut harum aperiam.', '10', '2019-04-18', 'Tokelau', '', '3', 0, 0, 6, 21),
(25, 'possimus', 'Ad tempore commodi laudantium omnis. Aliquam labore nisi officia ducimus et. Quasi soluta animi illum provident. Similique perferendis in quos voluptas rerum et. Fugit odio sequi vel ut delectus laborum accusantium. Minus maxime reprehenderit est ut.', '150', '2019-04-18', 'Monaco', '', '3', 0, 0, 8, 92),
(26, 'impedit', 'Velit excepturi nam veritatis labore alias enim. Maxime non quo tempore itaque hic aut. Nam molestiae unde deserunt dignissimos. Error commodi enim minima et. Sint repellendus autem consequatur provident nesciunt itaque nihil. Placeat velit aut eum ut magnam et.', '184', '2019-04-18', 'Bouvet Island (Bouvetoya)', '', '2', 0, 0, 5, 41),
(27, 'vitae', 'Iure quasi suscipit vero. Incidunt nihil voluptatem consequatur numquam aliquam nihil. Accusantium voluptatem nobis qui. Blanditiis ipsam sint ut minima. Non accusantium distinctio error aut voluptate temporibus laborum. Qui enim omnis commodi quis et similique.', '272', '2019-04-18', 'Pitcairn Islands', '', '2', 0, 0, 8, 7),
(28, 'dolorem', 'Sequi tempora dolores neque quidem omnis. Doloremque laudantium ea consequatur et placeat asperiores est. Aspernatur eaque nemo maxime et consequatur architecto aperiam. Alias voluptas eligendi placeat.', '566', '2019-04-18', 'Hong Kong', '', '2', 0, 0, 3, 6),
(29, 'eligendi', 'Dolor eum eligendi beatae. Soluta a sit ullam asperiores excepturi. Labore pariatur ipsam ut ducimus nam quis.', '612', '2019-04-18', 'Madagascar', '', '3', 0, 0, 1, 14),
(30, 'nostrum', 'Rem aut rem doloremque tempora libero totam. Consequatur quia nisi dolores commodi fugit ea. Facere excepturi odit ea aut. Similique et dolore harum quis eius. Dicta quos consequuntur enim reiciendis.', '848', '2019-04-18', 'Russian Federation', '', '3', 0, 0, 2, 43),
(31, 'architecto', 'Consequuntur excepturi vel non nam. Eius corrupti magnam reprehenderit aut illum illo qui et. Eum et iste ab sunt sed. Ea deserunt optio expedita harum veniam.', '222', '2019-04-18', 'Isle of Man', '', '3', 0, 0, 3, 36),
(32, 'eaque', 'Esse aut perferendis maxime doloribus eum. Laboriosam dolorem aut illo quaerat. Quibusdam perspiciatis et officia vel in rerum. Et aut velit et. Ullam magni sed rerum consequatur delectus eveniet eum.', '639', '2019-04-18', 'Cyprus', '', '3', 0, 0, 1, 89),
(33, 'et', 'Cumque et ad dolorem perferendis omnis quas velit voluptatem. Rem officia sed vitae vel earum. Aperiam incidunt consequatur nihil. Vel vero aut culpa molestias.', '201', '2019-04-18', 'Serbia', '', '1', 0, 0, 1, 43),
(34, 'rerum', 'Suscipit sint voluptatem animi labore omnis labore quia non. Vel dolores quae expedita eum. Qui pariatur distinctio quos blanditiis. Recusandae a voluptatum officiis doloribus recusandae.', '104', '2019-04-18', 'China', '', '2', 0, 0, 5, 46),
(35, 'et', 'Molestiae temporibus eaque nisi est omnis non ullam. Quis aliquam quos dolores excepturi qui ad. Odit similique consequuntur aut corporis.', '84', '2019-04-18', 'Mexico', '', '3', 0, 0, 7, 43),
(36, 'unde', 'Mollitia ipsa quos voluptatibus corrupti. Laboriosam ut quisquam sed consequatur quam qui. Iste nihil maxime nulla. Vel neque voluptates fugiat dicta provident.', '776', '2019-04-18', 'Palestinian Territories', '', '2', 0, 0, 6, 59),
(37, 'consequatur', 'Ea et sit est veritatis ut quod est. Quibusdam impedit unde quidem nam quo laudantium. Repellendus quisquam vero dolor eos. Facilis ea expedita ipsa inventore nam.', '519', '2019-04-18', 'Saint Pierre and Miquelon', '', '1', 0, 0, 4, 6),
(38, 'aut', 'Qui quibusdam eos voluptatem qui quo. Dolor quia facere molestias est aut culpa et voluptatibus. Aspernatur odio non nisi voluptatem aliquid. Magni aliquam neque et ea officia aut. Qui et adipisci nemo accusantium maiores enim.', '883', '2019-04-18', 'Syrian Arab Republic', '', '2', 0, 0, 4, 50),
(39, 'nesciunt', 'Autem quod natus possimus quia enim omnis. At dolorem ab et non eum minima doloremque. Adipisci qui at sunt aut vel quis architecto rem. Incidunt voluptatem unde soluta nihil sequi consectetur. Aut placeat quae veniam natus odit consequatur aut.', '771', '2019-04-18', 'Saint Martin', '', '1', 0, 0, 2, 95),
(40, 'velit', 'Quos ex molestiae a non. Totam repellendus distinctio velit tempore eum vel similique. Id vitae est ut eum aut laboriosam ipsa. Voluptate ullam consequatur et molestias facilis. Et blanditiis sit vero aperiam labore ipsa ab non. Delectus mollitia rerum aut voluptas qui enim sunt consequatur.', '603', '2019-04-18', 'Palestinian Territories', '', '1', 0, 0, 5, 21),
(41, 'veniam', 'Numquam odit ipsa ipsum sit est atque at excepturi. Aperiam laborum molestiae aut consequuntur beatae. Voluptatem cumque qui a optio. Est magnam nesciunt rerum vitae dolorum. Optio natus hic modi nihil. Nemo in sed velit impedit commodi.', '364', '2019-04-18', 'Costa Rica', '', '3', 0, 0, 1, 55),
(42, 'quo', 'Fugit quis eos voluptas eveniet veniam. Porro dolor eum ab inventore atque. Est aliquid reiciendis ut ea eos. Maiores veritatis eum quis magnam animi. Eos odio eligendi voluptate facere.', '592', '2019-04-18', 'Dominica', '', '2', 0, 0, 6, 54),
(43, 'enim', 'Quas alias ad illum numquam dignissimos odio aut. Et quod asperiores magnam sequi. Porro reprehenderit voluptate quia aut. Voluptatem deleniti fugit nulla ut. Suscipit eum pariatur sed tempore.', '914', '2019-04-18', 'Tajikistan', '', '2', 0, 0, 5, 57),
(44, 'temporibus', 'Dolore quidem eum ut velit. Voluptate rerum earum quis amet consequatur non non nulla. Dolores quisquam nostrum quo eum sunt dolorem fuga. Consectetur ratione ducimus ea dicta voluptas.', '299', '2019-04-18', 'Costa Rica', '', '3', 0, 0, 7, 33),
(45, 'consequatur', 'Voluptatem unde quo magni praesentium. Magnam vel tempora maiores aut molestias. Dolorem omnis tempore repudiandae non harum molestiae quis.', '85', '2019-04-18', 'Denmark', '', '1', 0, 0, 10, 76),
(46, 'quo', 'Nihil iusto et placeat cumque voluptatum culpa eos. Consectetur quis facilis quod sed quis sunt. Molestiae hic repellendus corporis quaerat. Non eaque nemo et velit.', '713', '2019-04-18', 'Taiwan', '', '3', 0, 0, 7, 34),
(47, 'non', 'Atque explicabo eos quaerat id architecto necessitatibus. Exercitationem qui eveniet voluptatibus nam magni tempore eveniet. Quis voluptatem nihil libero temporibus modi pariatur.', '797', '2019-04-18', 'Uganda', '', '2', 0, 0, 2, 1),
(48, 'voluptatem', 'Mollitia ullam inventore eos odio illo. Quasi sit quis temporibus molestiae quas accusantium et. Expedita expedita nisi qui ad reiciendis. Blanditiis voluptatibus at totam fugiat id.', '848', '2019-04-18', 'Czech Republic', '', '2', 0, 0, 7, 52),
(49, 'consequatur', 'Quia tempore veniam dicta nulla eveniet temporibus laudantium. Labore consequuntur hic magnam ipsam neque at. Qui natus aut fugit nihil rerum sed.', '489', '2019-04-18', 'Estonia', '', '2', 0, 0, 5, 76),
(50, 'placeat', 'Ea ad aut suscipit porro unde delectus. Inventore cupiditate nam delectus voluptatem. Et voluptatem quis deserunt rerum optio aut. Aperiam ut provident voluptates consequuntur sunt odit.', '690', '2019-04-18', 'Vanuatu', '', '3', 0, 0, 4, 90),
(51, 'quam', 'Ut architecto animi modi distinctio nobis quae sint. Saepe voluptatem dolore ex voluptatem ut quam et. Ipsa assumenda nam ducimus tempora.', '810', '2019-04-18', 'El Salvador', '', '1', 0, 0, 2, 90),
(52, 'fuga', 'Temporibus iste rerum nobis architecto. Repellat quos dolor maiores. Aut voluptatem ullam qui non assumenda id laboriosam. Ut aut sed ad. Incidunt sapiente natus illum aut. Ex sunt temporibus natus magni nesciunt aliquam in.', '81', '2019-04-18', 'United Kingdom', '', '1', 0, 0, 7, 92),
(53, 'recusandae', 'Molestiae consequatur excepturi quas voluptas non. Perferendis iure et doloremque qui. Nobis autem voluptas voluptate vel repellendus aut occaecati et.', '883', '2019-04-18', 'Albania', '', '2', 0, 0, 1, 92),
(54, 'molestiae', 'Eius eos et fuga iste illo incidunt. Ea aspernatur et a doloribus sed expedita. Corporis quasi magnam sed eligendi nesciunt. Et repudiandae vitae ratione. Enim tempora ut at porro id quo sed.', '511', '2019-04-18', 'Portugal', '', '2', 0, 0, 3, 8),
(55, 'ut', 'Sit quo corporis aspernatur. Hic non quos ut et quia molestiae. Ut recusandae et porro culpa deleniti ea. Nemo inventore commodi expedita voluptatem accusamus est nobis. Architecto velit fugit delectus nobis est asperiores est. Et officiis omnis nemo facilis eum.', '620', '2019-04-18', 'Chile', '', '1', 0, 0, 5, 28),
(56, 'et', 'Eaque ut vel fuga. Nisi accusamus iusto quaerat enim dolorem nulla sunt. Aut ipsum eos autem et aut. Unde consequatur et earum cumque ad et. Eveniet vel voluptas sit voluptas reprehenderit eos.', '852', '2019-04-18', 'Namibia', '', '2', 0, 0, 1, 29),
(57, 'quia', 'Omnis magni blanditiis et aspernatur quo. Qui aspernatur aliquam cum sint ut ratione dignissimos itaque. Fuga voluptas optio adipisci ut. Repellat assumenda excepturi pariatur in corporis. Rem et libero aut culpa quos et. Blanditiis consequuntur nisi labore nostrum recusandae.', '726', '2019-04-18', 'Niger', '', '1', 0, 0, 6, 66),
(58, 'voluptatem', 'Quis est officia qui sit quam. Voluptatem soluta ipsam esse omnis sed. Blanditiis aliquid dolorem asperiores a error non. Nemo dolores et eligendi.', '213', '2019-04-18', 'Czech Republic', '', '2', 0, 0, 1, 86),
(59, 'quia', 'Qui repellat et repudiandae at. Culpa dolorem excepturi rerum ut nostrum. Dicta deserunt repudiandae quibusdam quos dolores. Non corrupti quia voluptas rerum non eos.', '169', '2019-04-18', 'Lao People\'s Democratic Republic', '', '1', 0, 0, 9, 2),
(60, 'consequuntur', 'Ab tempora ut esse velit consequuntur est aut. Architecto dignissimos et nulla voluptas facere expedita omnis nam. Autem libero rerum sed.', '359', '2019-04-18', 'Trinidad and Tobago', '', '1', 0, 0, 9, 23),
(61, 'quo', 'Nemo est modi est doloribus aut quaerat. Quos id nulla eius excepturi quasi iusto. Id et dolores laboriosam praesentium odio necessitatibus in repudiandae. Quod dolores nostrum itaque explicabo sed atque qui. Voluptatem et corporis itaque eum.', '187', '2019-04-18', 'Malawi', '', '1', 0, 0, 2, 54),
(62, 'saepe', 'Excepturi quia totam blanditiis sed. Aut quia qui eum sunt. Maxime enim recusandae sed ex quidem expedita vel eius. Voluptate nemo odio dolorem earum beatae neque.', '468', '2019-04-18', 'Uzbekistan', '', '3', 0, 0, 10, 58),
(63, 'aperiam', 'Qui natus architecto ipsam nostrum ullam. Nemo non id aut repellendus voluptas in sed. Atque dolores quia tempore in quos consectetur cum. Inventore hic dolorem non ex quo. Adipisci iste aperiam molestias autem omnis.', '775', '2019-04-18', 'Wallis and Futuna', '', '3', 0, 0, 7, 3),
(64, 'ut', 'Voluptatem enim aut architecto ad dignissimos voluptates. Magni sed labore perspiciatis nostrum qui accusantium. Ut quae rerum perspiciatis ipsa autem fugiat maiores cumque. Quasi voluptatum eum quia distinctio consequatur.', '405', '2019-04-18', 'Western Sahara', '', '3', 0, 0, 5, 27),
(65, 'nobis', 'Voluptas eos veritatis dolor repellendus necessitatibus quia perferendis. Quibusdam rerum et et alias culpa voluptas ducimus. Vitae voluptas corrupti id accusamus veniam. Quia velit exercitationem vero adipisci laudantium.', '209', '2019-04-18', 'Palestinian Territories', '', '3', 0, 0, 5, 19),
(66, 'fugiat', 'Fugiat odit maiores et minima ducimus. Esse consequatur sunt voluptatem et non id. Voluptatem et quas soluta ut optio porro. Aut et sunt molestiae numquam.', '129', '2019-04-18', 'Nigeria', '', '3', 0, 0, 3, 100),
(67, 'voluptas', 'Praesentium ipsa qui dolorem eum distinctio. Ut laudantium ea fugit ipsum qui. Et dignissimos et dolores voluptatem. Consectetur vero consequatur et voluptatem ipsam sunt veniam. Est consequatur unde optio eligendi neque. Itaque magni et iure.', '207', '2019-04-18', 'Israel', '', '1', 0, 0, 3, 83),
(68, 'rerum', 'Molestiae excepturi odit minus delectus numquam cumque. Dignissimos quis enim corrupti quia quo. Nemo deleniti quia optio facere. Ad aliquid recusandae ut eligendi.', '129', '2019-04-18', 'French Guiana', '', '3', 0, 0, 10, 39),
(69, 'ut', 'Consequatur praesentium id dolores qui ipsum id eos. Quibusdam et odit voluptatem deserunt. Et cupiditate illum illum minima nostrum.', '522', '2019-04-18', 'Serbia', '', '1', 0, 0, 5, 56),
(70, 'aperiam', 'Officiis dolorem quidem est omnis necessitatibus. Delectus consectetur rem aliquid illo maiores quidem. Maiores et et qui repudiandae.', '819', '2019-04-18', 'Bouvet Island (Bouvetoya)', '', '3', 0, 0, 7, 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL COMMENT 'to identify User',
  `Username` varchar(225) NOT NULL COMMENT 'Username to login',
  `Password` varchar(225) NOT NULL COMMENT 'Password to login',
  `Email` varchar(225) NOT NULL,
  `Fullname` varchar(225) NOT NULL,
  `GroupID` int(11) NOT NULL DEFAULT '0' COMMENT 'To distinguish admin from other users',
  `TrustStatus` int(11) NOT NULL DEFAULT '0' COMMENT 'sellerRank	',
  `RegStatus` int(11) NOT NULL DEFAULT '0' COMMENT 'User waiting for Approval',
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`, `Fullname`, `GroupID`, `TrustStatus`, `RegStatus`, `Date`) VALUES
(1, 'Helene', 'cO@1B]aW6g|&mE:}W-Q', 'reichel.delta@hotmail.com', 'Rosalee', 0, 0, 0, '2019-04-18'),
(2, 'Fidel', ':0O]$HB-wm', 'jessyca06@hotmail.com', 'Retta', 0, 0, 0, '2019-04-18'),
(3, 'Veda', 'cdXb+u3:\'(', 'jazmin05@hartmann.com', 'Susie', 0, 0, 0, '2019-04-18'),
(4, 'Jaunita', 'N9l|@>|jr3o3%%mq5N', 'ahoppe@hotmail.com', 'Trinity', 0, 0, 0, '2019-04-18'),
(5, 'Lois', '596x4:x7', 'brandi10@gmail.com', 'Denis', 0, 0, 0, '2019-04-18'),
(6, 'Rodrigo', 'S(+^?3_sq]\'M0\"G', 'margarete.kuphal@bins.com', 'Evans', 0, 0, 0, '2019-04-18'),
(7, 'Lea', '$pB;3F_', 'crona.matt@gmail.com', 'Karl', 0, 0, 0, '2019-04-18'),
(8, 'Romaine', 'X>|Ndl4u\"-BPF:d_', 'kelli.weimann@yahoo.com', 'Dereck', 0, 0, 0, '2019-04-18'),
(9, 'Sabrina', 'p%qT&Hg[mGF2N', 'nitzsche.rogelio@gmail.com', 'Gina', 0, 0, 0, '2019-04-18'),
(10, 'Domenica', 'G-sy@*', 'hodkiewicz.fredrick@nitzsche.com', 'Annamae', 0, 0, 0, '2019-04-18'),
(11, 'Alayna', 'zCszDcgj.aq', 'theodore57@gmail.com', 'Leora', 0, 0, 0, '2019-04-18'),
(12, 'Antonietta', ']#k-jb3NEbNH56QN^', 'freeda.keebler@gutkowski.com', 'Laisha', 0, 0, 0, '2019-04-18'),
(13, 'Nya', 'r*B}>,(d*4p}', 'jmurazik@yahoo.com', 'Damien', 0, 0, 0, '2019-04-18'),
(14, 'Casper', '&Gfv?{@ppf63WT^uYS', 'bechtelar.shakira@little.com', 'Betsy', 0, 0, 0, '2019-04-18'),
(15, 'Eleanore', '`rNjSDL``yhmm', 'legros.astrid@denesik.org', 'Rory', 0, 0, 0, '2019-04-18'),
(16, 'Enos', 'F\"av4$_EqrR', 'darlene.murazik@hill.com', 'Aubree', 0, 0, 0, '2019-04-18'),
(17, 'Taurean', 'G\'`#_Md^9?\\r=XTJ', 'gerlach.fletcher@gmail.com', 'Hazle', 0, 0, 0, '2019-04-18'),
(18, 'Thomas', 'T|/hlG>1(A![It', 'myrl.fisher@stanton.org', 'Concepcion', 0, 0, 0, '2019-04-18'),
(19, 'Roberta', '1g-[kl];#!CL', 'otto41@hotmail.com', 'Elta', 0, 0, 0, '2019-04-18'),
(20, 'Kenton', 'KO0o][!D8,x0*$DTmUi8', 'nlind@hotmail.com', 'Filomena', 0, 0, 0, '2019-04-18'),
(21, 'Russell', 'AB0bh43Er\'', 'ygoodwin@gmail.com', 'Marquis', 0, 0, 0, '2019-04-18'),
(22, 'Kristin', ':#An!RW\'f_+s_}79Oj', 'katherine.hayes@senger.com', 'Nicholas', 0, 0, 0, '2019-04-18'),
(23, 'Raul', 'Wl\\*?7+m0F[O)?^\"M~s', 'dorris67@hotmail.com', 'Cleora', 0, 0, 0, '2019-04-18'),
(24, 'Lauretta', '~#*Ljc*Zf]', 'rmoore@gmail.com', 'Jamal', 0, 0, 0, '2019-04-18'),
(25, 'Magnolia', '>5S#MW=L(Fkxq%\\(W!4', 'ozella.kessler@yahoo.com', 'Leonor', 0, 0, 0, '2019-04-18'),
(26, 'Ressie', 'Jx{VF=O;+Q8', 'zdavis@hotmail.com', 'Arvilla', 0, 0, 0, '2019-04-18'),
(27, 'Toni', '~w<k6lUnof%pGOp\\Fhe5', 'arden47@champlin.com', 'Alejandrin', 0, 0, 0, '2019-04-18'),
(28, 'Victor', '\"oDqy_xFX<z?', 'fadel.lelah@leannon.com', 'Destinee', 0, 0, 0, '2019-04-18'),
(29, 'Leon', '365o`10', 'derek28@hotmail.com', 'Koby', 0, 0, 0, '2019-04-18'),
(30, 'Jimmie', 'n_Izg!IE`i+g_VAgp;hH', 'richard01@mcglynn.com', 'Hilda', 0, 0, 0, '2019-04-18'),
(31, 'Jovan', '.xV:phKL2I6kuj>[~3P', 'amya69@yahoo.com', 'Muriel', 0, 0, 0, '2019-04-18'),
(32, 'Letha', '|,?VX#2)j=LJ', 'kilback.willow@yahoo.com', 'Michele', 0, 0, 0, '2019-04-18'),
(33, 'Cordell', '0m2|U9w6o', 'harvey.dakota@ferry.org', 'Marjory', 0, 0, 0, '2019-04-18'),
(34, 'Kaitlyn', '9bgL<o', 'chaya33@schuster.com', 'Delmer', 0, 0, 0, '2019-04-18'),
(35, 'Lacy', 'FZq-F:Xn!+3', 'lavern.hackett@gmail.com', 'Devyn', 0, 0, 0, '2019-04-18'),
(36, 'Tressa', '&Z.boB%|AY~.vvI^', 'weber.gabriel@stokes.com', 'Kelsie', 0, 0, 0, '2019-04-18'),
(37, 'Hilma', '9t|)#%\"Y<|lU|8TvpQ', 'emmerich.bertha@gmail.com', 'Rudolph', 0, 0, 0, '2019-04-18'),
(38, 'Rebeca', 'JM[I]/=\\]', 'mariela.anderson@gmail.com', 'Jordy', 0, 0, 0, '2019-04-18'),
(39, 'Coty', 'hgL$,74,M>e,m', 'ali.dooley@ratke.com', 'Syble', 0, 0, 0, '2019-04-18'),
(40, 'Merlin', 'o4it\\@', 'qlowe@dubuque.com', 'Telly', 0, 0, 0, '2019-04-18'),
(41, 'London', '6Bcp}UvzzlF5q&', 'eliezer.morissette@yahoo.com', 'Cooper', 0, 0, 0, '2019-04-18'),
(42, 'Jazlyn', 'S)NiZckXP(S&&wTn>WfL', 'von.jeanette@okon.com', 'Jan', 0, 0, 0, '2019-04-18'),
(43, 'Fay', 'ZR#~K\'wQuG}65oU)}', 'flabadie@hotmail.com', 'Enrico', 0, 0, 0, '2019-04-18'),
(44, 'Diego', 'l.<#Ls]7,UExY', 'garland71@gmail.com', 'Maudie', 0, 0, 0, '2019-04-18'),
(45, 'Aurelia', '~I7J1$+/~a.:NX+', 'lindsay90@hotmail.com', 'Holly', 0, 0, 0, '2019-04-18'),
(46, 'Janet', ']_2=kS8jC(>x4dj', 'sammy.kertzmann@gmail.com', 'Verda', 0, 0, 0, '2019-04-18'),
(47, 'Linda', 'Er.i\'?&Ms]', 'watson23@beatty.com', 'Elva', 0, 0, 0, '2019-04-18'),
(48, 'Joany', '>1[]QjK', 'camylle.beatty@hotmail.com', 'Nolan', 0, 0, 0, '2019-04-18'),
(49, 'Jonatan', 'R=,(cq', 'ulang@vonrueden.com', 'Treva', 0, 0, 0, '2019-04-18'),
(50, 'Alberta', 'sj]<}!cBSlybOeEgz:vA', 'ara84@dickinson.com', 'Pierre', 0, 0, 0, '2019-04-18'),
(51, 'Donna', 'irR.MxDAU', 'mercedes96@denesik.net', 'Sydnie', 0, 0, 0, '2019-04-18'),
(52, 'Charlie', '^&4)w==,,A3#|A', 'marvin.bryce@stamm.com', 'Fidel', 0, 0, 0, '2019-04-18'),
(53, 'Kendrick', 'o6pV8ut<@', 'barton42@davis.com', 'Garland', 0, 0, 0, '2019-04-18'),
(54, 'Orie', '7^ScY~MT)Wg(iEab&jt', 'mhills@ziemann.info', 'Alba', 0, 0, 0, '2019-04-18'),
(55, 'Ava', '\'=Uc+LiR', 'pacocha.simone@ryan.com', 'Carolanne', 0, 0, 0, '2019-04-18'),
(56, 'Marlon', '>Gt`*:z_6Sc', 'alexandrine.krajcik@hotmail.com', 'Jody', 0, 0, 0, '2019-04-18'),
(57, 'Leonard', '9C|D~i\\_*>7|<^7a', 'zwalker@hotmail.com', 'Maudie', 0, 0, 0, '2019-04-18'),
(58, 'Tina', '/n}@fTsi', 'wbeahan@fisher.com', 'Helena', 0, 0, 0, '2019-04-18'),
(59, 'Cierra', '&\'L0.~)Vk-KVtLe*Um', 'blanda.carmela@hotmail.com', 'Patience', 0, 0, 0, '2019-04-18'),
(60, 'Sarina', '9#:9)SW>x5\\N\\OdG^fX', 'reichert.jessika@heathcote.com', 'Gust', 0, 0, 0, '2019-04-18'),
(61, 'Glennie', 'h-trzT', 'victor82@nader.net', 'Alva', 0, 0, 0, '2019-04-18'),
(62, 'Blanca', '\'KyXg2&tZ3D:x', 'bartell.cyril@hotmail.com', 'Itzel', 0, 0, 0, '2019-04-18'),
(63, 'Peyton', '>YRufO>2tS}Xna<jv)3S', 'funk.sabryna@kunde.biz', 'Myrtie', 0, 0, 0, '2019-04-18'),
(64, 'Anika', 'U]k>>.SRqZ', 'lonnie.marks@yahoo.com', 'Peter', 0, 0, 0, '2019-04-18'),
(65, 'Delia', '2PZl$sa', 'wreinger@bogan.com', 'Jarred', 0, 0, 0, '2019-04-18'),
(66, 'Tanner', 'L_VALg]{EaK7`', 'freddie.thompson@gmail.com', 'Sven', 0, 0, 0, '2019-04-18'),
(67, 'Jazmin', '6%9+z(1]', 'russel.avis@murazik.com', 'Karelle', 0, 0, 0, '2019-04-18'),
(68, 'Cordie', 'x82]4j=[N.D', 'oquitzon@yahoo.com', 'Juliana', 0, 0, 0, '2019-04-18'),
(69, 'Juston', 'lkIH\\22&|&b~0?hW', 'elwin25@maggio.com', 'Eunice', 0, 0, 0, '2019-04-18'),
(70, 'Kaycee', 'GlvntKv@Fb&55vd)|v:', 'vicente44@hotmail.com', 'Eulalia', 0, 0, 0, '2019-04-18'),
(71, 'Dallin', 'Wz<Os5,DcwgQmqc3', 'qbrakus@schulist.com', 'Arjun', 0, 0, 0, '2019-04-18'),
(72, 'Triston', 'A%vY=y1^&tBWow!R', 'crist.jermaine@gmail.com', 'Elissa', 0, 0, 0, '2019-04-18'),
(73, 'Clarabelle', '[,$@\",OP', 'sschaefer@hotmail.com', 'Odie', 0, 0, 0, '2019-04-18'),
(74, 'Alvena', 'APe_b%#,Z#', 'delores16@mertz.com', 'Jerrell', 0, 0, 0, '2019-04-18'),
(75, 'Obie', 'bu\'QIZT,i', 'mireya52@fay.info', 'Johan', 0, 0, 0, '2019-04-18'),
(76, 'Santina', ')\'XQ&}*', 'altenwerth.liana@hotmail.com', 'Chelsey', 0, 0, 0, '2019-04-18'),
(77, 'Kiara', 'C)-DU@Dd7XLjDQ}xWT', 'conroy.sidney@yahoo.com', 'Luisa', 0, 0, 0, '2019-04-18'),
(78, 'Barbara', 'ykCp#9CT?/hY}q^I', 'nhickle@stanton.biz', 'Korey', 0, 0, 0, '2019-04-18'),
(79, 'Arvel', 'F=6F?*}/V~w', 'madison57@hotmail.com', 'Delta', 0, 0, 0, '2019-04-18'),
(80, 'Dameon', 'H,0L!$8', 'spencer.frida@yahoo.com', 'Luna', 0, 0, 0, '2019-04-18'),
(81, 'Courtney', 'e4\"ac\\Mze=%*l0jEWcv', 'ekohler@block.net', 'Murphy', 0, 0, 0, '2019-04-18'),
(82, 'Claire', '.4WUagnqE}wr*a1nB`%$', 'crona.jennyfer@heathcote.net', 'Marcel', 0, 0, 0, '2019-04-18'),
(83, 'Kiera', 'HOWqoER312KkQrKO', 'charris@yahoo.com', 'Charlie', 0, 0, 0, '2019-04-18'),
(84, 'Verona', 'x2RR[:/)b!e<7$v', 'tiara70@rolfson.com', 'Rosendo', 0, 0, 0, '2019-04-18'),
(85, 'Nella', 'EnX+^~\'\'fZn#B(<=XC', 'cara.koss@gmail.com', 'Alexander', 0, 0, 0, '2019-04-18'),
(86, 'Dulce', 'Bg$<\"H77_/h@vvx0F|$V', 'willow.emard@hotmail.com', 'Shaina', 0, 0, 0, '2019-04-18'),
(87, 'Alena', '[+C]ifE6]G', 'flatley.tiara@yahoo.com', 'Hayley', 0, 0, 0, '2019-04-18'),
(88, 'Lisette', 'Eg;I@;HU|', 'elockman@gmail.com', 'Telly', 0, 0, 0, '2019-04-18'),
(89, 'Giovanny', 'sb5@I}hONZ5', 'conn.nadia@kautzer.com', 'Nicholaus', 0, 0, 0, '2019-04-18'),
(90, 'Verna', 'klTE@=GVrS+\\.muY+j', 'block.tyrique@hotmail.com', 'Tia', 0, 0, 0, '2019-04-18'),
(91, 'Domenico', 'fI|VrujZ', 'jnolan@ritchie.org', 'Dee', 0, 0, 0, '2019-04-18'),
(92, 'Nannie', '<N0GQ{eN2<]\'<A4!]Qp', 'kristopher49@bode.biz', 'Adah', 0, 0, 0, '2019-04-18'),
(93, 'Keeley', 'f~pDfU^6/', 'coty87@walter.biz', 'Keyshawn', 0, 0, 0, '2019-04-18'),
(94, 'Jacklyn', ':4F3Mdytp9j3ik@W:I', 'earnest98@hotmail.com', 'Domenica', 0, 0, 0, '2019-04-18'),
(95, 'Tyrique', 'LCQ3]Lh_', 'morris.lynch@gmail.com', 'Fausto', 0, 0, 0, '2019-04-18'),
(96, 'Juliet', '?0,*~:s`', 'rice.jeanne@stokes.com', 'Arnaldo', 0, 0, 0, '2019-04-18'),
(97, 'Ashly', 'L4K=RBm5),L-&3', 'emmanuelle.rowe@yahoo.com', 'Tressa', 0, 0, 0, '2019-04-18'),
(98, 'Kole', 'k/=,%%Rx!(|5', 'gutkowski.burley@gmail.com', 'Jenifer', 0, 0, 0, '2019-04-18'),
(99, 'Justine', '+\'Ic$U5UV;:}4s', 'hane.imani@kuphal.com', 'Lonie', 0, 0, 0, '2019-04-18'),
(100, 'Payton', 'eJGWr4-a&\\6d\'', 'rmuller@hotmail.com', 'Sister', 0, 0, 0, '2019-04-18'),
(101, 'mohamed_ahmed', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'mohamed7el17@gmail.com', 'Mohamed Ahmed', 1, 1, 1, '2019-04-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`C_id`),
  ADD KEY `user_1` (`user_id`),
  ADD KEY `item_1` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_ID`),
  ADD KEY `member_1` (`Member_ID`),
  ADD KEY `cat_1` (`Cat_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identify the item', AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'to identify User', AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `item_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `cat_1` FOREIGN KEY (`Cat_ID`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_1` FOREIGN KEY (`Member_ID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
