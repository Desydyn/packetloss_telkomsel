    <div class="card-header d-flex justify-content-between">
        <h4>Payload Data</h4>
        <a id="back-button" class="btn btn-primary detail-link" data-link="<?= base_url('payload/default') ?>">Kembali</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Kecamatan</th>
                        <th>Payload</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($payload as $item) : ?>
                        <tr>
                            <td><?= $item['date']; ?></td>
                            <td><a data-link="<?= base_url('payload/kecamatan/' . $item['kecamatan']); ?>" class="detail-link" style="cursor:pointer;"><?= $item['kecamatan']; ?></a></td>
                            <td><?= $item['payload']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // JS Untuk Replace Element #myTables, Mengambil data html dari data(link)
            $('.detail-link').click(function(e) {
                e.preventDefault();
                var url = $(this).data('link');
                $.get(url, function(data) {
                    $('#myTables').html(data);
                });
            });
        });
    </script>