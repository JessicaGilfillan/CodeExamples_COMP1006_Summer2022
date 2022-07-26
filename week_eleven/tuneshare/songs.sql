CREATE TABLE `songs1` (
  `song_id` int(10) NOT NULL,
  `favsong` varchar(100) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL
);

ALTER TABLE `songs1`
  ADD PRIMARY KEY (`song_id`);

ALTER TABLE `songs1`
  MODIFY `song_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
