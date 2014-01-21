<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $view_title?></title>
	<link rel=stylesheet href='css/sutoj.css' type='text/css'>
</head>
<body>
	<?php require_once("header1.php");?>
<script type="text/javascript" src="include/jquery-latest.js"></script> 
<script type="text/javascript" src="include/jquery.tablesorter.js"></script> 
<script type="text/javascript">
$(document).ready(function() 
    { 
        $("#problemset").tablesorter(); 
    } 
); 
</script>
 <div id="content" style="margin: 0px auto;">
   
   		    <div class="carousel-box">
         <div class="box">
            <div class="border-right">
               <div class="border-left">
                  <div class="left-top-corner">
                     <div class="right-top-corner">
                        <div class="inner">

<h3 align='center'>
 

</h3><center>


	<table id='problemset' width='90%'class='table table-striped'>
                <thead>

                          <tr class='toprow'>
                            <th width='3%'  ></th>
                          	<th width='120px'><A><?php echo $MSG_PROBLEM_ID?></A></th>
                            <th><?php echo $MSG_TITLE?></th>
                            <th width='10%'><?php echo "Status"?></th>
                          </tr>
                </thead>

		  
			<tbody>
			<?php 
			$cnt=0;
			foreach($view_problemset as $row){
				if ($cnt) 
					echo "<tr class='oddrow blue'>";
				else
					echo "<tr class='evenrow blue'>";
				foreach($row as $table_cell){
					echo "<td>";
					echo "\t".$table_cell;
					echo "</td>";
				}
				
				echo "</tr>";
				
				$cnt=1-$cnt;
			}
			?>
			</tbody>
			</table></center>
			
								   <div id="result">
					   
		       <div class="wrapper">
					  </div> 
                  </div>
               </div>
            </div>

            <div class="border-bot">
               <div id="footer">
      <p><br/> (C) 沈阳工业大学ACM实验室</p>
   </div>

               <div class="left-bot-corner">
                  <div class="right-bot-corner">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
   </div>
<div id=foot>
	<?php require_once("footer.php");?>

</div><!--end foot-->
</body>
</html>
