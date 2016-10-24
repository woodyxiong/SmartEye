#include<iostream>
#include<string>
#include<fstream>
#include<vector>
#include<stdlib.h>
//#include<winsock2.h>
//#include<mysql.h>
using namespace std;
class Color {
public:
	unsigned char R, G, B;
	Color() {}
	Color(unsigned char R, unsigned char G, unsigned char b) :R(R), G(G), B(B) {}
};
class Bmpinfo {
public:
	unsigned short bfType; //脦脛录镁脌脿脨脥拢卢卤脴脨毛脢脟脳脰路没麓庐"BM"拢卢录麓0x424D
	unsigned int bfSize; //脰赂露篓脦脛录镁麓贸脨隆
	unsigned short bfReserved1; //卤拢脕么脳脰拢卢虏禄驴录脗脟
	unsigned short bfReserved2; //卤拢脕么脳脰拢卢虏禄驴录脗脟
	unsigned int bfOffBits; //麓脫脦脛录镁脥路碌陆脦禄脥录脢媒戮脻碌脛脝芦脪脝脳脰陆脷脢媒
	unsigned int max_x, min_y, min_x, max_y;
	unsigned int biSize; //赂脙陆谩鹿鹿碌脛鲁陇露脠
	unsigned int biWidth; //脥录脧帽碌脛驴铆露脠拢卢碌楼脦禄脢脟脧帽脣脴
	unsigned int biHeight; //脥录脧帽碌脛赂脽露脠拢卢碌楼脦禄脢脟脧帽脣脴
	unsigned short biPlanes; //卤脴脨毛脢脟1
	unsigned short biBitCount; //脩脮脡芦脦禄脢媒拢卢脠莽1(潞脷掳脳), 8(256脡芦), 24(脮忙虏脢脡芦)
	unsigned int biCompression; //脩鹿脣玫脌脿脨脥拢卢脠莽BI_RGB,BI_RLE4
	unsigned int biSizeImage; //脢碌录脢脦禄脥录脢媒戮脻脮录脫脙碌脛脳脰陆脷脢媒
	unsigned int biXPelsPerMeter; //脣庐脝陆路脰卤忙脗脢
	unsigned int biYPelsPerMeter; //麓鹿脰卤路脰卤忙脗脢
	unsigned int biClrUsed; //脢碌录脢脢鹿脫脙碌脛脩脮脡芦脢媒
	unsigned int biClrImportant; //脰脴脪陋碌脛脩脮脡芦脢媒
	unsigned int newheight;
	unsigned int newwidth;
	unsigned int mocR;
	unsigned int mocG;
	unsigned int mocB;
	unsigned char readTemp1;
	unsigned char readTemp2;
	unsigned char tempG1, tempG2, tempRGB1, tempRGB2, temp;
	//鲁玫脢录禄炉麓媒脡煤鲁脡碌脛脳脰脛拢
	vector<vector <int> > font;

	//鲁玫脢录禄炉脨猫脪陋录脛麓忙碌脛脢媒脳茅
	vector<vector <int> > array;
};
class Bmp :public Bmpinfo {
private:
	vector<int>max_min;
	vector<int> a;
	int **newimage;
	int Hdistance, Wdistance;
	vector<vector <int> >I_Oimage;
	Color **image;
	char *path;
	unsigned int pluszero;
	int IO_x = 0;
	double percentr, percentg, percentb;//禄脪露脠卤脠脌媒
	//露镁脰碌禄炉碌脛虏脦脢媒
	int totwocanshu;
	int yuzhi, yuzhi1, yuzhi2;
	//MYSQL *conn;
	//MYSQL_RES *result;
	//MYSQL_ROW row;
	//MYSQL_FIELD *field;
	int num_fields;
	int num = 0;//bmp脥录脙眉脙没
	int come = false;//脟脨赂卯脢煤脧脽碌脛脜脨露脧
	string s, str, sql;//sql脫茂戮盲
	int whiteNum = 0, blackNum = 0;
	int cnt = 0;

public:
	Bmp()
	{
	/*	conn = mysql_init(NULL);
		if (mysql_real_connect(conn, "localhost", "root", "", "data", 3306, NULL, 0) == NULL) {
			cout << "Error " << mysql_errno(conn) << ":" << mysql_error(conn) << endl;
			exit(EXIT_FAILURE);
		}
		char* csql = "SELECT * FROM instrument";
		if (mysql_query(conn, csql)) {
			cout << "Error " << mysql_errno(conn) << ":" << mysql_error(conn) << endl;
			exit(EXIT_FAILURE);
		}*/
	}
	/*******脦脛录镁露脕脠毛**********************************************************************/
	void BmpRead(char *path){
		this->path = path;
		ifstream fin(path, ios::binary);
		if (!fin){
			cerr << "ReadError" << endl;
			// exit(1);
		}
		fin.read((char*)&bfType, sizeof(bfType));
		fin.read((char*)&bfSize, sizeof(bfSize));
		fin.read((char*)&bfReserved1, sizeof(bfReserved1));
		fin.read((char*)&bfReserved2, sizeof(bfReserved2));
		fin.read((char*)&bfOffBits, sizeof(bfOffBits));

		fin.read((char*)&biSize, sizeof(biSize));
		fin.read((char*)&biWidth, sizeof(biWidth));
		fin.read((char*)&biHeight, sizeof(biHeight));
		fin.read((char*)&biPlanes, sizeof(biPlanes));
		fin.read((char*)&biBitCount, sizeof(biBitCount));

		fin.read((char*)&biCompression, sizeof(biCompression));
		fin.read((char*)&biSizeImage, sizeof(biSizeImage));
		fin.read((char*)&biXPelsPerMeter, sizeof(biXPelsPerMeter));
		fin.read((char*)&biYPelsPerMeter, sizeof(biYPelsPerMeter));
		fin.read((char*)&biClrUsed, sizeof(biClrUsed));
		fin.read((char*)&biClrImportant, sizeof(biClrImportant));

		// cout << biCompression << endl;
		fin.read((char*)&mocR, sizeof(mocR));
		fin.read((char*)&mocG, sizeof(mocG));
		fin.read((char*)&mocB, sizeof(mocB));
		//陆芦脥录脝卢露脕鲁脡露镁脦卢脢媒脳茅
		if (biBitCount != 0){
			pluszero = (unsigned int)(4 - (biWidth*biBitCount / 8) % 4) % 4;
			image = new Color *[biHeight];
			for (int i = 0; i < biHeight; i++){
				image[i] = new Color[biWidth];
			}

			fin.seekg(bfOffBits, ios::beg);

			for (int i = 0; i < biHeight; i++){
				for (int j = 0; j < biWidth; j++){


					fin.read((char*)&readTemp1, sizeof(readTemp1));
					fin.read((char*)&readTemp2, sizeof(readTemp2));

					image[i][j].B = readTemp1 >> 3;
					temp = readTemp1 << 5;
					temp = temp >> 2;
					image[i][j].G = temp + (readTemp2 >> 5);
					image[i][j].R = readTemp2 << 3;
					image[i][j].R = image[i][j].R >> 3;

					image[i][j].B = (image[i][j].B + 0x00) * 255 / 31;
					image[i][j].G = (image[i][j].G + 0x00) * 255 / 63;
					image[i][j].R = (image[i][j].R + 0x00) * 255 / 31;

					image[i][j].B = image[i][j].B << 3;
					image[i][j].G = image[i][j].G << 3;
					image[i][j].R = image[i][j].R << 3;

				}
				fin.seekg(pluszero, ios::cur);
			}

			fin.close();
		}
		else{
			cerr << "虏禄脢脟16脦禄脡卯露脠";
			// exit(1);
		}
	}

