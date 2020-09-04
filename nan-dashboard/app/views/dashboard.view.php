<?php require('partials/head.php'); ?>

<?php
$user = $_SESSION['user'];

$softSkills = array_filter($skills, function ($skill) {
  return $skill->type == "SOFT";
});

$hardSkills = array_filter($skills, function ($skill) {
  return $skill->type == "HARD";
});

?>

<h1 class="display-4 text-primary">Dashboard</h1>
<hr class="my-4">
<h1 class="mb-3">Skills Form</h1>

<form class="border rounded p-3 p-md-5  bg-white mb-5" method="POST" action="skills">
  <div class="form-group mb-3">
    <label for="week">Săptămâna</label>
    <select class="form-control" name="week" required>
      <option value='1'>Săptămâna 1</option>
      <option value='2'>Săptămâna 2</option>
      <option value='3'>Săptămâna 3</option>
      <option value='4'>Săptămâna 4</option>
      <option value='5'>Săptămâna 5</option>
      <option value='6'>Săptămâna 6</option>
    </select>
  </div>
  <hr>
  <h3 class="mb-3">Soft Skills</h3>
  <div class="form-row mb-3">
    <?php foreach ($softSkills as $skill) : ?>
      <div class="form-group col-md-3">
        <label for="<?= $skill->name; ?>">
          <?= $skill->name; ?>
        </label>
        <input type="number" class="form-control" placeholder="10" name="<?= $skill->id; ?>">
      </div>
    <?php endforeach ?>
  </div>
  <hr>
  <h3 class="mb-3">Hard Skills</h3>
  <div class="form-row mb-3">
    <?php foreach ($hardSkills as $skill) : ?>
      <div class="form-group col-md-3">
        <label for="<?= $skill->name; ?>">
          <?= $skill->name; ?>
        </label>
        <input type="number" class="form-control" placeholder="10" name="<?= $skill->id ?>">
      </div>
    <?php endforeach ?>
  </div>
  <button type="submit" class="btn btn-primary">Adaugă date</button>
</form>
<?php require('partials/footer.php'); ?>