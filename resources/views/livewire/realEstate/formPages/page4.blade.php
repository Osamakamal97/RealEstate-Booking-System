<div style="height: 380px">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-md-checkboxes">
                <label>المرافق الداخلية</label>
                <div class="md-checkbox-inline">
                    @foreach ($indoor_facilities as $facility)
                    <div class="md-checkbox" style="padding-bottom: 20px;padding-left: 15px;">
                        <input type="checkbox" id="{{ $facility->name }}" class="md-check"
                            wire:model.defer="selected_indoor_facilities.{{ $facility->id }}">
                        <label for="{{ $facility->name }}">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> {{ $facility->name }} </label>
                    </div>
                    @endforeach
                    @error('selected_indoor_facilities')
                    <span id="end_leave_at-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group form-md-checkboxes">
                <label>المرافق الخارجية</label>
                <div class="md-checkbox-inline">
                    @foreach ($outdoor_facilities as $facility)
                    <div class="md-checkbox">
                        <input type="checkbox" id="{{ $facility->name }}" class="md-check"
                            wire:model.defer="selected_outdoor_facilities.{{ $facility->id }}">
                        <label for="{{ $facility->name }}">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> {{ $facility->name }} </label>
                    </div>
                    @endforeach
                    @error('selected_outdoor_facilities')
                    <span id="end_leave_at-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>