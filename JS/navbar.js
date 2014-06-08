document.write('\
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">\
  <div class="container">\
    <div class="navbar-header">\
      <a class="navbar-brand" href="home.htm">Library</a>\
    </div>\
    <div class="collapse navbar-collapse">\
      <ul class="nav navbar-nav">\
        <!-- Link to about page -->\
        <li><a href="about.htm">About Us</a></li>\
        <!-- Link to contact us page -->\
        <li><a href="contact.htm">Contact Us</a></li>\
      </ul>\
      <form class="navbar-form navbar-right" role="form">\
        <input type="text" class="form-control" placeholder="Search...">\
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>\
        <div class="btn-group">\
          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">\
            Login <span class="caret"></span>\
          </button>\
          <div class="dropdown-menu" >\
            <div class="col-sm-12">\
              <div class="col-sm-12">\
                <b>Login</b>\
              </div>\
              <div class="col-sm-12">\
                <input type="text" placeholder="Library ID" onclick="return false;" class="form-control input-sm" id="inputError" />\
              </div>\
              <br/>\
              <div class="col-sm-12">\
                <input type="password" placeholder="PIN" class="form-control input-sm" name="password" id="Password1" />\
              </div>\
              <div class="col-sm-12">\
                <button type="submit" class="btn btn-success btn-sm">Sign in</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </form>\
    </div><!-- /.nav-collapse -->\
  </div><!-- /.container -->\
</div><!-- /.navbar -->\
\
');