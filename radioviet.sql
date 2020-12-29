-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 09:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `radioviet`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `stream` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`id`, `name`, `stream`, `img`) VALUES
(1, 'VOH FM 99.9MHz', 'http://125.212.213.71:1935/live/channel3/playlist.m3u8', 'https://image.ibb.co/eTNs59/r_voh99.png'),
(2, 'VOH FM 95.6MHz', 'http://125.212.213.71:1935/live/channel1/playlist.m3u8', 'https://image.ibb.co/i3ZuJU/r_voh95.png'),
(3, 'VOH FM 87.7MHz', 'http://125.212.213.71:1935/live/channel5/playlist.m3u8', 'https://i.ibb.co/LYGM648/r-voh87.png'),
(4, 'VOH AM 610KHz', 'http://125.212.213.71:1935/live/channel2/playlist.m3u8', 'https://image.ibb.co/nLpuJU/r_voh610.png'),
(5, 'VOV GT HN', 'https://streaming1.vov.vn:8443/audio/vovvn1_vovGT.stream_aac/playlist.m3u8', 'https://image.ibb.co/kOOodU/r_vovgthn.png'),
(6, 'VOV GT Hồ Chí Minh', 'https://streaming1.vov.vn:8443/audio/vovvn1_vovGTHCM.stream_aac/playlist.m3u8', 'https://image.ibb.co/mtPiCp/r_vovgthcm.png'),
(7, 'VOV Mekong FM 90Mhz', 'http://media.kythuatvov.vn:1936/live/MEKONG.sdp/playlist.m3u8', 'https://image.ibb.co/gu5OCp/r-vovmekong1.png'),
(8, 'VOV Sức khỏe FM 89Mhz', 'http://media.kythuatvov.vn:1936/live/VOV89.sdp/playlist.m3u8', 'https://image.ibb.co/b9N3Cp/r-vovsuckhoe1.png'),
(9, 'VOV24/7 - FM 104MHz', 'https://streaming1.vov.vn:8443/audio/vovvn1_vov247.stream_aac/playlist.m3u8', 'https://image.ibb.co/g78odU/r_vov247.png'),
(10, 'VOV1 - AM 675KHz', 'https://streaming1.vov.vn:8443/audio/vovvn1_vov1.stream_aac/playlist.m3u8', 'https://image.ibb.co/eNBVsp/r_vov1.png'),
(11, 'VOV2 - FM 102.7MHz', 'https://streaming1.vov.vn:8443/audio/vovvn1_vov2.stream_aac/playlist.m3u8', 'https://image.ibb.co/cKVOCp/r_vov2.png'),
(12, 'VOV3 - FM 104.5MHz', 'https://streaming1.vov.vn:8443/audio/vovvn1_vov3.stream_aac/playlist.m3u8', 'https://image.ibb.co/bJYzk9/r_vov3.png'),
(13, 'VOV4', 'https://streaming1.vov.vn:8443/audio/vovvn1_vovTTMT.stream_aac/playlist.m3u8', 'https://image.ibb.co/e94TdU/r_vov4.png'),
(14, 'VOV5 - FM 105.5MHz', 'https://streaming1.vov.vn:8443/audio/vovvn1_vov5.stream_aac/playlist.m3u8', 'https://image.ibb.co/hVTodU/r_vov5.png'),
(15, 'Hà Nội - 90MHz', 'http://media.mediatech.vn:1935/hntvRadio/fm90live/playlist.m3u8', 'https://image.ibb.co/n6c3Cp/r_hanoi.png'),
(16, 'Hà Nội - 96MHz', 'http://cdn.mediatech.vn/hntvRadio/fm96.sdp_aac/playlist.m3u8', 'https://image.ibb.co/n6c3Cp/r_hanoi.png'),
(17, 'An Giang', 'http://221.133.9.35:1935/live/1.stream_240p/playlist.m3u8', 'https://image.ibb.co/bGhgyU/r-angiang.png'),
(18, 'Cần Thơ - FM 93.7MHz', 'http://tv.canthotv.vn/live/radio/radio.m3u8', 'https://image.ibb.co/fM8X59/r_cantho.png'),
(19, 'Đồng Tháp', 'http://202.43.109.144:1935/thdtradio/thdtradio/playlist.m3u8', 'https://image.ibb.co/iDHEJU/r_dongthap.png'),
(20, 'Tiền Giang - FM 96.2MHz', 'http://thtg.vn/live/radio/radiolive.m3u8', 'https://image.ibb.co/h6Tzk9/r_tiengiang.png'),
(21, 'Vĩnh Long', 'https://radiovn.herokuapp.com/vinhlong?id=2', 'https://image.ibb.co/gCgwXp/r_thvl_fm.png'),
(32, 'Hà Giang', 'http://radio.vtcplay.vn:1935/radio/HaGiang.stream/playlist.m3u8', 'https://image.ibb.co/hupiCp/r_hagiang.png');

-- --------------------------------------------------------

--
-- Table structure for table `channel_child`
--

CREATE TABLE `channel_child` (
  `id` int(11) NOT NULL,
  `channel` int(11) NOT NULL,
  `name` text NOT NULL,
  `stream` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `channel_child`
--

INSERT INTO `channel_child` (`id`, `channel`, `name`, `stream`) VALUES
(12, 19, 'huyện tháp mười', 'rtmp://amthanhvietvlc.ddns.net/livepkgr/'),
(13, 19, 'Huyện Cao Lãnh', 'rtmp://daihuyencaolanh.ddns.net:1935/live&file=radio&autostart=true');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `title` text NOT NULL,
  `content` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `privary` text NOT NULL,
  `default_stream` text NOT NULL,
  `default_stream_title` text NOT NULL,
  `default_stream_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`title`, `content`, `email`, `privary`, `default_stream`, `default_stream_title`, `default_stream_image`) VALUES
('Radio Việt Online', 'Phát Radio Online', 'admin@gmail.com', 'Ứng dụng Radio Việt là ứng dụng giúp khán thính giả có thể nghe được những kênh radio của tất cả các đài phát thanh tại Việt Nam thông qua mạng 3G/4G/Wi-Fi. Người dùng có thể sẽ phải trả một khoản phí cho việc sử dụng internet theo quy định của nhà cung cấp dịch vụ internet.Người dùng vui lòng sử dụng một đường truyền internet tốt để đảm bảo khi nghe radio trực tuyến không bị giật , ngắt quảng .Chúng tôi không trực tiếp phát sóng các kênh phát thanh, các kênh phát thanh được tổng hợp từ một số website trực tuyến của các đài phát thanh quốc gia và một số đài địa phương. Vì vậy tác giả không chịu trách nhiệm về nội dung và chất lượng phát của các kênh phát thanh.Các kênh phát thanh được tổng hợp từ nguồn trên internet, chúng tôi sẽ gỡ bỏ các kênh phát thanh ngay lập tức khi có yêu cầu, khiếu nại chính thức về bản quyền từ ban biên tập các đài phát thanh đó.', 'http://trungnhan.name.vn/waiting.mp3', 'Chọn kênh để phát', 'https://i.imgur.com/TOTvne1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel_child`
--
ALTER TABLE `channel_child`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `channel_child`
--
ALTER TABLE `channel_child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