	void BmpRead_24(char *path) {
		this->path = path;
		ifstream fin(path, ios::binary);
		if (!fin) {
			cerr << "脦脼路篓麓貌驴陋" << endl;
			// exit(1);
		}
		fin.read((char*)&bfType, sizeof(bfType));
		fin.read((char*)&bfSize, sizeof(bfSize));
		fin.read((char*)&bfReserved1, sizeof(bfReserved1));
		fin.read((char*)&bfReserved2, sizeof(bfReserved2));
		fin.read((char*)&bfOffBits, sizeof(bfOffBits));
		fin.read((char*)&biSize, sizeof(biSize));
		fin.read((char*)&biWidth, sizeof(biWidth));
		fin.read((char*)&biHeight, sizeof(biHeight));
		fin.read((char*)&biPlanes, sizeof(biPlanes));
		fin.read((char*)&biBitCount, sizeof(biBitCount));
		fin.read((char*)&biCompression, sizeof(biCompression));
		fin.read((char*)&biSizeImage, sizeof(biSizeImage));
		fin.read((char*)&biXPelsPerMeter, sizeof(biXPelsPerMeter));
		fin.read((char*)&biYPelsPerMeter, sizeof(biYPelsPerMeter));
		fin.read((char*)&biClrUsed, sizeof(biClrUsed));
		fin.read((char*)&biClrImportant, sizeof(biClrImportant));
		//陆芦脥录脝卢露脕鲁脡露镁脦卢脢媒脳茅
		pluszero = (unsigned int)(4 - (biWidth*biBitCount / 8) % 4) % 4;
		image = new Color *[biHeight];
		for (int i = 0; i < biHeight; i++) {
			image[i] = new Color[biWidth];
		}
		fin.seekg(bfOffBits, ios::beg);
		for (int i = 0; i < biHeight; i++) {
			for (int j = 0; j < biWidth; j++) {
				fin.read((char*)&image[i][j].R, sizeof(image[i][j].R));
				fin.read((char*)&image[i][j].G, sizeof(image[i][j].G));
				fin.read((char*)&image[i][j].B, sizeof(image[i][j].B));
			}
			fin.seekg(pluszero, ios::cur);
		}
		fin.clear();
		fin.close();

	}
	/*******脦脛录镁露脕脠毛**********************************************************************/
	/*******脦脛录镁脨麓脠毛**********************************************************************/
	void BmpWrite_24(char* path) {
		this->path = path;
		ofstream fout(path, ios::binary);
		if (!fout) {
			cerr << "脦脼路篓脨麓脠毛脦脛录镁" << endl;
			// exit(1);
		}
		bfOffBits = 54;
		biBitCount = 24;
		biCompression = 0;
		biSizeImage = biWidth*biHeight*(biBitCount / 8) + 54;
		fout.write((char*)&bfType, sizeof(bfType));
		fout.write((char*)&bfSize, sizeof(bfSize));
		fout.write((char*)&bfReserved1, sizeof(bfReserved1));
		fout.write((char*)&bfReserved2, sizeof(bfReserved2));
		fout.write((char*)&bfOffBits, sizeof(bfOffBits));

		fout.write((char*)&biSize, sizeof(biSize));
		fout.write((char*)&biWidth, sizeof(biWidth));
		fout.write((char*)&biHeight, sizeof(biHeight));
		fout.write((char*)&biPlanes, sizeof(biPlanes));
		fout.write((char*)&biBitCount, sizeof(biBitCount));
		fout.write((char*)&biCompression, sizeof(biCompression));
		fout.write((char*)&biSizeImage, sizeof(biSizeImage));
		fout.write((char*)&biXPelsPerMeter, sizeof(biXPelsPerMeter));
		fout.write((char*)&biYPelsPerMeter, sizeof(biYPelsPerMeter));
		fout.write((char*)&biClrUsed, sizeof(biClrUsed));
		fout.write((char*)&biClrImportant, sizeof(biClrImportant));

		if (biBitCount != 0) {
			pluszero = (unsigned int)(4 - (biWidth*biBitCount / 8) % 4) % 4;
			for (int i = 0; i < biHeight; i++) {
				for (int j = 0; j < biWidth; j++) {



					fout.write((char*)&image[i][j].B, sizeof(image[i][j].B));
					fout.write((char*)&image[i][j].G, sizeof(image[i][j].G));
					fout.write((char*)&image[i][j].R, sizeof(image[i][j].R));


				}
				for (int i = 0; i < pluszero; i++) {
					fout.put(0);
				}
			}
			// cout << "脨麓脠毛脥录脧帽鲁脡鹿娄" << endl;
		}

		fout.close();
	}


