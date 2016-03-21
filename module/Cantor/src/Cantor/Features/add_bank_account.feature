Feature: dodanie nowego konta bankowego
  aby nie wpisywac za kazdym razem numeru konta bankowego
  chce jako klient miec mozliwosc dodawnia w systemie konta bankowego


  Scenario: Prawidlowe dodanie numeru konta przez klienta
   Given jestem klientem
    When  uzpelniam numer konta bankowego ,walute konta
    Then system przypisuje numer konta bankowego do klienta