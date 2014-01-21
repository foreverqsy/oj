#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <queue> 
#include <time.h>

using namespace std;

char book_list[100010];

struct Booklist
{
	int state,time1,time2;
	char isbn[33],name[33],author[33],username[33],introduction[123];
	char usernum[33];
	
}booklist[1010];

struct UserList
{
	int state;
	char name[33],sex[33];
	int age;
}userlist[1010];

const char user_num[33]="�û����"; 
const char user_name[33]="�û���";
const char user_age[33]="����";
const char user_sex[33]="�Ա�";
const char book_num[33]="ͼ����";
const char book_name[33]="����";
const char book_isbn[33]="ISBN��";
const char book_author[33]="����";
const char book_introductin[33]="ͼ����";

char b[1234]="\0";
int next[1234];

int kmp(char a[])
{
	int i=0,j=0;
	while(a[i])
	{
		if(j==-1)
		{
			i++;
			j++; //j=0;
		}
		if(b[j]=='\0')
		{
			return i-j+1; //��ȫ���� 
		}
		if(a[i]==b[j])
		{
			i++;
			j++;
		}
		else
		{
			j = next[j];
		}
	}
	return -1;
}

void get_next()
{
	int j=0,k=-1;
	memset(next,0,sizeof(next));
	next[0] = -1;
	while(b[j])
	{
		if(k==-1 || b[k]==b[j])
		{
			next[j+1] = k+1;
			j++;
			k++;
		}
		else
		{
			k = next[k];
		}
	}
}

class user
{
	public : int find(int x)
	{
		int i;
		FILE *fp;
		
		fp = fopen("D://userlist.txt","r");
		for(i=1;~fscanf(fp,"%d%s%d%s",&userlist[i].state,userlist[i].name,&userlist[i].age,userlist[i].sex);i++);
		fclose(fp);
		
		return userlist[x].state==1;
	}
	
	
	public :void add()
	{
		int i,count;
		FILE *fp;
		
		printf("\n***����дע���***\n\n");
		printf("| - - - - - - - | - - - - - -\n|%-15s|",user_name);
		scanf("%s",userlist[0].name);
		printf("| - - - - - - - | - - - - - -\n|%-15s|",user_age);
		scanf("%d",&userlist[0].age);
		printf("| - - - - - - - | - - - - - -\n|%-15s|",user_sex);
		scanf("%s",userlist[0].sex);
		printf("| - - - - - - - | - - - - - -\n\n");
		
		fp = fopen("D://userlist.txt","a");
		fprintf(fp,"%d %s %d %s\n",1,userlist[0].name,userlist[0].age,userlist[0].sex);
		fclose(fp);
		
		printf("��ӳɹ�\n");
		printf("|- - - - - - - - - - |- - - - - - - - - - |- - - - - - - - - - |\n"); 
		printf("|%-20s|%-20s|%-20s|\n",user_name,user_age,user_sex);
		printf("|- - - - - - - - - - |- - - - - - - - - - |- - - - - - - - - - |\n"); 
		printf("|%-20s|%-20d|%-20s|\n",userlist[0].name,userlist[0].age,userlist[0].sex);
		printf("|- - - - - - - - - - |- - - - - - - - - - |- - - - - - - - - - |\n"); 
	}
	
	public : void erase()
	{
		int i,count;
		
		//��ȡuserlist�ļ���Ϣ 
		FILE *fp;
		fp = fopen("D://userlist.txt","r");
		for(i=1;~fscanf(fp,"%d%s%d%s",&userlist[i].state,userlist[i].name,&userlist[i].age,userlist[i].sex);i++);
		fclose(fp);
		count=i;
		
		
		printf("��������Ҫɾ���û�����Ϣ(��ģ������):");
		memset(b,0,sizeof(b));
		scanf("%s",b);
		get_next();//��KMP�㷨ʵ��ģ��ƥ�� 
		
		queue<int> q;
		while(!q.empty())
		{
			q.pop();
		}
		for(i=1;i<count;i++)
		{
			if(i==atoi(b) || userlist[i].age==atoi(b) || kmp(userlist[i].sex)+1 || kmp(userlist[i].name)+1)
			{
				q.push(i);//�������������û����ѹ����� 
			}
		}
		//��ӡ������Ϣ 
		if(q.empty())
		{
			printf("û���ҵ�����û�\n");
		}
		else
		{
			printf("\n�ҵ�(%d)������������Ҫ�ҵ��û�\n\n",q.size());
			printf("|%-15d|%-15s|%-15d|%-15s|\n",user_num,user_name,user_age,user_sex);
			while(!q.empty())
			{
				for(i=0;i<=70;i++)
				{
					if(i%16==0)
					{
						printf("|");
						continue;
					}
					if(i%2)
					{
						printf("_");
					}
					else
					{
						printf(" ");
					}
				}
				printf("\n");
				i=q.front();
				printf("|%-15d|%-15s|%-15d|%-15s|\n",i,userlist[i].name,userlist[i].age,userlist[i].sex);
				q.pop();
			}
			
			//���� 
			printf("\n����������Ҫɾ�����˵ı��:");
			scanf("%d",&i);
			userlist[i].state=0; 
			
			//д��booklist�ļ� 
			fp = fopen("D://userlist.txt","w");
			for(i=1;i<count;i++)
			{
				fprintf(fp,"%d %s %d %s\n",userlist[i].state,userlist[i].name,userlist[i].age,userlist[i].sex);
			}
			fclose(fp);
			
			printf("ɾ���ɹ�\n"); 
		}
	}
};

