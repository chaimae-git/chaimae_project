<!--begin: enter information Modal -->
<div class="modal fade" id="enterInformationModal" tabindex="-1" role="dialog" aria-labelledby="enterInformationModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enterInformationModalLabel">Enter Feature's Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-enter-information">
                    <div class="form-group">
                        <label for="exampleInputtext1">Adresse</label>
                        <div>
                            <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" wire:model.lazy="adresse">
                        </div>
                        <small id="textHelp" class="form-text text-muted">Address, Name, etc.</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearDrawSource()">Close</button>
                <button type="button" class="btn btn-primary" wire:click="saveFeatureToDb">Save Featues</button>
            </div>
        </div>
    </div>
</div>
<!--end: enter information Modal -->
