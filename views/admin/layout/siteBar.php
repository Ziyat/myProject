<div class="collection">
<?php if ($user['role'] == 'admin'): ?>
    <a href="/<?php echo $lang; ?>/admin/user" class="collection-item"><span class="badge">1</span>Модераторы</a>
<?php endif ?>
  
  <a href="/<?php echo $lang; ?>/admin/appeals" class="collection-item">
      <?php if (isset($_SESSION['stat_new'])): ?>
          <span class="new badge"><?php echo $_SESSION['stat_new']; ?></span>
      <?php else: ?>
          <span class="badge"><?php echo $stat['total']; ?></span>
      <?php endif ?>
      Обращения
  </a>
  <a href="/<?php echo $lang; ?>/admin/news" class="collection-item">Новости</a>
  <a href="/<?php echo $lang; ?>/admin/prevention" class="collection-item">День профилактики</a>
  <a href="/<?php echo $lang; ?>/admin/missing" class="collection-item"><?php echo MISSING; ?></a>
  <a href="/<?php echo $lang; ?>/admin/people" class="collection-item"><?php echo PEOPLE_ARE_WANTED; ?></a>
  <a href="/<?php echo $lang; ?>/admin/alimony" class="collection-item"><?php echo ALIMONY; ?></a>
  <a href="/<?php echo $lang; ?>/admin/comments" class="collection-item"><?php echo COMMENTS; ?></a>
  <a href="/<?php echo $lang; ?>/admin/fraud" class="collection-item"><?php echo FRAUD; ?></a>
</div>