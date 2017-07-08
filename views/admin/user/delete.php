<?php $titlePage = 'Удалить новость'; include ROOT . '/views/admin/layout/header.php'; ?>
<?php include ROOT . '/views/admin/layout/nav.php'; ?>
<div class="row">
    <div class="col s12 m4 l4">
        <?php include ROOT . '/views/admin/layout/siteBar.php'; ?>
    </div>
    <div class="col s12 m8 l8">
        <blockquote>
          <h5>Вы действительно хотите удалить этого пользователя: <br><b><?php echo $userDel['name'].' | '.$userDel['login'] ?></b></h5>
        </blockquote>
     <form method="post">
         <button class="waves-effect waves-light btn red" type="submit" name="submit">
            <i class="right material-icons">delete</i>Удалить
        </button>
     </form>
    </div>
</div>
      
<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



