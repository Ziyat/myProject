<?php $titlePage = 'Нормативные акты'; include ROOT . '/views/content/layout/header.php'; ?>
<div class="container">
  <div class="row">
   <div class="col s12 m8 l8">
      <div class="collection">
        <?php foreach ($data as $value): ?>
          <a class="collection-item" target="_blank" href="<?php echo $value['link_'.$lang] ?>"><?php echo $value['title_'.$lang] ?></a>
        <?php endforeach ?>
      </div>
   </div>
    <div class="col s12 m4 l4">
        <?php  include ROOT . '/views/content/layout/side_nav.php'; ?>
    </div>
    <div class="col s12 m12 l12">
      <div class="card">
        <?php if ($lang == 'ru'): ?>
          <a href="http://strategy.gov.uz/ru"><img class="responsive-img" src="/template/content/img/strategy_ru.gif" alt=""></a>
        <?php else: ?>
          <a href="http://strategy.gov.uz/ru"><img class="responsive-img" src="/template/content/img/strategy_uz.gif" alt=""></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php  include ROOT . '/views/content/layout/footer.php'; ?>



