<?php $titlePage = 'Меню';  include ROOT . '/views/content/layout/header.php'; ?>
<?php  include ROOT . '/views/content/layout/nav.php'; ?>
<div class="container">
  <div class="wrepper content" id="main">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <h3><?php echo CART; ?></h3>
      <?php if($productsInCart): ?>
        <div class="table-responsive">
          <table class="table">
            <tr>
                <td>#</td>
                <td><?php echo PHOTO; ?></td>
                <td><?php echo TITLE; ?></td>
                <td><?php echo PRICE; ?></td>
                <td><?php echo AMOUNT; ?></td>
                <td><?php echo PRODUCT_DELETE; ?></td>
            </tr>
            <?php foreach ($products as $product): ?>
              <tr>
                <td><?php echo $product['id']; ?></td>
                <td><a href="/<?php echo $lang; ?>/menu/product/<?php echo $product['id'];?>"><img src="<?php echo Product::getImage($product['id']); ?>" alt=""></a></td>
                <td><?php echo $product['title']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $productsInCart[$product['id']]; ?></td>
                <td><a class="btn btn-danger" href="/<?php echo $lang; ?>/cart/delete/<?php echo $product['id'];?>"><span class="fa fa-remove"> </span></a></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td></td>
              <td><?php echo TOTAL_COST; ?></td>
              <td></td>
              <td><?php echo $totalPrice; ?></td>
              <td></td>
              <td></td>
            </tr>
          </table>
        </div>
        <a href="/<?php echo $lang; ?>/cart/checkout" class="btn btn-success btn-lg"><?php echo CHECKOUT; ?></a>
      <?php else: ?>
        <p><?php echo EMPTY_BASKET; ?></p>
      <?php endif; ?>
      </div>
    </div>
    
<?php  include ROOT . '/views/content/layout/footer.php'; ?>
