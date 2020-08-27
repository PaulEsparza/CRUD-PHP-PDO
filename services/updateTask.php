<?php
include('../database/conection.php');
include('../layout/header.php');
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM $table WHERE id = ?";
    $ps = $conection->prepare($query);
    $ps->execute([$id]);
    $res = $ps->fetch(PDO::FETCH_OBJ);
    //print_r($res);
    foreach ($res as $row) { ?>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Update Task</h3>
                        </div>
                        <div class="card-body">
                            <form action="management.php?id=<?php echo $row->id; ?>" method="POST">
                                <div class="form-group">
                                    <label for="id">ID</label>
                                    <input type="number" name="id" id="id" class="form-control" placeholder="ID task" value="<?php echo $row->id; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="r">Responsable</label>
                                    <input type="text" name="responsable" id="r" class="form-control" placeholder="Responsable" value="<?php echo $row->responsable; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="d">Description</label>
                                    <input type="text" name="description" id="d" class="form-control" placeholder="Description" value="<?php echo $row->description; ?>">
                                </div>
                                <div class="card-footer">
                                    <div class="form-group">
                                        <button type="submit" name="updateTask" class="form-control btn btn-block btn-success">Save Task</button>
                                        <a href="/CRUD_PHP_Mysqli/index.php" class="btn btn-block btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>

<?php
    }
}
?>

<?php
include('../layout/footer.php');
?>