<nav class="navbar border-bottom bg-white">
  <div class="container">
    <a class="navbar-brand mr-auto" href="/">NaN Team</a>
    <ul class="nav">
      <?php if (isset($_SESSION['user'])) : ?>
        <li class="nav-item">
          <a class="nav-link <?php if (Request::uri() == "") echo "active" ?>" href="/">Acasă</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if (Request::uri() == "dashboard") echo "active" ?>" href="dashboard">Dashboard</a>
        </li>
      <?php endif; ?>
    </ul>
    <?php if (isset($_SESSION['user'])) : ?>
      <a class="btn btn-primary" href="logout" role="button">Logout</a>
    <?php endif; ?>
  </div>

</nav>
