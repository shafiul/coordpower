
<div class="span10">
    <br /> 
    <?php foreach ($attendees as $attendee) { ?>
        <p> <?php echo $union->name; ?>
		ইউনিয়ন পরিষদ  <br/>
                <b>প্রাপকঃ </b><?php echo $attendee->name .' ( '. $attendee->designation ; ?> )<br/> 
                <b>বিষয়ঃ </b>ইউ ডি সি সি সভায় যোগদান প্রসঙ্গে। <br/>
                <br />
                জনাব, <br/><br/>
                &nbsp;&nbsp;&nbsp;এই তারিখে (<?php echo $meeting->time; ?>) ইউনিয়ন পরিষদে একটি মিটিং রয়েছে। <br/>
		সভায় নিজ নিজ বিভাগের কর্ম পরিকল্পনাসহ যথাসময়ে উপস্থিত থাকার জন্য বিশেষভাবে অনুরোধ করা হল। <br/>
		
		<br/>
		<br/>
		ধন্যবাদান্তে<br/>
                <b>চেয়ারম্যান</b><br/>
		<br/>
		<br/>
                <img src="<?php echo base_url('files/qrcode.png') ?>" width="200"/>
                <br/><p style="color:red">এই সংকেতটি সভায় আপনার উপস্থিতি নির্দেশ করবে।</p>
         </p>
         <a href="#" onclick="window.print(); return false;">Print</a>
        <hr/>
    <?php break;} ?>
    
</div>
