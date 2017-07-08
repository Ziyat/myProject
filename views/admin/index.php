<?php $titlePage = 'Админ'; include ROOT . '/views/admin/layout/header.php'; ?>
<?php include ROOT . '/views/admin/layout/nav.php'; ?>
  <div class="row">

    <div class="col s12 m4 l4">
      <?php include ROOT. '/views/admin/layout/siteBar.php'; ?>
    </div>
    <div class="col s12 m8 l8">

        <div class="row">
        <h5>Статистика</h5>
            <div class="col s12 m6 l6">
                <div class="ct-chart"></div>
            </div>
            <div class="col s12 m6 l6">
                 <blockquote>
                    <h5>Всего обращений: <b id="status-total"><?php echo $stat['total']; ?></b></h5>
                 </blockquote>
                 <blockquote>
                    <h5>В обработке: <b id="status-1"><?php echo $stat[1]; ?></b></h5>
                 </blockquote>
                 <blockquote>
                    <h5>Обработано: <b id="status-2"><?php echo $stat[2]; ?></b></h5>
                 </blockquote>
                 <blockquote>
                    <h5>Отклонено: <b id="status-3"><?php echo $stat[3]; ?></b></h5>
                 </blockquote>
                 <blockquote>
                    <h5>Новые: <b id="status-0"><?php echo $stat[0]; ?></b></h5>
                 </blockquote>
            </div>
            <div class="col s12 m12 l12">
            <h5>Темы обращений</h5>
            <table class="highlight responsive-table bordered">
                        <thead>
                          <tr>
                              <th>Наим. рус.</th>
                              <th>Наим. o'z.</th>
                              <th>редак.</th>
                          </tr>
                        </thead>
                        <tbody>
                <?php foreach ($themes as $theme): ?>
                        <tr>
                          <td><?php echo $theme['title_ru']; ?></td>
                          <td><?php echo $theme['title_uz']; ?></td>
                          <td></td>
                        </tr>
                          
                        
                    
                <?php endforeach ?>
                </tbody>
            </table>
            </div>


        </div>
        
    </div>
    
  </div>

<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



