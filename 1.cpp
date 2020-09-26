#include <stdio.h> 
#include <iostream>
#include <string.h> 
#include <stdlib.h> 
#include <math.h> 
#include <conio.h>

using namespace std;

int main() {  

int x,y,z; 

 cout << "Masukkan Nama Kamu :  "; 
  
 char str[100];  gets(str);  
 
 cout << "\nKode Binner Nama Kamu adalah: ", str;  
 
	for(x=0;str[x]!='\0';x++){   
	 	z=str[x];   
	 	for(y=7;y+1>0;y--){
	    
		 	if(z>=(1<<y)){     
		 		z=z-(1<<y);     
		 			cout << "1";    
		 	} else cout << "0";
	 	}cout << " ";  
 	}
} 
