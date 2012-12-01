<div class="span2">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            
            <li class="nav-header"><?php echo lang('menu_user_head');  ?></li>
            <li ><a href="<?php echo site_url('main/newUser'); ?>"><?php echo lang('menu_user_new');  ?></a></li>
            
            <li class="nav-header"><?php echo lang('menu_meeting_head');  ?></li>
            <li ><a href="<?php echo site_url('main/newMeeting'); ?>"><?php echo lang('menu_meeting_new');  ?></a></li>
            <li ><a href="<?php echo site_url('meeting/view'); ?>">সভা বিবরণী</a></li>
            
            <li class="nav-header"><?php echo lang('menu_report_head');  ?></li>
            <li ><a href="<?php echo site_url('report/create_test'); ?>">প্রতিবেদন প্রদান</a></li>
            <li ><a href="<?php echo site_url('report/show_all_report'); ?>"><?php echo lang('menu_report_all');  ?></a></li>
            
            <li ><a href="<?php echo site_url('main/georank'); ?>"><?php echo lang('Map Rating');  ?></a></li>



        </ul>
    </div><!--/.well -->
</div><!--/span-->