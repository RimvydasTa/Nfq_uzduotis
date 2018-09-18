<?php include "header.view.php" ?>
<?php


$pages = $_SESSION['pages'] ?? '';

?>
<div class="orders-show">
    <form action="" method="post" id="order-show-form">
        <div class="search-container ">
            <input class="input" type="text" name="searchString" value="<?php if (isset($_POST['searchString'])) echo $_POST['searchString']; ?>">
            <button name= "searchOrder " class="search-button button is-medium">Search</button>
        </div>

        <input name="sortBy-inp" class="sortBy-inp" type="text" hidden value="<?php if (isset($_POST['sortBy-inp'])) echo $_POST['sortBy-inp']; else echo 'id';?>">
        <input name="sort-inp" class="sort-inp" type="text" hidden  value="<?php if (isset($_POST['sort-inp'])) echo $_POST['sort-inp']; else echo 'ASC'; ?>">
        <input name="page" class="page" type="text" hidden  value="<?php if (isset($_POST['page'])) echo $_POST['page'] ?>">

    <table class="table is-striped">
      <thead>
        <tr>
          <th>Id
                  <a href="#" class="submit-link" data-sortBy="id" data-sort="ASC"> <i class="fa fa-angle-up"></i></a>
                  <a href="#" data-sortBy="id" class="submit-link" data-sort="DESC"> <i class="fa fa-angle-down"></i></a>
          <th>First Name
                    <a href="#" class="submit-link" data-sortBy="first_name" data-sort="ASC"> <i class="fa fa-angle-up"></i></a>
                    <a href="#" class="submit-link" data-sortBy="first_name" data-sort="DESC"> <i class="fa fa-angle-down"></i></a>
                </th>
          <th>Last Name
                  <a href="#" class="submit-link" data-sortBy="last_name" data-sort="ASC"> <i class="fa fa-angle-up"></i></a>
                  <a href="#" class="submit-link" data-sortBy="last_name" data-sort="DESC"> <i class="fa fa-angle-down"></i></a>
              </th>
          <th>Email
                  <a href="#" class="submit-link" data-sortBy="email" data-sort="ASC"> <i class="fa fa-angle-up"></i></a>
                  <a href="#" class="submit-link" data-sortBy="email" data-sort="DESC"> <i class="fa fa-angle-down"></i></a>
              </th>
          <th>Address
                  <a href="#" class="submit-link" data-sortBy="address" data-sort="ASC"> <i class="fa fa-angle-up"></i></a>
                  <a href="#" class="submit-link" data-sortBy="address" data-sort="DESC"> <i class="fa fa-angle-down"></i></a>
              </th>
          <th>Phone
                  <a href="#" class="submit-link" data-sortBy="phone" data-sort="ASC"> <i class="fa fa-angle-up"></i></a>
                  <a href="#" class="submit-link" data-sortBy="phone" data-sort="DESC"> <i class="fa fa-angle-down"></i></a>
              </th>
          <th>Quantity
                  <a href="#" class="submit-link" data-sortBy="quantity" data-sort="ASC"> <i class="fa fa-angle-up"></i></a>
                  <a href="#" class="submit-link" data-sortBy="quantity" data-sort="DESC"> <i class="fa fa-angle-down"></i></a>
              </th>
          <th>Order date
                  <a href="#" class="submit-link" data-sortBy="date" data-sort="ASC"> <i class="fa fa-angle-up"></i></a>
                  <a href="#" class="submit-link" data-sortBy="date" data-sort="DESC"> <i class="fa fa-angle-down"></i></a>
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
        <div class="pagination-container">
            <?php for($x = 1; $x <= $pages; $x++): ?>
                <a data-page="<?php echo $x ?>" class="pagination-link" href="#"><?php echo $x ?></a>

            <?php endfor; ?>
        </div>
    </form>
</div>
<?php include "footer.view.php" ?>
