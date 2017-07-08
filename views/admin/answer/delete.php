<?php $titlePage = 'Админ'; include ROOT . '/views/admin/layout/header.php'; ?>



            <div class="container text-capitalize">
                <div class="row">
                    <div class="col-lg-12">
                      <ol class="breadcrumb">
                        <li><a href="/<?php echo $lang; ?>/admin"><?php echo ADMIN_PANEL;?></a></li>
                        <li><a href="/<?php echo $lang; ?>/admin/category"><?php echo ADMIN_PRODUCTS;?></a></li>
                        <li class="active"><?php echo PRODUCT_DELETE.' '.ADMIN_CATES; ?></li>
                      </ol>
                        <h4><?php echo PRODUCT_DELETE.' '.ADMIN_CATES.'  #'. $id ?></h4>
                        <p><?php echo CATS_MESSAGE_DELETE; ?></p>
                        <form method="post">
                            <input type="submit" class="text-capitalize btn btn-danger" name="submit" value="<?php echo PRODUCT_DELETE; ?>" />
                        </form>
                    </div>
                </div>
            </div>
       
      
<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



