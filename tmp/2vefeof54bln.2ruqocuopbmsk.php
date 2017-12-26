
<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="/"><?= $SESSION['user'] ?>|<?= $SESSION['bp_id'] ?></a>
    </div>


   <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">PO's
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/po">List</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Quote
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/quote/create">Create</a></li>
          <li><a href="/quote">List</a></li>
        </ul>
      </li>
     <?php if ($SESSION['roles']=='Admin'): ?>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Users
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/users/create">Create</a></li>
          <li><a href="/users">List</a></li>
        </ul>
      </li>
      <?php endif; ?>
      <li><a href="/users/password/<?= $SESSION['user'] ?> ">Change Password</a></li>
      <li><a href="/logout">Logout</a><li>
    </ul>
   </div>


  </div>
</nav>
