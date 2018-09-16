<?php include "header.view.php" ?>
<?php


$pages = $_SESSION['pages'] ?? '';

var_dump($pages);

?>
<form action="?page=1" method="post">
    <input class="input" type="text" name="searchString">
    <button name= "searchOrder" class="is-primary button is-medium">Search</button>
</form>
<table class="table">
  <thead>
    <tr>
      <th>Id
              <a href="?sort=ASC&sortBy=id"> <i class="fa fa-angle-up"></i></a>
              <a href="?sort=DESC&sortBy=id"> <i class="fa fa-angle-down"></i></a>
      <th>First Name
                <a href="?sort=ASC&sortBy=first_name"> <i class="fa fa-angle-up"></i></a>
                <a href="?sort=DESC&sortBy=first_name"> <i class="fa fa-angle-down"></i></a>
            </th>
      <th>Last Name
              <a href="?sort=ASC&sortBy=last_name"> <i class="fa fa-angle-up"></i></a>
              <a href="?sort=DESC&sortBy=last_name"> <i class="fa fa-angle-down"></i></a>
          </th>
      <th>Email
              <a href="?sort=ASC&sortBy=email"> <i class="fa fa-angle-up"></i></a>
              <a href="?sort=DESC&sortBy=email"> <i class="fa fa-angle-down"></i></a>
          </th>
      <th>Address
              <a href="?sort=ASC&sortBy=address"> <i class="fa fa-angle-up"></i></a>
              <a href="?sort=DESC&sortBy=address"> <i class="fa fa-angle-down"></i></a>
          </th>
      <th>Phone
              <a href="?sort=ASC&sortBy=phone"> <i class="fa fa-angle-up"></i></a>
              <a href="?sort=DESC&sortBy=phone"> <i class="fa fa-angle-down"></i></a>
          </th>
      <th>Quantity
              <a href="?sort=ASC&sortBy=quantity"> <i class="fa fa-angle-up"></i></a>
              <a href="?sort=DESC&sortBy=quantity"> <i class="fa fa-angle-down"></i></a>
          </th>
      <th>Order date
              <a href="?sort=ASC&sortBy=date"> <i class="fa fa-angle-up"></i></a>
              <a href="?sort=DESC&sortBy=date"> <i class="fa fa-angle-down"></i></a>
          </th>
    </tr>
  </thead>

  <tbody>

  <?php foreach($orders as $order): ?>
      <tr>
          <td><?php echo $order['id']?></td>
          <td><?php echo $order['first_name']?></td>
          <td><?php echo $order['last_name']?></td>
          <td><?php echo $order['email']?></td>
          <td><?php echo $order['address']?></td>
          <td><?php echo $order['phone']?></td>
          <td><?php echo $order['quantity']?></td>
          <td><?php echo $order['date']?></td>
      </tr>

  <?php endforeach; ?>
  </tbody>
</table>
    <?php for($x = 1; $x <= $pages; $x++): ?>
        <a class="pagination-link" href="?page=<?php echo $x;?>"><?php echo $x ?></a>

    <?php endfor; ?>


<?php include "footer.view.php" ?>
