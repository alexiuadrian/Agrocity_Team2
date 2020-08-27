<?php
class Quote
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


  //  // Create Post
  public function create()
  {
    // Create query
    $query = 'INSERT INTO ' . $this->table . ' SET title = :title, body = :body, author = :author';

    // Prepare statement
    $stmt = $this->connection->prepare($query);

    // Clean data
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->body = htmlspecialchars(strip_tags($this->body));
    $this->author = htmlspecialchars(strip_tags($this->author));

    // Bind data
    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':body', $this->body);
    $stmt->bindParam(':author', $this->author);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }
}
