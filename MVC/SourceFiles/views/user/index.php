<h1>
    Users
</h1>
<form method="POST" action="<?php echo URL;?>user/Create">
    <h3>Create New User</h3>
    <table >
        <tr>
            <td> <label for="login_name">Enter login name</label></td>
            <td> <input type="text" name="login_name"/></td>
        </tr>
        <tr>
            <td> <label for="password">Enter Password</label></td>
            <td> <input type="text" name="user_password" /></td>
        </tr>
        <tr>
            <td><label for="role">Select Role</label></td>
            <td>
                <select name="role" >
                <option value="" >Select Role</option>
                <option value="admin">Admin</option>
                <option value="patient">Patient</option>
                <option value="visitor">Visitor</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center"><input type="submit" value="Save"/></td>
        </tr>
    </table>  
</form>
<hr/>
<table class="output" cellspacing="0">
<?php
foreach ($this->userList as $row => $col): ?>
    <tr>
        <td><?php echo $col['user_id'];?></td>
        <td><?php echo $col['login'];?></td>
        <td><?php echo $col['role'];?></td>
        <td><a href="<?php echo URL;?>user/edit/<?php echo $col['user_id'];?>" class="user_link">Edit</a></td>
        <td><a href="<?php echo URL;?>user/delete/<?php echo $col['user_id'];?>" class="user_link">Delete</a></td>
    </tr>
   
<!--<?php //print_r($this->userList);?>-->
<?php endforeach; ?>
</table>