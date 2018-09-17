<?php include "header.view.php" ?>
<?php


$pages = $_SESSION['pages'] ?? '';

?>
<form action="" method="post">
    <input class="input" type="text" name="searchString">
    <button name= "searchOrder" class="is-primary button is-medium">Search</button>

    <input name="search-inp" class="search-inp" type="text" readonly hidden value="">
    <input name="sortBy-inp" class="sortBy-inp" type="text" readonly hidden value="id">
    <input name="sort-inp" class="sort-inp" type="text" readonly hidden value="ASC">
    <input name="page" class="page" type="text" readonly hidden value="1">

<table class="table">
  <thead>
    <tr>
      <th>Id
              <a href="" data-sortBy="id" data-sort="ASC"> <i class="fa fa-angle-up"></i></a>
              <a href="" data-sortBy="id" data-sort="DESC"> <i class="fa fa-angle-down"></i></a>
      <th>First Name
                <a href="" data-sortBy="first_name" data-sort="ASC"> <i class="fa fa-angle-up"></i></a>
                <a href="" data-sortBy="first_name" data-sort="DESC"> <i class="fa fa-angle-down"></i></a>
            </th>
      <th>Last Name
              <a href="" data-sortBy="last_name" data-sort="ASC"> <i class="fa fa-angle-up"></i></a>
              <a href="" data-sortBy="last_name" data-sort="DESC"> <i class="fa fa-angle-down"></i></a>
          </th>
      <th>Email
              <a href="" data-sortBy="email" data-sort="ASC"> <i class="fa fa-angle-up"></i></a>
              <a href="" data-sortBy="email" data-sort="DESC"> <i class="fa fa-angle-down"></i></a>
          </th>
      <th>Address
              <a href="" data-sortBy="address" data-sort="ASC"> <i class="fa fa-angle-up"></i></a>
              <a href="" data-sortBy="address" data-sort="DESC"> <i class="fa fa-angle-down"></i></a>
          </th>
      <th>Phone
              <a href="" data-sortBy="phone" data-sort="ASC"> <i class="fa fa-angle-up"></i></a>
              <a href="" data-sortBy="phone" data-sort="DESC"> <i class="fa fa-angle-down"></i></a>
          </th>
      <th>Quantity
              <a href="" data-sortBy="quantity" data-sort="ASC"> <i class="fa fa-angle-up"></i></a>
              <a href="" data-sortBy="quantity" data-sort="DESC"> <i class="fa fa-angle-down"></i></a>
          </th>
      <th>Order date
              <a href="" data-sortBy="date" data-sort="ASC"> <i class="fa fa-angle-up"></i></a>
              <a href="" data-sortBy="date" data-sort="DESC"> <i class="fa fa-angle-down"></i></a>
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
        <a data-page="<?php echo $x ?>" class="pagination-link" href=""><?php echo $x ?></a>

    <?php endfor; ?>

</form>
<?php include "footer.view.php" ?>
