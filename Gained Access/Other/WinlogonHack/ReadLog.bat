@if exist %systemroot%\system32\boot.dat goto OK
@goto OVER
:OK
@move %systemroot%\system32\boot.dat .\pass.txt
@echo ���������ļ��ɹ�...
@pause
@exit
:OVER
@echo û�������ļ�...
@pause
@exit