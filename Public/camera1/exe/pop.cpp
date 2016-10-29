#include <iostream>
#include <stdio.h>
#include <unistd.h>
#include <dirent.h>
#include <stdlib.h>
#include <sys/stat.h>
#include <string.h>
#include <mysql/mysql.h>
#include <vector>
using namespace std;

/***** Global Variables *****/
char dir[100] = "../";
int const MAX_STR_LEN = 200;

/* Show all files under dir_name , do not show directories ! */
void SelectSort(vector<string> &a)
{
	for (int i = 0; i<a.size() - 1; i++)
	{
		int k = i;
		string key = a[i];
		for (int j = i + 1; j<a.size(); j++)
		{
			if (a[j]<key)
			{
				k = j;
				key = a[j];
			}
		}
		if (k != i)
			swap(a[i], a[k]);
	}

}
void showAllFiles( const char * dir_name ,vector<string> &v)
{
	// check the parameter !
	if( NULL == dir_name )
	{
		cout<<" dir_name is null ! "<<endl;
		return;
	}

	// check if dir_name is a valid dir
	struct stat s;
	lstat( dir_name , &s );
	if( ! S_ISDIR( s.st_mode ) )
	{
		cout<<"dir_name is not a valid directory !"<<endl;
		return;
	}

	struct dirent * filename;    // return value for readdir()
 	DIR * dir;                   // return value for opendir()
	dir = opendir( dir_name );
	if( NULL == dir )
	{
		cout<<"Can not open dir "<<dir_name<<endl;
		return;
	}

	/* read all the files in the dir ~ */
	while( ( filename = readdir(dir) ) != NULL )
	{
		// get rid of "." and ".."
		if( strcmp( filename->d_name , "." ) == 0 ||
			strcmp( filename->d_name , "..") == 0    )
			continue;
		//cout<<filename ->d_name <<endl;
		v.push_back(filename->d_name);
	}
}
void getNumber(vector<string> &filename,vector<string>&filenameNoBmp)
{
	string str="";

	for (int i = 0; i < filename.size(); i++)
	{
		for (int j = 0; j < filename[i].length();j++)
		{
			if (filename[i][j] == '.'||filename[i][j] == '_')
			{
				break;
			}
			str = str + filename[i][j];


		}
		filenameNoBmp.push_back(str);
		str = "";
	}
}
int main()
{

	vector<string> filename;
	vector<string> filenameNoBmp;
	string newfile="";
	// filename.push_back("140008.bmp");
	// filename.push_back("140002.bmp");
	// filename.push_back("140010.bmp");
	// filename.push_back("140005.bmp");
	//cout<<"123456"<<endl;
	while(true)
	{
		MYSQL mysql;
		mysql_init(&mysql);
		mysql_real_connect(&mysql, "localhost", "root", "", "data", 3306, NULL, 0);
		showAllFiles( dir,filename );
		getNumber(filename,filenameNoBmp);
		SelectSort(filenameNoBmp);
		string lastest=filenameNoBmp[filename.size()-2];
		//cout<<newfile<<"	true	"<<lastest<<endl;
		//usleep(3000);
		for(int i=0;i<filename.size();i++)
		{
			cout<<filenameNoBmp[i]<<endl;
		}
		cout<<"#####"<<lastest<<"######"<<endl;
		if(newfile == lastest)
		{
			sleep(3);
			cout<<"1"<<endl;
		}
		else
		{
			cout<<"2"<<endl;
			sleep(3);
			string sql="UPDATE  `data`.`camera` SET  `filename` =  '"+lastest+"' WHERE  `camera`.`cameraid` =4;";
			mysql_query(&mysql, sql.c_str());
			mysql_close(&mysql);
		}

		newfile = lastest;
		filename.clear();
		filenameNoBmp.clear();

	}

  //  cout<<"success"<<endl;
//	cout<<"start"<<endl;
//	sleep(3);
//	cout<<"over"<<endl;

	return 0;
}
