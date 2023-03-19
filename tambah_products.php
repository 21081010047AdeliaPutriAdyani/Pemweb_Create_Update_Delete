<?php 
    include ('koneksi.php');

    $status = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productCode= $_POST['productCode'];
        $productName = $_POST['productName'];
        $productLine = $_POST['productLine'];
        $productScale = $_POST['productScale'];
        $productVendor = $_POST['productVendor'];
        $productDescription = $_POST['productDescription'];
        $quantityInStock = $_POST['quantityInStock'];
        $buyPrice = $_POST['buyPrice'];
        $MSRP = $_POST['MSRP'];
        //query SQL
        $query = "INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) 
        VALUES('$productCode', '$productName', '$productLine', '$productScale', '$productVendor', '$productDescription', '$quantityInStock', '$buyPrice', '$MSRP')"; 
  
        //eksekusi query
        $result = mysqli_query(connection(),$query);
        if ($result) {
          $status = 'ok';
        }
        else{
          $status = 'err';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>products</title>
</head>
<body>
    <div class = "container" >
        <h2 align="center">DATA PRODUCTS</h2>
            <table style="width:100%" cellspacing="0">
                <tr class="atas">
                  <td class="dua">
                        <center>    
                            <a class="nav-link" href="<?php echo "customer.php"; ?>"><b>data customer</b></a>
                        </center>    
                    </td>

                    <td class="tiga">
                        <center>    
                            <a class="nav-link" href="<?php echo "product.php"; ?>"><b>data product</b></a>
                        </center>    
                    </td>
                </tr>

                <tr class="tengah">
                    <td colspan="1">
                      
                    </td>
                    <td>
                        <center>    
                            <a class="nav-link" href="<?php echo "tambah_products.php"; ?>"><b>Menambah Data</b></a>
                        </center>
                    </td>
                </tr>

                <tr class="akhir">
                    <td colspan="3">
                      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                        <?php 
                          if ($status=='ok') {
                            echo '<br><br><div class="alert alert-success" role="alert">Data products berhasil disimpan</div>';
                          }
                          elseif($status=='err'){
                            echo '<br><br><div class="alert alert-danger" role="alert">Data products gagal disimpan</div>';
                          }
                        ?>
                
                      <h2 style="margin: 30px 0 30px 0;">Form products</h2>
                      <form action="tambah_products.php" method="POST">
                      <div class="form-group">
                        <label>productCode</label>
                        <input type="text" class="form-control" placeholder="productCode" name="productCode" required="required">
                      </div>
                      <div class="form-group">
                        <label>productName</label>
                        <input type="text" class="form-control" placeholder="productName" name="productName" required="required">
                      </div>
                      <div class="form-group">
                        <label>productLine</label>
                        <input type="text" class="form-control" placeholder="productLine" name="productLine" required="required">
                      </div>
                      <div class="form-group">
                        <label>productScale</label>
                        <input type="text" class="form-control" placeholder="productScale" name="productScale" required="required">
                      </div>
                      <div class="form-group">
                        <label>productVendor</label>
                        <input type="text" class="form-control" placeholder="productVendor" name="productVendor" require="require">
                      <div class="form-group">
                        <label>productDescription</label>
                        <input type="text" class="form-control" placeholder="productDescription" name="productDescription" required="required">
                      </div>
                      <div class="form-group">
                        <label>quantityInStock</label>
                        <input type="text" class="form-control" placeholder="quantityInStock" name="quantityInStock" required="required">
                      </div>
                      <div class="form-group">
                        <label>buyPrice</label>
                        <input type="text" class="form-control" placeholder="buyPrice" name="buyPrice" required="required">
                      </div>
                      <div class="form-group">
                        <label>MSRP</label>
                        <input type="text" class="form-control" placeholder="MSRP" name="MSRP" required="required">
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                  </main>
                    </td>
                </tr>
            </table>
    </div>
</body>
</html>