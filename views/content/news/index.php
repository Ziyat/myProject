<?php 
  $titlePage = 'Новости';
  $descPage = 'Новости '. GUVD;
include ROOT . '/views/content/layout/header.php';
?>
<div class="container">
  <div class="row">
   <div class="col s12 m8 l8">
   <?php foreach ($news as $new): ?>
     <div class="card horizontal">
        <div class="card-image" style="background: url(<?php echo News::getImage($new['id']); ?>); background-size: cover; background-position: center;">
        </div>
        <div class="card-stacked">
          <div class="card-content">
          <a href="/<?php echo $lang; ?>/news/<?php echo $new['id']; ?>">
            <b><?php echo $new['title_'.$lang]; ?></b>
          </a>
            <p><?php echo $new['desc_'.$lang]; ?></p>     
          </div>
          <div class="card-action right-align grey-text text-darken-1">
            <a href="/<?php echo $lang; ?>/news/<?php echo $new['id']; ?>" class="left blue-text text-darken-4"> <?php echo MORE.'...'; ?></a>
            <?php echo Home::replaceDate($new['publish_at']); ?> 
          </div>
        </div>
     </div>
   <?php endforeach ?>
   <?php echo $pagination->get(); ?>
   </div>
    <div class="col s12 m4 l4">
        <?php  include ROOT . '/views/content/layout/side_nav.php'; ?>
    </div>

  </div>
</div>
<?php  include ROOT . '/views/content/layout/footer.php'; ?>