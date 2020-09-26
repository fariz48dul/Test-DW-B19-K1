
#include <iostream>
#include <conio.h>

using namespace std;

int main()
{
	int n, i, j, k, l=1, setengah;
      
		cout << "Input : ";
    	cin >> n;
		setengah = n/2;
    
		if(n < 3){
    		cout << "Tidak dapat membuat pola \n";
    	} else {
    		if(n%2==0){
        		for(i=0;i<setengah;i++){
        			for(j=setengah;j>i;j--){
    					cout << " ";
            		}
            		
            		for(k=1;k<=l;k++){
            			if(k==1 || k==l){
                			cout << "*";
            			}else{
                			cout << " ";
              			}
            		}

		            l+=2;
		            cout << endl;
          		}
          		
          		l -=2;
          		
          		for(i=0;i<setengah;i++){
					for(j=0;j<=i;j++){
						cout << " ";
					}
            
				for(j=l;j>0;j--){
            		if(j==1 || j==l){
                		cout << "*";
              		}else{
                		cout << " ";
              		}
            	}
            	
	            l-=2;
	            cout << endl;
          		}
        	}
        	else{        
          		for(i=0;i<setengah;i++){
            		for(j=setengah;j>=i;j--){
              			cout << " ";
            		}
            		
					for(k=1;k<=l;k++){
              			if(k==1 || k==l){
                			cout << "*";
              			}else{
                			cout <<" ";
              			}
            		}
            	l+=2;
            	cout << endl;
          		}
          		
          		for(i=0;i<n-setengah;i++){
            		for(j=0;j<=i;j++){
              			cout << " ";
            		}
            		for(j=l;j>0;j--){
              			if(j==l || j==1){
                			cout << "*";
              			}else{
                			cout << " ";
             			}
            		}
	            l-=2;
	            cout << endl;
          		}
        	}
    	}
}
