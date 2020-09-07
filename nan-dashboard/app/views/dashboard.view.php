 <?php require('partials/head.php'); ?>

 <?php
  if (!isset($_SESSION)) session_start();

  $user = $_SESSION['user'];

  $softSkills = array_filter($skills, function ($skill) {
    return $skill->type == "SOFT";
  });

  $hardSkills = array_filter($skills, function ($skill) {
    return $skill->type == "HARD";
  });

  ?>

 <h1 class="display-4 text-primary">Personal Grades</h1>
 <hr class="my-4">
 <h1 class="mb-3">Skills Form</h1>

 <form class="border rounded p-3 p-md-5  bg-white mb-5" method="GET" action="dashboard">
   <div class="form-group mb-3">
     <label for="week">Săptămâna</label>
     <select class="form-control" name="week" required>
       <option disabled selected>Selectează săptămâna</option>
       <option value='1'>Săptămâna 1</option>
       <option value='2'>Săptămâna 2</option>
       <option value='3'>Săptămâna 3</option>
       <option value='4'>Săptămâna 4</option>
       <option value='5'>Săptămâna 5</option>
       <option value='6'>Săptămâna 6</option>
     </select>
   </div>
   <button type="submit" class="btn btn-primary">Vezi note</button>
 </form>

 <?php if (isset($_GET['week'])) : ?>

   <?php

    $gradesCount = count($gradesThisWeek);

    // skill_id => grade
    $grades = [];

    foreach ($gradesThisWeek as $key => $value) {
      $key = $value->skill_id;
      $grades[$key] = $value;
    }
    ?>





   <h1 class="mb-3">Note săptămâna <?= $_GET['week'] ?></h1>

   <form class="border rounded p-3 p-md-5  bg-white mb-5" method="POST" action="<?= ($gradesCount != 0) ? 'update' : 'insert' ?>">
     <input type="hidden" name="week" value="<?= $_GET['week'] ?>">
     <h3 class="mb-3">Soft Skills</h3>
     <div class="form-row mb-3">
       <?php foreach ($softSkills as $skill) : ?>
         <div class="form-group col-md-3">
           <label for="<?= $skill->name; ?>">
             <?= $skill->name; ?>
           </label>
           <input type="number" class="form-control" placeholder="Adaugă notă" <?= ($gradesCount != 0) ? "value='{$grades[$skill->id]->grade}'" : "" ?> name="<?= ($gradesCount != 0) ? $grades[$skill->id]->id : $skill->id; ?>" min="0" max="10" required>
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
           <input type="number" class="form-control" placeholder="Adaugă notă" <?= ($gradesCount != 0) ? "value='{$grades[$skill->id]->grade}'" : "" ?> name="<?= ($gradesCount != 0) ? $grades[$skill->id]->id : $skill->id; ?>" min="0" max="10" required>
         </div>
       <?php endforeach ?>
     </div>
     <button type="submit" class="btn btn-primary"><?= ($gradesCount == 0) ?  "Adaugă note" :  "Actualizează note" ?></button>
   </form>
 <?php endif ?>

 <?php require('partials/footer.php'); ?>