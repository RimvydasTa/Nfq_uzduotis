<?php include "header.php" ?>

<div class="container">
    <div class="content">
        <div class="title">
            <h1>INDEX PHP</h1>
        </div>
        <div class="description">

        </div>
        <div class="form-container">
            <form action="">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Text input">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Username</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-success" type="text" placeholder="Text input" value="bulma">
                    </div>
                    <p class="help is-success">This username is available</p>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-danger" type="email" placeholder="Email input" value="hello@">
                    </div>
                    <p class="help is-danger">This email is invalid</p>
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
