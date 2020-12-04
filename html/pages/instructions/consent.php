<div class="row">
    <div class="col">
      <h2>Information Notice and Informed Consent</h2>
      <?php
        $warning_text='<strong>You need to scroll</strong> the page to see the remaining content.';
        include 'components/warning.php';
      ?>
      <div class="consent">
        <p>
          <b>Introduction:</b>
        </p>
        <p>
        You are invited to participate in a study titled "Readability on smartwatches and fitness trackers." The study has received ethics approval under ref. no CER-Paris-Saclay-2020-xxx. 
        </p>
        <p>
          <b>Main researchers:</b>
        </p>
        <p>
          [anonymized: researcher identification].
        </p>
        <p>
          <b>Who can participate:</b>
        </p>
        <p>
        Anyone who (1) owns a mobile phone (e.g, android mobile, iPhone) (2) speaks English, and (3) is at least 18 years old can participate in this study.

        </p>
        <p>
          <b>Research location:</b>
        </p>
        <p>
          Internet study on the Prolific platform
        </p>
        <p>
          <b>Research goal:</b>
        </p>
        <p>
        The purpose of this study is to understand, “How does display size (smartwatch, wristband - horizontal & vertical) affect the readability of weekly sleep data represented by unaligned bar charts?”
        </p>
        <p>
          <b>What do we expect from you:</b>
        </p>
        <p>
        If you agree to participate in the study, you will be shown 3 different sizes of bar charts for one question/task and will be asked questions such as your mobile brand and model name, etc. The entire experiment will take approximately <?php echo $EXP_DURATION ?> minutes.
        </p>
        <p>
          <b>Your rights to withdraw from the experiment at any time:</b>
        </p>
        <p>
        Your participation in this experiment is entirely voluntary and you may stop at any time, without providing a reason and without penalty. However, we will not be able to pay you if you do not complete the experiment.
</p>
        <p>
          <b>Your rights to confidentiality and privacy:</b>
        </p>
        <p>
          Your participation in this research is confidential. All responses provided will be stored anonymously. For text responses, we ask you not to include any identifying information such as your name or email address. We will check your text responses to confirm that no identifiable information is provided. After our research project is completed, all anonymized data will be made publicly available on an open science platform.
        </p>
        <p>
        Note that you will not be able to withdraw your response once you confirm your participation at the end of this experiment by clicking on the completion link.
        </p>
        <p>
          <b>Potential benefits:</b>
        </p>
        <p>
        You will receive £<?php echo sprintf('%0.2f', $EXP_PAYMENT); ?>  for participating in this experiment, under the condition that you complete the experiment, do not rush through the experiment, and answer the attention check questions correctly (if any). If attention check questions are present, it will be easy if you pay attention to the experiment.
        </p>
        <p>
          <b>Risks and discomforts:</b>
        </p>
        <p>
        Your participation in this study does not present any foreseeable risks in participating beyond those experienced in daily life.
        </p>
        <p>
          <b>Publication:</b>
        </p>
        <p>
          This research will be published in a scientific journal or at a conference. The anonymized data will be made publicly available on an open science platform.
        </p>
        <p>
          <b>Right to ask questions:</b>
        </p>
        <p>
        Please feel free to contact Alaul Islam and Petra Isenberg if you wish to know more about the study, or if you have any queries.

        </p>
        <p>
          <b>Consent:</b>
        </p>
        <p>
         By clicking on the "I agree. Start the experiment." button below, you certify that you have read and understood the above information, and that you are free to withdraw your consent or withdraw from the research at any time.
        </p>
      </div>
    </div>
</div>
