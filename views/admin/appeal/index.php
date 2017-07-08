<?php $titlePage = 'Обращений'; include ROOT . '/views/admin/layout/header.php'; ?>
<?php include ROOT . '/views/admin/layout/nav.php'; ?>
<div class="content">
  <div class="row">
    <div class="col s12 m4 l4">
       <?php include ROOT. '/views/admin/layout/siteBar.php'; ?>
    </div>
    <div class="col s12 m8 l8">
      <h5>Все обращения</h5>
        <table class="striped responsive-table">
          <thead>
            <tr>  
              <th>№ обращения</th>
              <th>ФИО</th>
              <th>Дата</th>
              <th>Статус</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            
            <?php foreach ($appeals as $appeal): ?>
              <?php 
                  switch ($appeal['status']) {
                    case 0:
                      echo '<tr class="deep-orange lighten-4">';
                      break;
                    case 1:
                      echo '<tr class="blue-grey lighten-4">';
                      break;
                    case 2:
                      echo '<tr class="grey lighten-5">';
                      break;
                    case 3:
                      echo '<tr class="grey darken-1">';
                      break;
                  }
              ?>
              
                <td>
                  <?php if (!empty($appeal['path_file'])): ?>
                    <i class="material-icons blue-text text-darken-4">attach_file</i>
                  <?php endif ?>
                  <?php echo $appeal['appeal_number'];?>
                </td>
                <td><?php echo $appeal['fio'];?></td>
                <td><?php echo $appeal['date'];?></td>
                <td><?php echo Home::statusReplace($appeal['status']);?></td>
                <th>
                  <a href="/<?php echo $lang; ?>/admin/appeals/view/<?php echo $appeal['id']; ?>" class="btn-flat waves-effect waves">
                    <i class="material-icons">visibility</i>
                  </a>
                  <a href="/<?php echo $lang; ?>/admin/appeals/update/<?php echo $appeal['id']; ?>" class="btn waves-effect waves-light orange darken-4">
                    <i class="material-icons">edit</i>
                  </a>
                  <a href="/<?php echo $lang; ?>/admin/answer/create/<?php echo $appeal['id']; ?>" class="btn waves-effect waves-light green darken-4">
                    <i class="material-icons">replay</i>
                  </a>
                </th>
              </tr>
            <?php endforeach ?>
            
          </tbody>
        </table>
    </div>
  </div>
</div>
      
<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