class book
{
	public: int add()
	{
		int i;
		char s[33]="\0";
		FILE *fp;
		
		//���� 
		printf("\n***����д�鼮��Ϣ��***\n\n");
		printf("| - - - - - - - | - - - - - -\n|%-15s|",book_isbn);
		scanf("%s",booklist[0].isbn);
		printf("| - - - - - - - | - - - - - -\n|%-15s|",book_name);
		scanf("%s",booklist[0].name);
		printf("| - - - - - - - | - - - - - -\n|%-15s|",book_author);
		scanf("%s",booklist[0].author);
		printf("| - - - - - - - | - - - - - -\n|%-15s|",book_introductin);
		scanf("%s",booklist[0].introduction);
		printf("| - - - - - - - | - - - - - -\n\n");
		
		//д��booklist�ļ� 
		fp = fopen("D://booklist.txt","a");
		fprintf(fp,"0 %s %s %s\n",booklist[0].isbn,booklist[0].name,booklist[0].author);
		fclose(fp);
		
		//���� 
		printf("��ӳɹ�\n");
		printf("|- - - - - - - -|- - - - - - - -|- - - - - - - -|- - - - - - - -|\n"); 
		printf("|%-15s|%-15s|%-15s|%-15s|\n",book_num,book_name,book_author,book_introductin);
		printf("|- - - - - - - -|- - - - - - - -|- - - - - - - -|- - - - - - - -|\n"); 
		printf("|%-15s|%-15s|%-15s|%-15s|\n",booklist[0].isbn,booklist[0].name,booklist[0].author,booklist[0].introduction);
		printf("|- - - - - - - -|- - - - - - - -|- - - - - - - -|- - - - - - - -|\n"); 
	}
	
	
	
	public : void update()
	{
		int i,count;
		
		//��ȡbooklist�ļ���Ϣ 
		FILE *fp;
		fp = fopen("D://booklist.txt","r");
		for(i=1;~fscanf(fp,"%d%s%s%s",&booklist[i].state,booklist[i].isbn,booklist[i].name,booklist[i].author);i++);
		fclose(fp);
		count=i;
		
		
		printf("��������Ҫ�޸ĵ������Ϣ(��ģ������):");
		memset(b,0,sizeof(b));
		scanf("%s",b);
		get_next();//��KMP�㷨ʵ��ģ��ƥ�� 
		
		queue<int> q;
		while(!q.empty())
		{
			q.pop();
		}
		for(i=1;i<count;i++)
		{
			if(kmp(booklist[i].isbn)+1 || kmp(booklist[i].name)+1 || kmp(booklist[i].author)+1)
			{
				q.push(i);//�������������鼮���ѹ����� 
			}
		}
		
		
		//��ӡ������Ϣ 
		if(q.empty())
		{
			printf("û���ҵ�����鼮\n");
		}
		else
		{
			printf("\n�ҵ�(%d)������������Ҫ�ҵ���\n\n",q.size());
			printf("|%-15s|%-15s|%-15s|%-15s|%-15s|\n",book_num,book_isbn,book_name,book_author,book_introductin);
			while(!q.empty())
			{
				for(i=0;i<=86;i++)
				{
					if(i%16==0)
					{
						printf("|");
						continue;
					}
					if(i%2)
					{
						printf("_");
					}
					else
					{
						printf(" ");
					}
				}
				printf("\n");
				i=q.front();
				printf("|%-15d|%-15s|%-15s|%-15s|%-15s|\n",i,booklist[i].isbn,booklist[i].name,booklist[i].author,booklist[i].introduction);
				q.pop();
			}
			
			//���� 
			printf("\n����������Ҫ�޸ĵ���ı��:");
			scanf("%d",&i);
			printf("\n***����д�µ��鼮��Ϣ��***\n\n");
			printf("| - - - - - - - | - - - - - -\n|%-15s|",book_num);
			scanf("%s",booklist[i].isbn);
			printf("| - - - - - - - | - - - - - -\n|%-15s|",book_name);
			scanf("%s",booklist[i].name);
			printf("| - - - - - - - | - - - - - -\n|%-15s|",book_author);
			scanf("%s",booklist[i].author);
			printf("| - - - - - - - | - - - - - -\n|%-15s|",book_introductin);
			scanf("%s",booklist[i].introduction);
			printf("| - - - - - - - | - - - - - -\n\n");
			
			//д��booklist�ļ� 
			fp = fopen("D://booklist.txt","w");
			for(i=1;i<count;i++)
			{
				fprintf(fp,"%d%s%s%s%s%d%s%d%d",booklist[i].state,booklist[i].isbn,booklist[i].name,booklist[i].author,booklist[i].introduction,booklist[i].usernum,booklist[i].username,booklist[i].time1,booklist[i].time2);
			}
			fclose(fp);
		}
	}
	
	
	
