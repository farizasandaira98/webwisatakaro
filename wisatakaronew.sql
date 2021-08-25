-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 03:35 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisatakaronew`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Benhur', 'benhur@gmail.com', '$2y$10$Blr4zKRwe4ynYtZsEJE0C./KF/TYTMpoLRsu6CillQWiKYIy20B0y', NULL, '2021-06-28 07:30:08', '2021-06-28 07:30:08'),
(3, 'Muh Fariza', 'admin@gmail.com', '$2y$10$clUmfvcNXNoGP/pWgaQbAOwbmQgv7oRU1NuJ6ZolnHcuS7HziI3Qa', NULL, '2021-07-22 19:43:35', '2021-07-22 19:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggaltourberangkat` date NOT NULL,
  `tanggaltourbalik` date NOT NULL,
  `batasbayar` datetime NOT NULL DEFAULT current_timestamp(),
  `haritour` int(1) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` bigint(15) NOT NULL,
  `lokasi_jemput` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `idtour` bigint(20) UNSIGNED NOT NULL,
  `status_bayar` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalbayar` bigint(20) NOT NULL,
  `idsopir` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `destinasis`
--

CREATE TABLE `destinasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namadestinasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasidestinasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambardestinasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinasis`
--

INSERT INTO `destinasis` (`id`, `namadestinasi`, `lokasidestinasi`, `deskripsi`, `gambardestinasi`, `created_at`, `updated_at`) VALUES
(5, 'Taman Lumbini', 'Desa basam, Berastagi, kabupaten Karo, Sumatera Utara', 'Taman Alam Lumbini ini memiliki daya tarik sendiri bagi wisatawan. Menariknya, pagoda ini termasuk dalam golongan pagoda tertinggi di Indonesia dan sudah masuk ke dalam rekor MURI, replika tertinggi kedua di Asia Tenggara.\r\n\r\nWisata ini berlokasi di Desa Tongkoh, Kecamatan Dolat Rayat, Kabupaten Karo.\r\nMeski dinamakan taman alam namun objek wisata terbesar ialah sebuah Vihara yang besar dan megah sebagai tempat ibadah penganut Budha. Tiap akhir pekan, tempat ini selalu ramai pengunjung karena lokasinya sangat indah dan menawan. Arsitek bangunan juga mirip dengan kuil yang ada di Thailand. Baik bentuk dan warna catnya sangat mirip sekali. Bahkan ada pagoda emas yang nempel di atas vihara. Sungguh sangat indah.\r\n\r\nTidak heran jika pengunjung yang datang akan selalu menyempatkan diri berfoto di Taman Alam Lumbini. Nuansa dan harmoni yang tercipta memang sangat luar biasa. Tiket masuk ke vihara sebesar Rp. 5.000,- per orang. Sedangkan biaya parkir mobil Rp. 5.000,- dan motor Rp. 3.000,- Jika Anda hanya menikmati taman yang ada di vihara maka tidak dikenakan biaya.', 'Taman Lumbini.jpg', '2021-07-01 07:35:55', '2021-08-18 23:54:35'),
(6, 'Gunung sibayak', 'Berastagi, kabupaten Karo, Sumatera Utara', 'Gunung Sibayak adalah sebuah gunung di Kabupaten Karo, Sumatra Utara. Orang suku Karo menyebut gunung Sibayak dengan sebutuan \"gunung Raja\". Gunung Sibayak merupakan gunung berapi dan meletus terakhir tahun 1881. Gunung ini berada di sekitar 50 kilometer barat daya Kota Medan. Sekarang Gunung Sibayak banyak dikunjungi karena akses menuju gunung sibayak banyak mulai Sibayak 1 dan Sibayak 2. \r\n\r\n Gunung Sibayak. Gunung dengan ketinggian mencapai 2.172 mdpl ini juga merupakan gunung berapi aktif. Namun, berbeda dengan Gunung Sinabung, destinasi tempat wisata di Karo ini masih aman untuk kamu daki. \r\n\r\nJalur pendakian objek wisata di Karo satu ini memungkinkanmu menjelajahi belantara tropis yang sangat eksostis sekaligus menantang. Sesampainya di puncak, kamu bisa melihat langsung kawah yang masih aktif serta berkemah di dataran sembari menunggu indahnya pemandangan matahari terbit. Dari Gunung Sibayak kamu juga bisa melihat kemegahan Gunung Sinabung dari kejauhan.', 'Gunung sibayak.jpeg', '2021-07-01 07:41:09', '2021-08-16 21:10:40'),
(8, 'Gundaling', '~Berastagi~', 'Bukit ini menjadi tujuan favorit bagi wisatawan yang mengunjungi Berastagi untuk melihat panorama alamnya, khususnya Gunung Sibayak dan Gunung Sinabung dari bukit tertinggi. Berjalan kaki sambil menyusuri puncak bukit Gundaling sungguh menyenangkan dan memberi sensasi tersendiri bagi wisatawan. Sebab, dari bukit yang banyak ditumbuhi pohon pinus ini, wisatawan bisa melihat keindahan alam sambil menikmati udara Berastagi yang menyegarkan.\r\n\r\nSelain pepohonan rindang, ada juga bunga-bunga indah serta patung manusia yang mengenakan pakaian adat khas suku Batak Karo. Jika lelah menyusuri bukit, wisatawan bisa duduk bersantai di tempat yang telah disediakan, ada bangku dan bebatuan besar yang bisa diduduki. Jika dianggap masih kurang santai, Anda dapat menyewa tikar dan tenda untuk melindungi embusan angin yang terkadang cukup kencang. Boru Ginting, pemilik tempat sewa tikar menuturkan pengunjung yang menyewa tempat, biasanya yang membawa bekal makanan yang disiapkan dari rumah untuk dimakan bersama-sama dipuncak bukit Gundaling.', 'Gundaling.jpg', '2021-07-20 15:40:45', '2021-08-16 21:22:28'),
(9, 'Danau Lau Kawar', 'Kuta Gugung, Naman Teran, Kabupaten Karo', 'Danau Lau Kawar adalah wisata  Sumatera Utara selain dari Danau Toba. Lokasi Danau Lau Kawar berada di kaki Gunung Sinabung, sehingga menjadi paduan keindahan alam yang eksotis. Danau Lau Kawar karena letaknya di Kaki Gunung Sinabung, maka selain menawarkan pesona keindahan danau vulkanik, namun di sisi lain status Gunung Sinabung sebagai gunung yang aktif menjadi sedikit persoalan.\r\nErupsi terbaru dari Gunung Sinabung terjadi di awal tahun 2021, tepatnya tanggal 03 Januari 2021. Dan kejadian tersebut sangat berdampak bagi daerah sekitar Gunung Sinabung, termasuk Danau Lau Kawar. Meskipun demikian, pesona Danau Lau Kawar terlalu memikat hati para wisatawan. Sehingga kunjungan ke lokasi Danau Lau Kawar tidak pernah surut, terutama kaula muda.\r\n\r\nDanau ini memiliki luas lebih kurang 200 Ha diapit oleh alam pegunungan yang ditumbuhi kayu–kayuan hutan tropis dan dipinggir danau terbentang lahan seluas 3 Ha sebagai lokasi tempat berkemah. Bagi wisatawan yang berjiwa petualangan, dari obyek ini dapat melakukan kegiatan panjat tebing dan sekaligus pendakian ke puncak Gunung Sinabung melewati hutan belantara. Jarak dari Kota Berastagi ke obyek wisata ini 27 Km dan dapat menggunakan kenderaan roda empat melewati beberapa desa dan lahan pertanian .', 'Danau Lau Kawar.jfif', '2021-07-20 15:54:48', '2021-07-20 15:54:48'),
(10, 'Air terjun si piso piso', 'Desa Tongging, Pengambaten, Merek, kabupaten Karo', 'Air Terjun ini merupakan salah satu objek wisata andalan Propinsi Sumatera Utara. Dan salah satu air terjun tertinggi di Indonesia dengan ketinggian 120 meter. Terletak di Desa Tongging, Kecamatan Merek, Kabupaten Karo, Sumatera Utara., bentang alam yang mengelilingi objek wisata di Karo satu ini juga sangat mempesona dengan hamparan persawahan, lembah dan hijau, dan perbukitan yang menawan. \r\n\r\nAir terjun Sipiso-piso berada di bibir kaldera raksasa Danau Toba serta terbentuk pada aliran Sungai Pajanabolon yang merupakan salah satu sungai menyuplai air ke Danau Toba. Mengunjungi destinasi wisata di Karo satu ini, dijamin kamu takkan berhenti dibuat berdecak kagum akan keindahan alam yang ditawarkannya. \r\n\r\n Wisata ini berada di sekitar pemukiman dan dikelilingi hutan pinus. Jika ingin menuju ke sini, Teman Traveler yang menempuh perjalanan dari Medan, harus menuju menuju ke Kabanjahe. Setelah sampai di sana, Teman Traveler melanjutkan perjalanan ke utara sekitar 24 km menuju Desa Tongging.\r\n\r\nSetelah sampai di pintu masuk, Teman Traveler harus berjalan kaki dan menuruni ratusan anak tangga. Tapi jangan khawatir, pemandangan yang menakjubkan selama turun akan membuat Teman Traveler puas. Selain itu, bagi yang tidak kuat untuk turun ke bawah, Teman Traveler bisa menikmati pemandangan air terjun ini dari pos pengamatan yang letaknya tidak jauh dari pintu masuk.', 'Air terjun si piso piso.jpg', '2021-08-08 12:51:39', '2021-08-16 21:11:36'),
(11, 'Bukit kubu berastagi', 'jl. Letjen jamin Ginting, Gundaling II, Berastagi, Sempajaya, Kec. Berastagi, Kabupaten Karo', 'Untuk kamu yang ingin mencari wahana rekreasi untuk bersantai bersama keluarga, Bukit Kubu bisa jadi pilihan yang pas. Objek wisata di Karo satu ini sendiri sebenarnya merupakan bagian dari kawasan sebuah hotel tua di Karo. Namun, tak perlu khawatir karena kamu tak perlu menginap di hotel ini untuk bisa bermain-main di bukit Kubu. Cukup bayar tiket masuk saja kamu bisa bermain sepuasnya di bukit dengan hamparan padang rumput yang luas ini.\r\n\r\nAktivitas favorit di destinasi wisata Karo ini adalah bermain layang-layang. Kamu bisa menemukan layangan yang dijual di tempat ini. Selain itu, kamu juga bisa piknik bersama keluarga ataupun berkuda di kawasan tempat wisata di Karo satu ini.\r\n\r\nDengan lapangan hijau luas dan udara yang sejuk, taman rekreasi ini menjadi surganya pemain layang-layang. Layang-layang merupakan bagian dari paket yang didapatkan wisatawan pada saat membayar tiket masuk. Luasnya area, memungkinkan wisatawan leluasa melakukan permainan fisik yang menyenangkan ini.\r\n\r\nHembusan angin dengan kecepatan ideal membuat wisatawan dapat berlama-lama menerbangkan layang-layang. Tanpa harus menunggu angin bertiup kencang, layang-layang dapat melambung ke udara. Berbagai motif pun tersedia sebagai pilihan yang akan mewarnai kemeriahan udara kawasan wisata.', 'Bukit kubu berastagi.jpg', '2021-08-08 12:52:07', '2021-08-16 21:12:50'),
(12, 'Desa budaya lingga', 'Desa Lingga, Kecamatan Simpang Empat, Kabupaten Karo', 'Lingga adalah salah satu desa yang menjadi daerah tujuan wisata di Kabupaten Karo Sumatra Utara yang terletak di ketinggian sekitar 1.200 m dari permukaan laut, lebih kurang 15 km dari Brastagi dan 5 km dari Kota Kabanjahe ibu kabupaten Karo. Lingga merupakan perkampungan Karo yang unik, memiliki rumah-rumah adat yang diperkirakan berumur 250 tahun atau lebih kurang, tetapi kondisinya masih kokoh. Rumah tersebut dihuni oleh 8 keluarga yang masih memiliki hubungan kekerabatan. Rumah adat Karo ini tidak memiliki ruangan yang dipisahkan oleh pembatas berupa dinding kayu atau lainnya.\r\n	\r\nDesa Lingga memiliki bangunan tradisional seperti: rumah adat, jambur, geriten, lesung, sapo page (sapo ganjang)dan museum karo. Geriten, digunakan sebagai tempat penyimpanan kerangka jenazah keluarga atau nenek (leluhur)sang pemilik. Rumah adat karo mempunyai ciri serta bentuk yang sangat khusus, didalamnya terdapat ruangan yang besar dan tidak mempunyai kamar-kamar. Satu rumah dihuni 8 atau 10 keluarga. Rumah adat berupa rumah panggung, tingginya kira-kira 2 meter dari tanah yang ditopang oleh tiang, umumnya berjumlah 16 buah dari kayu ukuran besar. Kolong rumah sering dimanfaatkan sebagai tempat menyimpan kayu dan sebagai kandang ternak. Rumah ini mempunyai dua buah pintu, satu menghadap ke barat dan satu lagi menghadap ke sebelah timur. Di depan masing-masing pintu terdapat serambi, dibuat dari bambu-bambu bulat (disebut ture). Ture ini digunakan untuk tempat bertenun, mengayam tikar atau pekerjaan lainnya, pada malam hari ture atau serambi ini berfungsi sebagai tempat naki-naki atau tempat perkenalan para pemuda dan pemudi untuk memadu kasih. Atap rumah dibuat dari ijuk. Pada kedua ujung atapnya terdapat anyaman bambu berbentuk segitiga, disebut ayo-ayo. Pada puncak ayo-ayo terdapat tanduk atau kepala kerbau dengan posisi menunduk ke bawah.', 'Desa budaya lingga.jpg', '2021-08-08 12:52:21', '2021-08-16 21:13:52'),
(13, 'Air terjun sikulikap', 'Jamin Ginting KM 5,4 Desa Doulu, Kec. Berastagi, Martelu, Kabupaten Karo, Sumatera Utara.', 'Letak air terjun ini yang berada di perbatan kabupaten karo dengan kabupaten deliserdang, namun air terjun sikulikap ini masih berada pada lokasi kabupaten karo, di tengah hutan hujan tropis membuat pemandangan di sekitar terlihat sangat alami, banyak pepohonan yang tumbuh tinggi menjulang, menjadikan udara terasa sejuk dan bersih. Obyek wisata Air Terjun Sikulikap mempunyai ketinggian sekitar kurang lebih 30 meter dan aliran airnya bersumber dari Taman Hutan Rakyat (Tahura) Bukit Barisan yang termasuk kedalam salah satu daerah kawasan hutan lindung. Air yang jatuh dari atas melewati bebatuan yang berlumut terlihat sangat indah, belum lagi suara airnya yang membuat suasana semakin nyaman. Di sekitar area ini anda juga bisa menemukan Kawasan Ekosistem Leuser dan tidak hanya itu, ada banyak monyet gibon yang berkeliaran. Namun karena derasnya aliran air terjun ini, pengunjung tidak disarankan untuk mandi di sana.', 'Air terjun sikulikap.jpg', '2021-08-08 12:52:40', '2021-08-16 21:15:30'),
(14, 'Pemandian air panas (Sidebuk-debuk)', 'Desa Doulu, kecamatan berastagi, kabupaten karo', 'pemandian Air Panas di Berastagi sudah ada kurang lebih tahun 1990-1998. Di kawasan tersebut, terdapat puluhan tempat Pemandian Air Panas yang buka setiap hari selama 24 jam. Untuk memasuki kawasan tersebut, para wisatawan dikutip uang distribusi senilai Rp 5000 perorang. Kemudian, untuk biaya masuk ke dalam tempat Pemandian Air Panas dikutip bayaran senilai Rp 10.000 per orang.\r\n	\r\nMasing-masing tempat Pemandian Air Panas di kawasan tersebut, menyediakan belasan kolam Pemandian Air Panas. Air panas yang dikolam merupakan mata air belerang dari kaki Gunung Sibayak. Oleh sebab itu, setiap wisatawan mandi di kolam Pemandian Air Panas tersebut, badan para wisatawan melekat dengan bau belerang.\r\n\r\nNamun, konon katanya air tersebut merupakan obat untuk penyakit kulit, seperti, penyakit kulit alergi atau gatal-gatal. Selain menjadi obat bagi kulit dan membersihkan kulit. Air belerang dengan suhu yang panas juga bisa menghangatkan badan wisatwan dari dinginya udara malam di Berastagi.\r\n\r\nUntuk wisatawan yang ingi menginap, di kawasan tersebut juga banyak tempat menginap seperti motel-motel kecil. Mulai dari hargai Rp 150 ribuan sampai Rp 250 ribuan. Kemudian, wisatawan juga bisa membeli baju hangat serta merchandise Berastagi. Untuk akses jalan menuju ke kawasan Pemandian Air Panas ini, bisa ditempuh dengan kendaraan pribadi seperti mobil dan sepeda motor dan angkutan umum. Untuk angkutan umum seperti, Sinabung, Sutra dan angkutan umum Murni, setelah itu berjalan beberapa kilo meter ke dalam kawasan tersebut. Banyak ditemui wisatawan di hari libur berjalan kaki dari simpang masuk kawasan Pemandian Air Panas.', 'Pemandian air panas (Sidebuk-debuk).jpg', '2021-08-08 12:52:55', '2021-08-16 21:16:23'),
(15, 'Funland Mikie Holiday', 'Jl. Jamin Ginting, Sempajaya, Kec. Berastagi, Kabupaten Karo, Sumatera Utara', 'Funland Mikie Holiday berada di kawasan Berastagi, Sumatra Utara. Di dalamnya terdapat lebih dari 40 wahana menarik yang siap menghibur semua anggota keluarga, mulai dari anak-anak hingga dewasa. Dibangun di kawasan dataran tinggi, udara di sekitarnya begitu menyegarkan. Bagus untuk pernafasan dan membuat tubuh semakin rileks. Selain itu pemandangan di sekitarnya juga sangat memanjakan mata.\r\n\r\nTaman hiburan keluarga satu ini dibangun dengan konsep ala negeri dongeng. Di dalamnya terdapat banyak patung yang menggambarkan karakter tokoh kartun terkenal. Tentunya semakin menambah daya tarik tempat ini, terutama untuk anak-anak maupun remaja.\r\n\r\nFunland Mikie Holiday memiliki kurang lebih 40 wahana yang siap menghibur pengunjung dari segala macam lapisan usia. Sobat traveler yang mengajak buah hati, adik, maupun kemenakan ke sini tak perlu khawatir. Hampir separuh wahana di taman hiburan ini aman diikuti atau dimainkan anak-anak usia 1,5 sampai lima tahun.\r\n\r\nBeberapa wahana seperti Butterfly, Happy Journey, dan Grasshopper memang sengaja dirancang agar orang tua bisa bersantai bersama buah hati. Sementara bagi mereka yang menyukai tantangan atau tertarik berbasah-basah ria, bisa mencoba The Scream maupun Sea Battle. Ada pula wahana ekstrem yang benar-benar menguras adrenalin seperti T Rex dan Tsunami.  Lokasinya tak terlalu jauh dari pusat kota Medan, bisa dijangkau menggunakan kendaraan umum, mobil, maupun sepeda motor pribadi. Perjalanan hanya akan memakan waktu antara 1,5 hingga dua jam.', 'Funland Mikie Holiday.jpg', '2021-08-16 21:17:14', '2021-08-16 21:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_21_073729_create_admins_table', 1),
(5, '2021_06_22_130422_create_bookings_table', 2),
(6, '2021_06_22_130726_create_destinasis_table', 2),
(7, '2021_06_22_130742_create_mobil_travels_table', 2),
(8, '2021_06_22_130827_create_paket_tours_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mobil_travels`
--

CREATE TABLE `mobil_travels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namamobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambarmobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobil_travels`
--

INSERT INTO `mobil_travels` (`id`, `namamobil`, `kapasitas`, `gambarmobil`, `created_at`, `updated_at`) VALUES
(11, 'Avanza Hitam', '6 orang', 'Avanza Hitam.jpg', '2021-08-08 16:53:15', '2021-08-08 16:58:16'),
(12, 'Avanza putih', '6 orang', 'Avanza putih.jpg', '2021-08-08 16:54:05', '2021-08-08 16:58:35'),
(13, 'Xenia', '6 orang', 'Xenia_2.jpg', '2021-08-16 21:24:20', '2021-08-16 21:24:20'),
(14, 'Agya', '4 orang', 'Agya_3.jpg', '2021-08-16 21:24:46', '2021-08-16 21:24:46'),
(15, 'Ayla', '4 orang', 'Ayla_4.jpg', '2021-08-16 21:25:04', '2021-08-16 21:25:04'),
(16, 'Innova', '6 orang', 'Innova_5.jpg', '2021-08-16 21:25:27', '2021-08-16 21:25:27'),
(17, 'Avanza putih', '6 orang', 'Avanza putih_6.jpg', '2021-08-19 03:36:13', '2021-08-19 03:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `paket_tours`
--

CREATE TABLE `paket_tours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namapaket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daftardestinasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargapaket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_travel` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket_tours`
--

INSERT INTO `paket_tours` (`id`, `namapaket`, `daftardestinasi`, `hargapaket`, `deskripsi`, `id_travel`, `created_at`, `updated_at`) VALUES
(10, 'Paket A', 'Bukit Gundaling, Taman Lumbini, bukit kubu', '200000', 'Menggunakan mobil Avanza warna hitam nopol BK----SAG dan sudah termasuk biaya tiket memasuki objek wisata. lokasi penjemputan di kantor Dinas Pariwisata dan Kebudayaan yang berada di berastagi depan tugu perjuangan dan tepat sebelah pajak buah berastagi', 11, '2021-08-08 16:56:17', '2021-08-16 22:05:02'),
(11, 'Paket B', 'Danau lau kawar, Tongging, Air terjun sipiso piso', '350000', 'Menggunakan mobil Avanza warna putih nopol BK----SAC dan sudah termasuk biaya tiket memasuki objek wisata. lokasi penjemputan di kantor Dinas Pariwisata dan Kebudayaan yang berada di berastagi depan tugu perjuangan dan tepat sebelah pajak buah berastagi', 12, '2021-08-08 16:57:14', '2021-08-16 22:06:45'),
(12, 'Paket C', 'Desa budaya lingga, Pemandian air panas, air terjun sikulikap', '300000', 'Menggunakan mobil Innova warna putih nopol BK----SAG dan sudah termasuk biaya tiket memasuki objek wisata. lokasi penjemputan di kantor Dinas Pariwisata dan Kebudayaan yang berada di berastagi depan tugu perjuangan dan tepat sebelah pajak buah berastagi', 16, '2021-08-16 21:48:21', '2021-08-16 22:07:43'),
(13, 'Paket D', 'Funland Mikie Holiday, Bukit kubu, Taman lumbini', '200000', 'Menggunakan mobil Agya warna kuning nopol BK----SAG dan tidak termasuk biaya tiket memasuki objek wisata. lokasi penjemputan di kantor Dinas Pariwisata dan Kebudayaan yang berada di berastagi depan tugu perjuangan dan tepat sebelah pajak buah berastagi', 14, '2021-08-16 21:50:45', '2021-08-16 22:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('bayu@gmail.com', '$2y$10$QaR7GCvxWdfEYMeoasbD2ej4rkJUYPe15Ua.Dvbu9oLDR0O4LQB1O', '2021-08-18 03:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `supir`
--

CREATE TABLE `supir` (
  `id` bigint(20) NOT NULL,
  `nama_supir` varchar(30) NOT NULL,
  `kartu_anggota` text NOT NULL,
  `status` varchar(14) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supir`
--

INSERT INTO `supir` (`id`, `nama_supir`, `kartu_anggota`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad', 'Ahmad_1.jpg', 'Tersedia', '2021-08-23 15:11:26', '2021-08-25 01:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `jk`, `notelp`, `alamat`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'jael', 'Laki-laki', '082233445566', 'banguntapan', 'jael@gmail.com', NULL, '$2y$10$8K47eclv/..9Z7UBXdqg1.GCiE00UuNmxAO1RqV4CQ3QwNuR62/Zi', NULL, '2021-08-19 02:18:14', '2021-08-19 02:18:14'),
(15, 'Muh Fariza', 'Laki-laki', '085397986721', 'Btn Baliase Blok P7 No 3', 'muhfariza98@gmail.com', NULL, '$2y$10$b2475xjsocDYLN4pt7rfqOvzAxdoBlIPjf9YM4QXLzrPHzjB1/C46', NULL, '2021-08-23 15:43:54', '2021-08-23 15:43:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtour` (`idtour`),
  ADD KEY `idsopir` (`idsopir`);

--
-- Indexes for table `destinasis`
--
ALTER TABLE `destinasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobil_travels`
--
ALTER TABLE `mobil_travels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_tours`
--
ALTER TABLE `paket_tours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_travel` (`id_travel`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `destinasis`
--
ALTER TABLE `destinasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mobil_travels`
--
ALTER TABLE `mobil_travels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `paket_tours`
--
ALTER TABLE `paket_tours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`idtour`) REFERENCES `paket_tours` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`idsopir`) REFERENCES `supir` (`id`);

--
-- Constraints for table `paket_tours`
--
ALTER TABLE `paket_tours`
  ADD CONSTRAINT `paket_tours_ibfk_1` FOREIGN KEY (`id_travel`) REFERENCES `mobil_travels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
