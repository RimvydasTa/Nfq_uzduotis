<?php include "header.view.php" ?>
<?php
session_start();

$errors = $_SESSION['errors'] ?? [];


?>



<div class="container">
    <div class="content">
        <div class="error-container">
            <ul class="has-background-danger">

                <?php foreach($errors as $error): ?>
                    <li><?php echo $error?></li>
                <?php endforeach; ?>

            </ul>
        </div>
        <div class="title">
            <div class="is-success"><?php if(isset($_GET['order'])) echo "Success! Order successfully submitted."?></div>
        </div>
        <div class="description">

        </div>
        <div class="form-container">
            <form action="orders/create" method="post">
                <div class="field">
                    <label class="label">First name</label>
                    <div class="control">
                        <input class="input" type="text" name="first_name" placeholder="Enter First Name" >
                    </div>

                </div>
                <div class="field">
                    <label class="label">Last name</label>
                    <div class="control">
                        <input class="input" type="text" name="last_name" placeholder="Enter Last Name"  >
                    </div>

                </div>

                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input" type="email" name="email" placeholder="Enter E-mail" >
                    </div>
                </div>

                <div class="field">
                    <label class="label">Address</label>
                    <div class="control">
                        <input class="input" type="text" name="address" placeholder="Enter Address" >
                    </div>

                </div>

                <div class="field">
                    <label class="label">Phone</label>
                    <div class="control">
                        <input class="input" type="text" name="phone" placeholder="Enter Phone Number" value="+370" >
                    </div>
                </div>

                <div class="field">
                    <label class="label">Quantity</label>
                    <div class="control">
                        <input class="input" type="number" name="quantity" value="1" >
                    </div>
                </div>


                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" name="createOrder" class="button is-medium is-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "footer.view.php" ?>
