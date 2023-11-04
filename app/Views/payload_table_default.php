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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // JS Untuk Replace Element #myTables, Mengambil data html dari data(link)
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