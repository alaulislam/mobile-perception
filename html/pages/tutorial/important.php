<style>
   .important_page_slide:not(:first-child) {
   display: none;
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
         <div class="important">
            <div class="visible important_page_slide">
               <p><strong>You can participate in the experiment if:</strong>
               <p>
               <ul class="list-group list_important" style="margin-top:-10px">
                  <li>
                     &nbsp;If you are viewing this page on a smartphone (e.g, android mobile, iPhone) and meet the following screen resolution
                     <ul class="inner">
                        <li style="margin-left:-25px;">&nbsp;<strong>minimum</strong> screen resolution of 320x480 pixels (width x height)</li>
                        <li style="margin-left:-25px;">&nbsp;<strong>maximum</strong> screen resolution of 414x896 pixels (width x height)</li>
                     </ul>
                  </li>
               </ul>
               <div class="mt-2"></div>
               <p><strong>You will be excluded and not be paid if:</strong>
               <p>
               <ul class="list-group list_important" style="margin-top:-10px">
                  <li>&nbsp; If you are using a laptop, tablet, or desktop computer to view this experiment</li>
               </ul>
               <div class="row mt-3">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted important_counter_display"></h5>
                     <button type="button" class="btn btn-warning important_page_understand_btn" style="width:80%">I understand</button>
                  </div>
               </div>
            </div>
            <div class="important_page_slide">
               <p>&raquo; You cannot navigate back to previous pages</p>
               <div class="mt-2"></div>
               <p>&raquo; You will not be able to withdraw your response once you confirm your participation at the end of this experiment by clicking on the completion link</p>
               <div class="mt-2"></div>
               <p>&raquo; You will receive <strong>€ X / £ Y</strong>  for participating in this experiment, under the condition that you complete the experiment, consent to participate, and correctly answer attention check questions</p>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function() {
           let count = 1;
           function updateImportantCounterDisplay(){
               $('.important_counter_display').text(count +"/2")
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