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

const char user_num[33]="用户编号"; 
const char user_name[33]="用户名";
const char user_age[33]="年龄";
const char user_sex[33]="性别";
const char book_num[33]="图书编号";
const char book_name[33]="书名";
const char book_isbn[33]="ISBN号";
const char book_author[33]="作者";
const char book_introductin[33]="图书简介";

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
			return i-j+1; //完全批配 
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
		
		printf("\n***请填写注册表***\n\n");
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
		
		printf("添加成功\n");
		printf("|- - - - - - - - - - |- - - - - - - - - - |- - - - - - - - - - |\n"); 
		printf("|%-20s|%-20s|%-20s|\n",user_name,user_age,user_sex);
		printf("|- - - - - - - - - - |- - - - - - - - - - |- - - - - - - - - - |\n"); 
		printf("|%-20s|%-20d|%-20s|\n",userlist[0].name,userlist[0].age,userlist[0].sex);
		printf("|- - - - - - - - - - |- - - - - - - - - - |- - - - - - - - - - |\n"); 
	}
	
	public : void erase()
	{
		int i,count;
		
		//读取userlist文件信息 
		FILE *fp;
		fp = fopen("D://userlist.txt","r");
		for(i=1;~fscanf(fp,"%d%s%d%s",&userlist[i].state,userlist[i].name,&userlist[i].age,userlist[i].sex);i++);
		fclose(fp);
		count=i;
		
		
		printf("请输入想要删除用户的信息(可模糊查找):");
		memset(b,0,sizeof(b));
		scanf("%s",b);
		get_next();//用KMP算法实现模糊匹配 
		
		queue<int> q;
		while(!q.empty())
		{
			q.pop();
		}
		for(i=1;i<count;i++)
		{
			if(i==atoi(b) || userlist[i].age==atoi(b) || kmp(userlist[i].sex)+1 || kmp(userlist[i].name)+1)
			{
				q.push(i);//将符合条件的用户编号压入队列 
			}
		}
		//打印队列信息 
		if(q.empty())
		{
			printf("没有找到相关用户\n");
		}
		else
		{
			printf("\n找到(%d)个可能是你想要找的用户\n\n",q.size());
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
			
			//交互 
			printf("\n请输入你想要删除的人的编号:");
			scanf("%d",&i);
			userlist[i].state=0; 
			
			//写入booklist文件 
			fp = fopen("D://userlist.txt","w");
			for(i=1;i<count;i++)
			{
				fprintf(fp,"%d %s %d %s\n",userlist[i].state,userlist[i].name,userlist[i].age,userlist[i].sex);
			}
			fclose(fp);
			
			printf("删除成功\n"); 
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
		
		//交互 
		printf("\n***请填写书籍信息表***\n\n");
		printf("| - - - - - - - | - - - - - -\n|%-15s|",book_isbn);
		scanf("%s",booklist[0].isbn);
		printf("| - - - - - - - | - - - - - -\n|%-15s|",book_name);
		scanf("%s",booklist[0].name);
		printf("| - - - - - - - | - - - - - -\n|%-15s|",book_author);
		scanf("%s",booklist[0].author);
		printf("| - - - - - - - | - - - - - -\n|%-15s|",book_introductin);
		scanf("%s",booklist[0].introduction);
		printf("| - - - - - - - | - - - - - -\n\n");
		
		//写入booklist文件 
		fp = fopen("D://booklist.txt","a");
		fprintf(fp,"0 %s %s %s\n",booklist[0].isbn,booklist[0].name,booklist[0].author);
		fclose(fp);
		
		//交互 
		printf("添加成功\n");
		printf("|- - - - - - - -|- - - - - - - -|- - - - - - - -|- - - - - - - -|\n"); 
		printf("|%-15s|%-15s|%-15s|%-15s|\n",book_num,book_name,book_author,book_introductin);
		printf("|- - - - - - - -|- - - - - - - -|- - - - - - - -|- - - - - - - -|\n"); 
		printf("|%-15s|%-15s|%-15s|%-15s|\n",booklist[0].isbn,booklist[0].name,booklist[0].author,booklist[0].introduction);
		printf("|- - - - - - - -|- - - - - - - -|- - - - - - - -|- - - - - - - -|\n"); 
	}
	
	
	
	public : void update()
	{
		int i,count;
		
		//读取booklist文件信息 
		FILE *fp;
		fp = fopen("D://booklist.txt","r");
		for(i=1;~fscanf(fp,"%d%s%s%s",&booklist[i].state,booklist[i].isbn,booklist[i].name,booklist[i].author);i++);
		fclose(fp);
		count=i;
		
		
		printf("请输入想要修改的书的信息(可模糊查找):");
		memset(b,0,sizeof(b));
		scanf("%s",b);
		get_next();//用KMP算法实现模糊匹配 
		
		queue<int> q;
		while(!q.empty())
		{
			q.pop();
		}
		for(i=1;i<count;i++)
		{
			if(kmp(booklist[i].isbn)+1 || kmp(booklist[i].name)+1 || kmp(booklist[i].author)+1)
			{
				q.push(i);//将符合条件的书籍编号压入队列 
			}
		}
		
		
		//打印队列信息 
		if(q.empty())
		{
			printf("没有找到相关书籍\n");
		}
		else
		{
			printf("\n找到(%d)本可能是你想要找的书\n\n",q.size());
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
			
			//交互 
			printf("\n请输入你想要修改的书的编号:");
			scanf("%d",&i);
			printf("\n***请填写新的书籍信息表***\n\n");
			printf("| - - - - - - - | - - - - - -\n|%-15s|",book_num);
			scanf("%s",booklist[i].isbn);
			printf("| - - - - - - - | - - - - - -\n|%-15s|",book_name);
			scanf("%s",booklist[i].name);
			printf("| - - - - - - - | - - - - - -\n|%-15s|",book_author);
			scanf("%s",booklist[i].author);
			printf("| - - - - - - - | - - - - - -\n|%-15s|",book_introductin);
			scanf("%s",booklist[i].introduction);
			printf("| - - - - - - - | - - - - - -\n\n");
			
			//写入booklist文件 
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
		
		//读取booklist文件信息 
		FILE *fp;
		fp = fopen("D://booklist.txt","r");
		for(i=1;~fscanf(fp,"%d%s%s%s",&booklist[i].state,booklist[i].isbn,booklist[i].name,booklist[i].author);i++);
		fclose(fp);
		count=i;
		
		
		printf("请输入想要借阅的书的信息(可模糊查找):");
		memset(b,0,sizeof(b));
		scanf("%s",b);
		get_next();//用KMP算法实现模糊匹配 
		
		queue<int> q;
		while(!q.empty())
		{
			q.pop();
		}
		for(i=1;i<count;i++)
		{
			if(booklist[i].state==0 && (kmp(booklist[i].isbn)+1 || kmp(booklist[i].name)+1))
			{
				q.push(i);//将符合条件的书籍编号压入队列 
			}
		}
		
		
		//打印队列信息 
		if(q.empty())
		{
			printf("没有找到相关书籍或已被借出\n");
		}
		else
		{
			printf("\n找到(%d)本可能是你想要找的书\n\n",q.size());
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
		printf("\n请输入你想要借阅的书的编号:");
		scanf("%d",&i);
		booklist[i].state=1;
		printf("借阅成功\n");
		printf("|- - - - - - - - - - |- - - - - - - - - - |- - - - - - - - - - |\n"); 
		printf("|%-20s|%-20s|%-20s|\n",book_num,book_name,book_author);
		printf("|- - - - - - - - - - |- - - - - - - - - - |- - - - - - - - - - |\n"); 
		printf("|%-20s|%-20s|%-20s|\n",booklist[i].isbn,booklist[i].name,booklist[i].author);
		printf("|- - - - - - - - - - |- - - - - - - - - - |- - - - - - - - - - |\n"); 
			
		//写入booklist文件 
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
	printf("1.借书,2.还书,3.管理书,4.管理人\n");
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
		printf("1.添加,2.删除,3.修改\n");
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
		printf("1.添加用户,2.删除用户");
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
