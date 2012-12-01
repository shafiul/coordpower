
<div class="span10">

    <div class="row-fluid">

        <br />

        <table class="table">
            <tr><th>Date</th> <td>Meeting</td></tr>
            <?php foreach ($meetings as $meeting) { ?>
                <tr>
                    <td ><?php echo $meeting->date; ?></td>
                    <td > <a href="<?php echo site_url('welcome/view/'.$meeting->meeting_id);?>"> Meetings-<?php echo $meeting->meeting_id; ?> </a> </td>
                </tr>
            <?php } ?>
        </table>
    </div>

</div>
