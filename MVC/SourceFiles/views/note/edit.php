
<form method="POST" action="<?php echo URL;?>note/editSave/<?php echo $this->note['note_id'];?>">
    <h3>Edit Note</h3>
    <table>
        <table>
        <tr>
            <td> <label for="title">Edit Note Title</label></td>
            <td> <input type="text" name="title"value="<?php echo $this->note['title'];?>"/></td>
        </tr>
        <tr>
            <td> <label for="content">Edit Note Content</label></td>
            <td> 
               
                <textarea name="content" rows="5" cols="55" style="text-align: left;">
                    <?php echo $this->note['content'];?>
                </textarea>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center"><input type="submit" value="Save"/></td>
        </tr>
    </table>  
    </table>  
</form>
