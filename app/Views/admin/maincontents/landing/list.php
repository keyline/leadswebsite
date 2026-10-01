<div class="pcoded-content">
    <div class="page-header"><div class="page-block"><div class="row align-items-center"><div class="col-md-12">
        <div class="page-header-title"><h5 class="m-b-10">Landing Page Enquiries</h5></div>
        <ul class="breadcrumb"><li class="breadcrumb-item"><a href="<?= site_url('Dashboard') ?>"><i class="feather icon-home"></i></a></li><li class="breadcrumb-item">Enquiry Manage</li><li class="breadcrumb-item">Landing Page</li></ul>
    </div></div></div></div>
    <div class="row"><div class="col-sm-12"><div class="card">
        <div class="card-header"><a href="<?= site_url('admin/landing-page/export') ?>" class="btn btn-success">Export CSV</a><a href="<?= site_url('landing') ?>" target="_blank" rel="noopener" class="btn btn-outline-primary ml-2">View Landing Page</a></div>
        <div class="card-body"><div class="dt-responsive table-responsive">
            <table id="simpletable" class="table table-striped table-bordered nowrap">
                <thead><tr><th>#</th><th>Full name</th><th>Mobile number</th><th>City / district</th><th>Business type</th><th>Interested in</th><th>Enquiry date</th></tr></thead>
                <tbody><?php foreach ($rows as $row): ?><tr>
                    <td><?= (int) $row->id ?></td><td><?= esc($row->full_name) ?></td><td><?= esc($row->mobile) ?></td><td><?= esc($row->city) ?></td><td><?= esc($row->business_type) ?></td><td><?= esc($row->interested_in) ?></td><td><?= esc($row->created_at) ?></td>
                </tr><?php endforeach; ?></tbody>
            </table>
        </div></div>
    </div></div></div>
</div>
