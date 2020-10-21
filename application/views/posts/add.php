<!DOCTYPE html>
<html lang="en">  
<head>
<title>Generate SEO Friendly URL in CodeIgniter</title>
</head>
<body>
<div class="container">
    <h1>Add Post</h1>
    <div class="row">
        <?php echo !empty($success_msg)?'<p>'.$success_msg.'</p>':''; ?>
        <?php echo !empty($error_msg)?'<p>'.$error_msg.'</p>':''; ?>
        <form method="post">
            <p>Post Title: <input type="text" name="title" value="<?php echo !empty($post['title'])?$post['title']:''; ?>"></p>
            <?php echo form_error('title','<p class="help-block error">','</p>'); ?>

            <p>Post Content: <textarea name="content"><?php echo !empty($post['content'])?$post['content']:''; ?></textarea></p>
            <?php echo form_error('content','<p class="help-block error">','</p>'); ?>
            
            <input type="submit" name="submitBtn" value="Add">
        </form>
    </div>
</div>
</body>
</html>
