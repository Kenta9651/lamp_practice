<?php
header('X-FRAME-OPTIONS:DENY');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  
  <title>商品一覧</title>
  <link rel="stylesheet" href="<?php print(h(STYLESHEET_PATH . 'index.css')); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>

  <div class="container">
    <div class="text-right">
      <form method="get"  action="sort.php">
        並び替え:
        <select name="sort">
          <option value="">選択してください</option>
          <option value="new" <?php if($sort === 'new'){print 'selected';} ?>>新着順</option>
          <option value="cheap" <?php if($sort === 'cheap'){print 'selected';} ?>>価格の安い順</option>
          <option value="expensive" <?php if($sort === 'expensive'){print 'selected';} ?>>価格の高い順</option>
        </select>
        <input type="submit" value="並び替え">
      </form>
    </div>
  </div>
  

  <div class="container">
    <h1>商品一覧</h1>
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <div class="card-deck">
      <div class="row">
      <?php foreach($new as $value){ ?>
        <div class="col-6 item">
          <div class="card h-100 text-center">
            <div class="card-header">
              <?php print(h($value['name'])); ?>
            </div>
            <figure class="card-body">
              <img class="card-img" src="<?php print(h(IMAGE_PATH . $value['image'])); ?>">
              <figcaption>
                <?php print(h(number_format($value['price']))); ?>円
                <?php if($value['stock'] > 0){ ?>
                  <form action="index_add_cart.php" method="post">
                    <input type="submit" value="カートに追加" class="btn btn-primary btn-block">
                    <input type="hidden" name="item_id" value="<?php print(h($value['item_id'])); ?>">
                    <input type="hidden" name="token" value="<?php print h($token);?>">
                  </form>
                <?php } else { ?>
                  <p class="text-danger">現在売り切れです。</p>
                <?php } ?>
              </figcaption>
            </figure>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
  
</body>
</html>