<?php $titlePage = 'Интерьер'; include ROOT . '/views/content/layout/header.php'; ?>
<?php  include ROOT . '/views/content/layout/nav.php'; ?>
<div class="container">
  <div class="wrepper">
  <div id="blueimp-gallery" class="blueimp-gallery">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
<!-- The Gallery as inline carousel, can be positioned anywhere on the page -->
<div id="blueimp-video-carousel" class="blueimp-gallery blueimp-gallery-controls blueimp-gallery-carousel">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="play-pause"></a>
</div>

<div id="links">
    <div class="row">
    <?php foreach ($photos as $photo):?>
      <div class="col-xs-6 col-md-2">
	    <a href="<?php echo Photo::getImage($photo['id']);?>" title="<?php echo $photo['title_'.$lang];?>" class="thumbnail">
        	<img src="<?php echo Photo::getImage($photo['id']);?>" alt="<?php echo $photo['title_'.$lang];?>">
    	</a>
	  </div>
    <?php endforeach; ?>
	  
	</div>
 </div> 

<?php  include ROOT . '/views/content/layout/footer.php'; ?>
