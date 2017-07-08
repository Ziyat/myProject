<?php $titlePage = 'Редактировать новость'; include ROOT . '/views/admin/layout/header.php'; ?>
<?php include ROOT . '/views/admin/layout/nav.php'; ?>
<div class="row">
    <div class="col s12 m4 l4">
        <?php include ROOT . '/views/admin/layout/siteBar.php'; ?>
    </div>
    <div class="col s12 m8 l8">
        <h5>Добавить новость</h5>
        <br>
        <form method="post" enctype="multipart/form-data">
          <div class="row">
              <button class="waves-effect waves-light btn-large col s12 m12 l12" type="submit" name="submit">Сохранить</button>
            <div class="input-field col s12 m6 l6">
              <input name="name" id="name" type="text" class="validate" value="<?php echo $name ?>">
              <label for="name">Имя</label>
            </div>
            <div class="input-field col s12 m12 l12">
              <input name="text" id="text" type="text" class="validate" value="<?php echo $text ?>">
              <label for="text">Текст</label>
            </div>
          </div>
          <button class="btn col s12 m12 l12" type="submit" name="submit">Сохранить</button>
        </form>
    </div>
</div>
      
<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



