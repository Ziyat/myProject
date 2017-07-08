<?php $titlePage = 'Редактирование'; include ROOT . '/views/admin/layout/header.php'; ?>
<?php include ROOT . '/views/admin/layout/nav.php'; ?>
<div class="content">
  <div class="row">
    <div class="col s12 m4 l4">
       <?php include ROOT. '/views/admin/layout/siteBar.php'; ?>
    </div>
    <div class="col s12 m8 l8">
      <h5>Обращения № <b class="blue-text text-darken-4"><?php echo $appeal['appeal_number'];?></b></h5>
       <hr>
       <form method="post">
       <a href="/<?php echo $lang; ?>/admin/appeals" class="btn"><i class="material-icons left">keyboard_arrow_left</i> назад</a>
       <button type="submit" name="submit" id="submit" class="btn green disabled"><i class="material-icons right">system_update_alt</i> сохранить</button>
       <?php if ($success): ?>
           <h5 class="green-text">успешно сохранено</h5>
       <?php endif ?>
       <table class="bordered">
         <tbody>
           <tr>
             <th>Статус</th>
             <td>
                <select name="status" id="status" class="browser-default">
                    <?php if ($appeal['status'] == 0): ?>
                        <option value="0"><?php echo Home::statusReplace(0); ?></option>
                        <option value="1"><?php echo Home::statusReplace(1); ?></option>
                        <option value="3" id="rejected"><?php echo Home::statusReplace(3); ?></option>
                    <?php elseif($appeal['status'] == 1): ?>
                        <option value="1"><?php echo Home::statusReplace(1); ?></option>
                        <option value="0"><?php echo Home::statusReplace(0); ?></option>
                        <option value="3" id="rejected"><?php echo Home::statusReplace(3); ?></option>
                    <?php elseif($appeal['status'] == 2): ?>
                        <option value="0"><?php echo Home::statusReplace($appeal['status']); ?></option>
                    <?php elseif($appeal['status'] == 3): ?>
                        <option value="3" id="rejected"><?php echo Home::statusReplace(3); ?></option>
                        <option value="1"><?php echo Home::statusReplace(1); ?></option>
                        <option value="0"><?php echo Home::statusReplace(0); ?></option>
                    <?php endif; ?>

                    
                </select>
             </td>
           </tr>
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
         </tbody>
       </table>
    </form>
    </div>
  </div>
</div>
      
<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



