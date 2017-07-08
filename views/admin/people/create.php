<?php $titlePage = 'Добавить без вести пропавших'; include ROOT . '/views/admin/layout/header.php'; ?>
<?php include ROOT . '/views/admin/layout/nav.php'; ?>
<div class="row">
    <div class="col s12 m4 l4">
        <?php include ROOT . '/views/admin/layout/siteBar.php'; ?>
    </div>
    <div class="col s12 m8 l8">
        <h5>Добавить без вести пропавших</h5>
        <br>
        <form method="post" enctype="multipart/form-data">
          <div class="row">
            <button class="btn col s12 m12 l12" type="submit" name="submit">Сохранить</button>
            <div class="input-field col s12 m6 l6">
              <input name="name" id="name" type="text" class="validate" value="<?php echo $missing['name']?>">
              <label for="name">ФИО</label>
              <?php if (isset($errors['name'])): ?>
                  <span class="red-text">
                      <b><?php echo $errors['name']; ?></b>
                  </span>
              <?php endif ?>
            </div>
            <div class="col s12 m6 l6">
            <br>
               <div class="switch">
                 <label>
                   Черновик
                   <input name="publish" checked type="checkbox" value="1">
                   <span class="lever"></span>
                   опубликовать
                 </label>
               </div>
            </div>
            <div class="input-field col s12 m12 l12">
              <input name="birth_day" id="birth_day" type="text" class="validate" value="<?php echo $missing['birth_day']?>">
              <label for="name">Дата рождения гггг-мм-чч</label>
            </div>
            <div class="file-field input-field col s12 m6 l6">
                <div class="btn grey">
                  <span>Изображение</span>
                  <input type="file" name="file">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="jpg, bmp, png, jpeg">
                </div>
            </div>
          <button class="btn col s12 m12 l12" type="submit" name="submit">Сохранить</button>
          </div>
        </form>
    </div>
</div>


<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



