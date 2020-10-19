CREATE TABLE `item_history`(
    `order_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `sum` int(11) NOT NULL,
    `create_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`order_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `item_detail`(
    `detail_id` int(11) NOT NULL AUTO_INCREMENT,
    `order_id` int(11) NOT NULL,
    `item_id` int(11) NOT NULL,
    `amount` int(11) NOT NULL,
    `price` int(11) NOT NULL,
    PRIMARY KEY(`detail_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;