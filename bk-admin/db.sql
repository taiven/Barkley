CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(11) NOT NULL AUTO_INCREMENT,
`admin_name` varchar(50) NOT NULL,
`admin_password` varchar(50) NOT NULL,
PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;