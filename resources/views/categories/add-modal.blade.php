<div class="modal fade" id="addModal" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Thêm loại sản phẩm
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
                        Tên loại sản phẩm
                    </label>

                    <input
                        type="text"
                        id="name"
                        class="form-control">
                    <div id="name-error" class="invalid-feedback"></div>

                </div>

                

                <div class="mb-3">

                    <label class="form-label">
                        Mô tả
                    </label>

                    <textarea
                        id="description"
                        class="form-control"
                        rows="4"></textarea>
                    <div id="description-error" class="invalid-feedback"></div>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Ảnh đại diện
                    </label>

                    <input
                        type="file"
                        id="image"
                        class="form-control">
                    <div id="image-error" class="invalid-feedback"></div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Trạng thái
                    </label>

                    <select
                        id="status"
                        class="form-select">

                        <option value="1">Hiển thị</option>

                        <option value="0">Ẩn</option>

                    </select>
                    <div id="status-error" class="invalid-feedback"></div>

                </div>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Đóng

                </button>

                <button
                    type="button"
                    class="btn btn-primary"
                    onclick="addCategory()">

                    Thêm

                </button>

            </div>

        </div>

    </div>

</div>