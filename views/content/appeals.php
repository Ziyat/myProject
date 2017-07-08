<?php $titlePage = 'Онлайн обращения';  include ROOT . '/views/content/layout/header.php'; ?>
<div class="container">
  <div class="row">
     <div class="col s12 m8 l8">
     <?php if (is_array($success) && isset($success)): ?>
      <div class="card">
          <div class="card-content">
            <span class="card-title">
              <?php echo '<b class="red-text">'.REMEMBER .'!</b>'; ?>
            </span>
            <span class="card-title">
              <?php echo APPEAL_NUMBER .': <b class="red-text">'. $success['appeal_number'].'</b>'; ?>
            </span>
            <span class="card-title">
              <?php echo APPEAL_SECRET .': <b class="red-text">'. $success['appeal_secret'].'</b>'; ?>
            </span>
          </div>
      </div>
    <?php endif ?>
        <div class="card">
    <div class="card-content">
      <span class="card-title">
        <?php echo ONLINERECOURSE; ?>
      </span>
      <form method="POST" enctype="multipart/form-data">
        
        <div class="row">
          <div class="input-field col s12">
            <b class="red-text"><?php echo ALL_FIELDS; ?>!</b>
          </div>
        </div>
        

        <div class="row">
          <div class="input-field col s12">
            <select  name="theme_appeal">
                <option value="" disabled selected><?php echo CHOOSE_A_TOPIC; ?></option>
                <?php foreach ($themes as $theme): ?>
                  <option value="<?php echo $theme['id'] ?>"><?php echo $theme['title_'.$lang]; ?></option>
                <?php endforeach ?>
                <option value="другие вопросы"><?php echo OTHER_ISSUES; ?></option>
              </select>
              <label><?php echo TOPIC_OF_THE_APPEAL; ?>: <i class="red-text">*</i></label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <p><?php echo GET_AN_ANSWER; ?>: <i class="red-text">*</i></p>
            <p>
                <input name="response" type="radio" id="test1" value="1" checked />
                <label for="test1"><?php echo IN_ELECTRONIC_FORM; ?></label>
              </p>
              <p>
                <input name="response" type="radio" id="test2" value="0" />
                <label for="test2"><?php echo IN_WRITING; ?></label>
              </p>
          </div>
        </div>
        
        <div class="row">
          <div class="input-field col s12">
                <input id="email" type="email" name="email" class="validate"
                       value="<?php if(isset($email)){ echo $email; } ?>">
                    <label for="email"><?php echo EMAIL; ?> <i class="red-text">*</i></label>
                    <?php if (isset($errors['email'])): ?>
                      <span class="red-text">
                          <strong><?php echo $errors['email']; ?></strong>
                      </span>
                    <?php endif ?>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
              <input id="secondName" type="text" name="second_name" class="validate"
                       value="<?php if(isset($second_name)){ echo $second_name; } ?>">
              <label for="secondName"><?php echo SECONDNAME; ?> <i class="red-text">*</i></label>
              <?php if (isset($errors['second_name'])): ?>
                <span class="red-text">
                    <strong><?php echo $errors['second_name']; ?></strong>
                </span>
              <?php endif ?>
          </div>
        </div>
          <div class="row">
          <div class="input-field col s12">
                <input id="name" type="text" name="name" class="validate"
                      value="<?php if(isset($name)){ echo $name; } ?>">
                    <label for="name"><?php echo NAME; ?> <i class="red-text">*</i></label>
                    <?php if (isset($errors['name'])): ?>
                      <span class="red-text">
                          <strong><?php echo $errors['name']; ?></strong>
                      </span>
                    <?php endif ?>
              </div>
          </div>
          <div class="row">
          <div class="input-field col s12">
                <input id="fatherName" type="text" name="father_name" class="validate"
                      value="<?php if(isset($father_name)){ echo $father_name; } ?>">
                    <label for="fatherName"><?php echo FATHERNAME; ?> <i class="red-text">*</i></label>
                    <?php if (isset($errors['father_name'])): ?>
                      <span class="red-text">
                          <strong><?php echo $errors['father_name']; ?></strong>
                      </span>
                    <?php endif ?>
              </div>
          </div>

          <div class="row">
          <div class="input-field col s12">
            <select name="type_person">
                <option value="" disabled selected><?php echo SPECIFYTHETYPEOFPERSON; ?></option>
                <option value="individual"><?php echo INDIVIDUAL; ?></option>
                <option value="entity"><?php echo ENTITY; ?></option>
              </select>
              <label><?php echo TYPEOFPERSON; ?><i class="red-text">*</i></label>
          </div>
          </div>
          <div class="row">
          <div class="input-field col s12">
            <select name="type_appeal">
                <option value="" disabled selected><?php echo SPECIFYTYPEAPPEAL; ?></option>
                <option value="proposal"><?php echo PROPOSAL; ?></option>
                <option value="appeal"><?php echo APPEAL; ?></option>
                <option value="declaration"><?php echo DECLARATION; ?></option>
              </select>
              <label><?php echo TYPEAPPEAL; ?> <i class="red-text">*</i></label>
          </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <select name="area">
                  <option value="" disabled selected><?php echo AREA; ?></option>
                  <?php foreach ($areas as $area): ?>
                      <option value="<?php echo $area['area_id']; ?>"><?php echo $area['title_'.$lang].' '.AREA ?></option>
                  <?php endforeach ?>
                </select>
                <label><?php echo SELECTAREA; ?> <i class="red-text">*</i></label>
            </div>
          </div>
          <div class="row">
          <div class="input-field col s12">
                <input id="address" type="text" name="address" class="validate"
                       value="<?php if (isset($address)){ echo $address;} ?>">
                    <label for="address"><?php echo ADDRESS; ?> <i class="red-text">*</i></label>
                    <?php if (isset($errors['address'])): ?>
                      <span class="red-text">
                          <strong><?php echo $errors['address']; ?></strong>
                      </span>
                    <?php endif ?>
              </div>
          </div>
          <div class="row">
          <div class="input-field col s12">
                <input id="mobilePhone" type="text" name="mobile_phone" class="validate"
                        value="<?php if (isset($mobile_phone)){ echo $mobile_phone;} ?>"
                        placeholder="<?php echo FOREXAMPLE; ?>: +998 (90) 999 99 99">
                    <label for="mobilePhone"><?php echo MOBILEPHONE; ?> <i class="red-text">*</i></label>
                    <?php if (isset($errors['mobile_phone'])): ?>
                      <span class="red-text">
                          <strong><?php echo $errors['mobile_phone']; ?></strong>
                      </span>
                    <?php endif ?>
              </div>
          </div>
          <div class="row">
          <div class="input-field col s12">
                <input id="birthDate" type="text" name="birth_date" class=""
                       placeholder="1960-02-24"
                       value="<?php if (isset($birth_date)){ echo $birth_date;} ?>">
                    <label for="birthDate"><?php echo BIRTHDATE; ?> <i class="red-text">*</i></label>
                    <?php if (isset($errors['birth_date'])): ?>
                      <span class="red-text">
                          <strong><?php echo $errors['birth_date']; ?></strong>
                      </span>
                    <?php endif ?>
              </div>
          </div>
          <div class="row">
          <div class="input-field col s12">
            <select name="gender">
                <option value="" disabled selected><?php echo INDICATEYOURGENDER; ?></option>
                <option value="male"><?php echo MALE; ?></option>
                <option value="female"><?php echo FEMALE; ?></option>
              </select>
              <label><?php echo SEX ?><i class="red-text">*</i></label>

          </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea name="text" id="textOfTheAppeal" class="materialize-textarea"
                        placeholder="<?php echo WRITEYOURMESSAGE; ?>" ><?php if (isset($text)){ echo $text;} ?></textarea>
              <label for="textOfTheAppeal"><?php echo TEXTOFTHEAPPEAL; ?> <i class="red-text">*</i></label>
                <?php if (isset($errors['text'])): ?>
                      <span class="red-text">
                          <strong><?php echo $errors['text']; ?></strong>
                      </span>
                <?php endif ?>
            </div>
        </div>

        <div class="file-field input-field">
          <div class="btn grey">
                <span><?php echo ATTACHFILE; ?></span>
                <input type="file" name="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="jpg, bmp, png, pdf, doc, docx, xls">
            </div>
            <?php if (isset($errors['file'])): ?>
                      <span class="red-text">
                          <strong><?php echo $errors['file']; ?></strong>
                      </span>
                <?php endif ?>
        </div>
        <div class="row">
            <div class="col s12">
              <div class="row">
                <div class="col s12 m6 l6">
                  <img src="/components/kcaptcha/?<?php echo session_name()?>=<?php echo session_id()?>" alt="">
                </div>
                <div class="col s12 m6 l6 input-field">
                  <input id="captcha" type="text" name="captcha">
                  <label for="captcha"><?php echo CAPTCHA; ?></label>
                </div>
              </div>
              <?php if (isset($errors['captcha'])): ?>
                      <span class="red-text">
                          <strong><?php echo $errors['captcha']; ?></strong>
                      </span>
                <?php endif ?>   
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <button type="submit" name="submit" class="col s12 btn btn-large waves-effect waves-light blue darken-4" ><?php echo TOSENDALETTER; ?>
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
         </form>
      </div>
    </div>
     </div>
     <div class="col s12 m4 l4">
        <?php  include ROOT . '/views/content/layout/side_nav.php'; ?>
     </div>
  </div>
</div>
<?php  include ROOT . '/views/content/layout/footer.php'; ?>
