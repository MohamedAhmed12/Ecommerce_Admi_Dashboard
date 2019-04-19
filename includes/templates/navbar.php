<nav class="navbar navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#appnav" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand bold" href="dashboard.php"><?php echo lang('HOME');?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="appnav">
      <ul class="nav navbar-nav">
        <li class="active"><a href="categories.php"><?php echo lang('cat');?><span class="sr-only">(current)</span></a></li>
        <li><a href="items.php"><?php echo lang('items');?><span class="sr-only">(current)</span></a></li>
        <li ><a href="members.php"><?php echo lang('members');?><span class="sr-only">(current)</span></a></li>
        <li ><a href="comments.php"><?php echo lang('comments');?><span class="sr-only">(current)</span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo lang('Dropdown_menu')?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="members.php?action=Edit&userid=<?php echo $_SESSION['ID']; ?>">Profile</a></li>
            <li><a href="#">Setting</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>