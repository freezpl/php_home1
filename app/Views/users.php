<div class="container">
<h2>Users</h2>
<table class="table">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Age</th>
    </thead>
    <tbody>
        <?php 
            foreach ($this->data['users'] as $key => $u) {
              echo "<tr><td>".$key."</td><td>".$u['name']."</td><td>".$u['age']."</td></tr>";
            }  
        ?>
    </tbody>
</table>
</div>