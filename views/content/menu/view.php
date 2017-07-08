<?php $titlePage = $item['title_'.  $lang];  include ROOT . '/views/content/layout/header.php'; ?>
<?php  include ROOT . '/views/content/layout/nav.php'; ?>
  <div onclick="openNav()" class="open fa fa-chevron-right fa-2x"></div>
<?php  include ROOT . '/views/content/layout/side_nav.php'; ?>
<?php if(!User::isGuest()): ?>
  <a href="/<?php echo $lang; ?>/cart" class="basket fa fa-shopping-cart fa-2x"> <span class="badge" id="cart-count"><?php echo Cart::countItems(); ?></span></a href="/<?php echo $lang; ?>/cart">
<?php endif; ?>
<div class="container content">
  <div class="wrepper" id="main">
    <div class="row">
      <div class="col-xs-12 col-sm-7 col-md-7">
        <div class="animated zoomIn">
             <img class="img-thumbnail" src="<?php echo Product::getImage($item['id']); ?>" alt="<?php echo $item["title_".  $lang.""]; ?>">
            
        </div>
      <!-- EndContent -->
      </div>
      <div class="col-xs-12 col-sm-5 col-md-5">
        <div class="animated zoomIn">
          <h2><?php echo $item['title_'.$lang]; ?></h2>
          <p><?php echo $item['desc_'.$lang]; ?></p>
          <hr>
          <ul class="list-group text-left">
            <li class="list-group-item"><?php echo PRICE.': '.$item['price'] .' '.CURRENCY; ?></li>
            <?php if($item['delivery'] && !User::isGuest()): ?>
            <li class="list-group-item"><?php echo DELIVERY_PRICE .': '.$item['delivery_price'].' '.CURRENCY; ?></li>
            <?php endif; ?>
            <?php if($item['weight']): ?>
            <li class="list-group-item"><?php echo WEIGHT.': '.$item['weight'] .' '. UNIT_OF_WEIGHT; ?></li>
            <?php endif; ?>
            <?php if($item['volume']): ?>
            <li class="list-group-item"><?php echo VOLUME.': '.$item['volume'] .' '. UNIT_OF_VOLUME; ?></li>
            <?php endif; ?>
            <?php if($item['length']): ?>
            <li class="list-group-item"><?php echo LENGTH.': '.$item['length'] .' '. UNIT_OF_LENGTH; ?></li>
            <?php endif; ?>
          </ul>
          <?php if($item['delivery']): ?>
              <a href="#" data-link="/<?php echo $lang; ?>/cart/addAjax/<?php echo $item['id']; ?>" class="center-block btn btn-success add-to-cart"><span class="fa fa-shopping-cart"></span> <?php echo ADD_TO_CART; ?></a>
          <?php endif; ?>
            
        </div>
      <!-- EndContent -->
      </div>
    </div>
    
<?php  include ROOT . '/views/content/layout/footer.php'; ?>
