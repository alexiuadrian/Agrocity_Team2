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
            die('Whoops, something went wrong.');
        }
    }
}
