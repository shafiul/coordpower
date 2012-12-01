
<div class="span10">

    <?php foreach ($attendees as $attendee) { ?>
        <p> 
		ইউনিয়ন পরিষদ  <br/>
		প্রাপকঃ <?php echo $attendee->name .'<br/>'. $attendee->designation ; ?> <br/> 
		বিষয়ঃ ইউ ডি সি সি সভায় যোগদান প্রসঙ্গে। <br/>
		জনাব,  এই তারিখে (<?php echo $meeting->time; ?>) ইউনিয়ন পরিষদে একটি মিটিং রয়েছে। <br/>
		সভায় নিজ নিজ বিভাগের কর্ম পরিকল্পনাসহ যথাসময়ে উপস্থিত থাকার জন্য বিশেষভাবে অনুরোধ করা হল। <br/>
		
		<br/>
		<br/>
		ধন্যবাদান্তে<br/>
		চেয়ারম্যান<br/>
		<br/>
		<br/>
                <img src="<?php echo base_url('files/barcode.jpg') ?>" width="200"/>
         </p>
        <hr/>
    <?php break;} ?>

</div>
