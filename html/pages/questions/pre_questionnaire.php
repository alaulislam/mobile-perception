<style>
/* https://codepen.io/powers/pen/YymjNR */
.likert li {
  float: left;
  list-style-type: none;
}
.img-container {
        text-align: center;
      }
</style>
<div class="row">
  <div class="col">

<div class="container">
      <div class="mt-1 d-flex justify-content-center">
        <h3>Pre-questionnaire</h3>
      </div>
      <div class="form-group">
      <h5 class="mb-1">Do you own any of these?</h5>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
            <label class="form-check-label" for="inlineCheckbox1">Smartwatch</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label" for="inlineCheckbox2">Fitness Band</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
            <label class="form-check-label" for="inlineCheckbox3">None of these</label>
        </div>
    </div>
    
    <div class="form-group" id="form_likert">
        <h5 class="mb-1 text-justify">I'm experienced with reading the bar chart like the one below.</h5>
        <div class="img-container">
                    <img src="img/questions/pre_questionnaire1.png" style="width:240px !important;" alt="Example Bar Charts">
                </div>

        <!-- <ul class='likert'>
            <li>
                <input type="radio" name="likert" value="strong_agree">
                <label>Strongly agree</label>
            </li>
            <li>
                <input type="radio" name="likert" value="strong_agree">
                <label>Agree</label>
            </li>
            <li>
                <input type="radio" name="likert" value="strong_agree">
                <label>Neutral</label>
            </li>
            <li>
                <input type="radio" name="likert" value="disagree">
                <label>Disagree</label>
            </li>
            <li>
                <input type="radio" name="likert" value="strong_agree">
                <label>Strongly disagree</label>
            </li>
        </ul> -->
        <!-- <ul class="likert">
          <li> Not Guilty </li>
            <li><input type="radio" name="guilty" value="1" /></li>
            <li><input type="radio" name="guilty" value="2" /></li>
            <li><input type="radio" name="guilty" value="3" /></li>
            <li><input type="radio" name="guilty" value="4" /></li>
            <li><input type="radio" name="guilty" value="5" /></li>
          <li> Very Guilty </li>
        </ul> -->

        <div>
          <div class="form-check">
            <input type="radio" class="form-check-input" value="1" name="q" id="option1">
            <label class="form-check-label" for="option1">Strongly agree</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" value="2" name="q" id="option2">
            <label class="form-check-label" for="option2">Agree</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" value="3" name="q" id="option3">
            <label class="form-check-label" for="option3">Neither agree nor disagree</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" value="4" name="q" id="option4">
            <label class="form-check-label" for="option4">Disagree</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" value="5" name="q" id="option5">
            <label class="form-check-label" for="option5">Strongly disagree</label>
          </div>
        </div>




    </div>
   
</div>

    <!-- <footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer> -->

</div>
</div>