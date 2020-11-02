<?php
header('X-FRAME-OPTIONS:DENY');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入明細</title>
  <link rel="stylesheet" href="<?php print(h(STYLESHEET_PATH . 'cart.css')); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入明細</h1>
  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>注文番号</th>
                    <th>購入日時</th>
                    <th>合計金額</th>
                </tr>   
            </thead>
            <tbody>
                <?php foreach($historys as $value){ ?>
                <tr>
                    <td><?php print $order_id; ?></td>
                    <td><?php print h($value['create_datetime']); ?></td>
                    <td><?php print h($value['sum']); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>商品名</th>
                    <th>商品価格</th>
                    <th>購入数</th>
                    <th>小計</th>
                </tr>   
            </thead>
            <tbody>
                <?php foreach($details as $value){ ?>
                <tr>
                    <td><?php print h($value['name']); ?></td>
                    <td><?php print h($value['price']); ?></td>
                    <td><?php print(h($value['amount'])); ?></td>
                    <td><?php print(h($value['price'] * $value['amount'])); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
  </div>
</body>
</html>