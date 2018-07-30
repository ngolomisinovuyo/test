

<form method="POST" action="<?php echo URL;?>user/editSave/<?php echo $this->user['user_id'];?>">
    <h3>Edit User</h3>
    <table>
        <tr>
            <td> <label for="login_name">Edit login name</label></td>
            <td> <input type="text" name="login_name" value="<?php echo $this->user['login'];?>"/></td>
        </tr>
        <tr>
            <td> <label for="password">Edit Password</label></td>
            <td> <input type="text" name="user_password" value="<?php echo $this->user['password'];?>" /></td>
        </tr>
        <tr>
            <td><label for="role">Select Role</label></td>
            <td>
                <select name="role" >
                <option value="" >Select Role</option>
                <option value="admin" <?php if($this->user['role'] == 'admin') echo 'selected';?>>Admin</option>
                <option value="patient"<?php if($this->user['role'] == 'patient') echo 'selected';?>>Patient</option>
                <option value="visitor"<?php if($this->user['role'] == 'visitor') echo 'selected';?>>Visitor</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center"><input type="submit" value="Save"/></td>
        </tr>
    </table>  
</form>
