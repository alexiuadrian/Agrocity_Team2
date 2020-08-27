<?php require('partials/head.php'); ?>

<?php
$user = $_SESSION['user']; 

$softSkills = array_filter($skills, function($skill){
    return $skill->type == "SOFT";
});

$hardSkills = array_filter($skills, function($skill){
    return $skill->type == "HARD";
});

?>

<h1 class="display-4 text-primary">Dashboard</h1>
<hr class="my-4">
<h1 class="mb-3">Skills Form</h1>
<form class="border rounded p-3 p-md-5 ">
  <div class="form-group mb-3">
    <label for="week">Săptămâna</label>
    <select class="form-control" name="week" required>
      <option>Săptămâna 1</option>
      <option>Săptămâna 2</option>
      <option>Săptămâna 3</option>
      <option>Săptămâna 4</option>
      <option>Săptămâna 5</option>
      <option>Săptămâna 6</option>
    </select>
  </div>
  <hr>
  <h3 class="mb-3">Soft Skills</h3>
  <div class="form-row mb-3">
    <?php foreach($softSkills as $skill): ?>
      <div class="form-group col-md-3">
          <label for="<?= $skill->name; ?>">
              <?= $skill->name; ?>
          </label>
          <input type="number" class="form-control" placeholder="10">
      </div>
    <?php endforeach ?>
  </div>
  <hr>
  <h3 class="mb-3">Hard Skills</h3>
  <div class="form-row mb-3">
    <?php foreach($hardSkills as $skill): ?>
      <div class="form-group col-md-3">
          <label for="<?= $skill->name; ?>">
              <?= $skill->name; ?>
          </label>
          <input type="number" class="form-control" placeholder="10">
      </div>
    <?php endforeach ?>
  </div>
  <button type="submit" class="btn btn-primary">Adaugă date</button>
</form>
<?php require('partials/footer.php'); ?>