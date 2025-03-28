-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2025 at 03:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haruka_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `exhibitions`
--

CREATE TABLE `exhibitions` (
  `exhibition_id` int(11) NOT NULL,
  `exhibition_title` varchar(255) NOT NULL,
  `exhibition_location` varchar(255) NOT NULL,
  `exhibition_dates` varchar(255) NOT NULL,
  `exhibition_description` text NOT NULL,
  `exhibition_image` longblob NOT NULL,
  `exhibition_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exhibitions`
--

INSERT INTO `exhibitions` (`exhibition_id`, `exhibition_title`, `exhibition_location`, `exhibition_dates`, `exhibition_description`, `exhibition_image`, `exhibition_link`) VALUES
(1, 'Ceremonies Out of the Air: Ralph Lemon', 'MoMA PS1, New York', 'November 14, 2024 – March 24, 2025', 'A thought-provoking exhibition by artist Ralph Lemon, featuring multimedia installations, video works, and sound compositions.', 0x7468756d622e6a7067, 'https://www.momaps1.org/en/programs/377-ceremonies-out-of-the-air-ralph-lemon'),
(4, 'Van Gogh: The Immersive Experience', 'New York, USA', 'March 1, 2025 – August 30, 2025', 'A 360-degree digital art exhibition showcasing the works of Vincent van Gogh with immersive projections, VR experiences, and interactive elements.', 0x32652e77656270, 'https://vangoghexpo.com/worcester/'),
(5, ' The Art of Banksy', 'London, UK', ' May 10, 2025 – November 15, 2025', 'Exhibition Description: A major retrospective featuring over 80 original works by Banksy, including street art, prints, and unseen pieces, curated without the artist’s involvement.', 0x33652e61766966, 'https://www.artofbanksy.com/'),
(6, 'Yayoi Kusama: Infinity Mirror Rooms', ' Tate Modern, London, UK', 'January 20, 2025 – July 10, 2025', 'A mesmerizing installation by Yayoi Kusama featuring her famous Infinity Mirror Rooms, allowing visitors to experience infinite reflections of light and colors.', 0x72362e6a7067, 'https://www.tate.org.uk/'),
(9, 'Salvador Dalí: The Persistence of Dreams', 'Museum of Modern Art (MoMA), New York, USA', 'June 1, 2025 – December 1, 2025', 'A surrealist journey through Dalí’s masterpieces, featuring iconic works like The Persistence of Memory and rare sketches from his private collection.', 0x6677342e6a7067, 'https://www.moma.org/');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_fullname` varchar(255) NOT NULL,
  `order_email` varchar(255) NOT NULL,
  `order_address` text NOT NULL,
  `order_phone_number` varchar(20) NOT NULL,
  `order_card_front` char(16) NOT NULL,
  `order_card_back` char(3) NOT NULL,
  `order_total_amount` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_fullname`, `order_email`, `order_address`, `order_phone_number`, `order_card_front`, `order_card_back`, `order_total_amount`, `order_date`) VALUES
(2, 'MUHAMMAD IRSAN BIN MOHD NOOR ', 'muhdirsan181@gmail.com', 'Lot 000, Jalan 000, Kampung, Sungai Buloh, 47000, Selangor', '0183779684', '1234567890101112', '123', 1358.90, '2025-03-25 09:05:47'),
(3, 'NANASE HARUKA', 'iwatobi95@swimclub.com', 'Lot 167, Jalan 128, Tak Tahu, Duduk Mana', '0183190593', '9999111188886666', '573', 4836.07, '2025-03-25 09:43:16'),
(4, 'PARK BO GUM', 'bogummy@gmail.com', 'Lot 897, Jalan 892, Selangor', '01111926423', '6218263047158412', '487', 18790.50, '2025-03-25 13:04:54'),
(5, 'Syed Farhan Haziq', 'haziqfarhan123@gmail.com', 'Lot 666, Jalan 888, Cheras, Selangor', '0123456789', '7658909825123456', '953', 6899.90, '2025-03-25 15:59:26'),
(6, 'Kirito', 'sao@gmail.com', 'Irsan123, Jalan 887, Selangor', '0184267453', '1717161514181910', '432', 883.30, '2025-03-25 17:26:15'),
(7, 'Charn Channarong', '2sisters@gmail.com', 'Lot 768, Jalan 543, Sungai Buloh, Selangor', '0134268904', '1066253487761258', '432', 14683.10, '2025-03-25 17:30:37'),
(8, 'Charn Chai', 'charnchai123@gmail.com', 'Lot 444, Jalan 777, Selangor', '0186254398', '4444876590123456', '456', 883.30, '2025-03-26 07:19:19'),
(9, 'Channarong', 'channarong123@gmail.com', 'Lot 666, Jalan 888 Selangor', '0197256432', '9090987654323145', '342', 241191.90, '2025-03-26 08:18:06'),
(10, 'Hazizan Hariz', 'hazizan04@gmail.com', 'Lot 345, Jalan 873, Selangor', '0127364892', '4444666677773333', '235', 109783.30, '2025-03-28 13:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_item_quantity` int(11) NOT NULL,
  `order_item_subtotal_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `order_item_quantity`, `order_item_subtotal_price`) VALUES
(2, 3, 5, 1, 3952.77),
(3, 3, 1, 1, 883.30),
(4, 4, 8, 1, 18790.50),
(5, 5, 9, 1, 6899.90),
(6, 6, 1, 1, 883.30),
(7, 7, 9, 2, 13799.80),
(8, 7, 1, 1, 883.30),
(9, 8, 1, 1, 883.30),
(10, 9, 2, 1, 1358.90),
(11, 9, 17, 1, 239833.00),
(12, 10, 1, 1, 883.30),
(13, 10, 16, 1, 108900.00);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_category` enum('Furniture','Fine Art','Sculpture') NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` longblob DEFAULT NULL,
  `product_stock` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_category`, `product_description`, `product_image`, `product_stock`) VALUES
