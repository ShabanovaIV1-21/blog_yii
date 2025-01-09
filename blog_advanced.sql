-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 10 2025 г., 01:31
-- Версия сервера: 8.0.29
-- Версия PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog_advanced`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `post_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `theme_id` int UNSIGNED DEFAULT NULL,
  `theme` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `preview` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `status_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `is_moderate` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `title`, `text`, `theme_id`, `theme`, `created`, `updated`, `preview`, `img`, `status_id`, `user_id`, `is_moderate`) VALUES
(20, 'Пост1', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Cubilia maecenas eget rhoncus primis senectus vitae torquent posuere. Varius nisi adipiscing duis dictumst senectus massa. Congue consectetur rhoncus sem vulputate ac dictum. Sodales nostra consequat eros eget rhoncus suspendisse quisque natoque nec. Quisque sapien tempor consequat dis dictum facilisi sed. Turpis vivamus integer sagittis tempus natoque platea. Mattis facilisi pulvinar pellentesque risus mi.\r\n\r\nVolutpat odio praesent habitant nam malesuada accumsan nulla pulvinar fermentum. Vitae taciti eleifend diam ultricies sed primis, posuere donec. Arcu eget faucibus lacinia scelerisque leo felis curae. Ex libero cubilia magnis duis quis lorem, consequat torquent. Scelerisque mattis a efficitur eros tristique a feugiat laoreet. Elementum elit elit amet erat accumsan interdum. Imperdiet viverra nulla, suspendisse taciti donec sagittis. Malesuada turpis nunc mauris consectetur, neque purus fermentum.\r\n\r\nRidiculus fringilla netus non sed adipiscing potenti lacinia. Aliquam suspendisse ac neque aliquet ornare metus. Nullam aptent risus aliquet rhoncus ultricies tincidunt imperdiet posuere platea. Habitant aptent taciti donec, lectus facilisi molestie. Mattis congue scelerisque; torquent lacus felis aliquet netus facilisi? Scelerisque urna finibus nisl cursus sodales.\r\n\r\nBibendum elit consequat class penatibus laoreet ligula arcu non. Malesuada pellentesque ultricies lectus lacus ullamcorper hac semper. Nisi ullamcorper tristique aliquet vivamus viverra dictum tempus fusce. Bibendum nullam nisi accumsan hendrerit habitasse turpis pretium. Lectus faucibus pretium dui hendrerit interdum urna. Mi luctus nec felis; sit aenean hendrerit. Efficitur tellus suscipit eleifend diam arcu rhoncus. Turpis sed nibh potenti ut suscipit sodales dictum nisi.\r\n\r\nHimenaeos ullamcorper fames neque vivamus arcu porta non. Facilisis convallis in litora gravida tincidunt efficitur. In primis parturient netus tristique vestibulum finibus. Sed duis vel tempor inceptos turpis vestibulum dignissim tristique. Sit posuere quisque fermentum; sagittis hendrerit finibus ad. Rutrum porttitor sem mattis leo, diam euismod rutrum varius mollis. Cursus platea varius commodo ac vel pellentesque egestas.', NULL, 'своя тема', '2025-01-09 21:03:57', '2025-01-09 21:03:57', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '8_1736445837.jpg', 2, 8, 0),
(21, 'Пост2', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Cubilia maecenas eget rhoncus primis senectus vitae torquent posuere. Varius nisi adipiscing duis dictumst senectus massa. Congue consectetur rhoncus sem vulputate ac dictum. Sodales nostra consequat eros eget rhoncus suspendisse quisque natoque nec. Quisque sapien tempor consequat dis dictum facilisi sed. Turpis vivamus integer sagittis tempus natoque platea. Mattis facilisi pulvinar pellentesque risus mi.\r\n\r\nVolutpat odio praesent habitant nam malesuada accumsan nulla pulvinar fermentum. Vitae taciti eleifend diam ultricies sed primis, posuere donec. Arcu eget faucibus lacinia scelerisque leo felis curae. Ex libero cubilia magnis duis quis lorem, consequat torquent. Scelerisque mattis a efficitur eros tristique a feugiat laoreet. Elementum elit elit amet erat accumsan interdum. Imperdiet viverra nulla, suspendisse taciti donec sagittis. Malesuada turpis nunc mauris consectetur, neque purus fermentum.\r\n\r\nRidiculus fringilla netus non sed adipiscing potenti lacinia. Aliquam suspendisse ac neque aliquet ornare metus. Nullam aptent risus aliquet rhoncus ultricies tincidunt imperdiet posuere platea. Habitant aptent taciti donec, lectus facilisi molestie. Mattis congue scelerisque; torquent lacus felis aliquet netus facilisi? Scelerisque urna finibus nisl cursus sodales.\r\n\r\nBibendum elit consequat class penatibus laoreet ligula arcu non. Malesuada pellentesque ultricies lectus lacus ullamcorper hac semper. Nisi ullamcorper tristique aliquet vivamus viverra dictum tempus fusce. Bibendum nullam nisi accumsan hendrerit habitasse turpis pretium. Lectus faucibus pretium dui hendrerit interdum urna. Mi luctus nec felis; sit aenean hendrerit. Efficitur tellus suscipit eleifend diam arcu rhoncus. Turpis sed nibh potenti ut suscipit sodales dictum nisi.\r\n\r\nHimenaeos ullamcorper fames neque vivamus arcu porta non. Facilisis convallis in litora gravida tincidunt efficitur. In primis parturient netus tristique vestibulum finibus. Sed duis vel tempor inceptos turpis vestibulum dignissim tristique. Sit posuere quisque fermentum; sagittis hendrerit finibus ad. Rutrum porttitor sem mattis leo, diam euismod rutrum varius mollis. Cursus platea varius commodo ac vel pellentesque egestas.', 4, NULL, '2025-01-09 21:04:54', '2025-01-09 21:04:54', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '8_1736445894.jpg', 2, 8, 0),
(22, 'Пост3', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Cubilia maecenas eget rhoncus primis senectus vitae torquent posuere. Varius nisi adipiscing duis dictumst senectus massa. Congue consectetur rhoncus sem vulputate ac dictum. Sodales nostra consequat eros eget rhoncus suspendisse quisque natoque nec. Quisque sapien tempor consequat dis dictum facilisi sed. Turpis vivamus integer sagittis tempus natoque platea. Mattis facilisi pulvinar pellentesque risus mi.\r\n\r\nVolutpat odio praesent habitant nam malesuada accumsan nulla pulvinar fermentum. Vitae taciti eleifend diam ultricies sed primis, posuere donec. Arcu eget faucibus lacinia scelerisque leo felis curae. Ex libero cubilia magnis duis quis lorem, consequat torquent. Scelerisque mattis a efficitur eros tristique a feugiat laoreet. Elementum elit elit amet erat accumsan interdum. Imperdiet viverra nulla, suspendisse taciti donec sagittis. Malesuada turpis nunc mauris consectetur, neque purus fermentum.\r\n\r\nRidiculus fringilla netus non sed adipiscing potenti lacinia. Aliquam suspendisse ac neque aliquet ornare metus. Nullam aptent risus aliquet rhoncus ultricies tincidunt imperdiet posuere platea. Habitant aptent taciti donec, lectus facilisi molestie. Mattis congue scelerisque; torquent lacus felis aliquet netus facilisi? Scelerisque urna finibus nisl cursus sodales.\r\n\r\nBibendum elit consequat class penatibus laoreet ligula arcu non. Malesuada pellentesque ultricies lectus lacus ullamcorper hac semper. Nisi ullamcorper tristique aliquet vivamus viverra dictum tempus fusce. Bibendum nullam nisi accumsan hendrerit habitasse turpis pretium. Lectus faucibus pretium dui hendrerit interdum urna. Mi luctus nec felis; sit aenean hendrerit. Efficitur tellus suscipit eleifend diam arcu rhoncus. Turpis sed nibh potenti ut suscipit sodales dictum nisi.\r\n\r\nHimenaeos ullamcorper fames neque vivamus arcu porta non. Facilisis convallis in litora gravida tincidunt efficitur. In primis parturient netus tristique vestibulum finibus. Sed duis vel tempor inceptos turpis vestibulum dignissim tristique. Sit posuere quisque fermentum; sagittis hendrerit finibus ad. Rutrum porttitor sem mattis leo, diam euismod rutrum varius mollis. Cursus platea varius commodo ac vel pellentesque egestas.', 5, NULL, '2025-01-09 21:06:06', '2025-01-09 21:06:06', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '8_1736445966.jpg', 1, 8, 1),
(23, 'Пост4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 4, NULL, '2025-01-09 21:07:23', '2025-01-09 21:07:23', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Cubilia maecenas eget rhoncus primis senectus vitae torquent posuere. Varius nisi adipiscing duis dictumst senectus massa. Congue consectetur rhoncus sem vulputate ac dictum. Sodales nostra consequat er', '8_1736446043.jpg', 2, 8, 0),
(24, 'Пост5', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Cubilia maecenas eget rhoncus primis senectus vitae torquent posuere. Varius nisi adipiscing duis dictumst senectus massa. Congue consectetur rhoncus sem vulputate ac dictum. Sodales nostra consequat eros eget rhoncus suspendisse quisque natoque nec. Quisque sapien tempor consequat dis dictum facilisi sed. Turpis vivamus integer sagittis tempus natoque platea. Mattis facilisi pulvinar pellentesque risus mi.\r\n\r\nVolutpat odio praesent habitant nam malesuada accumsan nulla pulvinar fermentum. Vitae taciti eleifend diam ultricies sed primis, posuere donec. Arcu eget faucibus lacinia scelerisque leo felis curae. Ex libero cubilia magnis duis quis lorem, consequat torquent. Scelerisque mattis a efficitur eros tristique a feugiat laoreet. Elementum elit elit amet erat accumsan interdum. Imperdiet viverra nulla, suspendisse taciti donec sagittis. Malesuada turpis nunc mauris consectetur, neque purus fermentum.\r\n\r\nRidiculus fringilla netus non sed adipiscing potenti lacinia. Aliquam suspendisse ac neque aliquet ornare metus. Nullam aptent risus aliquet rhoncus ultricies tincidunt imperdiet posuere platea. Habitant aptent taciti donec, lectus facilisi molestie. Mattis congue scelerisque; torquent lacus felis aliquet netus facilisi? Scelerisque urna finibus nisl cursus sodales.\r\n\r\nBibendum elit consequat class penatibus laoreet ligula arcu non. Malesuada pellentesque ultricies lectus lacus ullamcorper hac semper. Nisi ullamcorper tristique aliquet vivamus viverra dictum tempus fusce. Bibendum nullam nisi accumsan hendrerit habitasse turpis pretium. Lectus faucibus pretium dui hendrerit interdum urna. Mi luctus nec felis; sit aenean hendrerit. Efficitur tellus suscipit eleifend diam arcu rhoncus. Turpis sed nibh potenti ut suscipit sodales dictum nisi.\r\n\r\nHimenaeos ullamcorper fames neque vivamus arcu porta non. Facilisis convallis in litora gravida tincidunt efficitur. In primis parturient netus tristique vestibulum finibus. Sed duis vel tempor inceptos turpis vestibulum dignissim tristique. Sit posuere quisque fermentum; sagittis hendrerit finibus ad. Rutrum porttitor sem mattis leo, diam euismod rutrum varius mollis. Cursus platea varius commodo ac vel pellentesque egestas.', 4, NULL, '2025-01-09 21:55:03', '2025-01-09 21:55:03', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '6_1736448903.jpg', 2, 6, 0),
(25, 'Пост6', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Cubilia maecenas eget rhoncus primis senectus vitae torquent posuere. Varius nisi adipiscing duis dictumst senectus massa. Congue consectetur rhoncus sem vulputate ac dictum. Sodales nostra consequat eros eget rhoncus suspendisse quisque natoque nec. Quisque sapien tempor consequat dis dictum facilisi sed. Turpis vivamus integer sagittis tempus natoque platea. Mattis facilisi pulvinar pellentesque risus mi.\r\n\r\nVolutpat odio praesent habitant nam malesuada accumsan nulla pulvinar fermentum. Vitae taciti eleifend diam ultricies sed primis, posuere donec. Arcu eget faucibus lacinia scelerisque leo felis curae. Ex libero cubilia magnis duis quis lorem, consequat torquent. Scelerisque mattis a efficitur eros tristique a feugiat laoreet. Elementum elit elit amet erat accumsan interdum. Imperdiet viverra nulla, suspendisse taciti donec sagittis. Malesuada turpis nunc mauris consectetur, neque purus fermentum.\r\n\r\nRidiculus fringilla netus non sed adipiscing potenti lacinia. Aliquam suspendisse ac neque aliquet ornare metus. Nullam aptent risus aliquet rhoncus ultricies tincidunt imperdiet posuere platea. Habitant aptent taciti donec, lectus facilisi molestie. Mattis congue scelerisque; torquent lacus felis aliquet netus facilisi? Scelerisque urna finibus nisl cursus sodales.\r\n\r\nBibendum elit consequat class penatibus laoreet ligula arcu non. Malesuada pellentesque ultricies lectus lacus ullamcorper hac semper. Nisi ullamcorper tristique aliquet vivamus viverra dictum tempus fusce. Bibendum nullam nisi accumsan hendrerit habitasse turpis pretium. Lectus faucibus pretium dui hendrerit interdum urna. Mi luctus nec felis; sit aenean hendrerit. Efficitur tellus suscipit eleifend diam arcu rhoncus. Turpis sed nibh potenti ut suscipit sodales dictum nisi.\r\n\r\nHimenaeos ullamcorper fames neque vivamus arcu porta non. Facilisis convallis in litora gravida tincidunt efficitur. In primis parturient netus tristique vestibulum finibus. Sed duis vel tempor inceptos turpis vestibulum dignissim tristique. Sit posuere quisque fermentum; sagittis hendrerit finibus ad. Rutrum porttitor sem mattis leo, diam euismod rutrum varius mollis. Cursus platea varius commodo ac vel pellentesque egestas.', 4, NULL, '2025-01-09 21:55:56', '2025-01-09 21:55:56', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '6_1736448956.jpg', 2, 6, 0),
(26, 'Пост7', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Cubilia maecenas eget rhoncus primis senectus vitae torquent posuere. Varius nisi adipiscing duis dictumst senectus massa. Congue consectetur rhoncus sem vulputate ac dictum. Sodales nostra consequat eros eget rhoncus suspendisse quisque natoque nec. Quisque sapien tempor consequat dis dictum facilisi sed. Turpis vivamus integer sagittis tempus natoque platea. Mattis facilisi pulvinar pellentesque risus mi.\r\n\r\nVolutpat odio praesent habitant nam malesuada accumsan nulla pulvinar fermentum. Vitae taciti eleifend diam ultricies sed primis, posuere donec. Arcu eget faucibus lacinia scelerisque leo felis curae. Ex libero cubilia magnis duis quis lorem, consequat torquent. Scelerisque mattis a efficitur eros tristique a feugiat laoreet. Elementum elit elit amet erat accumsan interdum. Imperdiet viverra nulla, suspendisse taciti donec sagittis. Malesuada turpis nunc mauris consectetur, neque purus fermentum.\r\n\r\nRidiculus fringilla netus non sed adipiscing potenti lacinia. Aliquam suspendisse ac neque aliquet ornare metus. Nullam aptent risus aliquet rhoncus ultricies tincidunt imperdiet posuere platea. Habitant aptent taciti donec, lectus facilisi molestie. Mattis congue scelerisque; torquent lacus felis aliquet netus facilisi? Scelerisque urna finibus nisl cursus sodales.\r\n\r\nBibendum elit consequat class penatibus laoreet ligula arcu non. Malesuada pellentesque ultricies lectus lacus ullamcorper hac semper. Nisi ullamcorper tristique aliquet vivamus viverra dictum tempus fusce. Bibendum nullam nisi accumsan hendrerit habitasse turpis pretium. Lectus faucibus pretium dui hendrerit interdum urna. Mi luctus nec felis; sit aenean hendrerit. Efficitur tellus suscipit eleifend diam arcu rhoncus. Turpis sed nibh potenti ut suscipit sodales dictum nisi.\r\n\r\nHimenaeos ullamcorper fames neque vivamus arcu porta non. Facilisis convallis in litora gravida tincidunt efficitur. In primis parturient netus tristique vestibulum finibus. Sed duis vel tempor inceptos turpis vestibulum dignissim tristique. Sit posuere quisque fermentum; sagittis hendrerit finibus ad. Rutrum porttitor sem mattis leo, diam euismod rutrum varius mollis. Cursus platea varius commodo ac vel pellentesque egestas.', NULL, 'another', '2025-01-09 21:56:44', '2025-01-09 21:56:44', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '6_1736449004.jpg', 1, 6, 0),
(27, 'Пост8', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Cubilia maecenas eget rhoncus primis senectus vitae torquent posuere. Varius nisi adipiscing duis dictumst senectus massa. Congue consectetur rhoncus sem vulputate ac dictum. Sodales nostra consequat eros eget rhoncus suspendisse quisque natoque nec. Quisque sapien tempor consequat dis dictum facilisi sed. Turpis vivamus integer sagittis tempus natoque platea. Mattis facilisi pulvinar pellentesque risus mi.\r\n\r\nVolutpat odio praesent habitant nam malesuada accumsan nulla pulvinar fermentum. Vitae taciti eleifend diam ultricies sed primis, posuere donec. Arcu eget faucibus lacinia scelerisque leo felis curae. Ex libero cubilia magnis duis quis lorem, consequat torquent. Scelerisque mattis a efficitur eros tristique a feugiat laoreet. Elementum elit elit amet erat accumsan interdum. Imperdiet viverra nulla, suspendisse taciti donec sagittis. Malesuada turpis nunc mauris consectetur, neque purus fermentum.\r\n\r\nRidiculus fringilla netus non sed adipiscing potenti lacinia. Aliquam suspendisse ac neque aliquet ornare metus. Nullam aptent risus aliquet rhoncus ultricies tincidunt imperdiet posuere platea. Habitant aptent taciti donec, lectus facilisi molestie. Mattis congue scelerisque; torquent lacus felis aliquet netus facilisi? Scelerisque urna finibus nisl cursus sodales.\r\n\r\nBibendum elit consequat class penatibus laoreet ligula arcu non. Malesuada pellentesque ultricies lectus lacus ullamcorper hac semper. Nisi ullamcorper tristique aliquet vivamus viverra dictum tempus fusce. Bibendum nullam nisi accumsan hendrerit habitasse turpis pretium. Lectus faucibus pretium dui hendrerit interdum urna. Mi luctus nec felis; sit aenean hendrerit. Efficitur tellus suscipit eleifend diam arcu rhoncus. Turpis sed nibh potenti ut suscipit sodales dictum nisi.\r\n\r\nHimenaeos ullamcorper fames neque vivamus arcu porta non. Facilisis convallis in litora gravida tincidunt efficitur. In primis parturient netus tristique vestibulum finibus. Sed duis vel tempor inceptos turpis vestibulum dignissim tristique. Sit posuere quisque fermentum; sagittis hendrerit finibus ad. Rutrum porttitor sem mattis leo, diam euismod rutrum varius mollis. Cursus platea varius commodo ac vel pellentesque egestas.', 4, NULL, '2025-01-09 21:57:27', '2025-01-09 21:57:27', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '6_1736449047.jpg', 2, 6, 0),
(28, 'Пост9', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Cubilia maecenas eget rhoncus primis senectus vitae torquent posuere. Varius nisi adipiscing duis dictumst senectus massa. Congue consectetur rhoncus sem vulputate ac dictum. Sodales nostra consequat eros eget rhoncus suspendisse quisque natoque nec. Quisque sapien tempor consequat dis dictum facilisi sed. Turpis vivamus integer sagittis tempus natoque platea. Mattis facilisi pulvinar pellentesque risus mi.\r\n\r\nVolutpat odio praesent habitant nam malesuada accumsan nulla pulvinar fermentum. Vitae taciti eleifend diam ultricies sed primis, posuere donec. Arcu eget faucibus lacinia scelerisque leo felis curae. Ex libero cubilia magnis duis quis lorem, consequat torquent. Scelerisque mattis a efficitur eros tristique a feugiat laoreet. Elementum elit elit amet erat accumsan interdum. Imperdiet viverra nulla, suspendisse taciti donec sagittis. Malesuada turpis nunc mauris consectetur, neque purus fermentum.\r\n\r\nRidiculus fringilla netus non sed adipiscing potenti lacinia. Aliquam suspendisse ac neque aliquet ornare metus. Nullam aptent risus aliquet rhoncus ultricies tincidunt imperdiet posuere platea. Habitant aptent taciti donec, lectus facilisi molestie. Mattis congue scelerisque; torquent lacus felis aliquet netus facilisi? Scelerisque urna finibus nisl cursus sodales.\r\n\r\nBibendum elit consequat class penatibus laoreet ligula arcu non. Malesuada pellentesque ultricies lectus lacus ullamcorper hac semper. Nisi ullamcorper tristique aliquet vivamus viverra dictum tempus fusce. Bibendum nullam nisi accumsan hendrerit habitasse turpis pretium. Lectus faucibus pretium dui hendrerit interdum urna. Mi luctus nec felis; sit aenean hendrerit. Efficitur tellus suscipit eleifend diam arcu rhoncus. Turpis sed nibh potenti ut suscipit sodales dictum nisi.\r\n\r\nHimenaeos ullamcorper fames neque vivamus arcu porta non. Facilisis convallis in litora gravida tincidunt efficitur. In primis parturient netus tristique vestibulum finibus. Sed duis vel tempor inceptos turpis vestibulum dignissim tristique. Sit posuere quisque fermentum; sagittis hendrerit finibus ad. Rutrum porttitor sem mattis leo, diam euismod rutrum varius mollis. Cursus platea varius commodo ac vel pellentesque egestas.', 4, NULL, '2025-01-09 21:59:56', '2025-01-09 21:59:56', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '6_1736449196.jpg', 2, 6, 0),
(29, 'Пост10', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Cubilia maecenas eget rhoncus primis senectus vitae torquent posuere. Varius nisi adipiscing duis dictumst senectus massa. Congue consectetur rhoncus sem vulputate ac dictum. Sodales nostra consequat eros eget rhoncus suspendisse quisque natoque nec. Quisque sapien tempor consequat dis dictum facilisi sed. Turpis vivamus integer sagittis tempus natoque platea. Mattis facilisi pulvinar pellentesque risus mi.\r\n\r\nVolutpat odio praesent habitant nam malesuada accumsan nulla pulvinar fermentum. Vitae taciti eleifend diam ultricies sed primis, posuere donec. Arcu eget faucibus lacinia scelerisque leo felis curae. Ex libero cubilia magnis duis quis lorem, consequat torquent. Scelerisque mattis a efficitur eros tristique a feugiat laoreet. Elementum elit elit amet erat accumsan interdum. Imperdiet viverra nulla, suspendisse taciti donec sagittis. Malesuada turpis nunc mauris consectetur, neque purus fermentum.\r\n\r\nRidiculus fringilla netus non sed adipiscing potenti lacinia. Aliquam suspendisse ac neque aliquet ornare metus. Nullam aptent risus aliquet rhoncus ultricies tincidunt imperdiet posuere platea. Habitant aptent taciti donec, lectus facilisi molestie. Mattis congue scelerisque; torquent lacus felis aliquet netus facilisi? Scelerisque urna finibus nisl cursus sodales.\r\n\r\nBibendum elit consequat class penatibus laoreet ligula arcu non. Malesuada pellentesque ultricies lectus lacus ullamcorper hac semper. Nisi ullamcorper tristique aliquet vivamus viverra dictum tempus fusce. Bibendum nullam nisi accumsan hendrerit habitasse turpis pretium. Lectus faucibus pretium dui hendrerit interdum urna. Mi luctus nec felis; sit aenean hendrerit. Efficitur tellus suscipit eleifend diam arcu rhoncus. Turpis sed nibh potenti ut suscipit sodales dictum nisi.\r\n\r\nHimenaeos ullamcorper fames neque vivamus arcu porta non. Facilisis convallis in litora gravida tincidunt efficitur. In primis parturient netus tristique vestibulum finibus. Sed duis vel tempor inceptos turpis vestibulum dignissim tristique. Sit posuere quisque fermentum; sagittis hendrerit finibus ad. Rutrum porttitor sem mattis leo, diam euismod rutrum varius mollis. Cursus platea varius commodo ac vel pellentesque egestas.', 5, NULL, '2025-01-09 22:00:53', '2025-01-09 22:00:53', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '6_1736449253.jpg', 2, 6, 0),
(30, 'Пост11', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Cubilia maecenas eget rhoncus primis senectus vitae torquent posuere. Varius nisi adipiscing duis dictumst senectus massa. Congue consectetur rhoncus sem vulputate ac dictum. Sodales nostra consequat eros eget rhoncus suspendisse quisque natoque nec. Quisque sapien tempor consequat dis dictum facilisi sed. Turpis vivamus integer sagittis tempus natoque platea. Mattis facilisi pulvinar pellentesque risus mi.\r\n\r\nVolutpat odio praesent habitant nam malesuada accumsan nulla pulvinar fermentum. Vitae taciti eleifend diam ultricies sed primis, posuere donec. Arcu eget faucibus lacinia scelerisque leo felis curae. Ex libero cubilia magnis duis quis lorem, consequat torquent. Scelerisque mattis a efficitur eros tristique a feugiat laoreet. Elementum elit elit amet erat accumsan interdum. Imperdiet viverra nulla, suspendisse taciti donec sagittis. Malesuada turpis nunc mauris consectetur, neque purus fermentum.\r\n\r\nRidiculus fringilla netus non sed adipiscing potenti lacinia. Aliquam suspendisse ac neque aliquet ornare metus. Nullam aptent risus aliquet rhoncus ultricies tincidunt imperdiet posuere platea. Habitant aptent taciti donec, lectus facilisi molestie. Mattis congue scelerisque; torquent lacus felis aliquet netus facilisi? Scelerisque urna finibus nisl cursus sodales.\r\n\r\nBibendum elit consequat class penatibus laoreet ligula arcu non. Malesuada pellentesque ultricies lectus lacus ullamcorper hac semper. Nisi ullamcorper tristique aliquet vivamus viverra dictum tempus fusce. Bibendum nullam nisi accumsan hendrerit habitasse turpis pretium. Lectus faucibus pretium dui hendrerit interdum urna. Mi luctus nec felis; sit aenean hendrerit. Efficitur tellus suscipit eleifend diam arcu rhoncus. Turpis sed nibh potenti ut suscipit sodales dictum nisi.\r\n\r\nHimenaeos ullamcorper fames neque vivamus arcu porta non. Facilisis convallis in litora gravida tincidunt efficitur. In primis parturient netus tristique vestibulum finibus. Sed duis vel tempor inceptos turpis vestibulum dignissim tristique. Sit posuere quisque fermentum; sagittis hendrerit finibus ad. Rutrum porttitor sem mattis leo, diam euismod rutrum varius mollis. Cursus platea varius commodo ac vel pellentesque egestas.', NULL, 'theme', '2025-01-09 22:01:49', '2025-01-09 22:01:49', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Cubilia maecenas eget rhoncus primis senectus vitae torquent posuere. Varius nisi adipiscing duis dictumst senectus massa. Congue consectetur rhoncus sem vulputate ac dictum. Sodales nostra consequat er', '6_1736449309.jpg', 2, 6, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `reaction`
--

CREATE TABLE `reaction` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `post_id` int UNSIGNED NOT NULL,
  `reaction` tinyint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `title`) VALUES
(1, 'admin'),
(3, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `title`) VALUES
(1, 'Редактирование'),
(2, 'Одобрен'),
(3, 'Запрещен');

-- --------------------------------------------------------

--
-- Структура таблицы `theme`
--

CREATE TABLE `theme` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `theme`
--

INSERT INTO `theme` (`id`, `title`) VALUES
(4, 'тема 1'),
(5, 'тема 2');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `role_id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `is_blocked` tinyint DEFAULT NULL,
  `block_time` datetime DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `role_id`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `phone`, `avatar`, `is_blocked`, `block_time`, `auth_key`) VALUES
