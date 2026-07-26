<div class="modal fade" id="editModal" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Chỉnh sửa sản phẩm

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

                        Danh mục

                    </label>

                    <select id="edit_category_id" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Tên sản phẩm

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

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Giá

                            </label>

                            <input
                                type="number"
                                id="edit_price"
                                class="form-control">
                            <div id="edit_price-error"></div>
                            

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Tồn kho

                            </label>

                            <input
                                type="number"
                                id="edit_stock"
                                class="form-control">
                            <div id="edit_stock-error"></div>
                            

                        </div>

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Ảnh đại diện

                    </label>

                    <img
                        id="edit_thumbnail_preview"
                        src=""
                        class="img-thumbnail mb-2"
                        width="120">

                    <input
                        type="file"
                        id="edit_thumbnail"
                        class="form-control">
                    <div id="edit_thumbnail-error"></div>
                    

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Sản phẩm nổi bật

                    </label>

                    <select
                        id="edit_featured"
                        class="form-select">

                        <option value="0">

                            Không

                        </option>

                        <option value="1">

                            Có

                        </option>

                    </select>
                    <div id="edit_featured-error"></div>
                    

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
                    onclick="updateProduct()">

                    Cập nhật

                </button>

            </div>

        </div>

    </div>

</div>