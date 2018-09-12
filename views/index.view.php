<?php include "header.php" ?>

<div class="container">
    <div class="content">
        <div class="title">
            <h1>INDEX PHP</h1>
        </div>
        <div class="description">

        </div>
        <div class="form-container">
            <form action="orders/create.php" method="post">
                <div class="field">
                    <label class="label">First name</label>
                    <div class="control">
                        <input class="input" type="text" name="first_name" placeholder="Enter First Name">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Last name</label>
                    <div class="control">
                        <input class="input" type="text" name="orderArr[0][last_name]" placeholder="Enter Last Name">
                    </div>
                </div>


                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php" ?>
