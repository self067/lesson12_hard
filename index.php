<?php
session_start();

require 'config.php';
if( $_POST['admin']) {

  header('Location: admin.php');
  die();
}

$connection = new PDO('mysql:host='.DBHost.'; dbname='.DBName.'; charset=utf8', DBUser, DBPass);

if ($connection->errorCode()){
  printf("Не удалось подключиться: %s\n", $connection->errorCode());
//  exit();
}

$profile= $connection->query('select * from profile');
$profile=$profile->fetchAll();

$educations = $connection->query('select * from educations');
$experiences = $connection->query('select * from experiences');
$skills = $connection->query('select * from `skills`');
$projects = $connection->query('select * from `projects`');
$languages = $connection->query('select * from `languages`');
$interests = $connection->query('select * from `interests`');

$prep = $connection->prepare("insert into `comments` (`comment`, `name`) values ( :comment, :name)");

?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Responsive Resume/CV Template for Developers</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    <link id="ok-style" rel="stylesheet" href="ok.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 

<body>
    <div class="wrapper">
        <div class="sidebar-wrapper">
            <div class="profile-container">
                <img class="profile" src="assets/images/profile.png" alt="" />
                <h1 class="name"><?=$profile[0][1]?></h1>
                <h3 class="tagline"><?=$profile[0][5]?></h3>
            </div><!--//profile-container-->
            
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email"><i class="fa fa-envelope"></i><a href="mailto: yourname@email.com"><?=$profile[0][2]?></a></li>
                    <li class="phone"><i class="fa fa-phone"></i><a href="tel:<?=$profile[0][3]?>"><?=$profile[0][3]?></a></li>
                    <li class="website"><i class="fa fa-globe"></i><a href="http://themes.3rdwavemedia.com/website-templates/free-responsive-website-template-for-developers/" target="_blank"><?=$profile[0][4]?></a></li>
                </ul>
            </div><!--//contact-container-->
            <div class="education-container container-block">
                <h2 class="container-block-title">Образование</h2>
                <?php foreach( $educations as $edu) : ?>
                <div class="item">
                    <h4 class="degree"><?=$edu['title']?></h4>
                    <h5 class="meta"><?=$edu['speciality']?></h5>
                    <div class="time"><?=$edu['yearstart']?> - <?=$edu['yearend']?></div>
                </div><!--//item-->
                <?php endforeach; ?>
            </div><!--//education-container-->
            
            <div class="languages-container container-block">
                <h2 class="container-block-title">Языки</h2>
                <ul class="list-unstyled interests-list">
                  <?php foreach($languages as $lang) : ?>
                    <li><?=$lang['title']?> <span class="lang-desc"> (<?=$lang['level']?>)</span></li>
                  <?php endforeach; ?>
                </ul>
            </div><!--//interests-->
            
            <div class="interests-container container-block">
                <h2 class="container-block-title">Интересы</h2>
                <ul class="list-unstyled interests-list">
                  <?php foreach($interests as $interest) : ?>
                    <li><?=$interest['title']?> </li>
                  <?php endforeach; ?>
                </ul>
            </div><!--//interests-->
            
        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper">
            
            <section class="section summary-section">
                <h2 class="section-title"><i class="fa fa-user"></i>Обо мне</h2>
                <div class="summary">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias aliquid culpa eius eos eveniet exercitationem hic, ipsam, laudantium minus necessitatibus nihil, nisi optio quam recusandae reprehenderit sit temporibus vel.</p>
                </div><!--//summary-->
            </section><!--//section-->
            
            <section class="section experiences-section">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Опыт работы</h2>
                  <?php foreach($experiences as $exper) : ?>

                    <div class="item">
                        <div class="meta">
                            <div class="upper-row">
                                <h3 class="job-title"><?=$exper['title']?></h3>
                                <div class="time"><?=$exper['yearStart']?> - <?=$exper['yearEnd']?></div>
                            </div><!--//upper-row-->
                            <div class="company"><?=$exper['company']?></div>
                        </div><!--//meta-->
                        <div class="details">
                            <p><?=$exper['about']?></p>
                        </div><!--//details-->
                    </div><!--//item-->
                  <?php endforeach; ?>


            </section><!--//section-->
            
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>Проекты</h2>
                <div class="intro">
                    <p>You can list your side projects or open source libraries in this section. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et ligula in nunc bibendum fringilla a eu lectus.</p>
                </div><!--//intro-->


              <?php foreach($projects as $prj) : ?>

                <div class="item">
                    <span class="project-title"><a href="<?=$prj['link']?>"><?=$prj['title']?></a></span> - <span class="project-tagline"><?=$prj['about']?></span>
                </div><!--//item-->
              <?php endforeach; ?>

            </section><!--//section-->
            
            <section class="skills-section section">
                <h2 class="section-title"><i class="fa fa-rocket"></i>Навыки</h2>
                <div class="skillset">
                  <?php foreach($skills as $skill) : ?>

                    <div class="item">
                        <h3 class="level-title"><?=$skill['title']?></h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="<?=$skill['level']?>%">
                            </div>                                      
                        </div><!--//level-bar-->                                 
                    </div><!--//item-->
                  <?php endforeach; ?>


                </div>  
            </section><!--//skills-section-->

            <div class="frms">
                <form method="POST">
                    <textarea name="comment" id="fo_ta" cols="40" rows="5" placeholder="Отправить отзыв" required></textarea>
                    <input style="display: block;" name="name" type="text" id="fo_input" placeholder="Имя" required>
                    <button>Отправить отзыв</button>

                </form>

                <form method="POST" style="margin: 40px; font-size: 40px;">
                    <button name="admin" value="admin">
                    <i class="fa fa-angellist ">
    <!--                    <input style="font-size: 30px;" type="submit" name="login" value="">-->
                    </i>
                    </button>
                </form>
            </div>

            <?php if( $_POST['comment']) {
              $comment = htmlspecialchars( $_POST['comment']);
              $name = htmlspecialchars( $_POST['name']);

              if( strpos(strtolower($comment), "редиска")===false  &&  strpos(strtolower($name), "редиска")===false)
                  $prep->execute(array('comment'=>$comment, 'name'=>$name));
            }

              $commUsers = $connection->query("select * from comments where status='ok' order by idate DESC");
              $cnt = 1;
//              var_dump($_POST);
              foreach($commUsers as $comment){ ?>

                <div style="font-size: 14px; margin: auto;">
                  #<?=$cnt++?>. <?=$comment['name']?>. <?=$comment['idate']?> - <?=$comment['comment']?>
                </div>

              <?php } ?>

        </div><!--//main-body-->
    </div>
 
    <footer class="footer">
        <div class="text-center">
                <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
                <small class="copyright">Designed with <i class="fa fa-heart"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
        </div><!--//container-->
    </footer><!--//footer-->
 
    <!-- Javascript -->          
    <script type="text/javascript" src="assets/plugins/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>    
    <!-- custom js -->
    <script type="text/javascript" src="assets/js/main.js"></script>            
</body>
</html> 

