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


                {{-- Danh mục --}}
                <div class="mb-3">

                    <label class="form-label">
                        Danh mục
                    </label>

                    <select
                        id="edit_category_id"
                        class="form-select">

                        @foreach ($categories as $category)

                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- ==================== --}}
                {{-- TIẾNG VIỆT --}}
                {{-- ==================== --}}

                <div class="border rounded p-3 mb-3">

                    <h6 class="mb-3">
                        🇻🇳 Tiếng Việt
                    </h6>


                    {{-- Tên --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Tên sản phẩm
                        </label>

                        <input
                            type="text"
                            id="edit_name_vi"
                            class="form-control"
                            placeholder="Nhập tên sản phẩm bằng tiếng Việt">

                        <div
                            id="edit_name_vi-error"
                            class="invalid-feedback">
                        </div>

                    </div>


                    {{-- Mô tả --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Mô tả
                        </label>

                        <textarea
                            id="edit_description_vi"
                            class="form-control"
                            rows="4"
                            placeholder="Nhập mô tả bằng tiếng Việt"></textarea>

                        <div
                            id="edit_description_vi-error"
                            class="invalid-feedback">
                        </div>

                    </div>

                </div>


                {{-- ==================== --}}
                {{-- ENGLISH --}}
                {{-- ==================== --}}

                <div class="border rounded p-3 mb-3">

                    <h6 class="mb-3">
                        🇬🇧 English
                    </h6>


                    {{-- Tên --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Product name
                        </label>

                        <input
                            type="text"
                            id="edit_name_en"
                            class="form-control"
                            placeholder="Enter product name in English">

                        <div
                            id="edit_name_en-error"
                            class="invalid-feedback">
                        </div>

                    </div>


                    {{-- Mô tả --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea
                            id="edit_description_en"
                            class="form-control"
                            rows="4"
                            placeholder="Enter description in English"></textarea>

                        <div
                            id="edit_description_en-error"
                            class="invalid-feedback">
                        </div>

                    </div>

                </div>


                {{-- Giá + tồn kho --}}
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

                            <div
                                id="edit_price-error"
                                class="invalid-feedback">
                            </div>

                        </div>

                    </div>


                    

                </div>

                {{-- File source --}}
                <div class="mb-3">

                    <label class="form-label">
                        File source
                    </label>

                    <div
                        id="edit_file_current"
                        class="mb-2 text-muted">
                    </div>

                    <input
                        type="file"
                        id="edit_file"
                        class="form-control"
                        accept=".zip,.rar,.7z">

                    <div
                        id="edit_file-error"
                        class="invalid-feedback">
                    </div>

                </div>


                {{-- Dung lượng file --}}
                <div class="mb-3">

                    <label class="form-label">
                        Dung lượng file
                    </label>

                    <input
                        type="text"
                        id="edit_file_size"
                        class="form-control"
                        placeholder="Ví dụ: 25 MB">

                    <div
                        id="edit_file_size-error"
                        class="invalid-feedback">
                    </div>

                </div>


                {{-- Demo URL --}}
                <div class="mb-3">

                    <label class="form-label">
                        Link Demo
                    </label>

                    <input
                        type="url"
                        id="edit_demo_url"
                        class="form-control"
                        placeholder="https://demo.example.com">

                    <div
                        id="edit_demo_url-error"
                        class="invalid-feedback">
                    </div>

                </div>


                {{-- Documentation URL --}}
                <div class="mb-3">

                    <label class="form-label">
                        Link hướng dẫn
                    </label>

                    <input
                        type="url"
                        id="edit_documentation_url"
                        class="form-control"
                        placeholder="https://example.com/documentation">

                    <div
                        id="edit_documentation_url-error"
                        class="invalid-feedback">
                    </div>

                </div>


                {{-- Requirements --}}
                <div class="mb-3">

                    <label class="form-label">
                        Yêu cầu hệ thống
                    </label>

                    <textarea
                        id="edit_requirements"
                        class="form-control"
                        rows="4"
                        placeholder="Ví dụ: PHP 8.2+, Laravel 12, MySQL 8.0+"></textarea>

                    <div
                        id="edit_requirements-error"
                        class="invalid-feedback">
                    </div>

                </div>


                {{-- Ảnh --}}
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

                    <div
                        id="edit_thumbnail-error"
                        class="invalid-feedback">
                    </div>

                </div>


                {{-- Featured --}}
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

                    <div
                        id="edit_featured-error"
                        class="invalid-feedback">
                    </div>

                </div>


                {{-- Status --}}
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

                    <div
                        id="edit_status-error"
                        class="invalid-feedback">
                    </div>

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