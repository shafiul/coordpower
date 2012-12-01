<div class="span10">

    <div class="row-fluid">

        <br />

        <form class="form-signin">

            <h2 class="form-signin-heading">All Departments</h2>

            <?php
            if (isset($departments)) {

                foreach ($departments as $a_department) {
                    echo $a_department['name'];
                }
            }
            ?>
        </form>
    </div>

</div>
