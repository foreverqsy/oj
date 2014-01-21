<?php
@session_start();
if($_SESSION['freshman_contest'])
	$_GET['cid'] = 1;
else
	$_GET['cid'] = 0;


        $OJ_CACHE_SHARE=true;
        $cache_time=10;
        require_once('include/cache_start.php');
		require_once('include/db_info.inc.php');
        require_once('inc/en.php');
        $view_title= $MSG_CONTEST.$MSG_RANKLIST;
        $title="";
        require_once("include/const.inc.php");
        require_once("include/my_func.inc.php");
class TM{
        var $solved=0;
        var $time=0;
        var $p_wa_num;
        var $p_ac_sec;
        var $user_id;
        var $nick;
        function TM(){
                $this->solved=0;
                $this->time=0;
                $this->p_wa_num=array(0);
                $this->p_ac_sec=array(0);
        }
        function Add($pid,$sec,$res){
//              echo "Add $pid $sec $res<br>";
                if (isset($this->p_ac_sec[$pid])&&$this->p_ac_sec[$pid]>0)
                        return;
                if ($res!=4){
                        if(isset($this->p_wa_num[$pid])){
                                $this->p_wa_num[$pid]++;
                        }else{
                                $this->p_wa_num[$pid]=1;
                        }
                }else{
                        $this->p_ac_sec[$pid]=$sec;
                        $this->solved++;
                        if(!isset($this->p_wa_num[$pid])) $this->p_wa_num[$pid]=0;
                        $this->time+=$sec+$this->p_wa_num[$pid]*1200;
//                      echo "Time:".$this->time."<br>";
//                      echo "Solved:".$this->solved."<br>";
                }
        }
}

function s_cmp($A,$B){
//      echo "Cmp....<br>";
        if ($A->solved!=$B->solved) return $A->solved<$B->solved;
        else return $A->time>$B->time;
}

// contest start time
if (!isset($_GET['cid'])) die("No Such Contest!");
$cid=intval($_GET['cid']);

$sql="SELECT pre_start_time, pre_end_time, start_time, description, title, end_time FROM contest WHERE contest_id='$cid'";
//$result=mysql_query($sql) or die(mysql_error());
//$rows_cnt=mysql_num_rows($result);
if($OJ_MEMCACHE){
        require("include/memcache.php");
        $result = mysql_query_cache($sql);// or die("Error! ".mysql_error());
        if($result) $rows_cnt=count($result);
        else $rows_cnt=0;
}else{

        $result = mysql_query($sql);// or die("Error! ".mysql_error());
        if($result) $rows_cnt=mysql_num_rows($result);
        else $rows_cnt=0;
}


$start_time=0;
$end_time=0;
if ($rows_cnt>0){
//      $row=mysql_fetch_array($result);

        if($OJ_MEMCACHE)
                $row=$result[0];
        else
                $row=mysql_fetch_array($result);

echo "<br/>";

//echo $row['description'];
		if(!$row['description']){
		$start_time=strtotime($row['start_time']);
        $end_time=strtotime($row['end_time']);
		}
		else{
		$start_time=strtotime($row['pre_start_time']);
        $end_time=strtotime($row['pre_end_time']);
		}
        $title=$row['title'];
        
}
if(!$OJ_MEMCACHE)mysql_free_result($result);
if ($start_time==0){
        $view_errors= "No Such Contest";
        require("template/".$OJ_TEMPLATE."/error.php");
        exit(0);
}

if(!isset($OJ_RANK_LOCK_PERCENT)) $OJ_RANK_LOCK_PERCENT=0;
$lock=$end_time-($end_time-$start_time)*$OJ_RANK_LOCK_PERCENT;

//echo $lock.'-'.date("Y-m-d H:i:s",$lock);


$sql="SELECT count(1) as pbc FROM `schoolcontest_problem` WHERE `contest_id`='$cid'";
//$result=mysql_query($sql);
if($OJ_MEMCACHE){
//        require("./include/memcache.php");
        $result = mysql_query_cache($sql);// or die("Error! ".mysql_error());
        if($result) $rows_cnt=count($result);
        else $rows_cnt=0;
}else{

        $result = mysql_query($sql);// or die("Error! ".mysql_error());
        if($result) $rows_cnt=mysql_num_rows($result);
        else $rows_cnt=0;
}

if($OJ_MEMCACHE)
        $row=$result[0];
else
        $row=mysql_fetch_array($result);

//$row=mysql_fetch_array($result);
$pid_cnt=intval($row['pbc']);
if(!$OJ_MEMCACHE)mysql_free_result($result);

$sql="SELECT
        users.user_id,users.nick,solution.result,solution.num,solution.in_date
                FROM
                        (select * from solution where solution.contest_id='$cid' and num>=0 ) solution
                left join users
                on users.user_id=solution.user_id
        ORDER BY users.user_id,in_date";
//echo $sql;
//$result=mysql_query($sql);
if($OJ_MEMCACHE){
   //     require("./include/memcache.php");
        $result = mysql_query_cache($sql);// or die("Error! ".mysql_error());
        if($result) $rows_cnt=count($result);
        else $rows_cnt=0;
}else{

        $result = mysql_query($sql);// or die("Error! ".mysql_error());
        if($result) $rows_cnt=mysql_num_rows($result);
        else $rows_cnt=0;
}

$user_cnt=0;
$user_name='';
$U=array();
for ($i=0;$i<$rows_cnt;$i++){
        if($OJ_MEMCACHE)
                $row=$result[$i];
        else
                $row=mysql_fetch_array($result);

        $n_user=$row['user_id'];
        if (strcmp($user_name,$n_user)){
                $user_cnt++;
                $U[$user_cnt]=new TM();

                $U[$user_cnt]->user_id=$row['user_id'];
                $U[$user_cnt]->nick=$row['nick'];

                $user_name=$n_user;
        }
        if(time()<$end_time&&$lock<strtotime($row['in_date']))
        	   $U[$user_cnt]->Add($row['num'],strtotime($row['in_date'])-$start_time,0);
        else
        	   $U[$user_cnt]->Add($row['num'],strtotime($row['in_date'])-$start_time,intval($row['result']));
       
}
if(!$OJ_MEMCACHE) mysql_free_result($result);
usort($U,"s_cmp");

////firstblood
$first_blood=array();
for($i=0;$i<$pid_cnt;$i++){
   $sql="select user_id from solution where contest_id=$cid and result=4 and num=$i order by in_date limit 1";
   $result=mysql_query($sql);
   $row_cnt=mysql_num_rows($result);
   $row=mysql_fetch_array($result);
   if($row_cnt==1){
      $first_blood[$i]=$row['user_id'];
   }else{
      $first_blood[$i]="";
   }

}

if($_SESSION['user_id'] == "admin")
{
	require("contestrankpage.php");

	if($_SESSION['freshman_contest'])
	$_SESSION['freshman_contest'] = 0;
	else
	$_SESSION['freshman_contest'] = 1;

	

}else
/////////////////////////Template
require("contestrankpage.php");
/////////////////////////Common foot
if(file_exists('include/cache_end.php'))
        require_once('include/cache_end.php');

?>