</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>PHẠM ĐÌNH PHONG &copy; KHOA CNTT TRƯỜNG ĐIỆN LỰC</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="http://localhost/webivymoda1/public/vendor/jquery/jquery.min.js"></script>
<script src="http://localhost/webivymoda1/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="http://localhost/webivymoda1/public/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="http://localhost/webivymoda1/public/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="http://localhost/webivymoda1/public/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="http://localhost/webivymoda1/public/js/demo/chart-area-demo.js"></script>
<script src="http://localhost/webivymoda1/public/js/demo/chart-pie-demo.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script>
$(document).ready(function() {
    $("#check-all").click(function() {
        $(":checkbox").prop("checked", true);
    });
    $("#clear-all").click(function() {
        $(":checkbox").prop("checked", false);
    });
    $("#btn-delete").click(function() {
        if ($(":checked").length === 0) {
            alert("Vui lòng chọn ít nhất một mục!");
            return false;
        }
    });
});
</script>
</body>