-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 26. led 2017, 22:55
-- Verze serveru: 10.1.19-MariaDB
-- Verze PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `db`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `content` text COLLATE utf8_czech_ci,
  `url` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `key_words` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `articles`
--

INSERT INTO `articles` (`article_id`, `title`, `content`, `url`, `description`, `key_words`) VALUES
(1, 'O konferenci', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In enim a arcu imperdiet malesuada. Maecenas libero. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Mauris metus. Mauris tincidunt sem sed arcu. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Nunc dapibus tortor vel mi dapibus sollicitudin. Aenean fermentum risus id tortor. In convallis. Nullam sit amet magna in magna gravida vehicula. Integer tempor. Praesent dapibus. </p>\r\n<p>Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Pellentesque ipsum. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Suspendisse sagittis ultrices augue. Mauris tincidunt sem sed arcu. Fusce consectetuer risus a nunc. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Aliquam erat volutpat. In rutrum. Morbi scelerisque luctus velit. Etiam quis quam.</p>', 'introduction', 'Úvod', 'uvod'),
(2, 'Místo konání', '<div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2579.2512777653924!2d13.35080297986635!3d49.724895897572786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcdb1feb29be3183f!2sFakulta+aplikovan%C3%BDch+v%C4%9Bd+-+Z%C3%A1pado%C4%8Desk%C3%A1+univerzita+v+Plzni!5e0!3m2!1scs!2scz!4v1485093976157" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe></div>', 'venue', 'Místo konání', 'misto konani'),
(3, 'Organizátoři', '<p>Suspendisse nisl. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Fusce tellus odio, dapibus id fermentum quis, suscipit id erat. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Aliquam ornare wisi eu metus. Nulla pulvinar eleifend sem. Curabitur ligula sapien, pulvinar a vestibulum quis, facilisis vel sapien. Maecenas aliquet accumsan leo. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Nulla est.</p>', 'leaders', 'Organizátoři', 'organizatori'),
(4, 'Pokyny pro autory', '<p>Integer imperdiet lectus quis justo. Proin in tellus sit amet nibh dignissim sagittis. Morbi imperdiet, mauris ac auctor dictum, nisl ligula egestas nulla, et sollicitudin sem purus in lacus. Donec iaculis gravida nulla. In rutrum. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Duis viverra diam non justo. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Curabitur vitae diam non enim vestibulum interdum. Integer rutrum, orci vestibulum ullamcorper ultricies, lacus quam ultricies odio, vitae placerat pede sem sit amet enim. Etiam neque. Etiam egestas wisi a erat. Maecenas libero. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Fusce wisi. Morbi leo mi, nonummy eget tristique non, rhoncus non leo.</p>\r\n\r\n<p>Pellentesque ipsum. Donec iaculis gravida nulla. Duis pulvinar. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Etiam quis quam. Duis condimentum augue id magna semper rutrum. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Nullam dapibus fermentum ipsum. Quisque tincidunt scelerisque libero. Pellentesque sapien.</p>\r\n\r\n<p>Nullam rhoncus aliquam metus. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Nulla non lectus sed nisl molestie malesuada. Etiam egestas wisi a erat. Integer rutrum, orci vestibulum ullamcorper ultricies, lacus quam ultricies odio, vitae placerat pede sem sit amet enim. Fusce suscipit libero eget elit. Maecenas lorem. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Pellentesque ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam bibendum elit eget erat. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. Donec iaculis gravida nulla. Maecenas aliquet accumsan leo.</p>\r\n\r\n<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Integer vulputate sem a nibh rutrum consequat. In convallis. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam id dolor. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nulla non arcu lacinia neque faucibus fringilla. Praesent id justo in neque elementum ultrices. Curabitur bibendum justo non orci.</p>', 'instructions', 'Pokyny pro autory', 'pokyny pro autory'),
(5, 'Sponzoři', '<p>Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. Vivamus ac leo pretium faucibus. Praesent vitae arcu tempor neque lacinia pretium. Cras elementum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Etiam egestas wisi a erat. Integer tempor. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Etiam dictum tincidunt diam. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Aenean vel massa quis mauris vehicula lacinia. Nullam at arcu a est sollicitudin euismod. Mauris dictum facilisis augue. Nulla non lectus sed nisl molestie malesuada. Etiam commodo dui eget wisi.</p>', 'sponsors', 'Sponzoři', 'sponzori'),
(6, 'Témata', '<p>Morbi imperdiet, mauris ac auctor dictum, nisl ligula egestas nulla, et sollicitudin sem purus in lacus. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Maecenas lorem. Nullam at arcu a est sollicitudin euismod. Ut tempus purus at lorem. Aenean id metus id velit ullamcorper pulvinar. Nunc tincidunt ante vitae massa. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante.</p>\r\n\r\n<p>Maecenas lorem. Fusce nibh. In rutrum. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Integer imperdiet lectus quis justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis risus. Aliquam ornare wisi eu metus. Vivamus porttitor turpis ac leo. Nulla non arcu lacinia neque faucibus fringilla.</p>\r\n\r\n<p>Etiam bibendum elit eget erat. Maecenas lorem. Nulla est. Praesent dapibus. Etiam egestas wisi a erat. Phasellus et lorem id felis nonummy placerat. Integer lacinia. Sed vel lectus. Donec odio tempus molestie, porttitor ut, iaculis quis, sem. Integer malesuada. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus.</p>\r\n\r\n<p>Pellentesque sapien. Suspendisse nisl. Aenean fermentum risus id tortor. Praesent id justo in neque elementum ultrices. Etiam commodo dui eget wisi. Donec vitae arcu. Morbi scelerisque luctus velit. Nullam faucibus mi quis velit. Donec quis nibh at felis congue commodo. Sed ac dolor sit amet purus malesuada congue. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Curabitur bibendum justo non orci. Proin mattis lacinia justo.</p>\r\n\r\n<p>Curabitur vitae diam non enim vestibulum interdum. Nam quis nulla. Aliquam in lorem sit amet leo accumsan lacinia. Quisque porta. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Aenean id metus id velit ullamcorper pulvinar. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. In enim a arcu imperdiet malesuada. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Nullam sit amet magna in magna gravida vehicula. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Etiam dictum tincidunt diam.</p>\r\n\r\n<p>Curabitur sagittis hendrerit ante. Nullam feugiat, turpis at pulvinar vulputate, erat libero tristique tellus, nec bibendum odio risus sit amet ante. Aenean fermentum risus id tortor. Integer imperdiet lectus quis justo. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque sapien. Etiam posuere lacus quis dolor. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis condimentum augue id magna semper rutrum. Integer rutrum, orci vestibulum ullamcorper ultricies, lacus quam ultricies odio, vitae placerat pede sem sit amet enim.</p>', 'topics', 'Témata', 'temata'),
(7, 'Termíny', '<p>Fusce tellus odio, dapibus id fermentum quis, suscipit id erat. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Curabitur bibendum justo non orci. Nullam eget nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Pellentesque arcu. Pellentesque pretium lectus id turpis. Aliquam id dolor. Mauris elementum mauris vitae tortor. Nulla non lectus sed nisl molestie malesuada. Quisque tincidunt scelerisque libero. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'dates', 'Termíny', 'data');

-- --------------------------------------------------------

--
-- Struktura tabulky `posts`
--

CREATE TABLE `posts` (
  `id_posts` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `author` varchar(45) NOT NULL,
  `published` int(10) DEFAULT NULL,
  `abstract` longtext NOT NULL,
  `users_id_users` int(11) NOT NULL,
  `filename` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `posts`
--

INSERT INTO `posts` (`id_posts`, `name`, `author`, `published`, `abstract`, `users_id_users`, `filename`) VALUES
(41, 'Lorem ipsum', 'Admin', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam posuere lacus quis dolor. Aliquam id dolor. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Sed convallis magna eu sem. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Fusce nibh.', 1, '21472-Test1.pdf'),
(42, 'Mauris suscipit', 'Admin a další autori', NULL, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce tellus odio, dapibus id fermentum quis, suscipit id erat. Curabitur sagittis hendrerit ante. Mauris metus. Etiam dictum tincidunt diam. Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. Duis viverra diam non justo.', 1, '5111-Test2.pdf'),
(43, 'Excepteur sint occaecat cupidatat', 'Jan Houžvicka', 0, 'Vivamus porttitor turpis ac leo. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Fusce aliquam vestibulum ipsum. ', 2, '80000-Test3.pdf'),
(44, 'In laoreet, magna id viverra tincidunt', 'Jan Houzvicka, Markéta Marková', 0, 'Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. ', 2, '30043-Test4.pdf'),
(45, 'In rutrum', 'Jaromíra Nejapná', 2, 'Pellentesque sapien. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Nulla non lectus sed nisl molestie malesuada. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, '11468-Test5.pdf'),
(46, 'Nam sed tellus id magna elementum tincidunt', 'Jaromíra Nejapná, Jolanda Bílá', 0, 'Ut tempus purus at lorem. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Proin in tellus sit amet nibh dignissim sagittis. Integer rutrum, orci vestibulum ullamcorper ultricies, lacus quam ultricies odio, vitae placerat pede sem sit amet enim. Integer imperdiet lectus quis justo. Mauris elementum mauris vitae tortor. Morbi scelerisque luctus velit.', 3, '11583-Test6.pdf');

-- --------------------------------------------------------

--
-- Struktura tabulky `ratings`
--

CREATE TABLE `ratings` (
  `id_ratings` int(11) NOT NULL,
  `originality` int(11) NOT NULL,
  `topic` int(11) NOT NULL,
  `language_level` int(11) NOT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `users_id_users` int(11) NOT NULL,
  `posts_id_posts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `ratings`
--

INSERT INTO `ratings` (`id_ratings`, `originality`, `topic`, `language_level`, `comment`, `users_id_users`, `posts_id_posts`) VALUES
(83, 5, 5, 5, ' Etiam posuere lacus quis dolor. Aliquam id dolor. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Sed convallis magna eu sem. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.', 4, 41),
(84, 5, 4, 4, 'Aliquam id dolor. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Sed convallis magna eu sem. Nam libero tempore, cum soluta nobis est eligendi optio cumque.', 5, 41),
(85, 5, 5, 4, 'Aliquam id dolor. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Sed convallis magna eu sem. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Fusce nibh.', 6, 41),
(86, 5, 4, 5, 'Aliquam erat volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque sapien. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.', 1, 43),
(87, 5, 4, 4, 'Vivamus porttitor turpis ac leo. Mauris suscipit, ligula sit amet pharetra semper.', 5, 43),
(88, 5, 3, 4, 'Vel sagittis velit mauris vel metus. Fusce aliquam vestibulum ipsum.', 6, 43),
(89, 2, 1, 2, ' Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Quisque porta. ', 1, 44),
(90, 1, 2, 2, ' Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui.', 4, 44),
(91, 1, 2, 2, ' Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui.', 5, 44),
(92, 1, 2, 2, 'Nulla non lectus sed nisl molestie malesuada. Excepteur sint occaecat cupidatat non proident.', 4, 45),
(93, 2, 1, 2, 'Duis sapien nunc, commodo et, interdum suscipit.', 5, 45),
(94, 1, 2, 2, 'Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. ', 6, 45),
(95, 5, 3, 1, 'Proin in tellus sit amet nibh dignissim sagittis. Integer rutrum, orci vestibulum ullamcorper ultricies, lacus quam ultricies odio, vitae placerat pede sem sit amet enim. Integer imperdiet lectus quis justo. Mauris elementum mauris vitae tortor. Morbi scelerisque luctus velit.', 1, 46),
(96, 0, 0, 0, NULL, 4, 46);

-- --------------------------------------------------------

--
-- Struktura tabulky `rights`
--

CREATE TABLE `rights` (
  `id_rights` int(11) NOT NULL,
  `position` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `rights`
--

INSERT INTO `rights` (`id_rights`, `position`) VALUES
(1, 'Administrator'),
(2, 'Autor'),
(3, 'Recenzent');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `rights_id_rights` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id_users`, `login`, `password`, `name`, `email`, `rights_id_rights`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin@admin.cz', 1),
(2, 'houzva23', 'heslo23', 'Evžen Houžvička', 'houzvicka@email.com', 2),
(3, 'nejapka42', 'heslo42', 'Jaromíra Nejapná', 'nejapka@email.com', 2),
(4, 'bozka69', 'heslo69', 'Božena Bezbožná', 'bozka@email.com', 3),
(5, 'poleskok007', 'heslo007', 'Marián Skočdopole', 'poleskok@email.com', 3),
(6, 'titty80085', 'heslo80085', 'Župánie Tittová', 'titty80085@email.com', 3);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Klíče pro tabulku `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_posts`),
  ADD KEY `fk_posts_users1_idx` (`users_id_users`);

--
-- Klíče pro tabulku `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id_ratings`,`users_id_users`,`posts_id_posts`),
  ADD KEY `fk_ratings_users_idx` (`users_id_users`),
  ADD KEY `fk_ratings_posts1_idx` (`posts_id_posts`);

--
-- Klíče pro tabulku `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`id_rights`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `name` (`login`),
  ADD KEY `fk_users_rights1_idx` (`rights_id_rights`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pro tabulku `posts`
--
ALTER TABLE `posts`
  MODIFY `id_posts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT pro tabulku `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id_ratings` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_users1` FOREIGN KEY (`users_id_users`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_ratings_posts1` FOREIGN KEY (`posts_id_posts`) REFERENCES `posts` (`id_posts`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ratings_users` FOREIGN KEY (`users_id_users`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_rights1` FOREIGN KEY (`rights_id_rights`) REFERENCES `rights` (`id_rights`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
