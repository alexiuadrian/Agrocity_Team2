<?php require('partials/head.php'); ?>



<?php
  if(! isset($_SESSION['user'])) : ?>
<div class="d-flex justify-content-center">
  <div class="container card p-5">
    <h1 class="text-primary border-bottom pb-3 mb-3">Login</h1>
      <form method="post" action ="login">
      <div class="form-group">
        <label for="user">Username</label>
        <input type="text" class="form-control" id="user" name="user" placeholder="Username" required>
      </div>
      <div class="form-group">
        <label for="password">Parola</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Parola" required>
      </div>
      <button type="submit" class="btn btn-primary mt-3">Login</button>
    </form>
  </div>
</div>


  <?php else: 
    $user = $_SESSION['user']?>
    <div class="jumbotron">
      <h1 class="display-4">Bun venit, <?= $user->first_name; ?>!</h1>
      <p class="lead">Accesează dashboard-ul pentru a adăuga sau actualiza skillurile tale din fiecare săptămână.</p>
      <hr class="my-4">
      <a class="btn btn-primary btn-lg" href="dashboard" role="button">Intră în Dashboard</a>
    </div>
  <?php endif; ?>

<?php require('partials/footer.php'); ?>