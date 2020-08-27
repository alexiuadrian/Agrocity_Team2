<?php
class Post
{
  // DB stuff
  private $connection;
  private $table = 'books';

  // Post Properties
  public $id;
  public $title;
  public $body;
  public $author;

  // Constructor with DB
  public function __construct($db)
  {
    $this->connection = $db;
  }

  // Get Posts
  public function read()
  {
    // Create query
    $query = 'SELECT b.id, b.title, b.body, b.author FROM ' . $this->table . ' b ORDER BY b.id';

    // Prepare statement
    $statement = $this->connection->prepare($query);

    // Execute query
    $statement->execute();

    return $statement;
  }

  // Get Single Post
  public function read_single()
  {
    // Create query
    $query = 'SELECT b.id,  b.title, b.body, b.author FROM ' . $this->table;

    // Prepare statement
    $statement = $this->connection->prepare($query);

    // Bind ID
    $statement->bindParam(1, $this->id);

    // Execute query
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $this->title = $row['title'];
    $this->body = $row['body'];
    $this->author = $row['author'];
  }
}
