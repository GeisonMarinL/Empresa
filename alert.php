<?php
if (isset($_SESSION['success'])) {
?>
    <div class="col-md-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
?>
    <div class="col-md-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['error']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php
    unset($_SESSION['error']);
}
?>