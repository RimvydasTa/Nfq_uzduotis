<?php include "header.view.php" ?>
<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? '';
?>



<div class="container">
    <div class="error-container has-background-danger" <?php if(!isset($_SESSION['errors'])) echo "hidden"?>>
        <ul class="">

            <?php foreach($errors as $error): ?>
                <li><?php echo $error?></li>
            <?php endforeach; ?>

        </ul>
    </div>
    <div class="title has-text-white">
        <div class="has-background-success" <?php if(!isset($_SESSION['success'])) echo "hidden"?> ><?php if(isset($_SESSION['success'])) echo $_SESSION['success']?></div>
    </div>

    <div class="content columns">


        <div class="form-container column">
            <form action="orders/create" class="order-form" method="post">
                <div class="field">
                    <label class="label">First name</label>
                    <div class="control">
                        <input class="input"
                               type="text"
                               name="first_name"
                               placeholder="Enter First Name"
                                 >
                    </div>

                </div>
                <div class="field">
                    <label class="label">Last name</label>
                    <div class="control">
                        <input class="input"
                               type="text"
                               name="last_name"
                               placeholder="Enter Last Name"
                              >
                    </div>

                </div>

                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input"
                               type="email"
                               name="email"
                               placeholder="Enter E-mail"
                              >
                    </div>
                </div>

                <div class="field">
                    <label class="label">Address</label>
                    <div class="control">
                        <input class="input"
                               type="text"
                               name="address"
                               placeholder="Enter Address"
                        >
                    </div>

                </div>

                <div class="field">
                    <label class="label">Phone</label>
                    <div class="control">
                        <input class="input"
                               type="text"
                               name="phone"
                               placeholder="Enter Phone Number"
                             >
                    </div>
                </div>

                <div class="field">
                    <label class="label">Quantity</label>
                    <div class="control">
                        <input class="input" type="number" name="quantity" value="1" >
                    </div>
                </div>


                <div class="field is-grouped" id="submit-button-container">
                    <div class="control">
                        <button type="submit" name="createOrder" class="button is-medium ">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="description column columns">
            <div class="text-container column">
                <h2>Limited sale</h2>
                <p>Special price for iphone7 just fill the form and you will get you Iphone in 10 bussiness days</p>
            </div>
            <div class="img-container column">
                <img src="./images/iphone.png" alt="">
            </div>
        </div>
    </div>
</div>

<?php include "footer.view.php" ?>
