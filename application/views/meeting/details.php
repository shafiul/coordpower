
<div class="span10">

    <div class="row-fluid">

        <br />


        <table class="table">
            <tr>
                <td > <strong>Union Code</strong></td>
                <td > <?php echo $meeting->union_code; ?> </td>
            </tr><tr>
                <td > <strong>Date</strong></td>
                <td > <?php echo $meeting->date; ?> </td>
            </tr><tr>
                <td > <strong>Time</strong></td>
                <td > <?php echo $meeting->time; ?> </td>
            </tr><tr>
                <td > <strong>President</strong></td>
                <td > <?php echo $president->name . ' (' . $president->designation . ')'; ?> </td>
            </tr><tr>
                <td > <strong>Place</strong></td>
                <td > <?php echo $meeting->place; ?> </td>
            </tr><tr>
        </table>


        <br/>
        <br/>

        <?php
        if ($reportsAvailable) {
            echo '<a class="btn" href="' . site_url('report/preview') . '"> Preview Resolution </a>';
        } else {
            echo '<a class="btn" href="' . site_url('report/create') . '"> Create Resolution </a>';
        }
        ?>
        <a class="btn" href="<?php echo site_url('welcome/print_card/'.$meeting->meeting_id); ?>"> Print Invitation Card</a>

    </div>

</div>
