<div class="row">
  <div class="col">
    <div class="mt-1 d-flex justify-content-center section-header">
        <h4>Final question</h4>
      </div>
    <p>Do you have any comment about the study, for example concerning the clarity of the instructions or technical issues you might have experienced? (optional)</p>
    <div class="form-group">
            <textarea class="form-control" id="optionalComments" rows="3"></textarea>
    </div>
  </div>
</div>


<script type="text/javascript">

  // This is the event triggered to save the data entered. The event triggers when the 'next' button is pressed.
  $('body').on('finished', function(e, type){
    event.preventDefault();
    if (!excluded) {
      var page_name                 = '<?php echo $id;?>';
      var participant_id            = $('#participant_id').val();
      var system_generated_id       = $('#system_generated_id').val();
      var experiment_sequence       = <?php echo $between_subject_sequence;?>;
      var feedbaack_comments        = $("#optionalComments").val();
      $.ajax({
            type        : 'POST',  
            url         : 'ajax/page_data_save.php',  
            data        : {
                              page_name                  : JSON.stringify(page_name), 
                              participant_id             : JSON.stringify(participant_id), 
                              system_generated_id        : JSON.stringify(system_generated_id), 
                              experiment_sequence        : JSON.stringify(experiment_sequence), 
                              feedbaack_comments         : JSON.stringify(feedbaack_comments), 
                        }, 
            dataType    : 'json',  
            success:function(response){
               if( response.status == 'error' ) {
                  console.log('Something bad happened!');
               } else {
                  console.log("Data saved successfully.");
               }
            },
            complete: function(response, textStatus) {
            // console.log(textStatus)
            },
            error:function (jqXHR, status, thrownError){
                console.log(jqXHR);
            }
      }); // end Ajax
      
      var experiment_duration       = parseInt(timeSpentOnSite/1000);
      var browserInfo               = bowser.getParser(window.navigator.userAgent);
      var browser_name              = browserInfo.getBrowserName();
      var browser_version           = browserInfo.getBrowserVersion();
      var operating_system          = browserInfo.getOSName();
      var target_log                = 'finish';
      $.ajax({
            type        : 'POST',  
            url         : 'ajax/exp_finish_log.php',  
            data        : {
                              page_name                  : JSON.stringify(page_name), 
                              participant_id             : JSON.stringify(participant_id), 
                              system_generated_id        : JSON.stringify(system_generated_id),
                              experiment_sequence        : JSON.stringify(experiment_sequence),  
                              experiment_duration        : JSON.stringify(experiment_duration), 
                              browser_name               : JSON.stringify(browser_name),
                              browser_version            : JSON.stringify(browser_version),
                              operating_system           : JSON.stringify(operating_system),
                              target_log                 : JSON.stringify(target_log)   
                         }, 
            dataType    : 'json',  
            success:function(response){
               if( response.status == 'error' ) {
                  console.log('Something bad happened!');
               } else {
                  console.log("Data saved successfully.");
               }
            },
            complete: function(response, textStatus) {
            // console.log(textStatus)
            },
            error:function (jqXHR, status, thrownError){
                console.log(jqXHR);
            }
      }); // end Ajax
      var target_message            = 'sequence_set';
      $.ajax({
            type        : 'POST',  
            url         : 'ajax/finished_experiment_sequence.php',  
            data        : {
                              experiment_sequence        : JSON.stringify(experiment_sequence),  
                              experiment_duration        : JSON.stringify(experiment_duration),
                              target_message             : JSON.stringify(target_message)    
                         }, 
            dataType    : 'json',  
            success:function(response){
               if( response.status == 'error' ) {
                  console.log('Something bad happened!');
               } else {
                  console.log("Data saved successfully.");
               }
            },
            complete: function(response, textStatus) {
            // console.log(textStatus)
            },
            error:function (jqXHR, status, thrownError){
                console.log(jqXHR);
            }
      }); // end Ajax
      
      } // end if for !excluded


  });
  

</script>
