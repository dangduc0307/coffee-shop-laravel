<div class="modal fade" id="addModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Thêm thông báo
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="mb-3">

                    <label class="form-label">
                        Tiêu đề
                    </label>

                    <input
                        type="text"
                        id="title"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Nội dung
                    </label>

                    <textarea
                        id="message"
                        class="form-control"
                        rows="4"></textarea>

                </div>

            </div>

            <div class="modal-footer">

                <button
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Đóng

                </button>

                <button
                    class="btn btn-primary"
                    onclick="addNotification()">

                    Thêm

                </button>

            </div>

        </div>

    </div>

</div>