<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMovementModalLabel">Add Stock Movement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="updateStockForm">
                @csrf
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="movement">Movement:</label>
                    <select name="movement" id="movement" class="form-control" required>
                        <option value="push">Push</option>
                        <option value="pull">Pull</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary updateStock">Update Stock</button>
            </form>
            </div>
        </div>
    </div>
</div>