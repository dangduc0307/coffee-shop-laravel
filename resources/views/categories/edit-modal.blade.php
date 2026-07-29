<div class="modal fade" id="editModal" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Chỉnh sửa loại sản phẩm

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

                        Tên loại sản phẩm

                    </label>

                    <input
                        type="text"
                        id="edit_name"
                        class="form-control">
                    <div id="edit_name-error"></div>
                    

                </div>

                

                <div class="mb-3">

                    <label class="form-label">

                        Mô tả

                    </label>

                    <textarea
                        id="edit_description"
                        class="form-control"
                        rows="4"></textarea>
                    <div id="edit_description-error"></div>
                    

                </div>

                

                <div class="mb-3">

                    <label class="form-label">

                        Ảnh đại diện

                    </label>

                    <img
                        id="edit_image_preview"
                        src=""
                        class="img-image mb-2"
                        width="120">

                    <input
                        type="file"
                        id="edit_image"
                        class="form-control">
                    <div id="edit_image-error"></div>
                    

                </div>


                <div class="mb-3">

                    <label class="form-label">

                        Trạng thái

                    </label>

                    <select
                        id="edit_status"
                        class="form-select">

                        <option value="1">

                            Hiển thị

                        </option>

                        <option value="0">

                            Ẩn

                        </option>

                    </select>
                    <div id="edit_status-error"></div>
                    

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
                    onclick="updateCategory()">

                    Cập nhật

                </button>

            </div>

        </div>

    </div>

</div>