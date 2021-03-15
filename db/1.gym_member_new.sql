SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `gym_member`;
CREATE TABLE `gym_member` (
  `id` int NOT NULL,
  `gym_id` int NOT NULL,
  `user_id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `paket_id` int NOT NULL,
  `hp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=not active,1=active',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `gym_member_paket`;
CREATE TABLE `gym_member_paket` (
  `id` int NOT NULL,
  `gym_id` int NOT NULL,
  `gym_member_id` int NOT NULL,
  `gym_paket_id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=not active, 1= active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `gym_member`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `gym_member_paket`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `gym_member`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `gym_member_paket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
