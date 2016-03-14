Notatki


Repozytoria
Przecież żaden ekspert domenowy nie mówi "no i na końcu jak już coś zrobimy to jeszcze aktualizujemy stan", to czynność sama w sobie prowadzi do aktualizacji stanu, nie dodatkowa operacja aktualizacji.



Warstwa domeny nie powinna byc swiadomo detali technicznych takich jak persystencja




DDD to event source , bdd ,


Problem powstaje przy implementacji aggregatu. Jedna z operacji w agregacji jest uruchomienie metody repozystorium.
Niestety zeby to zrobic trzeba miec implementacje tego obiektu.