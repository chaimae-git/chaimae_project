<!--begin: Start draw Modal -->
<div class="modal fade" id="startdrawModal" tabindex="-1" role="dialog" aria-labelledby="startdrawModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="startdrawModalLabel">Select Draw type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style='text-align: center;'>
                <!-- Cards -->
                <div class="row">
                    <div class="col-4">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="">Point</h5>
                                <h6 class="mb-2 text-muted" style="height:70px">ATM, Tree, Pole, Bus Stop, etc.</h6>
                                <p class="card-text"><i class="fas fa-map-marker-alt fa-2x"></i></p>
                                <a id="startDrawPoint" class="card-link" style="cursor:pointer">Add Point</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="">Line</h5>
                                <h6 class="mb-2 text-muted" style="height:70px">Road, River, Telephone Wire, etc.</h6>
                                <p class="card-text"><i class="fas fa-road fa-2x"></i></p>
                                <a id="startDrawLine" class="card-link" style="cursor:pointer">Add Line</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="">Polygon</h5>
                                <h6 class="mb-2 text-muted" style="height:70px">Building, Garden, Ground, etc.</h6>
                                <p class="card-text"><i class="fas fa-draw-polygon fa-2x"></i></p>
                                <a id="startDrawPolygon" class="card-link" style="cursor:pointer">Add Polygon</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!--end: Start draw Modal -->
