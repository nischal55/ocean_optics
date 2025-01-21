<?php
session_start();
if (!isset($_SESSION['login_status'])) {
    header('location:Login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Products</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('inc/Navbar.php') ?>

        <?php include('inc/Sidebar.php') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">

                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Products</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Add Product
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="Backend/ProductAddApi.php" method="post" enctype="multipart/form-data">
                                                    <label for="">Product Title:</label><br>
                                                    <input type="text" name="product_title" id="" class="col-12"><br>
                                                    <label for="">Product Category:</label><br>
                                                    <select class="col-12" style="height: 2rem;" name="product_category">
                                                        <?php
                                                        include('Config/db.php');
                                                        $sql = "Select * from product_category";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_assoc($query)) {
                                                            $category_id = $row['id'];
                                                            $category_name = $row['Category_name'];
                                                        ?>
                                                            <option value="<?php echo ($category_id) ?>"><?php echo ($category_name) ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select><br>
                                                    <label for="">Product Price:</label><br>
                                                    <input type="text" name="price" id="" class="col-12"><br>
                                                    <label for="">Product Quantity:</label><br>
                                                    <input type="text" name="quantity" id="" class="col-12"><br>
                                                    <label for="">Product Description:</label><br>
                                                    <textarea name="editorContent" id="editor"></textarea> <br>
                                                    <input type="checkbox" name="isFeatured" value="1" id="">
                                                    <label for="">Is Featured?</label><br>
                                                    <label for="">Product Images:</label><br>
                                                    <input type="file" name="product_image_one" id="file"><br><br>
                                                    <input type="file" name="product_image_two" id="file"><br><br>
                                                    <input type="file" name="product_image_three" id="file">
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </ol>

                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Table with Projects Data</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body overflow-y-scroll" style="height: 26rem;">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Product Image</th>
                                <th>Product Title</th>
                                <th>Product Category</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('Config/db.php');
                            $sql = "Select product_title,Category_name,quantity,product_price,product_image_one, product_details.id from product_details join product_category on product_details.product_category = product_category.id";
                            $query = mysqli_query($conn, $sql);
                            $count = 0;
                            while ($row = mysqli_fetch_assoc($query)) {
                                $count++;
                                $id = $row['id'];
                                $product_title = $row['product_title'];
                                $product_category = $row['Category_name'];
                                $product_price = $row['product_price'];
                                $product_quantity = $row['quantity'];
                                $product_image_one = $row['product_image_one'];
                            ?>
                                <tr>
                                    <td><?php echo ($count) ?></td>
                                    <td><img src="Backend/<?php echo ($product_image_one) ?>" alt="" width="100"></td>
                                    <td><?php echo ($product_title) ?></td>
                                    <td><?php echo ($product_category) ?></td>
                                    <td><?php echo ($product_quantity) ?></td>
                                    <td><?php echo ($product_price) ?></td>
                                    <td>
                                        <a href="editProducts.php?product_id=<?php echo ($id) ?>" class="btn btn-primary px-4">Edit</a><br>
                                        <a href="Backend/DeleteProductApi.php?product_id=<?php echo ($id) ?>" onclick="return confirm('Are you confirm to delete?')" class="btn btn-danger mt-2 px-3">Delete</a>
                                    </td>

                                </tr>
                            <?php
                            }

                            ?>

                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include("inc/Footer.php") ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <script src="test.js"></script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- CKEditor Script (CDN) -->
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            .catch(error => {
                console.error('Error initializing CKEditor:', error);
            });
    </script>

    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>