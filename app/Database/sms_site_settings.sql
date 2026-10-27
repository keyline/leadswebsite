-- Restore only the missing settings table from keyline1_leadsdev.sql.
-- Unindexed VARCHAR columns use TEXT to avoid InnoDB row size error 1118.
SET NAMES utf8mb4;
CREATE TABLE `sms_site_settings` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `site_name` longtext NOT NULL,
  `site_description` longtext NOT NULL,
  `site_logo` text NOT NULL,
  `site_footer_logo` text DEFAULT NULL,
  `site_favicon` text NOT NULL,
  `site_email` text NOT NULL,
  `admin_email` text NOT NULL,
  `site_address` text NOT NULL,
  `site_phone` text NOT NULL,
  `whatsapp_no` text NOT NULL,
  `site_state_code` text NOT NULL,
  `site_gstn` text NOT NULL,
  `site_pan` text NOT NULL,
  `from_email` text NOT NULL,
  `from_name` text NOT NULL,
  `smtp_host` text NOT NULL,
  `smtp_username` text NOT NULL,
  `smtp_password` text NOT NULL,
  `smtp_port` text NOT NULL,
  `facebook_link` text NOT NULL,
  `twitter_link` text NOT NULL,
  `linkedin_link` text NOT NULL,
  `instagram_link` text NOT NULL,
  `youtube_link` text NOT NULL,
  `pinterest_link` text DEFAULT NULL,
  `establish_year` int(11) NOT NULL,
  `site_url` text NOT NULL,
  `site_video` text DEFAULT NULL,
  `about_us` longtext NOT NULL,
  `location` longtext NOT NULL,
  `timings` longtext NOT NULL,
  `bank_name` text DEFAULT NULL,
  `bank_branch` text DEFAULT NULL,
  `account_no` text DEFAULT NULL,
  `bank_ifsc` text DEFAULT NULL,
  `created` text NOT NULL,
  `modified` text NOT NULL,
  `published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

INSERT INTO `sms_site_settings` (`site_id`, `site_name`, `site_description`, `site_logo`, `site_footer_logo`, `site_favicon`, `site_email`, `admin_email`, `site_address`, `site_phone`, `whatsapp_no`, `site_state_code`, `site_gstn`, `site_pan`, `from_email`, `from_name`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_port`, `facebook_link`, `twitter_link`, `linkedin_link`, `instagram_link`, `youtube_link`, `pinterest_link`, `establish_year`, `site_url`, `site_video`, `about_us`, `location`, `timings`, `bank_name`, `bank_branch`, `account_no`, `bank_ifsc`, `created`, `modified`, `published`) VALUES
(1, 'Leads Overseas', '', '1729856852logo.png', '', '1729856915logo.png', 'deblina@keylines.net', 'leadsindia.net@gmail.com', '124 A Rashbehari Avenue,<br>Kolkata –700029, india', '', '  +91 95640 14111, +91 94340 56065', '', '', '', 'website@victoria.keylines.net.in', 'Victoria Travels', 'deblina@keylines.net', 'website@victoria.keylines.net.in', 'Password', '465', 'https://www.facebook.com/', '', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', '', 1942, 'https://pledge.ecoex.market/', '', '', '', '', '', '', '', '', '2020-06-08', '2021-02-20', 1);
