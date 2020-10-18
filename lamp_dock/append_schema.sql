CREATE TABLE `item_history`(
    `order_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `sum` int(11) NOT NULL,
    `create_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `item_detail`(
    `user_id` int(11) NOT NULL,
    `item_id` int(11) NOT NULL,
    `amount` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;