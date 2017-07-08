<?php $titlePage = "Авторизация";  include ROOT . '/views/admin/layout/header.php'; ?>
<div class="container">
    <div class="row">
      <div class="col s12 m8 l8 offset-m2 offset-l2 card">
        <div class="card-content">
        <?php if(isset($errors)):?>
          <ul>
          <?php foreach ($errors as $error): ?>
            <li><?php echo $error; ?></li>
          <?php endforeach; ?>
          </ul>
        <?php endif;  ?>
          <h3><?php echo  TITLE_LOGIN; ?></h3>
            <form  action="#" method="post">
              <div class="form-group">
                <input name="login" type="text" class="form-control" id="login" placeholder="<?php echo "login"; ?>">
              </div>
              <div class="form-group">
                <input name="password" type="password" class="form-control" id="password" placeholder="<?php echo  PASSWORD; ?>">
              </div>
              <div class="row">
              <div class="col s12">
                <div class="row">
                  <div class="col s12 m4 l4">
                    <img src="/components/kcaptcha/?<?php echo session_name()?>=<?php echo session_id()?>" alt="">
                  </div>
                  <div class="col s12 m12 l12 input-field">
                    <input id="captcha" type="text" name="captcha">
                    <label for="captcha">введите код с картинки</label>
                  </div>
                </div>
                   
              </div>
          </div>
              <div class="btn-group" role="group" aria-label="...">
                  <button type="submit" name="submit" class="btn btn-success"><?php echo  SUBMIT; ?></button>
                  <button type="reset" class="btn btn-default"><?php echo  RESET; ?></button>
              </div>
              
            </form>
        </div>
      </div>
    </div>
</div>
<?php  include ROOT . '/views/admin/layout/footer.php'; ?>
