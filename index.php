<?php

    $con=mysqli_connect('localhost','root','','userdata');
    
    $sql="SELECT * FROM like_dislike";
    $res=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Like Dislike Script</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            .container {
                width: 60%;
            }
            .container h1 {
                text-align: center;
            }
            .title h3 {
                margin-top: 15px;
            }
            .main_box {
                margin-top: 30px;
                border: 1px solid #98A1A4;
                padding: 2%;
            }
        </style>
    </head>
    <body>
        <div class="container">
           <h1>Like Dislike Script</h1>
           
            <?php while($row=mysqli_fetch_assoc($res)){?>
                <div class="row main_box">
                    <div class="col-sm-6 title">
                        <h3><?php echo $row['post']?></h3>
                    </div>
                    <div class="col-sm-3">
                        <a href="javascript:void(0)" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-thumbs-up" onclick="like_update('<?php echo $row['id']?>')"> Like (<span id="like_loop_<?php echo $row['id']?>"><?php echo $row['like_count']?></span>)</span>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="javascript:void(0)" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-thumbs-down" onclick="dislike_update('<?php echo $row['id']?>')"> Dislike (<span id="dislike_loop_<?php echo $row['id']?>"><?php echo $row['dislike_count']?></span>)</span>
                        </a>
                    </div>
                </div>
            <?php } ?>
            
        </div>
        
        <script>
            
            function like_update(id){
                $.ajax({
                    url:'update_count.php',
                    type:'post',
                    data:'type=like&id='+id,
                    success:function(result){
                        var cur_count=$('#like_loop_'+id).html();
                        cur_count++;
                        $('#like_loop_'+id).html(cur_count);
                    }
                });
            }
            
            function dislike_update(id){
                $.ajax({
                    url:'update_count.php',
                    type:'post',
                    data:'type=dislike&id='+id,
                    success:function(result){
                        var cur_count=$('#dislike_loop_'+id).html();
                        cur_count++;
                        $('#dislike_loop_'+id).html(cur_count);
                    }
                });
            }
            
        </script>
        
    </body>
</html>