<?php $titlePage = 'Админ | Коментарий'; include ROOT . '/views/admin/layout/header.php'; ?>
<?php include ROOT . '/views/admin/layout/nav.php'; ?>

<div class="row">
  <div class="col s12 m4 l4">
    <?php include ROOT. '/views/admin/layout/siteBar.php'; ?>
  </div>
  <div class="col s12 m8 l8">
    <h5><?php echo COMMENTS; ?></h5>
    <p>Общее количество комментариев: <b><?php echo $total; ?></b></p>
    <?php if (is_array($comments)): ?>
        <div class="row">
          <div class="col s12 m12 l12">
             <ul class="collection">
             <?php foreach ($comments as $comment): ?>
                <li class="collection-item">
                    <b class="title"><?php echo $comment['comment']['name'] ?></b>
                    <p class="grey-text text-darken-1"><?php echo $comment['comment']['text'] ?></p>
                    <a href="/<?php echo $lang ?>/admin/comments/update/<?php echo $comment['comment']['comment_id'] ?>" class="left waves-effect waves-light orange-text"><i class="material-icons">edit</i></a>
                    <a href="/<?php echo $lang ?>/admin/comments/delete/<?php echo $comment['comment']['comment_id'] ?>" class="left waves-effect waves-light red-text"><i class="material-icons">delete</i></a>
                    <a href="" class="left waves-effect waves-light grey-text"><i class="material-icons">refresh</i></a>
                    <?php if ($comment['comment']['news_id'] != 0): ?>
                      <a href="/<?php echo $lang ?>/news/<?php echo $comment['comment']['news_id'] ?>#comment_text" class="left waves-effect waves-light"><i class="material-icons">visibility</i></a>
                    <?php else: ?>
                      <a href="/<?php echo $lang ?>/prevention/<?php echo $comment['comment']['prevention_id'] ?>#comment_text" class="left waves-effect waves-light"><i class="material-icons">visibility</i></a>
                    <?php endif; ?>
                    <p class="right-align grey-text text-darken-1"><?php echo $comment['comment']['create_at'] ?></p>
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
          </div>
        </div>
      <?php endif ?>
  
    <?php echo $pagination->get(); ?>
  </div>
</div>



<?php  include ROOT . '/views/admin/layout/footer.php'; ?>



