
CREATE TABLE `students1` (
  `user_id` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `students1`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `students1`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;