CREATE TABLE `images` (
  `image_id` int NOT NULL,
  `images_name` varchar(100) NOT NULL
); 

ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
