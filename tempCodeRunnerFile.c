#include <stdio.h>
#include <string.h>
#include <ctype.h>


int countVowels(char s[]) {
    int dem =0;
    int i;
    for (i=0;i<strlen(s);i++)
        {
            if (tolower(s[i])=='a')
                dem++;
            else
             if (tolower(s[i])=='i')
                dem++;
            else

             if (tolower(s[i])=='o')
                dem++;
            else
             if (tolower(s[i])=='e')
                dem++;
            else
             if (tolower(s[i])=='u')
                dem++;
         
        }
    return dem;
}
int main(){
    char s[500];
    // fgets(s,500,sdtin);
    gets(s);
    printf("%d",countVowels(s));
}