<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap4.min.css">

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 ">
            <div class="card my-5" id="myTables">
                <div class="card-header d-flex justify-content-between">
                    <h4>Payload Data</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Kabupaten</th>
                                    <th>Payload</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($payload as $item) : ?>
                                    <tr>
                                        <td><?= $item['date']; ?></td>
                                        <td><a data-link="<?= base_url('payload/kabupaten/' . $item['kabupaten']); ?>" class="detail-link" style="cursor:pointer;"><?= $item['kabupaten']; ?></a></td>
                                        <td><?= $item['total_payload']; ?></td>
                                        <!-- Tambahkan kolom lain sesuai dengan struktur tabel Anda -->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('.detail-link').click(function(e) {
                            e.preventDefault();
                            var url = $(this).data('link');
                            $.get(url, function(data) {
                                $('#myTables').html(data);
                            });
                        });
                    });
                </script>
            </div>

        </div>
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<script>
    $('#myTable').DataTable();
</script>
<?= $this->endSection(); ?>