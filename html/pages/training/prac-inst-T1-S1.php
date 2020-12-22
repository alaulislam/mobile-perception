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

.basics_page_next_btn {
    float: right;
}

.img-container {
    text-align: center;
}
</style>

<div class="row">
  <div class="col">
  <div class="container">
  <div class="mt-1 d-flex justify-content-center">
        <h1>Instructions</h1>
      </div>
    <div class="important">
        <div class="visible basics_page_slide">
            <div class="card-body"> 
                <p class="lead"><strong>Task:</strong> On which day did you sleep longer, Saturday or Sunday?</p>
                <p class="lead"><strong>Answer:</strong> Sat or Sun</p>
                <div class="d-flex justify-content-center">
                    <p class="lead"><strong>Instruction:</strong> Comparing the bar width of Saturday and Sunday you have to answer on which day you sleep more.</p>
                </div>
                <div class="img-container">
                    <img class="card-img-top" src="img/instruction/instruction-T1.png" class="center" style="width:300px;" alt="Example Bar Charts">
                </div>
                    <button type="button" class="btn btn-warning basics_page_next_btn">I understand</button>
                </div>
        </div>
        <div class="basics_page_slide">
            <div class="card-body">
            <div class="img-container">
                <img class="card-img-top" src="img/basics_sleep_viz/basics_instruction_week.png" class="center" style="width:300px;" alt="Example Bar Charts">
            </div>
            <p class="lead">On each image, at the top, you see the date range (Dec 13 - Dec 19) and at the bottom, you will see sleep time duration (22:00 - 06:00).  Legends for bars on Y-axis are short form of days of the week.</p> 
                <button type="button" class="btn btn-warning basics_page_next_btn">I understand</button>
            </div>
        </div>
        <div class="basics_page_slide">
            <div class="card-body">
            <div class="d-flex justify-content-center">
                <p class="lead"><strong>Days</strong> of the week</p>
            </div>
            <div class="img-container">
                <img class="card-img-top" src="img/basics_sleep_viz/basics_instruction_days.png" class="center" style="width:300px;" alt="Example Bar Charts">
            </div>
                <button type="button" class="btn btn-warning basics_page_next_btn">I understand</button>
            </div>
        </div>
        <div class="basics_page_slide">
            <div class="card-body">
            <div class="d-flex justify-content-center">
                <p class="lead"><strong>Vertical lines -</strong> Planned bedtime 22:00 (left) and wake up time 06:00 (right)</p>
            </div>
            <div class="img-container">
                <img class="card-img-top" src="img/basics_sleep_viz/bedtime.png" class="center" style="width:200px;" alt="Example Bar Charts">
            </div>
                <button type="button" class="btn btn-warning basics_page_next_btn">I understand</button>
            </div>
        </div>
        <div class="basics_page_slide">
            <div class="card-body">
            <div class="d-flex justify-content-center">
                <p class="lead"><strong>Bar width -</strong> Sleep duration for each night. In the following image, the blue bar means, on Sunday sleep duration is 8 hours, from 22:00 to 06:00</p>
            </div>
            <div class="img-container">
                <img class="card-img-top" src="img/basics_sleep_viz/bar_width.png" class="center" style="width:200px !important;" alt="Example Bar Charts">
            </div>
                <button type="button" class="btn btn-warning basics_page_next_btn">I understand</button>
            </div>
        </div>
        <div class="basics_page_slide">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <p class="lead">Bar colours</p>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-2">
                        <p class="lead"><strong>Weekdays</strong></p>
                    </div>
                    <div class="col-md-4">
                        <div class="img-container">
                            <img class="card-img-top" src="img/basics_sleep_viz/light-blue.png" class="center" style="width:200px !important;" alt="Example Bar Charts">
                        </div>
                    </div>

                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-2">
                        <p class="lead"><strong>Weekends</strong></p>
                    </div>
                    <div class="col-md-4">
                        <div class="img-container">
                            <img class="card-img-top" src="img/basics_sleep_viz/dark-blue.png" class="center" style="width:200px !important;" alt="Example Bar Charts">
                        </div>
                    </div>

                </div>
                <button type="button" class="btn btn-warning basics_page_next_btn">I understand</button>
            </div>
        </div>
     

    </div>

    <div class="alert alert-success" role="alert" id="basics_page_comment">
        Click <strong>Next</strong> to proceed to the informed consent.
    </div>
    
    <div class="d-flex justify-content-center task-description">
            <p id="basics_page_counter_display">(..)</p>
    </div>

  

    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    let counterDisplayElem = document.querySelector('#basics_page_counter_display');
    let count = 1;
    function updateDisplay(){
        counterDisplayElem.innerHTML = count +"/6";
    };

    updateDisplay();
    
         $("#basics_page_comment").hide();
         $("#btn_<?php echo $id;?>").hide();
         $(".basics_page_next_btn").click(function() {
            count++;
            updateDisplay();
            var current_div = $('.important .basics_page_slide.visible').first();
            var next_div = current_div.next();
            current_div.removeClass("visible").hide();
            next_div.addClass("visible").show();
            
            if (!next_div.next().length) {
                $(this).hide();
                $('.basics_page_next_btn').hide();
                $("#basics_page_comment").show();
                $("#btn_<?php echo $id;?>").show();
            }
        });
      
});

</script>