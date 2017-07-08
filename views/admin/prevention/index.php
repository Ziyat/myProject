<?php $titlePage = 'Админ | День профилактики'; include ROOT . '/views/admin/layout/header.php'; ?>
<?php include ROOT . '/views/admin/layout/nav.php'; ?>

<div class="row">
  <div class="col s12 m4 l4">
    <?php include ROOT. '/views/admin/layout/siteBar.php'; ?>
  </div>
  <div class="col s12 m8 l8">
    <h5>День профилактики</h5>
    <p>Общее количество новостей по дням профилактики: <b><?php echo $total; ?></b></p>
    <a href="/<?php echo $lang; ?>/admin/prevention/create" class="btn-large">Добавить новость <i class="material-icons right">note_add</i></a>
    <ul class="collection">
      <?php foreach ($preventions as $prevention): ?>
        <li class="collection-item avatar">
          <img src="<?php echo Prevention::getImage($prevention['id']); ?>" alt="" class="circle">
          <span class="title"><?php echo $prevention['title_ru']; ?></span>

          <p><?php echo $prevention['publish_at']; ?></p>
          <?php if ($prevention['publish'] == 1): ?>
            <a class="secondary-content green-text">
              <i class="material-icons">done_all</i>
            </a>
          <?php else: ?>
            <a class="secondary-content grey-text">
                <i class="material-icons">done</i>
            </a>
          <?php endif; ?>
          
          <a href="/<?php echo $lang; ?>/admin/prevention/update/<?php echo $prevention['id']; ?>" class="orange-text">
            <i class="material-icons">edit</i>
          </a>
          <a href="/<?php echo $lang; ?>/admin/prevention/delete/<?php echo $prevention['id']; ?>" class="red-text">
            <i class="material-icons">delete</i>
          </a>
        </li>
      <?php endforeach ?>
    </ul>
  
    <?php echo $pagination->get(); ?>
  </div>
</div>



<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



