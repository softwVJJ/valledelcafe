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
        <label for="validationCustomUsername">@lang("vista.factor_in_kilos")</label>
        <div class="input-group">
        <input type="text"  class="factor form-control" name="yield-factor" data-toggle="tooltip" title="Cantida de kilos requeridos" value="50" id="yield-factor" required>
        </div>
      </div>
        </div>
  </div>
</div>
