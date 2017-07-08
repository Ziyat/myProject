<?php
$titlePage = 'Главная';
$descPage = OFFICIALSITE .' '.GUVDLOGO;
include ROOT . '/views/content/layout/header.php'; ?>
<div class="container">
  <div class="row">
   <div class="col s12 m8 l8">
   <div class="row">
   <div class="col s12 m12 l12">
      <h5 class="hide-on-small-only">
        <?php echo NEWS; ?>
          <a class="btn-flat waves-effect right" href="/<?php echo $lang; ?>/news">
            <?php echo MORE; ?>
          </a>
      </h5>
      <h5 class="hide-on-med-and-up center-align">
        <a class="btn-flat waves-effect" href="/<?php echo $lang; ?>/news">
            <b><?php echo NEWS; ?></b>
          </a>
      </h5>
   </div>
   <?php foreach ($news as $new): ?>
    <div class="col s12 m6 l6">
      <div class="card medium ">
          <div class="card-image">
           <a href="/<?php echo $lang; ?>/news/<?php echo $new['id']; ?>"><img src="<?php echo News::getImage($new['id']); ?>"></a>
          </div>
          <div class="card-content">
            <b class="truncate"><?php echo $new['title_'.$lang]; ?></b>
            <p><?php echo News::descReplace($new['desc_'.$lang]); ?></p>
          </div>
          <div class="card-action">
            <a class="right grey-text"><?php echo Home::replaceDate($new['publish_at']); ?> </a>
            <a href="/<?php echo $lang; ?>/news/<?php echo $new['id']; ?>"><?php echo MORE.'...'; ?></a>
          </div>
      </div>
    </div>
   <?php endforeach ?>
   <div class="col s12 m12 l12">
      <h5 class="hide-on-small-only">
        <?php echo DAY_OF_PREVENTION; ?>
          <a class="btn-flat waves-effect right" href="/<?php echo $lang; ?>/prevention">
            <?php echo MORE; ?>
          </a>
      </h5>
      <h5 class="hide-on-med-and-up center-align">
        <a class="btn-flat waves-effect" href="/<?php echo $lang; ?>/prevention">
            <b><?php echo DAY_OF_PREVENTION; ?></b>
          </a>
      </h5>
   </div>
   <?php foreach ($preventions as $prevention): ?>
    <div class="col s12 m6 l6">
      <div class="card medium ">
          <div class="card-image">
            <a href="/<?php echo $lang; ?>/prevention/<?php echo $prevention['id']; ?>"><img src="<?php echo Prevention::getImage($prevention['id']); ?>"></a>
          </div>
          <div class="card-content">
            <b class="truncate"><?php echo $prevention['title_'.$lang]; ?></b>
            <p><?php echo News::descReplace($prevention['desc_'.$lang]); ?></p>
          </div>
          <div class="card-action">
            <a class="right grey-text"><?php echo Home::replaceDate($prevention['publish_at']); ?> </a>
            <a href="/<?php echo $lang; ?>/prevention/<?php echo $prevention['id']; ?>"><?php echo MORE.'...'; ?></a>
          </div>
      </div>
    </div>
   <?php endforeach ?>
  </div>
   <!-- <a class="btn waves-effect waves-light blue darken-4" href="/<?php //echo $lang; ?>/news">
   <i class="material-icons right">send</i><?php //echo NEWS; ?></a> -->
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



