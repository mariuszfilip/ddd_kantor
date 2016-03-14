Feature: jako klient mam mozliwosc dodania nowego konta bankowego


  Scenario: Prawidlowe dodanie numeru konta przez klienta
   Given jestem klientem
    When  uzpelniam numer konta bankowego ,walute konta
    Then system przypisuje numer konta bankowego do klienta