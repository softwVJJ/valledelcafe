    <div class="card">
      <h5 class="card-header">@lang("vista.title_data_lots")</h5>
      <div class="card-body">

            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="validationCustom01">@lang("vista.label_date_input")</label>
                <input type="text" class="form-control" id="input-date" name="input-date" placeholder="MM/DD/YYYY" value="" >
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationCustom02">@lang("vista.label_number_kilos")</label>
                <input type="text" onkeypress="return onlyNumberId(event)" class="form-control" id="kilos-number" name="kilos-number" placeholder="" value="" >
              </div>
                <div class="col-md-2 mb-2">
                <label for="validationCustomUsername">@lang("vista.label_kilos_avaible")</label>
                <div class="input-group">
                <input type="text" onkeypress="return onlyNumberId(event)" class="form-control" name="avaible-kilos" value="" id="avaible-kilos" >
                </div>
              </div>
            </div>
      </div>
    </div>