	void BmpWrite(char* path) {
		this->path = path;
		ofstream fout(path, ios::binary);
		if (!fout) {
			cerr << "脦脼路篓脨麓脠毛脦脛录镁" << endl;
			// exit(1);
		}
		fout.write((char*)&bfType, sizeof(bfType));
		fout.write((char*)&bfSize, sizeof(bfSize));
		fout.write((char*)&bfReserved1, sizeof(bfReserved1));
		fout.write((char*)&bfReserved2, sizeof(bfReserved2));
		fout.write((char*)&bfOffBits, sizeof(bfOffBits));

		fout.write((char*)&biSize, sizeof(biSize));
		fout.write((char*)&biWidth, sizeof(biWidth));
		fout.write((char*)&biHeight, sizeof(biHeight));
		fout.write((char*)&biPlanes, sizeof(biPlanes));
		fout.write((char*)&biBitCount, sizeof(biBitCount));
		fout.write((char*)&biCompression, sizeof(biCompression));
		fout.write((char*)&biSizeImage, sizeof(biSizeImage));
		fout.write((char*)&biXPelsPerMeter, sizeof(biXPelsPerMeter));
		fout.write((char*)&biYPelsPerMeter, sizeof(biYPelsPerMeter));
		fout.write((char*)&biClrUsed, sizeof(biClrUsed));
		fout.write((char*)&biClrImportant, sizeof(biClrImportant));

		if (biBitCount == 24) {
			pluszero = (unsigned int)(4 - (biWidth*biBitCount / 8) % 4) % 4;
			for (int i = 0; i < biHeight; i++) {
				for (int j = 0; j < biWidth; j++) {
					fout.write((char*)&image[i][j].R, sizeof(image[i][j].R));
					fout.write((char*)&image[i][j].G, sizeof(image[i][j].G));
					fout.write((char*)&image[i][j].B, sizeof(image[i][j].B));
				}
				for (int i = 0; i < pluszero; i++) {
					fout.put(0);
				}
			}
		}
		fout.close();
	}

	void BmpWrite(char* path, unsigned int max_x, unsigned int min_y, unsigned int min_x, unsigned int max_y) {
		this->path = path;
		ofstream fout(path, ios::binary);
		if (!fout) {
			cerr << "脦脼路篓脨麓脠毛脦脛录镁" << endl;
			// exit(1);
		}


		unsigned int c_biHeight = max_y - min_y;
		unsigned int c_biWidth = max_x - min_x;
		max_y = biHeight + 1 - max_y;
		min_y = biHeight + 1 - min_y;
		fout.write((char*)&bfType, sizeof(bfType));
		fout.write((char*)&bfSize, sizeof(bfSize));
		fout.write((char*)&bfReserved1, sizeof(bfReserved1));
		fout.write((char*)&bfReserved2, sizeof(bfReserved2));
		fout.write((char*)&bfOffBits, sizeof(bfOffBits));

		fout.write((char*)&biSize, sizeof(biSize));
		fout.write((char*)&c_biWidth, sizeof(c_biWidth));
		fout.write((char*)&c_biHeight, sizeof(c_biHeight));
		fout.write((char*)&biPlanes, sizeof(biPlanes));
		fout.write((char*)&biBitCount, sizeof(biBitCount));
		fout.write((char*)&biCompression, sizeof(biCompression));
		fout.write((char*)&biSizeImage, sizeof(biSizeImage));
		fout.write((char*)&biXPelsPerMeter, sizeof(biXPelsPerMeter));
		fout.write((char*)&biYPelsPerMeter, sizeof(biYPelsPerMeter));
		fout.write((char*)&biClrUsed, sizeof(biClrUsed));
		fout.write((char*)&biClrImportant, sizeof(biClrImportant));

		if (biBitCount == 24) {
			pluszero = (unsigned int)(4 - (c_biWidth*biBitCount / 8) % 4) % 4;
			for (int i = max_y; i < min_y; i++) {
				for (int j = min_x; j < max_x; j++) {

					fout.write((char*)&image[i][j].R, sizeof(image[i][j].R));
					fout.write((char*)&image[i][j].G, sizeof(image[i][j].G));
					fout.write((char*)&image[i][j].B, sizeof(image[i][j].B));

				}
				for (int i = 0; i < pluszero; i++) {
					fout.put(0);
				}
			}
		}
		fout.clear();
		fout.close();
	}
	void BmpWrite_24(char* path, unsigned int min_x, unsigned int max_y, unsigned int max_x, unsigned int min_y) {
		this->path = path;

		ofstream fout(path, ios::binary);
		if (!fout) {
			cerr << "脦脼路篓脨麓脠毛脦脛录镁" << endl;
			// exit(1);
		}

		bfOffBits = 54;
		biBitCount = 24;
		biCompression = 0;
		unsigned int pluszero_x;
		unsigned int c_biHeight = max_y - min_y;
		unsigned int c_biWidth = max_x - min_x;
		pluszero_x = (unsigned int)(4 - (c_biWidth*biBitCount / 8) % 4) % 4;;
		max_y = biHeight + 1 - max_y;
		min_y = biHeight + 1 - min_y;
		biSizeImage = c_biWidth*c_biHeight*(biBitCount / 8) + 54;
		fout.write((char*)&bfType, sizeof(bfType));
		fout.write((char*)&bfSize, sizeof(bfSize));
		fout.write((char*)&bfReserved1, sizeof(bfReserved1));
		fout.write((char*)&bfReserved2, sizeof(bfReserved2));
		fout.write((char*)&bfOffBits, sizeof(bfOffBits));

		fout.write((char*)&biSize, sizeof(biSize));
		fout.write((char*)&c_biWidth, sizeof(c_biWidth));
		fout.write((char*)&c_biHeight, sizeof(c_biHeight));
		fout.write((char*)&biPlanes, sizeof(biPlanes));
		fout.write((char*)&biBitCount, sizeof(biBitCount));
		fout.write((char*)&biCompression, sizeof(biCompression));
		fout.write((char*)&biSizeImage, sizeof(biSizeImage));
		fout.write((char*)&biXPelsPerMeter, sizeof(biXPelsPerMeter));
		fout.write((char*)&biYPelsPerMeter, sizeof(biYPelsPerMeter));
		fout.write((char*)&biClrUsed, sizeof(biClrUsed));
		fout.write((char*)&biClrImportant, sizeof(biClrImportant));


		pluszero = (unsigned int)(4 - (biWidth*biBitCount / 8) % 4) % 4;
		for (int i = max_y; i < min_y; i++) {
			for (int j = min_x; j < max_x; j++) {
				fout.write((char*)&image[i][j].B, sizeof(image[i][j].B));
				fout.write((char*)&image[i][j].G, sizeof(image[i][j].G));
				fout.write((char*)&image[i][j].R, sizeof(image[i][j].R));


			}
			for (int i = 0; i < pluszero_x; i++) {
				fout.put(0);
			}
		}
		// cout << "脨麓脠毛脥录脧帽鲁脡鹿娄" << endl;


		fout.close();
	}



