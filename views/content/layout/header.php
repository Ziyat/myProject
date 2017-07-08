<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta property="og:title" content="<?php echo $ogTitle; ?>">
    <meta property="og:image" content="<?php echo $ogImage; ?>">
    <meta property="og:site_name" content="guvd.uz">
    <meta name="og:description" content="<?php echo $descPage; ?>">
    <link rel="stylesheet" type="text/css" href="/template/content/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="/template/content/fontAwesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/template/content/css/app.css">
</head>
<body>
<?php  include ROOT . '/views/content/layout/nav.php'; ?>
<div class="header card">
    <div class="container">
      <div class="row">
        <div class="col s12 m3 l3 header-logo center-align">
            <a href="/<?php echo $lang; ?>"><img class="responsive-img" src="/template/content/img/gerb2.png" alt=""></a>
        </div>
        <div class="col s12 m5 l5 header-title">
            <blockquote>
                <h4><?php echo GUVD; ?></h4>
                <p class="red-text text-darken-4"><?php echo OFFICIALSITE; ?> <br> <?php echo TEST; ?></p>
            </blockquote>
        </div>
        <div class="col s12 m4 l4 header-recourse">
        <ul class="center-align">
            <li>
                    
                    <a style="margin: 5px" href="tel:102" class="waves-effect btn-large red "><i class="material-icons left">call</i>102</a>
                    <a style="margin: 5px" href="tel:1102" class="waves-effect btn-large red "><i class="material-icons left">call</i>1102</a>
                
            </li>
            <hr>
            <li><a href="/<?php echo $lang; ?>/appeals/" class="col s12 m12 l12 waves-effect btn-large blue darken-4"><i class="material-icons left">textsms</i><?php echo ONLINERECOURSE; ?></a></li>
        </ul>           
            
        </div>
      </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <a href="/<?php echo $lang; ?>/questions">
                <div class="chip">
                    <img src="/template/content/img/question.jpg" alt="Contact Person">
                    <?php echo QUESTIONS; ?>
                </div>
            </a>
            <a href="/<?php echo $lang; ?>/leadership">
                <div class="chip">
                    <img src="/template/content/img/group.jpg" alt="Contact Person">
                    <?php echo LEADERSHIP; ?>
                </div>
            </a>
            <a href="/<?php echo $lang; ?>/reception">
                <div class="chip">
                    <img src="/template/content/img/time.jpg" alt="Contact Person">
                    <?php echo RECEPTION; ?>
                </div>
            </a>
            <a href="/<?php echo $lang; ?>/prevention">
                <div class="chip">
                    <img src="/template/content/img/day.jpg" alt="Contact Person">
                    <?php echo DAY_OF_PREVENTION; ?>
                </div>
            </a>
            <a href="/<?php echo $lang; ?>/documents">
                <div class="chip">
                    <img src="/template/content/img/doc.jpg" alt="Contact Person">
                    <?php echo DOCUMENTATION; ?>
                </div>
            </a>
        </div>
    </div>
</div>