<?php $titlePage = 'Меню';  include ROOT . '/views/content/layout/header.php'; ?>
<?php  include ROOT . '/views/content/layout/nav.php'; ?>
<div class="container">
  <div class="wrepper content" id="main">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
      <h3><?php echo CHECKOUT; ?></h3>
        <?php if ($result): ?>
          <p>Заказ оформлен. Мы Вам перезвоним.</p>
        <?php else: ?>
          <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
              <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
          <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>
          <div class="alert alert-danger" role="alert">Выбрано товаров: <?php echo '<strong>'.$totalQuantity.'</strong>'; ?>, на сумму: <?php echo '<strong>'.$totalPrice.'</strong>'; ?>, сум.</div>
          <form action="#" method="post">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
              <!-- <label for="name"><?php echo  NAME .'*'; ?></label> -->
                  <input name="name" type="text" class="form-control" id="name" value="<?php echo $name; ?>" placeholder="<?php echo  NAME .'*'; ?>">
                </div>
                <div class="form-group">
                  <!-- <label for="email"><?php echo  EMAIL .'*'; ?></label> -->
                  <input name="email" type="email" class="form-control" id="email" value="<?php echo $email; ?>" placeholder="<?php echo  EMAIL .'*'; ?>">
                </div>
                <div class="form-group">
                  <!-- <label for="email"><?php echo  PHONE .'*'; ?></label> -->
                  <!-- <input type="text" class="input-medium bfh-phone" data-format="+1 (ddd) ddd-dddd"> -->
                  <input name="phone" type="text" class="form-control bfh-phone" id="phone" value="<?php echo $phone; ?>" data-format="+998 (dd) ddd-dd-dd">
                </div>
                <div class="form-group">
                  <!-- <label for="password"><?php echo  COMMENT .'*'; ?></label> -->
                  <input name="comment" type="text" class="form-control" id="text" value="<?php echo $comment; ?>" placeholder="<?php echo COMMENT .'*'; ?>">
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <input  name="street" type="text" class="form-control" id="street" value="<?php echo  $address['street']; ?>">
                </div>
                <div class="form-group">
                  <input  name="building" type="text" class="form-control" id="building" value="<?php echo  $address['building']; ?>">
                </div>
                <div class="form-group">
                  <input  name="appt" type="text" class="form-control" id="appt" value="<?php echo  $address['appt']; ?>">
                </div>
                <div class="form-group">
                  <input  name="entrance" type="text" class="form-control" id="entrance" value="<?php echo  $address['entrance']; ?>">
                </div>
                <div class="form-group">
                  <input  name="intercom" type="text" class="form-control" id="intercom" value="<?php echo  $address['intercom']; ?>">
                </div>
                <div class="form-group">
                  <input  name="people" type="text" class="form-control" id="people" value="<?php echo  $address['people']; ?>">
                </div>
                <div class="form-group">
                  <input  name="landmark" type="text" class="form-control" id="landmark" value="<?php echo  $address['landmark']; ?>">
                </div>
              </div>
              <button type="submit" name="submit" class="btn btn-success btn-lg btn-block"><?php echo CHECKOUT; ?></button>
            </div>
          </form>
        <?php endif; ?>
      </div>
    </div>
    
<?php  include ROOT . '/views/content/layout/footer.php'; ?>
