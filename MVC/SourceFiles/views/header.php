
<html>
    <head>
        <title><?= (isset($this->title)) ? $this->title :'MVC';?></title>
        <link rel="stylesheet" href="<?php echo URL;?>public/css/main"/>
        <script src="<?php echo URL;?>public/js/jquery.js" type="text/javascript">
        </script>
         <script src="<?php echo URL;?>public/js/custom.js" type="text/javascript"></script>
        <?php 
        if(isset($this->js))
        {
            foreach ($this->js as $js) 
            {
                 echo '<script src="'.URL.'views/'.$js.'" type="text/javascript"></script>';
            }
           
        }
        ?>
    </head>
    <body>
        <div id="header">
            <!--header-->
            <br/>
            <?php Session::init(); ?>
            <?php if(Session::get('logged_in')==FALSE): ?>
            <a href="<?php echo URL;?>home">Home</a>
            <a href="<?php echo URL;?>help">Help</a>
            <?php endif; ?>
            <?php if(Session::get('logged_in')==TRUE): ?>
                <a href="<?php echo URL;?>dashboard">Dashboard</a>
                 <a href="<?php echo URL;?>note">Notes</a>
                <?php if(Session::get('role')=='owner'):?>
                    <a href="<?php echo URL;?>user">Users</a>
                <?php endif;?>
                <a href="<?php echo URL;?>dashboard/logout">Logout</a>
            <?php else: ?>
            <a href="<?php echo URL;?>login">Login</a>
            <?php endif; ?>
        </div>
        <div id="content">

