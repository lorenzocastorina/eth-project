#include <iostream>
#include <cstring>
#include <unistd.h>

void vulnerable(char *tmp) {
	char input[400];
	strcpy(input,tmp); //copies a malicious string into the character buffer

    std::cout << "Dipendente segnato correttamente! \n";
    
    std::cout << "Exiting...\n\n";
    usleep(1000000);
}

int main(int argc, char* argv[]) {
	if (argc != 2) { //error message if run improperly
		std::cout << "Per usare l'applicativo e segnalare la presenza del diependente,\nè necessario far partire il programma ./segna_presenze seguito dalla matricola del dipendente. \nUn esempio potrebbe essere ./segna_presenze 19384532\n\n";
		return 1;
	}

	vulnerable(argv[1]); //passes our input to the vulnerable function
	return 0;
}