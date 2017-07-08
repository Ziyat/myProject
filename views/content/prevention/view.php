<?php 
  $titlePage = $prevention['title_'.$lang];
  $descPage = $prevention['desc_'.$lang];
  $ogTitle = $prevention['title_'.$lang];
  $ogImage = 'http://guvd.uz'.Prevention::getImage($prevention['id']);


include ROOT . '/views/content/layout/header.php'; ?>
<div class="container">
  <div class="row">
   <div class="col s12 m8 l8">
   <div class="card">
   	<div class="card-content">
   		<div class="card-title"><b><?php echo $prevention['title_'.$lang]; ?></b></div>
   		<?php echo $prevention['text_'.$lang]; ?>
   	</div>
   </div>
   
  <?php  include ROOT . '/views/content/layout/form_comment.php'; ?>
   </div>
    <div class="col s12 m4 l4">
        <?php  include ROOT . '/views/content/layout/side_nav.php'; ?>
    </div>

  </div>
</div>
<?php  include ROOT . '/views/content/layout/footer.php'; ?>