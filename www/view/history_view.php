<?php
header('X-FRAME-OPTIONS:DENY');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
  <link rel="stylesheet" href="<?php print(h(STYLESHEET_PATH . 'cart.css')); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入履歴</h1>
  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <?php if($user['name'] === 'admin'){ ?>
    <?php if(count($admin_historys) > 0){ ?>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>注文番号</th>
                    <th>購入日時</th>
                    <th>合計金額</th>
                    <th>購入明細</th>
                </tr>   
            </thead>
            <tbody>
                <?php foreach($admin_historys as $value){ ?>
                <tr>
                    <td><?php print(h($value['order_id'])); ?></td>
                    <td><?php print(h($value['create_datetime'])); ?></td>
                    <td><?php print(h($value['sum'])); ?></td>
                    <td>
                        <form method="post" action="history_detail.php">
                        <input class="btn btn-block btn-primary" type="submit" value="購入明細画面へ">
                        <input type="hidden" name="order_id" value="<?php print (h($value['order_id']));?>">
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php }else{ ?>
        <p>購入履歴はありません</p>
    <?php } ?>
    <?php }else{ ?>
        <?php if(count($user_historys) > 0){ ?>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>注文番号</th>
                    <th>購入日時</th>
                    <th>合計金額</th>
                    <th>購入明細</th>
                </tr>   
            </thead>
            <tbody>
                <?php foreach($user_historys as $value){ ?>
                <tr>
                    <td><?php print(h($value['order_id'])); ?></td>
                    <td><?php print(h($value['create_datetime'])); ?></td>
                    <td><?php print(h($value['sum'])); ?></td>
                    <td>
                        <form method="post" action="history_detail.php">
                        <input class="btn btn-block btn-primary" type="submit" value="購入明細画面へ">
                        <input type="hidden" name="order_id" value="<?php print (h($value['order_id']));?>">
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php }else{ ?>
        <p>購入履歴はありません</p>
    <?php } ?>
    <?php } ?>

  </div>
</body>
</html>