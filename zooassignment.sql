-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 10:22 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zooassignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `aid` varchar(11) NOT NULL,
  `alid` int(11) NOT NULL,
  `aspecies` varchar(255) NOT NULL,
  `aname` varchar(255) NOT NULL,
  `adob` date NOT NULL,
  `agender` enum('Male','Female','Other') NOT NULL,
  `alifespan` varchar(255) NOT NULL,
  `alevel` enum('A','B','C','D','E') NOT NULL,
  `acategory` enum('Bird','Fish','Reptile or Amphibian','Mammal') NOT NULL,
  `adiet` text NOT NULL,
  `anaturalhabitat` text NOT NULL,
  `aglobalpopulation` text NOT NULL,
  `adateofjoin` date NOT NULL,
  `asize` text NOT NULL,
  `afeatured` enum('Yes','No') NOT NULL,
  `astatus` enum('Active','Dormant') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`aid`, `alid`, `aspecies`, `aname`, `adob`, `agender`, `alifespan`, `alevel`, `acategory`, `adiet`, `anaturalhabitat`, `aglobalpopulation`, `adateofjoin`, `asize`, `afeatured`, `astatus`) VALUES
('BIREA20496C', 3, 'Eagle', 'Bald Eagle', '1998-07-02', 'Male', '9 years', 'C', 'Bird', 'Their prey items include waterfowl and small mammals like squirrels, prairie dogs, raccoons and rabbits. Bald eagles are opportunistic predators meaning that in addition to hunting for live prey, they will steal from other animals (primarily from other eagles or smaller fish eating birds) or scavenge on carrion.', 'Their prey items include waterfowl and small mammals like squirrels, prairie dogs, raccoons and rabbits. Bald eagles are opportunistic predators meaning that in addition to hunting for live prey, they will steal from other animals (primarily from other eagles or smaller fish eating birds) or scavenge on carrion.', 'Their prey items include waterfowl and small mammals like squirrels, prairie dogs, raccoons and rabbits. Bald eagles are opportunistic predators meaning that in addition to hunting for live prey, they will steal from other animals (primarily from other eagles or smaller fish eating birds) or scavenge on carrion.', '2019-12-31', 'Their prey items include waterfowl and small mammals like squirrels, prairie dogs, raccoons and rabbits. Bald eagles are opportunistic predators meaning that in addition to hunting for live prey, they will steal from other animals (primarily from other eagles or smaller fish eating birds) or scavenge on carrion.', 'No', 'Active'),
('BIRPA20322C', 5, 'Parrot', 'Alexandrine Parakeet', '2012-06-23', 'Male', '2 years', 'C', 'Bird', 'Most parrots eat a diet that contains nuts, flowers, fruit, buds, seeds and insects. Seeds are their favorite food. They have strong jaws that allow them to snap open nutshells to get to the seed that\'s inside.', 'Habitat. Most wild parrots live in the warm areas of the Southern Hemisphere, though they can be found in many other regions of the world, such as northern Mexico. Australia, South America and Central America have the greatest diversity of parrot species. Not all parrots like warm weather, though', 'Looking for something fun to do this winter? Here\'s a fun citizen-science project that twitchers, birders, parrot enthusiasts, naturalists and their families can participate in: the World Parrot Count.\r\n\r\nThis international census is organised by the Parrot Researchers Group, which is part of the International Ornithological Union (IOU). Day-to-day coordination is done by Roelant Jonker, a doctoral student in the department of environmental sciences at Leiden University in the Netherlands, and by Michael Braun, a graduate student in the department of biology at Heidelberg University in Germany.', '2015-10-28', 'Parrots can range in size from about 3.5 to 40 inches (8.7 to 100 centimeters) and weigh 2.25 to 56 ounces (64 g to 1.6 kg), on average. The world\'s heaviest type of parrot is the kakapo, which can weigh up to 9 lbs', 'No', 'Active'),
('MAMEL20610A', 1, 'Elephant', 'African Bush Elephant', '1993-06-17', 'Male', '60-70 years', 'A', 'Mammal', 'African bush elephants are herbivores, which means they eat plants. These animals live across a variety of habitats in Africa, so their diets vary depending on where exactly they live. In general, African bush elephants eat grasses and plants and the leaves, bark and fruit from trees and shrubs.', 'The African Bush Elephants habitat is given away by its name â€“ in the African Bush! This includes savanna grasslands, partial desert areas and primary forest within Central and Southern Africa. These locations are perfect areas for the African Bush Elephant to find food.', 'The African bush elephant occurs in Sub-Saharan Africa including Uganda, Kenya, Tanzania, Botswana, Zimbabwe, Namibia, Zambia, and Angola. ... In Mali and Namibia, it also inhabits desert areas.', '1998-12-16', 'The African Bush Elephant is the largest known land mammal on Earth, with male African Bush Elephants reaching up to 3.5 metres in height and the females being slightly smaller at around 3 metres tall. The body of the African Bush Elephants can also grow to between 6 and 7 meters long.', 'No', 'Active'),
('MAMJA20807B', 6, 'Jaguar', 'North American Jaguar', '2013-06-12', 'Male', '12 â€“ 15 years', 'B', 'Mammal', 'Jaguars are known to eat deer, peccary, crocodiles, snakes, monkeys, deer, sloths, tapirs, turtles, eggs, frogs, fish and anything else they can catch.', 'Jaguars prefer wet lowland habitats, swampy savannas or tropical rain forests. Their favorite habitat is in the tropical and subtropical forests. Jaguars also live in forests and grasslands, living near rivers and lakes, in small caves, marshland, and under rock ledges; they live in shrubby areas as well.', 'Only 15,000 jaguars left: conservation experts call for greater collaboration. Posted: Friday, May 3, 2019. 9:08 am CST. By BBN Staff: Conservation groups are calling on transnational cooperation to protect jaguars, as new population estimates say that there are around 15,00 of the animal left on earth', '2013-05-14', 'The jaguar stands 63 to 76 cm (25 to 30 in) tall at the shoulders. Further variations in size have been observed across regions and habitats, with size tending to increase from north to south', 'Yes', 'Active'),
('MAMLE20622A', 6, 'Leopard/Jaguar', 'Black Panther Jaguar', '2012-07-07', 'Female', '12 â€“ 15 years', 'A', 'Mammal', 'Panthers are carnivorous animals, or meat eaters. Their food mainly includes herbivores like deer, wild hogs, and wild boar. They also feed on livestock or small animals, such as rabbits, dogs, birds, and fish. They eat almost anything that moves, as long as the prey isn\'t too big or strong', 'The black panther\'s habitats include the rainforest, marshland, woodlands, swamps, savannahs, and even mountains and deserts. One of the reasons that black panthers are able to live in such variety of habitats is that they can eat many types of animals', 'Although they are most commonly found in tropical and deciduous forests, the Panther can also be found inhabiting both marsh and swampland, along with grasslands and even more hostile areas such as deserts and mountains.', '2013-05-14', 'They weigh anywhere from 65 to 200 pounds (29 to 91 kg) and range in length from three to seven feet (0.9 to 2.1 m), not including tails, which are about two to three feet (0.6 to 0.9 m) long. The average adult black leopard stands two feet high at the shoulder.\r\n', 'No', 'Active'),
('MAMTI20795A', 1, 'Tiger', 'Royal Bengal Tiger', '2013-07-17', 'Male', '8 to 10 years', 'A', 'Mammal', 'The tiger is a carnivore. It prefers hunting large ungulates such as chital, sambar, gaur, and to a lesser extent also barasingha, water buffalo, nilgai, serow and takin. Among the medium-sized prey species it frequently kills wild boar, and occasionally hog deer, muntjac and grey langur.', 'The Bengal tiger, or Royal Bengal tiger, roams a wide range of habitats including high altitudes, tropical and subtropical rainforests, mangroves, and grasslands. They are primarily found in parts of India, Nepal, Bhutan, Bangladesh and Myanmar.', 'We can find the largest population of Royal Bengal Tigers in India. As per the latest tiger census report 2019, there are 2,967 Royal Bengal tigers in India. India has more than 75% of the total tiger population in the world.', '2017-06-05', 'Males have an average total length of 270 to 310 cm (110 to 120 in) including the tail, while females measure 240 to 265 cm (94 to 104 in) on average. The tail is typically 85 to 110 cm (33 to 43 in) long, and on average, tigers are 90 to 110 cm (35 to 43 in) in height at the shoulders', 'No', 'Active'),
('REPSN20640E', 5, 'Snake', 'African Black Mamba', '2020-01-01', 'Male', '2 years', 'E', 'Reptile or Amphibian', 'Snakes are elongated, legless, carnivorous reptiles of the suborder Serpentes. Like all other squamates, snakes are ectothermic, amniote vertebrates covered inSnakes are elongated, legless, carnivorous reptiles of the suborder Serpentes. Like all other squamates, snakes are ectothermic, amniote vertebrates covered in', 'Snakes are elongated, legless, carnivorous reptiles of the suborder Serpentes. Like all other squamates, snakes are ectothermic, amniote vertebrates covered inSnakes are elongated, legless, carnivorous reptiles of the suborder Serpentes. Like all other squamates, snakes are ectothermic, amniote vertebrates covered in', 'Snakes are elongated, legless, carnivorous reptiles of the suborder Serpentes. Like all other squamates, snakes are ectothermic, amniote vertebrates covered inSnakes are elongated, legless, carnivorous reptiles of the suborder Serpentes. Like all other squamates, snakes are ectothermic, amniote vertebrates covered in', '2020-03-02', 'Snakes are elongated, legless, carnivorous reptiles of the suborder Serpentes. Like all other squamates, snakes are ectothermic, amniote vertebrates covered inSnakes are elongated, legless, carnivorous reptiles of the suborder Serpentes. Like all other squamates, snakes are ectothermic, amniote vertebrates covered in', 'No', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `animal_images`
--

CREATE TABLE `animal_images` (
  `aiid` int(11) NOT NULL,
  `aianimal` varchar(11) NOT NULL,
  `aifilename` varchar(255) NOT NULL,
  `aifiletype` enum('Cover','Gallery','Global') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animal_images`
--

INSERT INTO `animal_images` (`aiid`, `aianimal`, `aifilename`, `aifiletype`) VALUES
(1, 'BIRPA20322C', 'resources/images/animals/BIRPA20322C/1585158485.1026-Cover-parrot.jpg', 'Cover'),
(6, 'REPSN20640E', 'resources/images/animals/REPSN20640E/1585465251.928-Cover-208-2086691_black-mamba-wallpaper-snake-king-cobra-hd.jpg', 'Cover'),
(23, 'REPSN20640E', 'resources/images/animals/REPSN20640E/1584954602.6302-Gallery-208-2086691_black-mamba-wallpaper-snake-king-cobra-hd.jpg', 'Gallery'),
(24, 'REPSN20640E', 'resources/images/animals/REPSN20640E/1584954602.6371-Gallery-202300.jpg', 'Gallery'),
(25, 'REPSN20640E', 'resources/images/animals/REPSN20640E/1584954602.6399-Gallery-main-qimg-4b7d88cec201e9a0b09a2b217628f3cb.webp', 'Gallery'),
(26, 'REPSN20640E', 'resources/images/animals/REPSN20640E/1584954602.6426-Gallery-Sy4bs2GYnLRUhxEYk7jnWm-1200-80.jpg', 'Gallery'),
(27, 'REPSN20640E', 'resources/images/animals/REPSN20640E/1584954602.6449-Gallery-westerngreenmamba.jpg', 'Gallery'),
(36, 'BIRPA20322C', 'resources/images/animals/BIRPA20322C/1584960748.7948-Gallery-ara-3601194_960_720.webp', 'Gallery'),
(37, 'BIRPA20322C', 'resources/images/animals/BIRPA20322C/1584960748.7975-Gallery-bird-3433703_960_720.webp', 'Gallery'),
(38, 'BIRPA20322C', 'resources/images/animals/BIRPA20322C/1584960748.7999-Gallery-gettyimages-675589535-2048x2048.jpg', 'Gallery'),
(39, 'BIRPA20322C', 'resources/images/animals/BIRPA20322C/1584960748.8025-Gallery-parrot.jpg', 'Gallery'),
(40, 'BIRPA20322C', 'resources/images/animals/BIRPA20322C/1584960748.8055-Gallery-parrot2.jpg', 'Gallery'),
(41, 'BIRPA20322C', 'resources/images/animals/BIRPA20322C/1584962533.7539-Global-Parrot_range.png', 'Global'),
(42, 'REPSN20640E', 'resources/images/animals/REPSN20640E/1585023913.3408-Global-220px-Africa_land_cover_location_mamba_map_with_borders.jpg', 'Global'),
(43, 'BIREA20496C', 'resources/images/animals/BIREA20496C/1586007611.248-Cover-download_(2).jfif', 'Cover'),
(44, 'BIREA20496C', 'resources/images/animals/BIREA20496C/1585146130.487-Gallery-1200px-Ãguila_calva.jpg', 'Gallery'),
(45, 'BIREA20496C', 'resources/images/animals/BIREA20496C/1585146130.4918-Gallery-download_(1).jfif', 'Gallery'),
(46, 'BIREA20496C', 'resources/images/animals/BIREA20496C/1585146130.4962-Gallery-download.jfif', 'Gallery'),
(47, 'BIREA20496C', 'resources/images/animals/BIREA20496C/1585146138.3698-Global-global.svg', 'Global'),
(48, 'MAMEL20610A', 'resources/images/animals/MAMEL20610A/1585194400.5975-Cover-felix-m-dorn-nizP9Lwl2rM-unsplash.jpg', 'Cover'),
(49, 'MAMTI20795A', 'resources/images/animals/MAMTI20795A/1585194825.323-Cover-nick-karvounis--KNNQqX9rqY-unsplash.jpg', 'Cover'),
(50, 'MAMTI20795A', 'resources/images/animals/MAMTI20795A/1585194939.0971-Gallery-1200px-Contented_01.jpg', 'Gallery'),
(51, 'MAMTI20795A', 'resources/images/animals/MAMTI20795A/1585194939.1008-Gallery-maxresdefault.jpg', 'Gallery'),
(52, 'MAMTI20795A', 'resources/images/animals/MAMTI20795A/1585194939.1038-Gallery-royal-bengal-tiger.jpg', 'Gallery'),
(53, 'MAMTI20795A', 'resources/images/animals/MAMTI20795A/1585194939.107-Gallery-tiger_1569041256_725x725.jpg', 'Gallery'),
(54, 'MAMTI20795A', 'resources/images/animals/MAMTI20795A/1585194949.9323-Global-220px-Panthera_tigris_tigris_and_Panthera_tigris_corbetti_distribution_map.png', 'Global'),
(62, 'MAMEL20610A', 'resources/images/animals/MAMEL20610A/1585194981.7713-Global-african-elephant-geographical-range.png', 'Global'),
(63, 'MAMEL20610A', 'resources/images/animals/MAMEL20610A/1585464270.2392-Gallery-African.elephant.paignton.zoo.arp.jpg', 'Gallery'),
(64, 'MAMEL20610A', 'resources/images/animals/MAMEL20610A/1585464270.2416-Gallery-African_bush_elephant_in_San_Diego_Zoo.jpg', 'Gallery'),
(65, 'MAMEL20610A', 'resources/images/animals/MAMEL20610A/1585464270.2441-Gallery-BushElephantProvidenceZoo.jpg', 'Gallery'),
(66, 'MAMEL20610A', 'resources/images/animals/MAMEL20610A/1585464270.2463-Gallery-depositphotos_251196572-stock-video-gdansk-poland-june-2015-african.jpg', 'Gallery'),
(67, 'MAMEL20610A', 'resources/images/animals/MAMEL20610A/1585464270.2489-Gallery-images.jfif', 'Gallery'),
(68, 'MAMEL20610A', 'resources/images/animals/MAMEL20610A/1585464270.2516-Gallery-unnamed.jpg', 'Gallery'),
(69, 'MAMJA20807B', 'resources/images/animals/MAMJA20807B/1585481268.4939-Cover-ramon-vloon-9Up5W9NITQw-unsplash.jpg', 'Cover'),
(70, 'MAMJA20807B', 'resources/images/animals/MAMJA20807B/1585482060.3893-Gallery-08186vrk_jaguar-650_625x300_15_July_18.webp', 'Gallery'),
(71, 'MAMJA20807B', 'resources/images/animals/MAMJA20807B/1585482060.4062-Gallery-audobon-jaguarjpg-e2d7540a345681cd.jpg', 'Gallery'),
(72, 'MAMJA20807B', 'resources/images/animals/MAMJA20807B/1585482060.4108-Gallery-Dud3VsAV4AIfjQn_2.jpg', 'Gallery'),
(73, 'MAMJA20807B', 'resources/images/animals/MAMJA20807B/1585482060.4163-Gallery-gettyimages-640977760-612x612.jpg', 'Gallery'),
(74, 'MAMJA20807B', 'resources/images/animals/MAMJA20807B/1585482060.4304-Gallery-kachi-awaji-YenBj0GuzOs-unsplash.jpg', 'Gallery'),
(75, 'MAMJA20807B', 'resources/images/animals/MAMJA20807B/1585482080.5668-Global-Spatial-variation-in-the-mean-estimates-of-adjusted-jaguar-population-densities-used-for_Q320.jpg', 'Global'),
(76, 'MAMLE20622A', 'resources/images/animals/MAMLE20622A/1585482880.87-Cover-black-panther.jpg', 'Cover'),
(77, 'MAMLE20622A', 'resources/images/animals/MAMLE20622A/1585482914.1925-Global-Leopard-Panthera-pardus-geographic-range-Africa-Asia-2019.jpg', 'Global'),
(78, 'MAMLE20622A', 'resources/images/animals/MAMLE20622A/1585482930.0108-Gallery-17523351_1492199184125668_8410510417526912254_n-750x500.jpg', 'Gallery'),
(79, 'MAMLE20622A', 'resources/images/animals/MAMLE20622A/1585482930.017-Gallery-black-panther-jaguar-wallpaper-preview.jpg', 'Gallery'),
(80, 'MAMLE20622A', 'resources/images/animals/MAMLE20622A/1585482930.021-Gallery-juan-camilo-guarin-p-iUNYlWlr6fo-unsplash.jpg', 'Gallery'),
(81, 'MAMLE20622A', 'resources/images/animals/MAMLE20622A/1585482930.0251-Gallery-melody-p-nVHp4zhBlO4-unsplash.jpg', 'Gallery'),
(82, 'MAMLE20622A', 'resources/images/animals/MAMLE20622A/1585482930.0281-Gallery-panthers-animals-photography-jaguar-wallpaper-preview.jpg', 'Gallery'),
(83, 'MAMLE20622A', 'resources/images/animals/MAMLE20622A/1585482930.0309-Gallery-shutterstock_707199295-1024x683.jpg', 'Gallery');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `aid` int(11) NOT NULL,
  `atitle` varchar(255) NOT NULL,
  `adescription` text NOT NULL,
  `acode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`aid`, `atitle`, `adescription`, `acode`) VALUES
(1, 'The Aviary', 'Where all the birds in the zoo are housed the aviary. ', 'A1'),
(3, 'The Hothouse', 'Where all reptiles and amphibians reside', 'B12'),
(4, 'The Aquarium', 'For all fish within the zoo', 'AQ12'),
(5, 'The Cages/Compounds', 'Housing all mammals', 'CC9');

-- --------------------------------------------------------

--
-- Table structure for table `birds`
--

CREATE TABLE `birds` (
  `bid` int(11) NOT NULL,
  `baid` varchar(11) NOT NULL,
  `bnestmethod` text NOT NULL,
  `bwingspan` varchar(255) NOT NULL,
  `bfly` enum('Yes','No') NOT NULL,
  `bcolours` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `birds`
--

INSERT INTO `birds` (`bid`, `baid`, `bnestmethod`, `bwingspan`, `bfly`, `bcolours`) VALUES
(1, 'BIRPA20322C', 'Only the monk parakeet and five species of lovebirds build nests in trees, and three Australian and New Zealand ground parrots nest on the ground. All other parrots and cockatoos nest in cavities, either tree hollows or cavities dug into cliffs, banks, or the ground.', '4 feet', 'Yes', 'Parrots come in five different colors: red, blue, green, cyan, and gray.'),
(2, 'BIREA20496C', 'Eagles build their nest in a branched crotch toward the top of the tree. The birds stack and interweave sticks and branches to create a bulky nest and line its center with soft material such as moss, grass, twigs and feathers.', '1.8 m', 'Yes', 'Black, White');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eid` int(11) NOT NULL,
  `etitle` varchar(255) NOT NULL,
  `edescription` text NOT NULL,
  `eticket` text NOT NULL,
  `ebanner` varchar(255) NOT NULL,
  `estartdate` date NOT NULL,
  `eenddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eid`, `etitle`, `edescription`, `eticket`, `ebanner`, `estartdate`, `eenddate`) VALUES
(1, 'TXU Energy Presents Dragons', 'Come face to face with massive, mythical creatures - only at the Claybrook Zoo.', 'SAVE with a Value Pass! This all-day access pass includes unlimited walks through TXU Energy presents Dragons, general Zoo admission, a souvenir conservation bracelet, and unlimited Wildlife Carousel rides. \r\n\r\nPricing: \r\nAdult Value Pass (ages 12+): $27.', 'resources/images/events/1585457491.6704-Banner-Dragons__WebLogo_Horizontal_600x400-600x400.jpg', '2020-03-31', '2020-05-31'),
(2, 'Member Morning: Carnivores', 'On the first Saturday of each month, members may enter the Zoo one hour before opening to the general public.\r\n\r\nJoin us for Member Morning presented by PNC Bank! Each month, a different Meet the Keeper Talk presented by Phillips 66 is featured at 8:30 a.m. exclusively for Zoo members. Hear from an expert and gain professional insight about the featured animals. Learn from the best in the field about what it really takes to care for the diverse animals that call the Zoo home!\r\n\r\nThis event is always FREE for Zoo members, and thereâ€™s no need to RSVP!', 'Event Schedule\r\n8:15 a.m. â€“ Clouded Leopard Training\r\n8:30 a.m. â€“ Fossa Enrichment Keeper Talk\r\n9:00 a.m. â€“ Ocelot Training\r\n9:15 a.m. â€“ Clouded Leopard Cub Socialization Session', 'resources/images/events/1585467631.5072-Banner-shutterstock-740325778.jpg', '2020-03-07', '2020-09-07'),
(5, 'Member Morning: Elephants', 'On the first Saturday of each month, members may enter the Zoo one hour before opening to the general public. On the first Saturday of each month, members may enter the Zoo one hour before opening to the general public.\r\n\r\n\r\n\r\n', 'Join us for Member Morning presented by PNC Bank! Each month, a different Meet the Keeper Talk presented by Phillips 66 is featured at 8:30 a.m. exclusively for Zoo members. Hear from an expert and gain professional insight about the featured animals. Join us for Member Morning presented by PNC Bank! Each month, a different Meet the Keeper Talk presented by Phillips 66 is featured at 8:30 a.m. exclusively for Zoo members. Hear from an expert and gain professional insight about the featured animals. JoiJoin us for Member Morning presented by PNC Bank! Each month, a different Meet the Keeper Talk presented by Phillips 66 is featured at 8:30 a.m. exclusively for Zoo members. Hear from an expert and gain professional insight about the featured animals. \r\n\r\nJoin us for Member Morning presented by PNC Bank! Each month, a different Meet the Keeper Talk presented by Phillips 66 is featured at 8:30 a.m. exclusively for Zoo members. Hear from an expert and gain professional insight about the featured animals. JoiJoin us for Member Morning presented by PNC Bank! Each month, a different Meet the Keeper Talk presented by Phillips 66 is featured at 8:30 a.m. exclusively for Zoo members. Hear from an expert and gain professional insight about the featured animals. Joi', 'resources/images/events/1585458139.5701-Banner-African.elephant.paignton.zoo.arp.jpg', '2020-05-04', '2020-07-01'),
(6, 'Super Sea Lions (18-23 Months)', 'Ahoy matey, we\'re about to set sail to see sea lions! Slide on over to the sea lion pool with other Sprouts as we watch these slippery sea dogs surprise you with their sensational swimming!', 'Thursday, April 9 (9:30 to 10:30 am) Saturday April 11 is Sold Out!', 'resources/images/events/1585465122.8717-Banner-California_sea_lion_in_La_Jolla_(70568).jpg', '2020-03-30', '2020-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `fish`
--

CREATE TABLE `fish` (
  `fid` int(11) NOT NULL,
  `faid` varchar(11) NOT NULL,
  `faveragetemp` varchar(255) NOT NULL,
  `fwatertype` varchar(255) NOT NULL,
  `fcolour` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `lcode` varchar(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `larea` int(11) NOT NULL,
  `ldimensions` varchar(255) NOT NULL,
  `lfeedingtime` varchar(255) NOT NULL,
  `lfood` varchar(255) NOT NULL,
  `lsize` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`lcode`, `lid`, `larea`, `ldimensions`, `lfeedingtime`, `lfood`, `lsize`) VALUES
('MC1-A2', 1, 5, '200', '6am, 11am, 4pm', '1.1 Kg Green Leaf Matter 0.75 Kg Assorted Fruits', 5),
('AQ1-P1', 3, 4, '120', '10AM', 'Phytoplankton', 50),
('CG1-G1', 4, 1, '100', '6am, 11am, 4pm', 'Maize Seed', 29),
('HHS-A1', 5, 3, '50', '10am, 4pm, 9pm', 'Watermelon, Carrot', 6),
('JAG-12', 6, 5, '1200', '6am, 11am, 4pm', 'Ground Beef, Knucklebones or Cow Femurs Twice a Week, and Rabbits Once a Week', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mammals`
--

CREATE TABLE `mammals` (
  `mid` int(11) NOT NULL,
  `maid` varchar(11) NOT NULL,
  `mgestational` varchar(255) NOT NULL,
  `mcategory` varchar(255) NOT NULL,
  `maveragetemp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mammals`
--

INSERT INTO `mammals` (`mid`, `maid`, `mgestational`, `mcategory`, `maveragetemp`) VALUES
(1, 'MAMEL20610A', '22 months', 'Elephantidae', '35.9 Â°C (96.6 Â°F)'),
(2, 'MAMTI20795A', '104-106 Days', 'Carnivora', '37.5ÂºC or 99.5ÂºF'),
(3, 'MAMJA20807B', '93 â€“ 105 days', 'Carnivora', '32 degrees Celsius (90 degrees Fahrenheit)'),
(4, 'MAMLE20622A', '93 â€“ 105 days', 'Carnivora', '32 degrees Celsius (90 degrees Fahrenheit)');

-- --------------------------------------------------------

--
-- Table structure for table `reptile_amphibians`
--

CREATE TABLE `reptile_amphibians` (
  `raid` int(11) NOT NULL,
  `raaid` varchar(11) NOT NULL,
  `rareproductiontype` varchar(255) NOT NULL,
  `raaverageclutchsize` varchar(255) NOT NULL,
  `raaverageoffsprings` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reptile_amphibians`
--

INSERT INTO `reptile_amphibians` (`raid`, `raaid`, `rareproductiontype`, `raaverageclutchsize`, `raaverageoffsprings`) VALUES
(4, 'REPSN20640E', 'Eggs', '2.4 m', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `sid` int(11) NOT NULL,
  `scompany` varchar(255) NOT NULL,
  `sptelephone` varchar(20) NOT NULL,
  `sstelephone` varchar(20) DEFAULT NULL,
  `semail` varchar(255) NOT NULL,
  `saddress` text NOT NULL,
  `sbanner` varchar(255) NOT NULL,
  `swebsite` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`sid`, `scompany`, `sptelephone`, `sstelephone`, `semail`, `saddress`, `sbanner`, `swebsite`) VALUES
(1, 'Zenth  Staybrite Ltd', '01966 7855122', '0800 3289392', 'zenth@gmail.com', 'Mrs Jane Woods (Senior Accountant)\r\n 45 Blackwood Road\r\nWesthills\r\nLongbottom\r\nNorth Yorkshire\r\nNY12 D454\r\n', 'resources/images/sponsors/1585373794.7772-Banner-test.bmp', 'Not Available'),
(4, 'The Coca-Cola Company', '(1.800.438.2653)', '+1 (404) 676.2683', 'coca@cola.com', 'Atlanta, Georgia, United States', 'resources/images/sponsors/1585381763.7043-Banner-coco-cola.jpg', 'https://www.coca-colacompany.com/'),
(5, 'Ferrari Italia', '21324', '515 5135 15341', 'fitalia@ferrari.com', 'Ferrari Head Office Address: Ferrari SpA, headquarters and factory: Via Abetone Inferiore n. 4, I-41053 Maranello (MO).', 'resources/images/sponsors/1586274590.9019-Banner-unnamed.jpg', 'http://www.ferrariitalia.com');

-- --------------------------------------------------------

--
-- Table structure for table `sponsorships`
--

CREATE TABLE `sponsorships` (
  `sid` int(11) NOT NULL,
  `said` varchar(11) NOT NULL,
  `ssid` int(11) NOT NULL,
  `sprice` double(15,2) NOT NULL,
  `sstartdate` date NOT NULL,
  `senddate` date NOT NULL,
  `sarea` varchar(255) NOT NULL,
  `snotes` text,
  `spaymentdetails` text,
  `spaid` enum('Yes','No') NOT NULL,
  `reviewdate` date DEFAULT NULL,
  `ssigndate` date DEFAULT NULL,
  `sstatus` enum('Pending','Active','Expired') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsorships`
--

INSERT INTO `sponsorships` (`sid`, `said`, `ssid`, `sprice`, `sstartdate`, `senddate`, `sarea`, `snotes`, `spaymentdetails`, `spaid`, `reviewdate`, `ssigndate`, `sstatus`) VALUES
(1, 'BIRPA20322C', 1, 1500.00, '2021-01-01', '2021-12-31', '1/8', 'Sponsorship details to be displayed in the bottom right-hand corner.', 'Electronic Transfer of  Funds to Zoo Sponsorship Account', 'Yes', '2020-04-05', '2020-03-27', 'Active'),
(3, 'MAMTI20795A', 4, 2500.00, '2022-01-01', '2022-12-31', '1/10', 'We love animals and would love to pay for this tiger. In return, we would just want a small space for our advertisement.', 'We will make a payment to your bank account through cash.', 'Yes', '2020-03-28', '2020-03-28', 'Active'),
(4, 'MAMJA20807B', 5, 2000.00, '2024-01-01', '2024-12-31', '2/10', 'Nothing really', 'We will send a cheque.', 'No', '2020-04-07', '2020-04-07', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `ufullname` varchar(255) NOT NULL,
  `utype` enum('Administrator','Manager','Zookeeper') NOT NULL,
  `upassword` varchar(255) NOT NULL,
  `ustatus` enum('Active','Dormant') NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `ufullname`, `utype`, `upassword`, `ustatus`, `email`) VALUES
(10000, 'Diwas Lamsal', 'Administrator', '$2y$10$m.g2J..zy83rZC42zSp4BeIdCJKWNTq5/RXUlNsqaN9XVgIEmIym2', 'Active', 'diwaslamsal@claybrook.org'),
(10001, 'Claybrook Administrator', 'Administrator', '$2y$10$WpfjWZc9pUQx5olvQjxB.uT32YHyOkalxu9aUZb23nIqnhGX7Fubu', 'Active', 'cbadmin@claybrook.org'),
(10002, 'Bhuwan Karki', 'Manager', '$2y$10$TrgAUtTEpDd0j1hWoU55N.skjkl7ki0txOURMpFbB/huLlQqDRfNm', 'Active', 'bkarki@claybrook.org'),
(10003, 'Robin Zookeeper', 'Zookeeper', '$2y$10$IZuu0DSMs1dJjrs0AlwsIec/ZpOxYN5fDs9SrEqVDcpHFxV.IaGsa', 'Active', 'rbzookeeper@claybrook.org');

-- --------------------------------------------------------

--
-- Table structure for table `watchlists`
--

CREATE TABLE `watchlists` (
  `waid` varchar(11) NOT NULL,
  `wid` int(11) NOT NULL,
  `wcondition` varchar(255) NOT NULL,
  `wlevel` enum('Low','Moderate','Substantial','Severe','Critical') NOT NULL,
  `wrecorddate` date NOT NULL,
  `wenddate` date NOT NULL,
  `wdetails` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watchlists`
--

INSERT INTO `watchlists` (`waid`, `wid`, `wcondition`, `wlevel`, `wrecorddate`, `wenddate`, `wdetails`) VALUES
('BIREA20496C', 1, 'Avian influenza', 'Substantial', '2020-03-18', '2020-03-19', 'Avian influenza refers to the disease caused by infection with avian (bird) influenza (flu) Type A viruses. These viruses occur naturally among wild aquatic birds worldwide and can infect domestic poultry and other bird and animal species. Avian flu viruses do not normally infect humans.'),
('MAMEL20610A', 2, 'Elephantiasis ', 'Severe', '2020-03-16', '0000-00-00', 'Elephantiasis is a tropical disease caused by parasitic worms that are spread through mosquito bites. The skin gets thick and hard, resembling an elephant\'s skin.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `arid` (`alid`),
  ADD KEY `alid` (`alid`);

--
-- Indexes for table `animal_images`
--
ALTER TABLE `animal_images`
  ADD PRIMARY KEY (`aiid`),
  ADD KEY `aianimal` (`aianimal`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `birds`
--
ALTER TABLE `birds`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `baid` (`baid`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `fish`
--
ALTER TABLE `fish`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `faid` (`faid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `larea` (`larea`);

--
-- Indexes for table `mammals`
--
ALTER TABLE `mammals`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `maid` (`maid`);

--
-- Indexes for table `reptile_amphibians`
--
ALTER TABLE `reptile_amphibians`
  ADD PRIMARY KEY (`raid`),
  ADD KEY `raaid` (`raaid`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `sponsorships`
--
ALTER TABLE `sponsorships`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `said` (`said`),
  ADD KEY `ssid` (`ssid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `watchlists`
--
ALTER TABLE `watchlists`
  ADD PRIMARY KEY (`wid`),
  ADD KEY `waid` (`waid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal_images`
--
ALTER TABLE `animal_images`
  MODIFY `aiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `birds`
--
ALTER TABLE `birds`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fish`
--
ALTER TABLE `fish`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mammals`
--
ALTER TABLE `mammals`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reptile_amphibians`
--
ALTER TABLE `reptile_amphibians`
  MODIFY `raid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponsorships`
--
ALTER TABLE `sponsorships`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;

--
-- AUTO_INCREMENT for table `watchlists`
--
ALTER TABLE `watchlists`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `fk_a_locations` FOREIGN KEY (`alid`) REFERENCES `locations` (`lid`);

--
-- Constraints for table `animal_images`
--
ALTER TABLE `animal_images`
  ADD CONSTRAINT `fk_ai_animals` FOREIGN KEY (`aianimal`) REFERENCES `animals` (`aid`);

--
-- Constraints for table `birds`
--
ALTER TABLE `birds`
  ADD CONSTRAINT `fk_b_animals` FOREIGN KEY (`baid`) REFERENCES `animals` (`aid`);

--
-- Constraints for table `fish`
--
ALTER TABLE `fish`
  ADD CONSTRAINT `fk_f_animals` FOREIGN KEY (`faid`) REFERENCES `animals` (`aid`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `fk_l_areas` FOREIGN KEY (`larea`) REFERENCES `areas` (`aid`);

--
-- Constraints for table `mammals`
--
ALTER TABLE `mammals`
  ADD CONSTRAINT `fk_m_animals` FOREIGN KEY (`maid`) REFERENCES `animals` (`aid`);

--
-- Constraints for table `reptile_amphibians`
--
ALTER TABLE `reptile_amphibians`
  ADD CONSTRAINT `fk_ra_animals` FOREIGN KEY (`raaid`) REFERENCES `animals` (`aid`);

--
-- Constraints for table `sponsorships`
--
ALTER TABLE `sponsorships`
  ADD CONSTRAINT `fk_s_animals` FOREIGN KEY (`said`) REFERENCES `animals` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_s_sponsors` FOREIGN KEY (`ssid`) REFERENCES `sponsors` (`sid`);

--
-- Constraints for table `watchlists`
--
ALTER TABLE `watchlists`
  ADD CONSTRAINT `fk_w_animals` FOREIGN KEY (`waid`) REFERENCES `animals` (`aid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
