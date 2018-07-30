

<h1>
   Notes
</h1>
<form method="POST" action="<?php echo URL;?>note/Create">
    <h3>Add New Note</h3>
    <table>
        <tr>
            <td> <label for="title">Enter Note Title</label></td>
            <td> <input type="text" name="title"/></td>
        </tr>
        <tr>
            <td> <label for="content">Enter Note Content</label></td>
            <td> 
                <input type="text" name="content"/>
                    
               
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
foreach ($this->noteList as $row => $col): ?>
    <tr>
  <td><?php echo $col['note_id'];?></td>
        <td><?php echo $col['user_id'];?></td>
        <td><?php echo $col['title'];?></td>
        <td><?php echo $col['content'];?></td>
        <td><?php echo $col['date_added'];?></td>
        <td><a href="<?php echo URL;?>note/edit/<?php echo $col['note_id'];?>" class="user_link">Edit</a></td>
        <td><a id="del" href="<?php echo URL;?>note/delete/<?php echo $col['note_id'];?>" class="user_link">Delete</a></td>
    </tr>
   
<!--<?php //print_r($this->userList);?>-->
<?php endforeach; ?>
</table>

<script>
    $(document).on('click','#del',function(e){
        //e.preventDefault();
        var c = confirm('Are you sure you want to delete this note?');
        if(c===false)
        {
            return false;
        }
    });
</script>
