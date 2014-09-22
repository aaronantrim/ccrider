
<!-- THE FOLLOWING CODE GOES IN THE HTML HEAD TAG TO ENABLE AUTOCOMPLETE -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

<!-- This loads jQuery; if multiple jQuery versions are loaded this may cause conflicts.  Only load one jQuery library. -->
<!-- 
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> -->
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">

<style type="text/css">
#ui-datepicker-div {font-size:60%}
</style>

<script>
function load_data(url, dataType, async) {
    dataType = typeof dataType !== 'undefined' ? dataType : "json";
    async = typeof async !== 'undefined' ? async : true;

    var returned_data = null;
    jQuery.ajax({
        'async': async,
        'global': false,
        'url': url,
        'dataType': dataType,
        'success': function (data) {
            returned_data = data;
        }
    });
    return returned_data;
}


</script>

<div id="google-form"> 

<h4>Plan your trip</h4>
 

<script type="text/javascript">

function doSelect(location,designation)
{
if (designation == 'start') {
 document.getElementById("saddr").value = location.options[location.selectedIndex].value;
 }

if (designation == 'end') {
 document.getElementById("daddr").value = location.options[location.selectedIndex].value;
 }

}


function checkclear(what){
if(!what._haschanged){
  what.value=''
};
what._haschanged=true;
}


</script>


<!-- THE FOLLOWING SCRIPT ENABLES AUTOCOMPLETE IN THE TRIP PLANNER FORM -->

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

<script>

function initialize() {

var defaultBounds = new google.maps.LatLngBounds(
 new google.maps.LatLng(45.857140,-122.818882)
 );

var origin_input = document.getElementById('saddr');
var destination_input = document.getElementById('daddr');


var options = {
 bounds: defaultBounds,
 componentRestrictions: {country: 'us'}
};


var autocomplete_origin = new google.maps.places.Autocomplete(origin_input, options);    
var autocomplete_destination = new google.maps.places.Autocomplete(destination_input, options);
}

google.maps.event.addDomListener(window, 'load', initialize);


</script>



<form action="http://www.trilliumtransit.com/redirect/google_redirect.php" name="f"><input type="hidden" value="UTF8" name="ie"><input type="hidden" value="d" name="f"><input type="hidden" value="45.857140,-122.818882" name="sll">


<div style="float:left;width:283px;">
<strong>Start</strong>

<br/><select id="select_start_addr" size="1" name="saddr_select" alt="Start address" style="width:250px;" onchange="javascript:doSelect(this,'start');">
<option value="" selected="selected">Select a stop...</option>
</select>

<br/><input type="text" name="saddr" id="saddr" style="width:250px;" onfocus="checkclear(this)" value="Address, place, or intersection">
</div>

<div style="float:left;width:283px;">
<strong>End</strong>
<br/>
<select id="select_end_addr" size="1" tabindex="1" name="daddr_select" alt="Destination address" style="width:250px;" onchange="javascript:doSelect(this,'end');">
<option value="" selected="selected">Select a stop...</option>

</select>
<br/><input type="text" name="daddr" id="daddr" style="width:250px;" onfocus="checkclear(this)" value="Address, place, or intersection">

</div>


<div style="width:283px;float:left;">
<strong>When</strong><br/>

<select name="ttype" id="trip_type_select">
           <option name="now" value="now">Leave now</option>
           <option name="dep" value="dep">Leave at</option>
           <option name="arr" value="arr">Arrive by</option>
           </select><br/><input type="text" maxlength="100" tabindex="1" value="" name="date" size="10" id="fdate" alt="Date">  <input type="text" maxlength="100" tabindex="1" value="" name="time" size="8" alt="Time" id="ftime"><input type="hidden" value="57" name="agency"><input type="hidden" name="sort" value="def"></p>
</div>

<br clear="both"/>

<div>
<div style="float:left;">See itinerary in </span> <input type="submit" tabindex="1" value="Google Maps" id="directions_submit"></div>
              
              <div style="font-size:10px;margin-top:0px;margin-left:15px; float:left;"><a href="http://maps.google.com/transit">More about transit in Google Maps</a> and on <a href="https://www.google.com/mobile/maps/">your mobile phone</a>.
