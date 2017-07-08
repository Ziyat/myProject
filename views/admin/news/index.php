<?php $titlePage = 'Админ | новости'; include ROOT . '/views/admin/layout/header.php'; ?>
<?php include ROOT . '/views/admin/layout/nav.php'; ?>

<div class="row">
  <div class="col s12 m4 l4">
    <?php include ROOT. '/views/admin/layout/siteBar.php'; ?>
  </div>
  <div class="col s12 m8 l8">
    <h5>Новости</h5>
    <p>Общее количество новостей: <b><?php echo $total; ?></b></p>
    <a href="/<?php echo $lang; ?>/admin/news/create" class="btn-large">Добавить новость <i class="material-icons right">note_add</i></a>
    <ul class="collection">
      <?php foreach ($news as $new): ?>
        <li class="collection-item avatar">
          <img src="<?php echo News::getImage($new['id']); ?>" alt="" class="circle">
          <span class="title"><?php echo $new['title_ru']; ?></span>

          <p><?php echo $new['publish_at']; ?></p>
          <?php if ($new['publish'] == 1): ?>
            <a class="secondary-content green-text">
              <i class="material-icons">done_all</i>
            </a>
          <?php else: ?>
            <a class="secondary-content grey-text">
                <i class="material-icons">done</i>
            </a>
          <?php endif; ?>
          
          <a href="/<?php echo $lang; ?>/admin/news/update/<?php echo $new['id']; ?>" class="orange-text">
            <i class="material-icons">edit</i>
          </a>
          <a href="/<?php echo $lang; ?>/admin/news/delete/<?php echo $new['id']; ?>" class="red-text">
            <i class="material-icons">delete</i>
          </a>
        </li>
      <?php endforeach ?>
    </ul>
  
    <?php echo $pagination->get(); ?>
  </div>
</div>



<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



