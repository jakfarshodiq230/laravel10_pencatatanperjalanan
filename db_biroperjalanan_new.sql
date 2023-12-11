-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Des 2023 pada 14.02
-- Versi server: 8.0.30
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_biroperjalanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_perjalanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `negara_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_tujuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_keberangkatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pulang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_perjalanan`, `negara_id`, `kota_tujuan`, `tgl_keberangkatan`, `tgl_pulang`, `created_at`, `updated_at`) VALUES
(1, 'list of passport delegation of the republic of indonesia to hiroshima, japan', 'JP', 'Hiroshima', '2023-11-01', '2023-11-03', NULL, NULL),
(2, 'Kunker ke malaysia', 'MY', 'kualalumpur', '2023-11-16', '2023-11-18', NULL, NULL),
(3, 'JALAN', 'AE', 'APA', '2023-12-08', '2023-12-08', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `maingroup`
--

CREATE TABLE `maingroup` (
  `passport_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kegiatan_id` bigint UNSIGNED NOT NULL,
  `negara_id` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tim_kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `maingroup`
--

INSERT INTO `maingroup` (`passport_id`, `kegiatan_id`, `negara_id`, `tim_kegiatan`, `created_at`, `updated_at`) VALUES
('2345', 1, 'JP', 'group', '2023-12-10 15:18:52', '2023-12-10 15:18:52'),
('D 0913201', 1, 'JP', 'group', '2023-11-16 10:13:04', '2023-11-16 10:13:04'),
('D 0913201', 2, 'MY', 'group', '2023-11-16 10:02:11', '2023-11-16 10:02:11'),
('D 40213', 1, 'JP', 'group', '2023-12-10 00:26:01', '2023-12-10 00:26:01'),
('D 40213', 2, 'MY', 'group', '2023-12-08 07:48:57', '2023-12-08 07:48:57'),
('D 890183290', 1, 'JP', 'group', '2023-12-10 00:22:37', '2023-12-10 00:22:37'),
('D 890183290', 2, 'MY', 'group', '2023-11-16 10:04:37', '2023-11-16 10:04:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_15_025407_create_negaras_table', 1),
(6, '2023_07_06_100131_create_pegawais_table', 1),
(7, '2023_07_16_094840_create_passports_table', 1),
(8, '2023_07_17_095854_create_kegiatans_table', 1),
(9, '2023_07_20_154229_create_personils_table', 1),
(10, '2023_09_21_041731_create_maingroups_table', 1),
(11, '2023_09_22_145522_create_visas_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `negara`
--

CREATE TABLE `negara` (
  `id_negara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_negara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ibukota_negara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `negara`
--

INSERT INTO `negara` (`id_negara`, `nama_negara`, `ibukota_negara`, `latitude`, `longitude`) VALUES
('AD', 'Andorra', 'Andorra la Vella', '42.5', '1.516667'),
('AE', 'United Arab Emirates', 'Abu Dhabi', '24.46666667', '54.366667'),
('AF', 'Afghanistan', 'Kabul', '34.51666667', '69.183333'),
('AG', 'Antigua and Barbuda', 'Saint John’s', '17.11666667', '-61.85'),
('AI', 'Anguilla', 'The Valley', '18.21666667', '-63.05'),
('AL', 'Albania', 'Tirana', '41.31666667', '19.816667'),
('AM', 'Armenia', 'Yerevan', '40.16666667', '44.5'),
('AO', 'Angola', 'Luanda', '-8.833333333', '13.216667'),
('AQ', 'Antarctica', 'N/A', '0', '0'),
('AR', 'Argentina', 'Buenos Aires', '-34.58333333', '-58.666667'),
('AS', 'American Samoa', 'Pago Pago', '-14.26666667', '-170.7'),
('AT', 'Austria', 'Vienna', '48.2', '16.366667'),
('AU', 'Australia', 'Canberra', '-35.26666667', '149.133333'),
('AW', 'Aruba', 'Oranjestad', '12.51666667', '-70.033333'),
('AX', 'Aland Islands', 'Mariehamn', '60.116667', '19.9'),
('AZ', 'Azerbaijan', 'Baku', '40.38333333', '49.866667'),
('BA', 'Bosnia and Herzegovina', 'Sarajevo', '43.86666667', '18.416667'),
('BB', 'Barbados', 'Bridgetown', '13.1', '-59.616667'),
('BD', 'Bangladesh', 'Dhaka', '23.71666667', '90.4'),
('BE', 'Belgium', 'Brussels', '50.83333333', '4.333333'),
('BF', 'Burkina Faso', 'Ouagadougou', '12.36666667', '-1.516667'),
('BG', 'Bulgaria', 'Sofia', '42.68333333', '23.316667'),
('BH', 'Bahrain', 'Manama', '26.23333333', '50.566667'),
('BI', 'Burundi', 'Bujumbura', '-3.366666667', '29.35'),
('BJ', 'Benin', 'Porto-Novo', '6.483333333', '2.616667'),
('BL', 'Saint Barthelemy', 'Gustavia', '17.88333333', '-62.85'),
('BM', 'Bermuda', 'Hamilton', '32.28333333', '-64.783333'),
('BN', 'Brunei Darussalam', 'Bandar Seri Begawan', '4.883333333', '114.933333'),
('BO', 'Bolivia', 'La Paz', '-16.5', '-68.15'),
('BR', 'Brazil', 'Brasilia', '-15.78333333', '-47.916667'),
('BS', 'Bahamas', 'Nassau', '25.08333333', '-77.35'),
('BT', 'Bhutan', 'Thimphu', '27.46666667', '89.633333'),
('BW', 'Botswana', 'Gaborone', '-24.63333333', '25.9'),
('BY', 'Belarus', 'Minsk', '53.9', '27.566667'),
('BZ', 'Belize', 'Belmopan', '17.25', '-88.766667'),
('CA', 'Canada', 'Ottawa', '45.41666667', '-75.7'),
('CC', 'Cocos Islands', 'West Island', '-12.16666667', '96.833333'),
('CD', 'Democratic Republic of the Congo', 'Kinshasa', '-4.316666667', '15.3'),
('CF', 'Central African Republic', 'Bangui', '4.366666667', '18.583333'),
('CG', 'Republic of Congo', 'Brazzaville', '-4.25', '15.283333'),
('CH', 'Switzerland', 'Bern', '46.91666667', '7.466667'),
('CI', 'Cote d’Ivoire', 'Yamoussoukro', '6.816666667', '-5.266667'),
('CK', 'Cook Islands', 'Avarua', '-21.2', '-159.766667'),
('CL', 'Chile', 'Santiago', '-33.45', '-70.666667'),
('CM', 'Cameroon', 'Yaounde', '3.866666667', '11.516667'),
('CN', 'China', 'Beijing', '39.91666667', '116.383333'),
('CO', 'Colombia', 'Bogota', '4.6', '-74.083333'),
('CR', 'Costa Rica', 'San Jose', '9.933333333', '-84.083333'),
('CU', 'Cuba', 'Havana', '23.11666667', '-82.35'),
('CV', 'Cape Verde', 'Praia', '14.91666667', '-23.516667'),
('CW', 'CuraÃ§ao', 'Willemstad', '12.1', '-68.916667'),
('CX', 'Christmas Island', 'The Settlement', '-10.41666667', '105.716667'),
('CY', 'Cyprus', 'Nicosia', '35.16666667', '33.366667'),
('CZ', 'Czech Republic', 'Prague', '50.08333333', '14.466667'),
('DE', 'Germany', 'Berlin', '52.51666667', '13.4'),
('DJ', 'Djibouti', 'Djibouti', '11.58333333', '43.15'),
('DK', 'Denmark', 'Copenhagen', '55.66666667', '12.583333'),
('DM', 'Dominica', 'Roseau', '15.3', '-61.4'),
('DO', 'Dominican Republic', 'Santo Domingo', '18.46666667', '-69.9'),
('DZ', 'Algeria', 'Algiers', '36.75', '3.05'),
('EC', 'Ecuador', 'Quito', '-0.216666667', '-78.5'),
('EE', 'Estonia', 'Tallinn', '59.43333333', '24.716667'),
('EG', 'Egypt', 'Cairo', '30.05', '31.25'),
('EH', 'Western Sahara', 'El-AaiÃºn', '27.153611', '-13.203333'),
('ER', 'Eritrea', 'Asmara', '15.33333333', '38.933333'),
('ES', 'Spain', 'Madrid', '40.4', '-3.683333'),
('ET', 'Ethiopia', 'Addis Ababa', '9.033333333', '38.7'),
('FI', 'Finland', 'Helsinki', '60.16666667', '24.933333'),
('FJ', 'Fiji', 'Suva', '-18.13333333', '178.416667'),
('FK', 'Falkland Islands', 'Stanley', '-51.7', '-57.85'),
('FM', 'Federated States of Micronesia', 'Palikir', '6.916666667', '158.15'),
('FO', 'Faroe Islands', 'Torshavn', '62', '-6.766667'),
('FR', 'France', 'Paris', '48.86666667', '2.333333'),
('GA', 'Gabon', 'Libreville', '0.383333333', '9.45'),
('GB', 'United Kingdom', 'London', '51.5', '-0.083333'),
('GD', 'Grenada', 'Saint George’s', '12.05', '-61.75'),
('GE', 'Georgia', 'Tbilisi', '41.68333333', '44.833333'),
('GG', 'Guernsey', 'Saint Peter Port', '49.45', '-2.533333'),
('GH', 'Ghana', 'Accra', '5.55', '-0.216667'),
('GI', 'Gibraltar', 'Gibraltar', '36.13333333', '-5.35'),
('GL', 'Greenland', 'Nuuk', '64.18333333', '-51.75'),
('GM', 'The Gambia', 'Banjul', '13.45', '-16.566667'),
('GN', 'Guinea', 'Conakry', '9.5', '-13.7'),
('GQ', 'Equatorial Guinea', 'Malabo', '3.75', '8.783333'),
('GR', 'Greece', 'Athens', '37.98333333', '23.733333'),
('GS', 'South Georgia and South Sandwich Islands', 'King Edward Point', '-54.283333', '-36.5'),
('GT', 'Guatemala', 'Guatemala City', '14.61666667', '-90.516667'),
('GU', 'Guam', 'Hagatna', '13.46666667', '144.733333'),
('GW', 'Guinea-Bissau', 'Bissau', '11.85', '-15.583333'),
('GY', 'Guyana', 'Georgetown', '6.8', '-58.15'),
('HK', 'Hong Kong', 'N/A', '0', '0'),
('HM', 'Heard Island and McDonald Islands', 'N/A', '0', '0'),
('HN', 'Honduras', 'Tegucigalpa', '14.1', '-87.216667'),
('HR', 'Croatia', 'Zagreb', '45.8', '16'),
('HT', 'Haiti', 'Port-au-Prince', '18.53333333', '-72.333333'),
('HU', 'Hungary', 'Budapest', '47.5', '19.083333'),
('ID', 'Indonesia', 'Jakarta', '-6.166666667', '106.816667'),
('IE', 'Ireland', 'Dublin', '53.31666667', '-6.233333'),
('IL', 'Israel', 'Jerusalem', '31.76666667', '35.233333'),
('IM', 'Isle of Man', 'Douglas', '54.15', '-4.483333'),
('IN', 'India', 'New Delhi', '28.6', '77.2'),
('IO', 'British Indian Ocean Territory', 'Diego Garcia', '-7.3', '72.4'),
('IQ', 'Iraq', 'Baghdad', '33.33333333', '44.4'),
('IR', 'Iran', 'Tehran', '35.7', '51.416667'),
('IS', 'Iceland', 'Reykjavik', '64.15', '-21.95'),
('IT', 'Italy', 'Rome', '41.9', '12.483333'),
('JE', 'Jersey', 'Saint Helier', '49.18333333', '-2.1'),
('JM', 'Jamaica', 'Kingston', '18', '-76.8'),
('JO', 'Jordan', 'Amman', '31.95', '35.933333'),
('JP', 'Japan', 'Tokyo', '35.68333333', '139.75'),
('KE', 'Kenya', 'Nairobi', '-1.283333333', '36.816667'),
('KG', 'Kyrgyzstan', 'Bishkek', '42.86666667', '74.6'),
('KH', 'Cambodia', 'Phnom Penh', '11.55', '104.916667'),
('KI', 'Kiribati', 'Tarawa', '-0.883333333', '169.533333'),
('KM', 'Comoros', 'Moroni', '-11.7', '43.233333'),
('KN', 'Saint Kitts and Nevis', 'Basseterre', '17.3', '-62.716667'),
('KO', 'Kosovo', 'Pristina', '42.66666667', '21.166667'),
('KP', 'North Korea', 'Pyongyang', '39.01666667', '125.75'),
('KR', 'South Korea', 'Seoul', '37.55', '126.983333'),
('KW', 'Kuwait', 'Kuwait City', '29.36666667', '47.966667'),
('KY', 'Cayman Islands', 'George Town', '19.3', '-81.383333'),
('KZ', 'Kazakhstan', 'Astana', '51.16666667', '71.416667'),
('LA', 'Laos', 'Vientiane', '17.96666667', '102.6'),
('LB', 'Lebanon', 'Beirut', '33.86666667', '35.5'),
('LC', 'Saint Lucia', 'Castries', '14', '-61'),
('LI', 'Liechtenstein', 'Vaduz', '47.13333333', '9.516667'),
('LK', 'Sri Lanka', 'Colombo', '6.916666667', '79.833333'),
('LR', 'Liberia', 'Monrovia', '6.3', '-10.8'),
('LS', 'Lesotho', 'Maseru', '-29.31666667', '27.483333'),
('LT', 'Lithuania', 'Vilnius', '54.68333333', '25.316667'),
('LU', 'Luxembourg', 'Luxembourg', '49.6', '6.116667'),
('LV', 'Latvia', 'Riga', '56.95', '24.1'),
('LY', 'Libya', 'Tripoli', '32.88333333', '13.166667'),
('MA', 'Morocco', 'Rabat', '34.01666667', '-6.816667'),
('MC', 'Monaco', 'Monaco', '43.73333333', '7.416667'),
('MD', 'Moldova', 'Chisinau', '47', '28.85'),
('ME', 'Montenegro', 'Podgorica', '42.43333333', '19.266667'),
('MF', 'Saint Martin', 'Marigot', '18.0731', '-63.0822'),
('MG', 'Madagascar', 'Antananarivo', '-18.91666667', '47.516667'),
('MH', 'Marshall Islands', 'Majuro', '7.1', '171.383333'),
('MK', 'Macedonia', 'Skopje', '42', '21.433333'),
('ML', 'Mali', 'Bamako', '12.65', '-8'),
('MM', 'Myanmar', 'Rangoon', '16.8', '96.15'),
('MN', 'Mongolia', 'Ulaanbaatar', '47.91666667', '106.916667'),
('MO', 'Macau', 'N/A', '0', '0'),
('MP', 'Northern Mariana Islands', 'Saipan', '15.2', '145.75'),
('MR', 'Mauritania', 'Nouakchott', '18.06666667', '-15.966667'),
('MS', 'Montserrat', 'Plymouth', '16.7', '-62.216667'),
('MT', 'Malta', 'Valletta', '35.88333333', '14.5'),
('MU', 'Mauritius', 'Port Louis', '-20.15', '57.483333'),
('MV', 'Maldives', 'Male', '4.166666667', '73.5'),
('MW', 'Malawi', 'Lilongwe', '-13.96666667', '33.783333'),
('MX', 'Mexico', 'Mexico City', '19.43333333', '-99.133333'),
('MY', 'Malaysia', 'Kuala Lumpur', '3.166666667', '101.7'),
('MZ', 'Mozambique', 'Maputo', '-25.95', '32.583333'),
('NA', 'Namibia', 'Windhoek', '-22.56666667', '17.083333'),
('NC', 'New Caledonia', 'Noumea', '-22.26666667', '166.45'),
('NE', 'Niger', 'Niamey', '13.51666667', '2.116667'),
('NF', 'Norfolk Island', 'Kingston', '-29.05', '167.966667'),
('NG', 'Nigeria', 'Abuja', '9.083333333', '7.533333'),
('NI', 'Nicaragua', 'Managua', '12.13333333', '-86.25'),
('NL', 'Netherlands', 'Amsterdam', '52.35', '4.916667'),
('NO', 'Norway', 'Oslo', '59.91666667', '10.75'),
('NP', 'Nepal', 'Kathmandu', '27.71666667', '85.316667'),
('NR', 'Nauru', 'Yaren', '-0.5477', '166.920867'),
('NU', 'Niue', 'Alofi', '-19.01666667', '-169.916667'),
('NY', 'Northern Cyprus', 'North Nicosia', '35.183333', '33.366667'),
('NZ', 'New Zealand', 'Wellington', '-41.3', '174.783333'),
('OM', 'Oman', 'Muscat', '23.61666667', '58.583333'),
('PA', 'Panama', 'Panama City', '8.966666667', '-79.533333'),
('PE', 'Peru', 'Lima', '-12.05', '-77.05'),
('PF', 'French Polynesia', 'Papeete', '-17.53333333', '-149.566667'),
('PG', 'Papua New Guinea', 'Port Moresby', '-9.45', '147.183333'),
('PH', 'Philippines', 'Manila', '14.6', '120.966667'),
('PK', 'Pakistan', 'Islamabad', '33.68333333', '73.05'),
('PL', 'Poland', 'Warsaw', '52.25', '21'),
('PM', 'Saint Pierre and Miquelon', 'Saint-Pierre', '46.76666667', '-56.183333'),
('PN', 'Pitcairn Islands', 'Adamstown', '-25.06666667', '-130.083333'),
('PR', 'Puerto Rico', 'San Juan', '18.46666667', '-66.116667'),
('PS', 'Palestine', 'Jerusalem', '31.76666667', '35.233333'),
('PT', 'Portugal', 'Lisbon', '38.71666667', '-9.133333'),
('PW', 'Palau', 'Melekeok', '7.483333333', '134.633333'),
('PY', 'Paraguay', 'Asuncion', '-25.26666667', '-57.666667'),
('QA', 'Qatar', 'Doha', '25.28333333', '51.533333'),
('RO', 'Romania', 'Bucharest', '44.43333333', '26.1'),
('RS', 'Serbia', 'Belgrade', '44.83333333', '20.5'),
('RU', 'Russia', 'Moscow', '55.75', '37.6'),
('RW', 'Rwanda', 'Kigali', '-1.95', '30.05'),
('SA', 'Saudi Arabia', 'Riyadh', '24.65', '46.7'),
('SB', 'Solomon Islands', 'Honiara', '-9.433333333', '159.95'),
('SC', 'Seychelles', 'Victoria', '-4.616666667', '55.45'),
('SD', 'Sudan', 'Khartoum', '15.6', '32.533333'),
('SE', 'Sweden', 'Stockholm', '59.33333333', '18.05'),
('SG', 'Singapore', 'Singapore', '1.283333333', '103.85'),
('SH', 'Saint Helena', 'Jamestown', '-15.93333333', '-5.716667'),
('SI', 'Slovenia', 'Ljubljana', '46.05', '14.516667'),
('SJ', 'Svalbard', 'Longyearbyen', '78.21666667', '15.633333'),
('SK', 'Slovakia', 'Bratislava', '48.15', '17.116667'),
('SL', 'Sierra Leone', 'Freetown', '8.483333333', '-13.233333'),
('SM', 'San Marino', 'San Marino', '43.93333333', '12.416667'),
('SN', 'Senegal', 'Dakar', '14.73333333', '-17.633333'),
('SO', 'Somalia', 'Mogadishu', '2.066666667', '45.333333'),
('SR', 'Suriname', 'Paramaribo', '5.833333333', '-55.166667'),
('SS', 'South Sudan', 'Juba', '4.85', '31.616667'),
('ST', 'Sao Tome and Principe', 'Sao Tome', '0.333333333', '6.733333'),
('SV', 'El Salvador', 'San Salvador', '13.7', '-89.2'),
('SX', 'Sint Maarten', 'Philipsburg', '18.01666667', '-63.033333'),
('SY', 'Syria', 'Damascus', '33.5', '36.3'),
('SZ', 'Swaziland', 'Mbabane', '-26.31666667', '31.133333'),
('TC', 'Turks and Caicos Islands', 'Grand Turk', '21.46666667', '-71.133333'),
('TD', 'Chad', 'N’Djamena', '12.1', '15.033333'),
('TF', 'French Southern and Antarctic Lands', 'Port-aux-FranÃ§ais', '-49.35', '70.216667'),
('TG', 'Togo', 'Lome', '6.116666667', '1.216667'),
('TH', 'Thailand', 'Bangkok', '13.75', '100.516667'),
('TJ', 'Tajikistan', 'Dushanbe', '38.55', '68.766667'),
('TK', 'Tokelau', 'Atafu', '-9.166667', '-171.833333'),
('TL', 'Timor-Leste', 'Dili', '-8.583333333', '125.6'),
('TM', 'Turkmenistan', 'Ashgabat', '37.95', '58.383333'),
('TN', 'Tunisia', 'Tunis', '36.8', '10.183333'),
('TO', 'Tonga', 'Nuku’alofa', '-21.13333333', '-175.2'),
('TR', 'Turkey', 'Ankara', '39.93333333', '32.866667'),
('TT', 'Trinidad and Tobago', 'Port of Spain', '10.65', '-61.516667'),
('TV', 'Tuvalu', 'Funafuti', '-8.516666667', '179.216667'),
('TW', 'Taiwan', 'Taipei', '25.03333333', '121.516667'),
('TZ', 'Tanzania', 'Dar es Salaam', '-6.8', '39.283333'),
('UA', 'Ukraine', 'Kyiv', '50.43333333', '30.516667'),
('UG', 'Uganda', 'Kampala', '0.316666667', '32.55'),
('UM', 'US Minor Outlying Islands', 'Washington, D.C.', '38.883333', '-77'),
('US', 'United States', 'Washington, D.C.', '38.883333', '-77'),
('UY', 'Uruguay', 'Montevideo', '-34.85', '-56.166667'),
('UZ', 'Uzbekistan', 'Tashkent', '41.31666667', '69.25'),
('VA', 'Vatican City', 'Vatican City', '41.9', '12.45'),
('VC', 'Saint Vincent and the Grenadines', 'Kingstown', '13.13333333', '-61.216667'),
('VE', 'Venezuela', 'Caracas', '10.48333333', '-66.866667'),
('VG', 'British Virgin Islands', 'Road Town', '18.41666667', '-64.616667'),
('VI', 'US Virgin Islands', 'Charlotte Amalie', '18.35', '-64.933333'),
('VN', 'Vietnam', 'Hanoi', '21.03333333', '105.85'),
('VU', 'Vanuatu', 'Port-Vila', '-17.73333333', '168.316667'),
('WF', 'Wallis and Futuna', 'Mata-Utu', '-13.95', '-171.933333'),
('WS', 'Samoa', 'Apia', '-13.81666667', '-171.766667'),
('YE', 'Yemen', 'Sanaa', '15.35', '44.2'),
('ZA', 'South Africa', 'Pretoria', '-25.7', '28.216667'),
('ZM', 'Zambia', 'Lusaka', '-15.41666667', '28.283333'),
('ZW', 'Zimbabwe', 'Harare', '-17.81666667', '31.033333');

-- --------------------------------------------------------

--
-- Struktur dari tabel `passport`
--

CREATE TABLE `passport` (
  `no_passport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pegawai_nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `scan_passport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pembuatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_berlaku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `passport`
--

INSERT INTO `passport` (`no_passport`, `pegawai_nip`, `scan_passport`, `tgl_pembuatan`, `tgl_berlaku`, `created_at`, `updated_at`) VALUES
('2345', '345', 'Scan-Passport/VJEb258hEyA6OVfkSGTtD3fuyGCJgnJ15dcLyKAf.jpg', '2023-12-10', '2023-12-10', NULL, NULL),
('D 0913201', '09123901273', 'Scan-Passport/L8GWeNAaBgzNm8FPcwSAqU2HT4ibciDAgHhOdul6.webp', '2023-11-18', '2023-11-18', NULL, NULL),
('D 40213', '09123908912', 'Scan-Passport/8k0yzDzxi8kbDtHUOQ4MqcyMsd5bZbF6K9PL2JJA.jpg', '2023-11-15', '2023-11-17', NULL, NULL),
('D 890183290', '091239172309', 'Scan-Passport/P4SYQvbWuWEdMmWvVIo87xZGLWjBLYZrjQ943Wk1.jpg', '2023-11-16', '2028-10-16', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `scan_kk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `scan_ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan_darah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_perkawinan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `foto`, `nik`, `scan_kk`, `scan_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `golongan_darah`, `alamat`, `agama`, `status_perkawinan`, `pekerjaan`, `no_hp`, `kewarganegaraan`, `created_at`, `updated_at`) VALUES
('09123901273', 'Andi', '4', '140192190238', '4', '4', 'Jakarta', '1998-07-21', 'Laki - Laki', 'A', 'Pekanbaru', 'Islam', 'Belum Kawin', 'Mahasiswa', '08231298104', 'WNI', NULL, NULL),
('09123908912', 'Dzaky', '2', '109823012', '2', '2', 'Pekanbaru', '2000-10-09', 'Laki - Laki', 'O', 'Pekanbaru', 'Islam', 'Belum Kawin', 'Mahasiswa', '0832191023', 'WNI', NULL, NULL),
('091239172309', 'Anto', '5', '14011240824', '5', '5', 'Surabaya', '1999-03-29', 'Laki - Laki', 'O', 'Jakarta', 'Islam', 'Belum Kawin', 'Mahasiswa', '08231298104', 'WNI', NULL, NULL),
('1029381203', 'Luki', '1', '14014108742190', '1', '1', 'Jakarta', '1999-09-01', 'Laki - Laki', 'O', 'Pekanbaru', 'Islam', 'Belum Kawin', 'Mahasiswa', '08231298104', 'WNI', NULL, NULL),
('345', 'ert', 'Foto-Pegawai/foto_2023-12-10.jpg', '34567', 'Scan-KK/ejQU6ADX8pQQMYnQgRkE84KhoV0KUf0Cz0hKUt67.jpg', 'Scan-KTP/gloWsT9So7Ur3m1zlwH8g2el5wlLRtFCJGQ4fJv6.jpg', 'r', '2023-12-09', 'Laki-Laki', 'A', 'r', 'Islam', 'Belum Kawin', 'a', '0812-6862-7460', 'WNI', NULL, NULL),
('3454888912', 'Ifni Wilda,SST,M.KM', 'Foto-Pegawai/foto_2023-12-10_3454888912.png', '1234567890', 'Scan-KK/vWUAD7A8m7Ky7kexYyOSgzf09vLLGvhIXlnnO7U3.png', 'Scan-KTP/GraTDWVWPQAxdpEsWBlqujRVl5Um0YwHK1lLfSMC.png', 'aaaaaaaaaa', '2023-12-11', 'Perempuan', 'B', 'Jalan tukiman', 'Kristen Katholik', 'Belum Kawin', 'a', '0812-6862-7460', 'WNI', '2023-12-10 16:27:48', '2023-12-10 16:27:48'),
('90238102938', 'Rislan', '3', '0192832737', '3', '3', 'Taluk', '2004-05-08', 'A', 'AB', 'Pekanbaru', 'Islam', 'Belum Kawin', 'Mahasiswa', '08128037123', 'WNI', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personil`
--

CREATE TABLE `personil` (
  `passport_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kegiatan_id` bigint UNSIGNED NOT NULL,
  `negara_id` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tim_kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `personil`
--

INSERT INTO `personil` (`passport_id`, `kegiatan_id`, `negara_id`, `tim_kegiatan`, `created_at`, `updated_at`) VALUES
('2345', 3, 'AE', 'advance', '2023-12-10 03:45:35', '2023-12-10 03:45:35'),
('D 0913201', 1, 'JP', 'advance', '2023-11-16 10:14:39', '2023-11-16 10:14:39'),
('D 0913201', 2, 'MY', 'advance', '2023-11-16 10:03:49', '2023-11-16 10:03:49'),
('D 40213', 1, 'JP', 'advance', '2023-12-11 07:01:52', '2023-12-11 07:01:52'),
('D 40213', 2, 'MY', 'advance', '2023-11-16 10:05:34', '2023-11-16 10:05:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dzaky', 'dzaky@gmail.com', NULL, '$2y$10$WFs1.cUkJO.HkTj.KtpgFOHeMM0fdWGetY.250B1gPziZYJ7hvC0y', NULL, '2023-11-14 21:17:35', '2023-11-14 21:17:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visa`
--

CREATE TABLE `visa` (
  `id` bigint UNSIGNED NOT NULL,
  `negara_id` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `scan_visa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `scan_exitpermit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `scan_vaksin` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tim_kegiatan_visa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `visa`
--

INSERT INTO `visa` (`id`, `negara_id`, `scan_visa`, `scan_exitpermit`, `scan_vaksin`, `passport_id`, `id_kegiatan`, `tim_kegiatan_visa`, `created_at`, `updated_at`) VALUES
(20, 'JP', 'Scan-Visa/visa_2023-12-11-00-42-06_.png', 'Scan-ExitPermit/exitPermit_2023-12-11-00-43-48_.png', 'Scan-Vaksin/vaksin_2023-12-11-00-44-07_.png', '2345', '1', 'group', '2023-12-10 16:58:15', '2023-12-10 17:44:07'),
(21, 'JP', 'Scan-Visa/visa_2023-12-11-13-50-23_.png', 'Scan-ExitPermit/exitPermit_2023-12-11-13-42-36_.png', 'Scan-Vaksin/vaksin_2023-12-11-13-50-41_.png', 'D 0913201', '1', 'group', '2023-12-10 17:05:01', '2023-12-11 06:50:41'),
(22, 'JP', 'Scan-Visa/visa_2023-12-11-14-01-29_.png', 'Scan-ExitPermit/exitPermit_2023-12-11-14-01-42_.png', 'Scan-Vaksin/vaksin_2023-12-11-14-01-29_.png', 'D 0913201', '1', 'advance', '2023-12-11 06:40:30', '2023-12-11 07:01:42'),
(23, 'JP', 'Scan-Visa/visa_2023-12-11-14-02-11_.png', 'Scan-ExitPermit/exitPermit_2023-12-11-14-02-11_.png', 'Scan-Vaksin/vaksin_2023-12-11-14-02-11_.png', 'D 40213', '1', 'advance', '2023-12-11 07:02:11', '2023-12-11 07:02:11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatan_negara_id_foreign` (`negara_id`);

--
-- Indeks untuk tabel `maingroup`
--
ALTER TABLE `maingroup`
  ADD PRIMARY KEY (`passport_id`,`kegiatan_id`),
  ADD KEY `maingroup_kegiatan_id_foreign` (`kegiatan_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id_negara`);

--
-- Indeks untuk tabel `passport`
--
ALTER TABLE `passport`
  ADD PRIMARY KEY (`no_passport`),
  ADD KEY `passport_pegawai_nip_foreign` (`pegawai_nip`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `personil`
--
ALTER TABLE `personil`
  ADD PRIMARY KEY (`passport_id`,`kegiatan_id`),
  ADD KEY `personil_kegiatan_id_foreign` (`kegiatan_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `visa`
--
ALTER TABLE `visa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visa_passport_id_foreign` (`passport_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `visa`
--
ALTER TABLE `visa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_negara_id_foreign` FOREIGN KEY (`negara_id`) REFERENCES `negara` (`id_negara`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `maingroup`
--
ALTER TABLE `maingroup`
  ADD CONSTRAINT `maingroup_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maingroup_passport_id_foreign` FOREIGN KEY (`passport_id`) REFERENCES `passport` (`no_passport`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `passport`
--
ALTER TABLE `passport`
  ADD CONSTRAINT `passport_pegawai_nip_foreign` FOREIGN KEY (`pegawai_nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `personil`
--
ALTER TABLE `personil`
  ADD CONSTRAINT `personil_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personil_passport_id_foreign` FOREIGN KEY (`passport_id`) REFERENCES `passport` (`no_passport`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `visa`
--
ALTER TABLE `visa`
  ADD CONSTRAINT `visa_passport_id_foreign` FOREIGN KEY (`passport_id`) REFERENCES `passport` (`no_passport`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
