<?php $titlePage = 'Часто задоваемые вопросы'; include ROOT . '/views/content/layout/header.php'; ?>
<div class="container">
  <div class="row">
   <div class="col s12 m8 l8">
   <h4>Данные разрабатываются</h4>
      <!-- <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header">First</div>
          <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
        <li>
          <div class="collapsible-header">Second</div>
          <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
        <li>
          <div class="collapsible-header">Third</div>
          <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
      </ul> -->
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



