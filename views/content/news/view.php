<?php
  $titlePage = $new['title_'.$lang];
  $descPage = $new['desc_'.$lang];
  $ogTitle = $new['title_'.$lang];
  $ogImage = 'http://guvd.uz'.News::getImage($new['id']);
  include ROOT . '/views/content/layout/header.php';
?>
<div class="container">
  <div class="row">
   <div class="col s12 m8 l8">
   <div class="card">
   	<div class="card-content">
   		<div class="card-title"><b><?php echo $new['title_'.$lang]; ?></b></div>
   		<?php echo $new['text_'.$lang]; ?>
   	</div>
   </div>
   <div class="card">
      <div class="card-image">
        <a href="https://t.me/joinchat/AAAAAEO4fvASnSxmwOAjcA"><img src="/template/content/img/tg.jpg" class="responsive-img"></a>      
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