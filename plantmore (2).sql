-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2024 at 10:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plantmore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `address` text NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `date_left` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0-inactive\r\n1-active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `image`, `name`, `username`, `password`, `phone`, `address`, `date_created`, `date_left`, `status`) VALUES
(1, '1618285494.jpg', 'Shalini A', 'shaliniadevi@gmail.com', 'Admin123@@', '6374400248', '28/8, Pandian Nagar, 6th street, Madurai', '2021-01-10', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `blog_title` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `blog_description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0-inactive\r\n1-active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id`, `created_date`, `blog_title`, `image`, `blog_description`, `created_by`, `status`) VALUES
(21, '2021-04-26 07:08:00', 'Best Indoor Plants Available', '1618302574.jpg', 'Money plants are ideal for removing airborne pollutants from indoor air.', 1, 0),
(22, '2021-04-13 08:26:47', 'New smiley collection pots', '1618302407.jpg', 'Smiley collection pots now available in our website. New collection!! Buy now and get more offers.', 1, 1),
(33, '2021-04-13 13:51:15', 'Indoor plants', '1618302833.jpg', 'Some new collection of plants and pots', 1, 1),
(34, '2021-04-13 08:37:44', 'New collection - Miniature Plants with toys', '1618303064.jpg', 'There is some new arrival of plants with toys very trendy for decoration', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `status` int(1) NOT NULL COMMENT '0-inactive\r\n1-active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `image`, `status`) VALUES
(16, 'Miniature Garden', '1617883422.jpg', 1),
(17, 'Pots', '1618061338.jpg', 1),
(18, 'Pebbles', '1618061361.jpg', 1),
(19, 'Fruit Plants', '1617887389.jpg', 1),
(20, 'Vegetable Seeds', '1617887678.jpg', 1),
(21, 'Medicinal Plants', '1617888596.jpg', 1),
(22, 'Soil and Fertilizers', '1617889469.jpg', 1),
(29, 'xx', '1621230982.jpg', 0),
(30, 'sample', '1714717390.jpg', 1),
(31, 'SampleCategory', '1714731401.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery_admin`
--

CREATE TABLE `tbl_delivery_admin` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `district` varchar(100) NOT NULL,
  `date_joined` date NOT NULL,
  `date_left` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_delivery_admin`
--

INSERT INTO `tbl_delivery_admin` (`id`, `image`, `name`, `username`, `password`, `phone`, `address`, `district`, `date_joined`, `date_left`, `status`) VALUES
(3, 'user.jpg', 'Shalini A', 'shaliniadevi@gmail.com', 'op$%KS67', '6374400248', 'Pandian Nagar,\r\nMadurai.', 'Madurai', '2021-04-20', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`id`, `state_id`, `name`, `status`) VALUES
(1, 31, 'Ariyalur', 1),
(2, 31, 'Chengalpattu', 1),
(3, 31, 'Chennai', 1),
(4, 31, 'Coimbatore', 1),
(5, 31, 'Cuddalore', 1),
(6, 31, 'Dharmapuri', 1),
(7, 31, 'Dindigul', 1),
(8, 31, 'Erode', 1),
(9, 31, 'Kallakurichi', 1),
(10, 31, 'Kanchipuram', 1),
(11, 31, 'Kanyakumari', 1),
(12, 31, 'Karur', 1),
(13, 31, 'Krishnagiri', 1),
(14, 31, 'Madurai', 1),
(15, 31, 'Nagapattinam', 1),
(16, 31, 'Namakkal', 1),
(17, 31, 'Nilgiris', 1),
(18, 31, 'Perambalur', 1),
(19, 31, 'Pudukkottai', 1),
(20, 31, 'Ramanathapuram', 1),
(21, 31, 'Ranipet', 1),
(22, 31, 'Salem', 1),
(23, 31, 'Sivaganga', 1),
(24, 31, 'Tenkasi', 1),
(25, 31, 'Thanjavur', 1),
(26, 31, 'Theni', 1),
(27, 31, 'Thoothukudi', 1),
(28, 31, 'Tiruchirappalli', 1),
(29, 31, 'Tirunelveli', 1),
(30, 31, 'Tirupathur', 1),
(31, 31, 'Tiruppur', 1),
(32, 31, 'Tiruvallur', 1),
(33, 31, 'Tiruvannamalai', 1),
(34, 31, 'Tiruvarur', 1),
(35, 31, 'Vellore', 1),
(36, 31, 'Viluppuram', 1),
(37, 31, 'Virudhunagar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `feedback` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `name`, `feedback`, `date`) VALUES
(4, 'Shalini A', 'This is good..... providing fresh green plants with high class quality. I really enjoyed it. And the service provided by them is nice.\r\nThanks for your GREEEN PLANTS..!!!', '2021-04-12'),
(5, 'Ashaa S', 'Its really awesome.. Really enjoyed shopping plants here.. There is many different types of plants with good quality and less price with safe delivery..', '2021-04-12'),
(6, 'Selvi', 'You are really doing a great job I am happy with your products and its quality its really awesome', '2021-04-15'),
(7, 'Rama ', 'I have ordered 3 pots and 4 indoor plants its good and quality is nice', '2021-04-21'),
(11, 'Seetha', 'Good one...............!!!!!!!!', '2023-07-04'),
(12, 'DheivaSree', 'Nice products and valuable things.......', '2024-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_ordered` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0-order cancelled\r\n1-ordered\r\n2-order placed\r\n3-order delivered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `product_id`, `quantity`, `date_ordered`, `user_id`, `transaction_id`, `status`) VALUES
(114, 63, 2, '2021-04-20', 1, 75, 3),
(115, 65, 2, '2021-04-20', 1, 75, 3),
(116, 27, 1, '2021-04-20', 1, 76, 3),
(117, 38, 1, '2021-04-20', 1, 77, 2),
(119, 27, 1, '2021-04-24', 1, 0, 0),
(120, 62, 1, '2021-04-24', 1, 0, 0),
(121, 27, 1, '2021-04-25', 1, 78, 2),
(123, 62, 1, '2021-04-26', 1, 78, 2),
(124, 62, 5, '2021-04-27', 1, 79, 2),
(125, 62, 3, '2021-04-27', 1, 80, 3),
(127, 65, 1, '2021-05-16', 1, 81, 2),
(128, 63, 1, '2021-05-16', 1, 82, 2),
(129, 47, 1, '2021-05-17', 1, 83, 2),
(130, 48, 1, '2021-05-17', 1, 84, 2),
(131, 65, 1, '2023-06-21', 1, 84, 2),
(132, 84, 1, '2023-07-04', 1, 85, 2),
(134, 68, 3, '2024-01-31', 1, 86, 2),
(137, 66, 4, '2024-05-03', 1, 87, 2),
(139, 68, 3, '2024-05-03', 1, 88, 2),
(141, 68, 2, '2024-05-03', 1, 89, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `real_price` int(10) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `status` int(1) NOT NULL COMMENT '0-inactive\r\n1-active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `category_id`, `image`, `image1`, `image2`, `product_name`, `real_price`, `price`, `discount`, `stock`, `product_description`, `status`) VALUES
(27, 16, '1617883491.webp', '1617883490.webp', '1617976629.webp', 'Celebrate years of togetherness with Dada - Dadi - Miniature Garden', 1000, 2000, 50, 3, 'This miniature garden pack contains you get Syngonium plant along with ceramic pot + Pebbles + Garden toys. This product provides potted plant and decorative material separately. You can decore your own miniature garden.', 0),
(28, 16, '1617883568.jpg', '1617883567.jpg', '1617883566.jpg', 'DIY Happy feet with Senecio - Miniature Garden', 500, 1000, 20, 10, 'This miniature garden pack has 1 Senecio plant, garden toy, chips pebbles and soil in a single miniature garden pack.\r\nThis DIY product provides constituents separately to create your own miniature garden.', 1),
(29, 16, '1617883637.jpg', '1617883636.jpg', '1617883635.jpg', 'DIY River Crossing Ducklings - Miniature Garden', 600, 1200, 20, 9, 'This miniature garden contains a Syngonium plant along with a ceramic pot, pebbles, stone sand, garden toys and preserve moss. This DIY product provides constituents separately to create your own miniature garden.', 1),
(30, 16, '1617883760.jpg', '1617883759.jpg', '1617883758.jpg', 'DIY Meditating Buddha - Miniature Garden', 500, 1500, 20, 10, 'Create your miniature garden with this pack which contains 8 Lucky bamboo stalks, a ceramic pot, pebbles, miniature toys and preserved moss. This DIY product provides constituents separately to create your own miniature garden.', 1),
(31, 16, '1617883783.webp', '1617883782.webp', '1617883781.webp', 'DIY Wildlife - Miniature Garden', 200, 800, 30, 10, 'This miniature garden pack contains 1 Aralia plant potted in a ceramic pot + garden toy + 2 types of pebbles + preserve moss. This DIY product provides constituents separately to create your own miniature garden.', 1),
(32, 16, '1617883953.jpg', '1617883952.jpg', '1617883951.jpg', 'DIY Beach Fun - Miniature Garden', 500, 1000, 30, 10, 'Fill your home with positive vibes and beauty by bringing this pack that contains a beautiful air plant with a glass vessel + stone sand + pebbles + preserve moss + Miniature toys. This DIY product provides constituents separately to create your own miniature garden.', 1),
(33, 16, '1617884049.jpg', '1617884048.jpg', '1617884047.jpg', 'DIY Succulent Garden', 1000, 1000, 10, 9, 'Enjoy your life with the best people of your life and gift them the cute and sturdy Haworthia plants potted in decorative ceramic pot.\r\n(Low maintenance plant & Best for sunny windows)\r\nThis DIY product provides constituents separately to create your own miniature garden.', 1),
(34, 16, '1617884252.jpg', '1617884251.jpg', '1617884250.jpg', 'DIY Dada Dadi Enjoying Snowfall in Garden - Miniature Garden', 500, 500, 5, 8, 'This miniature garden contains a Syngonium plant along with a ceramic pot, pebbles, stone sand, garden toys and preserve moss.\r\nThis DIY product provides constituents separately to create your own miniature garden.', 1),
(35, 16, '1617884294.jpg', '1617884293.jpg', '1617884292.jpg', 'DIY Grazing sheep - Miniature Garden', 500, 1500, 55, 10, 'This miniature garden pack contains 1 Aralia plant along with ceramic pot + 5 Pieces of Sheep toy + Pebbles + 1 Fence + preserve moss + soil.\r\nThis DIY product provides constituents separately to create your own miniature garden.', 1),
(36, 16, '1617884432.jpg', '1617884431.jpg', '1617884430.jpg', 'DIY Feel Relaxed in the Garden - Miniature Garden', 1000, 1000, 5, 8, 'This miniature pack contains 1 Syngonium plant potted in ceramic pot + 1 College couple + pebbles in a single pack.\r\nThis DIY product provides constituents separately to create your own miniature garden.', 1),
(37, 17, '1617884733.jpg', '1617884732.jpg', '1617884731.jpg', '3 inch (8 cm) Grower Round Plastic Pot (Orange) (set of 6)', 500, 1000, 20, 10, 'Designed to bring color and vibrancy to your home/office interiors. It makes growing plants more fun.\r\nThese pots introduce new designs with latest color trends keeping in mind the increasing demand for planters for garden, terrace, indoor and outdoor plants.The opinion of customers, plant nurseries, architects, and professionals has been taken into consideration while selecting this range of pots.\r\nThis pot has sufficient drainage holes at the bottom, which helps to avoid the overwatering to the plant.', 1),
(38, 17, '1617884894.jpg', '1617884893.jpg', '1617884892.jpg', '3.7 inch (9 cm) CP005 Round Egg Ceramic Pot With Plate (White, Light Peach) (set of 2)', 600, 1200, 20, 7, 'Decorative Ceramic pots can impart a natural and beautiful look to any garden. Use these classic pots which are suitable for your requirement and provides considerable durability.\r\n\r\nCeramic Planters are best eco-friendly choice to grow plants. They come in variety of shapes and colors. Their classic yet unique look is so attractive that a true gardener cannot deny its presence.\r\n\r\nCeramic pots makes a great choice if you wish to avoid quick drying of potting mix and keep potting medium moist for the healthy growth of plants. The glaze of these planters will surely amaze any viewer with its unbeatable beauty.Create an exclusive decor and dont worry about the maintenance as ceramic pots are very easy to clean and almost free from discoloration. The dimension of the plate (approx.): 3.7 x 1 (diameter x height) in inches. The lower diameter of the plate is 3 inch.', 1),
(39, 17, '1617884993.jpg', '1617884992.jpg', '1617884991.jpg', '7.1 inch (18 cm) Corsica No. 18 Hanging Round Plastic Pot (Orange) (set of 6)', 200, 400, 10, 10, 'Premium quality pots with the unique hanging shape design, perfect for your deck, patio, balcony or inside your home.\r\n\r\nThese Pots are crafted from durable and U.V protected plastic, can withstand all four seasons outdoors. The height of a product including a hanger and a pot is 47.5cm (approx. Fix a support to the wall and hang a pot with the help of slings.\r\n\r\nThis pot has sufficient drainage holes at the bottom, which helps to avoid the overwatering to the plant.', 1),
(40, 17, '1617885041.jpg', '1617885040.jpg', '1617885039.jpg', '3 inch (8 cm) Handi Shape Round Ceramic Pot (Orange) (set of 3)', 1000, 2000, 20, 10, 'Decorative Ceramic pots can impart a natural and beautiful look to any garden. Use these classic pots which are suitable for your requirement and provides considerable durability.\r\n\r\nCeramic Plants are best natural all around choice to grow plants. They come in variety of shapes and colors. Their classic yet unique look is so attractive that a true gardener can not deny its presence.\r\n\r\nGlazed ceramic pots makes a great choice if you wish to avoid quick drying of potting mix and keep potting medium moist for the healthy growth of plants. The glaze of these planters will surely amaze any viewer with its unbeatable beauty. Create an exclusive decor and dont worry about the maintenance as ceramic pots are very easy to clean and almost free from discoloration.', 1),
(41, 17, '1617885263.jpg', '1617885262.jpg', '1617885261.jpg', '6.6 inch (17 cm) Bonsai Rectangle Ceramic Pot (Orange) (set of 2)', 200, 600, 40, 8, 'Decorative Ceramic pots can impart a natural and beautiful look to any garden. Use these classic pots which are suitable for your requirement and provides considerable durability.\r\n\r\nCeramic Plants are best natural all around choice to grow plants. They come in variety of shapes and colors. Their classic yet unique look is so attractive that a true gardener can not deny its presence.\r\n\r\nGlazed ceramic pots makes a great choice if you wish to avoid quick drying of potting mix and keep potting medium moist for the healthy growth of plants. The glaze of these planters will surely amaze any viewer with its unbeatable beauty. Create an exclusive decor and dont worry about the maintenance as ceramic pots are very easy to clean and almost free from discoloration.', 1),
(42, 17, '1617885379.jpg', '1617885378.jpg', '1617885377.jpg', '3.8 inch (10 cm) Bonsai Rectangle Ceramic Pot (Orange) (set of 3)', 400, 800, 25, 4, 'Decorative Ceramic pots can impart a natural and beautiful look to any garden. Use these classic pots which are suitable for your requirement and provides considerable durability.\r\n\r\nCeramic Plants are best natural all around choice to grow plants. They come in variety of shapes and colors. Their classic yet unique look is so attractive that a true gardener can not deny its presence.\r\n\r\nGlazed ceramic pots makes a great choice if you wish to avoid quick drying of potting mix and keep potting medium moist for the healthy growth of plants. The glaze of these planters will surely amaze any viewer with its unbeatable beauty. Create an exclusive decor and dont worry about the maintenance as ceramic pots are very easy to clean and almost free from discoloration.', 1),
(43, 17, '1617885550.jpg', '1617885549.jpg', '1617885548.jpg', '4.1 inch (10 cm) Grooved Pattern Cylindrical Ceramic Pot (Orange) (set of 2)', 600, 1200, 70, 9, 'Decorative Ceramic pots can impart a natural and beautiful look to any garden. Use these classic pots which are suitable for your requirement and provides considerable durability.\r\n\r\nCeramic Plants are best natural all around choice to grow plants. They come in variety of shapes and colors. Their classic yet unique look is so attractive that a true gardener can not deny its presence.\r\n\r\nGlazed ceramic pots makes a great choice if you wish to avoid quick drying of potting mix and keep potting medium moist for the healthy growth of plants. The glaze of these planters will surely amaze any viewer with its unbeatable beauty. Create an exclusive decor and dont worry about the maintenance as ceramic pots are very easy to clean and almost free from discoloration.', 1),
(44, 17, '1617885614.jpg', '1617885613.jpg', '1617885612.jpg', '7 inch (18 cm) Dot Embossed Railing Round Metal Planter (Orange) (set of 3)', 600, 600, 5, 10, 'This very special and decorative planter adds a luxurious flair to its surroundings.\r\n\r\nBrighten up your living room, kitchen, bedroom or even a office desk with beautiful flowers and plants in these stylish planters. This planter has very pleasing and unique design.', 1),
(45, 17, '1617885673.jpg', '1617885672.jpg', '1617885671.jpg', '11.8 inch (30 cm) Bello Window Planter No. 30 Rectangle Plastic Pot (Orange) (set of 6)', 800, 1600, 30, 8, 'Color your location with this beautiful pot, it is perfect for every patio and balcony. It provides sufficient space for all plants.\r\n\r\nBeautiful, light in weight, easy to stock, high-quality UV protected, and branded plastic pots.This pot has sufficient drainage holes at the bottom, which helps to avoid the overwatering to the plant.', 1),
(46, 17, '1617885757.jpg', '1617885756.jpg', '1617885755.jpg', '4.5 inch (11 cm) CP010 Embossed Cup Shape Round Ceramic Pot with Plate (Peach)', 500, 1000, 15, 8, 'Decorative Ceramic pots can impart a natural and beautiful look to any garden. Use these classic pots which are suitable for your requirement and provides considerable durability.\r\n\r\nCeramic Planters are the best eco-friendly choice to grow plants. They come in a variety of shapes and colors. Their classic yet unique look is so attractive that a true gardener cannot deny its presence.\r\n\r\nCeramic pots make a great choice if you wish to avoid quick drying of potting mix and keep the potting medium moist for the healthy growth of plants. The glaze of these planters will surely amaze any viewer with its unbeatable beauty.Create an exclusive decor and dont worry about the maintenance as ceramic pots are very easy to clean and almost free from discoloration. The dimension of the plate (approx.): 5.4 x 0.8 (diameter x height) in inches. The lower diameter of the plate is 4.4 inch.', 1),
(47, 18, '1618060844.jpg', '1618060843.jpg', '1618060842.jpg', 'Aquarium Pebbles (Mix Color, Small) - 1 kg', 200, 600, 45, 9, 'Get creative and give an amazing look to your garden with these decorative pebbles.\r\n\r\nSimple gardens may be indoor or outdoor can be transformed into beautiful ones with these wonderful pebbles. These decorative pebbles are perfect if you wish to show your creativity and develop an attractive garden.\r\n\r\nThese pebbles can be used to decorate garden corners, Garden pathways, Garden borders, Miniature Gardens, Terrariums or just arrange them around the planters; they will anyway look stunning and impart structured look you are looking for.', 1),
(48, 18, '1617886381.jpg', '1617886380.jpg', '1617886379.jpg', 'Aquarium Pebbles (Purple, Small) - 1 kg', 200, 200, 5, 9, 'Get creative and give an amazing look to your garden with these decorative pebbles.\r\n\r\nSimple gardens may be indoor or outdoor can be transformed into beautiful ones with these wonderful pebbles. These decorative pebbles are perfect if you wish to show your creativity and develop an attractive garden.\r\n\r\nThese pebbles can be used to decorate garden corners, Garden pathways, Garden borders, Miniature Gardens, Terrariums or just arrange them around the planters; they will anyway look stunning and impart structured look you are looking for.', 1),
(49, 18, '1617886451.jpg', '1617886450.jpg', '1617886449.jpg', 'Garden Pebbles (Mix Color, Small) - 1 kg', 100, 500, 5, 8, 'Get creative and give an amazing look to your garden with these decorative pebbles.\r\n\r\nSimple gardens may be indoor or outdoor can be transformed into beautiful ones with these wonderful pebbles. These decorative pebbles are perfect if you wish to show your creativity and develop an attractive garden.\r\n\r\nThese pebbles can be used to decorate garden corners, Garden pathways, Garden borders, Miniature Gardens, Terrariums or just arrange them around the planters; they will anyway look stunning and impart structured look you are looking for.', 1),
(50, 18, '1617886577.jpg', '1617886576.jpg', '1617886575.jpg', 'Jasper Garden Pebbles (Red, Medium) - 1 kg', 200, 200, 45, 10, 'Get creative and give an amazing look to your garden with these decorative pebbles.\r\n\r\nSimple gardens may be indoor or outdoor can be transformed into beautiful ones with these wonderful pebbles. These decorative pebbles are perfect if you wish to show your creativity and develop an attractive garden.\r\n\r\nThese pebbles can be used to decorate garden corners, Garden pathways, Garden borders, Miniature Gardens, Terrariums or just arrange them around the planters; they will anyway look stunning and impart structured look you are looking for.', 1),
(51, 18, '1617886616.jpg', '1617886615.jpg', '1617886614.jpg', 'Chips Pebbles (Orange, Small) - 1 kg', 200, 600, 15, 7, 'Get creative and give an amazing look to your garden with these decorative pebbles.\r\n\r\nSimple gardens may be indoor or outdoor can be transformed into beautiful ones with these wonderful pebbles. These decorative pebbles are perfect if you wish to show your creativity and develop an attractive garden.\r\n\r\nThese pebbles can be used to decorate garden corners, Garden pathways, Garden borders, Miniature Gardens, Terrariums or just arrange them around the planters; they will anyway look stunning and impart structured look you are looking for.', 1),
(52, 18, '1617886653.jpg', '1617886652.jpg', '1617886651.jpg', 'Natural Chips Pebbles (Grey, Small, Unpolished) - 1 kg', 200, 1000, 50, 10, 'et creative and give an amazing look to your garden with these decorative pebbles.\r\n\r\nSimple gardens may be indoor or outdoor can be transformed into beautiful ones with these wonderful pebbles. These decorative pebbles are perfect if you wish to show your creativity and develop an attractive garden.\r\n\r\nThese pebbles can be used to decorate garden corners, Garden pathways, Garden borders, Miniature Gardens, Terrariums or just arrange them around the planters; they will anyway look stunning and impart structured look you are looking for.', 1),
(53, 18, '1617886801.jpg', '1617886800.jpg', '1617886799.jpg', 'Onex Pebbles (Blue, Medium) - 1 kg', 200, 800, 60, 10, 'Get creative and give an amazing look to your garden with these decorative pebbles.\r\n\r\nSimple gardens may be indoor or outdoor can be transformed into beautiful ones with these wonderful pebbles. These decorative pebbles are perfect if you wish to show your creativity and develop an attractive garden.\r\n\r\nThese pebbles can be used to decorate garden corners, Garden pathways, Garden borders, Miniature Gardens, Terrariums or just arrange them around the planters; they will anyway look stunning and impart structured look you are looking for.', 1),
(54, 18, '1617886854.jpg', '1617886853.jpg', '1617886852.jpg', 'Onex Pebbles (Mix Color, Medium)- 1 kg', 500, 2500, 75, 10, 'Get creative and give an amazing look to your garden with these decorative pebbles.\r\n\r\nSimple gardens may be indoor or outdoor can be transformed into beautiful ones with these wonderful pebbles. These decorative pebbles are perfect if you wish to show your creativity and develop an attractive garden.\r\n\r\nThese pebbles can be used to decorate garden corners, Garden pathways, Garden borders, Miniature Gardens, Terrariums or just arrange them around the planters; they will anyway look stunning and impart structured look you are looking for.', 1),
(55, 18, '1617886943.jpg', '1617886942.jpg', '1617886941.jpg', 'Super Granite Pebbles (Black, Rodi, Polished) - 1 kg', 2000, 2000, 10, 10, 'Get creative and give an amazing look to your garden with these decorative pebbles.\r\n\r\nSimple gardens may be indoor or outdoor can be transformed into beautiful ones with these wonderful pebbles. These decorative pebbles are perfect if you wish to show your creativity and develop an attractive garden.\r\n\r\nThese pebbles can be used to decorate garden corners, Garden pathways, Garden borders, Miniature Gardens, Terrariums or just arrange them around the planters; they will anyway look stunning and impart structured look you are looking for.\r\n\r\nProduct Type	    -   Granite / Marble Pebbles\r\nEach unit contains  -	1 Kg black pebbles\r\nSize	2.5 to 4 cm\r\nPebbles per sqft	Approx. 4 to 5 kg', 1),
(56, 18, '1617887028.jpg', '1617887027.jpg', '1617887026.jpg', 'Super Marble Pebbles (White, Big, Unpolished) - 2 kg', 400, 1200, 45, 10, 'Product Type	    - Granite / Marble Pebbles\r\nEach unit contains  -	2 Kg white pebbles\r\nSize	7 to 9 cm\r\nPebbles per sqft	Approx. 6 to 7 kg', 1),
(57, 19, '1617887457.jpg', '1617887456.jpg', '1617887455.jpg', 'Shahtoot, Mulberry, Tuti (Small Leaves) - Plant', 500, 1000, 5, 10, 'Growing Mulberry plant is an easy way to add a tropical flair to your garden. When you know that the importance of its leaves and frutis, and how to care for Mulberry plants, you will be rewarded with many years of beautiful sweet fruits.\r\n\r\nWhat makes it special:\r\nOne of the best attractive nutrient rich fruit plants.\r\nLow maintenance plant and easy to grow.\r\nPerfect plant for outdoor .\r\nThis product does not have the flowers and fruits at the time of shipping. Afterward, the plant will bloom and have the lovely fruits.', 1),
(58, 19, '1617887508.jpg', '1617887507.png', '1617887506.jpg', 'Pomegranate, Annar, Anar (Grafted) - Plant', 800, 1600, 40, 10, 'Enjoy the delicious and nutritious watery, red arils of Pomegranate by growing easily at your home.\r\n\r\nPomegranate is sub tropical fruit plant in Punicaceae family. Their multiple stems arch gracefully in a weeping habit. The leaves are opposite or sub opposite, glossy, narrow oblong, entire and the dramatic blossoms are trumpet shaped with orange-red ruffled petals.', 1),
(59, 20, '1617887787.jpg', '1617887786.jpg', '1617887785.jpg', '1+1 Free - Radish Japani white - Desi Vegetable Seeds', 20, 40, 5, 10, 'Other than commonly known radishes, many different varieties exist. This Radish packet contains approximately 35 seeds.\r\n\r\nThe radish (Raphanus sativus) is an edible root vegetable. This giant white radish grows up to 2 feet long.This variety is white and crispy, with a mildly sweet flavor.', 1),
(60, 20, '1617887852.jpg', '1617887851.jpg', '1617887850.jpg', '1+1 Free - Radish Palak Patte Wali - Desi Vegetable Seeds', 20, 60, 5, 10, 'Other than commonly known radishes, many different varieties exist. This Radish packet contains approximately 35 seeds.\r\n\r\nThe radish (Raphanus sativus) is an edible root vegetable. Roots flesh is crispy with mild pungency. Roots are pure white in color. The shape is long, cylindrical. It is grown as a summer and monsoon crop from April September. Root length is 30 to 35 cm.', 1),
(61, 20, '1617888170.jpg', '1617888169.jpg', '1617888168.jpg', '1+1 Free - Turnip Purple Top - Desi Vegetable Seeds', 10, 20, 5, 10, 'The crown is with pink to purple. This seed packet contains approximately 35 seeds.\r\n\r\nThis annual vegetable shows a height up to 1 to 3 inches. The roots are smooth and nearly round with purple color on top.', 1),
(62, 20, '1617888188.jpg', '1617888187.jpg', '1617888186.jpg', '1+1 Free - Carrot Red Long - Desi Vegetable Seeds', 25, 50, 5, 0, 'The carrot is most loved as it is a part of healthy diet. This seed packet contains approximately 35 seeds.\r\n\r\nYou can grow carrots all year round and they are so simple! Just sow carrot seed regularly for a year-round crop.\r\n\r\nCarrots are an easy and rewarding crop to grow, great for encouraging children to eat their vegetables! With so many varieties of this popular vegetable available, carrots can be grown in beds, containers and even window boxes making them suitable for gardens of any size. Carrots are a popular root vegetable that is easy to grow in sandy soil. They are resistant to most pests and diseases and are a good late season crop that can tolerate frost.Not all carrots are orange; varieties vary in color like purple, black to white.', 1),
(63, 20, '1617888293.jpg', '1617888292.jpg', '1617888291.jpg', '1+1 Free - Coriander Kalmi - Desi Vegetable Seeds', 30, 90, 15, 4, 'All parts of the Coriander is used in cooking. 1 packet contains 35 seeds.\r\n\r\nCoriander is a fast-growing, aromatic herb that grows in the cooler weather of spring and fall. Coriander seed is technically a fruit containing two seeds in it.', 1),
(64, 20, '1617888311.jpg', '1617888310.jpg', '1617888309.jpg', '1+1 Free - Cauliflower Snowball 16 - Desi Vegetable Seeds', 40, 80, 5, 4, 'It is a famous flower vegetable and this packet contains approximately 35 seeds.\r\n\r\nCauliflower is one of the commonly used flower-vegetable. Lifecycle: annual, biennial.', 1),
(65, 20, '1617888329.jpg', '1617888328.jpg', '1617888327.jpg', '1+1 Free - Capsicum Green - Desi Vegetable Seeds', 50, 150, 15, 0, '1 packet contains approximately 35 seeds of Capsicum.\r\n\r\nBell peppers are one of the most popular vegetables grown in home gardens. The bell pepper is native to Central and North America and is easy to grow. There is now a much wider variety of peppers to choose from with different colours and even different shapes.\r\n\r\nPeppers are a tender, warm-season crop. They resist most pests and offer something for everyone: spicy, sweet or hot, and a variety of colors, shapes and sizes. For this page, we will focus on sweet bell peppers.', 1),
(66, 20, '1617888345.jpg', '1617888344.jpg', '1617888343.jpg', '1+1 Free - Peas Azad P1 - Desi Vegetable Seeds', 60, 60, 5, 4, '1 packet contains approximately 35 seeds.\r\n\r\nGreen peas are a garden favourite. Whether you grow English peas for shelling, or edible-podded snow and snap peas, there s nothing like the taste of fresh, sweet peas in spring.\r\n\r\nFresh peas picked straight from the garden are a revelation! Once youÃƒ ¢Ã¢â€š ¬Ã¢â€ž ¢ve tasted how sweet they really taste, youÃƒ ¢Ã¢â€š ¬Ã¢â€ž ¢ll never want to eat frozen peas again. Better still, growing pea plants is incredibly easy and you can achieve a good yield in a small space. In fact, you can even grow them in containers on the patio for a really space-saving crop.', 1),
(67, 20, '1617888397.jpg', '1617888396.jpg', '1617888395.jpg', '1+1 Free - Tomato Ped - Desi Vegetable Seeds', 25, 50, 2, 9, 'Tomato easily cultivate in pot.\r\n\r\n1 packet contains approximately 35 seeds.\r\n\r\nThe most popular garden vegetable crop, tomatoes come in a wide range of sizes, shapes and colors. Choose determinate varieties for early harvest or cool conditions. Compact varieties are also good choices for containers and planting in flower beds.Tomatoes are an incredibly versatile food.\r\n\r\nThey are often considered as a vegetable, though ideally they are a citrus fruit. They are a rich source of Vitamin C and help in increasing your immunity. Not just this, tomatoes also provide several other vitamins, magnesium, phosphorus and copper, all of which are necessary for good health.The best part is that they can be eaten either raw, in salads, sandwiches or in vegetables.', 1),
(68, 20, '1617888416.jpg', '1617888415.jpg', '1617888414.jpg', '1+1 Free - Brinjal Purple Round - Desi Vegetable Seeds', 45, 45, 8, 0, '1 packet contains - 50 seeds of brinjal.\r\n\r\nThe brinjal (eggplant or baingan or aubergine) is called the King of Vegetables by some cultures. It is one of the most versatile vegetables around, loved by many people across the world.\r\n\r\nDifferent varieties are available everywhere and each variety is unique in its own way, with a distinctive flavor and many essential minerals.Eggplant or Brinjal, is a very low calorie vegetable and has healthy nutrition profile; good news for weight watchers! The veggie is popularly known as aubergine in the western world.', 1),
(69, 21, '1617889076.jpg', '1617889075.jpg', '1617889074.jpg', 'Aloe vera - Succulent Plant', 200, 400, 5, 19, 'Aloe vera, Ghrita-kumari is the famous medicinal plant with ornamental and cultural beliefs.\r\n\r\n\r\nWhat makes it special:\r\nLow maintenance plant. -\r\nBest for sunny windows. -\r\nHardy nature with an attractive look. -\r\nPopular house plant with medicinal values.', 1),
(70, 21, '1617889123.jpg', '1617889122.jpg', '1617889121.jpg', 'Piper Betel, Maghai Paan - Plant', 400, 800, 10, 19, 'Enhance the beauty of your outdoor\r\nspaces by an excellent dense green Betel vine plant.\r\nPiper betel is a Woody climber in Piperaceae family with adventitious roots at swollen nodes.Leaves are simple heart shaped, alternate with spicy taste.Inflorescence is axillary with white uni sexual flower.', 1),
(71, 21, '1617889242.jpg', '1617889241.jpg', '1617889240.jpg', 'Krishna Tulsi Plant, Holy Basil, Ocimum tenuiflorum (Black) - Plant', 100, 200, 20, 17, 'krishna tulsi is part of routine worship and has a scientific background as the plants possess antimicrobial and antiviral properties and purify the air.\r\n\r\nWhat makes it special:\r\nHave a traditional value.\r\nkrishna tulsi have medicinal property.\r\nAtractive purple colour flowers.\r\nkrushna tulsi purify the air.\r\nKrishna tulsi belongs to the Lamiaceae family. Krishna Tulsi has traditional as well as medicinal importance. Krishna tulsi tastes good and provides gentle stimulation to body, mind and spirit. Krishna tulsi is Purple leaf tulsi and is famous for its peppery, sharp, crisp taste.\r\n\r\nIts leaves and dark stems are dark in purple color. Tulsi flowers are small having purple to reddish color, present in small compact clusters on cylindrical spikes.', 1),
(72, 21, '1617889259.jpg', '1617889258.jpg', '1617889257.jpg', 'Mehndi, Mehandi - Plant', 600, 1200, 25, 20, 'Color your hands and hair naturally by growing an excellent Mehndi plant.\r\n\r\nMehndi is a perennial shrub in Lythraceae family.It is glabrous and multi branched, with spine tipped branchlets. The leaves grow opposite each other on the stem. Leaves are glabrous, elliptical and lanceolate.\r\n\r\nMehndi flowers have four sepals and petals are ovate, with white or red stamens found in pairs on the rim of the calyx tube.', 1),
(73, 22, '1617889560.jpg', '1617889559.jpg', '1617889558.jpg', 'My Organic Garden (Plant Protection and Enhancer Kit)', 500, 2000, 20, 15, 'Grow everything natural, completely organic, absolutely free from pesticide and harmful chemicals with My Organic Garden kit. It is a one-stop solution to manage your garden.\r\n\r\nMy Organic Garden is a special kit for home garden, kitchen garden, backyard garden, and green offices. The idea is to make green spaces around us for a happier and healthier life.\r\n\r\nThe easy to use kit designed to give you convenience so you can easily maintain your garden at your window, balcony, backyard, home, and workplace. This pack of My Organic Garden kit contains 6 items :1. Organic Garden Foliar Protection (200ml) - Plant stem, leaves, flowers and fruits are most targeted sites for insect pest to feed on. These insects destroy its beauty and damage plants. Foliar protection is ready to use products which keeps plant pest free and improves plant bloom. 2. Organic Garden Foliar Nutrition (200ml) - Plant nutrients are necessary for healthy plant. due to inadequate nutrient plant loose root health, plant vigor, flowering and freshness. Foliar nutrient contains nutrients for plants as well as protection for plant. It improves plant health and nutrient uptake. It is ready to use products which keeps plant healthy and improve plant bloom. Organic Garden Water Booster (150 Capsules) - Water management for garden plants is another crucial task. Water booster capsules hold optimum water necessary for plant growth as well as supply carbon which improves soil property. It is the perfect soil property enhancer and conditioner infused with aqua crystal and is loaded with bio-active carbons. Organic Garden Soil Enhancer (150 Capsules) - It take care of root health and nutrient. the active ingredients targets to roots and improves its health and performance. The composition of soil enhancer contains all nutrient necessary for healthy plant growth. these nutrient are infused with beneficial microbial consortia, which allow is to assimilate in plant easily and organically. Organic Garden Foliar Protection Refill Pack (15ml) - Once product in Foliar Protection spray bottle is empty simply add 1-2 drop from concentration and fill the bottle with water and spray. Organic Garden Foliar Nutrition Refill Pack (15ml) - Once product in Foliar Nutrient spray bottle is empty simply add 1-2 drop from concentration and fill the bottle with water and spray.', 1),
(74, 22, '1617890035.jpg', '1617890034.jpg', '1617890033.jpg', 'Sterameal - 1 kg', 500, 1000, 10, 15, 'Sterameal is complete organic manure of animal origin. Use it for all types of plants at any stage of growth.\r\n\r\nThis is a organic manure of animal origin. Sterameal is best for enhancing soil texture and structure, it also enhance microbial activity in soil.Sterameal supply nutrients for longer duration. The organic manures can be used in all stages of plant growth and carry no side effects.', 1),
(75, 22, '1617890054.jpg', '1617890053.jpg', '1617890052.jpg', 'Coco peat block - 900 g', 600, 1200, 20, 15, 'Coco peat is a soil substitute or addition to it. Known for its good water holding capacity. Expands to 10-15 liters.\r\n\r\nCoco peat is the soilless potting mix. Easy to carry block form.It is lightweight, best for balconies & terrace gardening, easy to carry, saves Water, eco-friendly Organic. Best potting media for seeds germination.', 1),
(76, 22, '1617890075.jpg', '1617890074.jpg', '1617890073.jpg', 'Perlite - 500 g', 700, 2100, 30, 15, 'Expanded Perlite is a unique inorganic addition to amend the heavy soils to make them light weight while still retaining moisture and nutrients.\r\nThis high quality product is widely loved by gardeners for its benefits.\r\nExpanded perlite is wonderful inorganic product made up of volcanic soil. Perlite improves soils draining capacity while still retaining moisture.This is suitable for plants in pots and ground and can be used indoors, in terrace gardening, kitchen gardens etc.', 1),
(77, 22, '1617890092.jpg', '1617890091.jpg', '1617890090.jpg', 'Exfoliated Vermiculite - 250 g', 800, 2400, 40, 15, 'The Vermiculite is used in horticulture in its exfoliated form for enhanced benefits. This inorganic clean, odorless product can be used as soil substitute or to amend the soil.\r\n\r\nExfoliated vermiculite is beneficial to use in soil as it enhance aeration in soil and prevents root rot while still retaining moisture and nutrients. Especially the plant cuttings, seeds, cactus and succulent plants show faster growth in them.\r\n\r\nThis product can be used in all types of soil mix for its unique benefits.', 1),
(78, 22, '1617890206.jpg', '1617890205.jpg', '1617890204.jpg', 'Plant O Boost (Special Flower Booster, 10 g) (set of 10)', 1000, 4000, 60, 15, 'Plant O Boost flower booster is the best in class product for the abundance of flowers. It is easy to use and very effective.\r\n\r\nPlant O Boost flower booster is a specially formulated product for the abundance of flowers and can also be used for as general fertilizer for Plants. Easy to use granular powder form. Great for Flowers.', 1),
(79, 22, '1617890294.jpg', '1617890293.jpg', '1617890292.png', 'Neem Raksha (Pure Neem Oil for Insect, Pest Control) - 100 ml', 200, 1000, 5, 15, 'Neem Raksha is a pure neem oil that can be used for the treatment and control of different insect pests.', 1),
(80, 22, '1617890345.jpg', '1617890344.jpg', '1617890343.jpg', 'Natural Dried Moss ( 0.5 kg )', 300, 900, 10, 15, 'With the help of moss, improve the water holding capacity of your potting mix.', 1),
(81, 22, '1617890359.jpg', '1617890358.jpg', '1617890357.jpg', 'Coco Dung (Coconut fiber Cow dung, 1 kg )', 100, 100, 15, 15, 'Coco dung contains coconut fiber 50% + Cow manure 50%. It is a soil substitute or addition to it. Known for its good water holding capacity.\r\n\r\nPremium coco dung potting mix contains 50% coconut fiber and 50% cow manure.After adding water to the coco dung block, it becomes 5 kgs of ready to use potting mix for planting seedlings or sowing seeds.Best thing - No need of adding additional fertilizer to soilNet Weight 1 kg.', 1),
(82, 19, '1617975809.jpg', '1617975808.jpg', '1617975807.jpg', 'Apple, Seb - Plant', 100, 400, 10, 15, 'The apple tree (Malus pumila, commonly and erroneously called Malus domestica) is a deciduous tree in the rose family best known for its sweet, pomaceous fruit, the apple.\r\n\r\nThe apple tree is a deciduous tree in the rose family best known for its sweet, pomaceous fruit, the apple. It is cultivated worldwide as a fruit tree, and is the most widely grown species in the genus Malus.\r\n\r\nIt is cultivated worldwide as a fruit tree, and is the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today. Apples have been grown for thousands of years in Asia and Europe, and were brought to North America by European colonists. Apples have religious and mythological significance in many cultures, including Norse, Greek and European Christian traditions.', 1),
(83, 19, '1617975901.jpg', '1617975900.jpg', '1617975899.jpg', 'Mango Tree (Grown through seeds) - Plant', 100, 200, 20, 15, 'The juicy, ripe mango fruit has a rich, tropical aroma and flavour that summons thoughts of sunny climates and sultry breezes.\r\n\r\nIt has the considerable shelf life of a week after it is ripe making it exportable. It is also one of the most expensive kinds of mango and is grown mainly in western India.Mango is the leading fruit crop of India and considered to be the king of fruits.\r\n\r\nThe tropical fruit is called the \"King of Fruits\" in India. The tree has been around for more than 4000 years in India and was taken to South America by the Portuguese, other parts of South Asia by Indians and to other tropical regions by others. A mango tree needs an ideal climate to grow. It is a tropical fruit and needs a lot of suns to grow and bear fruit.', 1),
(84, 19, '1617975953.jpg', '1617975952.jpg', '1617975951.jpg', 'Kagzi Nimboo, Lemon Tree - Plant', 100, 400, 10, 14, 'Kagzi Lime is popular for its beautiful appearance and pleasing flavour and for its excellent food qualities.\r\n\r\nWhat makes it special:\r\nOne of the best fruting plants.\r\nBest source of vitamin c.\r\nEasy to care and requires less maintenance.\r\nKagzi Nimboo (Citrus aurantifolia) is a perennial evergreen tree belongs to family Rutaceae. The stem is irregularly slender branched and possesses short and stiff sharp spines or thorns 1 cm or less. Leaves are alternate, elliptical to oval.\r\n\r\nLime is popular for its beautiful appearance and pleasing flavor and for its excellent food qualities.', 1),
(85, 19, '1617976005.jpg', '1617976004.jpg', '1617976003.jpg', 'Kokum, Ratamba ( Grown through seeds ) - Plant', 400, 1200, 50, 13, 'Kokum is a tree with a dense canopy of green leaves and red-tinged tender emerging leaves.\r\n\r\nKokum is a tree with a dense canopy of green leaves and red-tinged tender emerging leaves. It is indigenous to the Western Ghats region of India, along with the western coast. The tree is large and handsome, having elliptic, oblong or oblong-lanceolate, deep-green glossy leaves.\r\n\r\nThe flowers are fleshy, dark pink, solitary or in spreading cluster. The fruit is brownish or brownish-gray, marbled with yellow.', 1),
(91, 29, '1621231032.jpg', '1621231031.jpg', '1621231030.jpg', 'try01', 5000, 10000, 200, 15, 'jhbjbk', 0),
(92, 31, '1714731483.jpg', '1714731482.jpg', '1714731481.jpg', 'SAmpleprod', 1000, 2000, 10, 2, 'Plant is perfect quality and discount available', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_query`
--

CREATE TABLE `tbl_query` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email-id` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `starred` int(1) NOT NULL DEFAULT 0 COMMENT '0-no\r\n1-star',
  `date` date NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1- query posted\r\n2- query answered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_query`
--

INSERT INTO `tbl_query` (`id`, `name`, `email-id`, `subject`, `message`, `starred`, `date`, `time`, `status`) VALUES
(1, 'Shalini A', 'shaliniadevi@gmail.com', 'Regarding query about coupon code', 'You have posted a blog regarding coupon code but you did not mentioned the validity so please mention validity for the coupon so that it will be useful to apply.', 0, '2020-03-31', '17:11:50', 2),
(2, 'Ashaa S', 'shaliniadevi@gmail.com', 'Regarding query about soils', 'I need some clarification about soils and fertilizer whether they are safe to use it.', 1, '2021-03-18', '20:50:00', 1),
(3, 'Bunny A S', 'shaliniadevi@gmail.com', 'Regarding query about soils', 'I need some clarification about soils and fertilizer whether they are safe to use it.', 1, '2021-04-09', '23:35:00', 2),
(4, 'demo ', 'shaliniadevi@gmail.com', 'tell hii plz', 'it just a demo is am trying to see', 1, '2021-04-11', '22:29:46', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_query_reply`
--

CREATE TABLE `tbl_query_reply` (
  `id` int(11) NOT NULL,
  `query_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `replied_by` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_query_reply`
--

INSERT INTO `tbl_query_reply` (`id`, `query_id`, `message`, `replied_by`, `date`, `time`) VALUES
(1, 4, 'hii demo', 1, '2021-04-11', '17:40:23'),
(2, 3, 'Yes its safe to use', 1, '2021-04-12', '17:51:50'),
(3, 3, 'Yes its safe to use', 1, '2021-04-12', '17:52:06'),
(4, 1, 'ok', 1, '2021-04-26', '12:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`id`, `order_id`, `product_id`, `user_id`, `rating`, `review`, `date`) VALUES
(25, 115, 65, 1, 2, 'This seed quality is good and it grows up well', '2021-04-26 07:02:26'),
(26, 114, 63, 1, 5, '', '2021-04-20 12:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `name`, `status`) VALUES
(1, 'Andaman & Nicobar Islands', 1),
(2, 'Andra Pradesh', 1),
(3, 'Arunachal Pradesh', 1),
(4, 'Assam', 1),
(5, 'Bihar', 1),
(6, 'Chandigarh', 1),
(7, 'Chhattisgarh', 1),
(8, 'Dadra & Nagar Haveli & Daman & Diu', 1),
(9, 'Delhi', 1),
(10, 'Goa', 1),
(11, 'Gujarat', 1),
(12, 'Haryana', 1),
(13, 'Himachal Pradesh', 1),
(14, 'Jammu & Kashmir', 1),
(15, 'Jharkhand', 1),
(16, 'Karnataka', 1),
(17, 'Kerla', 1),
(18, 'Ladakh', 1),
(19, 'Lakshadweep', 1),
(20, 'Madhya Pradesh', 1),
(21, 'Magarashtra', 1),
(22, 'Manipur', 1),
(23, 'Meghalaya', 1),
(24, 'Mizoram', 1),
(25, 'Nagaland', 1),
(26, 'Odisha', 1),
(27, 'Puducherry', 1),
(28, 'Punjab', 1),
(29, 'Rajasthan', 1),
(30, 'Sikkim', 1),
(31, 'Tamil Nadu', 1),
(32, 'Telangana', 1),
(33, 'Tripura', 1),
(34, 'Uttarakhand', 1),
(35, 'Uttar Pradesh', 1),
(36, 'West Bengal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `date_paid` datetime NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1-paid online\r\n2-cash on delivery\r\n3-delivered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `user_id`, `name`, `total_amount`, `date_paid`, `txn_id`, `phone`, `address`, `state`, `district`, `city`, `pincode`, `status`) VALUES
(75, 1, 'Shalini A', 408, '2021-04-20 18:17:22', '607ecd5a04c8e', '6374400240', '28/8, Pandian Nagar, 6th street, Kariapatti.', 'Tamil Nadu', 'Virudhunagar', 'Kariapatti', '626 106', 3),
(76, 1, 'Shalini A', 1000, '2021-04-20 18:41:19', '607ed2f76773a', '6374400240', '28/8, Pandian Nagar, 6th street, Kariapatti.', 'Tamil Nadu', 'Madurai', 'Anna Nagar', '626 022', 3),
(77, 1, 'Shalini A', 960, '2021-04-20 18:44:39', '607ed3bf71eb7', '6374400240', '28/8, Pandian Nagar, 6th street, Kariapatti.', 'Tamil Nadu', 'Virudhunagar', 'Kariapatti', '626 106', 2),
(78, 1, 'Shalini A', 1048, '2021-04-26 12:31:44', '60866558c9b1b', '6374400240', '28/8, Pandian Nagar, 6th street, Kariapatti.', 'Tamil Nadu', 'Virudhunagar', 'Kariapatti', '626 106', 2),
(79, 1, 'Shalini A', 238, '2021-04-27 16:43:36', 'txn_1IkonNSCbS5QonPJXDbYSxl0', '6374400240', '28/8, Pandian Nagar, 6th street, Kariapatti.', 'Tamil Nadu', 'Virudhunagar', 'Kariapatti', '626 106', 1),
(80, 1, 'Shalini A', 143, '2021-04-27 16:44:36', 'txn_1IkooLSCbS5QonPJ3uUQCuDU', '6374400240', '28/8, Pandian Nagar, 6th street, Kariapatti.', 'Tamil Nadu', 'Madurai', 'Kariapatti', '626 106', 3),
(81, 1, 'Shalini A', 128, '2021-05-16 21:17:38', '60a13e9acff6d', '6374400240', '28/8, Pandian Nagar, 6th street, Kariapatti.', 'Tamil Nadu', 'Virudhunagar', 'Kariapatti', '626 106', 2),
(82, 1, 'Shalini A', 77, '2021-05-16 21:19:22', 'txn_1Irm9WSCbS5QonPJl7HXG9LH', '6374400240', '28/8, Pandian Nagar, 6th street, Kariapatti.', 'Tamil Nadu', 'Madurai', 'Kariapatti', '626 106', 1),
(83, 1, 'Shalini A', 330, '2021-05-17 10:53:39', 'txn_1IryrYSCbS5QonPJ3gwqwnfw', '6374400240', '28/8, Pandian Nagar, 6th street, Kariapatti.', 'Tamil Nadu', 'Virudhunagar', 'Kariapatti', '626 106', 1),
(84, 1, 'Shalini A', 318, '2023-06-21 22:09:52', 'txn_3NLTuXSCbS5QonPJ1d490Xlz', '6374400240', '28/8, Pandian Nagar, 6th street, Kariapatti.', 'Tamil Nadu', 'Virudhunagar', 'Kariapatti', '626 106', 1),
(85, 1, 'Shalini A', 360, '2023-07-04 15:43:45', '64a3f0d967f9f', '6374400240', '28/8, Pandian Nagar, 6th street, Kariapatti.', 'Tamil Nadu', 'Virudhunagar', 'Kariapatti', '626 106', 2),
(86, 1, 'Shalini A', 124, '2024-01-31 20:53:19', '65ba65e718ce1', '6374400240', '28/8, Pandian Nagar, 6th street, Kariapatti.', 'Tamil Nadu', 'Virudhunagar', 'Kariapatti', '626 106', 2),
(87, 1, 'Shalini A', 228, '2024-05-03 11:43:54', '663480a2c63ed', '6374400240', '28/8, Pandian Nagar, 6th street, Kariapatti.', 'Tamil Nadu', 'Virudhunagar', 'Kariapatti', '626 106', 2),
(88, 1, 'Shalini A', 124, '2024-05-03 11:55:51', '6634836f93f12', '6374400240', '28/8, Pandian Nagar, 6th street, Kariapatti.', 'Tamil Nadu', 'Virudhunagar', 'Kariapatti', '626 106', 2),
(89, 1, 'Shalini A', 83, '2024-05-03 15:44:30', '6634b906e0408', '6374400240', '28/8, Pandian Nagar, 6th street, Kariapatti.', 'Tamil Nadu', 'Virudhunagar', 'Kariapatti', '626 106', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction_details`
--

CREATE TABLE `tbl_transaction_details` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `name_on_card` varchar(100) NOT NULL,
  `card_num` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaction_details`
--

INSERT INTO `tbl_transaction_details` (`id`, `transaction_id`, `name_on_card`, `card_num`) VALUES
(7, 79, 'shal', 5555555555554444),
(8, 80, 'Shalini A', 378282246310005),
(9, 82, 'sfasfad', 5555555555554444),
(10, 83, 'Shalini', 5555555555554444),
(11, 84, 'Ashaa', 5555555555554444);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0-inactive\r\n1-active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `image`, `name`, `username`, `password`, `phone`, `address`, `state`, `district`, `city`, `pincode`, `date_created`, `status`) VALUES
(1, '1616771688.png', 'Shalini A', 'shaliniadevi@gmail.com', 'AAbb12@@', '6374400240', '28/8, Pandian Nagar, 6th street, Kariapatti.', 'Tamil Nadu', 'Virudhunagar', 'Kariapatti', '626 106', '2021-05-17 06:12:33', 1),
(14, 'user.jpg', 'Anuradha', 'anuradha@slcs.edu.in', 'jq#*KX94', '', '', '', '', '', '', '2021-05-17 07:28:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `user_id`, `product_id`) VALUES
(38, 1, 74),
(51, 1, 45),
(55, 1, 68),
(56, 1, 38),
(57, 1, 64),
(58, 1, 62),
(73, 1, 52),
(76, 1, 42),
(77, 1, 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_delivery_admin`
--
ALTER TABLE `tbl_delivery_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_product_ibfk_1` (`category_id`);

--
-- Indexes for table `tbl_query`
--
ALTER TABLE `tbl_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_query_reply`
--
ALTER TABLE `tbl_query_reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `query_id` (`query_id`),
  ADD KEY `replied_by` (`replied_by`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_transaction_ibfk_1` (`user_id`);

--
-- Indexes for table `tbl_transaction_details`
--
ALTER TABLE `tbl_transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_delivery_admin`
--
ALTER TABLE `tbl_delivery_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_query`
--
ALTER TABLE `tbl_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_query_reply`
--
ALTER TABLE `tbl_query_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tbl_transaction_details`
--
ALTER TABLE `tbl_transaction_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD CONSTRAINT `tbl_blog_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `tbl_admin` (`id`);

--
-- Constraints for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD CONSTRAINT `tbl_district_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `tbl_state` (`id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_query_reply`
--
ALTER TABLE `tbl_query_reply`
  ADD CONSTRAINT `tbl_query_reply_ibfk_1` FOREIGN KEY (`query_id`) REFERENCES `tbl_query` (`id`),
  ADD CONSTRAINT `tbl_query_reply_ibfk_2` FOREIGN KEY (`replied_by`) REFERENCES `tbl_admin` (`id`);

--
-- Constraints for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD CONSTRAINT `tbl_review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`),
  ADD CONSTRAINT `tbl_review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_review_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`);

--
-- Constraints for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD CONSTRAINT `tbl_transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_transaction_details`
--
ALTER TABLE `tbl_transaction_details`
  ADD CONSTRAINT `tbl_transaction_details_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `tbl_transaction` (`id`);

--
-- Constraints for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD CONSTRAINT `tbl_wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
