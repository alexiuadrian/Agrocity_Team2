<?php

class SkillsController
{
    public function store()
    {
        session_start();

        $week = $_POST['week'];
        $user_id = $_SESSION['user']->id;


        $skills = array_slice($_POST, 1, NULL, true);

        foreach ($skills as $key => $value) {

            $parameters = [
                'user_id' => $user_id,
                'skill_id' => $key,
                'week' => $week,
                'grade' => $value
            ];

            App::get('database')->insert('grades', $parameters);
        }

        return redirect('dashboard');
    }


    public function update()
    {
        $grades = array_slice($_POST, 1, NULL, true);


        foreach ($grades as $key => $value) {
            App::get('database')->updateGrade($key, $value);
        }

        return redirect('dashboard?week=' . $_POST["week"]);
    }
}
