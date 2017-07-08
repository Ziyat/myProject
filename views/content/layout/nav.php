<nav class="blue darken-4">
    <div class="nav-wrapper container ">
      <a href="/<?php echo $lang; ?>" class="brand-logo">
          <?php echo GUVDLOGO; ?>
      </a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <!-- <li><a href="/<?php  //echo $lang; ?>/user/login"><i class="material-icons left">lock_open</i>
          
        </a></li>
        <li><a href="/<?php // echo $lang; ?>/user/register"><i class="material-icons left">mode_edit</i>

        </a></li> -->
        <!-- <li><a href="">Контакты</a></li> -->
        <li><a href="/switch/ru">Ру</a></li>
        <li><a href="/switch/uz">Узб</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">

        <li><div class="userView">
          <div class="background">
            <img src="/template/content/img/flag.jpg" style="width: 100%;">
          </div>
          <a href="#!user"><img class="circle" src="/template/content/img/gerb2.png"></a>
          <a href="#!name"><span class="white-text name"><?php echo GUVD; ?></span></a>
          <a href="#!email"><span class="white-text email"><?php echo TEST; ?></span></a>
        </div></li>

        <li><a class="waves-effect" href="/<?php echo $lang; ?>/appeals/">
          <i class="material-icons left">textsms</i><?php echo ONLINERECOURSE; ?></a></li>
        <li><div class="divider"></div></li>
        <li><a class="waves-effect" href="/<?php echo $lang; ?>/news">
            <i class="material-icons right">comment</i><?php echo NEWS; ?></a>
        </li>
        <li><a class="waves-effect" href="/<?php echo $lang; ?>/questions">
          <i class="material-icons right">question_answer</i><?php echo QUESTIONS; ?></a>

        </li>
        <li><a class="waves-effect" href="/<?php echo $lang; ?>/leadership">
          <i class="material-icons right">supervisor_account</i><?php echo LEADERSHIP; ?></a></li>
        <li><a class="waves-effect" href="/<?php echo $lang; ?>/reception">
          <i class="material-icons right">access_time</i><?php echo RECEPTION; ?></a></li>
        <li><a class="waves-effect" href="#!">
          <i class="material-icons right">today</i><?php echo DAY_OF_PREVENTION; ?></a></li>
        <li><a class="waves-effect" href="#!">
          <i class="material-icons right">receipt</i><?php echo DOCUMENTATION; ?></a></li>
        <li><div class="divider"></div></li>
        <li><a class="subheader"><?php echo LANGUAGE; ?></a></li>
        <li><i class="material-icons right">g_translate</i><a class="waves-effect" href="/switch/ru">Ру</a></li>
        <li><a class="waves-effect" href="/switch/uz">Узб</a></li>
      </ul>
    </div>
  </nav>