(2, 1, 'имя', 'фамилия', '', 'admin-bloger', '2@gmail.com', '$2y$13$NX1U5iKD3pw0a.OClsAAu.w/9hH0zFVRkMrUJp8UI9cwkWStJOAky', '+7(999)-999-99-99', '', NULL, NULL, 'LfOPClzM1op8xtXd7ovEvhHkDQGl4-HF'),
(3, 3, 'Имя', 'Фамилия', 'Отчество', 'user', '2@gmail.co', '$2y$13$s0FH/yvqvsH1bsXtxdSGR.lOIpKo21mDJ16lUwZMmVjtWS9arMawC', '+7(999)-999-99-99', '_1733937741_zPxA-1deh4z6GsJx9G4Igf6SjyM_HSVW.jpg', NULL, NULL, '_TE6g9wdiHZQ2QZa7SPpuU6qN0bymeAZ'),
(4, 3, 'Имя', 'Фамлия', 'Отчество', 'ab', 'dv@s.d', '$2y$13$dKjimt6qAR7sEGJfpdEEyuAJ0N.gPE3byK2WjYAhCKJGxzhhQAASC', '+7(333)-333-33-33', '_1734291054_V4qZ09Fw5VoRJvVD58KS901mCg49AQFq.jpg', NULL, NULL, 'w3dHTiYUB3cXXXDPl1ewlthspvKf-MdL'),
(6, 3, 'Иван', 'Иванов', 'Иванович', 'ivan', 'ivan@gmail.com', '$2y$13$tgewZAXrDehM2RIxG2xIsOOyJOwu/TvefanoYLa7obuhwfXQft7GC', '+7(457)-467-56-85', '_1736445239_JlOuX8yV1oPGPwCa3aJlmk7DzO4fVjIj.jpg', NULL, NULL, 'VKrkD2yw-VZaikolr_OdOZmnqPdIUrRo'),
(8, 3, 'Михаил', 'Михайлов', 'Михайлович', 'mik', 'mik@gmail.com', '$2y$13$xn5L5hO2vhc5HGCayBQWeOc2ZoTKjM9mJaaFxh.qee7pH8gd7wSLG', '+7(457)-467-56-85', '_1736445478_RQx9TqC84LocurSvigyf-JUKm9_SjGAY.jpg', NULL, NULL, 'W7r7IZlYZg4fEMBxndaF3O05C2SjHrYz');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_ibfk_1` (`parent_id`),
  ADD KEY `comment_ibfk_2` (`post_id`),
  ADD KEY `comment_ibfk_3` (`user_id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_ibfk_1` (`status_id`),
  ADD KEY `post_ibfk_2` (`user_id`),
  ADD KEY `theme_id` (`theme_id`);

--
-- Индексы таблицы `reaction`
--
ALTER TABLE `reaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reaction_ibfk_1` (`post_id`),
  ADD KEY `reaction_ibfk_2` (`user_id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_ibfk_1` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `reaction`
--
ALTER TABLE `reaction`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reaction`
--
ALTER TABLE `reaction`
  ADD CONSTRAINT `reaction_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reaction_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
