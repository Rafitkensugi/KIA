    <!DOCTYPE html>
    <html>
    <head>
        <title>Edit Immunization</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    <body class="p-4">

    <div class="container-fluid px-4">

        <h3 class="mt-4 mb-4">Edit Immunization</h3>

        <div class="card shadow-sm rounded-4">
            <div class="card-header bg-warning text-white rounded-top-4">
                <h5 class="mb-0">Edit Immunization #<?= $detail->immun_id ?></h5>
            </div>

            <div class="card-body p-4">

                <form action="<?= site_url('immunizations/edit/'.$detail->immun_id) ?>" method="post">

                    <div class="mb-3">
                        <label class="form-label">Child ID</label>
                        <input type="number" name="child_id" 
                            class="form-control" 
                            value="<?= $detail->child_id ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Record ID</label>
                        <input type="number" name="record_id" 
                            class="form-control" 
                            value="<?= $detail->record_id ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Vaccine Name</label>
                        <input type="text" name="vaccine_name" 
                            class="form-control" 
                            value="<?= $detail->vaccine_name ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Vaccine Batch</label>
                        <input type="text" name="vaccine_batch" 
                            class="form-control" 
                            value="<?= $detail->vaccine_batch ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Immunization Date</label>
                        <input type="date" name="immunization_date" 
                            class="form-control" 
                            value="<?= $detail->immunization_date ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Next Schedule</label>
                        <input type="date" name="next_schedule" 
                            class="form-control" 
                            value="<?= $detail->next_schedule ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Effects</label>
                        <textarea name="effects" class="form-control" rows="3"><?= $detail->effects ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= site_url('immunizations') ?>" class="btn btn-secondary">Cancel</a>

                </form>

            </div>
        </div>

    </div>

    </body>
    </html>
