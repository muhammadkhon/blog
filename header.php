<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Добавить категорию</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

    <!-- Header -->
    <header id="header">
        <!-- Nav -->
        <div id="nav">
            <!-- Main Nav -->
            <div id="nav-fixed">
                <div class="container">
                    <!-- logo -->
                    <div class="nav-logo">
                        <a href="/" class="logo"><img src="./img/logo.png" alt=""></a>
                    </div>
                    <!-- /logo -->

                    <!-- nav -->
                    <ul class="nav-menu nav navbar-nav">
                        <li>
                            <?php if (isset($_SESSION['id'])) : ?>
                                <a href="logout.php?logout=1">Выход</a>
                            <?php else : ?>
                                <a href="login.php">Вход</a>
                            <?php endif; ?>

                        </li>
                        <li><a href="category.html">News</a></li>
                        <li><a href="category.html">Popular</a></li>

                        <?php
                        try {
                            $sql = "SELECT * FROM category WHERE status = 1";
                            $result = $db->query($sql);
                            $style = '<style>';
                            while ($row = $result->fetch()) {
                                echo '<li class="cat-' . $row['id'] . '"><a href="show_category.php?id' . $row['id'] . '">' . $row['name'] . '</a></li>';
                                $style .= '
                                .nav-menu li.cat-' . $row['id'] . ' a:after {
                                    background-color: ' . $row['color'] . ';
                                }
                                .nav-menu li.cat-' . $row['id'] . ' a:hover, .nav-menu li.cat-' . $row['id'] . ' a:focus {
                                    color: ' . $row['color'] . ';
                                }
                                ';
                            }

                            echo $style . '</style>';
                        }
                        catch (PDOException $e) {
							new Log($e);
							$_SESSION['error']['text'] = 'При выполнение данной операции произошла ошибка';
						} catch (Error $e) {
							new Log($e);
							$_SESSION['error']['text'] = 'При выполнение данной операции произошла ошибка';
						}
                        ?>
                        <!-- <li class="cat-1"><a href="category.html">Web Design</a></li>
                        <li class="cat-2"><a href="category.html">JavaScript</a></li>
                        <li class="cat-3"><a href="category.html">Css</a></li>
                        <li class="cat-4"><a href="category.html">Jquery</a></li> -->
                    </ul>
                    <!-- /nav -->

                    <!-- search & aside toggle -->
                    <div class="nav-btns">
                        <button class="aside-btn"><i class="fa fa-bars"></i></button>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                        <div class="search-form">
                            <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                            <button class="search-close"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /search & aside toggle -->
                </div>
            </div>
            <!-- /Main Nav -->

            <!-- Aside Nav -->
            <div id="nav-aside">
                <!-- nav -->
                <div class="section-row">
                    <ul class="nav-aside-menu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="#">Join Us</a></li>
                        <li><a href="#">Advertisement</a></li>
                        <li><a href="contact.html">Contacts</a></li>
                    </ul>
                </div>
                <!-- /nav -->

                <!-- widget posts -->
                <div class="section-row">
                    <h3>Recent Posts</h3>
                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="./img/widget-2.jpg" alt=""></a>
                        <div class="post-body">
                            <h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
                        </div>
                    </div>

                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="./img/widget-3.jpg" alt=""></a>
                        <div class="post-body">
                            <h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
                        </div>
                    </div>

                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="./img/widget-4.jpg" alt=""></a>
                        <div class="post-body">
                            <h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
                        </div>
                    </div>
                </div>
                <!-- /widget posts -->

                <!-- social links -->
                <div class="section-row">
                    <h3>Follow us</h3>
                    <ul class="nav-aside-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
                <!-- /social links -->

                <!-- aside nav close -->
                <button class="nav-aside-close"><i class="fa fa-times"></i></button>
                <!-- /aside nav close -->
            </div>
            <!-- Aside Nav -->
        </div>
        <!-- /Nav -->