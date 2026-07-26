<div class="modal fade" id="addModal" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Thêm sản phẩm
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
                        Danh mục
                    </label>

                    <select id="category_id" class="form-select">
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

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Giá
                            </label>

                            <input
                                type="number"
                                id="price"
                                class="form-control">
                            <div id="price-error" class="invalid-feedback"></div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Tồn kho
                            </label>

                            <input
                                type="number"
                                id="stock"
                                class="form-control">
                            <div id="stock-error" class="invalid-feedback"></div>

                        </div>

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Ảnh đại diện
                    </label>

                    <input
                        type="file"
                        id="thumbnail"
                        class="form-control">
                    <div id="thumbnail-error" class="invalid-feedback"></div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Sản phẩm nổi bật
                    </label>

                    <select
                        id="featured"
                        class="form-select">

                        <option value="0">Không</option>

                        <option value="1">Có</option>

                    </select>
                    <div id="featured-error" class="invalid-feedback"></div>

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
                    onclick="addProduct()">

                    Thêm

                </button>

            </div>

        </div>

    </div>

</div>