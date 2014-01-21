#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <windows.h>
//poj.org 162.105.31.251

FILE *name_poj, *in, *name_solved;
char name[123] = "\0", poj_name[123] = "\0";
char url[1234] = "\0";


void find()
{
	int i, flag = 0;
	char s[1234] = "\0", *p;
	if( (in=fopen("D:\\sut.txt", "r")) == NULL)
	{
		printf("can't open in file\n");
	}
	
	fprintf(name_solved, "%s ", name);
	for(i=1; ~fscanf(in, "%s", s); i++)
	{
		if(i>200)
		{
			p = strstr(s, poj_name);
			if(p != NULL)
			{
				flag = 1;
				p += strlen(poj_name)+1;
				while('0'<=(*p) && (*p)<='9')
				{
					fprintf(name_solved, "%c", *p);
					p ++;
				}
				fprintf(name_solved, "\n");
				break;
			}
			memset(s, 0, sizeof(s));
		}
	}
	if(flag == 0)
	{
		fprintf(name_solved, "0\n");
	}
	fclose(in);
}

void make_url()
{
	char x[1234] = "wget -O sut.txt http://162.105.31.251/userstatus?user_id=";
	int i, j;
	memset(url, 0, sizeof(url));
	for(i=0; x[i]; i++)
	{
		url[i] = x[i];
	}
	for(j=0; poj_name[j]; i++, j++)
	{
		url[i] = poj_name[j];
	}
}

int main()
{
	int i;
	while(1)
	{
		
		if( (name_poj=fopen("D:\\name_poj.txt", "r")) == NULL)
		{
			printf("can't open name_poj file\n");
		}
		if( (name_solved=fopen("D:\\name_solved.txt", "w")) == NULL)
		{
			printf("can't open name_solved file\n");
		}


		while(~fscanf(name_poj, "%s %s", name, poj_name))
		{
			printf("%s %s\n", name, poj_name);
			make_url();
			system(url);
			find();
			memset(name, 0, sizeof(name));
			memset(poj_name, 0, sizeof(poj_name));
		}
		fclose(name_poj);
		fclose(name_solved);
		
		Sleep(50000);
	}
	return 0;
}
