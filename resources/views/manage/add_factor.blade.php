<div class="card">
  <h5 class="card-header">@lang("vista.title_factor_calculate")</h5>
  <div class="card-body">
        <div class="form-row">
          <div class="col-md-2 mb-3">
            <label for="validationCustom01">@lang("vista.grain_pasilla")</label>
            <input type="text"  onkeyup="factorRendimiento()"  class="factor form-control" id="pasilla-percentage" name="pasilla-percentage" placeholder="" value="0" required>
          </div>
          <div class="col-md-2 mb-3">
            <label for="validationCustom02">@lang("vista.grain_white")</label>
            <input type="text" onkeyup="factorRendimiento()" class="factor form-control" id="white-percentage" name="white-percentage" placeholder="" value="0" required>
          </div>
            <div class="col-md-3 mb-2">
            <label for="validationCustomUsername">@lang("vista.grain_fermented")</label>
            <div class="input-group">
            <input type="text" onkeyup="factorRendimiento()" class="factor form-control" name="fermented-percentage" value="0" id="fermented-percentage" required>
            </div>
          </div>
          <div class="col-md-3 mb-2">
          <label for="validationCustomUsername">@lang("vista.broca")</label>
          <div class="input-group">
          <input type="text" onkeyup="factorRendimiento()" class="factor form-control" name="borer" value="0" id="borer" required>
          </div>
        </div>
        <div class="col-md-3 mb-2">
        <label for="validationCustomUsername">@lang("vista.label_merma")</label>
        <div class="input-group">
        <input type="text" onkeyup="factorRendimiento()" class="factor form-control" name="merma" value="0" id="merma" required>
        </div>
      </div>
        <div class="col-md-3 mb-2">
          <label for="validationCustomUsername">@lang("vista.label_dxmachine")</label>
          <div class="input-group">
            <input type="text" onkeyup="factorRendimiento()" class="factor form-control" name="dxmachine" value="0" id="dxmachine" required>
          </div>
        </div>
        <div class="col-md-6 mb-2">
            <label for="validationCustomUsername">@lang("vista.label_machine")</label>
          <div class="input-group"  >
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="trilla-check" value="A" id="trilla-check">
              <label class="form-check-label" for="defaultCheck1">
                @lang("vista.label_machine_trilla")
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="desimetric-check" value="A" id="desimetric-check">
              <label class="form-check-label" for="defaultCheck1">
                @lang("vista.label_machine_desimetric")
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="electronic-check" value="A" id="electronic-check" >
              <label class="form-check-label" for="defaultCheck2">
                @lang("vista.label_machine_electronic")
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="tostion-check" value="A" id="tostion-check" >
              <label class="form-check-label" for="defaultCheck2">
                @lang("vista.label_machine_tostion")
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="select-check" value="A" id="select-check" >
              <label class="form-check-label" for="defaultCheck2">
                @lang("vista.label_machine_select")
              </label>
            </div>

         </div>
         </div>
        <div class="col-md-3 mb-2">
        <label for="validationCustomUsername">@lang("vista.factor_in_kilos")</label>
        <div class="input-group">
        <input type="text"  class="factor form-control" name="yield-factor" data-toggle="tooltip" title="Cantidad de kilos requeridos" value="70" id="yield-factor" required>
        </div>
      </div>
        </div>
  </div>
</div>
