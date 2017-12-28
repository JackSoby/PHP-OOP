<?php
/*
Coding Test
Do all work in this single file.
Instructions
------------
1. Implement a constructor for the Author class which allows setting
the email and name for an Author.
2. Add a new property 'author' to the Article class along with a setter and getter.
Have the setter ensure that its sole argument is an Author object.
3. Implement Article's validate method based on rules in the docblock.
4. Implement the PHP built-in JsonSerializable interface on the Article class.
http://www.php.net/manual/en/class.jsonserializable.php
Only the title, body, and author name should be returned. Add any methods
to Author or Article that you need.
5. Write some procedural code (at the bottom of this file) that creates a new
Article class, ensures that it validates, and then echoes out the Article as JSON.
Add any methods to Article that are deemed necessary.
*/
/**
 * Representation of a single author
 */

class Author {
  protected $email;
  protected $name;

  public function __construct($email, $name) {
    $this->email = $email;
    $this->name = $name;
  }
  public function getName()
  {
      return $this->name;
  }
}


/**
 *  Representation of a single article
 */
class Article implements JsonSerializable {
    protected $title;
    protected $body;
    protected $status;
    protected $author;

    public function jsonSerialize() {
      return [
        'Author ' => $this->author->getName(),
        'Title ' => $this->title,
        'Body' => $this->body,
    ];
      }

    public function setAuthor($author)
    {
      if (is_object($author))
        $this->author = $author;
    }

   public function getAuthor()
   {
     return $this->author->getName();
   }
    /**
     * Gets the title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Gets the body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }
    /**
     * Gets the status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * Sets the title parameter
     *
     * @param string $title The article title
     *
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    /**
     * Sets the body parameter
     *
     * @param string $body The article body
     *
     * @return void
     */
    public function setBody($body)
    {
        $this->body = $body;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    /**
     * Validate the object.
     *
     * Ensure that the title, body, status, and author have been set.
     * Ensure that the title is not longer than 80 characters.
     * Ensure that the body has no HTML tags.
     * Ensure that the status is either 'Active' or 'Inactive'.
     *
     * If any assertions fail, a LogicException will be thrown with
     * appropriate messages.
     *
     * @throws LogicException
     *
     * @return void
     */
    public function validate()
    {
    if ($this->title == NULL ) {
    $LogicException = "\nplease input a title\n";
    }
    if ($this->body == NULL ) {
    $LogicException .= "please input a body\n";
    }
    if ($this->status == NULL ) {
    $LogicException .= "please input a status\n";
    }
    if ($this->author == NULL ) {
    $LogicException .= "please input a author\n";
    }
    if (strlen($this->title) > 80 ) {
    $LogicException .= "title must be shorter then 80 characters\n";
    }
    if ($this->status != 'active' | 'inactive') {
      $LogicException .= "please make status active or inactve\n";
    }
    if($this->body = strip_tags($body)){
      $LogicException .= "HTML cannot be submitted\n";
    }

return $LogicException;
  }
}

$author= new Author('foo@bar.com', 'jack');
$article = new Article;
$article->setAuthor($author);
$article->setTitle('hello world');
$article->SetBody('great article');
$article->SetStatus('active');
echo json_encode($article);
echo $article->validate();