(1, 'Foshan Factory European Antique Leather Living Room Furniture Set', 883.30, 'Furniture', 'Style: Chesterfield SOFA\r\nBrand Name: AMG\r\nInner material: Solid Wood + Sponge + Spring', 0x63686169722e77656270, 5),
(2, 'Abstract Human Body', 1358.90, 'Sculpture', 'Brand: DIE\r\nColour: Silver\r\nMaterial	‎Resin\r\nSpecial Features: Unique design and unconventional materials (Bronze, Resin)', 0x706174756e672e6a7067, 2),
(5, 'Starry Night', 3952.77, 'Fine Art', 'The Starry Night, often called simply Starry Night, is an oil-on-canvas painting by the Dutch Post-Impressionist painter Vincent van Gogh, painted in June 1889.', 0x3133363470782d56616e5f476f67685f2d5f5374617272795f4e696768745f2d5f476f6f676c655f4172745f50726f6a6563742e6a7067, 4),
(7, 'The Potato Eaters', 1984.90, 'Fine Art', 'The Potato Eaters is an oil painting by Dutch artist Vincent van Gogh painted in April 1885 in Nuenen, Netherlands. It is in the Van Gogh Museum in Amsterdam.', 0x706f7461746f45617465722e6a706567, 1),
(8, 'Auguste Rodin, The Thinker, 1903', 18790.50, 'Sculpture', 'Attributed to works of Auguste Rodin in the late 19th and early 20th centuries.Although he portrayed the human figure reliably, respecting the canon of proportions.', 0x6d616e2d7468696e6b696e672e77656270, 1),
(9, 'Café Terrace at Night', 6899.90, 'Fine Art', 'Van Gogh painted Café Terrace at Night in Arles, France, in mid-September 1888. The painting is not signed, but described and mentioned by the artist in three letters.', 0x79382e4a5047, 2),
(10, 'An antique chair and desk', 1345.00, 'Furniture', 'Called the antique\'s period Edwardian, Tudor, Colonial, etc.. Christie\'s defines it as being over 100 years old.', 0x6677322e6a7067, 3),
(11, 'Antique Chinese Wooden Nesting Tables', 8500.00, 'Furniture', 'In good condition', 0x6677332e6a7067, 8),
(12, 'Apollo the Greek God Sculpture in Marble 24', 21350.00, 'Sculpture', 'The material used in it is Marble. Hand carved in marble 2ft/ 24 inches', 0x6672312e706e67, 2),
(13, 'The Veiled Lady Sculpture in Marble 2.5ft', 9672.00, 'Sculpture', 'The material used in it is Marble. Hand carved in marble. 2.5ft/ 30 inches', 0x6672322e706e67, 3),
(14, 'Modern Sculpture for Garden in Grey Stone 4ft', 2579.90, 'Sculpture', 'The material used in it is a grey stone. Hand carved in grey stone.  4ft or  48 inches', 0x6672332e706e67, 2),
(15, 'Leonardo da Vinci (1452-1519), Mona Lisa', 98357.00, 'Fine Art', 'Leonardo kept the Mona Lisa in his possession for over 10 years and took it to France when King Francis I in 1516 hired him at his court.', 0x6672342e61766966, 1),
(16, 'Diego Velázquez (1599-1660), \'Las Meninas\', 1656.', 108900.00, 'Fine Art', 'From 1623 until his death in 1660, Baroque artist Diego Velázquez was court painter under King Philip IV.', 0x6672352e61766966, 0),
(17, 'Jan Vermeer (1632-1675), \'The Girl with the Pearl Earring\', 1665.', 239833.00, 'Fine Art', 'The Girl with the Pearl Earring by the Dutch Baroque painter Jan Vermeer is the star of the collection of the Mauritshuis in The Hague. ', 0x6672362e61766966, 0),
(18, 'Gustav Klimt (1862-1918), \'The Kiss\', 1908. ', 158900.00, 'Fine Art', 'In the midst of his golden phase, Gustav Klimt completed one of the most striking paintings of the Art Nouveau: The Kiss.', 0x6672372e61766966, 1),
(19, 'Whispering Winds', 9860.00, 'Sculpture', 'Size: 300mm, Decoration material: Resin', 0x67362e77656270, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` enum('admin','manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_role`) VALUES
(3, 'BoGum', 'bogummy@gmail.com', '17f490c9d450e17fc0dc8d4f3194d862', 'admin'),
(5, 'Muhammad Irsan', 'muhdirsan181@gmail.com', '8b986e4084c1bdec69cac7c392668273', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exhibitions`
--
ALTER TABLE `exhibitions`
  ADD PRIMARY KEY (`exhibition_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exhibitions`
--
ALTER TABLE `exhibitions`
  MODIFY `exhibition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
