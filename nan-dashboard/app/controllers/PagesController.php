<?php

class PagesController
{
    public function home()
    {
        return view('index');
    }

    public function dashboard()
    {
        $skills = App::get('database')->selectAll('skills');

        if (isset($_GET['week'])) {
            session_start();
            $gradesThisWeek = App::get('database')->selectWeeks($_GET['week'], $_SESSION['user']);
            return view('dashboard', ['skills' => $skills, 'gradesThisWeek' => $gradesThisWeek]);
        }

        return view('dashboard', ['skills' => $skills]);
    }

    public function login()
    {
        $user = $_POST['user'];
        $password = $_POST['password'];

        $users = App::get('database')->selectUsers($user);

        if (count($users) > 0 && $users[0]->username == $user) {
            if ($users[0]->password == $password) {
                session_start();
                $_SESSION['user'] = $users[0];

                return redirect('');
            } else {
                return redirect('');
            }
        } else {
            return redirect('');
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        return redirect('');
    }
}
