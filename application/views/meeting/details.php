
<div class="span10">

    <div class="row-fluid">

        <br />
        <br />


        <table class="table">
            <tr>
                <td > <strong><?php echo lang('up_code'); ?></strong></td>
                <td > <?php echo $meeting->union_code; ?> </td>
            </tr><tr>
                <td > <strong><?php echo lang('date'); ?></strong></td>
                <td > <?php echo $meeting->date; ?> </td>
            </tr><tr>
                <td > <strong><?php echo lang('time'); ?></strong></td>
                <td > <?php echo $meeting->time; ?> </td>
            </tr><tr>
                <td > <strong><?php echo lang('president'); ?></strong></td>
                <td > <?php echo $president->name . ' (' . $president->designation . ')'; ?> </td>
            </tr><tr>
                <td > <strong><?php echo lang('place'); ?></strong></td>
                <td > <?php echo $meeting->place; ?> </td>
            </tr>
        </table>


        <br/>
        <br/>

        <?php
        if ($reportsAvailable) {
            echo '<a class="btn" href="' . site_url('meeting/report/'.$meeting->meeting_id) . '"> Preview Resolution </a>';
        } else {
            echo '<a class="btn" href="' . site_url('report/create') . '"> Create Resolution </a>';
        }
        ?>
        <a class="btn" href="<?php echo site_url('meeting/print_card/'.$meeting->meeting_id); ?>"> Print Invitation Card</a>

        <br/>
        <br/>
        <br/>
    </div>

</div>
