<?php $titlePage = 'Приемные дни'; include ROOT . '/views/content/layout/header.php'; ?>
<div class="container">
  <div class="row">
   <div class="col s12 m8 l8">
   <div class="center-align">
   <?php if ($lang == 'uz'): ?>
      <p><?php echo SCHEDULE_RECEPTION; ?></p>
      <h5><?php echo SCHEDULE; ?></h5>
   <?php else: ?>
      <h5><?php echo SCHEDULE; ?></h5>
      <p><?php echo SCHEDULE_RECEPTION; ?></p>
   <?php endif; ?>
     
   </div>
      <table class="striped">
        <thead>
          <tr>
              <th><?php echo RECEPTION_DAY; ?></th>
              <th><?php echo RECEPTION_TIME; ?></th>
              <th><?php echo POSITION; ?></th>
              <th><?php echo FIO; ?></th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($data as $value): ?>
            <tr>
              <td><?php echo $value['reception_days_'.$lang]; ?></td>
              <td><?php echo $value['reception_time']; ?></td>
              <td><?php echo $value['position_'.$lang]; ?></td>
              <td><?php echo $value['fio_'.$lang]; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php if ($lang == 'uz'): ?>
        <p><b>Илова:</b> Тошкент шаҳар ИИББ бошлиғининг ўринбосари, ЙҲХБ бошлиғининг қабули ИИББ ЙҲХБ биносида амалга оширилади.</p>
        <p><b>Эслатма:</b> Қабул қилиш масалалари бўйича маълумотни: 281-93-35, 233-28-58 рақамли телефонлар орқали олишингиз мумкин</p>
      <?php else: ?>
        <p><b>Приложение:</b> Приём физических и юридических лиц Заместителем начальника ГУВД г.Ташкента, Начальника УБДД ГУВД г.Ташкента осуществляется в здании приёма граждан УБДД ГУВД г. Ташкент.</p> 

        <p><b>Напоминание:</b> По вопросам приёма руководства ГУВД г.Ташкента обращаться по телефонам : 281-93-35, 233-28-58</p>
      <?php endif ?>
      

      

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



