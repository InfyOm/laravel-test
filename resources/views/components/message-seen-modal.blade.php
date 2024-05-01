<div class="modal fade" id="messageDecryptModal" tabindex="-1" aria-labelledby="messageDecryptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageDecryptModalLabel">Add secret key for decrypt message :</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="decryptMessageForm">
                <span id="showError" class="text-danger mx-3"></span>
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="dataId" name="data_id">
                    <div class="mb-3">
                        <input type="password" class="form-control" id="recipient-name2" placeholder="Secret key" name="secret_key" required></input>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="message-button2" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
