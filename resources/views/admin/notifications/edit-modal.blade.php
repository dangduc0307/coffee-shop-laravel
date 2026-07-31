<div class="modal fade" id="editModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Chỉnh sửa thông báo

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <input
                    type="hidden"
                    id="edit_id">

                <div class="mb-3">

                    <label class="form-label">

                        Tiêu đề

                    </label>

                    <input
                        type="text"
                        id="edit_title"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Nội dung

                    </label>

                    <textarea
                        id="edit_message"
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
                    class="btn btn-success"
                    onclick="updateNotification()">

                    Cập nhật

                </button>

            </div>

        </div>

    </div>

</div>