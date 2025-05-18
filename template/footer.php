<footer class="bg-dark text-white text-center py-3">
    <div class="container">
        <p class="mb-0">© <?= date('Y') ?> Sistem Pemeliharaan Komputer. All rights reserved.</p>
        <p>Developed by [Nama Anda]</p>
    </div>
</footer>

<script src="assets/bootstrap.bundle.min.js"></script> <!-- Link ke file JS Bootstrap -->
<!-- Masukkan script DataTables dan Bootstrap 5 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<!-- Aktifkan DataTables -->
<script>
    $(document).ready(function() {
        $('#TableIndex').DataTable({
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Tidak ada data yang tersedia",
                infoFiltered: "(difilter dari _MAX_ total data)",
                zeroRecords: "Tidak ada data yang sesuai",
                paginate: {
                    first: "Awal",
                    last: "Akhir",
                    next: ">",
                    previous: "<"
                }
            }
        });
    });
</script>
</body>
</html>