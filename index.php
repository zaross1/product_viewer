


<?php
require_once('database.php');

  if (!isset($category_id)) {
    $category_id = filter_input(INPUT_GET, 'category_id',
            FILTER_VALIDATE_INT);
  }
  if ($category_id == NULL || $category_id == FALSE) {
      $category_id = 1;
  }

  $queryCategory = 'SELECT * FROM categories
                    WHERE categoryID = :category_id';
  $statement1 = $db->prepare($queryCategory);
  $statement1->bindValue(':category_id', $category_id);
  $statement1->execute();
  $category = $statement1->fetch();
  $category_name = $category['categoryName'];
  $statement1->closeCursor();

  $queryAllCategories = 'SELECT * FROM categories ORDER BY category_id';
  $statement2 = $db-> prepare($queryAllCategories);
  $statement2->execute();
  $categories = $statement2->fetchAll();
  $statement2->closeCursor();

  $queryProducts = 'SELECT * FROM products WHERE categoryID = ;category_id ORDER BY product_id';
  $statement3 = $db->prepare($queryProducts);
  $statement3->bindValue(':category_id', $category_id);
  $statement3->execute();
  $products = $statement3->fetchAll();
  $statement4->closeCursor();
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
      <title>Guitar Shop</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <main>
      <h1>Product List</h1>
      <aside>
        <h2>Categories</h2>
        <nav>
          <u1>
            <?php foreach ($categories as $category) : ?>
            <li>
                  <a href="?category_id=<?php echo $category['categoryID']; ?>">
                      <?php echo $category['categoryName']; ?>
                  </a>
            </li>
          </u1>
        </nav>
      </aside>

      <section>
        <h2><?php echo $category_name; ?></h2>
        <table>
          <tr>
            <th>Code</th>
            <th>Name</th>
            <th class="right">Price</th>
          </tr>
          <tr>
            <td><?php echo $product['productCode']; ?></td>
            <td><?php echo $product['productName']; ?></td>
            <td class="right"><?php echo $product['listPrice']; ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </section>
  </main>
  <footer></footer>
</body>
</html>






















 ?>
