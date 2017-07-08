<?php $titlePage = 'Админ'; include ROOT . '/views/admin/layout/header.php'; ?>



            <div class="container text-capitalize">
                <div class="row">
                    <div class="col-lg-12">
                      <ol class="breadcrumb">
                        <li><a href="/<?php echo $lang; ?>/admin"><?php echo ADMIN_PANEL;?></a></li>
                        <li class=" active"><?php echo ADMIN_ORDERS;?></li>
                      </ol>
                        <div class="table-responsive">
                          <table class="table table-condensed table-hover">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th><?php echo NAME; ?></th>
                                      <th><?php echo PHONE; ?></th>
                                      <th><?php echo ORDER_DATE; ?></th>
                                      <th><?php echo ORDER_STATUS; ?></th>
                                      <th><!-- <?php echo ORDER_STATUS; ?> --></th>
                                      <!-- <th><?php echo PRODUCT_EDIT; ?></th> -->
                                      <!-- <th><?php echo PRODUCT_DELETE; ?></th> -->
                                  </tr>
                              </thead>
                              <tbody>
                              <?php foreach($ordersList as $order): ?>
                                  <tr class="<?php echo Order::classStatus($order['status']); ?>">
                                      <td><?php echo $order['id']; ?></td>
                                      <td><?php echo $order['name']; ?></td>
                                      <td><?php echo $order['phone']; ?></td>
                                      <td><?php echo $order['date']; ?></td>
                                      <td><?php echo Order::textStatus($order['status']);?></td>
                                      <td>
                                      <a href="/<?php echo $lang .'/admin/order/view/'. $order['id'];?>" class="btn-info btn-sm" title="<?php echo ORDER_VIEW; ?>"><i class="fa fa-eye"></i></a>
                                      <a href="/<?php echo $lang .'/admin/order/update/'. $order['id'];?>" class="btn-warning btn-sm" title="<?php echo PRODUCT_EDIT; ?>" ><i class="fa fa-edit"></i></a>
                                      <a href="/<?php echo $lang .'/admin/order/delete/'. $order['id'];?>" class="btn-danger btn-sm" title="<?php echo PRODUCT_DELETE; ?>"><i class="fa fa-trash"></i></a>
                                      </td>
                                      <!-- <td><a href="/<?php echo $lang .'/admin/order/delete/'. $order['id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td> -->
                                  </tr>
                                <?php endforeach; ?>
                              </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
       
      
<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



