<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Point of Sale</title>
        <META NAME="POS" CONTENT="DCIT LTD POS">
        <!--    favicon Icon set-->
        <link rel="icon" type="image/x-icon" href="images/dcit.ico">
            <link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
            <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="css/animate.css" rel="stylesheet" type="text/css" />
            <link href="css/admin.css" rel="stylesheet" type="text/css" />
            <!--login js-->
            <script src="js/jquery.js"></script>
            <script>
                $(function() {
                    $('#login').on('submit', function(e) {
                        e.preventDefault();
                        var username = $('[name="username"]');
                        var password = $('[name="password"]');


                        var dataString =
                                'username=' + username.val() +
                                '&password=' + password.val();

                        //alert(dataString);

                        $.ajax({
                            type: 'post',
                            url: 'post_url/login',
                            data: dataString,
                            success: function(data) {
                                //alert(data);
                                arr = new Array();
                                arr = data.split("|");

                                if (arr[0] == 0) {
                                    window.location = 'dashboard';
                                }
                                else {
                                    //rh_msgbox(arr[1]);
                                    //alert(arr[1]);
                                    alert('Invalid Login');
									$('#password').val('');
                                   // window.location = 'index';
                                }
                            },
                            error: function() {
                                //alert('Error');
                            }

                        });
                    });
                });
            </script>

            <!--login js end here-->

    </head>
    <body class="light_theme  fixed_header left_nav_fixed">
        <div class="wrapper">
            <!--\\\\\\\ wrapper Start \\\\\\-->
            <div class="login_page">
                <div class="login_content">
                    <div class="panel-heading border login_heading">login in now</div>	
                    <form method="post" action="" class="form-horizontal" id="login">
                        <div class="form-group">

                            <div class="col-sm-10">
                                <input type="text" placeholder="Username or Email" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-sm-10">
                                <input type="password" id="password" placeholder="Password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class=" col-sm-10">
                                <div class="checkbox checkbox_margin">
                                    <label class="lable_margin">
                                        <input type="checkbox"><p class="pull-left"> Remember me</p></label>

                                    <input type="submit" name="login" value="Sign in" class="btn btn-default pull-right">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <script src="js/bootstrap.min.js"></script>

            <script src="js/jquery.slimscroll.min.js"></script>
    </body>
</html>
