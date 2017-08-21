<?php $titlePage = 'Админ'; include ROOT . '/views/admin/layout/header.php'; ?>
<?php include ROOT . '/views/admin/layout/nav.php'; ?>
<div class="row">
    <div class="col s12 m4 l4">
        <?php include ROOT . '/views/admin/layout/siteBar.php'; ?>
    </div>
    <div class="col s12 m8 l8">
        <blockquote>
          <h5>Вы действительно хотите удалить этого человека:</h5>
        </blockquote>
        <div class="card horizontal">
        <div class="card-image" style="background: url(<?php echo Home::getImageCategory($fraud['fraud_id'], 'fraud'); ?>); background-size: cover; background-position: center;">
        </div>
        <div class="card-stacked">
          <div class="card-content">
          <a href="">
            <b><?php echo $fraud['name']; ?></b>
          </a>
            <p><?php echo $fraud['birth_day']; ?></p>     
          </div>
          <div class="card-action left-align grey-text text-darken-1">
            создано: <?php echo $fraud['create_at']; ?> 
          </div>
        </div>
     </div>
     <form method="post">
         <button class="waves-effect waves-light btn red" type="submit" name="submit">
            <i class="right material-icons">delete</i>Удалить
        </button>
     </form>
    </div>
</div>       
      
<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



