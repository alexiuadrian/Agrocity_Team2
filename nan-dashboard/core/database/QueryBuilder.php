<?php


class QueryBuilder
{

    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectUsers($userName)
    {
        $statement = $this->pdo->prepare("SELECT * FROM users WHERE username = '{$userName}'");
        //$statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE username = '" . $user . "' AND password = '" . $pass . "'");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectWeeks($week, $user)
    {

        // 'SELECT * FROM grades WHERE user_id = $_SESSION['user'] AND week = $_POST['week']'
        $statement = $this->pdo->prepare("SELECT * FROM grades WHERE user_id = '{$user->id}' AND week = '{$week}'");
        //$statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE username = '" . $user . "' AND password = '" . $pass . "'");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }



    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(',', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // UPDATE `grades` SET `grade` = '7' WHERE `grades`.`id` = 327;
    // UPDATE `grades` SET `grade` = 10 WHERE `grade_id` = 1
    public function updateGrade($gradeId, $newGrade)
    {
        $sql = "UPDATE grades SET grade = '{$newGrade}' WHERE id = '{$gradeId}'";

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
