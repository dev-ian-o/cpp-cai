#include <iostream>
#include <stdio.h>

int main()
{
    int a = 5;	

    for(int a = 1; a < 10; a++){
    	for(int b = 0;b < a; b++){
    		cout<<"*\a";
    	}
    	cout<<"\n";

    }
    getchar();
}
