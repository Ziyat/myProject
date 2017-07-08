<?php $titlePage = DAY_OF_PREVENTION; include ROOT . '/views/content/layout/header.php'; ?>
<div class="container">
  <div class="row">
   <div class="col s12 m8 l8">
   <?php if (count($preventions) <= 0 || !isset($preventions)): ?>
     <h4>Данные разрабатываются</h4>
   <?php else: ?>
   <?php foreach ($preventions as $prevention): ?>
     <div class="card horizontal">
        <div class="card-image" style="background: url(<?php echo Prevention::getImage($prevention['id']); ?>); background-size: cover; background-position: center;">
        </div>
        <div class="card-stacked">
          <div class="card-content">
          <a href="/<?php echo $lang; ?>/prevention/<?php echo $prevention['id']; ?>">
            <b><?php echo $prevention['title_'.$lang]; ?></b>
          </a>
            <p><?php echo $prevention['desc_'.$lang]; ?></p>     
          </div>
          <div class="card-action right-align grey-text text-darken-1">
            <a href="/<?php echo $lang; ?>/prevention/<?php echo $prevention['id']; ?>" class="left blue-text text-darken-4"> <?php echo MORE.'...'; ?></a>
            <?php echo Home::replaceDate($prevention['publish_at']); ?> 
          </div>
        </div>
     </div>
   <?php endforeach ?>
   <?php echo $pagination->get(); ?>
   <?php endif; ?>
   </div>
    <div class="col s12 m4 l4">
        <?php  include ROOT . '/views/content/layout/side_nav.php'; ?>
    </div>

  </div>
</div>
<?php  include ROOT . '/views/content/layout/footer.php'; ?>