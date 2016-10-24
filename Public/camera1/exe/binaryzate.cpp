// #pragma once
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
	unsigned short bfType; //ÎÄ¼þÀàÐÍ£¬±ØÐëÊÇ×Ö·û´®"BM"£¬¼´0x424D
	unsigned int bfSize; //Ö¸¶¨ÎÄ¼þ´óÐ¡
	unsigned short bfReserved1; //±£Áô×Ö£¬²»¿¼ÂÇ
	unsigned short bfReserved2; //±£Áô×Ö£¬²»¿¼ÂÇ
	unsigned int bfOffBits; //´ÓÎÄ¼þÍ·µ½Î»Í¼Êý¾ÝµÄÆ«ÒÆ×Ö½ÚÊý
	unsigned int max_x, min_y, min_x, max_y;
	unsigned int biSize; //¸Ã½á¹¹µÄ³¤¶È
	unsigned int biWidth; //Í¼ÏñµÄ¿í¶È£¬µ¥Î»ÊÇÏñËØ
	unsigned int biHeight; //Í¼ÏñµÄ¸ß¶È£¬µ¥Î»ÊÇÏñËØ
	unsigned short biPlanes; //±ØÐëÊÇ1
	unsigned short biBitCount; //ÑÕÉ«Î»Êý£¬Èç1(ºÚ°×), 8(256É«), 24(Õæ²ÊÉ«)
	unsigned int biCompression; //Ñ¹ËõÀàÐÍ£¬ÈçBI_RGB,BI_RLE4
	unsigned int biSizeImage; //Êµ¼ÊÎ»Í¼Êý¾ÝÕ¼ÓÃµÄ×Ö½ÚÊý
	unsigned int biXPelsPerMeter; //Ë®Æ½·Ö±æÂÊ
	unsigned int biYPelsPerMeter; //´¹Ö±·Ö±æÂÊ
	unsigned int biClrUsed; //Êµ¼ÊÊ¹ÓÃµÄÑÕÉ«Êý
	unsigned int biClrImportant; //ÖØÒªµÄÑÕÉ«Êý
	unsigned int newheight;
	unsigned int newwidth;
	unsigned int mocR;
	unsigned int mocG;
	unsigned int mocB;
	unsigned char readTemp1;
	unsigned char readTemp2;
	unsigned char tempG1, tempG2, tempRGB1, tempRGB2, temp;
	//³õÊ¼»¯´ýÉú³ÉµÄ×ÖÄ£
	vector<vector <int> > font;

	//³õÊ¼»¯ÐèÒª¼Ä´æµÄÊý×é
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
	double percentr, percentg, percentb;//»Ò¶È±ÈÀý
	//¶þÖµ»¯µÄ²ÎÊý
	int totwocanshu;
	int yuzhi, yuzhi1, yuzhi2;
	//MYSQL *conn;
	//MYSQL_RES *result;
	//MYSQL_ROW row;
	//MYSQL_FIELD *field;
	int num_fields;
	int num = 0;//bmpÍ¼ÃüÃû
	int come = false;//ÇÐ¸îÊúÏßµÄÅÐ¶Ï
	string s, str, sql;//sqlÓï¾ä
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
	/*******ÎÄ¼þ¶ÁÈë**********************************************************************/
	void BmpRead(char *path){
		this->path = path;
		ifstream fin(path, ios::binary);
		if (!fin){
			cerr << "ÎÞ·¨´ò¿ª" << endl;
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
		//½«Í¼Æ¬¶Á³É¶þÎ¬Êý×é
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
			cerr << "²»ÊÇ16Î»Éî¶È";
			// exit(1);
		}
	}

	void BmpRead_24(char *path) {
		this->path = path;
		ifstream fin(path, ios::binary);
		if (!fin) {
			cerr << "ÎÞ·¨´ò¿ª" << endl;
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
		//½«Í¼Æ¬¶Á³É¶þÎ¬Êý×é
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
	/*******ÎÄ¼þ¶ÁÈë**********************************************************************/
	/*******ÎÄ¼þÐ´Èë**********************************************************************/
	void BmpWrite_24(char* path) {
		this->path = path;
		ofstream fout(path, ios::binary);
		if (!fout) {
			cerr << "ÎÞ·¨Ð´ÈëÎÄ¼þ" << endl;
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
			// cout << "Ð´ÈëÍ¼Ïñ³É¹¦" << endl;
		}

		fout.close();
	}


	void BmpWrite(char* path) {
		this->path = path;
		ofstream fout(path, ios::binary);
		if (!fout) {
			cerr << "ÎÞ·¨Ð´ÈëÎÄ¼þ" << endl;
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
			cerr << "ÎÞ·¨Ð´ÈëÎÄ¼þ" << endl;
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
			cerr << "ÎÞ·¨Ð´ÈëÎÄ¼þ" << endl;
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
		// cout << "Ð´ÈëÍ¼Ïñ³É¹¦" << endl;


		fout.close();
	}



	/*******ÎÄ¼þÐ´Èë**********************************************************************/
	/*******×ª³É»Ò¶È**********************************************************************/
	void togray()
	{
		int gray_t;
		for (int i = 0; i<biHeight; i++) {
			for (int j = 0; j<biWidth; j++) {
				gray_t = (image[i][j].R + image[i][j].G + image[i][j].B) / 3;
				image[i][j].R = gray_t;
				image[i][j].G = gray_t;
				image[i][j].B = gray_t;
			}
		}
	}
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



	/*******×ª³É»Ò¶È**********************************************************************/
	/*******¶þÖµ»¯**********************************************************************/
	//½«Í¼Æ¬¶þÖµ ÖÐ¼äÖµËã·¨ºÍÆ½¾ùÖµËã·¨
	// void totwo(int totwocanshu,int canshu) {
	// 	this->totwocanshu = totwocanshu;
	// 	switch (totwocanshu)
	// 	{
	// 		//ÖÐ¼äÖµËã·¨
	// 	          case 1:
    // 				yuzhi = canshu;break;
    //
	// 	}
	// 	yuzhiyunsuan(yuzhi);
	// }
	int getBestNumber()
	{
		int k = 0;
		int max = 0, min = 255;
		for (int i = 0; i < biHeight; i++)
		{
			for (int j = 0; j < biWidth; j++)
			{
				if (image[i][j].B>max)
				{
					max = image[i][j].B;
				}
				if (image[i][j].B <= min)
				{
					min = image[i][j].B;
				}
			}
		}
		double T = (max + min) / 2;
		double T1 = 0;
		double T2 = 0;
		while (1)
		{
			int sum1 = 0, cnt1 = 0;
			int sum2 = 0, cnt2 = 0;
			k++;
			for (int i = 0; i < biHeight; i++)
			{
				for (int j = 0; j < biWidth; j++)
				{
					if (image[i][j].B < T)
					{
						cnt1++;
						sum1 += image[i][j].B;
					}
					else
					{
						cnt2++;
						sum2 += image[i][j].B;
					}
				}
			}
			T1 = double(sum1 / cnt1);
			T2 = double(sum2 / cnt2);
			if (T1 - T2 <= 0.1)
			{
				break;
			}
			T = (T1 + T2) / 2;
		}
		return (T1 + T2) / 2;

	}
	void modify_xy()
	{
		double a, b;
		b = getBestNumber();
		for (int i = 0; i < biHeight; i++)
		{
			for (int j = 0; j < biWidth; j++)
			{
				a = image[i][j].R * 0.299 + image[i][j].G*0.587 + image[i][j].B*0.114;

				if (a>b)
				{
					blackNum++;
					image[i][j].B = 0;
					image[i][j].G = 0;
					image[i][j].R = 0;
				}
				else
				{
					whiteNum++;
					image[i][j].B = 255;
					image[i][j].G = 255;
					image[i][j].R = 255;
				}

			}
		}
		if (whiteNum > blackNum)
		{
			inverse();
		}
	}
	void inverse()//·´É«
	{
		for (int i = 0; i < biHeight; i++)
		{
			for (int j = 0; j < biWidth; j++)
			{
				if (image[i][j].B == 0)
				{
					image[i][j].B = 255;
					image[i][j].G = 255;
					image[i][j].R = 255;
				}
				else
				{
					image[i][j].B = 0;
					image[i][j].G = 0;
					image[i][j].R = 0;
				}
			}
		}
		whiteNum = 0;
		blackNum = 0;

	}
	//¸³ÓèÍ¼Æ¬µÄãÐÖµËã·¨
	void totwo(int totwocanshu, int yuzhi) {
		this->totwocanshu = totwocanshu;
		if (totwocanshu == 4) {
			this->yuzhi = yuzhi;
			yuzhiyunsuan(yuzhi);
		}
		else {
			cerr << "µ÷ÓÃ²ÎÊý´íÎó";
			// exit(0);
		}
	}

	void yuzhiyunsuan(int yuzhi) {
		this->yuzhi = yuzhi;
		if (biBitCount == 24) {
			for (int i = 0; i < biHeight; i++) {
				for (int j = 0; j<biWidth; j++) {
					if (image[i][j].R>yuzhi) {
						image[i][j].R = 255;
						image[i][j].G = 255;
						image[i][j].B = 255;
						whiteNum++;
					}
					else {
						image[i][j].R = 0;
						image[i][j].G = 0;
						image[i][j].B = 0;
						blackNum++;
					}
				}
			}
		}
		if (whiteNum > blackNum)
		{
			inverse();
		}
	}

	//¸³ÓèãÐÖµÇø¼äËã·¨
	void totwo(int totwocanshu, int yuzhi1, int yuzhi2) {
		if (totwocanshu == 5) {
			this->yuzhi1 = yuzhi1;
			this->yuzhi2 = yuzhi2;
			if (yuzhi1 > yuzhi2) {
				int temp = yuzhi1;
				yuzhi1 = yuzhi2;
				yuzhi2 = temp;
			}
			for (int i = 0; i < biHeight; i++) {
				for (int j = 0; j<biWidth; j++) {
					if (image[i][j].R>yuzhi1&&image[i][j].R < yuzhi2) {
						image[i][j].R = 255;
						image[i][j].G = 255;
						image[i][j].B = 255;
					}
					else {
						image[i][j].R = 0;
						image[i][j].G = 0;
						image[i][j].B = 0;
					}
				}
			}
		}
		else {
			cerr << "µ÷ÓÃ²ÎÊý´íÎó" << endl;
			// exit(1);
		}
	}
	/*******¶þÖµ»¯**********************************************************************/



	/*
	È¥Ôë
	*/
	void GetOutPoint()
	{
		for (int i = 0; i <biHeight; i++)
		{
			for (int j = 0; j < biWidth; j++)
			{
				if (i>0 && j>0 && i < biHeight - 1 && j < biWidth - 1)//ÖÐ¼ä²¿·ÖÈ¥Ôë£»
				{
					if (image[i + 1][j].B + image[i + 1][j - 1].B + image[i - 1][j - 1].B +
						image[i - 1][j + 1].B + image[i][j + 1].B + image[i + 1][1 + j].B + image[i - 1][j].B + image[i][j - 1].B <= 765)
					{
						image[i][j].B = 0;
						image[i][j].R = 0;
						image[i][j].G = 0;
					}
				}
				if (i == 0 && j == 0)//ËÄ¸öµã
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

	/*******±ä³ÉÊý×é**********************************************************************/

	//³õÊ¼»¯Êý×é
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

	void printarray() {
		for (int i = array[0].size() - 1; i >= 0; i--) {
			for (int j = 0; j<array.size(); j++) {
				cout << array[j][i];
			}
			cout << endl;
		}
		cout << endl;
	}

	/*******±ä³ÉÊý×é**********************************************************************/

	/*******Éú³É×ÖÄ£**********************************************************************/

	//³õÊ¼»¯×ÖÄ£  8*16
	void initfont() {
		font.resize(8);
		for (int i = 0; i<8; i++) {
			font[i].resize(16);
		}
	}

	//ÐÂ½¨×ÖÄ£
	void buildfont(int x1, int x2, int y1, int y2) {
		double x, y, square;

		//double m=7,n=0;
		x = (double)(x2 - x1) / 8;
		y = (double)(y2 - y1) / 16;
		square = x*y;
		for (double m = 0; m<8; m++) {
			for (double n = 0; n<16; n++) {
				//¼ÆËãÃ¿¸ödouble
				double count = 0;
				for (int i = (int)(n*y); i<(int)(((n + 1)*y) + 1); i++) {
					for (int j = (int)(m*x); j<(int)(((m + 1)*x) + 1); j++) {
						//ÅÐ¶Ï´ËµãÊÇ·ñÎª1
						if (array[j][i] == 1)
						{
							//×óÉÏ½Ç
							if ((((n + 1)*y - i)<1) && ((m*x - j)<1) && ((m*x - j)>0)) {
								//cout << "×óÉÏ½ÇÃæ»ýÎª:" << (j + 1 - m*x)*((n + 1)*y - i) << endl;
								count = count + (j + 1 - m*x)*((n + 1)*y - i);
							}
							//ÓÒÉÏ½Ç
							else if ((((n + 1)*y - i)<1) && (((m + 1)*x - j)<1)) {
								//cout << "ÓÒÉÏ½ÇÃæ»ýÎª:" << ((m + 1)*x - j)*((n + 1)*(y)-i) << endl;
								count = count + ((m + 1)*x - j)*((n + 1)*(y)-i);
							}
							//ÓÒÏÂ½Ç
							else if ((i + 1 - n*y >= 0) && (i + 1 - n*y<1) && ((m + 1)*x - j>0) && ((m + 1)*x - j <= 1)) {
								//cout << "ÓÒÏÂ½ÇÃæ»ýÎª:" << (i + 1 - n*y)*((m + 1)*x - j) << endl;
								count = count + (i + 1 - n*y)*((m + 1)*x - j);
							}
							//×óÏÂ½Ç
							else if ((i + 1 - n*y >= 0) && (i + 1 - n*y<1) && (j + 1 - m*x>0) && (j + 1 - m*x<1)) {
								//cout << "×óÏÂ½ÇÃæ»ýÎª:" << (i + 1 - n*y)*(j + 1 - m*x) << endl;
								count = count + (i + 1 - n*y)*(j + 1 - m*x);
							}
							//×ó±ß
							else if (((j + 1 - m*x)<1) && ((m*x - j)>0) && (((n + 1)*y - i) >= 1)) {
								//cout << "×ó±ßÃæ»ýÎª:" << (j + 1 - m*x) << endl;
								count = count + (j + 1 - m*x);
							}
							//ÉÏ±ß
							else if ((((n + 1)*y - i)<1) && (((m + 1)*x - j) >= 1)) {
								//cout << "ÉÏ±ßÃæ»ýÎª:" << ((n + 1)*y - i) << endl;
								count = count + ((n + 1)*y - i);
							}
							//ÓÒ±ß
							else if ((((m + 1)*x - j)<1) && (((n + 1)*y - i) >= 1)) {
								//cout << "ÓÒ±ßÃæ»ýÎª:" << ((m + 1)*x - j) << endl;
								count = count + ((m + 1)*x - j);
							}
							//ÏÂ±ß
							else if ((i + 1 - n*y >= 0) && (i + 1 - n*y<1)) {
								//cout << "ÏÂ±ßÃæ»ýÎª:" << (i + 1 - n*y) << endl;
								count = count + (i + 1 - n*y);
							}
							else {
								//cout << "ÖÐ¼äÍ¼ÏñÃæ»ýÎª:1" << endl;
								count++;
							}

							//cout<<array[j][i]<<endl;
						}
						else {
							//cout << "²»ÊÇ1" << endl;
						}
					}

				}
				//¿ªÊ¼¼ÆËãÓ¦¸ÃÊä³öÊ²Ã´
		/*		cout << count << endl;
				cout << square << endl;
				cout << count / square << endl;*/
				if ((count / square)<0.5) {
					font[m][n] = 0;
				}
				else {
					font[m][n] = 1;
				}
				/*
				ÏÈ±éÀú
				²åÈëÎÞ·¨Ê¶±ðµÄ
				*/
			}
		}
		//cout << "guiyiyiwancheng";

		//printfont();

	}

	//´òÓ¡×ÖÄ£
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
	string recognise(int num1, int num2)//Ê¶±ð
	{
		int newheight = max_min[num2] - max_min[num1] + 1;
		int newwidth = a[num2] - a[num1] + 1;
		int h = newheight / 2;//¸ß¶ÈÖÐµã
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
		//cout << (double)((newwidth-2)*(newheight-2)) << endl << cnt_point << endl;

		//Ë®Æ½ÖÐÏßÇÐ¸î£¬ÕÒ½»µã
		for (int j = 0; j < newwidth - 1; j++)
		{
			if (j == 0 && I_Oimage[h][j] == 1)
			{
				//ÈôµÚÒ»¸öÏñËØµãÎªºÚÉ«£¬ÔòÈÏÎªÊÇÒÑ¾­±ä¹ýÒ»´ÎÑÕÉ«£¬cnt_width+1
				cnt_width++;

			}

			if (I_Oimage[h][j] != I_Oimage[h][j + 1])//×óÓÒÁ½ÏñËØµãÑÕÉ«²»Í¬£¬ÔòËµÃ÷±äÉ«
				cnt_width++;
		}
		if (I_Oimage[h][newwidth - 1] == 1)//Èô×îºóÒ»¸öÏñËØµãÎªºÚÉ«£¬Ò²ÈÏÎªÊÇ±ä¹ýÒ»´ÎÑÕÉ«
			cnt_width++;

		int w = newwidth / 2 - 1;//¿í¶ÈÖÐµã
		int cnt_height = 0;

		//´¹Ö±ÖÐÏßÇÐ¸î£¨Ô­ÀíÍ¬ÉÏ£©
		for (int i = 0; i < newheight - 1; i++)
		{
			if (i == 0 && I_Oimage[i][w] == 1)
				cnt_height++;
			if (I_Oimage[i][w] != I_Oimage[i + 1][w])
				cnt_height++;
		}
		if (I_Oimage[newheight - 1][w] == 1)
			cnt_height++;

		int cnt_up_right = 0;//ÓÒÉÏ½ÇµÄ½»µã¸öÊý
		int cnt_down_right = 0;//ÓÒÏÂ½ÇµÄ½»µã¸öÊý
		int cnt_up_left = 0;//×óÉÏ½ÇµÄ½»µã¸öÊý
		int cnt_down_left = 0;//×óÏÂ½ÇµÄ½»µã¸öÊý
		for (int i = 0; i < newheight; i++)
		{
			for (int j = newwidth - 1; j >= 0; j--)//´ÓÓÒ±ß¿ªÊ¼²éÕÒºÚÉ«ÏñËØµã
			{
				if (I_Oimage[i][j] == 1)
				{
					if (j > newwidth / 2)//ÓÒ²¿·Ö
					{
						if (i > newheight / 2)//ÉÏ²¿·Ö
							cnt_down_right++;
						else// ÏÂ²¿·Ö
							cnt_up_right++;
					}

					break;//ÒÑ¾­ÕÒµ½µÚÒ»¸öºÚÉ«ÏñËØµã»òÕÒ²»µ½·ûºÏÌõ¼þµÄÏñËØµãÔòbreak£¬½øÈëÏÂÒ»ÐÐµÄ²éÕÒ
				}
			}
		}
		for (int i = 0; i < newheight; i++)
		{
			for (int j = 0; j < newwidth / 2; j++)//´ÓÓÒ±ß¿ªÊ¼²éÕÒºÚÉ«ÏñËØµã
			{
				if (I_Oimage[i][j] == 1)
				{
					if (i > newheight / 2)//ÉÏ²¿·Ö
						cnt_down_left++;
					else//ÏÂ²¿·Ö
						cnt_up_left++;
					break;//ÒÑ¾­ÕÒµ½µÚÒ»¸öºÚÉ«ÏñËØµã»òÕÒ²»µ½·ûºÏÌõ¼þµÄÏñËØµãÔòbreak£¬½øÈëÏÂÒ»ÐÐµÄ²éÕÒ
				}
			}
		}

		double ratio_up_right = (double)cnt_up_right / (double)(newheight / 2);
		//ÓÒÉÏ²¿·Ý³öÏÖµÚÒ»¸öºÚÉ«ÏñËØµãµÄ±ÈÂÊ
		double ratio_down_right = (double)cnt_down_right / (double)(newheight - (newheight / 2));
		//ÓÒÏÂ²¿·Ý³öÏÖµÚÒ»¸öºÚÉ«ÏñËØµãµÄ±ÈÂÊ
		double ratio_up_left = (double)cnt_up_left / (double)(newheight / 2);
		double ratio_down_left = (double)cnt_down_left / (double)(newheight - (newheight / 2));



		//¡°0¡±¡¢¡°4¡±µÄÅÐ¶Ï
		int high_height = newheight * 1 / 7;
		int below_height = newheight * 5 / 6;//¸ß¶È6/7Î»ÖÃµÄÇÐÏß
		int cnt_below_height = 0;
		int cnt_high_height = 0;
		//Í¨¹ý¹Û²ì´ó²¿·ÖµÄÓ¡Ë¢ÌåÊý×Ö4£¬´¹Ö±ÖÐÏßÒ»°ã²»Óë4µÄÊúÏßÖØºÏ£¬²¢ÇÒ4ÉÏ²¿·Ö¶àÎª·â±Õ
		//Êý×Ö0¡¢4ºáÇÐºÍÊúÇÐµÄÑÕÉ«±ä»¯Öµ¶¼ÊÇ4
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
		//cout<< cnt_width << '\t' << ratio_up_right << '\t' << ratio_down_right << '\t' << ratio_down_left<<'\t'<<ratio_up_left << endl;
		//¡°1¡±µÄÅÐ¶Ï
		//ÓÉÓÚÊý×Ö1ºáÇÐ¶¼ÊÇ2¸öÑÕÉ«±ä»¯Öµ£¬ÊúÇÐÒ»°ãÇé¿öÏÂÊÇ2¸ö±ä»¯Öµ£¬µ«¿ÉÄÜÊÇ4¸ö±ä»¯Öµ£¨Ð±×ÅµÄ1£¬Í¼13£©

		//4ºÍ0×î´óµÄÇø±ðÔÚÓÚÊý×ÖµÄÏÂ°ë²¿·Ö£¬0ÈÔÈ»Îª4¸öÑÕÉ«±ä»¯Êý£¬¶ø4±ä³É2¸ö£¨Ô­ÀíÍ¬ÉÏ£©


		//ÌØÊâÇé¿öµÄ4µÄÅÐ¶Ï£¬ÉÏ²¿·Ö¿ª¿Ú



		//cout << cnt_height << '\t' << ratio_up_right << '\t' << ratio_down_right << '\t' << ratio_up_left << '\t' << ratio_down_left << endl;
		//ÒÔÏÂµÄÅÐ¶ÏÌõ¼þÍ¨¹ýÊý¾ÝµÄ·ÖÎöµÃ³ö
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
			Ð´½øÊý¾Ý¿â
			*/
			return "null";
	}

	string recognise_sev(int num1, int num2)
	{
		newheight = max_min[num2] - max_min[num1] - 1;
		newwidth = a[num2] - a[num1] - 1;
		int cnt_point = 0;
		int cnt_height = 0;
		int h_up = newheight / 4;//¸ß¶ÈÖÐµã
		int h_down = newheight / 4 * 3;
		int cnt_width_up = 0;
		int cnt_width_down = 0;
		int w = newwidth / 2 - 2;//¿í¶ÈÖÐµã
		int cnt_up_right = 0;//ÓÒÉÏ½ÇµÄ½»µã¸öÊý
		int cnt_down_right = 0;//ÓÒÏÂ½ÇµÄ½»µã¸öÊý
		int cnt_up_left = 0;//×óÉÏ½ÇµÄ½»µã¸öÊý
		int cnt_down_left = 0;//×óÏÂ½ÇµÄ½»µã¸öÊý

		bool mid = false;
		if (I_Oimage[newheight / 2][newwidth / 2] == 1)
			mid = true;
		for (int i = 0; i < newheight; i++)
		{
			for (int j = newwidth - 1; j >= 0; j--)//´ÓÓÒ±ß¿ªÊ¼²éÕÒºÚÉ«ÏñËØµã
			{
				if (I_Oimage[i][j] == 1)
				{
					if (j > newwidth / 2)//ÓÒ²¿·Ö
					{
						if (i > newheight / 2)//ÉÏ²¿·Ö
							cnt_down_right++;
						else// ÏÂ²¿·Ö
							cnt_up_right++;
					}

					break;//ÒÑ¾­ÕÒµ½µÚÒ»¸öºÚÉ«ÏñËØµã»òÕÒ²»µ½·ûºÏÌõ¼þµÄÏñËØµãÔòbreak£¬½øÈëÏÂÒ»ÐÐµÄ²éÕÒ
				}
			}
		}
		//Ë®Æ½ÖÐÏßÇÐ¸î£¬ÕÒ½»µã
		for (int j = 0; j < newwidth - 1; j++)
		{
			if (j == 0 && I_Oimage[h_up][j] == 1)
			{
				cnt_width_up++;

			}
			if (I_Oimage[h_up][j] != I_Oimage[h_up][j + 1])//×óÓÒÁ½ÏñËØµãÑÕÉ«²»Í¬£¬ÔòËµÃ÷±äÉ«
				cnt_width_up++;
		}
		if (I_Oimage[h_up][newwidth - 1] == 1)//Èô×îºóÒ»¸öÏñËØµãÎªºÚÉ«£¬Ò²ÈÏÎªÊÇ±ä¹ýÒ»´ÎÑÕÉ«
			cnt_width_up++;
		for (int j = 0; j < newwidth - 1; j++)
		{
			if (j == 0 && I_Oimage[h_down][j] == 1)
			{
				cnt_width_down++;

			}
			if (I_Oimage[h_down][j] != I_Oimage[h_down][j + 1])//×óÓÒÁ½ÏñËØµãÑÕÉ«²»Í¬£¬ÔòËµÃ÷±äÉ«
				cnt_width_down++;
		}
		if (I_Oimage[h_down][newwidth - 1] == 1)//Èô×îºóÒ»¸öÏñËØµãÎªºÚÉ«£¬Ò²ÈÏÎªÊÇ±ä¹ýÒ»´ÎÑÕÉ«
			cnt_width_down++;
		for (int i = 0; i < newheight; i++)
		{
			for (int j = 0; j < newwidth / 2; j++)//´ÓÓÒ±ß¿ªÊ¼²éÕÒºÚÉ«ÏñËØµã
			{
				if (I_Oimage[i][j] == 1)
				{
					if (i > newheight / 2)//ÉÏ²¿·Ö
						cnt_down_left++;
					else//ÏÂ²¿·Ö
						cnt_up_left++;
					break;//ÒÑ¾­ÕÒµ½µÚÒ»¸öºÚÉ«ÏñËØµã»òÕÒ²»µ½·ûºÏÌõ¼þµÄÏñËØµãÔòbreak£¬½øÈëÏÂÒ»ÐÐµÄ²éÕÒ
				}
			}
		}
		//´¹Ö±ÖÐÏßÇÐ¸î£¨Ô­ÀíÍ¬ÉÏ£©
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
		//ÓÒÉÏ²¿·Ý³öÏÖµÚÒ»¸öºÚÉ«ÏñËØµãµÄ±ÈÂÊ
		double ratio_down_right = (double)cnt_down_right / (double)(newheight - (newheight / 2));
		//×óÉÏÏÂ²¿·Ý³öÏÖµÚÒ»¸öºÚÉ«ÏñËØµãµÄ±ÈÂÊ
		double ratio_up_left = (double)cnt_up_left / (double)(newheight / 2);
		double ratio_down_left = (double)cnt_down_left / (double)(newheight - (newheight / 2));
		//<< ratio_down_left << '\t' << cnt_height << "\t" << mid << endl;
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
			Ð´½øÊý¾Ý¿â
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
			/*
			´ÓÊý¾Ý¿âÄÃ³ö¶ÔÓ¦µÄÖµreturn
			*/
			return "¿ÉÆ¥Åä";
		}
		else {
			return "ÎÞ·¨Æ¥Åä";
		}
	}

	//void getSmallPic()
	//{
	//	result = mysql_store_result(conn);
	//	num_fields = mysql_num_fields(result); // ¼ÇÂ¼ÏîÊý
	//	while (row = mysql_fetch_row(result))
	//	{
	//		BmpRead("b.bmp");
	//		string instument_id = row[0];
	//		string camera_id = row[1];
	//		if (atoi(row[2]) == 0)//ÅÐ¶ÏÐÂ¾ÉÐ¡Í¼£¬0ÎªÐÂ£¬1Îª¾É
	//		{
	//			sql = "UPDATE instrument SET judge=1 WHERE id=" + instument_id + ";";//»ñÈ¡Ö®ºó½«0ÖÃÎª1£¬´ú±í´¦ÀíÁË
	//			if (mysql_query(conn, sql.c_str())) {
	//				cout << "Error " << mysql_errno(conn) << ":" << mysql_error(conn) << endl;
	//				exit(EXIT_FAILURE);
	//			}
	//			char c[8];
	//			_itoa_s(num, c, 16);
	//			s = c;
	//			str = s + ".bmp";//¸øÐÂÐ¡Í¼ÃüÃû
	//			BmpWrite((char*)str.c_str(), atoi(row[8]), atoi(row[9]), atoi(row[10]), atoi(row[11]));//1£¬2£¬3£¬4£¬´ú±íÐ¡Í¼×ø±ê¿ÉÖÆ¶¨
	//			getPicData(str, instument_id, atoi(row[4]), atoi(row[5]), atoi(row[6]),atof(row[7]));//5ÊÇ¶þÖµÑ¡Ïî£¬6ÊÇãÐÖµ£¬7ÊÇÊý×ÖÀàÐÍ
	//			num++;
	//		}
	//	}
	//}

	//void getPicData(string new_str, string instument_id, int tobin_id, int grayvalue, int wordtype,double angle)
	//{
	//	BmpRead((char*)new_str.c_str());
	//	togray(0.299, 0.587, 0.144);
	//	if (tobin_id == 1)
	//	{
	//		modify_xy();
	//	}
	//	if (tobin_id == 2 || tobin_id == 3)
	//	{
	//		totwo(tobin_id);
	//	}
	//	if (tobin_id == 4)
	//	{
	//		totwo(tobin_id, grayvalue);
	//	}
	//	sql = "INSERT data VALUES(" + instument_id + "," +"NOW(),"+ get_dis(wordtype) + ");";
	//	if (mysql_query(conn, sql.c_str())) {
	//		cout << "Error " << mysql_errno(conn) << ":" << mysql_error(conn) << endl;
	//		exit(EXIT_FAILURE);
	//	}
	//}
};

int main(int argc,char *a[])
{
	string path = a[1];
	path=path.insert(path.length() - 4, "_1");
	// cout << path << endl;
	char*p;
	p = (char*)path.data();

	Bmp bmp;
	bmp.BmpRead_24(a[1]);
	if (atof(a[2]) == 0)
	{
        int z=atof(a[3]);
		bmp.modify_xy();
        bmp.get_dis(z);
	}
    else if(atof(a[2]) == 1){
        int z=atof(a[4]);
        bmp.totwo(4,atoi(a[3]));
        bmp.get_dis(z);
    }
	else
	{
        int z=atof(a[5]);
		int x = atoi(a[3]);
		int y = atoi(a[4]);
		bmp.totwo(5, x, y);
        bmp.get_dis(z);
	}
	//bmp.togray();
	bmp.BmpWrite_24(p);
	cout<<"success"<<endl;


	return 0;
}
