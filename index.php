<?php include 'all.php'; ?>

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
    <div class="container">
        <h2>Panel Heading</h2>
        <div class="panel panel-default">
            <div class="panel-body p-4">
                <div class="row">
                    <div class="col col-lg-6">
                        <label class="switch">
                            <input type="checkbox" id="togBtn">
                            <div class="slider round">
                                <span class="on">New Testament</span>
                                <span class="off">Old Testament</span>
                            </div>
                        </label>
                        <div class="row">
                            <div class="col col-lg-6">
                                <select class="form-control books">
                                    <?php foreach($books as $book) { ?>
                                    <option value="<?php echo $book["ID"]; ?>"><?php echo $book["BOOK"]; ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="col col-lg-3 chapter">
                                <select class="form-control">
                                <?php foreach($chapters as $chapter) { ?>
                                    <option value="<?php echo $chapter["chapter"]; ?>"><?php echo $chapter["chapter"]; ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="col col-lg-3 verse">
                                <select class="form-control" onchange="getVerse($(this).val())">
                                <?php foreach($verse as $verse) { ?>
                                    <option value="<?php echo $verse["verse"]; ?>"><?php echo $verse["verse"]; ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col col-lg-6">
                                <button type="button" class="btn btn-light" onclick="Previous()">Previous</button>
                            </div>
                            <div class="col col-lg-6">
                            <button type="button" class="btn btn-light" onclick="Next()">Next</button>
                            </div>
                        </div>
                        <div class="row">
                            <h4 class="text-center">Select Language</h4>
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
                    <div class="col col-lg-6 backgrounds">
                        <div class="row">
                            <div class="col col-lg-5 bg bg-img-1" onclick="selectBackground($(this))" style='background-image:url("img/bg-1.jpg")'>
                            </div>
                            <div class="col col-lg-1"></div>
                            <div class="col col-lg-5 bg bg-img-2" onclick="selectBackground($(this))" style='background-image:url("img/bg-2.jpg")'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-5 bg bg-img-3" onclick="selectBackground($(this))" style='background-image:url("img/bg-3.jpg")'>
                            </div>
                            <div class="col col-lg-1"></div>
                            <div class="col col-lg-5 bg bg-img-4" onclick="selectBackground($(this))" style='background-image:url("img/bg-4.jpg")'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-5 bg bg-img-5" onclick="selectBackground($(this))" style='background-image:url("img/bg-5.jpg")'>
                            </div>
                            <div class="col col-lg-1"></div>
                            <div class="col col-lg-5 bg bg-img-6" onclick="selectBackground($(this))" style='background-image:url("img/bg-6.jpeg")'>
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
    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
      <!-- Modal body -->
      <div class="modal-body" style="background-image:url('img/bg-1.jpg')">
       <h4 class="book"></h4>
       <p class="lang-1"></p>
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