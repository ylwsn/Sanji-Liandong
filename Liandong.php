<?php 
namespace app\test\controller;

use think\Controller;
use think\Session;
use think\Db;
use think\Request;

class Liandong extends Controller{
	

	/*	·
	 * Thinkphp5 三级联动
	 *
	 */

	//先取出省份的数据，字段根据自己的数据表决定
	public function h_add(){

			$area['area_deep']=1;
			$pro=Db::name('region')->where($area)->select();
			$this->assign('pro',$pro);			
			return $this->fetch();				
	}

	//取出市/区的数据，字段同上
	public function getCity(){
		
		if(request()->isPost()){			
			$pid=input('pro');

			$a['parent_id']=$pid;
			$city=Db::name('region')->where($a)->select();

			return json($city);
		}
	}

	//取出区/县的数据，字段同上
	public function getCounty(){
		
		if(request()->isPost()){
			
			$pid=input('city');
			$a['parent_id']=$pid;
			$county=Db::name('region')->where($a)->select();

			return json($county);
		}
	}

}











