<div id="us6-dialog" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Select Your Location</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal" style="width: 550px">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Location:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="map-address"/>
                        </div>
                    </div>
                    <div id="us3" style="width: 100%; height: 400px;"></div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="m-t-small">
                        <label class="p-r-small col-sm-1 control-label">Lat.:</label>

                        <div class="col-sm-3">
                            <input type="text" class="form-control" style="width: 110px" id="map-lat"/>
                        </div>
                        <label class="p-r-small col-sm-2 control-label">Long.:</label>

                        <div class="col-sm-3">
                            <input type="text" class="form-control" style="width: 110px" id="map-lon"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <script>
                        $('#us3').locationpicker({
                            location: {
                                latitude: 27.7172453,
                                longitude: 85.3239605
                            },
                            radius:0,
                            inputBinding: {
                                latitudeInput: $('#map-lat'),
                                longitudeInput: $('#map-lon'),
                                radiusInput: $('#map-radius'),
                                locationNameInput: $('#map-address')
                            },

                            enableAutocomplete: true,
                            autocompleteOptions: {
                                componentRestrictions: {city: 'np'}
                            },
                            addressFormat: 'sublocality',
                            markerIcon: '/assets/images/map-marker-2-xl.png'
                        });
                        $('#us6-dialog').on('shown.bs.modal', function () {
                            $('#us3').locationpicker('autosize');
                        });
                    </script>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    $(document).ready(function () {
        $('#location-display').hide();
        $('#map-address, #map-lat, #map-lon').change(function () {
            var location = $('#map-address').val();
            var latitude = $('#map-lat').val();
            var longitude = $('#map-lon').val();
            $('#location').val(location);
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
            $('#location-display').show();
        });
    });

</script>