<?php $titlePage = 'Админ'; include ROOT . '/views/admin/layout/header.php'; ?>



            <div class="container text-capitalize">
                <div class="row">
                    <div class="col-lg-12">
                      <ol class="breadcrumb">
                        <li><a href="/<?php echo $lang; ?>/admin"><?php echo ADMIN_PANEL;?></a></li>
                        <li class=" active"><?php echo ADMIN_CATS;?></li>
                      </ol>
                      <a href="/<?php echo $lang .'/admin/category/create';?>" class="btn btn-success">
                        <i class="fa fa-plus"></i> <?php echo PRODUCT_ADD.' '.ADMIN_CATES; ?>
                      </a>
                        <div class="table-responsive">
                          <table class="table table-condensed table-hover">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <!-- <th><?php echo IMAGE; ?></th> -->
                                      <th><?php echo TITLE; ?></th>
                                      <th><?php echo ADMIN_CUISINE; ?></th>
                                      <th><?php echo PRODUCT_EDIT; ?></th>
                                      <th><?php echo PRODUCT_DELETE; ?></th>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php foreach($categoryList as $category): ?>
                                  <tr>
                                      <td><?php echo $category['id']; ?></td>
                                      <!-- <td> -->
                                      <!-- <img class="img-responsive" src="<?php echo Product::getImage($product['id']); ?>"></td> -->
                                      <td><?php echo $category['title']; ?></td>
                                      <td><?php echo $category['cuisine']; ?></td>
                                      
                                      <td><a href="/<?php echo $lang .'/admin/category/update/'. $category['id'];?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                                      <td><a href="/<?php echo $lang .'/admin/category/delete/'. $category['id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                                  </tr>
                                <?php endforeach; ?>
                              </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
       
      
<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



