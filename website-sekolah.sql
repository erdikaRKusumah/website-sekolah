-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 17, 2022 at 04:52 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website-sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Web Programming', 'web-programing', '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(2, 'Web Design', 'web-design', '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(3, 'Personal', 'personal', '2022-06-25 06:10:54', '2022-06-25 06:10:54');

-- --------------------------------------------------------

--
-- Table structure for table `cobas`
--

CREATE TABLE `cobas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `description`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'gallery-images/ElUuyiFbh9g5ntYVggNK3KnvcsM2oqXg6Vt5fHKJ.png', 'Merayakan ygy', NULL, '2022-07-05 21:55:44', '2022-07-05 21:55:44');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_10_153031_create_posts_table', 1),
(6, '2022_02_10_215552_create_categories_table', 1),
(7, '2022_03_22_095318_create_visions_table', 1),
(8, '2022_03_31_091854_create_visi_misi_table', 1),
(9, '2022_03_31_120709_create_vision_missions_table', 1),
(10, '2022_04_01_131713_create_sambutan_table', 1),
(11, '2022_04_04_023822_create_sejarah_singkat_table', 1),
(12, '2022_04_28_061108_create_cobas_table', 1),
(13, '2022_06_01_062244_create_galleries_table', 1),
(14, '2022_06_01_065435_create_staff_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `image`, `excerpt`, `body`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Rerum molestiae omnis et iusto assumenda.', 'voluptate-dolorum-ut-recusandae-laudantium-corrupti-mollitia', NULL, 'Sint dolore architecto voluptas unde. Nobis dolores maiores quis consequatur eius. Voluptatem voluptatem illo sit illum animi qui.', '<p>Voluptatum nostrum voluptas neque ab corrupti officiis dolores. Eligendi rerum laborum hic quia eum cumque.</p><p>Fuga accusantium rerum similique aut minus ut qui. Et omnis quia non fugit libero. Voluptatem eveniet quidem quia voluptates quia qui. Et autem repellat atque et sit tempora.</p><p>Provident iure delectus consequuntur animi. Quibusdam nihil reiciendis consequatur velit consectetur. Consequatur velit ad ipsam vitae ut et qui. Voluptates amet consequuntur amet aut esse.</p><p>Beatae non eligendi at id culpa. Animi ipsa nemo vero cum. Dignissimos non distinctio eum consequatur sit beatae.</p><p>Quod sunt harum sed delectus. Adipisci laboriosam cupiditate sit quod. Modi vel sapiente autem error debitis nobis quos.</p><p>Et omnis voluptas qui dolorum corrupti accusamus eius. Autem exercitationem repellendus odit quia. Sed vel culpa quidem quam.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(2, 2, 3, 'Architecto et modi quis perferendis nisi voluptatem voluptas libero amet.', 'in-harum-illum-molestiae-harum-consequuntur-praesentium-nihil', NULL, 'Sint error nostrum numquam at doloribus et. Voluptatem vel repudiandae minima et. Nostrum id atque nostrum aut sunt. Esse voluptatibus quod nulla.', '<p>Eaque eveniet aut ea et eius consequatur. Illum reiciendis ipsam repudiandae consequatur fugit nihil quam. Perspiciatis dicta quam ducimus natus ut.</p><p>Et earum omnis aut voluptatum accusantium illum unde. Est tenetur quia temporibus inventore temporibus quo aspernatur. Blanditiis aut tenetur reprehenderit.</p><p>Deleniti vel nesciunt eius pariatur. Ut esse veniam dolor rerum molestiae. Vel labore ipsam vel. Aut quia doloremque ut aut vero voluptatem temporibus. Nemo pariatur corrupti adipisci.</p><p>Quae distinctio suscipit quae. Saepe voluptatum dolores molestias. Est est culpa rem est nulla assumenda. Doloribus quidem nam est deserunt. Qui necessitatibus sint esse quia.</p><p>Ducimus consequatur qui expedita mollitia at unde. Iste nostrum ipsum architecto ullam placeat. Id iste quae quis quis voluptate. Velit laborum autem accusamus fuga earum a.</p><p>Dolor aperiam nisi iste et. Exercitationem minima dignissimos quidem atque officia beatae. Magni et consequatur qui quia.</p><p>Asperiores soluta sunt qui ut dolorum. Odit accusantium blanditiis eos nobis porro. Voluptas occaecati provident qui et sed sed iure aut. Aut consequatur voluptas delectus deleniti.</p><p>Voluptas est nulla quia ab. Recusandae qui quam voluptatum harum et voluptas ullam. Possimus autem adipisci dolores sed nulla. Similique voluptatem nesciunt inventore iusto. Autem sed rerum non qui et consequatur mollitia dolores.</p><p>In sunt consequatur omnis praesentium quia magni non impedit. Et iusto voluptatem sit quae modi. Itaque commodi voluptas est id. Dolorem ullam aut recusandae non et unde mollitia.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(3, 1, 1, 'Dolor temporibus dolorem fugiat velit tenetur.', 'debitis-omnis-impedit-iure-impedit-et-a-et-omnis', NULL, 'Sint cupiditate velit et eum sed reprehenderit. Doloribus ut eos expedita voluptas voluptatem. Mollitia ut tempore dolores rem iure veniam. Nisi illo maxime voluptatem neque et. Rerum amet nulla est voluptatem occaecati eaque laudantium adipisci.', '<p>Qui temporibus ducimus et nobis inventore ducimus. Consequuntur velit eum quo nulla nam aperiam.</p><p>Nulla saepe reiciendis excepturi expedita occaecati voluptatum. Eos quo architecto suscipit et. Ut quod amet reiciendis sit quia quia.</p><p>Non quia tempore quia ratione odio temporibus distinctio. Aut aut necessitatibus et tenetur in sint nostrum veniam. Dolorem voluptas qui qui.</p><p>Sint excepturi delectus quo et quia dolores distinctio perferendis. Eveniet nam rerum non alias deserunt adipisci quibusdam aut. In fuga fugit dolore repellat molestiae.</p><p>Rerum nisi velit velit in ea praesentium quia. Nostrum nihil officia quod voluptate. Quos aut aut blanditiis minima minus pariatur quisquam.</p><p>Labore nisi aut est possimus quas ea. Nihil quia totam tempora. Et incidunt eaque quo omnis mollitia sit autem. Ea dolore qui laborum.</p><p>Omnis pariatur voluptates voluptate mollitia in aut. Enim repellat veritatis quam nostrum voluptates. Inventore minus laborum exercitationem ad accusamus architecto quasi. Quam nihil dolor commodi exercitationem nisi culpa fuga.</p><p>Voluptatum voluptatibus tempore sit non qui. Qui non odio consequatur ut excepturi. Commodi maiores ex ipsum est. Et voluptatem soluta at rerum non aut illum vel.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(4, 2, 3, 'Deserunt sed velit officiis omnis omnis.', 'sequi-qui-et-tempora-veritatis-ea', NULL, 'Voluptatum quasi et quia nostrum. A sequi aut sit ducimus et velit. Esse numquam ipsam voluptatem quis qui sunt laboriosam. Ex iste eius iure animi nulla maiores.', '<p>Laborum magnam voluptatem nihil doloribus temporibus est expedita ut. Placeat illum qui consequatur ut. Magni sed repudiandae ducimus quia explicabo quae sint dolor.</p><p>Sapiente quia ducimus aut enim. Voluptatem perspiciatis fugiat ut et. Inventore maxime ullam voluptas libero. Quam ipsum inventore minus odio. Ut rerum omnis veritatis reprehenderit deserunt.</p><p>Delectus aliquam sequi et officia illo et atque consequatur. Voluptatibus iusto voluptatibus animi dicta. Veritatis corporis quia occaecati cumque quae labore. Doloremque corrupti fugiat recusandae.</p><p>Molestiae esse quia voluptatem nesciunt aut illum et. Deserunt alias non quibusdam sunt est quia et. Magnam voluptatem quia perferendis nihil sit. Quam quia accusamus dolores facere est nam voluptatem.</p><p>Delectus voluptate earum facilis vitae. Consequatur suscipit molestias quasi labore.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(5, 1, 1, 'Autem veritatis numquam.', 'earum-animi-voluptate-sunt-rerum-aliquam-velit', NULL, 'Molestiae qui et ex voluptas id non aspernatur. Consequatur quo aut quisquam ipsam in et. Accusamus magnam blanditiis delectus. Illo error nobis illum eligendi occaecati omnis eius.', '<p>Enim et natus blanditiis cum rerum repudiandae qui. Quae occaecati inventore voluptates quisquam. Qui quidem autem eligendi ratione labore ea.</p><p>Accusamus beatae excepturi exercitationem magnam ea aut id. Rerum reprehenderit dignissimos unde fugit. Quisquam nulla dolores molestias unde vel tempore.</p><p>Rerum sit cumque maxime animi. Veritatis et sint ipsum laudantium. Aut aut ut dolore laboriosam. Ratione unde iusto necessitatibus quaerat.</p><p>Animi quis qui consectetur dignissimos quas velit perspiciatis. Dolores adipisci sapiente aut expedita nihil. Iste rem reprehenderit laudantium.</p><p>Placeat dicta dolor consequatur numquam eum fugit. Et soluta eius et. Pariatur quos nostrum at et officiis vel aut. Blanditiis autem odit dignissimos ut est voluptatum. A illum quasi veritatis debitis repudiandae voluptatem.</p><p>Rerum tempore alias ut quam ipsa. Nihil enim natus dolor impedit. Aut sunt ea quas sunt omnis asperiores est. Repellat ut sint assumenda voluptas dicta vero pariatur. Sit delectus provident qui rem enim qui.</p><p>Magni assumenda incidunt tempora corrupti. Rerum praesentium nostrum beatae repellendus.</p><p>Voluptatem enim rerum quam rerum incidunt aut non. Natus perferendis eaque eum tenetur quasi.</p><p>Magni minima impedit blanditiis. A et atque amet enim repudiandae inventore dolor. Reiciendis consequatur blanditiis architecto quae est libero quam nihil.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(6, 1, 2, 'Earum omnis totam est ut provident iste enim animi provident voluptatem.', 'voluptatem-quo-aut-sed-dicta-maiores', NULL, 'Beatae odit debitis numquam quas quasi sit. Necessitatibus et vel temporibus corrupti inventore molestiae ipsa quia. Commodi sed sequi quia rerum voluptatibus. Labore aut atque mollitia iste ut provident velit.', '<p>Voluptatem veniam ad aliquid non. Minima sint eos ex est occaecati accusamus. Omnis consectetur necessitatibus quo facere. Minima quia aut odit reiciendis qui qui incidunt.</p><p>Qui impedit quam quia et quis sed nulla. Eum maiores ut eum repellat asperiores et. Ducimus et labore dolores sint error odio ab. Illo sed omnis optio explicabo ad at.</p><p>Id magnam quaerat cumque est ab dolores qui accusamus. Minus dolor laudantium aut assumenda. Eveniet voluptates natus consequatur laboriosam.</p><p>Doloremque velit ad voluptatibus ea eos velit. Hic cupiditate odit consectetur. Accusantium est sunt nisi omnis quasi incidunt molestiae.</p><p>Fugiat amet provident rem. Porro qui reiciendis veniam quibusdam aspernatur excepturi. Sit numquam laudantium rerum facere exercitationem distinctio qui.</p><p>Repellendus fugiat nihil delectus mollitia soluta ut ratione ratione. Unde quasi aliquid labore neque. Dolores ut facilis beatae nihil consequatur voluptatem. Adipisci eligendi recusandae laboriosam.</p><p>Ut ut in odit quisquam inventore non voluptatibus explicabo. Autem iure iste et tempora. Magnam numquam possimus blanditiis deserunt hic molestias.</p><p>Explicabo quibusdam adipisci omnis. Corporis voluptas et magni tempora minima facere molestiae. Id veritatis odit ea blanditiis enim sed cupiditate facere. Nobis sint dolorum non ullam voluptas.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(7, 2, 1, 'Nam quo architecto.', 'alias-quo-pariatur-quia-vero-aliquid-enim-tenetur', NULL, 'Et sed beatae quo fugiat autem vel. Omnis officia aut odio aut beatae et animi. Sit est quas modi qui saepe vel voluptatibus.', '<p>Quis esse dolorum deserunt consectetur soluta quia. Eveniet ad nam accusamus ut neque ut. Sunt delectus aut occaecati optio id.</p><p>Est fuga velit debitis iste inventore perspiciatis. Non sed est repellat quas in iusto. Et eos tenetur corporis tenetur est in. Aut et in aut ut dolores similique.</p><p>Iure laboriosam et doloribus facere. Sapiente tempora qui modi autem qui.</p><p>Aut perferendis aliquam eaque ullam soluta architecto et. Quis voluptatem amet similique corporis et. Nemo saepe et tempora.</p><p>Nostrum nihil pariatur similique deleniti suscipit sequi enim. Non deleniti similique omnis quam. Sit vel sint voluptas aut. Voluptatum ut optio incidunt est modi accusamus voluptatibus.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(8, 2, 3, 'Maxime atque repellendus possimus temporibus libero.', 'adipisci-commodi-dolores-itaque-labore-voluptatibus-dolor-aspernatur', NULL, 'Non sapiente tenetur autem maxime. Minima molestias officia rerum facilis vel. Illo quae voluptatibus suscipit nesciunt facilis voluptas sunt. Dicta facere aspernatur ut aut.', '<p>Sed voluptatem sit necessitatibus autem. Ipsam debitis similique ab rem ut iste. Earum aperiam delectus facilis et quaerat dolores magni. Ut animi praesentium consequatur nulla.</p><p>Consectetur ratione qui incidunt aut voluptate tenetur est. Aperiam quam ipsum ducimus et. Molestiae laborum earum repellat ad deserunt recusandae. Facere omnis voluptatem sit sit fugiat.</p><p>Optio id quod omnis aliquid. Earum adipisci laudantium omnis eveniet cumque quo quo. Omnis deleniti velit beatae ut aut velit vitae.</p><p>Magnam reprehenderit quis non quo aspernatur assumenda ut. Veniam et repudiandae at dignissimos ut nihil vero iure.</p><p>Ea ut recusandae omnis dolores porro. Illo labore sed et deserunt. Officiis accusamus cumque ipsa.</p><p>A deserunt libero et. Sequi quae soluta nisi quae voluptates laboriosam. Blanditiis est et amet vitae cum quia.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(9, 1, 3, 'Labore expedita ea.', 'maxime-quaerat-odit-molestiae-architecto-quidem-dolore-inventore', NULL, 'At molestias asperiores ut in corporis quia eum. Nihil aliquid sint possimus sit sint dicta. Ipsam et iste enim delectus ea totam consequatur aperiam.', '<p>Quod dolores aliquid incidunt aut omnis eligendi labore fugit. Voluptate rerum vitae natus omnis id quasi. Vitae ipsam repudiandae ut optio error repellat excepturi.</p><p>Unde quis ut ut et cumque voluptate illo. Illum et tenetur tempora illum amet assumenda. A laborum et qui vel qui dicta. Rerum rerum rerum ratione temporibus et. Quis aspernatur magnam minus earum.</p><p>Iusto et rerum magni quaerat totam. Qui sint non rerum. Molestias ut facere corporis deserunt perferendis unde aut.</p><p>Et ipsam harum aliquid commodi ab. Ad sint eum non ea sunt id. Nihil voluptatem aut corporis rerum molestiae.</p><p>Quia commodi assumenda voluptatem voluptates nobis sint. Libero molestiae sit autem sed. Nesciunt incidunt aliquam quis esse. Odio qui odio consequatur inventore odit fugit cupiditate.</p><p>Aut sunt molestias odio quaerat dolores. Quo nihil sequi recusandae sint recusandae sint maiores quia.</p><p>Fuga porro dolorem fugiat explicabo. Doloribus voluptas non eaque sequi exercitationem minus quae natus. Odio voluptas porro perferendis molestiae.</p><p>Corrupti repudiandae voluptas natus molestias et tempora ipsa. Incidunt optio blanditiis omnis distinctio natus placeat. Facilis magnam optio dolores voluptates quis est deserunt. Rerum dicta et asperiores nam minima iste corrupti.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(10, 2, 2, 'Accusantium saepe consequatur repellendus tempore omnis soluta numquam.', 'dignissimos-molestiae-non-in-aut-numquam-omnis', NULL, 'Et at at numquam quibusdam. Consequatur ad odio sequi temporibus perferendis corporis quia. Corrupti aliquam quia animi voluptatum iure delectus.', '<p>Illum quia sit sequi ex. Quis voluptate quae qui harum.</p><p>Est provident qui aspernatur ea fugit expedita quia. Qui ut voluptas quia sunt sint nulla veritatis. Sit dolorem similique unde fugit reiciendis voluptas illo. Quod alias reiciendis dolorem et laudantium magni.</p><p>Totam blanditiis dolorem quia vero ut laudantium tempora. Ullam et pariatur eos animi iusto ipsum quibusdam. Quia sit dicta officia dolor libero soluta. Sunt quaerat aut animi iusto nesciunt rem qui.</p><p>Minima beatae laudantium quisquam dolorem rerum unde incidunt. Eos libero illum eos aut molestiae. Et consequatur inventore animi ipsum.</p><p>Corporis sequi exercitationem qui. Voluptate commodi neque maiores sed placeat dolores sapiente. Debitis soluta sint beatae nam dolorum.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(11, 2, 1, 'Natus eius ut quia aut quia dolorem.', 'aut-commodi-in-sit-laudantium', NULL, 'Commodi debitis ut explicabo totam neque rerum sunt quibusdam. Ipsum nam tempore tempora vitae ducimus. Velit molestiae similique beatae hic id iusto et animi. Ipsa sit ad commodi laudantium excepturi.', '<p>Aspernatur laboriosam optio qui magnam ullam. Unde est quo in qui numquam magnam accusamus. Voluptatem quidem aut dolores nobis ut. Molestiae ipsam dolores aperiam ad corrupti aut sed.</p><p>Ipsa est autem atque sed odit. Dignissimos est asperiores et dolor exercitationem id assumenda non. Blanditiis voluptate rem magni optio. Voluptatem saepe accusantium voluptatibus sit.</p><p>Sapiente porro consequatur veniam nemo possimus. Qui et omnis voluptas fugiat mollitia minima. Quod nobis omnis sunt.</p><p>Modi culpa et accusamus voluptatibus ex est velit et. Commodi temporibus sit modi deleniti id porro qui. Aut dolor dignissimos illum accusantium.</p><p>Totam nesciunt animi enim quae sit voluptates. Eum eligendi esse iure quo consequatur sint cumque rerum. Harum nobis assumenda voluptatum deleniti. Ipsam voluptatem aliquam occaecati id consequatur voluptates quo.</p><p>Autem eos adipisci voluptatem sunt. Aut incidunt ut est voluptatum possimus. Eum nam ut tempora eaque. Dolores velit nihil ipsam ut est.</p><p>Consequatur doloribus rem nam consequatur. Et ratione possimus vel corporis at.</p><p>Magni sed debitis quasi et distinctio. Impedit odit ipsum quidem tempora incidunt possimus tenetur ad. Neque alias aliquam recusandae quia. Accusamus aut corrupti itaque molestiae ad alias fugit.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(12, 2, 2, 'At quam voluptates aspernatur saepe qui.', 'impedit-facilis-quae-aut-reprehenderit-consequatur', NULL, 'Quam quibusdam aliquid rem quos dolor quia molestiae. Expedita ea alias distinctio dolorum iusto. Officia illo dolores non consequatur commodi. Architecto incidunt assumenda quas error aut.', '<p>Nobis praesentium aut sint sit quia asperiores ad. Similique cumque veniam rerum rem distinctio. Molestias voluptatem laborum explicabo perferendis sunt animi. Error facilis cupiditate consequatur sed et incidunt porro eaque.</p><p>Fugiat voluptas cupiditate eum ut ut. Quia est reprehenderit soluta. Eveniet ut ex omnis voluptas aut voluptatibus. Perferendis ex et velit corrupti vel.</p><p>Voluptatem error voluptatem aut accusamus quisquam quia accusantium. Esse a nulla iste qui qui porro. Magni accusantium veritatis deserunt sit accusamus porro cupiditate quo. Architecto nobis vitae non nihil cum reprehenderit sapiente.</p><p>Delectus vero in qui vitae dolorum nisi. Error voluptate aut debitis quasi in. Dolores qui et culpa consequatur. Voluptates veniam eveniet modi sapiente voluptates doloribus.</p><p>Aut dolor mollitia repellendus qui qui magnam eum similique. Quidem accusamus atque sequi quis consequatur a sit. Autem explicabo ipsam qui ea sit aut. Hic quae vel sed sit.</p><p>Consequatur suscipit asperiores inventore quibusdam minima quia mollitia esse. Ut quibusdam laborum qui sit officiis ipsum et. Sunt id cumque esse voluptatem sit. Voluptas ratione dicta quis iusto ea ad iste.</p><p>Doloremque et dolores et necessitatibus fugiat et. Enim quia dignissimos non ad quasi voluptatibus placeat. Ea quis architecto veniam velit minima. Sed quidem temporibus eum eveniet ea quasi.</p><p>Voluptate animi ab asperiores fugiat amet in. Quos culpa quo quasi minima repudiandae architecto enim. Porro reprehenderit nihil reiciendis necessitatibus dolor officiis nostrum. Nisi quia magnam architecto eum esse cumque quo.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(13, 1, 3, 'Modi sit expedita id id.', 'ex-et-rem-itaque-recusandae-illo-repellat', NULL, 'Saepe cumque est pariatur omnis et. Autem nihil ea mollitia minima. Commodi asperiores aliquam quidem quae.', '<p>Illum esse quia recusandae et. Nihil corporis molestiae at suscipit at dolorem expedita. Tempore odit explicabo eum et reiciendis hic. Sit in enim quo omnis.</p><p>Laudantium ex repudiandae ad modi reiciendis eius voluptatibus. Ipsam rerum voluptatem nisi molestiae. Aut ipsam impedit eveniet pariatur blanditiis aspernatur. Aut consequuntur unde quod impedit sed. Est molestias iste in.</p><p>Consequatur ullam unde rerum vel repudiandae repellat. Aut suscipit earum voluptatem tempora porro assumenda. Necessitatibus sit aut aliquid voluptas sapiente.</p><p>Quia et aut ea omnis facere et aut. Tempore aperiam quaerat voluptatem nisi et nobis.</p><p>Qui reiciendis laboriosam qui voluptatem dicta eum qui. Provident odit perspiciatis tenetur magnam pariatur quam maxime.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(14, 2, 1, 'Beatae sit iusto enim aperiam sunt.', 'possimus-omnis-ut-ab-esse-maxime-ducimus', NULL, 'Repellat quasi illo aliquid tempore deleniti. Tempora a enim itaque est ea fugit. Iste praesentium molestiae corrupti velit aliquid consequatur nobis. A doloremque sit est.', '<p>Et consequuntur omnis et non ad ex. Eum praesentium sint error iure sed qui voluptas a. Commodi quas iste recusandae quisquam dignissimos.</p><p>Ab error voluptatum blanditiis itaque. Nobis nisi mollitia in consequuntur voluptates tempora. Voluptatem hic et et ut id. Recusandae voluptates debitis enim eos enim et magni.</p><p>Enim voluptatibus hic pariatur. Quasi dolores et earum quidem et temporibus. Iure velit in qui. Nihil et ut quis libero voluptates impedit.</p><p>At soluta nesciunt asperiores non reprehenderit. Voluptatem delectus sunt placeat possimus ad aut eveniet. Sequi in rem sequi sit dolores repellendus rerum.</p><p>Harum mollitia aliquam commodi est sapiente quam aspernatur. Atque necessitatibus modi facilis minus veniam autem tempore. Eveniet velit consequatur quae laboriosam tempora et esse. Minus quo voluptas labore sit ullam ut. Quisquam distinctio aut in aut ut voluptatem et.</p><p>Adipisci fuga a ab cumque. Alias atque quae fugiat cupiditate porro. Molestias sed blanditiis dolor. Consequatur voluptate sapiente doloribus qui ad deleniti.</p><p>Rerum alias aut dolor ratione pariatur doloremque dolorem. Mollitia aspernatur dolor eum est. Et dicta ea laudantium quia officiis iure.</p><p>Id ut perferendis molestiae autem rerum repudiandae. Sed commodi sit aspernatur ducimus aspernatur minima vitae. Est atque odio in rerum.</p><p>Ducimus ratione quia consequatur amet rerum. Velit harum cumque ipsum aut. Et fugit ut veniam reprehenderit enim voluptatem. Ab et nihil ipsa et commodi.</p><p>Doloremque voluptatem aperiam cum neque commodi voluptas. Qui dolor eum quidem illum. Incidunt aliquam quia dolores laudantium facilis non iusto.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(15, 1, 1, 'Aliquid cumque.', 'assumenda-tempora-qui-similique-nisi-aut-aut-est', NULL, 'Accusamus eos consectetur placeat ex consectetur delectus. Eos vero qui animi aut ut. In ad consectetur qui ab pariatur. Molestiae hic accusamus dolorum temporibus explicabo voluptate soluta.', '<p>Molestiae non dolores fugit animi facilis. Eos explicabo consequatur ducimus nemo laborum.</p><p>Culpa sed consequatur quae dolore pariatur neque qui. Ea alias dolores maxime inventore incidunt mollitia.</p><p>Cum veniam corporis sit itaque et non aut qui. Rerum molestias sequi autem ratione. Accusantium ratione non sit. Ipsam delectus suscipit laboriosam tempore enim.</p><p>Suscipit deserunt eum quis et modi autem. Ea nemo accusantium rerum atque unde. Asperiores corrupti distinctio est ipsum.</p><p>Praesentium in qui deserunt quia mollitia quis velit. Quis et nemo tempore eaque consequatur. Aut fugit vitae aspernatur ratione neque.</p><p>Voluptas deleniti molestiae quam. Repellat modi omnis cum architecto culpa praesentium. Unde repellat nisi aspernatur quia facere id voluptas dicta. Suscipit nostrum sed est natus.</p><p>Harum non voluptates ipsam quam. Explicabo qui consequatur beatae. Voluptas voluptates fuga consectetur debitis. Facere autem omnis officiis veritatis similique at numquam veritatis.</p><p>Cumque iure corporis iure eveniet aut quas. Perferendis perspiciatis fuga consequuntur sunt. Dicta dolorum mollitia aut exercitationem ea sapiente aperiam. At laudantium quo illo earum corrupti ipsum.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(16, 2, 2, 'Amet ut.', 'qui-suscipit-incidunt-et-ut-esse-perspiciatis-sunt-vel', NULL, 'Eos fugit ad corrupti maiores ullam numquam earum. Voluptates non saepe officiis eum quidem error adipisci. Cum eligendi maiores odit vel non perspiciatis. Tempora aut sit est non incidunt esse. Aut voluptatem aut soluta repellat.', '<p>Eos earum reprehenderit quidem hic eius inventore temporibus et. Ut modi ipsa dolorem libero et nihil veritatis. Sint veniam asperiores dicta et et et.</p><p>Omnis nam nisi nihil rerum. Est facilis quis quibusdam quis dolorem beatae voluptate. Quis necessitatibus et et modi modi porro. Quas amet maiores dolorem quas non et.</p><p>Deserunt quos et voluptate natus. Corrupti et quo voluptas est dolor vero. Porro aliquam corporis exercitationem ut qui fuga reprehenderit iure. Alias nobis optio sapiente id.</p><p>Et tempora aliquam non et consequuntur unde quia. Laborum voluptas facere facere fugiat quod delectus tempora. Deleniti nemo qui sapiente aut maxime sit. Ipsa at debitis eveniet.</p><p>Dolores omnis aut voluptatem nobis quos. Deserunt sint placeat nihil qui nam quae. Repellat doloremque magnam aut numquam et veritatis in. Nam voluptatem sed odio voluptas est non. Et et aut eius qui voluptatem et.</p><p>Autem vel inventore atque qui tenetur. Quod odio porro recusandae.</p><p>Suscipit deserunt iste corporis eum exercitationem magnam. Pariatur qui ad adipisci sed eum. Eos in aliquid consequatur at. Nihil deserunt est quisquam consequuntur quisquam necessitatibus.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(17, 1, 2, 'Eligendi sed consectetur.', 'commodi-fuga-laborum-numquam-sit-ea', NULL, 'Ipsam sed neque est asperiores alias et soluta. Totam illo qui nesciunt voluptatem voluptatem non. Quia eligendi quia sit ullam et. Numquam cupiditate nemo quod porro.', '<p>Et illum quas adipisci laborum ut quam. Sapiente nihil quia quos earum vero. Ratione velit ut temporibus earum.</p><p>Magni veniam exercitationem voluptas est et nobis commodi qui. Aperiam sint quia nobis molestiae expedita nobis consequuntur. Eaque repellat ut libero in. Et aut quia labore ad voluptatem. Nemo reprehenderit eum aspernatur.</p><p>Placeat sed quis eos ea. Nulla ut fuga nemo velit consectetur expedita. Saepe ut at eum doloremque. Odio mollitia exercitationem accusantium minima vel.</p><p>Reiciendis et quas sint quam iusto aut reiciendis. Nihil et omnis non. Error corrupti et vel non.</p><p>Laboriosam dolores veniam consectetur quia natus. Autem repellat et consequuntur repellendus in dignissimos. Autem qui ut earum corrupti alias dolores iusto. Culpa alias et dolores et.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(18, 2, 1, 'Occaecati itaque quae repudiandae aut.', 'deserunt-odio-non-quae-vitae-iusto-libero-impedit', NULL, 'Esse est repudiandae rem error aut. Ea et est neque a. Ea qui ipsa unde magnam aut illo tempore. Magni dolor placeat doloremque velit dolorum quis cum.', '<p>Vel distinctio sequi est eligendi omnis. Est aliquid saepe nesciunt nihil voluptas rerum eos. Odio cum et similique consectetur. Quis ea quae veritatis earum voluptates deleniti deserunt.</p><p>Eos sunt aut commodi a corporis fugiat nulla. Dolores ipsum et est quos minus sed nulla. Vel deleniti autem ut. Nemo porro aut tenetur nihil natus soluta nihil. In ea aliquam aut eos eveniet illo.</p><p>Neque aspernatur veritatis est vel accusamus maiores cum. Sequi qui dolorem rerum repellat corporis modi voluptas. Sunt nisi rerum et eos quo consequatur. Distinctio cupiditate ratione quaerat corrupti ab nesciunt quisquam.</p><p>Autem neque recusandae iste sit nesciunt sint excepturi. Tenetur voluptas soluta recusandae odio. Sint a qui sed sunt ea.</p><p>Dolorum ut assumenda quia ut. Non quae cumque eligendi optio et et. Cupiditate ullam harum quo. Soluta quia aut quo vel commodi.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(19, 1, 1, 'Eius saepe est quis.', 'laboriosam-voluptatem-odit-asperiores-perspiciatis-ut-est-ratione', NULL, 'Sunt animi consequatur tempora odio repellendus odit. Eos veniam quisquam qui ut aliquid delectus officiis. Ducimus quae quidem aut veniam assumenda tempora. Sit soluta voluptas qui sint voluptate aut. Qui et totam iusto non aut aspernatur.', '<p>Reprehenderit quia aperiam magni labore aut quod. Veniam assumenda qui mollitia molestiae cum corporis maiores. Vitae eum libero aspernatur inventore minus architecto. Non eius hic et voluptatem nemo.</p><p>Labore autem tenetur ullam deleniti quae. Aspernatur est saepe id et consectetur consectetur commodi qui. Totam officia excepturi consectetur occaecati placeat illo est. Placeat vero sunt at iusto fuga sit ut consequatur.</p><p>Ducimus suscipit est blanditiis perspiciatis enim harum amet. Est nulla fugit odio repudiandae tenetur. Occaecati libero magni id molestiae. Sint esse porro ut culpa in quaerat.</p><p>Magni omnis natus distinctio in sit. Voluptatum mollitia temporibus ipsa quia dolorem sed ullam nihil. Aut ad aspernatur asperiores.</p><p>Est saepe iure nihil voluptatem nisi doloremque. Maiores sed delectus dolor voluptas itaque esse doloremque. Ipsum est et nam.</p><p>Sit sapiente nulla molestiae nam deserunt. Incidunt et qui ut occaecati error. Omnis impedit aut laboriosam consequatur dolores. Soluta consequuntur velit praesentium vero minima. Accusamus maxime et saepe enim exercitationem.</p><p>Velit impedit eius praesentium hic. Deleniti neque velit eaque impedit fugit. Numquam quo qui qui sed voluptatem est.</p><p>Qui non et repellat deserunt consectetur sunt id. Id ipsam non qui nulla culpa. Dolor eaque est consequatur qui possimus recusandae. Quidem ut est ad et porro voluptates.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(20, 2, 1, 'Facilis culpa veritatis quasi unde alias sed.', 'alias-sit-nisi-ducimus-vel-error-nihil-id-ut', NULL, 'Beatae magnam dolore ad ut quaerat est sunt nobis. Ipsam incidunt est placeat facere quos sed optio rerum. Eveniet mollitia vel natus. Quia esse tempore doloremque officia aspernatur neque.', '<p>Perferendis officiis unde aperiam velit. Occaecati dignissimos similique temporibus quam vel maiores ut.</p><p>Tenetur distinctio neque eveniet earum non. Corporis modi ratione atque vel enim exercitationem. Modi occaecati et qui fugiat vel deleniti.</p><p>Debitis provident qui rerum magni eos. Ab quisquam dolor qui autem enim dolorum et. Aut expedita atque temporibus ipsam voluptas doloremque. Ut asperiores animi dolor officia sed consequatur.</p><p>Impedit ut quis provident quasi. Nihil dolores similique sed provident ut odio. Vel provident delectus maxime cupiditate illo.</p><p>In fugiat mollitia voluptates omnis error nobis. Voluptas ipsum alias maxime unde maiores vel est. Ut deserunt id cum aut aliquam deserunt. Autem quae ut eum nulla ut aut.</p><p>Possimus maxime eveniet earum at dignissimos quia. Vel magnam quia dolorum quasi cum voluptate. Impedit id quibusdam sequi sunt voluptatum molestias iure.</p><p>Sint qui voluptates delectus qui. Est consequatur sit autem ut. Dolorem sequi fuga qui sit consequatur dolorum maiores. Beatae quia cupiditate dolorem itaque.</p>', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54');

-- --------------------------------------------------------

--
-- Table structure for table `sambutan`
--

CREATE TABLE `sambutan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sambutan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kutipan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sejarah_singkat`
--

CREATE TABLE `sejarah_singkat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Erdika Ganteng', 'erdika', 'rhamadan.17@gmail.com', NULL, '$2y$10$mEm9pZBYtqgzjXfl.UYLEu53y/KUjDTi1k9KgEsh41ygHCWAGKigG', NULL, '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(2, 'Ella Laksita', 'luthfi.saragih', 'upranowo@example.org', '2022-06-25 06:10:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XWeMgh7Z7p', '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(3, 'Prima Wacana', 'tgunarto', 'garang53@example.org', '2022-06-25 06:10:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ItmCsdsRj7', '2022-06-25 06:10:54', '2022-06-25 06:10:54'),
(4, 'Devi Tania Haryanti', 'samiah28', 'banara.melani@example.com', '2022-06-25 06:10:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'soW02WinOG', '2022-06-25 06:10:54', '2022-06-25 06:10:54');

-- --------------------------------------------------------

--
-- Table structure for table `visions`
--

CREATE TABLE `visions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vision` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mision` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vision_missions`
--

CREATE TABLE `vision_missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `cobas`
--
ALTER TABLE `cobas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `sambutan`
--
ALTER TABLE `sambutan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sejarah_singkat`
--
ALTER TABLE `sejarah_singkat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sejarah_singkat_slug_unique` (`slug`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visions`
--
ALTER TABLE `visions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vision_missions`
--
ALTER TABLE `vision_missions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cobas`
--
ALTER TABLE `cobas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sambutan`
--
ALTER TABLE `sambutan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sejarah_singkat`
--
ALTER TABLE `sejarah_singkat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visions`
--
ALTER TABLE `visions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vision_missions`
--
ALTER TABLE `vision_missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
