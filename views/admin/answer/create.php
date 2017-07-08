<?php $titlePage = 'Отыеты на обращение'; include ROOT . '/views/admin/layout/header.php'; ?>
<div class="row">
    <div class="col s12 m4 l4">
        <?php include ROOT . '/views/admin/layout/siteBar.php'; ?>
    </div>
    <div class="col s12 m8 l8">
    
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data" class="col s12 m12 l12">
            <p>Ответ на обращение № <b class="blue-text text-darken-4"><?php echo $appeal['appeal_number'];?></b></p>
            <p>Заявитель <b class="blue-text text-darken-4"><?php echo $appeal['second_name'] .' '. $appeal['name'] . ' '. $appeal['father_name']; ?></b></p>
            <hr>
               <?php if ($success): ?>
                  <h4><?php echo 'Ответ успешно отправлен'; ?></h4>
                   <hr>
               <?php endif ?>

            <a href="/<?php echo $lang; ?>/admin/appeals" class="btn grey  waves-effect">Назад <i class="material-icons left">keyboard_arrow_left</i></a>
            <button type="submit" name="submit" class="btn waves-effect">Ответить <i class="material-icons right">send</i></button>
            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
            <input type="hidden" name="appeal_id" value="<?php echo $id; ?>">
                <table class="bordered">
                 <tbody>
                   <tr>
                      <th>Исполнитель:</th>
                      <td><?php echo $user['name']; ?></td>
                   </tr>
                   <tr>
                      <th>Текст: <span class="red-text">*</span></th>
                      <td>
                          <div class="input-field">
                              <textarea id="textarea1" class="materialize-textarea" name="text"><?php if (isset($text)): ?><?php echo $text; ?><?php endif ?></textarea>
                              <label for="textarea1">текст ответа на обращение</label>
                          </div>
                          <?php if (isset($errors['text'])): ?>
                            <p class="red-text"><?php echo $errors['text']; ?></p>
                          <?php endif ?>
                          
                    </td>
                   </tr>
                   <tr>
                       <th>Отправить по: </th>
                       <td>
                           <div class="switch">
                            <label>
                              Почта
                              <input name="response" type="checkbox" <?php if($appeal['response'] == 1){ echo 'checked value="1"';} ?> >
                              <span class="lever"></span>
                              Эл. почта
                            </label>
                          </div>
                          <?php if (isset($errors['email'])): ?>
                            <p class="red-text"><?php echo $errors['email']; ?></p>
                          <?php endif ?>
                       </td>
                   </tr>
                   <tr>
                      <th>Прекрепить файл:</th>
                      <td>
                          <div class="file-field input-field">
                          <div class="btn">
                            <span><i class="material-icons">attach_file</i></span>
                            <input type="file" name="file">
                          </div>
                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                          </div>
                        </div>
                        <?php if (isset($errors['file'])): ?>
                            <p class="red-text"><?php echo $errors['file']; ?></p>
                          <?php endif ?>
                      </td>
                   </tr>
                 </tbody>
               </table>
            </form>
         </div>
    </div>
</div>


<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



