<nav class="blue darken-4">
    <div class="nav-wrapper container ">
      <a href="/<?php echo $lang; ?>/admin" class="brand-logo">
          <?php if ($user['role'] == 'admin'): ?>
            <?php echo ADMIN; ?>
          <?php else: ?>
            <?php echo MODERATOR; ?>
          <?php endif ?>
      </a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li>
          <a href=""><i class="material-icons">assignment_ind</i></a>
        </li>
        <li>
          <a href="">
            <i class="material-icons
                <?php if(isset($_SESSION['stat_new']))
                {
                  echo ' left';
                } ?>
              ">
              assignment
            </i>
            <?php if(isset($_SESSION['stat_new']))
              {
                echo '<b class="badge_nav">'.$_SESSION['stat_new'].'</b>';
              } ?>
          </a>
        </li>
        <li>
          <a href="/<?php echo $lang; ?>/cabinet/edit"><i class="material-icons">mode_edit</i></a>
        </li>
        <li><a href="/switch/ru">Ру</a></li>
        <li><a href="/switch/uz">Ўз</a></li>
        <li>
          <a class="tooltipped" data-position="left" data-delay="50" data-tooltip="Выход" href="/<?php echo $lang; ?>/user/logout"><i class="material-icons left">exit_to_app</i> Выход</a>
        </li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href=""><i class="material-icons left">lock_open</i>
        </a></li>
        <li><a href=""><i class="material-icons left">mode_edit</i></a></a></li>
        <li><a href="/switch/ru">Ру</a></li>
        <li><a href="/switch/uz">Ўз</a></li>
      </ul>
    </div>
  </nav>