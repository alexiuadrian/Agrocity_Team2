<?php
class Post
{
  // DB stuff
  private $connection;
  private $table = 'paragraphs';

  // Post Properties
  public $id;
  public $category_id;
  public $category_name;
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
    $query = 'SELECT c.name as category_name, p.id, p.title, p.body, p.author
                              FROM ' . $this->table . ' p
                              LEFT JOIN
                                books c ON c.id = p.id
                              ORDER BY
                                p.id';

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
    $query = 'SELECT c.name as category_name, p.id,  p.title, p.body, p.author
                                  FROM ' . $this->table . ' p
                                  LEFT JOIN
                                    books c ON  c.id = p.id
                                  WHERE
                                    p.id = ?
                                  LIMIT 0,1';

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
    $this->category_name = $row['category_name'];
  }



  // Create Post
  public function create()
  {
    // Create query
    $query = 'INSERT INTO ' . $this->table . ' SET title = :title, body = :body, author = :author, category_id = :category_id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->body = htmlspecialchars(strip_tags($this->body));
    $this->author = htmlspecialchars(strip_tags($this->author));
    $this->category_id = htmlspecialchars(strip_tags($this->category_id));

    // Bind data
    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':body', $this->body);
    $stmt->bindParam(':author', $this->author);
    $stmt->bindParam(':category_id', $this->category_id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // Update Post
  public function update()
  {
    // Create query
    $query = 'UPDATE ' . $this->table . '
                        SET title = :title, body = :body, author = :author, category_id = :category_id
                        WHERE id = :id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->body = htmlspecialchars(strip_tags($this->body));
    $this->author = htmlspecialchars(strip_tags($this->author));
    $this->category_id = htmlspecialchars(strip_tags($this->category_id));
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':body', $this->body);
    $stmt->bindParam(':author', $this->author);
    $stmt->bindParam(':category_id', $this->category_id);
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // Delete Post
  public function delete()
  {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }
}
