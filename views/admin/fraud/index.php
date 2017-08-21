<?php $titlePage = 'Обращений'; include ROOT . '/views/admin/layout/header.php'; ?>
<?php include ROOT . '/views/admin/layout/nav.php'; ?>
<div class="content">
  <div class="row">
    <div class="col s12 m4 l4">
       <?php include ROOT. '/views/admin/layout/siteBar.php'; ?>
    </div>
    <div class="col s12 m8 l8">
      <h5><?php echo FRAUD; ?></h5>
      <p>Общее количество алиментщиков: <b><?php echo $total; ?></b></p>
      <a href="/<?php echo $lang; ?>/admin/fraud/create" class="btn-large">Добавить алиментщика <i class="material-icons right">note_add</i></a>
      <ul class="collection">
        <?php foreach ($frauds as $fraud): ?>
          
            <li class="collection-item avatar">
              <img src="<?php echo Home::getImageCategory($fraud['fraud_id'], 'fraud'); ?>" alt="" class="circle">
              <span class="title"><?php echo $fraud['name'] ?></span>
              <p>
                 <?php echo $fraud['birth_day'] ?>
                 <br>
                 <a href="/<?php echo $lang; ?>/admin/fraud/update/<?php echo $fraud['fraud_id']; ?>" class="orange-text">
                    <i class="material-icons">edit</i>
                  </a>
                  <a href="/<?php echo $lang; ?>/admin/fraud/delete/<?php echo $fraud['fraud_id']; ?>" class="red-text">
                    <i class="material-icons">delete</i>
                  </a>
              </p>
              <?php if ($fraud['publish'] == 1): ?>
                <a class="secondary-content green-text">
                  <i class="material-icons">done_all</i>
                </a>
              <?php else: ?>
                <a class="secondary-content grey-text">
                    <i class="material-icons">done</i>
                </a>
              <?php endif; ?>
            </li>
        <?php endforeach ?>
      </ul>
        <?php echo $pagination->get(); ?>
    </div>
  </div>
</div>
      
<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



