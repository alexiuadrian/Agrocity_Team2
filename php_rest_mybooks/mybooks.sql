CREATE TABLE `books`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `books` (`id`, `name`) VALUES
(1, 'Philosophers\'s stone'),
(2, 'Chambers of Secrets'),
(3, 'Prisoner of Azkaban'),
(4, 'Goblet of Fire'),
(5, 'Order of the Phoenix'),
(6, 'The Half-Blood Prince'),
(7, 'Deathly Hallows');

CREATE TABLE `paragraphs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `paragraphs` (`id`, `category_id`, `title`, `body`, `author`) VALUES
(1, 1, 'Chapter 1', 'Youre a wizard Harry!','J.K. Rowling'),
(2, 2, 'Chapter 2', 'Youre a wizard Harry!','Hagrid'),
(3, 1, 'Chapter 3', 'Youre a wizard Harry!','Harry'),
(4, 4, 'Chapter 4', 'Youre a wizard Harry!','Hermione'),
(5, 4, 'Chapter 5', 'Youre a wizard Harry!','Snape'),
(6, 1, 'Chapter 6', 'Youre a wizard Harry!','Dumbledore'),
(7, 1, 'Chapter 6', 'Youre a wizard Harry!','Dobby');


