<?php

include_once("class.Book.php");
$book = new Book;

if (isset($_POST['submit'])) {

  echo "<pre>";
  var_dump($_POST);
  echo "</pre>";

  // Ta bort submit, dvs sista elementet.
  array_pop($_POST);
  // Lagra boken
  $book->setter($_POST);
  echo $book->getter();
  $book->storeBook();

  // Visa hela bokförrådet.
  $storage = $book->getStorage();
  foreach($storage as $singleBook) {
    foreach ($singleBook as $key=>$value) {
      if ($key=="title")
        echo "<h1>$value</h1><ul>";
      else
        echo "<li>$key: $value</li>";
    }
    echo "</ul>";
  }
}
else {
  // plats för formulär.
  echo $book->getForm("index.php");

}

?>
