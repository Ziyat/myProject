<?php $titlePage = 'Без вести пропавшие'; include ROOT . '/views/content/layout/header.php'; ?>
<div class="container">
  <div class="row">
   <div class="col s12 m8 l8">
      <div class="row">
      <h5 class="center-align"><?php echo ALIMONY; ?></h5>
         <?php if (is_array($alimony)): ?>
            <div class="row">
              <div class="col s12">
                <div class="input-field col s12">
                  <i class="material-icons prefix">search</i>
                  <input type="text" id="alimony-input" class="autocomplete">
                  <label for="alimony-input">Поиск</label>
                </div>
              </div>
            </div>
            <div id="result_search_alimony" class="col s12 m12 l12" style="display: none;">
            <h5><?php echo RESULT_SEARCH; ?></h5>
              <div class="row">
                <div class="col s12 m12 l6">
                  <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img id="img_search_alimony" class="activator" src="" alt="">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4"><b id="fio_search_alimony"></b></span>
                      <p id="birthday_search_alimony"></p>
                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><b id="fio_search_alimony"></b><i class="material-icons right">close</i></span>
                      <?php if ($lang == 'ru'): ?>
                        <p id="descRU_search_alimony"></p>
                      <?php else: ?>
                        <p id="descUZ_search_alimony"></p>
                      <?php endif; ?>
                      
                    </div>
                  </div>
                </div>
              </div>
              <hr>
            </div>          
            <?php foreach ($alimony as $value): ?>
                <div class="col s12 m12 l6">
                   <div class="card medium">
                     <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="<?php echo Home::getImageCategory($value['alimony_id'], 'alimony'); ?>">
                     </div>
                     <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4 fio"><?php echo $value['name']; ?></span>
                          <?php if ($value['birth_day'] != '0000-00-00'): ?>
                            <p><b><?php echo WANTED . $value['birth_day'] ?></b></p>
                          <?php endif ?>
                     </div>
                     <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><?php echo $value['name']; ?><i class="material-icons right">close</i></span>
                        <p><?php echo $value['desc_'.$lang]; ?></p>
                     </div>
                   </div>
                 </div>
            <?php endforeach ?>
            <div class="col s12">
              <?php echo $pagination->get(); ?>
            </div>

         <?php else: ?>
            <h5>Данные разрабатываются</h5>
         <?php endif; ?>
     </div>
   </div>
    <div class="col s12 m4 l4">
        <?php  include ROOT . '/views/content/layout/side_nav.php'; ?>
    </div>
    <div class="col s12 m12 l12">
      <div class="card">
        <a href="http://strategy.gov.uz/ru"><img class="responsive-img" src="/template/content/img/strategy_ru.png" alt=""></a>
      </div>
    </div>
  </div>
</div>
<?php  include ROOT . '/views/content/layout/footer.php'; ?>
