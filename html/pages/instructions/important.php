<style>
.important_page_slide:not(:first-child) {
    display: none;
}
.controls {
    width: 200px;
}
.pre {
    float: left;
}

.important_page_understand_btn {
    float: right;
}

a {
   cursor: pointer;
}

.list_important li{ 
            list-style: none; 
} 

.list_important li::before{ 

  content: "\00BB"; 
} 


</style>

<div class="row">
  <div class="col">
  <div class="container">
  <div class="mt-1 d-flex justify-content-center section-header">
        <h3>Important</h3>
      </div>
    <!-- <div class="d-flex justify-content-center task-description">
            <h2>Important</h2>
    </div> -->

    <div class="important">
        <div class="visible important_page_slide">

            <h5 class="mb-1">You can participate in the experiment if: </h5>
                <ul class="list-group list_important">
                    <li> &nbsp;If you are viewing this page on a smartphone (e.g, android mobile, iPhone) 
                        <ul class="inner">
                            <li>&nbsp;with a minimum screen-width and height of 320px</li>
                        </ul>
                    </li>
                 </ul>
           <h5 class="mb-1 mt-3">You will be excluded and not be paid if: </h5>
                        <ul class="list-group list_important">
                            <li>&nbsp;if you are using a laptop, tablet, or desktop computer to view this experiment</li>
                         </ul>


                <div class="row mt-3">
                    <div class="col-sm-12">
                        <h5 class="d-inline-block align-middle text-muted important_counter_display"></h5>
                        <button type="button" class="btn btn-warning important_page_understand_btn" style="width:80%">I understand</button>
                    </div>
                </div>
                         
                <!-- <div class="d-flex justify-content-center mt-4">
                    <button type="button" class="btn btn-warning w-100 important_page_understand_btn">I understand</button>
                </div> -->
            
        </div>
        <div class="important_page_slide">
           
            <ul class="list-group list_important">
                            <li>&nbsp;You cannot navigate back to previous pages</li>
                            <li class="text-justify mt-2">&nbsp;You will not be able to withdraw your response once you confirm your participation at the end of this experiment by clicking on the completion link</li>
                            <!-- <li class="text-justify mt-2">&nbsp;You will receive € X / £ Y for participating in this experiment, under the condition that you complete the experiment, consent to participate, do not reload the page and correctly answer attention check questions</li> -->
                         </ul>
              
                 <div class="row mt-3">
                    <div class="col-sm-12">
                        <h5 class="d-inline-block align-middle text-muted important_counter_display"></h5>
                        <button type="button" class="btn btn-warning important_page_understand_btn" style="width:80%">I understand</button>
                    </div>
                </div>
           
        </div>
        <div class = "important_page_slide">
           
                <p class="text-justify">You will receive <strong>€ X / £ Y</strong>  for participating in this experiment, under the condition that you complete the experiment, consent to participate, and correctly answer attention check questions</p>
          
        </div>
    </div>

    <!-- <div class="controls">
        <a class="pre" style="display: none;">PREVIOUS</a>
        <a class="important_page_understand_btn">NEXT</a>
    </div> -->

    <!-- <div class="d-flex justify-content-center mt-0">
            <p id="important_counter_display">(..)</p>
    </div> -->
    <div id="important_page_comment">
        <p class="text-muted"> Click <strong>Next</strong> to proceed to the informed consent.</p>
    </div>

  

    </div>
  </div>
</div>

<script>
$(document).ready(function() {
        let count = 1;
        function updateImportantCounterDisplay(){
            $('.important_counter_display').text(count +"/3")
        };

        updateImportantCounterDisplay();
    
         $("#important_page_comment").hide();
         $("#btn_<?php echo $id;?>").hide();
         $(".important_page_understand_btn").click(function() {
            //Show previous button
            // $('.pre').show();
            count++;
            updateImportantCounterDisplay();
            
            //Find the element that's currently showing
            //$showing = $('.content').find('.important_page_slide.visible').html();
             var current_div = $('.important .important_page_slide.visible').first();
            // $showing = $('.content .important_page_slide.visible').children();

            //Find the next element
            var next_div = current_div.next();
            // $next =  $(this).parent().find('.important_page_slide');

            //Change which div is showing
            current_div.removeClass("visible").hide();
            next_div.addClass("visible").show();
            
            //If there's no more elements, hide the NEXT button
            if (!next_div.next().length) {
                $(this).hide();
                $('.important_counter_display').hide();
                $('.important_page_understand_btn').hide();
                $("#important_page_comment").show();
                $("#btn_<?php echo $id;?>").show();
            }
        });

        $(".pre").click(function() {
            $('.important_page_understand_btn').show();
        
            $showing = $('.content .first.visible').first();
            $next = $showing.prev();
            $showing.removeClass("visible").hide();
            $next.addClass("visible").show();
            
            if (!$next.prev().length) {
                $(this).hide();
            }
        });
});


</script>

