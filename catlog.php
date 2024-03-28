<div class="cate" id="categories">
    <h2>Categories</h2>

    <?php

        $query = "SELECT * FROM categories limit 6";

    $data = mysqli_query($conn, $query);

    $total = mysqli_num_rows($data);
    if ($total != 0) {
        while ($res = mysqli_fetch_assoc($data)) {
    ?>
            <hr />
            <a href="./blog.php?cid=<?= $res['id'] ?>" >
                <div class="cat_link_box">
                    <i class="fa-solid fa-tag"></i>
                    <p><?= $res['category'] ?></p>
                </div>
            </a>
            <hr />
    <?php
        }
    }
    ?>
</div>
