<?php $titlePage = 'Удалить новость'; include ROOT . '/views/admin/layout/header.php'; ?>
<?php include ROOT . '/views/admin/layout/nav.php'; ?>
<div class="row">
    <div class="col s12 m4 l4">
        <?php include ROOT . '/views/admin/layout/siteBar.php'; ?>
    </div>
    <div class="col s12 m8 l8">
        <blockquote>
          <h5>Вы действительно хотите удалить эту новость:</h5>
        </blockquote>
        <div class="card horizontal">
        <div class="card-image" style="background: url(<?php echo News::getImage($data['id']); ?>); background-size: cover; background-position: center;">
        </div>
        <div class="card-stacked">
          <div class="card-content">
          <a href="/<?php echo $lang; ?>/news/<?php echo $data['id']; ?>" target="_blank">
            <b><?php echo News::titleReplace($data['title_'.$lang]); ?></b>
          </a>
            <p><?php echo News::descReplace($data['desc_'.$lang]); ?></p>     
          </div>
          <div class="card-action left-align grey-text text-darken-1">
            создано: <?php echo $data['publish_at']; ?> 
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



