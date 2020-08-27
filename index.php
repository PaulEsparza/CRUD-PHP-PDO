<?php
include('database/conection.php');
include('layout/header.php');
?>

<div class="container mt-3">
    <div class="container mt-2">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php session_unset();
        } ?>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#taskModal">New Task</a>
    </div>
    <table class="table table-hover mt-4">
        <tr>
            <td>ID</td>
            <td>Responsable</td>
            <td>Description</td>
            <td>Actions</td>
        </tr>
        <?php
        $query = "SELECT * FROM $table;";
        $ps = $conection->query($query);
        $res = $ps->fetchAll(PDO::FETCH_OBJ);
        print_r($res);
        foreach ($res as $row) {
        ?>
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->responsable; ?></td>
                <td><?php echo $row->description; ?></td>
                <td>
                    <div class="mb-2">
                        <form action="services/updateTask.php?id=<?php echo $row->id; ?>" method="post">
                            <button type="submit" name="getTask" class="form-control btn btn-block btn-warning">Edit Task</button>
                        </form>
                    </div>
                    <div>
                        <form action="services/management.php?id=<?php echo $row->id; ?>" method="post">
                            <button type="submit" name="deleteTask" class="form-control btn btn-block btn-danger">Delete Task</button>
                        </form>
                    </div>
                </td>
            </tr>

        <?php } ?>
    </table>

</div>

<!-- Modal -->
<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="services/management.php" method="POST">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="number" name="id" id="id" class="form-control" placeholder="ID task" readonly>
                    </div>
                    <div class="form-group">
                        <label for="r">Responsable</label>
                        <input type="text" name="responsable" id="r" class="form-control" placeholder="Responsable">
                    </div>
                    <div class="form-group">
                        <label for="d">Description</label>
                        <input type="text" name="description" id="d" class="form-control" placeholder="Description">
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button type="submit" name="saveTask" class="form-control btn btn-block btn-success">Save Task</button>
                            <button type="button" class="form-control btn btn-block btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('layout/footer.php');
?>