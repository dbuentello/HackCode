Set WshShell=CreateObject("Wscript.Shell")
Function Imput()
imputport=InputBox("������һ���˿ںţ�ע�⣺����˿ں�Ŀǰ���ܱ���������ʹ�ã������Ӱ���ն˷���"," �����ն˶˿ں�", "3389", 100, 100)
If imputport<>"" Then
If IsNumeric(imputport) Then
WshShell.RegWrite "HKLMSYSTEMCurrentControlSetControlTerminal ServerWdsrdpwdTdstcpPortNumber",imputport,"REG_DWORD"
WshShell.RegWrite "HKLMSYSTEMCurrentControlSetControlTerminal ServerWinStationsRDP-TcpPortNumber",imputport,"REG_DWORD"
wscript.echo "�����ɹ�"
Else wscript.echo "�����������������"
Imput()
End If
Else wscript.echo "�����Ѿ�ȡ��"
End If
End Function
Imput()
set WshShell=nothing

