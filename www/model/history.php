<?php
function get_admin_historys($db){
    $sql = "
        SELECT
            order_id,
            sum,
            create_datetime
        FROM
            item_history
        ORDER BY
            create_datetime DESC
    ";
    return fetch_all_query($db,$sql);
}

function get_user_historys($db,$user_id){
    $sql = "
        SELECT
            order_id,
            sum,
            create_datetime
        FROM
            item_history
        WHERE
            user_id = :user_id
        ORDER BY
            create_datetime DESC
    ";
    $params = array(':user_id' => $user_id);
    return fetch_all_query($db,$sql,$params);
}

function get_history_details($db,$order_id){
    $sql = "
        SELECT
            item_detail.item_id,
            name,
            amount,
            item_detail.price
        FROM
            item_detail
        INNER JOIN
            items
        ON
            item_detail.item_id = items.item_id
        WHERE
            order_id = :order_id
    ";
    $params = array(':order_id' => $order_id);
    return fetch_all_query($db,$sql,$params);
}

function get_order_data($db,$order_id){
    $sql = "
        SELECT
            sum,
            create_datetime
        FROM
            item_history
        WHERE
            order_id = :order_id
    ";
    $params = array(':order_id' => $order_id);
    return fetch_all_query($db,$sql,$params);
}