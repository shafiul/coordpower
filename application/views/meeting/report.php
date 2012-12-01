
<div class="span10">

    <div class="row-fluid">

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

        <hr/>

        <table class="table">
            <th>
            <td><?php echo lang('index'); ?></td>
            <td><?php echo lang('discussion_index'); ?></td>
            <td><?php echo lang('discussion'); ?></td>
            <td><?php echo lang('decision'); ?></td>
            <td><?php echo lang('responsiblee'); ?></td>
            </th>

            <?php
            $counter = 0;
            foreach ($reports as $report) {
                ?>
                <tr>
                    <td><?php echo $counter; ?></td>
                    <td><?php if ($report->type == 'agenda') echo $agendas[$report->type_id]; else $departments[$report->type_id]; ?></td>
                    <td><?php echo $report->discussion; ?></td>
                    <td><?php echo $report->decision; ?></td>
                    <td><?php echo $report->responsiblee; ?></td>
                </tr>

                <?php
                $counter = $counter + 1;
            }
            ?>

        </table>

    </div>

</div>