	/*******脦脛录镁脨麓脠毛**********************************************************************/
	/*******脳陋鲁脡禄脪露脠**********************************************************************/

	void togray(double percentr, double percentg, double percentb) {
		this->percentr = percentr;
		this->percentg = percentg;
		this->percentb = percentb;
		if (biBitCount == 24) {
			for (int i = 0; i < biHeight; i++) {
				for (int j = 0; j < biWidth; j++) {
					char a = (char)(image[i][j].R*percentr + image[i][j].G*percentg + image[i][j].B*percentb);
					image[i][j].R = a;
					image[i][j].G = a;
					image[i][j].B = a;
				}
			}
		}
	}
	string get_dis(int category)
	{
		int NOR = 0;
		int SEV = 1;
		bool before = false;

		int temp = 0, sum = 0;
		for (int i = 0; i < biWidth; i++)
		{
			for (int j = 0; j < biHeight; j++)
			{

				sum += image[j][i].B;

				if (image[j][i].B == 255)
				{
					if (!before)
					{
						if (i == 0)
						{
							a.push_back(i);
						}
						else
						{
							a.push_back(i - 1);
						}
						before = true;
					}

				}
			}
			if (before&&temp == sum)
			{
				a.push_back(i);
				before = false;
			}
			if (before&&i == biWidth - 1)
			{
				a.push_back(i);
				before = false;
			}
			sum = 0;
		}
		for (int i = 1; i < a.size(); i++)
		{
			if (a[i] == a[i - 1])
			{
				a.erase(a.begin() + i - 1, a.begin() + i + 1);
			}
		}
		for (int h = 0; h < a.size(); h++)
		{
			for (int k = 0; k < biHeight; k++)
			{
				if (image[k][a[h]].B != 255)
				{
					image[k][a[h]].R = 255;
					image[k][a[h]].G = 255;
					image[k][a[h]].B = 0;
				}

			}
		}

		int r = 1;
		int max = 0;
		int min = biHeight - 1;

		while (1)
		{
			for (int j = 0; j < biHeight; j++)
			{
				for (int i = a[r - 1]; i < a[r]; i++)
				{
					if (image[j][i].B == 255)
					{
						if (j>max)
						{
							max = j;
						}
						if (j < min)
						{
							min = j;
						}
					}
				}
			}
			if (min == 0 && max != biHeight - 1)
			{
				max_min.push_back(min);
				max_min.push_back(max + 1);
			}
			if (min != 0 && max == biHeight - 1)
			{
				max_min.push_back(min - 1);
				max_min.push_back(max);
			}
			if (min == 0 && max == biHeight - 1)
			{
				max_min.push_back(min);
				max_min.push_back(max);
			}
			if (min != 0 && max != biHeight - 1)
			{
				max_min.push_back(min - 1);
				max_min.push_back(max + 1);
			}

			r = r + 2;
			if (r >= a.size())
			{
				break;
			}
			max = 0;
			min = biHeight - 1;
		}
		Hdistance = max_min[1] - (max_min.front() + 1);
		Wdistance = a[1] - (a.front() + 1);
		I_Oimage.resize(Hdistance);

		for (int r = 1; r < a.size(); r = r + 2)
		{
			for (int i = a[r - 1]; i < a[r]; i++)
			{
				if (image[max_min[r - 1]][i].B != 255)
				{
					image[max_min[r - 1]][i].R = 255;
					image[max_min[r - 1]][i].G = 255;
					image[max_min[r - 1]][i].B = 0;

				}
				if (image[max_min[r]][i].R != 255)
				{
					image[max_min[r]][i].R = 255;
					image[max_min[r]][i].G = 255;
					image[max_min[r]][i].B = 0;
				}

			}
		}
		string s;
		for (int i = 1; i < a.size(); i = i + 2)
		{
			IOtype(i - 1, i);
			if (category == SEV)
				s += recognise_sev(i - 1, i);
			else
				s += recognise(i - 1, i);
			I_Oimage.clear();
			IO_x = 0;

		}
		//double value = atof(s.c_str());
		max_min.clear();
		a.clear();
		cout << s << endl;
		return  s;
	}




