<?php

class Book {
  public $title;
  public $author;
  public $year;
  public $color;
  public $signum;

  public function setter($postData) {
    foreach ($postData as $key => $value) {
      $this->$key = $value;
    }
  }

  public function storeBook() {
    $fileHandle = fopen("library.txt", "a+");
    $writeString = serialize($this) . PHP_EOL;
    fwrite($fileHandle, $writeString);
    fclose($fileHandle);
  }

  public function getStorage() {
    $fileHandle = fopen("library.txt", "r");
    $storage = array();
    while(!feof($fileHandle)) {
      $storage[] = unserialize(fgets($fileHandle));
    }
    fclose($fileHandle);
    return $storage;
  }

  public function getter() {
    $string = "";
    foreach ($this as $key => $value) {
      $string .= $key . ": " . $value . "<br />";
    }
    return $string;
  }

  public function getForm($page) {
    $formString = "<form action=\"$page\" method=\"POST\">";

    foreach ($this as $key => $value) {

      $formString .= "<label for=\"$key\">$key</label>";
      $formString .= "<input type =\"text\" name=\"$key\"><br />";

    }
    $formString .= "<input type = \"submit\" name=\"submit\" value=\"Lägg till bok\">";
    $formString .= "</form>";
    return $formString;
  }
}

?>
