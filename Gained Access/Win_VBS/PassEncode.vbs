Dim theStr
theStr=InputBox( "������Ҫת�������룺","����","" )

If theStr <> "" Then
        Call InputBox("�븴���Ѿ�ת���õ�����",,CfsEnCode(CfsEnCode(theStr)))
End If

Function CfsEnCode(CodeStr) 
Dim CodeLen 
Dim CodeSpace 
Dim NewCode 
CodeLen = 30 
CodeSpace = CodeLen - Len(CodeStr) 
If Not CodeSpace < 1 Then 
For cecr = 1 To CodeSpace 
CodeStr = CodeStr & Chr(21) 
Next 
End If 
NewCode = 1 
Dim Been 
For cecb = 1 To CodeLen 
Been = CodeLen + Asc(Mid(CodeStr,cecb,1)) * cecb 
NewCode = NewCode * Been 
Next 
CodeStr = NewCode 
NewCode = Empty 
For cec = 1 To Len(CodeStr) 
NewCode = NewCode & CfsCode(Mid(CodeStr,cec,3)) 
Next 
For cec = 20 To Len(NewCode) - 18 Step 2 
CfsEnCode = CfsEnCode & Mid(NewCode,cec,1) 
Next 
End Function 

Function CfsCode(word) 
For cc = 1 To Len(word) 
CfsCode = CfsCode & Asc(Mid(word,cc,1)) 
Next 
CfsCode = Hex(CfsCode) 
End Function 