<!DOCTYPE html>
<html>
<head>
  <title>Add Medical Record</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

  <div class="container">
    <h3 class="mb-3">Add New Medical Record</h3>

   <form method="post" action="<?= site_url('medical/records/store'); ?>">

      
      <div class="mb-3">
        <label>Registration ID</label>
        <input type="number" name="reg_id" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Height (cm)</label>
        <input type="number" name="height" class="form-control">
      </div>

      <div class="mb-3">
        <label>Weight (kg)</label>
        <input type="number" name="weight" class="form-control">
      </div>

      <div class="mb-3">
        <label>Blood Pressure</label>
        <input type="text" name="blood_pressure" class="form-control">
      </div>

      <div class="mb-3">
        <label>Pulse</label>
        <input type="number" name="pulse" class="form-control">
      </div>

      <div class="mb-3">
        <label>Temperature (°C)</label>
        <input type="number" step="0.1" name="temperature" class="form-control">
      </div>

      <div class="mb-3">
        <label>Symptoms</label>
        <textarea name="symptoms" class="form-control"></textarea>
      </div>

      <div class="mb-3">
        <label>Notes</label>
        <textarea name="notes" class="form-control"></textarea>
      </div>

      <button class="btn btn-primary">Save</button>
    </form>

  </div>

</body>
</html>
