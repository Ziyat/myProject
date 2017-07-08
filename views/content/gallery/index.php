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
<div class="content">
    <div class="row">
    <?php foreach ($galleries as $gallery): ?>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="gallery-box" bg="<?php echo Gallery::getImage($gallery['id']); ?>">
            <div class="gallery-box-bg"></div>
                <a class="text-center" href="/<?php echo $lang; ?>/gallery/view/<?php echo $gallery['id']; ?>/"><h3><?php echo $gallery['title_'. $lang]; ?></h3></a>
            </div>
        </div>
    <?php endforeach; ?>
      
    </div>
</div>
<?php  include ROOT . '/views/content/layout/footer.php'; ?>
