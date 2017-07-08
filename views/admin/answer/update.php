<?php $titlePage = 'Админ'; include ROOT . '/views/admin/layout/header.php'; ?>



            <div class="container text-capitalize">
                <div class="row">
                    <div class="col-lg-12">
                      <ol class="breadcrumb">
                        <li><a href="/<?php echo $lang; ?>/admin"><?php echo ADMIN_PANEL;?></a></li>
                        <li><a href="/<?php echo $lang; ?>/admin/category"><?php echo ADMIN_CATS;?></a></li>
                        <li class="active"><?php echo PRODUCT_EDIT.' '.ADMIN_CATES; ?></li>
                      </ol>
                        <h4><?php echo PRODUCT_EDIT.' '.ADMIN_CATES; ?></h4>
                        <row>
                            <div class="col-lg-6">
                                <form action="#" method="post" enctype="multipart/form-data">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="title_ru" >RU</span>
                                        <input type="text" class="form-control" name="title_ru" id="title_ru" 
                                        value="<?php echo $category['title_ru']; ?>">
                                    </div>
                                    <label></label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="title_cn" >中文</span>
                                        <input type="text" class="form-control" name="title_cn"  id="title_cn" 
                                        value="<?php echo $category['title_cn']; ?>">
                                    </div>
                                    <label></label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="title_en" >EN</span>
                                        <input type="text" class="form-control" name="title_en"  id="title_en" 
                                        value="<?php echo $category['title_en']; ?>">
                                    </div>
                                    <label></label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="desc_ru">RU</span>
                                        <input type="text" class="form-control" name="desc_ru" id="desc_ru" 
                                        value="<?php echo $category['desc_ru']; ?>">
                                    </div>
                                    <label></label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="desc_cn">中文</span>
                                        <input type="text" class="form-control" name="desc_cn" id="desc_cn" 
                                        value="<?php echo $category['desc_cn']; ?>">
                                    </div>
                                    <label></label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="desc_en">EN</span>
                                        <input type="text" class="form-control" name="desc_en" id="desc_en" 
                                        value="<?php echo $category['desc_en']; ?>">
                                    </div>
                                    <label></label>
                                    <div class="form-group">
                                        <label for=""><?php echo ADMIN_CUISINE; ?></label>
                                        <select class="form-control" name="cuisine">
                                        <?php foreach($cuisines as $cuisine): ?>
                                          <option
                                            <?php if($category['cuisine_id'] == $cuisine['id'])
                                            { echo 'selected';} ?> value="<?php echo $cuisine['id']; ?>">
                                            <?php echo $cuisine['title_'.$lang]; ?>
                                          </option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="input-image" for="image">
                                                    <img class="img-responsive img-thumbnail"
                                                    src="
                                                    <?php echo Category::getImage($category['id']); ?>"
                                                    alt="<?php echo $category['title'.$lang]; ?>">
                                                </label>
                                            </div> 
                                        </div>
                                        
                                        <input type="file" id="image" name="image">
                                        <p class="help-block text-lowercase"><?php echo IMAGE_HELP_MESSAGE; ?></p>
                                      </div>
                                    <button class="btn btn-lg btn-success btn-block" type="submit" name="submit"><?php echo SAVE; ?></button>
                                </form>
                            </div>
                        </row>
                        
                        
                    </div>
                </div>
            </div>
       
      
<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



