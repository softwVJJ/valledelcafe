<div class="card">
  <h5 class="card-header">@lang("vista.title_cup_profile")</h5>
  <div class="card-body">

        <div class="form-row">
          <div class="col-md-3 mb-3">
            <label for="validationCustom01">@lang("vista.label_cup_points")</label>
            <input type="text" class="form-control"onkeypress="return onlyNumberId(event)" id="cup-score" name="cup-score" placeholder="" value="0" >
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationCustom02">@lang("vista.label_aroma")</label>
            <input type="text" class="form-control" id="armoma" name="aroma" placeholder="" value="N/A" >
          </div>
            <div class="col-md-3 mb-2">
            <label for="validationCustomUsername">@lang("vista.label_flavor")</label>
            <div class="input-group">
            <input type="text" class="form-control" name="flavor" value="N/A" id="flavor" >
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationCustom01">@lang("vista.label_acidity")</label>
            <input type="text" class="form-control" id="acidity" name="acidity" placeholder="" value="N/A" >
          </div>
        </div>

                <div class="form-row">
                  <div class="col-md-3 mb-3">
                    <label for="validationCustom02">@lang("vista.label_body")</label>
                    <input type="text" class="form-control" id="body" name="body" placeholder="" value="N/A" >
                  </div>
                    <div class="col-md-3 mb-2">
                    <label for="validationCustomUsername">@lang("vista.label_sweetness")</label>
                    <div class="input-group">
                    <input type="text" class="form-control" name="sweetnees" value="N/A" id="sweetnees" >
                    </div>
                  </div>
                  <div class="col-md-3 mb-2">
                  <label for="validationCustomUsername">@lang("vista.label_value_balance")</label>
                  <div class="input-group">
                  <input type="text" onkeypress="return onlyNumberId(event)" class="form-control" name="balance-value" value="0" id="identification_card" >
                  </div>
                </div>
                <div class="col-md-3 mb-2">
                <label for="validationCustomUsername">@lang("vista.label_balance_decription")</label>
                <div class="input-group">
                <input type="text" class="form-control" name="balance-description" value="N/A" id="identification_card" >
                </div>
              </div>
                </div>
  </div>
</div>
