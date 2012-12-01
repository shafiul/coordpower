
<div class="span10">

    <div class="row-fluid">

        <table class="table">
            <tr>
                <td > <strong><?php echo lang('Union Code'); ?></strong></td>
                <td > <?php echo $meeting->union_code; ?> </td>
            </tr><tr>
                <td > <strong><?php echo lang('Date'); ?></strong></td>
                <td > <?php echo $meeting->date; ?> </td>
            </tr><tr>
                <td > <strong><?php echo lang('Time'); ?></strong></td>
                <td > <?php echo $meeting->time; ?> </td>
            </tr><tr>
                <td > <strong><?php echo lang('President'); ?></strong></td>
                <td > <?php echo $president->name . ' (' . $president->designation . ')'; ?> </td>
            </tr><tr>
                <td > <strong><?php echo lang('Place'); ?></strong></td>
                <td > <?php echo $meeting->place; ?> </td>
            </tr>
        </table>

        <hr/>

        <table class="table">
            <th>
            <td><?php echo lang('Index'); ?></td>
            <td><?php echo lang('Discussion Index'); ?></td>
            <td><?php echo lang('Discussion'); ?></td>
            <td><?php echo lang('Decision'); ?></td>
            <td><?php echo lang('Responsiblee'); ?></td>
            </th>

            <?php $counter = 0;
            foreach ($reports as $report) {
                ?>
                <tr>
                    <td><?php echo $counter; ?></td>
                    <td><?php if ($report->type == 'agenda') echo $agendas[$report->type_id]; else $departments[$report->type_id]; ?></td>
                    <td><?php echo $report->discussion; ?></td>
                    <td><?php echo $report->decision; ?></td>
                    <td><?php echo $report->responsiblee; ?></td>
                </tr>

                <?php $counter = $counter + 1;
            }
            ?>

        </table>

    </div>

</div>
