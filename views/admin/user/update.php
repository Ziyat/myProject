<?php $titlePage = "Регистрация";  include ROOT . '/views/admin/layout/header.php'; ?>
<?php include ROOT . '/views/admin/layout/nav.php'; ?>
<div class="content">
  <div class="row">
    <div class="col s12 m4 l4">
       <?php include ROOT. '/views/admin/layout/siteBar.php'; ?>
    </div>
    <div class="col s12 m8 l8">
      <?php if($result):?>
            <h3><?php echo REG_SUCCEESS; ?></h3>
            <p>Имя: <b><?php echo $name ?></b></p>
            <p>Логин: <b><?php echo $login ?></b></p>
            <p>Пароль: <b><?php echo $password ?></b></p>
        <?php else: ?>
          <?php if(isset($errors) && is_array($errors)):?>
          <ul>
            <?php foreach ($errors as $error): ?>
            <li>- <?php echo $error; ?></li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
          <h3>Редактировать пользователя!</h3>
            <form action="#" method="post">
              <div class="input-field">
                <i class="material-icons prefix">supervisor_account</i>
                <input name="name" type="text" class="form-control" id="nameRegister" value="<?php echo $name; ?>">
                <label for="nameRegister"><?php echo "Наименования структурного подразделения" .'*'; ?></label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">account_box</i>
                <input name="login" type="text" class="form-control" id="login" value="<?php echo $login; ?>">
                <label for="login"><?php echo "Логин" .'*'; ?></label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">verified_user</i>
                <input name="password" type="password" class="form-control" id="password" placeholder="<?php echo PASSWORD .'*'; ?>">
              </div>
                
              <div class="input-field">
                <i class="material-icons prefix">verified_user</i>
                <input name="repassword" type="password" class="form-control" id="repassword" placeholder="<?php echo REPASSWORD .'*'; ?>">
              </div>
              <select class="browser-default" name="role">
                <option value="" disabled selected>Тип доступа</option>
                <option value="admin">Администратор</option>
                <option selected value="moderator">Модератор</option>
              </select>
              <br>
              <div class="btn-group" role="group" aria-label="...">
                  <button type="submit" name="submit" class="btn btn-success"><?php echo  SUBMIT; ?></button>
                  <button type="reset" class="btn btn-default"><?php echo  RESET; ?></button>
                  <button id="showPassword" type="button" class="btn grey darken-4 "><i id="eye" class="material-icons">visibility</i></button>
                  <button id="generatePassword" type="button" class="btn grey darken-4 "><i id="eye" class="material-icons">verified_user</i></button>
              </div>
            </form>
        <?php endif; ?>
    </div>
  </div>
</div>

<?php  include ROOT . '/views/admin/layout/footer.php'; ?>
