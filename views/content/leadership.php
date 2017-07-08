<?php $titlePage = 'Руководство'; include ROOT . '/views/content/layout/header.php'; ?>
<div class="container">
  <div class="row">
   <div class="col s12 m8 l8">
      <table class="striped bordered">
        <thead>
          <tr>
              <th><?php echo POSITION; ?></th>
              <th><?php echo FIO; ?></th>
              <th><?php echo PHONE_TABLE; ?></th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($data as $value): ?>
            <tr>
              <td><?php echo $value['position_'.$lang]; ?></td>
              <td><?php echo $value['fio']; ?></td>
              <td><?php echo $value['phone']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="col s12 m4 l4">
        <?php  include ROOT . '/views/content/layout/side_nav.php'; ?>
    </div>
    <div class="col s12 m12 l12">
      <div class="card">
        <?php if ($lang == 'ru'): ?>
          <a href="http://strategy.gov.uz/ru"><img class="responsive-img" src="/template/content/img/strategy_ru.gif" alt=""></a>
        <?php else: ?>
          <a href="http://strategy.gov.uz/ru"><img class="responsive-img" src="/template/content/img/strategy_uz.gif" alt=""></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php  include ROOT . '/views/content/layout/footer.php'; ?>



