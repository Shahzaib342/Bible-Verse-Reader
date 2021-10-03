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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
            <div class="panel-body">
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
                            <div class="col col-lg-6"><select class="form-control books">
                                    <option selected>Genesis</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select></div>
                            <div class="col col-lg-3 chapter"><select class="form-control">
                                    <option selected>1</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select></div>
                            <div class="col col-lg-3 verse"><select class="form-control">
                                    <option selected>1</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select></div>
                        </div>
                    </div>
                    <div class="col col-lg-6 backgrounds">
                        <div class="row">
                            <div class="col col-lg-5" style='background-image:url("img/test.jpeg")'>
                            </div>
                            <div class="col col-lg-1"></div>
                            <div class="col col-lg-5" style='background-image:url("img/test.jpeg")'>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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