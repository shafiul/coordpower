

function draw_attende_graph(){
    var myData = new Array(['ইউপি', 20], ['এনজিও', 20], ['সরকারি কর্মকর্তা', 40], ['গ্রামবাসি', 20]);
    var colors = ['#FFCC00', '#FFFD00', '#CCFF00', '#99DF00'];
    var myChart = new JSChart('view_attendee_pie', 'pie');
    myChart.setDataArray(myData);
    myChart.colorizePie(colors);
    myChart.setPiePosition(208, 130);
    myChart.setPieRadius(95);
    myChart.setPieUnitsFontSize(10);
    myChart.setPieUnitsColor('#474747');
    myChart.setPieValuesColor('#474747');
    myChart.setPieValuesOffset(-10);
    myChart.setTitleColor('#fff');
    myChart.setSize(400, 250);
    myChart.setBackgroundImage('chart_bg.jpg');
    myChart.draw();
}

function draw_departmental_graph(){
    var myData = new Array(
    ['কৃষি', 2], ['কমিউনিটি স্বাস্থ্য', 1], ['স্বাস্থ্য', 3], ['পরিবার পরিকল্পনা', 6],
    ['প্রানীসম্পদ', 8], ['সমাজসেবা', 10], ['জনস্বাস্থ্য প্রকৌশল', 9], ['বাংলাদেশ পল্লী উন্নয়ন বোর্ড ', 8],
    ['মৎস্য', 5], ['স্থানীয়', 6], ['সরকার প্রকৌশল অধিদপ্তর', 2], ['ম্যারিজ  রেজিষ্টার', 4]);
    
    
    var colors = ['#FFCC00', '#FFFF00', '#CCFF00', '#99FF00',
        '#33FF00', '#00FF66', '#00FF99', '#00FFCC', 
        '#FF0000', '#FF3300', '#FF6600', '#FF9900'];
    var myChart = new JSChart('view_department_pie', 'pie');
    myChart.setDataArray(myData);
    myChart.colorizePie(colors);
    myChart.setPiePosition(208, 130);
    myChart.setPieRadius(95);
    myChart.setPieUnitsFontSize(10);
    myChart.setPieUnitsColor('#474747');
    myChart.setPieValuesColor('#474747');
    myChart.setPieValuesOffset(-10);
    myChart.setTitleColor('#fff');
    myChart.setSize(600, 250);
    myChart.setBackgroundImage('chart_bg.jpg');
    myChart.draw();
}

function draw_resolution_graph(){
    var myData = new Array(
        ['Lokerpara', 2], ['Rasulpur', 1], ['Rasulpur', 3], ['Hemnagar', 6],
        ['Nagda Simla', 8], ['Gohailbari', 10], ['Parkhi', 9], ['Durgapur', 8],
        ['Bhatgram', 5], ['Musshuddi', 6], ['Banail', 2], ['Bhatgram', 4]
    );
    var colors = ['#FFCC00', '#FFFF00', '#CCFF00', '#99FF00', '#33FF00', '#00FF66', '#00FF99', '#00FFCC', '#FF0000', '#FF3300', '#FF6600', '#FF9900'];
    var myChart = new JSChart('view_resolution_pie', 'pie');
    myChart.setDataArray(myData);
    myChart.colorizePie(colors);
    myChart.setPiePosition(208, 130);
    myChart.setPieRadius(95);
    myChart.setPieUnitsFontSize(8);
    myChart.setPieUnitsColor('#474747');
    myChart.setPieValuesColor('#474747');
    myChart.setPieValuesOffset(-10);
    myChart.setTitleColor('#fff');
    myChart.setSize(400, 250);
    myChart.setBackgroundImage('chart_bg.jpg');
    myChart.draw();
}

$(document).ready(function(){
   
    $(".lang_switch_select").change(function(){
        var string = window.location.toString().split("?");      
        var query = "";
        if(string[1]){
            query = string[1].replace("lang=bangla","");
            query = string[1].replace("lang=english","");
            window.location = string[0] + "?lang="+$(this).val()+"&"+query;
        }
    
        window.location = string[0] + "?lang="+$(this).val();
    });
   
    
    //Attendee
    draw_attende_graph();
    
    
    //Resolution
    draw_resolution_graph();
    
    //
    draw_departmental_graph();
    
    $(".datepicker").datepicker({
        showButtonPanel: true,        
	changeMonth: true,
	changeYear: true,       
	yearRange: '1950:2050',       
	dateFormat: 'd M yy',
    });


   
});


