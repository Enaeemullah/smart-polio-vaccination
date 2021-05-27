<h6 class="text-danger">
    <?php
        if(isset($_SESSION['info']))
        {
            echo $_SESSION['info'];
            unset($_SESSION['info']);
        }
    ?>
</h6>