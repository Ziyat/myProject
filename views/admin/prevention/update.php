<?php $titlePage = 'Редактировать новость с дня профилактики'; include ROOT . '/views/admin/layout/header.php'; ?>
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
              <input name="title_ru" id="title_ru" type="text" class="validate" value="<?php echo $title_ru ?>">
              <label for="title_ru">Заголовок RU</label>
            </div>
            <div class="input-field col s12 m6 l6">
              <input name="title_uz" id="title_uz" type="text" class="validate" value="<?php echo $title_uz ?>">
              <label for="title_uz">Заголовок UZ</label>
            </div>
            <div class="input-field col s12 m6 l6">
              <input name="desc_ru" id="desc_ru" type="text" class="validate" value="<?php echo $desc_ru ?>">
              <label for="desc_ru">Краткое описание RU</label>
            </div>
            <div class="input-field col s12 m6 l6">
              <input name="desc_uz" id="desc_uz" type="text" class="validate" value="<?php echo $desc_uz ?>">
              <label for="desc_uz">Краткое описание UZ</label>
            </div>
            
              <div class="file-field input-field col s12 m6 l6">
                <div class="btn grey">
                  <span>Изображение</span>
                  <input type="file" name="file">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="jpg, bmp, png, jpeg">
                </div>
                <img class="responsive-img" src="<?php echo Prevention::getImage($id); ?>" alt="">
              </div>
              <div class="col s12 m6 l6">
                  <div class="switch">
                    <label>
                      Черновик
                      <input name="publish" <?php echo ($data['publish'] == 1) ? 'checked' : '';?> type="checkbox" value="1">
                      <span class="lever"></span>
                      опубликовать
                    </label>
                  </div>
              </div>
              
            <div class="input-field col s12 m12 l12">
              <p>Текст RU</p>
              <textarea name="text_ru" id="text_ru" ><?php echo $text_ru ?></textarea>
            </div>
            <div class="input-field col s12 m12 l12">
              <p>Текст UZ</p>
              <textarea name="text_uz" id="text_uz" ><?php echo $text_uz ?></textarea>
            </div>
          </div>
          <button class="btn col s12 m12 l12" type="submit" name="submit">Сохранить</button>
        </form>
    </div>
</div>
      
<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



