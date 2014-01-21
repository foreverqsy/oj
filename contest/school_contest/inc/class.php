<?php
class member
{//显示成员，左开右闭
	private $start;//显示开始数
	private $stop;//显示结束数
	private $all;//总数
	private $num;
	private $mem_Array=array();
	
	function __construct($start,$stop,$all){$this->start = $start+1;$this->stop=$stop+1;$this->num=$stop-$start;$this->all=$all;$this->show();}
	function __destruct(){unset($start);unset($stop);unset($num);	}
	
	function init_array()
	{
		
		for($i=$this->start;($i<$this->stop)&&($i<$this->all+1);$i++) 
		{
			$string = "<div class=\"team\"><div class=\"block\"><span style=\"background:#09f;color:#eef;\"></span><img src=\"../inc/regist/image/{$i}.jpg\"  width=\"70\" height=\"100\" >";
			$query  = "SELECT team_name FROM acm_2_user WHERE team_id=$i";	
			$result = mysql_query($query);
			$row=mysql_fetch_row($result);
			$string.="<i></i><span style=\"background:#fff;color:#09f;\">$row[0]</span>";
	
			$query  = "SELECT team_member_name FROM acm_2_user WHERE team_id=$i";
			$result = mysql_query($query);
			$count  = 0;
			while($row=mysql_fetch_row($result)) 
			{
				$back = "";
				$count++;
				if(($count)%2){$string.="<s></s>";$back="#09f;color:#eef";}
				else {$string.="<i></i>";$back="#fff;color:#09f";}
				$string.="<span style=\"background:{$back};\">$row[0]</span>";	
			}
			$string.="</div></div>";
			$this->mem_Array[($i-$this->start)]=$string;
		}
	}
	
	function show()
	{
		$this->init_array();
		foreach($this->mem_Array as $value)
		{
			echo $value;
		}
	}
	
}
class pages
{//用来生成翻页
	private $each_disNum;//每页显示的条目数
	private $nums;//条目数
	private $current_page;//选中页
	private $sub_pages;//每次显示页数
	private $pageNums;//页目数
	private $page_array=array();
	private $subPage_link;//分页链接
	
	function __construct($each_disNum,$nums,$current_page,$sub_pages,$subPage_link)
	{//构造函数
		$this->each_disNums = intval($each_disNum);
		$this->nums         = intval($nums);
		if(!$current_page){$this->current_page=1;}
		else {$this->current_page=($current_page);}
		$this->sub_pages    = intval($sub_pages);
		$this->pageNums=ceil($nums/$each_disNum);
		$this->subPage_link = $subPage_link;
		$this->show_SubPages();
	}
	
	function __destruct()
	{//析构函数
		unset($each_disNum);
		unset($nums);
		unset($current_page);
		unset	($sub_pages);
		unset($pageNums);
		unset($page_array);
		unset($subPage_link);
	}
	
	function show_SubPages() 
	{
		$this->subPageCss();
	}
	
	function initArray()
	{//初始化页数
		for($i=0;$i<$this->sub_pages;$i++) 
		{
			$this->page_array[$i]=$i;
		}	
		return $this->page_array;
	}
	
	function construct_num_Page()
	{//构造页数表
		if($this->pageNums<$this->sub_pages)
		{
			$current_array=array();
			for($i=0;$i<$this->pageNums;$i++){$current_array[$i]=$i+1;}
		}
		else 
		{
			$current_array=$this->initArray();
			if($this->current_page<=3)
			{
				for($i=0;$i<count($current_array);$i++){$current_array[$i]=$i+1;}
			}
			elseif($this->current_page <= $this->pageNums && $this->current_page > $this->pageNums - $this->sub_pages + 1)
			{
				for($i=0;$i<count($current_array);$i++){$current_array[$i]=($this->pageNums)-($this->sub_pages)+1+$i;}				
			}
			else 
			{
				for($i=0;$i<count($current_array);$i++){$current_array[$i]=$this->current_page-2+$i;}
			}
		}
		return $current_array;	
	}
	
	function subPageCss()
	{//制作分页
		$subPageCssStr="";
		$subPageCssStr.="<span>当前第".$this->current_page."/".$this->pageNums."页</span>";

		if($this->current_page < $this->pageNums)
		{
			$lastPageUrl=$this->subPage_link.$this->pageNums;
			$nextPageUrl=$this->subPage_link.($this->current_page+1);
			$subPageCssStr.="<a href='$lastPageUrl'>尾页</a>";	
			$subPageCssStr.="<a href='$nextPageUrl'>下一页</a>";	
		}
		else 
		{
			$subPageCssStr.="<span>尾页</span>";
			$subPageCssStr.="<span>下一页</span>";	
		}		
		
		$a=$this->construct_num_Page();
		for($i=count($a)-1;$i>=0;$i--) 
		{
			$s=$a[$i];
			if($s==$this->current_page){$subPageCssStr.="<span>".$s."</span>";}
			else 
			{
						$url=$this->subPage_link.$s;
						$subPageCssStr.="<a href='$url'>".$s."</a>";
			}		
		}
		
		if($this->current_page>1)
		{
			$firstPageUrl=$this->subPage_link."1";
			$prewPageUrl =$this->subPage_link.($this->current_page-1);
			$subPageCssStr.="<a href='$prewPageUrl'>上一页</a>";
			$subPageCssStr.="<a href='$firstPageUrl'>首页</a>";
		}
		else 
		{
			$subPageCssStr.="<span>上一页</span>";
			$subPageCssStr.="<span>首页</span>";
		}
		
		echo $subPageCssStr;
	}
	
}
?>
