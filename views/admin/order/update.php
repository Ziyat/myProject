<?php $titlePage = 'Админ'; include ROOT . '/views/admin/layout/header.php'; ?>



            <div class="container text-capitalize">
                <div class="row">
                    <div class="col-lg-12">
                      <ol class="breadcrumb">
                        <li><a href="/<?php echo $lang; ?>/admin"><?php echo ADMIN_PANEL;?></a></li>
                        <li><a href="/<?php echo $lang; ?>/admin/order"><?php echo ORDER;?></a></li>
                        <li class="active"><?php echo PRODUCT_EDIT .' '.ORDER; ?></li>
                      </ol>
                        <h4><?php echo PRODUCT_EDIT.' '.ORDER; ?></h4>
                        <row>
                            <div class="col-lg-6">
                                <form action="#" method="post" enctype="multipart/form-data">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="name" ><?php echo NAME; ?></span>
                                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $order['name']?>">
                                    </div>
                                    <label></label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="phone" ><?php echo PHONE; ?></span>
                                        <input name="phone" type="text" class="form-control bfh-phone" id="phone" data-format="+998 (dd) ddd-dd-dd" value="<?php echo $order['phone']?>" />
                                    </div>
                                    <label></label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="email" ><?php echo EMAIL; ?></span>
                                        <input name="email" type="text" class="form-control bfh-email" id="email" data-format="+998 (dd) ddd-dd-dd" value="<?php echo $order['email']?>" />
                                    </div>
                                    <label></label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="comment" ><?php echo COMMENT; ?></span>
                                        <input type="text" class="form-control" name="comment"  id="comment" 
                                        value="<?php echo $order['comment']?>">
                                    </div>
                                    <label></label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="date" ><?php echo ORDER_DATE; ?></span>
                                        <input type="text" class="form-control" name="date"  id="date" 
                                        value="<?php echo $order['date']?>">
                                    </div>
                                    <label></label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="status" ><?php echo ORDER_STATUS; ?></span>
                                        <select class="form-control" name="status" id="status">
                                            <option value="0" <?php if($order['status'] == 0){echo 'selected';} ?>><?php echo ORDER_NEW; ?></option>
                                            <option value="1" <?php if($order['status'] == 1){echo 'selected';} ?>><?php echo ORDER_TO_PROCESS; ?></option>
                                            <option value="2" <?php if($order['status'] == 2){echo 'selected';} ?>><?php echo ORDER_EXECUTED; ?></option>
                                            <option value="3" <?php if($order['status'] == 3){echo 'selected';} ?>><?php echo ORDER_CANCELED; ?></option>
                                        </select>
                                    </div>
                                    <label></label>
                                    <button class="btn btn-lg btn-success btn-block" type="submit" name="submit"><?php echo SAVE; ?></button>
                                </form>
                            </div>
                        </row>
                        
                        
                    </div>
                </div>
            </div>
       
      
<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



