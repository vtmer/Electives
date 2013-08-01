<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
class curl_msg
{
    /*
     * @param string $url 网址 
     * @param string $post_form 表单数据
     * @param string $session_id 会话sessionid
     * follow http://t.cn/zQx3h1v by zhangchile and https://github.com/vtmer/gdut-login-helper by bcho
     */

    protected $key=null;

    private function curl_request($url,$post_form='',$session_id='')
    {
        $startime = microtime();
        //初始化curl
     	$conn = curl_init($url);
    	
        curl_setopt($conn, CURLOPT_TIMEOUT, 10);
        curl_setopt($conn, CURLOPT_VERBOSE, 0);
        curl_setopt($conn, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($conn,CURLOPT_RETURNTRANSFER,1);
        //follow 302
        curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1); 
        //http 重定向
        curl_setopt($conn, CURLOPT_MAXREDIRS, 7);
        curl_setopt($conn, CURLOPT_HEADER,1);
        //发送会话id
        if($session_id)
        {
            curl_setopt($conn,CURLOPT_COOKIESESSION,true);
            curl_setopt($conn, CURLOPT_COOKIE,'ASP.NET_SessionId='.$session_id);
        }
        
        if($post_form)
        {
            curl_setopt($conn, CURLOPT_POST, 1);
            curl_setopt($conn, CURLOPT_POSTFIELDS, $post_form);
        }
        //执行curl
     	$result = curl_exec($conn);
        if($result == false)
        {
    	    return curl_error($conn);
        }
        $header = curl_getinfo($conn);//返回header
    	curl_close($conn);//关闭curl

		$endtime = microtime();
		
		return array('duration'=>$endtime - $startime,
					 'html'=>$result,
					'header'=>$header		
					);
     	
    }
 

    public function check_login($username,$pwd)
    {
        $url =  'http://eswis.gdut.edu.cn';               
        $data = $this->curl_request($url,null,null);
        $html = $data['html'];
        

        preg_match('/__EVENTVALIDATION" value="([^\"]*)/',$html,$value)    ;
        $EVENTVALIDATION = $value[1];
        preg_match('/__VIEWSTATE" value="([^\"]*)/',$html,$value);
        $VIEWSTATE = $value[1];
        preg_match('/__PREVIOUSPAGE" value="([^\"]*)/',$html,$value);
        $PREVIOUSPAGE = $value[1];
        preg_match('/ASP.NET_SessionId=([0-9a-z]+)/',$html,$value);
        $session_id = $value[1];

        
        unset($html);
        $postdata = array(
                    'ctl00$log_username='.urlencode($username),
                    'ctl00$log_password='.urlencode($pwd),
                    '__EVENTVALIDATION='.urlencode($EVENTVALIDATION),
                    '__VIEWSTATE='.urlencode($VIEWSTATE),
                    '__EVENTTARGET='.'',
                    '__EVENTARGUMENT='.'',
                    '__PREVIOUSPAGE='.urlencode($PREVIOUSPAGE),
                    'ctl00$logon='.urlencode('登录'),
                );
        $postform = implode('&',$postdata);
        //以上是抓取表单数据
        $url1 = 'http://eswis.gdut.edu.cn/default.aspx';
        $data2 = $this->curl_request($url1,$postform,$session_id);
        $html2 = $data2['html'];

        /*preg_match('/aspx\?key=([^\"]*)/',$html2,$value);
        $this->key = $value[1];*/
        //echo $value[1]."<br/>";
        //print_r($value);

        /*$key_ret = implode(',',$value);
        //echo $key_ret.'<br/>';
        $key_pos = strpos($key_ret,'Cache-Control');
        $value = substr($key_ret,$key_pos-16,16);
        //echo $value.'<br/>';
        $this->key = $value;
        echo $this->key;*/

        $msg_pos = strpos($html2,'ctl00_msg_logon');//获取登录信息
        $msg1 = substr($html2,$msg_pos+32, 50);
        $msg_pos = strpos($msg1,'</span>');
        $msg = substr($msg1, 0 ,$msg_pos);

        if($msg) 
        {
            return array('status'=>false,'msg'=>$msg);
        }
        else
        {
            return array('status'=>true,'s_id'=>$session_id);
        } 
    }

    public function get_info($session_id)//获取信息
    {
        //个人信息页面   
        $url2 = 'http://eswis.gdut.edu.cn/default.aspx?fid=7';
        $data3 = $this->curl_request($url2,null,$session_id);
        $html3 = $data3['html'];

        $location3 = strpos($html3,'信息汇总');//获取信息汇总链接
        $url3 = '/'.substr($html3, $location3-42,40);
        unset($html3);

        //echo $url3;
        $url3 = 'http://eswis.gdut.edu.cn'.$url3;
        $data4 = $this->curl_request($url3,null,$session_id); //信息汇总
        $html4 = $data4['html'];
 
        $info = array();
         preg_match('/ctl00_cph_right_inf_xm">([^<]+)</',$html4,$value);
         $info['name'] = $value[1];
         preg_match('/ctl00_cph_right_inf_xh">([^<]+)</',$html4,$value);
         $info['stu_id'] = $value[1];
         preg_match('/ctl00_cph_right_inf_dw">([^<]+)</',$html4,$value);
         $details = explode(' ',$value[1]);
         $info['campus'] = $details[0];
         $info['faculty'] = $details[1];
         $info['major'] = $details[2];
         $info['grade'] = $details[3];
         $info['class'] = $details[4];
         //$info['key'] = $this->key;
         return $info;

    }
}

