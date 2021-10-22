<?php
session_start();
if (!isset($_SESSION['access_token'])) {
    header('location:auth.php');
}
include 'all.php';
?>


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/app.css">

    <meta name="theme-color" content="#fafafa">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col col-lg-4"></div>
            <div class="col col-lg-4">
                <h2>Clive Bible Logo</h2>
                <label class="switch">
                    <input type="checkbox" id="togBtn">
                    <div class="slider round">
                        <span class="on">Lyrics</span>
                        <span class="off">Bible</span>
                    </div>
                </label>
            </div>
            <div class="col col-lg-4">
                <img src="<?php echo $_SESSION['user_image']; ?> " alt="Avatar" class="avatar">
                <h4><?php echo $_SESSION['user_first_name'] . ' ' .  $_SESSION['user_last_name']; ?> <a href="logout.php" class="logout">Logout</a></h2>
                    <p>Days left - 19</p>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body p-4">
                <div class="row">
                    <div class="col col-lg-12 backgrounds">
                        <h4 class="text-center bg-heading">Backgrounds</h4>
                        <div class="row">
                            <div class="col col-lg-2 bg bg-img-1" onclick="selectBackground($(this))" style='background-image:url("img/bg-1.jpg")'>
                            </div>
                            <div class="col col-lg-2 bg bg-img-2" onclick="selectBackground($(this))" style='background-image:url("img/bg-2.jpg")'>
                            </div>
                            <div class="col col-lg-2 bg bg-img-3" onclick="selectBackground($(this))" style='background-image:url("img/bg-3.jpg")'>
                            </div>
                            <div class="col col-lg-2 bg bg-img-4" onclick="selectBackground($(this))" style='background-image:url("img/bg-4.jpg")'>
                            </div>
                            <div class="col col-lg-2 bg bg-img-5" onclick="selectBackground($(this))" style='background-image:url("img/bg-5.jpg")'>
                            </div>
                            <div class="col col-lg-2 bg bg-img-6" onclick="selectBackground($(this))" style='background-image:url("img/bg-6.jpeg")'>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-12 row-with-languages">
                        <div class="row">
                            <div class="col col-lg-5">
                                <h4 class="text-center lang-heading">Languages</h4>
                                <div class="row">
                                    <div class="col col-lg-6 lang-1">
                                        <select class="form-control">
                                            <option selected value="">Select Language</option>
                                            <option value="English">English</option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="Kannada">Kannada</option>
                                            <option value="Malayalam">Malayalam</option>
                                            <option value="Tamil">Tamil</option>
                                            <option value="Telugu">Telugu</option>
                                        </select>
                                    </div>
                                    <div class="col col-lg-6 lang-2">
                                        <select class="form-control">
                                            <option selected value="">Select Language</option>
                                            <option value="English">English</option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="Kannada">Kannada</option>
                                            <option value="Malayalam">Malayalam</option>
                                            <option value="Tamil">Tamil</option>
                                            <option value="Telugu">Telugu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-3 text-center">
                                <h4 class="text-center lang-heading visibility-none">Languages</h4>
                                <label class="switch">
                                    <input type="checkbox" id="togBtn">
                                    <div class="slider round" onclick="toggleTestament($(this))">
                                        <span class="on">New Testament</span>
                                        <span class="off">Old Testament</span>
                                    </div>
                                </label>
                            </div>
                            <div class="col col-lg-4">
                                <h4 class="text-center lang-heading visibility-none">Languages</h4>
                                <div class="row mt-2 verse-btns">
                                    <div class="col col-lg-6">
                                        <button type="button" class="btn btn-light" onclick="Previous()">Previous</button>
                                    </div>
                                    <div class="col col-lg-6">
                                        <button type="button" class="btn btn-light" onclick="Next()">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-12 row-with-books-list">
                        <div class="row all-books-list">
                            <?php foreach ($books as $book) { ?>
                                <div class="col col-lg-2 books-buttons">
                                    <div id="<?php echo $book["ID"]; ?>" class="book-name">
                                        <span><?php echo $book["BOOK"]; ?></span>
                                        <div class="row chapter-and-verse">
                                            <div class="chapter-and-verse-row">
                                                <div class="col col-lg-5 chapter">
                                                    <select>
                                                        <?php foreach ($chapters as $chapter) { ?>
                                                            <option value="<?php echo $chapter["chapter"]; ?>"><?php echo $chapter["chapter"]; ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                <div class="col col-lg-5 verse">
                                                    <select onchange="getVerse($(this))">
                                                        <?php foreach ($verse as $v) {   ?>
                                                            <option value="<?php echo $v["verse"]; ?>"><?php echo $v["verse"]; ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body" style="background-image:url('img/bg-1.jpg')">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="book book-1"></h4>
                    <p class="lang-1"></p>
                    <h4 class="book book-2"></h4>
                    <p class="lang-2"></p>
                </div>

            </div>
        </div>
    </div>


    <script src="js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'anonymizeIp', true);
        ga('set', 'transport', 'beacon');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>