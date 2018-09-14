<?php include "header.view.php" ?>

<div class="container">
    <div class="content">
        <div class="title">
            <div class="is-success"><?php if(isset($result))  echo $result; ?></div>
            <h1>INDEX PHP</h1>
        </div>
        <div class="description">

        </div>
        <div class="form-container">
            <form action="/order/create" method="post">
                <div class="field">
                    <label class="label">First name</label>
                    <div class="control">
                        <input class="input <?php if (isset($errorArray['name'])) echo  "is-danger"?>" type="text" name="first_name" placeholder="Enter First Name" >
                    </div>
                      <p class="help is-danger"><?php if (isset($errorArray['name'])) echo $errorArray['name']?></p>
                </div>
                <div class="field">
                    <label class="label">Last name</label>
                    <div class="control">
                        <input class="input <?php if (isset($errorArray['lname'])) echo "is-danger"?>" type="text" name="last_name" placeholder="Enter Last Name"  >
                    </div>
                    <p class="help is-danger"><?php if (isset($errorArray['lname'])) echo $errorArray['lname']?></p>
                </div>

                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input <?php if (isset($errorArray['email'])) echo "is-danger"?>" type="email" name="email" placeholder="Enter E-mail" >
                    </div>
                    <p class="help is-danger"><?php if (isset($errorArray['email'])) echo $errorArray['email']?></p>
                </div>

                <div class="field">
                    <label class="label">Address</label>
                    <div class="control">
                        <input class="input <?php if (isset($errorArray['address'])) echo "is-danger"?>" type="text" name="address" placeholder="Enter Address" >
                    </div>
                    <p class="help is-danger"><?php if (isset($errorArray['address'])) echo $errorArray['address']?></p>
                </div>

                <div class="field">
                    <label class="label">Phone</label>
                    <div class="control">
                        <input class="input <?php if (isset($errorArray['phone'])) echo "is-danger"?>" type="text" name="phone" placeholder="Enter Phone Number" value="+370" >
                    </div>
                    <p class="help is-danger"><?php if (isset($errorArray['phone'])) echo $errorArray['phone']?></p>
                </div>

                <div class="field">
                    <label class="label">Quantity</label>
                    <div class="control">
                        <input class="input <?php if (isset($errorArray['quantity'])) echo "is-danger" ?>" type="number" name="quantity" value="1" >
                    </div>
                    <p class="help is-danger"><?php if (isset($errorArray['quantity'])) echo $errorArray['quantity']?></p>
                </div>


                <div class="field is-grouped">
                    <div class="control">
                        <button name="submit" class="button is-medium is-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "footer.view.php" ?>
