CREATE TABLE `tasks` (
  `task_id` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

ALTER TABLE `tasks`
  MODIFY `task_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;