	public : void borrow()
	{
		int i,count;
		
		//��ȡbooklist�ļ���Ϣ 
		FILE *fp;
		fp = fopen("D://booklist.txt","r");
		for(i=1;~fscanf(fp,"%d%s%s%s",&booklist[i].state,booklist[i].isbn,booklist[i].name,booklist[i].author);i++);
		fclose(fp);
		count=i;
		
		
		printf("��������Ҫ���ĵ������Ϣ(��ģ������):");
		memset(b,0,sizeof(b));
		scanf("%s",b);
		get_next();//��KMP�㷨ʵ��ģ��ƥ�� 
		
		queue<int> q;
		while(!q.empty())
		{
			q.pop();
		}
		for(i=1;i<count;i++)
		{
			if(booklist[i].state==0 && (kmp(booklist[i].isbn)+1 || kmp(booklist[i].name)+1))
			{
				q.push(i);//�������������鼮���ѹ����� 
			}
		}
		
		
		//��ӡ������Ϣ 
		if(q.empty())
		{
			printf("û���ҵ�����鼮���ѱ����\n");
		}
		else
		{
			printf("\n�ҵ�(%d)������������Ҫ�ҵ���\n\n",q.size());
			printf("|%-15s|%-15s|%-15s|%-15s|\n",book_num,book_num,book_name,book_author);
			while(!q.empty())
			{
				for(i=0;i<=70;i++)
				{
					if(i%16==0)
					{
						printf("|");
						continue;
					}
					if(i%2)
					{
						printf("_");
					}
					else
					{
						printf(" ");
					}
				}
				printf("\n");
				i=q.front();
				printf("|%-15d|%-15s|%-15s|%-15s|\n",i,booklist[i].isbn,booklist[i].name,booklist[i].author);
				q.pop();
			}
		}
		printf("\n����������Ҫ���ĵ���ı��:");
		scanf("%d",&i);
		booklist[i].state=1;
		printf("���ĳɹ�\n");
		printf("|- - - - - - - - - - |- - - - - - - - - - |- - - - - - - - - - |\n"); 
		printf("|%-20s|%-20s|%-20s|\n",book_num,book_name,book_author);
		printf("|- - - - - - - - - - |- - - - - - - - - - |- - - - - - - - - - |\n"); 
		printf("|%-20s|%-20s|%-20s|\n",booklist[i].isbn,booklist[i].name,booklist[i].author);
		printf("|- - - - - - - - - - |- - - - - - - - - - |- - - - - - - - - - |\n"); 
			
		//д��booklist�ļ� 
		fp = fopen("D://booklist.txt","w");
		for(i=1;i<count;i++)
		{
			fprintf(fp,"%d %s %s %s\n",booklist[i].state,booklist[i].isbn,booklist[i].name,booklist[i].author);
		}
		fclose(fp);
	}
};

int main()
{
	book book1;
	user user1;
	int a; 
	printf("1.����,2.����,3.������,4.������\n");
	scanf("%d",&a);
	if(a==1)
	{
		book1.borrow(); 
	}
	if(a==2)
	{
		//book1.return(); 
	}
	if(a==3)
	{
		printf("1.���,2.ɾ��,3.�޸�\n");
		scanf("%d",&a);
		if(a==1)
		{
			book1.add();
		}
		if(a==2)
		{
			//book1.erase();
		}
		if(a==3)
		{
			book1.update();
		}
	}
	if(a==4)
	{
		printf("1.����û�,2.ɾ���û�");
		scanf("%d",&a);
		if(a==1)
		{
			user1.add();
		}
		if(a==2)
		{
			user1.erase();
		}
	}
	return 0;
}
