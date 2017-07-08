 <div class="card" id="comments">
      <div class="card-content">
      
        <div class="row">
          <h5 class="col s12 m12 l12"><?php echo ADD_COMMENT; ?></h5>
          <form method="post" class="col s12 m12 l12">
            <div class="row">
              <div class="input-field col s6">
                <input name="fio" id="comment_fio" type="text" data-length="15" value="<?php if(isset($fio)){ echo $fio;} ?>">
                <label for="comment_fio"><?php echo FIO; ?></label>
                <?php if (isset($errors['fio'])): ?>
                <span class="red-text">
                    <strong><?php echo $errors['fio']; ?></strong>
                </span>
              <?php endif ?>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea name="text" id="comment_text" class="materialize-textarea" data-length="150"><?php if(isset($text)){ echo $text;} ?></textarea>
                <label for="comment_text"><?php echo COMMENT_TEXT; ?></label>
              </div>
              <?php if (isset($errors['text'])): ?>
                <span class="red-text">
                    <strong><?php echo $errors['text']; ?></strong>
                </span>
              <?php endif ?>
            </div>
            <div class="row">
              <div class="col s12 m6 l6">
                <img src="/components/kcaptcha/?<?php echo session_name()?>=<?php echo session_id()?>" alt="">
              </div>
              <div class="col s12 m6 l6 input-field">
                <input id="captcha" type="text" name="captcha">
                <label for="captcha"><?php echo CAPTCHA; ?></label>
                <?php if (isset($errors['captcha'])): ?>
                  <span class="red-text">
                      <strong><?php echo $errors['captcha']; ?></strong>
                  </span>
                <?php endif ?>
              </div>
            </div>
            <button class="waves-effect waves-light btn" name="submit" type="submit">Комментировать</button>
          </form>
        </div>
  </div>
</div>

<?php if (is_array($comments)): ?>

  <div class="row">
    <div class="col s12 m12 l12">
       <ul class="collection">
       <?php foreach ($comments as $comment): ?>
          <li class="collection-item">
              <b class="title"><?php echo $comment['comment']['name'] ?></b>
              <p class="grey-text text-darken-1"><?php echo $comment['comment']['text'] ?></p>
              <p class="right-align grey-text text-darken-1"><?php echo Home::replaceDate($comment['comment']['create_at']) ?></p>
          </li>
          <?php if (count($comment['answer']) > 0): ?>
             <li class="collection-item right-align grey lighten-4">
                <b class="title"><?php echo User::getUserName($comment['answer']['user_id']) ?></b>
                <p><?php echo $comment['answer']['text'] ?></p>
                <p class="left-align grey-text text-darken-1"><?php echo Home::replaceDate($comment['answer']['create_at']) ?></p>
            </li>
          <?php endif ?>
          
        <?php endforeach ?>
        </ul>
        <a data-news-id="<?php echo $id; ?>"  id="moreComments" class="waves-effect waves-light btn-large">Показать еще</a>
    </div>
  </div>
<?php endif ?>
