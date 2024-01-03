-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2023 at 10:52 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peternak-web`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_01_113500_create_playlist_table', 1),
(6, '2023_11_01_230124_create_video_table', 1),
(7, '2023_11_01_230148_create_topic_table', 1),
(8, '2023_11_01_230216_create_note_table', 1),
(9, '2023_11_01_235724_create_module_table', 1),
(10, '2023_12_05_234014_add_new_fields_users', 2);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `name`, `title`, `description`, `parent_name`, `created_at`, `updated_at`) VALUES
(1, 'primary', 'Jalur Pembelajaran', 'Selamat Datang di Peternak Web', '', '2023-11-09 01:21:55', '2023-11-12 21:48:21'),
(2, 'backend', 'Backend', 'Backend adalah bagian yang bertugas untuk mengelolah logika dari sebuah website.Logika tersebut bekerja untuk menghubungkan antara database dengan API. Hal itu yang nantinya akan dikomsumsi oleh frontend. Backend developer setidaknya harus mengerti juga dasar-dasar dari frontend. Logika pemrograman pada backend bisa ditulis dalam berbagai bahasa pemrograman. Namun, untuk memudahkan proses belajar. Maka kami menyarankan untuk mengunakan bahasa pemrograman Javascript.', 'primary', '2023-11-09 02:24:31', '2023-11-30 23:38:01'),
(3, 'frontend', 'Frontend', 'Frontend adalah bagian yang berinteraksi dengan pengguna. Dalam hal ini semua yang tampil di browser adalah tugas serorang frontend developer untuk mengatur tampilan dan interaksinya dengan pengguna. Selain itu, frontend dev bertugas untuk memanfaatkan API yang dibuat oleh backend agar bisa dimanfaatkan pada browser untuk mebuat website lebih interaktif dan dinamis.', 'primary', '2023-11-09 02:26:20', '2023-11-09 03:23:10'),
(4, 'javascript', 'Javascript', 'JavaScript adalah bahasa pemrograman populer yang digunakan untuk membuat situs dengan konten website yang dinamis. JavaScript sendiri sebenarnya biasanya dikolaborasikan dengan HTML dan CSS. Di mana belajar HTML adalah untuk membuat struktur website dan CSS adalah bahasa untuk merancang style halaman website. Lalu, JavaScript berperan menambahkan elemen interaktif untuk meningkatkan engagement pengguna', 'backend', '2023-11-09 02:27:21', '2023-12-13 07:27:06'),
(5, 'nodejs', 'Node.Js', 'Node.js adalah platform perangkat lunak open-source yang dikembangkan dengan menggunakan JavaScript. Node.js memungkinkan developer untuk menjalankan kode JavaScript di luar browser, misalnya di server atau aplikasi desktop. Node.js menyediakan lingkungan runtime JavaScript yang dapat digunakan untuk membuat aplikasi web, server, dan aplikasi mobile. Node.js juga menyediakan modul yang dapat digunakan untuk mengakses fungsi sistem operasi dan mengelola jaringan, file, dan basis data. Node.js sangat populer digunakan untuk membuat aplikasi web real-time yang memerlukan komunikasi yang cepat antara server dan klien.', 'backend', '2023-11-12 23:36:32', '2023-11-12 23:36:55'),
(6, 'html', 'HTML', 'HTML adalah bahasa markup untuk membuat halaman web. Kepanjangan dari HTML adalah Hypertext Markup Language. Artinya, HTML menggunakan simbol tertentu (tag) yang nantinya akan diterjemahkan oleh browser ke halaman web.', 'frontend', '2023-11-12 23:37:40', '2023-11-12 23:37:40'),
(8, 'php', 'PHP', 'PHP termasuk dalam bahasa scripting server-side yaitu sebagai bahasa pemrograman yang dibuat untuk mengembangkan situs web dinamis maupun statis ataupun aplikasi berbasis website. PHP merupakan singkatan dari Hypertext Pre-processor yang sebelumnya dikembangkan dengan sebutan Personal Home Pages. PHP berfungsi untuk membangun sebuah situs web statis atau situs web dinamis. PHP juga dapat digunakan untuk membangun aplikasi berbasis Web. PHP adalah salah satu dari bahasa pemrograman yang bisa digunakan karena pada dasarnya ada banyak bahasa pemrograman yang bisa digunakan untuk membangun sebuah website.', 'backend', '2023-11-30 23:33:36', '2023-11-30 23:33:36'),
(9, 'laravel', 'Laravel', 'Laravel adalah framework berbasis bahasa pemrograman PHP yang bisa digunakan untuk membantu proses pengembangan sebuah website agar lebih maksimal. Dengan menggunakan Laravel, website yang dihasilkan akan lebih dinamis. Kehadiran framework Laravel menjadikan bahasa pemrograman PHP menjadi lebih powerful. Perlu kita ketahui bahwa kehadiran framework Laravel selalu menghadirkan fitur-fitur terbaru dibandingkan framework lainnya. Framework Laravel menggunakan struktur MVC (Model View Controller). MVC merupakan model aplikasi yang memisahkan antara data dan tampilan berdasarkan komponen aplikasi. Dengan adanya model MVC, pengguna Laravel menjadi lebih mudah dalam mempelajari Laravel. Serta menjadikan proses pembuatan aplikasi berbasis website menjadi lebih cepat.', 'backend', '2023-11-30 23:33:58', '2023-11-30 23:33:58'),
(10, 'mysql', 'MySQL', 'MySQL adalah sebuah database management system (manajemen basis data) menggunakan perintah dasar SQL (Structured Query Language) yang cukup terkenal. MySQL adalah database server yang gratis dengan lisensi GNU General Public License (GPL) sehingga dapat Anda pakai untuk keperluan pribadi atau komersil tanpa harus membayar lisensi yang ada. MySQL masuk ke dalam jenis RDBMS (Relational Database Management System). Maka dari itu, istilah semacam baris, kolom, tabel, dipakai pada aplikasi database ini. Contohnya di dalam MySQL sebuah database terdapat satu atau beberapa tabel. SQL sendiri merupakan suatu bahasa yang dipakai di dalam pengambilan data pada relational database atau database yang terstruktur. Jadi MySQL adalah database management system yang menggunakan bahasa SQL sebagai bahasa penghubung antara perangkat lunak aplikasi dengan database server.', 'backend', '2023-11-30 23:34:15', '2023-11-30 23:34:15'),
(11, 'npm', 'NPM', 'NPM atau Node Package Manager adalah sistem pengelola paket yang digunakan dalam pengembangan aplikasi JavaScript. npm dapat digunakan untuk mengunduh, menginstal, dan mengelola dependensi (library atau modul) yang dibutuhkan dalam sebuah proyek JavaScript. npm dikembangkan dan didukung oleh Node.js dan tersedia secara default ketika menginstall Node.js. npm memungkinkan developer untuk menggunakan paket yang dikembangkan oleh komunitas dan membagikannya dengan mudah ke dalam proyek mereka sendiri. npm juga memungkinkan developer untuk membagikan paket yang dikembangkan sendiri ke dalam komunitas.', 'backend', '2023-11-30 23:34:30', '2023-11-30 23:34:30'),
(12, 'composer', 'Composer', 'Composer adalah tools dependency manager pada PHP, Dependency (ketergantungan) sendiri diartikan ketika project PHP yang kamu kerjakan masih membutuhkan atau memerlukan library dari luar. Composer berfungsi sebagai penghubung antara project PHP kamu dengan library dari luar. Jika Bahasa pemrograman PHP menggunakan Composer sebagai dependency manager, Maka sama halnya seperti Ruby yang menggunakan Gem, Java menggunakan Maven and Gradle dan seluruh komunitas JS berfokus pada npm. Dependency manager memungkinkan kamu untuk membuat dan mengambil library pada project PHP kamu pada library packagist.org. Packagist.org sendiri merupakan situs yang menyediakan banyak libary yang bisa kamu gunakan. Dengan bantuan tools tersebut kamu bisa terhubung pada situs packagist.org dan kamu dapat mengambil dan mengupload library.', 'backend', '2023-11-30 23:34:51', '2023-11-30 23:34:51'),
(13, 'api', 'API', 'API adalah singkatan dari Application Programming Interface. API sendiri merupakan interface yang dapat menghubungkan satu aplikasi dengan aplikasi lainnya. Dengan kata lain, peran API adalah sebagai perantara antar berbagai aplikasi berbeda, baik dalam satu platform yang sama atau pun lintas platform.', 'backend', '2023-11-30 23:35:10', '2023-11-30 23:35:10'),
(14, 'web-security', 'Web-Security', 'Web security adalah segala tindakan dengan tujuan mengamankan dan melindungi website dari serangan internet yang biasanya dilakukan oleh hacker atau penjahat dunia maya. Pada dasarnya, web security adalah tindakan untuk melindungi website, atau disebut juga dengan cyber security. Perlu diingat, melakukan web security adalah hal yang penting, pasalnya situs web maupun aplikasi web seringkali rentan dengan pelanggaran keamanan. Jadi kesimpulannya, web security adalah sistem yang dibuat sebagai tindakan untuk melindungi dan memberikan protokol yang dibutuhkan oleh website dari peretas, atau pihak-pihak lain yang tidak bertanggung jawab.', 'backend', '2023-11-30 23:35:35', '2023-11-30 23:35:35'),
(15, 'testing', 'Testing', 'Testing pada pengembangan website adalah proses melakukan uji coba terhadap aplikasi web untuk memastikan bahwa aplikasi tersebut berfungsi dengan baik dan memenuhi spesifikasi yang ditentukan. Ada beberapa jenis testing yang digunakan seperti Unit Testing, Integration Testing, Functional Testing, Performance Testing, dan Acceptance Testing. Unit testing melakukan uji coba pada unit-unit individual dari aplikasi, sedangkan integration testing melakukan uji coba bagaimana unit-unit bekerja sama. Functional testing melakukan uji coba pada fitur-fitur aplikasi dan performance testing melakukan uji coba pada kinerja aplikasi. Acceptance testing melakukan uji coba dari perspektif pengguna untuk memastikan bahwa aplikasi memenuhi persyaratan yang ditentukan dan diterima oleh pengguna. Testing sangat penting karena memungkinkan ditemukannya kesalahan sebelum aplikasi di-launch dan digunakan oleh pengguna, sehingga menjamin kualitas aplikasi dan kepuasan pengguna.', 'backend', '2023-11-30 23:35:52', '2023-11-30 23:35:52'),
(16, 'ci/cd', 'CI/CD', 'Continuous integration (CI) adalah pengintegrasian kode ke dalam repositori kode kemudian menjalankan pengujian secara otomatis, cepat, dan sering. Kamu dapat melakukan CI ini dengan menggunakan perintah commit. Sementara continous delivery atau continuous deployment (CD) adalah praktik yang dilakukan setelah proses CI selesai dan seluruh kode berhasil terintegrasi, sehingga aplikasi bisa dibangun lalu dirilis secara otomatis. CI/CD pipeline ini sangat lazim digunakan dalam pengembangan perangkat lunak. CI/CD pipeline ini menjadi penghubung antara tim pengembang dengan tim operasional yang di dalamnya terdapat tiga fase yang berupa continuous integration, continuous delivery, dan continuous deployment. Ketiga fase tersebut akan dilakukan secara terus menerus dan otomatis untuk mendapatkan perangkat lunak yang andal dan bebas dari bug.', 'backend', '2023-11-30 23:36:10', '2023-11-30 23:36:10'),
(17, 'css', 'CSS', 'CSS adalah singkatan dari cascading style sheets, yaitu bahasa yang digunakan untuk menentukan tampilan dan format halaman website. Dengan CSS, Anda bisa mengatur jenis font, warna tulisan, dan latar belakang halaman. CSS digunakan bersama dengan bahasa markup, seperti HTML dan XML untuk membangun sebuah website yang menarik dan memiliki fungsi yang berjalan baik. Dengan adanya CSS, Anda cukup menulis kode satu kali untuk sebuah elemen HTML untuk diterapkan ke semua halaman.', 'frontend', '2023-11-30 23:38:26', '2023-11-30 23:38:26'),
(20, 'javascript(fe)', 'Javascript', 'JavaScript adalah bahasa pemrograman populer yang digunakan untuk membuat situs dengan konten website yang dinamis. JavaScript sendiri sebenarnya biasanya dikolaborasikan dengan HTML dan CSS. Di mana belajar HTML adalah untuk membuat struktur website dan CSS adalah bahasa untuk merancang style halaman website. Lalu, JavaScript berperan menambahkan elemen interaktif untuk meningkatkan engagement pengguna.', 'frontend', '2023-11-30 23:40:33', '2023-11-30 23:40:33'),
(21, 'bootstrap', 'Bootstrap', 'Bootstrap adalah framework web development berbasis HTML, CSS, dan JavaScript yang dirancang untuk mempercepat proses pengembangan web responsive dan mobile-first (memprioritaskan perangkat seluler). Selain bisa digunakan untuk mengembangkan website dengan lebih cepat, Bootstrap adalah framework gratis yang bersifat open-source. Skrip dan syntax yang disediakan Bootstrap bisa diterapkan untuk berbagai komponen dalam desain web.', 'frontend', '2023-11-30 23:41:23', '2023-11-30 23:41:23'),
(22, 'git', 'GIT', 'Git adalah salah satu sistem pengontrol versi (Version Control System) pada proyek perangkat lunak yang diciptakan oleh Linus Torvalds. Pengontrol versi bertugas mencatat setiap perubahan pada file proyek yang dikerjakan oleh banyak orang maupun sendiri. Git dikenal juga dengan distributed revision control (VCS terdistribusi), artinya penyimpanan database Git tidak hanya berada dalam satu tempat saja. Semua orang yang terlibat dalam pengkodean proyek akan menyimpan database Git, sehingga akan memudahkan dalam mengelola proyek baik online maupun offline.', 'frontend', '2023-11-30 23:41:36', '2023-11-30 23:41:36'),
(23, 'npm(fe)', 'NPM', 'NPM atau Node Package Manager adalah sistem pengelola paket yang digunakan dalam pengembangan aplikasi JavaScript. npm dapat digunakan untuk mengunduh, menginstal, dan mengelola dependensi (library atau modul) yang dibutuhkan dalam sebuah proyek JavaScript. npm dikembangkan dan didukung oleh Node.js dan tersedia secara default ketika menginstall Node.js. npm memungkinkan developer untuk menggunakan paket yang dikembangkan oleh komunitas dan membagikannya dengan mudah ke dalam proyek mereka sendiri. npm juga memungkinkan developer untuk membagikan paket yang dikembangkan sendiri ke dalam komunitas.', 'frontend', '2023-11-30 23:41:55', '2023-11-30 23:41:55'),
(24, 'reactjs', 'ReactJS', 'ReactJS adalah sebuah library JavaScript untuk membuat user interface atau komponen UI. Dikembangkan dan diurus oleh Facebook. React fokus pada pembuatan komponen UI yang dapat digunakan kembali, yang dapat digabungkan untuk membuat interface pengguna yang kompleks. React menggunakan konsep yang disebut komponen yang memungkinkan developer untuk memecah interface pengguna menjadi bagian-bagian yang lebih kecil dan dapat digunakan kembali. React mengikuti pendekatan deklaratif dalam pemrograman, yang membuatnya lebih mudah dipahami dan diprediksi perilakunya. React juga kompatibel dengan perpustakaan dan framework lainnya, sehingga menjadi pilihan populer untuk membuat aplikasi web kompleks.', 'frontend', '2023-11-30 23:43:00', '2023-11-30 23:43:00'),
(25, 'tailwind', 'Tailwind CSS', 'Tailwind CSS adalah sebuah framework CSS yang dirancang untuk membantu developer dalam membuat desain yang cepat, responsif dan mudah dikelola. Tailwind menyediakan sejumlah class pre-defined yang dapat digunakan untuk mengatur tampilan elemen HTML seperti warna, ukuran, posisi, dll. Ini memungkinkan developer untuk mengelola desain dengan cara yang lebih efisien dan menghindari menulis CSS dari awal.', 'frontend', '2023-11-30 23:43:55', '2023-11-30 23:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `video_id` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` bigint UNSIGNED NOT NULL,
  `playlist_id` varchar(255) NOT NULL,
  `module_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `playlist_id`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 'PLc6SEcJkQ6DwiGCnVdCbWLqo6ceICD_4b', '4', '2023-11-09 02:28:16', '2023-11-09 02:28:16'),
(2, 'PLFIM0718LjIW-XBdVOerYgKegBtD6rSfD', '5', '2023-11-12 23:36:40', '2023-11-12 23:36:40'),
(3, 'PLFIM0718LjIVuONHysfOK0ZtiqUWvrx4F', '6', '2023-11-12 23:37:59', '2023-11-12 23:37:59'),
(4, 'PL-CtdCApEFH8cjnZbv3o6G0kHEPc3GYVO', '6', '2023-11-12 23:38:13', '2023-11-12 23:38:13'),
(5, 'PLFIM0718LjIWiihbBIq-SWPU6b6x21Q_2', '7', '2023-11-15 19:43:02', '2023-11-15 19:43:02'),
(6, 'PL-CtdCApEFH8SS0Gsj9_a0cC0jypFEoSg', '4', '2023-11-30 23:04:49', '2023-11-30 23:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` bigint UNSIGNED NOT NULL,
  `module_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','member') NOT NULL DEFAULT 'member',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `avatar`) VALUES
(1, 'Mhd. Ananda Ridho Alfadillah', 'ananda@gmail.com', NULL, '$2y$12$zNtyL.2HORNcVhR0fA.DBOnGC0qep4gqcjpbU/mfvGN/MdZfUBdeq', 'admin', NULL, '2023-11-09 01:21:49', '2023-11-09 01:21:49', NULL),
(2, 'Anandaa', 'mhdanandaraf@gmail.com', NULL, '$2y$12$ugWfSk7OwCj7VWWuHqYV2eUek9KIJma7JjHjDfjYsJ1ojetF.b0gS', 'member', NULL, '2023-11-09 01:36:00', '2023-12-27 23:15:05', '1703744105.jpg'),
(3, 'Alfadillah', 'alfadillah@gmail.com', NULL, '$2y$12$AyjFBnibwE0IlHAu0LzsiegZgZIujJJL6FwENeW18xUPd.5pubbyK', 'member', NULL, '2023-12-06 06:40:53', '2023-12-06 06:41:51', '1701870111.png'),
(4, 'Sawit Scan', 'anandsasasa@gmail.com', NULL, '$2y$12$UsuEv1Y..cZ73VlrRicBReWjXSE0ibJuSqamSZgpYQOJtpTRyRc8C', 'member', NULL, '2023-12-27 15:29:11', '2023-12-27 15:29:11', NULL),
(5, 'Ananda', 'sdsds@gmail.com', NULL, '$2y$12$GfYm1teWtUxsGogtQvsgKOA4Ma4t/hIsy6cSTq4XoIKOpchNoK0au', 'member', NULL, '2023-12-27 23:03:55', '2023-12-27 23:03:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` bigint UNSIGNED NOT NULL,
  `video_id` varchar(255) NOT NULL,
  `playlist_id` varchar(255) NOT NULL,
  `like` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `module_name_unique` (`name`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
