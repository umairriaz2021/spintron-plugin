<?php

// javascript for toggle schedule and calendar block
$js = '<script>
    /*
    1 = schedule
    2 = calendar
    3 = monday
    4 = tuesday
    5 = wednesday
    6 = thursday
    7 = friday
    8 = saturday
    9 = sunday
     */
    function toggle_block(blockid) {
        var div_schedule = document.getElementById("div_schedule");
        var div_calendar = document.getElementById("div_calendar");
        
        var div_schedule_monday = document.getElementById("div_schedule_monday");
        var div_schedule_tuesday = document.getElementById("div_schedule_tuesday");
        var div_schedule_wednesday = document.getElementById("div_schedule_wednesday");
        var div_schedule_thursday = document.getElementById("div_schedule_thursday");
        var div_schedule_friday = document.getElementById("div_schedule_friday");
        var div_schedule_saturday = document.getElementById("div_schedule_saturday");
        var div_schedule_sunday = document.getElementById("div_schedule_sunday");        
        
        if (blockid == "1") {
            div_schedule.style.display = "block";
            
            div_calendar.style.display = "none";
            
        } else if (blockid == "2") {
            div_calendar.style.display = "block";
            
            div_schedule.style.display = "none";
            div_schedule_monday.style.display = "none";
            div_schedule_tuesday.style.display = "none";
            div_schedule_wednesday.style.display = "none";
            div_schedule_thursday.style.display = "none";
            div_schedule_friday.style.display = "none";
            div_schedule_saturday.style.display = "none";
            div_schedule_sunday.style.display = "none";
            
        }  else if (blockid == "3") {  // monday 
            div_calendar.style.display = "none";            
            div_schedule.style.display = "block";
            
            div_schedule_monday.style.display = "block";
            div_schedule_tuesday.style.display = "none";
            div_schedule_wednesday.style.display = "none";
            div_schedule_thursday.style.display = "none";
            div_schedule_friday.style.display = "none";
            div_schedule_saturday.style.display = "none";
            div_schedule_sunday.style.display = "none";
            
        }  else if (blockid == "4") {  // tuesday 
            div_calendar.style.display = "none";            
            div_schedule.style.display = "block";
            
            div_schedule_monday.style.display = "none";
            div_schedule_tuesday.style.display = "block";
            div_schedule_wednesday.style.display = "none";
            div_schedule_thursday.style.display = "none";
            div_schedule_friday.style.display = "none";
            div_schedule_saturday.style.display = "none";
            div_schedule_sunday.style.display = "none";
            
        } else if (blockid == "5") {  // wednesday 
            div_calendar.style.display = "none";            
            div_schedule.style.display = "block";
            
            div_schedule_monday.style.display = "none";
            div_schedule_tuesday.style.display = "none";
            div_schedule_wednesday.style.display = "block";
            div_schedule_thursday.style.display = "none";
            div_schedule_friday.style.display = "none";
            div_schedule_saturday.style.display = "none";
            div_schedule_sunday.style.display = "none";
            
        } else if (blockid == "6") {  // thursday 
            div_calendar.style.display = "none";            
            div_schedule.style.display = "block";
            
            div_schedule_monday.style.display = "none";
            div_schedule_tuesday.style.display = "none";
            div_schedule_wednesday.style.display = "none";
            div_schedule_thursday.style.display = "block";
            div_schedule_friday.style.display = "none";
            div_schedule_saturday.style.display = "none";
            div_schedule_sunday.style.display = "none";
            
        } else if (blockid == "7") {  // friday 
            div_calendar.style.display = "none";            
            div_schedule.style.display = "block";
            
            div_schedule_monday.style.display = "none";
            div_schedule_tuesday.style.display = "none";
            div_schedule_wednesday.style.display = "none";
            div_schedule_thursday.style.display = "none";
            div_schedule_friday.style.display = "block";
            div_schedule_saturday.style.display = "none";
            div_schedule_sunday.style.display = "none";
            
        } else if (blockid == "8") {  // saturday 
            div_calendar.style.display = "none";            
            div_schedule.style.display = "block";
            
            div_schedule_monday.style.display = "none";
            div_schedule_tuesday.style.display = "none";
            div_schedule_wednesday.style.display = "none";
            div_schedule_thursday.style.display = "none";
            div_schedule_friday.style.display = "none";
            div_schedule_saturday.style.display = "block";
            div_schedule_sunday.style.display = "none";
            
        } else if (blockid == "9") {  // sunday 
            div_calendar.style.display = "none";            
            div_schedule.style.display = "block";
            
            div_schedule_monday.style.display = "none";
            div_schedule_tuesday.style.display = "none";
            div_schedule_wednesday.style.display = "none";
            div_schedule_thursday.style.display = "none";
            div_schedule_friday.style.display = "none";
            div_schedule_saturday.style.display = "none";
            div_schedule_sunday.style.display = "block";
        }
        
    }