<br/>Transit data delivered by <a href="http://www.trilliumtransit.com/services/gtfs/">Trillium</a>
</div>
</div>



</form>

<script type="text/javascript">


jQuery.getJSON('http://trilliumtransit.com/applications/trip_planner_form/list_stops.php?agency_id=57&show_city=1', function(data){
    var html = '';
    var len = data.length;
    for (var i = 0; i< len; i++) {
     var value = data[i].lat+','+data[i].lon+' ('+data[i].name+')';
     var label = name;
        html += '<option value="' + data[i].lat+','+data[i].lon+' ('+data[i].name+')' + '">' + data[i].name + '</option>';
    }
    jQuery('select#select_start_addr').append(html);
    jQuery('select#select_end_addr').append(html);
});


</script>

<script type="text/javascript">
var thisdate = new Date();
 
function formatDate(date) { 
var d = new Date(date); 
var hh = d.getHours(); 
var m = d.getMinutes(); 
var dd = "AM"; 
var h = hh; 
if (h >= 12) { 
h = hh-12; 
dd = "PM"; 
} 
if (h == 0) { 
h = 12; 
} 
m = m<10?"0"+m:m; 
 
return h+':'+m+' '+dd 
}
 
document.getElementById('ftime').value=formatDate(thisdate); 

var d = new Date(),
month = d.getMonth() + 1,
day = d.getDate(),
year = d.getFullYear();

document.getElementById('fdate').value = month + '/' + day + '/' +  year ;

var format = 'g:i A';
var step = 1;

function parseTime(time, format, step) {
 
 var hour, minute, stepMinute,
 defaultFormat = 'g:ia',
 pm = time.match(/p/i) !== null,
 num = time.replace(/[^0-9]/g, '');
 
 // Parse for hour and minute
 switch(num.length) {
 case 4:
 hour = parseInt(num[0] + num[1], 10);
 minute = parseInt(num[2] + num[3], 10);
 break;
 case 3:
 hour = parseInt(num[0], 10);
 minute = parseInt(num[1] + num[2], 10);
 break;
 case 2:
 case 1:
 hour = parseInt(num[0] + (num[1] || ''), 10);
 minute = 0;
 break;
 default:
 return '';
 }
 
 if( pm === true && hour > 0 && hour < 12 ) hour += 12;
 
 if( hour >= 13 && hour <= 23 ) pm = true;
 
 if( step ) {
 if( step === 0 ) step = 60;
 stepMinute = (Math.round(minute / step) * step) % 60;
 if( stepMinute === 0 && minute >= 30 ) {
 hour++;
 if( hour === 12 || hour === 24 ) pm = !pm;
 }
 minute = stepMinute;
 }
 
 if( hour <= 0 || hour >= 24 ) hour = 0;
 if( minute < 0 || minute > 59 ) minute = 0;
 
 return (format || defaultFormat)
        .replace(/g/g, hour === 0 ? '12' : 'g')
 .replace(/g/g, hour > 12 ? hour - 12 : hour)
 .replace(/G/g, hour)
 .replace(/h/g, hour.toString().length > 1 ? (hour > 12 ? hour - 12 : hour) : '0' + (hour > 12 ? hour - 12 : hour))
 .replace(/H/g, hour.toString().length > 1 ? hour : '0' + hour)
 .replace(/i/g, minute.toString().length > 1 ? minute : '0' + minute)
 .replace(/s/g, '00')
 .replace(/a/g, pm ? 'pm' : 'am')
 .replace(/A/g, pm ? 'PM' : 'AM');
 
}


function update() {
    jQuery('#ftime').val(parseTime(jQuery('#ftime').val(), format, step));   
}

jQuery(document).ready( function() {
    
    jQuery('#ftime').blur(update);

 jQuery(function() {
    jQuery( "#fdate" ).datepicker({dateFormat: "mm/dd/yy"});
  });
    

});

</script>
 
</div>

<hr/>