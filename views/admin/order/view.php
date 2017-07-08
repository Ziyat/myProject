<?php $titlePage = 'Админ'; include ROOT . '/views/admin/layout/header.php'; ?>



            <div class="container text-capitalize">
                <div class="row">
                    <div class="col-lg-12">
                      <ol class="breadcrumb">
                        <li><a href="/<?php echo $lang; ?>/admin"><?php echo ADMIN_PANEL;?></a></li>
                        <li><a href="/<?php echo $lang; ?>/admin/order"><?php echo ADMIN_ORDERS;?></a></li>
                        <li class=" active"><?php echo ORDER_VIEW .' '.ORDER;?></li>
                      </ol>
                      <h3><?php echo ORDER_VIEW .' '.ORDER;?> #<?php echo $order['id'];?></h3>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="table-responsive">
                              <table class="table table-condensed table-hover">
                                  <tbody>
                                      <tr>
                                          <td><?php echo NAME; ?></td>
                                          <td><?php echo $order['name']?></td>
                                      </tr>
                                      <tr>
                                          <td><?php echo PHONE; ?></td>
                                          <td><?php echo $order['phone']?></td>
                                      </tr>
                                      <tr>
                                          <td><?php echo EMAIL; ?></td>
                                          <td class="text-lowercase"><?php echo $order['email']?></td>
                                      </tr>
                                      <tr>
                                          <td><?php echo COMMENT; ?></td>
                                          <td class="text-lowercase"><?php echo $order['comment']?></td>
                                      </tr>
                                      <tr>
                                          <td><?php echo ID_USER; ?></td>
                                          <td><?php echo $order['user_id']?></td>
                                      </tr>
                                      <tr class="<?php echo Order::classStatus($order['status']); ?>">
                                          <td><strong><?php echo ORDER_STATUS; ?></strong></td>
                                          <td><strong><?php echo Order::textStatus($order['status']); ?></strong></td>
                                      </tr>
                                      <tr>
                                          <td><strong><?php echo ORDER_DATE; ?></strong></td>
                                          <td><strong><?php echo Order::replaceFormatDate($order['date']);?></strong></td>
                                      </tr>
                                  </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="col-md-12">
                          <h3><?php echo ADMIN_PRODUCTS; ?></h3>
                            <div class="table-responsive">
                              <table class="table table-condensed table-hover">
                                <thead>
                                  <tr>
                                      <td>#</td>
                                      <td><?php echo TITLE; ?></td>
                                      <td><?php echo PRICE; ?></td>
                                      <td><?php echo AMOUNT; ?></td>
                                  </tr>
                                </thead>
                                  <tbody>
                                  <?php foreach ($products as $product):?>
                                    <tr>
                                      <td><? echo $product['id']; ?></td>
                                      <td><? echo $product['title']; ?></td>
                                      <td><? echo $product['price']; ?></td>
                                      <td><? echo $productsQuantity[$product['id']]; ?></td>
                                    </tr>
                                  <?php endforeach; ?>
                                  </tbody>
                              </table>
                            </div>
                            <a href="/<?php echo $lang; ?>/admin/order"" class="btn btn-default"><span class="fa fa-chevron-left"></span> <?php echo BACK; ?></a>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
       
      
<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



