<style>
/* .first {
    box-sizing: border-box;
    width: 200px;
    padding: 50px;
    border: 1px solid red;
    text-align: center;
} */

.basics_page_slide:not(:first-child) {
    display: none;
}
.controls {
    width: 200px;
}
.pre {
    float: left;
}

.basics_page_understand_btn {
    float: right;
}

.img-container {
     text-align: center;
}

</style>

<div class="row">
  <div class="col">
  <div class="container">
  <div class="mt-1 d-flex justify-content-center section-header">
        <h3>Some basics</h3>
      </div>

    <div id="basics_sleep_viz">
        <div class="visible basics_page_slide">
        <p class="lead text-center">You will see one sleep visualization displayed in 3 sizes</p>
                <div class="img-container">
                    <img class="card-img-top" src="img/basics_sleep_viz/viz_big_small.png" class="center" style="width:260px !important;" alt="Example Bar Charts">
                </div>
                <div class="d-flex justify-content-center">
                    <p>3 sizes from left to right (Square, wide & tall)</p>
                </div>
                
              
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="d-inline-block align-middle text-muted basics_counter_display"></h5>
                    <button type="button" class="btn btn-warning basics_page_understand_btn" style="width:80%">I understand</button>
                </div>
            </div>
                         
                <!-- <div class="d-flex justify-content-center mt-4">
                    <button type="button" class="btn btn-warning w-100 basics_page_understand_btn">I understand</button>
                </div>
                <div class="d-flex justify-content-center mt-0">
                    <p class="basics_counter_display"></p>
                </div> -->
            
        </div>
        <div class="basics_page_slide">
                <div class="img-container">
                    <img src="img/basics_sleep_viz/basics_instruction_week.png" class="center" style="width:260px !important;"  alt="Example Bar Charts">
                </div>
                <p class="text-justify">On each image, at the top, you see a date range (Dec 13 - Dec 19) and at the bottom, you see a timeline that shows a range in which you usually sleep.
It is displayed as military time: 22:00 - 06:00 (= 10pm - 6am).</p> 
                
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="d-inline-block align-middle text-muted basics_counter_display"></h5>
                        <button type="button" class="btn btn-warning basics_page_understand_btn" style="width:80%">I understand</button>
                    </div>
                </div>
           
        </div>

        <div class="basics_page_slide">
                <div class="img-container">
                    <img src="img/basics_sleep_viz/basics_instruction_days.png" class="center" style="width:260px !important;"  alt="Example Bar Charts">
                </div>
                <p class="text-justify">Legends for bars on the Y-axis are short forms for days of the week. 
                </br>&#9655; The week starts on Monday.
                </br>&#9655; The weekend is Saturday and Sunday.</p>
               
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="d-inline-block align-middle text-muted basics_counter_display"></h5>
                        <button type="button" class="btn btn-warning basics_page_understand_btn" style="width:80%">I understand</button>
                    </div>
                </div>
        </div>

        <div class="basics_page_slide">
            <div class="img-container">
                <img src="img/basics_sleep_viz/bedtime.png" class="center" style="width:200px !important; height:180px !important;"  alt="Example Bar Charts">
            </div>
         
            <p class="text-justify">There are two vertical lines that represent your target sleep schedule:
                </br>&#9655; 22:00(10pm) on the left = when you should go to bed
                </br>&#9655; 06:00(6am) on the right = when you should wake up
                </p>
        
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="d-inline-block align-middle text-muted basics_counter_display"></h5>
                        <button type="button" class="btn btn-warning basics_page_understand_btn" style="width:80%">I understand</button>
                    </div>
                </div>
        </div>

        <div class="basics_page_slide">

                <p class="text-justify"><strong>Blue bars</strong> represent when and for how long you slept each night. The 
                <strong>bar width</strong>  corresponds to your sleep duration.</p>

                <div class="img-container mt-0">
                    <img src="img/basics_sleep_viz/bar_width_explain.gif" class="center" style="width:180px !important; height:180px !important; margin-top: -15px;"  alt="Example Bar Charts">
                </div>

                <p class="text-justify">Here, the blue bar shows that on Sunday you went to bed at 22:00 as planned, 
                slept for 8 hours, and woke up at 6:00 as planned.</p>
     
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="d-inline-block align-middle text-muted basics_counter_display"></h5>
                        <button type="button" class="btn btn-warning basics_page_understand_btn" style="width:80%">I understand</button>
                    </div>
                </div>
        </div>

        <div class="basics_page_slide">
                    <div class="row d-flex justify-content-center">
                        <strong>Weekdays &nbsp;&nbsp;</strong>
                        <div class="img-container">
                            <img  src="img/basics_sleep_viz/light-blue.png" style="width:150px !important;" alt="Example Bar Charts">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                            <strong>Weekends &nbsp;&nbsp;</strong>
                            <div class="img-container">
                                <img  src="img/basics_sleep_viz/dark-blue.png" style="width:150px !important;" alt="Example Bar Charts">
                            </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                    <p class="text-justify">Bars have slightly different colors of blue to help differentiate between weekdays and weekend days.</p>
                </div>

                </div>
        </div>


    <!-- <div class="d-flex justify-content-center mt-0">
            <p class="basics_counter_display">(..)</p>
    </div> -->
    <div id="basics_page_comment">
        <p class="text-muted"> Click <strong>Next</strong> to proceed to the task description.</p>
    </div>

  

    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    let count = 1;
    function updateDisplay(){
        $('.basics_counter_display').text(count +"/6")
    };

    updateDisplay();
    
         $("#basics_page_comment").hide();
         $("#btn_<?php echo $id;?>").hide();
         $(".basics_page_understand_btn").click(function() {
            //Show previous button
            // $('.pre').show();
            count++;
            updateDisplay();
            
            //Find the element that's currently showing
            //$showing = $('.content').find('.basics_page_slide.visible').html();
             var current_div = $('#basics_sleep_viz .basics_page_slide.visible').first();
            // $showing = $('.content .basics_page_slide.visible').children();

            //Find the next element
            var next_div = current_div.next();
            // $next =  $(this).parent().find('.basics_page_slide');

            //Change which div is showing
            current_div.removeClass("visible").hide();
            next_div.addClass("visible").show();
            
            //If there's no more elements, hide the NEXT button
            if (!next_div.next().length) {
                $(this).hide();
                $('.basics_counter_display').hide();
                $('.basics_page_understand_btn').hide();
                $("#basics_page_comment").show();
                $("#btn_<?php echo $id;?>").show();
            }
        });

       
});


</script>

