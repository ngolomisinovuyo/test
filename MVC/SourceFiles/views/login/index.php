
<!--<?php //echo $this->msg;?>-->
<h1>Login</h1>
<form action ="login/run" method="post">    
    <table border="0" cellspacing="0" cellpadding="5">
        <tr>
            <td>
                <label for="login_name" > User name</label> 
            </td>
            <td>
                <input type="text" name="login_name"/>
            </td>
        </tr>

         <tr>
            <td>
                <label for="login_password">Password</label>
            </td>
            <td>
               <input type="password" name="login_password"/><br/>
            </td>
        </tr>
        <tr >
            <td colspan="2" align="center">
                <input type="submit" value="Login"/>
            </td>
        </tr>


    </table>
</form> 
