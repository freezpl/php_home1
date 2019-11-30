<div class="container">
<h2>Profile</h2>

<table class="table">
    <thead>
        <th></th>
        <th>Value</th>
    </thead>
    <tbody>
        <tr>
        <td>Name</td>
        <td><?php echo $this->data['user']->name; ?></td>
        </tr>
        <tr>
        <td>Email</td>
        <td><?php echo $this->data['user']->email; ?></td>
        </tr>
        <td>Age</td>
        <td><?php echo $this->data['user']->age; ?></td>
        </tr>
        <td>Token</td>
        <td><?php echo $this->data['user']->token; ?></td>
        </tr>
    </tbody>
</table>

</div>