</script>';

// including javascript in html content
$html = $js;

// including page heading schedule + archive in html content
$html .= '<h1 class="plugin_spinitron_entry_title">Schedule + Archive (spinitron)</h1>';

// adding schedule and calendar buttons in html content
$html .= '<div class="creek-schedule-toggle"><button class="plugin_spinitron_tab" onclick="toggle_block(1)">Schedule</button> &nbsp; 
<button class="plugin_spinitron_tab" onclick="toggle_block(2)">Calendar</button></div>';

// schedule and calendar html
$div_schedule = '<div id="div_schedule" style="display:block">
<button class="plugin_spinitron_tab" onclick="toggle_block(3)" >Monday</button> &nbsp;
<button class="plugin_spinitron_tab" onclick="toggle_block(4)" >Tuesday</button> &nbsp;
<button class="plugin_spinitron_tab" onclick="toggle_block(5)" >Wednesday</button> &nbsp;
<button class="plugin_spinitron_tab" onclick="toggle_block(6)" >Thursday</button> &nbsp;
<button class="plugin_spinitron_tab" onclick="toggle_block(7)" >Friday</button> &nbsp;
<button class="plugin_spinitron_tab" onclick="toggle_block(8)" >Saturday</button> &nbsp;
<button class="plugin_spinitron_tab" onclick="toggle_block(9)" >Sunday</button> &nbsp;
</div>';




// adding schedule and calendar blocks/divs in html content

$div_calendar = '<div id="div_calendar" style="display: none;">This is calendar element/block.</div>';

// monday block
$div_schedule_monday = '';
$html_data ='';
$div_schedule_monday .= '<div id="div_schedule_monday" style="display:none"><div class="spinitron_occurrences">';
$html_data = getHtmlByDay('shows','monday');
$div_schedule_monday .= $html_data;
$div_schedule_monday .= "</div></div>";

// tuesday block
$div_schedule_tuesday = '';
$html_data='';
$div_schedule_tuesday .= '<div id="div_schedule_tuesday" style="display:none"><div class="spinitron_occurrences">';
$html_data = getHtmlByDay('shows','tuesday');
$div_schedule_tuesday .= $html_data;
$div_schedule_tuesday .= "</div></div>";

// wednesday block
$div_schedule_wednesday = '';
$html_data='';
$div_schedule_wednesday .= '<div id="div_schedule_wednesday" style="display:none"><div class="spinitron_occurrences">';
$html_data = getHtmlByDay('shows','wednesday');
$div_schedule_wednesday .= $html_data;
$div_schedule_wednesday .= "</div></div>";

// thursday block
$div_schedule_thursday = '';
$html_data ='';
$div_schedule_thursday .= '<div id="div_schedule_thursday" style="display:none"><div class="spinitron_occurrences">';
$html_data = getHtmlByDay('shows','thursday');
$div_schedule_thursday .= $html_data;
$div_schedule_thursday .= "</div></div>";


// friday black
$div_schedule_friday = '';
$html_data ='';
$div_schedule_friday .= '<div id="div_schedule_friday" style="display:none"><div class="spinitron_occurrences">';
$html_data = getHtmlByDay('shows','friday');
$div_schedule_friday .= $html_data;
$div_schedule_friday .= "</div></div>";


// saturday block
$div_schedule_saturday = '';
$html_data ='';
$div_schedule_saturday .= '<div id="div_schedule_saturday" style="display:none"><div class="spinitron_occurrences">';
$html_data = getHtmlByDay('shows','saturday');
$div_schedule_saturday .= $html_data;
$div_schedule_saturday .= "</div></div>";

// sunday block
$div_schedule_sunday = '';
$html_data ='';
$div_schedule_sunday .= '<div id="div_schedule_sunday" style="display:none"><div class="spinitron_occurrences">';
$html_data = getHtmlByDay('shows','sunday');
$div_schedule_sunday .= $html_data;
$div_schedule_sunday .= "</div></div>";

// adding another level, where we have a block for each day of the week
$html .= $div_schedule . $div_calendar . $div_schedule_monday . $div_schedule_tuesday . $div_schedule_wednesday . $div_schedule_thursday . $div_schedule_friday .  $div_schedule_saturday . $div_schedule_sunday ;

// find and search bar
//$html .= '<div class="creek-schedule-header"><div class="creek-schedule-toggle"><button class="creek-schedule-toggle-schedule creek-selected">Schedule</button><button class="creek-schedule-toggle-calendar">Calendar</button></div><div class="creek-find"><input type="text" placeholder="Find..." aria-label="Find"></div></div>';

return $html;