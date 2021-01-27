<style>
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
        <p>You will see a weekly sleep visualization displayed in 3 sizes (square, wide & tall):</p>
        <figure class="img-container">
                <img class="card-img-top" src="img/basics_sleep_viz/viz_big_small.png" style="width:230px !important;" alt="Example Bar Charts">
                <!-- <figcaption class="figure-caption">3 sizes from left to right (Square, wide & tall)</figcaption> -->
           </figure>
                
            <div class="mt-4"></div>
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="d-inline-block align-middle text-muted basics_counter_display mt-2" ></h5>
                    <button type="button" class="btn btn-warning basics_page_understand_btn" style="width:80%">I understand</button>
                </div>
            </div>
            
        </div>
        <div class="basics_page_slide">
                <div class="img-container">
                    <img src="img/basics_sleep_viz/basics_instruction_week.png" class="center" style="width:230px !important;"  alt="Example Bar Charts">
                </div>
                <div class="mt-3"></div>
                <p>On each image, at the top, you see a date range (Dec 13 - Dec 19) and at the bottom, you see a timeline that shows a range during which you usually sleep.
It is displayed as military time: 22:00 - 06:00 (= 10pm - 6am).</p> 
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="d-inline-block align-middle text-muted basics_counter_display mt-2"></h5>
                        <button type="button" class="btn btn-warning basics_page_understand_btn" style="width:80%">I understand</button>
                    </div>
                </div>
           
        </div>

        <div class="basics_page_slide">
                <div class="img-container">
                    <img src="img/basics_sleep_viz/basics_instruction_days.png" class="center" style="width:230px !important;"  alt="Example Bar Charts">
                </div>
                <div class="mt-3"></div>
                <p>The legends for the bars on the Y-axis are short forms for the days of the week. 
                </br>&#10148; The week starts on Monday
                </br>&#10148; The weekend is Saturday and Sunday</br></p>
               
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="d-inline-block align-middle text-muted basics_counter_display mt-2"></h5>
                        <button type="button" class="btn btn-warning basics_page_understand_btn" style="width:80%">I understand</button>
                    </div>
                </div>
        </div>

        <div class="basics_page_slide">
            <div class="img-container">
                <img src="img/basics_sleep_viz/bedtime.png" class="center" style="height:160px !important;"  alt="Example Bar Charts">
            </div>
            <div class="mt-3"></div>
            <p>There are two vertical lines that represent your target sleep schedule:
                </br>&#10148; 22:00 (10pm) on the left = when you want to go to bed
                </br>&#10148; 06:00 (6am) on the right = when you want to wake up
                </p>
        
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="d-inline-block align-middle text-muted basics_counter_display mt-2"></h5>
                        <button type="button" class="btn btn-warning basics_page_understand_btn" style="width:80%">I understand</button>
                    </div>
                </div>
        </div>

        <div class="basics_page_slide">

                <p><strong>Blue bars</strong> represent when and for how long you slept each night. The 
                <strong>bar width</strong>  corresponds to your sleep duration.</p>

                <div class="img-container mt-0">
                    <img src="img/basics_sleep_viz/bar_width_explain.gif" class="center" style="height:150px !important; margin-top: -10px;"  alt="Example Bar Charts">
                </div>
                <div class="mt-2"></div>
                <p>In the image above, the blue bar shows that on Sunday you went to bed at 22:00 as planned, 
                slept for 8 hours, and woke up at 6:00 as planned.</p>
     
                <div class="row" style="margin-top:-5px;">
                    <div class="col-sm-12">
                        <h5 class="d-inline-block align-middle text-muted basics_counter_display mt-2"></h5>
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
                    <p>Bars have slightly different colors of blue to help differentiate between weekdays and weekend days.</p>
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

