<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">

            <a href="https://web.facebook.com/jourdan24/" target="_blank"><img alt="Facebook" border="0" height="30" src="<?= base_url('assets/img/logo_fb.png'); ?>" title="Find Us on Facebook" /></a>&nbsp;
            <a href="https://twitter.com/" target="_blank"><img alt="Twitter" border="0" height="30" src="<?= base_url('assets/img/logo_twitter.png'); ?>" title="Follow Us On Twitter" /></a>&nbsp;
            <a href="https://www.instagram.com/" target="_blank"><img alt="Instagram" border="0" height="30" src="<?= base_url('assets/img/instagram.png'); ?>" title="Follow Us On Instagram" /></a>&nbsp;

            <a href="https://www.youtube.com/channel/UClKegtSzxu6LRbMjexakbaQ" target="_blank"><img alt="Youtube" border="0" height="30" src="<?= base_url('assets/img/youtube.png'); ?>" title="Follow Us On Youtube" /></a>
            <hr style="border: 0;">
            <span>Copyright &copy; Kelompok 1 | 19.3B.04 | UBSI Cut Mutia 2021</span>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Yakin Keluar?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->

<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url(''); ?>assets/js/bootstrap-datepicker.min.js"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });


    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/akses-role/'); ?>" + roleId;
            }
        });
    });
    $(document).ready(function() {
        $("#table-datatable").dataTable();
    });
    $('.alert-message').alert().delay(3500).slideUp('slow');

    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>


</body>



</html>