	/*
	脠楼脭毛
	*/
	void GetOutPoint()
	{
		for (int i = 0; i <biHeight; i++)
		{
			for (int j = 0; j < biWidth; j++)
			{
				if (i>0 && j>0 && i < biHeight - 1 && j < biWidth - 1)//脰脨录盲虏驴路脰脠楼脭毛拢禄
				{
					if (image[i + 1][j].B + image[i + 1][j - 1].B + image[i - 1][j - 1].B +
						image[i - 1][j + 1].B + image[i][j + 1].B + image[i + 1][1 + j].B + image[i - 1][j].B + image[i][j - 1].B <= 765)
					{
						image[i][j].B = 0;
						image[i][j].R = 0;
						image[i][j].G = 0;
					}
				}
				if (i == 0 && j == 0)//脣脛赂枚碌茫
				{
					if (image[i + 1][j].B + image[i + 1][1 + j].B + image[i][j + 1].B <= 255)
					{
						image[i][j].B = 0;
						image[i][j].R = 0;
						image[i][j].G = 0;
					}
				}
				if (i == 0 && j == biWidth - 1)
				{
					if (image[i + 1][j].B + image[i + 1][j - 1].B + image[i][j - 1].B <= 255)
					{
						image[i][j].B = 0;
						image[i][j].R = 0;
						image[i][j].G = 0;
					}
				}
				if (i == biHeight - 1 && j == 0)
				{
					if (image[i][j + 1].B + image[i - 1][j + 1].B + image[i - 1][j].B <= 255)
					{
						image[i][j].B = 0;
						image[i][j].R = 0;
						image[i][j].G = 0;
					}
				}
				if (i == biHeight - 1 && j == biWidth - 1)
				{
					if (image[i - 1][j].B + image[i][j - 1].B + image[i - 1][j - 1].B <= 255)
					{
						image[i][j].B = 0;
						image[i][j].R = 0;
						image[i][j].G = 0;
					}
				}
				if (j == 0 && i > 0 && i<biHeight - 1)
				{
					if (image[i - 1][1 + j].B + image[i][j + 1].B + image[i - 1][j].B + image[i + 1][j].B + image[i + 1][j + 1].B <= 765)
					{
						image[i][j].B = 0;
						image[i][j].R = 0;
						image[i][j].G = 0;
					}
				}
				if (j == biWidth - 1 && i>0 && i<biHeight - 1)
				{
					if (image[i + 1][j].B + image[i + 1][j - 1].B + image[i][j - 1].B + image[i - 1][j - 1].B + image[i - 1][j].B <= 765)
					{
						image[i][j].B = 0;
						image[i][j].R = 0;
						image[i][j].G = 0;
					}
				}
				if (i == 0 && j>0 && j<biWidth - 1)
				{
					if (image[i + 1][j - 1].B + image[i + 1][j].B + image[i][j + 1].B + image[i + 1][j + 1].B + image[i][j - 1].B <= 765)
					{
						image[i][j].B = 0;
						image[i][j].R = 0;
						image[i][j].G = 0;
					}
				}
				if (i == biHeight - 1 && j>0 && j < biWidth - 1)
				{
					if (image[i][j - 1].B + image[i - 1][j - 1].B + image[i - 1][j].B + image[i - 1][j + 1].B + image[i][j + 1].B <= 765)
					{
						image[i][j].B = 0;
						image[i][j].R = 0;
						image[i][j].G = 0;
					}
				}

			}
		}

	}

	/*******卤盲鲁脡脢媒脳茅**********************************************************************/

	//鲁玫脢录禄炉脢媒脳茅
	void arrayinit() {
		array.resize(biWidth + 1);
		for (int i = 0; i<biWidth + 1; i++) {
			array[i].resize(biHeight + 1);
		}
	}

	void toarray(int x1,int x2,int y1,int y2) {
		//arrayinit();
		array.resize(x2-x1 + 1);
		for (int i = 0; i<x2-x1 + 1; i++) {
			array[i].resize(y2-y1 + 1);
		}
		for (int i = y1; i<y2; i++) {
			for (int j = x1; j < x2; j++) {
				if ((int)image[i][j].R == 255) {
					array[j-x1][i-y1] = 1;
				}
				else {
					array[j-x1][i-y1] = 0;
				}
			}
		}
		//printarray();
	}



	/*******卤盲鲁脡脢媒脳茅**********************************************************************/

	/*******脡煤鲁脡脳脰脛拢**********************************************************************/

	//鲁玫脢录禄炉脳脰脛拢  8*16
	void initfont() {
		font.resize(8);
		for (int i = 0; i<8; i++) {
			font[i].resize(16);
		}
	}

	//脨脗陆篓脳脰脛拢
	void buildfont(int x1, int x2, int y1, int y2) {
		double x, y, square;

		//double m=7,n=0;
		x = (double)(x2 - x1) / 8;
		y = (double)(y2 - y1) / 16;
		square = x*y;
		for (double m = 0; m<8; m++) {
			for (double n = 0; n<16; n++) {
				//录脝脣茫脙驴赂枚double
				double count = 0;
				for (int i = (int)(n*y); i<(int)(((n + 1)*y) + 1); i++) {
					for (int j = (int)(m*x); j<(int)(((m + 1)*x) + 1); j++) {
						//脜脨露脧麓脣碌茫脢脟路帽脦陋1
						if (array[j][i] == 1)
						{
							//脳贸脡脧陆脟
							if ((((n + 1)*y - i)<1) && ((m*x - j)<1) && ((m*x - j)>0)) {
								//cout << "脳贸脡脧陆脟脙忙禄媒脦陋:" << (j + 1 - m*x)*((n + 1)*y - i) << endl;
								count = count + (j + 1 - m*x)*((n + 1)*y - i);
							}
							//脫脪脡脧陆脟
							else if ((((n + 1)*y - i)<1) && (((m + 1)*x - j)<1)) {
								//cout << "脫脪脡脧陆脟脙忙禄媒脦陋:" << ((m + 1)*x - j)*((n + 1)*(y)-i) << endl;
								count = count + ((m + 1)*x - j)*((n + 1)*(y)-i);
							}
							//脫脪脧脗陆脟
							else if ((i + 1 - n*y >= 0) && (i + 1 - n*y<1) && ((m + 1)*x - j>0) && ((m + 1)*x - j <= 1)) {
								//cout << "脫脪脧脗陆脟脙忙禄媒脦陋:" << (i + 1 - n*y)*((m + 1)*x - j) << endl;
								count = count + (i + 1 - n*y)*((m + 1)*x - j);
							}
							//脳贸脧脗陆脟
							else if ((i + 1 - n*y >= 0) && (i + 1 - n*y<1) && (j + 1 - m*x>0) && (j + 1 - m*x<1)) {
								//cout << "脳贸脧脗陆脟脙忙禄媒脦陋:" << (i + 1 - n*y)*(j + 1 - m*x) << endl;
								count = count + (i + 1 - n*y)*(j + 1 - m*x);
							}
							//脳贸卤脽
							else if (((j + 1 - m*x)<1) && ((m*x - j)>0) && (((n + 1)*y - i) >= 1)) {
								//cout << "脳贸卤脽脙忙禄媒脦陋:" << (j + 1 - m*x) << endl;
								count = count + (j + 1 - m*x);
							}
							//脡脧卤脽
							else if ((((n + 1)*y - i)<1) && (((m + 1)*x - j) >= 1)) {
								//cout << "脡脧卤脽脙忙禄媒脦陋:" << ((n + 1)*y - i) << endl;
								count = count + ((n + 1)*y - i);
							}
							//脫脪卤脽
							else if ((((m + 1)*x - j)<1) && (((n + 1)*y - i) >= 1)) {
								//cout << "脫脪卤脽脙忙禄媒脦陋:" << ((m + 1)*x - j) << endl;
								count = count + ((m + 1)*x - j);
							}
							//脧脗卤脽
							else if ((i + 1 - n*y >= 0) && (i + 1 - n*y<1)) {
								//cout << "脧脗卤脽脙忙禄媒脦陋:" << (i + 1 - n*y) << endl;
								count = count + (i + 1 - n*y);
							}
							else {
								//cout << "脰脨录盲脥录脧帽脙忙禄媒脦陋:1" << endl;
								count++;
							}

							//cout<<array[j][i]<<endl;
						}
						else {
							//cout << "虏禄脢脟1" << endl;
						}
					}

				}

				if ((count / square)<0.5) {
					font[m][n] = 0;
				}
				else {
					font[m][n] = 1;
				}
				/*
				脧脠卤茅脌煤
				虏氓脠毛脦脼路篓脢露卤冒碌脛
				*/
			}
		}
		//cout << "guiyiyiwancheng";

		printfont();

	}

