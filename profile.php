<?php require_once("include/header.php"); ?>
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Setting</h1>
          <h2 class="">Profile</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Setting</a></li>
            <li class="active">Profile</li>
          </ol>
        </div>
      </div>
      <div class="container clear_both padding_fix">
        <section class="panel panel-default">
          <div class="panel-body">
            <div class="row">
        <div class="col-md-6">
              <div class="block-web full">
                <ul class="nav nav-tabs nav-justified nav_bg">
                  <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-user"></i> About</a></li>
                  <li class=""><a href="#edit-profile" data-toggle="tab"><i class="fa fa-pencil"></i> Edit</a></li>
                <!--  <li class=""><a href="#user-activities" data-toggle="tab"><i class="fa fa-laptop"></i> Activities</a></li>
                  <li class=""><a href="#mymessage" data-toggle="tab"><i class="fa fa-envelope"></i> Message</a></li>-->
                </ul>
                <div class="tab-content">
                  <div class="tab-pane animated fadeInRight active" id="about">
                    <div class="user-profile-content">
                      <h5><strong>ABOUT</strong> ME</h5>
                      <p><?php echo $us_row['about']; ?></p>
                      <hr>
                      <div class="row">
                        <div class="col-sm-6">
                          <h5><strong>CONTACT</strong> ME</h5>
                          <address>
                          <strong>Phone</strong><br>
                          <abbr title="Phone"><?php echo $us_row['mobile']; ?></abbr>
                          </address>
                          <address>
                          <strong>Email</strong><br>
                          <a href="mailto:#"><?php echo $us_row['email']; ?></a>
                          </address>
                          <address>
                          <strong>Website</strong><br>
                          <a href="profile">http://abcd.com</a>
                          </address>
                        </div>
                        <div class="col-sm-6">
                          <h5><strong>MY</strong> SKILLS</h5>
                          <p>UI Design</p>
                          <p>Clean and Modern Web Design</p>
                          <p>PHP and MySQL Programming</p>
                          <p>Vector Design</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane animated fadeInRight" id="edit-profile">
                    <div class="user-profile-content">
                      <form role="form" method="post" action="">
                       <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <div class="form-group">
                          <label for="FullName">Full Name</label>
                          <input type="text" class="form-control" name="name" value="<?php echo $us_row['name']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="Email">Email</label>
                          <input type="email" required class="form-control" name="email" value="<?php echo $us_row['email']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="Username">Mobile</label>
                          <input type="text" required class="form-control" name="mobile" value="<?php echo $us_row['mobile']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="Username">Username</label>
                          <input type="text" class="form-control" readonly name="username" value="<?php echo $us_row['username']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="Password">Password</label>
                          <input type="password" class="form-control" name="password" placeholder="6 - 15 Characters">
                        </div>
                        <div class="form-group">
                          <label for="RePassword">Re-Password</label>
                          <input type="password" class="form-control" name="repassword" placeholder="6 - 15 Characters">
                        </div>
                        <div class="form-group">
                          <label for="AboutMe">About Me</label>
                          <textarea class="form-control" name="about" style="height: 125px;"><?php echo $us_row['about']; ?></textarea>
                        </div>
                        <button type="button" name="user_update" class="btn btn-primary">Save</button>
                      </form>
                    </div>
                  </div>
                  <div class="tab-pane" id="user-activities">
                    <ul class="media-list">
                      <li class="media"> <a href="#">
                        <p><strong>John Doe</strong> Uploaded a photo <strong>"DSC000254.jpg"</strong> <br>
                          <i>2 minutes ago</i></p>
                        </a> </li>
                      <li class="media"> <a href="#">
                        <p><strong>Imran Tahir</strong> Created an photo album <strong>"Indonesia Tourism"</strong> <br>
                          <i>8 minutes ago</i></p>
                        </a> </li>
                      <li class="media"> <a href="#">
                        <p><strong>Colin Munro</strong> Posted an article <strong>"London never ending Asia"</strong> <br>
                          <i>an hour ago</i></p>
                        </a> </li>
                      <li class="media"> <a href="#">
                        <p><strong>Corey Anderson</strong> Added 3 products <br>
                          <i>3 hours ago</i></p>
                        </a> </li>
                      <li class="media"> <a href="#">
                        <p><strong>Morne Morkel</strong> Send you a message <strong>"Lorem ipsum dolor..."</strong> <br>
                          <i>12 hours ago</i></p>
                        </a> </li>
                      <li class="media"> <a href="#">
                        <p><strong>Imran Tahir</strong> Updated his avatar <br>
                          <i>Yesterday</i></p>
                        </a> </li>
                    </ul>
                  </div>
                  <div class="tab-pane" id="mymessage">
                    <ul class="media-list">
                      <li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#fakelink">John Doe</a> <small>Just now</small></h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                      </li>
                      <li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#fakelink">Tim Southee</a> <small>Yesterday at 04:00 AM</small></h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus</p>
                        </div>
                      </li>
                      <li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#fakelink">Kane Williamson</a> <small>January 17, 2014 05:35 PM</small></h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                      </li>
                      <li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#fakelink">Lonwabo Tsotsobe</a> <small>January 17, 2014 05:35 PM</small></h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                      </li>
                      <li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#fakelink">Dale Steyn</a> <small>January 17, 2014 05:35 PM</small></h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                      </li>
                      <li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#fakelink">John Doe</a> <small>Just now</small></h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <!--/tab-content-->
              </div>
              <!--/block-web-->
            </div>
            <!--/col-md-8-->
      </div>
      
          </div>
        </section>
      </div>
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->

<?php require_once("include/footer.php"); ?>