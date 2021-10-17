<?php
    if(!isset($_SERVER['HTTP_REFERER'])){
   
        echo " access permission";
        exit;
    }
    session_start();
    require_once './../../db/hang_hoa.php';
    require_once './../../db/loai.php';
    $category = getAllTypes();
    $productsQuantityByCategory = [];
    foreach($category as $type ) {
        $quantity = count(getProductsByCategory($type['ten_loai']));
        array_push($productsQuantityByCategory, $quantity);
    }

    if (!isset($_POST['ten_loai']) || empty($_POST['ten_loai'])) {
        $products = getAllProducts();
        
    }else {
        $ten_loai = $_POST['ten_loai'];
        $productsByCategory = getProductsByCategory($ten_loai);
    }



?>
    <?php 
        $page_title = "Products";
        include("../dashboard/dash_header.php"); 
    ?>
    <!-- dashboard contents -->
    <div class="container-fluid ">
        
        <div class="row  mt-3 position-relative ">
           <div class="col-lg-3 col-sm col-md-3 mb-1">
               <div class="list-group small shadow-sm">
                   <div class="list-group-item active ">
                        Dữ liệu sản phẩm 
                   </div>
                   
                   <a href="" class="list-group-item link-primary " data-bs-toggle="modal" data-bs-target="#add_employee">Thêm sản phẩm</a>
                   <a href="#" class="list-group-item link-danger fw-bold ">
                       <span>Số sản phẩm :
                       <?php if (!isset($ten_loai)) {
                           echo count($products);
                       }else {
                           echo count($productsByCategory);
                       }?> 
                       </span> 
                   </a>
                   <button type="button" class="btn btn-info text-light border-0" data-bs-toggle="modal" data-bs-target="#chart">
                     Thống kê
                    </button>
               </div>
                <!-- Modal -->
                
                <div class="modal fade" id="chart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thống kê hàng hóa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body chart-container">
                        <div>
                            
                        </div>
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="modal-footer">
                       
                    </div>
                    </div>
                </div>
                </div>

               <div class="mb-3 fw-bold text-center text-danger">
                        <?php

                        if (isset($_SESSION['error']) ) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }

                    ?>  
              </div>
           </div>
           
            
                    

           <div class="col-lg-12 col-md-9  ">
                <div class="col-2 mt-auto mb-2 ">
                    <form method="post" action="./products.php"class="d-flex">
                        <div class="input-group">
                            <select name="ten_loai" class="form-select ">
                                    <option value="">Tất cả</option>
                                <?php foreach ($category as $loai): ?>
                                    <option value="<?=$loai['ten_loai']?>" 
                                    <?php 
                                    if (isset($ten_loai)) {
                                        if($loai['ten_loai'] == $ten_loai) { echo " selected";}
                                    }
                                    ?>
                                
                                    ><?=$loai['ten_loai']?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button class="btn btn-success btn-sm" type="submit" name="search-btn" id="button-addon2"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
               <div class="table-responsive">
                   
                   <form action="./delete_products.php" method="post" id="form_product">
                    <table class="table table-striped table-hover bg-light small shadow-sm table-info overflow-hidden ">
                    <div class="d-flex">
                        <p align="left"><button type="submit" onclick="return confirm('Xác nhận xóa?')" class="btn btn-success btn-fixed me-3" name="multi_delete">Xóa</button></p>
                        <p align="left" class="btn btn-secondary btn-fixed" id="remove-checkAll">Bỏ chọn</p>
                    </div>
                    <?php if(!isset($ten_loai)) { ?> 
                            
                            
                       
                        <tr class="table-dark text-left">
                            <th><input type="checkbox" id="checkAl"> Select All</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Đơn vị</th>
                            <th>Đặc biệt</th>
                            <th>Hình ảnh</th>
                            <th>Loại hàng</th>
                            <th colspan="3" >Công cụ</th>
                        </tr>
    
                        <?php
    
                            for ($i=0; $i < count($products); $i++) {
                        
                        ?>
    
                        <tr class="text-left ">
                            <td width="7%"><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $products[$i]['id']; ?>"></td>
                            <td> <?php echo $products[$i]['ma_sp']; ?></td>
                            <td class="text-uppercase" width="15%"> <?php echo $products[$i]['ten_sp'];  ?></td>
                            <td width="6%"> <?php echo $products[$i]['so_luong'];  ?></td>
                            <td> <?php echo number_format($products[$i]['gia']);  ?> đ</td>
                            <td width="5%"> <?php echo $products[$i]['don_vi'];  ?> </td>
                            <td width="6%"> <?php  $products[$i]['dac_biet'] == 0 ? print"Không" : print"Có";  ?> </td>
                            <td> <img class="product__img-admin" src="../../../<?php echo $products[$i]['img'];  ?>" alt="" width="70px"></td>
                            <td width="10%"> <?php echo $products[$i]['ten_loai'];  ?></td>
        
                            <td width="8%">
                                <a href="./edit_products.php?id=<?php echo $products[$i]['id'];    ?>" class="btn btn-sm w-100 btn-warning text-white">Cập nhật</a></td>
                            <td >
                                <a href="./delete_products.php?id=<?php echo $products[$i]['id'];    ?>" onclick="return confirm('Are you sure want to delete?')" class="btn btn-sm w-100 btn-danger text-white">Xóa</a>
                            </td>
                        </tr>
                        <?php } ?>
                    <?php }elseif(isset($ten_loai)) { ?> 
                        <tr class="table-dark text-left">
                            <th><input type="checkbox" id="checkAl"> Select All</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Đơn vị</th>
                            <th >Mô tả</th>
                            <th>Đặc biệt</th>
                            <th>Hình ảnh</th>
                            <th>Loại hàng</th>
                            <th colspan="3" >Công cụ</th>
                        </tr>
    
                        <?php
    
                            for ($i=0; $i < count($productsByCategory); $i++) {
                        
                        ?>
    
                        <tr class="text-left ">
                            <td width="7%"><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $productsByCategory[$i]['id']; ?>"></td>
                            <td> <?php echo $productsByCategory[$i]['ma_sp']; ?></td>
                            <td class="text-uppercase" width="20%"> <?php echo $productsByCategory[$i]['ten_sp'];  ?></td>
                            <td width="6%"> <?php echo $productsByCategory[$i]['so_luong'];  ?></td>
                            <td> <?php echo number_format($productsByCategory[$i]['gia']);  ?> đ</td>
                            <td width="5%"> <?php echo $productsByCategory[$i]['don_vi'];  ?> </td>
                            <td width="21%"> <?php echo $productsByCategory[$i]['mo_ta'];  ?> </td>
                            <td width=""> <?php  $productsByCategory[$i]['dac_biet'] == 0 ? print"Không" : print"Có";  ?> </td>
                            <td> <img class="product__img-admin" src="../../../<?php echo $productsByCategory[$i]['img'];  ?>" alt="" width="70px"></td>
                            <td width="10%"> <?php echo $productsByCategory[$i]['ten_loai'];  ?></td>
        
                            <td width="8%">
                                <a href="./edit_products.php?id=<?php echo $productsByCategory[$i]['id'];    ?>" class="btn btn-sm w-100 btn-warning text-white">Cập nhật</a></td>
                            <td >
                                <a href="./delete_products.php?id=<?php echo $productsByCategory[$i]['id'];    ?>" onclick="return confirm('Are you sure want to delete?')" class="btn btn-sm w-100 btn-danger text-white">Xóa</a>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        
                        
                    
                    <?php } ?>
                        
                    </table>
                    
                </form>

                
               </div>
           </div>
        </div>
    </div>
    <!-- dashboard contents -->

   
  
    <!-- Add products Modal -->
    <div class="modal fade" id="add_employee" tabindex="-1" aria-labelledby="add_employee" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="./create_products.php" method="post" enctype="multipart/form-data" >

                    <div class="mb-3">
                        <input type="text" name="ma_sp" class="form-control form-control-sm" placeholder="Mã sản phẩm" autocomplete="off" >
                    </div>
                    <div class="mb-3">
                        <input type="text" name="ten_sp" class="form-control form-control-sm" placeholder="Tên sản phẩm" autocomplete="off" >
                    </div>
                    <div class="mb-3">
                        <input type="number" name="so_luong" min="1" max="1000"  class="form-control form-control-sm" placeholder="Số lượng" autocomplete="off" >
                    </div>
                    <div class="mb-3">
                        <input type="number" name="gia" class="form-control form-control-sm" placeholder="Giá tiền" autocomplete="off" >
                    </div>
                    <div class="mb-3">
                        <select name="don_vi" class="form-select ">
                            <option value="" selected disabled >Đơn vị sản phẩm</option>
                            <option value="chiếc"  >Chiếc</option>
                            <option value="cặp"  >Cặp</option>  
                        </select>
                    </div>
                    <div class="mb-3 d-flex ">
                        Đặc biệt
                        <div class="mx-2">
                            <input type="radio" name="dac_biet" value="0" checked>
                            <label class="profile__group-label">Không</label>

                        </div>
                        <div>
                            <input type="radio" name="dac_biet" value="1">
                            <label>Có</label>

                        </div>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label ps-1">Mô tả</label> <br>
                        <textarea name="mo_ta" id="" cols="50" rows="8"></textarea>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label ps-1">Hình ảnh</label>
                        <input type="FILE" name="img" class="form-control form-control-sm"  >
                    </div>
                    <div class="mb-3">
                        <select name="ten_loai" class="form-select">
                            <option value="" selected disabled >Loại hàng</option>
                            <?php foreach($category as $id=>$type): ?>
                                <option value="<?= $type['ten_loai']; ?>"  ><?= $type['ten_loai']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    
                   
                    <div class="mb-3 d-grid">
                        <button type="submit" class="btn btn-sm btn-success">
                            Thêm sản phẩm </button>
                    </div>

                </form>

            </div>
            
        </div>
        </div>
    </div>
    <!-- footer -->
    <?php 
        include("../dashboard/dash_footer.php"); 
    ?>