	//麓貌脫隆脳脰脛拢
	void printfont() {
		cout << font[7][0];
		for (int i = font[0].size() - 1; i >= 0; i--) {
			for (int j = 0; j<font.size(); j++) {
				cout << font[j][i];
			}
			cout << endl;
		}
		cout << endl;
	}


	void IOtype(int num1, int num2)
	{
		Hdistance = max_min[num2] - (max_min[num1] - 1);
		Wdistance = a[num2] - (a[num1] - 1);
		I_Oimage.resize(Hdistance);
		for (int i = max_min[num2]; i >= max_min[num1]; i--)
		{
			for (int j = a[num1]; j <= a[num2]; j++)
			{
				if (image[i][j].B == 255)
				{
					I_Oimage[IO_x].push_back(1);
				}
				else
				{
					I_Oimage[IO_x].push_back(0);
				}

			}
			IO_x++;

		}


	}
	string recognise(int num1, int num2)//脢露卤冒
	{
		int newheight = max_min[num2] - max_min[num1] + 1;
		int newwidth = a[num2] - a[num1] + 1;
		int h = newheight / 2;//赂脽露脠脰脨碌茫
		int cnt_width = 0;
		int cnt_point = 0;
		for (int j = 0; j < newheight; j++)
		{
			for (int i = 0; i < newwidth; i++)
			{

				if (I_Oimage[j][i] == 1)
				{
					cnt_point++;
				}
			}
		}
		cout << (double)((newwidth-2)*(newheight-2)) << endl << cnt_point << endl;

		//脣庐脝陆脰脨脧脽脟脨赂卯拢卢脮脪陆禄碌茫
		for (int j = 0; j < newwidth - 1; j++)
		{
			if (j == 0 && I_Oimage[h][j] == 1)
			{
				//脠么碌脷脪禄赂枚脧帽脣脴碌茫脦陋潞脷脡芦拢卢脭貌脠脧脦陋脢脟脪脩戮颅卤盲鹿媒脪禄麓脦脩脮脡芦拢卢cnt_width+1
				cnt_width++;

			}

			if (I_Oimage[h][j] != I_Oimage[h][j + 1])//脳贸脫脪脕陆脧帽脣脴碌茫脩脮脡芦虏禄脥卢拢卢脭貌脣碌脙梅卤盲脡芦
				cnt_width++;
		}
		if (I_Oimage[h][newwidth - 1] == 1)//脠么脳卯潞贸脪禄赂枚脧帽脣脴碌茫脦陋潞脷脡芦拢卢脪虏脠脧脦陋脢脟卤盲鹿媒脪禄麓脦脩脮脡芦
			cnt_width++;

		int w = newwidth / 2 - 1;//驴铆露脠脰脨碌茫
		int cnt_height = 0;

		//麓鹿脰卤脰脨脧脽脟脨赂卯拢篓脭颅脌铆脥卢脡脧拢漏
		for (int i = 0; i < newheight - 1; i++)
		{
			if (i == 0 && I_Oimage[i][w] == 1)
				cnt_height++;
			if (I_Oimage[i][w] != I_Oimage[i + 1][w])
				cnt_height++;
		}
		if (I_Oimage[newheight - 1][w] == 1)
			cnt_height++;

		int cnt_up_right = 0;//脫脪脡脧陆脟碌脛陆禄碌茫赂枚脢媒
		int cnt_down_right = 0;//脫脪脧脗陆脟碌脛陆禄碌茫赂枚脢媒
		int cnt_up_left = 0;//脳贸脡脧陆脟碌脛陆禄碌茫赂枚脢媒
		int cnt_down_left = 0;//脳贸脧脗陆脟碌脛陆禄碌茫赂枚脢媒
		for (int i = 0; i < newheight; i++)
		{
			for (int j = newwidth - 1; j >= 0; j--)//麓脫脫脪卤脽驴陋脢录虏茅脮脪潞脷脡芦脧帽脣脴碌茫
			{
				if (I_Oimage[i][j] == 1)
				{
					if (j > newwidth / 2)//脫脪虏驴路脰
					{
						if (i > newheight / 2)//脡脧虏驴路脰
							cnt_down_right++;
						else// 脧脗虏驴路脰
							cnt_up_right++;
					}

					break;//脪脩戮颅脮脪碌陆碌脷脪禄赂枚潞脷脡芦脧帽脣脴碌茫禄貌脮脪虏禄碌陆路没潞脧脤玫录镁碌脛脧帽脣脴碌茫脭貌break拢卢陆酶脠毛脧脗脪禄脨脨碌脛虏茅脮脪
				}
			}
		}
		for (int i = 0; i < newheight; i++)
		{
			for (int j = 0; j < newwidth / 2; j++)//麓脫脫脪卤脽驴陋脢录虏茅脮脪潞脷脡芦脧帽脣脴碌茫
			{
				if (I_Oimage[i][j] == 1)
				{
					if (i > newheight / 2)//脡脧虏驴路脰
						cnt_down_left++;
					else//脧脗虏驴路脰
						cnt_up_left++;
					break;//脪脩戮颅脮脪碌陆碌脷脪禄赂枚潞脷脡芦脧帽脣脴碌茫禄貌脮脪虏禄碌陆路没潞脧脤玫录镁碌脛脧帽脣脴碌茫脭貌break拢卢陆酶脠毛脧脗脪禄脨脨碌脛虏茅脮脪
				}
			}
		}

		double ratio_up_right = (double)cnt_up_right / (double)(newheight / 2);
		//脫脪脡脧虏驴路脻鲁枚脧脰碌脷脪禄赂枚潞脷脡芦脧帽脣脴碌茫碌脛卤脠脗脢
		double ratio_down_right = (double)cnt_down_right / (double)(newheight - (newheight / 2));
		//脫脪脧脗虏驴路脻鲁枚脧脰碌脷脪禄赂枚潞脷脡芦脧帽脣脴碌茫碌脛卤脠脗脢
		double ratio_up_left = (double)cnt_up_left / (double)(newheight / 2);
		double ratio_down_left = (double)cnt_down_left / (double)(newheight - (newheight / 2));


		int high_height = newheight * 1 / 7;
		int below_height = newheight * 5 / 6;//赂脽露脠6/7脦禄脰脙碌脛脟脨脧脽
		int cnt_below_height = 0;
		int cnt_high_height = 0;

		for (int j = 0; j < newwidth - 1; j++)
		{
			if (j == 0 && I_Oimage[below_height][j] == 1)
				cnt_below_height++;
			if (I_Oimage[below_height][j] != I_Oimage[below_height][j + 1])
				cnt_below_height++;
			if (j == 0 && I_Oimage[high_height][j] == 1)
				cnt_high_height++;
			if (I_Oimage[high_height][j] != I_Oimage[high_height][j + 1])
				cnt_high_height++;
		}


		if (cnt_height == 4 && cnt_width == 2)
			return "7";
		else if ((cnt_height == 4 ||cnt_height==6) && (cnt_width == 4 ||cnt_width==6) && ratio_up_left > 0.7&&ratio_down_left > 0.7&&ratio_up_right > 0.7&&ratio_down_right > 0.7)
			return "0";
		else if ((double)cnt_point / (double)((newwidth - 2)*(newheight - 2)) >= 0.7)
		{
			return ".";
		}
		else if (cnt_width == 2 && (cnt_height == 2 || cnt_height == 4))
		{
			return "1";
		}
		else if (cnt_height == 6 && ratio_down_right < 0.7&&ratio_up_left<0.5)
			return "2";
		else if (cnt_height == 6 && ratio_up_right > 0.7 && ratio_down_right > 0.7 && ratio_up_left < 0.7 && ratio_down_left < 0.7)
			return "3";
		else if (cnt_height == 4 && ratio_up_right > 0.7 && ratio_down_right > 0.7 && ratio_up_left<0.7 && ratio_down_left<0.7)
			return "4";
		else if (cnt_height == 6 && ratio_up_left > 0.7&&ratio_down_left < 0.7&&ratio_up_right<0.75&&ratio_down_right>0.7)
		{
			return "5";
		}
		else if (cnt_height == 6 && ratio_up_left > 0.7&&ratio_down_left > 0.7&&ratio_up_right<0.7&&ratio_down_right>0.7)
			return "6";

		else if (cnt_height == 6 && cnt_width == 2 && ratio_up_left > 0.7&&ratio_down_left > 0.7&&ratio_up_right > 0.7&&ratio_down_right > 0.7)
		{

			return "8";
		}
		else if (cnt_height == 6 && ratio_up_left > 0.7&&ratio_down_left < 0.7&&ratio_up_right>0.7&&ratio_down_right > 0.7)
			return "9";

		else
			toarray(a[num1], a[num2], max_min[num1], max_min[num2]);
			initfont();
			buildfont(a[num1],a[num2],max_min[num1],max_min[num2]);
			/*
			脨麓陆酶脢媒戮脻驴芒
			*/
			return "null";
	}

