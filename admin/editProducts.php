<?php
include('Config/db.php');
$product_id = $_GET['product_id'];
$sql = "SELECT * FROM product_details where id = '$product_id'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);

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
        <div class="content-wrapper" style="height:80vh;overflow-y: scroll;">
            <div class="mx-auto" style="width: 50rem;">
                <h2 class="text-center">Edit Products</h2>
                <form action="Backend/EditProductApi.php" method="post" enctype="multipart/form-data">
                    <label for="">Product Title:</label><br>
                    <input type="text" name="product_title" value="<?php echo ($result['product_title']) ?>" id="" class="col-12"><br>
                    <label for="">Product Category:</label><br>
                    <select class="col-12" style="height: 2rem;" name="product_category" value="<?php echo ($result['product_category']) ?>">
                        <?php
                        include('Config/db.php');
                        $sql = "Select * from product_category";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                            $category_id = $row['id'];
                            $category_name = $row['Category_name'];
                        ?>
                            <option value="<?php echo ($category_id) ?>" <?php echo $category_id==$result['product_category']?'selected':'' ?>><?php echo ($category_name) ?></option>
                        <?php
                        }
                        ?>
                    </select><br>
                    <label for="">Product Price:</label><br>
                    <input type="text" name="price" id="" class="col-12" value="<?php echo($result['product_price']) ?>"><br>
                    <label for="">Product Quantity:</label><br>
                    <input type="text" name="quantity" id="" value="<?php echo($result['quantity']) ?>" class="col-12"><br>
                    <label for="">Product Description:</label><br>
                    <textarea name="editorContent" id="editor"><?php echo($result['description']) ?></textarea> <br>
                    <input type="checkbox" name="isFeatured"  id="" <?php echo $result['isfeatured'] ? 'checked' : ''; ?>>
                    <label for="">Is Featured?</label><br>
                    <input type="text" value="<?php echo($result['id']) ?>" name="id" hidden>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

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