Feature: rejestracja klienta
  aby miec wszystkie dostepne funkcjonalnosci
  jako nowy klient mam mozliwosc zarejestrowania sie w portalu


 Scenario:
    Given nie posiadam konta w systemie
    When  system dodaje klienta
    Then zostaje zarejestowany w systemie i posiadam swoj idenytfikator