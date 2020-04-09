$(document).ready(function() {
  
  // test flag
  const test = false;

  // get times from moment
  const currTime = moment().format('LLLL');

  let currHour = moment().format('H');

  let $dateTimeHead = $('#time-head');
  $dateTimeHead.text(currTime);
  
  // Get stored todos from localStorage
  // Parsing the JSON string to an object
  let storedPlans = JSON.parse(localStorage.getItem("storedPlans"));

  if (test) { console.log(storedPlans); }

  // If plans were retrieved from localStorage, update the plan array to it
  if (storedPlans !== null) {
    planTextArr = storedPlans;
  } else {
    // this should only occur on first time the app is loaded in the browser
    planTextArr = new Array(17);
    planTextArr[7] = "Example Entry: Make an entry and press the save button!";
  }

  // set variable referencing planner element
  let $plannerDiv = $('#plannerContainer');
  // clear existing elements
  $plannerDiv.empty();

  // build calendar by row for fix set of hours
  for (let hour = 7; hour <= 23; hour++) {
    // index for array use offset from hour
    let index = hour - 7;
    
    // build row components
    let $rowDiv = $('<div>');
    $rowDiv.addClass('row');
    $rowDiv.addClass('plannerRow');
    $rowDiv.attr('hour-index',hour);
  
    // Start building Time box portion of row
    let $col2TimeDiv = $('<div>');
    $col2TimeDiv.addClass('col-md-2');
  
    // create timeBox element (contains time)
    const $timeBoxSpn = $('<span>');
    // can use this to get value
    $timeBoxSpn.attr('class','timeBox');
    
    // format hours for display
    let displayHour = 0;
    let ampm = "";
    if (hour == 12){
      displayHour = 12;
      ampm = "pm";
    }
    else if (hour == 24){
      displayHour = 12;
      ampm = "am";
    }
    else{
      if (hour > 12) { 
        displayHour = hour - 12;
        ampm = "pm";
      } else {
        displayHour = hour;
        ampm = "am";
      }
    }
   
    // populate timeBox with time
    $timeBoxSpn.text(`${displayHour} ${ampm}`);

    // insert into col inset into timebox
    $rowDiv.append($col2TimeDiv);
    $col2TimeDiv.append($timeBoxSpn);
    // STOP building Time box portion of row

    // START building input portion of row
    // build row components
    let $dailyPlanSpn = $('<input>');

    $dailyPlanSpn.attr('id',`input-${index}`);
    $dailyPlanSpn.attr('hour-index',index);
    $dailyPlanSpn.attr('type','text');
    $dailyPlanSpn.attr('class','dailyPlan');

    // access index from data array for hour 
    $dailyPlanSpn.val( planTextArr[index] );
    
    // create col to control width
    let $col9IptDiv = $('<div>');
    $col9IptDiv.addClass('col-md-9');

    // add col width and row component to row
    $rowDiv.append($col9IptDiv);
    $col9IptDiv.append($dailyPlanSpn);
    // STOP building Time box portion of row

    // START building save portion of row
    let $col1SaveDiv = $('<div>');
    $col1SaveDiv.addClass('col-md-1');

    let $saveBtn = $('<i>');
    $saveBtn.attr('id',`saveid-${index}`);
    $saveBtn.attr('save-id',index);
    $saveBtn.attr('class',"saveIcon");
    
    // add col width and row component to row
    $rowDiv.append($col1SaveDiv);
    $col1SaveDiv.append($saveBtn);
    // STOP building save portion of row

    // set row color based on time
    updateRowColor($rowDiv, hour);
    
    // add row to planner container
    $plannerDiv.append($rowDiv);
  };

  // function to update row color
  function updateRowColor ($hourRow,hour) { 

    if (test) { console.log("rowColor ",currHour, hour); }

    if ( hour < currHour) {
      // $hourRow.css('')
      if (test) { console.log("lessThan"); }
      $hourRow.css("background-color","lightcoral")
    } else if ( hour > currHour) {
      if (test) { console.log("greaterthan"); }
      $hourRow.css("background-color","#99CC99")
    } else {
      if (test) { console.log("eqaul"); }
      $hourRow.css("background-color","lightblue")
    }
  };

  // saves to local storage
  // onclick function to listen for user clicks on plan area
  $(document).on('click','i', function(event) {
    event.preventDefault();  

    if (test) { console.log('click pta before '+ planTextArr); }

    let $index = $(this).attr('save-id');

    let inputId = '#input-'+$index;
    let $value = $(inputId).val();

    planTextArr[$index] = $value;


    if (test) { console.log('value ', $value); }
    if (test) { console.log('index ', $index); }
    if (test) { console.log('click pta after '+ planTextArr); }

    localStorage.setItem("storedPlans", JSON.stringify(planTextArr));
  });  
});