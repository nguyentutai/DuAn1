<div class="col-md-10">
                <div class="row bg-dark p-2 text-end">
                    <a href="" class="text-light text-none"><i class="fa-solid fa-right-from-bracket fs-5 me-5"></i></a>
                </div>
                <div class="row p-4">
                    <div class="row text-center">
                        <h5 class="fs-3 fw-bold bg-warning p-2 col-md-3 rounded-pill">QUẢN LÝ DANH MỤC</h5>
                    </div>
                    <div class="row rounded-2 bg-light p-3">
                        <p class="fw-bold fs-4">Tạo danh mục mới</p>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="content row">
                                <div class="mb-3 col-md-6">
                                    <label for="formGroupExampleInput" class="form-label fw-semibold fs-5">Tên danh mục</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Nhập vào tên danh mục">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label fw-semibold fs-5">Thêm đường dẫn tĩnh</label>
                                    <input type="text" class="form-control" id=""
                                        placeholder="Link ...">
                                </div>
                            </div>

                            <div class="content1 row">
                                <div class="col-md-6">
                                    <label for="formGroupExampleInput" class="form-label fw-semibold fs-5">Danh
                                        mục cha</label>
                                    <select class="form-select" name="parent-category" aria-label="Default select example">
                                        <option selected value="0">--- Danh mục sản phẩm ---</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="formGroupExampleInput" class="form-label fw-semibold fs-5">Example
                                        label</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="" class="form-label fw-semibold fs-5 mt-1">Ảnh Danh Mục</label>
                                    <label for="imagemain"
                                        class="w-100 text-center bg-dark text-light image rounded-4"><i
                                            class="fa-solid fa-cloud-arrow-up fs-1"></i></label>
                                    <input type="file" class="form-control-file d-none" id="imagemain">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <button class="btn btn-warning fw-bold mt-4" name="btn-submit">Thêm Danh Mục</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <a href="?act=listdm" class="btn btn-warning fw-bold">Danh sách danh mục</a>
                <a href="" class="btn btn-dark fw-bold">Thùng Rác</a>
            </div>
        </div>
    </div>