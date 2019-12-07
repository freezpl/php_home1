<?
if ($this->data != null) {
    $users =  $this->data['users'];
    $currPage = (int)$this->data['currPage'];
    $onPage = (int)$this->data['onPage'];
    $pages = (int)$this->data['pages'];
    $search = $this->data['search'];  
}
?>

<div class="container">
    <div class="row">
        <form action="users?page=1&onPage=<?php echo $onPage?>&search=<?php echo $search?>" id="paginationForm" method="get" class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="<?php echo $search ?>" />
                <button type="submit" class="btn btn-success">Find users</button>
            </div>

            <div class="form-group">
                <label for="res_count">Results on page</label>
                <input type="number" class="form-control" name="res_count" id="res_count" value=<?php echo $onPage ?> min=1 />
            </div>
        </form>
    </div>

    <h2>Users</h2>
    <table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Age</th>
        </thead>
        <tbody>
            <?php
            foreach ($users as $key => $u) {
                echo "<tr><td>" . ($key + 1) . "</td><td>" . $u['name'] . "</td><td>" . $u['age'] . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="row">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item <?php if($currPage == 1) echo "disabled" ?>">
                    <a class="page-link" href="users?page=<?php echo $currPage - 1?>&onPage=<?php echo $onPage?>&search=<?php echo $search?>" tabindex="-1">Previous</a>
                </li>
                <?php for($p=1; $p <= $pages; $p++):?>
                    <li class="page-item <?php if($p == (int)$currPage) echo "active" ?>">
                        <a class="page-link" href="users?page=<?php echo $p?>&onPage=<?php echo $onPage?>&search=<?php echo $search?>"><?php echo $p ?><span class="sr-only">(current)</span></a>
                    </li>
                <?php endfor; ?>
                
                <li class="page-item <?php if($currPage == $pages) echo"disabled" ?>">
                    <a class="page-link" href="users?page=<?php echo $currPage + 1?>&onPage=<?php echo $onPage?>&search=<?php echo $search?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>