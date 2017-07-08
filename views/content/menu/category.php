<?php $titlePage = "Категория";  include ROOT . '/views/content/layout/header.php'; ?>
<?php $n = 2; ?>
<?php  include ROOT . '/views/content/layout/nav.php'; ?>
  <div onclick="openNav()" class="open fa fa-chevron-right fa-2x"></div>
   <?php  include ROOT . '/views/content/layout/side_nav.php'; ?>
<div class="container">
  <div class="wrepper" id="main">
    <div class="row">
      <?php foreach ($itemsByCategory as $item): ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 content">
          <div class="hovereffect">
              <img class="image img-responsive" src="<?php echo Product::getImage($item['id']); ?>" alt="<?php echo $item["title_".  $lang.""]; ?>">
              <?php if($item['new']): ?>
              <img class="icon-new" src="/template/content/img/new.png" alt="new">
              <?php endif; ?>
              <?php if($item['recommended']): ?>
              <img class="icon-recommended" src="/template/content/img/recommended.png" alt="recommended">
              <?php endif; ?>
              <div class="overlay">
                  <h2><?php echo $item["title_".  $lang.""]; ?></h2>
                   <h3>
                     <span class="fa fa-money" aria-hidden="true"></span> <?php echo $item["price"].' '.CURRENCY; ?>
                     <?php if ($item["delivery_price"]): ?>
                       <span> </span>
                       <span class="fa fa-truck" aria-hidden="true"></span> <?php echo $item["delivery_price"].' '.CURRENCY; ?>
                     <?php endif ?>
                  </h3>
                  <h3>
                  <?php if ($item["weight"]): ?>
                    <span class="fa fa-balance-scale" aria-hidden="true"></span> <?php echo $item["weight"].' '.UNIT_OF_WEIGHT; ?>
                  <?php endif ?>
                  <?php if($item["volume"]): ?>
                    <span> </span>
                    <span class="fa fa-glass" aria-hidden="true"></span> <?php echo $item["volume"].' '.UNIT_OF_VOLUME; ?>
                  <?php endif ?>
                  <?php if($item["length"]): ?>
                    <span> </span>
                    <span class="fa fa-pie-chart" aria-hidden="true"></span> <?php echo $item["length"].' '.UNIT_OF_LENGTH; ?>
                  <?php endif ?>
                  </h3>
                  <a class="info" href="/<?php echo $lang; ?>/menu/product/<?php echo $item['id']; ?>"><?php echo DETAILS; ?></a>
                  <?php if($item['delivery'] && !User::isGuest()): ?>
                    <a class="info add-to-cart" href="#" data-link="/<?php echo $lang; ?>/cart/addAjax/<?php echo $item['id']; ?>"><?php echo ADD_TO_CART; ?></a>
                  <?php endif; ?>
              </div>
          </div>
      </div>
      <?php endforeach; ?>
    
   
<?php  include ROOT . '/views/content/layout/footer.php'; ?>
