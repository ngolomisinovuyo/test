<?php

require '../libs/Form.php';
require '../config.php';
require '../libs/Database.php';
if(isset($_REQUEST['run']))
{
    $form = new Form();
    try
    {
        $form   ->post('name')
               
                ->post('age')
               
                ->post('gender')
                ->submit();
        echo 'The form passed';
        $data = $form->fetch();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        $db = new Database(DB_TYPE,DB_HOST,DB_NAME,DB_USER,DB_PASSWORD);
        $db->insert('person', $data);
    } 
    catch (Exception $ex) 
    {
        echo $ex->getMessage();
    }

} 


?>
<form method="POST" action="?run">
  
    <table>
        <tr>
            <td> <label for="name">Enter Person name</label></td>
            <td> <input type="text" name="name"/></td>
        </tr>
        <tr>
            <td> <label for="age">Enter Person age</label></td>
            <td> <input type="text" name="age" /></td>
        </tr>
        <tr>
            <td><label for="gender">Select Person gender</label></td>
            <td>
                <select name="gender" >
          
                <option value="male">Male</option>
                <option value="female">Female</option>
               
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center"><input type="submit" value="Save"/></td>
        </tr>
    </table>  
</form>