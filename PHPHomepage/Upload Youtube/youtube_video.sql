
CREATE TABLE IF NOT EXISTS `videos` (
  `video_id` int(11) AUTO_INCREMENT,
  `video_title` varchar(255) NOT NULL,
  `video_description` varchar(255) NOT NULL,
  `video_tags` varchar(255) NOT NULL,
  `video_path` varchar(255)  NOT NULL,
  `youtube_video_id` varchar(255),
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`video_id`)
) AUTO_INCREMENT=1 ;

