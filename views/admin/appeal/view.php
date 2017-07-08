<?php $titlePage = 'Обращений'; include ROOT . '/views/admin/layout/header.php'; ?>
<?php include ROOT . '/views/admin/layout/nav.php'; ?>
<div class="content">
  <div class="row">
    <div class="col s12 m4 l4">
       <?php include ROOT. '/views/admin/layout/siteBar.php'; ?>
    </div>
    <div class="col s12 m8 l8">
    <div id="flag">
      <img src="/template/content/img/flagIGerb.gif" alt="">
    </div>
    <div id="zagolovok">
      <h5 class="center-align"><?php echo PRINT_TEXT; ?></h5>
    </div>
      <h5>Обращения № <b class="blue-text text-darken-4"><?php echo $appeal['appeal_number'];?></b></h5>
      <p>От: <b><?php echo $appeal['create_at'];?></b></p>
       <hr>
       <a href="/<?php echo $lang; ?>/admin/appeals" class="btn"><i class="material-icons left">keyboard_arrow_left</i> назад</a>
       <table class="bordered">
         <tbody>
           <tr>
              <th>ФИО:</th>
              <td><?php echo $appeal['second_name'] .' '. $appeal['name'] . ' '. $appeal['father_name']; ?></td>
           </tr>
           <tr>
             <th>Email:</th>
             <td><?php echo $appeal['email']; ?></td>
           </tr>
           <tr>
              <th>Дата рождения:</th>
              <td><?php echo $appeal['birth_date']; ?></td>
           </tr>
           <tr>
              <th>Район:</th>
              <td><?php echo $appeal['area']; ?></td>
           </tr>
           <tr>
              <th>Вид лица:</th>
              <td><?php  echo $appeal['type_person'] == 'individual' ? "Физическое лицо" : "Юридическое лицо"; ?></td>
           </tr>
           <tr>
              <th>Тип обращения:</th>
              <td><?php echo Home::typeAppealReplace($appeal['type_appeal']); ?></td>
           </tr>
           <tr>
              <th>Адрес:</th>
              <td><?php echo $appeal['address']; ?></td>
           </tr>
           <tr>
              <th>Номер телефона:</th>
              <td><?php echo $appeal['mobile_phone']; ?></td>
           </tr>
           <tr>
              <th>Текст:</th>
              <td><?php echo $appeal['text']; ?></td>
           </tr>
           <?php if (!empty($appeal['path_file'])): ?>
              <tr>
                <th>Файл:</th>
                <td><a href="<?php echo $appeal['path_file']; ?>" download>Скачать Файл</a></td>
             </tr>
           <?php endif ?>
           
         </tbody>
       </table>
    </div>
  </div>
</div>
      
<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



