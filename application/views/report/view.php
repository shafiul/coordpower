
<div class="span10">

    <div class="row-fluid">
        
        <p><b><?php echo lang("Filter"); ?></b></p>
        
        <div class="row-fluid">
            <span class="span6">
                <input name="from" type="text" class="input-block-level datepicker" placeholder="<?php echo lang('To'); ?>">
            </span>
            <span class="span6">
                <input name="to" type="text" class="input-block-level datepicker" placeholder="<?php echo lang('Form'); ?>">            
            </span>
        </div>
        <br />
        <table cell-border="1">
            <tr>
                <td><b><p> <?php echo lang("Viewing Statstics for Member Attendence"); ?> </p></b></td>                
                <td><b><p> <?php echo lang("Viewing Statstics for Departmental Attendence"); ?> </p></b></td>
            </tr>
            <tr>
                <td><div id="view_attendee_pie"></div></td>
                <td><div id="view_department_pie"></div></td>
            </tr>
            <tr>            
               <td><b><p> <?php echo lang("Viewing Statstics for Resolution Submission"); ?> </p> </b></td>
               <td><b><p> <?php echo lang("Union Porishod Progess Stats"); ?> </p> </b></td>
            </tr>
            <tr>
                <td ><div id="view_resolution_pie"></div></td>
                <td ><div id="view_progress_line"></div></td>
            </tr>
        </table>
        
    </div>

</div>