	string recognise_sev(int num1, int num2)
	{
		newheight = max_min[num2] - max_min[num1] - 1;
		newwidth = a[num2] - a[num1] - 1;
		int cnt_point = 0;
		int cnt_height = 0;
		int h_up = newheight / 4;//赂脽露脠脰脨碌茫
		int h_down = newheight / 4 * 3;
		int cnt_width_up = 0;
		int cnt_width_down = 0;
		int w = newwidth / 2 - 2;//驴铆露脠脰脨碌茫
		int cnt_up_right = 0;//脫脪脡脧陆脟碌脛陆禄碌茫赂枚脢媒
		int cnt_down_right = 0;//脫脪脧脗陆脟碌脛陆禄碌茫赂枚脢媒
		int cnt_up_left = 0;//脳贸脡脧陆脟碌脛陆禄碌茫赂枚脢媒
		int cnt_down_left = 0;//脳贸脧脗陆脟碌脛陆禄碌茫赂枚脢媒

		bool mid = false;
		if (I_Oimage[newheight / 2][newwidth / 2] == 1)
			mid = true;
		for (int i = 0; i < newheight; i++)
		{
			for (int j = newwidth - 1; j >= 0; j--)//麓脫脫脪卤脽驴陋脢录虏茅脮脪潞脷脡芦脧帽脣脴碌茫
			{
				if (I_Oimage[i][j] == 1)
				{
					if (j > newwidth / 2)//脫脪虏驴路脰
					{
						if (i > newheight / 2)//脡脧虏驴路脰
							cnt_down_right++;
						else// 脧脗虏驴路脰
							cnt_up_right++;
					}

					break;//脪脩戮颅脮脪碌陆碌脷脪禄赂枚潞脷脡芦脧帽脣脴碌茫禄貌脮脪虏禄碌陆路没潞脧脤玫录镁碌脛脧帽脣脴碌茫脭貌break拢卢陆酶脠毛脧脗脪禄脨脨碌脛虏茅脮脪
				}
			}
		}
		//脣庐脝陆脰脨脧脽脟脨赂卯拢卢脮脪陆禄碌茫
		for (int j = 0; j < newwidth - 1; j++)
		{
			if (j == 0 && I_Oimage[h_up][j] == 1)
			{
				cnt_width_up++;

			}
			if (I_Oimage[h_up][j] != I_Oimage[h_up][j + 1])//脳贸脫脪脕陆脧帽脣脴碌茫脩脮脡芦虏禄脥卢拢卢脭貌脣碌脙梅卤盲脡芦
				cnt_width_up++;
		}
		if (I_Oimage[h_up][newwidth - 1] == 1)//脠么脳卯潞贸脪禄赂枚脧帽脣脴碌茫脦陋潞脷脡芦拢卢脪虏脠脧脦陋脢脟卤盲鹿媒脪禄麓脦脩脮脡芦
			cnt_width_up++;
		for (int j = 0; j < newwidth - 1; j++)
		{
			if (j == 0 && I_Oimage[h_down][j] == 1)
			{
				cnt_width_down++;

			}
			if (I_Oimage[h_down][j] != I_Oimage[h_down][j + 1])//脳贸脫脪脕陆脧帽脣脴碌茫脩脮脡芦虏禄脥卢拢卢脭貌脣碌脙梅卤盲脡芦
				cnt_width_down++;
		}
		if (I_Oimage[h_down][newwidth - 1] == 1)//脠么脳卯潞贸脪禄赂枚脧帽脣脴碌茫脦陋潞脷脡芦拢卢脪虏脠脧脦陋脢脟卤盲鹿媒脪禄麓脦脩脮脡芦
			cnt_width_down++;
		for (int i = 0; i < newheight; i++)
		{
			for (int j = 0; j < newwidth / 2; j++)//麓脫脫脪卤脽驴陋脢录虏茅脮脪潞脷脡芦脧帽脣脴碌茫
			{
				if (I_Oimage[i][j] == 1)
				{
					if (i > newheight / 2)//脡脧虏驴路脰
						cnt_down_left++;
					else//脧脗虏驴路脰
						cnt_up_left++;
					break;//脪脩戮颅脮脪碌陆碌脷脪禄赂枚潞脷脡芦脧帽脣脴碌茫禄貌脮脪虏禄碌陆路没潞脧脤玫录镁碌脛脧帽脣脴碌茫脭貌break拢卢陆酶脠毛脧脗脪禄脨脨碌脛虏茅脮脪
				}
			}
		}
		//麓鹿脰卤脰脨脧脽脟脨赂卯拢篓脭颅脌铆脥卢脡脧拢漏
		for (int i = 0; i < newheight - 1; i++)
		{
			if (i == 0 && I_Oimage[i][w] == 1)
				cnt_height++;
			if (I_Oimage[i][w] != I_Oimage[i + 1][w])
				cnt_height++;
		}
		if (I_Oimage[newheight - 1][w] == 1)
			cnt_height++;

		for (int j = 0; j < newheight; j++)
		{
			for (int i = 0; i < newwidth; i++)
			{

				if (I_Oimage[j][i] == 1)
				{
					cnt_point++;
				}
			}
		}
		double ratio_up_right = (double)cnt_up_right / (double)(newheight / 2);
		//脫脪脡脧虏驴路脻鲁枚脧脰碌脷脪禄赂枚潞脷脡芦脧帽脣脴碌茫碌脛卤脠脗脢
		double ratio_down_right = (double)cnt_down_right / (double)(newheight - (newheight / 2));
		//脳贸脡脧脧脗虏驴路脻鲁枚脧脰碌脷脪禄赂枚潞脷脡芦脧帽脣脴碌茫碌脛卤脠脗脢
		double ratio_up_left = (double)cnt_up_left / (double)(newheight / 2);
		double ratio_down_left = (double)cnt_down_left / (double)(newheight - (newheight / 2));
		//cout << ratio_down_left << '\t' << cnt_height << "\t" << mid << endl;
		//cout<<(double)cnt_point / (double)(newwidth*newheight);
		if ((double)cnt_point / (double)(newwidth*newheight) >= 0.7&&cnt_height == 2)
		{
			return ".";
		}
		if (cnt_height == 4 && cnt_width_up == 2 && ratio_down_left >0.8)
			return "1";
		if (cnt_height == 2 && mid == true)
			return "4";
		if (cnt_height == 2 && mid == false)
			return "7";
		if (cnt_height == 4)
			return "0";
		if (cnt_height == 6 && cnt_width_up == 4 && cnt_width_down == 4 && mid == true)
			return "8";
		if (cnt_height == 6 && cnt_width_up == 4 && cnt_width_down == 2)
			return "9";
		if (cnt_height == 6 && cnt_width_up == 2 && cnt_width_down == 4)
			return "6";
		if (cnt_height == 6 && cnt_width_up == 2 && cnt_width_down == 2 && ratio_up_right > 0.8&&ratio_down_left > 0.8)
			return "2";
		if (cnt_height == 6 && cnt_width_up == 2 && cnt_width_down == 2 && ratio_up_right > 0.8&&ratio_down_right > 0.8)
			return "3";
		if (cnt_height == 6 && cnt_width_up == 2 && cnt_width_down == 2 && ratio_up_left > 0.8)
			return "5";
		else
		{
			toarray(a[num1], a[num2], max_min[num1], max_min[num2]);
			initfont();
			buildfont(a[num1], a[num2], max_min[num1], max_min[num2]);
			/*
			脨麓陆酶脢媒戮脻驴芒
			*/
			return "null";
		}

	}

	string match(char**a,char*b)
	{
		char temp[128];
		int x = 0;
		for (int i = 0; i < 8; i++)
		{
			for (int j = 0; j < 16; j++)
			{
				temp[x] = a[i][j];
				x++;
			}
		}
		int count = 0;

		if ((count / 128) >= 80)
		{
			return "驴脡脝楼脜盲";
		}
		else {
			return "脦脼路篓脝楼脜盲";
		}
	}
};
int main(int argc, char *argv[])
{

	string path = argv[1];
	path=path.insert(path.length() - 4, "_1");
	// cout << path << endl;
	char*p;
	p = (char*)path.data();
	int min_x = atoi(argv[2]);
	int max_y = atoi(argv[3]);
	int max_x = atoi(argv[4]);
	int min_y = atoi(argv[5]);
	// cout << min_x;
	Bmp bmp;
	bmp.BmpRead(argv[1]);
	cout<<"success"<<endl;
	bmp.BmpWrite_24(p, min_x, max_y, max_x, min_y);
	return 0;
}
