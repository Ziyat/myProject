<?php $titlePage = MISSING; include ROOT . '/views/content/layout/header.php'; ?>
<div class="container">
  <div class="row">
   <div class="col s12 m8 l8">
      <div class="row">
      <h5 class="center-align"><?php echo MISSING; ?></h5>
         <?php if (is_array($missing)): ?>
            <div class="row">
              <div class="col s12">
                <div class="input-field col s12">
                  <i class="material-icons prefix">search</i>
                  <input type="text" id="missing-input" class="autocomplete">
                  <label for="missing-input">Поиск</label>
                </div>
              </div>
            </div>
            <div id="result_search_missing" class="col s12 m12 l12" style="display: none;">
            <h5><?php echo RESULT_SEARCH; ?></h5>
              <div class="row">
                <div class="col s12 m12 l6">
                  <div class="card horizontal">
                      <div class="card-image">
                        <img id="img_search_missing" class="materialboxed" src="" alt="">
                      </div>
                      <div class="card-stacked">
                        <div class="card-content">
                          <b id="fio_search_missing"></b>
                          <p id="birthday_search_missing"></p>     
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <hr>
            </div>          
            <?php foreach ($missing as $value): ?>
                <div class="col s12 m12 l6">
                   <div class="card horizontal">
                      <div class="card-image">
                        <img class="materialboxed" src="<?php echo Home::getImageCategory($value['missing_id'], 'missing'); ?>" alt="">
                      </div>
                      <div class="card-stacked">
                        <div class="card-content">
                          <b class="fio"><?php echo $value['name']; ?></b>
                          <?php if ($value['birth_day'] != '0000-00-00'): ?>
                            <p><?php echo $value['birth_day'] ?></p>
                          <?php endif ?>
                            
                        </div>
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
