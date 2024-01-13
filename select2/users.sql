
CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `name`, `password`) VALUES
(1, 'yssyogesh', 'Yogesh Singh', '12345'),
(2, 'sona', 'Sonarika Bhadoria', '123456'),
(3, 'vishal', 'Vishal Sahu', '32145'),
(4, 'sunil', 'Sunil singh', '787945'),
(5, 'vijay', 'Vijay mourya', '147526'),
(6, 'anil', 'Anil singh', '235412'),
(7, 'jiten', 'jitendra singh', '12378');
