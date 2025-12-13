<!DOCTYPE html>
<html>
<head>
  <title>Add Immunization</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

  <div class="container">
    <h3 class="mb-3">Add New Immunization</h3>

    <form method="post" action="<?= site_url('immunizations/add'); ?>">

      <div class="mb-3">
        <label>Child ID</label>
        <input type="number" name="child_id" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Record ID</label>
        <input type="number" name="record_id" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Vaccine Name</label>
        <input type="text" name="vaccine_name" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Vaccine Batch</label>
        <input type="text" name="vaccine_batch" class="form-control">
      </div>

      <div class="mb-3">
        <label>Immunization Date</label>
        <input type="date" name="immunization_date" class="form-control">
      </div>

      <div class="mb-3">
        <label>Next Schedule</label>
        <input type="date" name="next_schedule" class="form-control">
      </div>

      <div class="mb-3">
        <label>Effects</label>
        <textarea name="effects" class="form-control"></textarea>
      </div>

      <button class="btn btn-primary">Save</button>
    </form>

  </div>

</body>
</html>
