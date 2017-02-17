# -*- coding: utf-8 -*-
class Reservations:

    def available(self, already_booked, interval):
        if interval in already_booked:
            return False
        for item in already_booked:
            if item[0] <= interval[0] < item[1] or item[0] < interval[1] <= item[1]:
                return False
            if interval[0] < item[0] and interval[1] > item[1]:
                return False
        return True

    def available_court(self, already_booked, interval, max_courts=5):
        """
        Vstupem je pole rezervací. Rezervace je čtveřice obsahující začátek a konec (půl hodiny)
        a číslo prvního až posledního zarezervovaného kurtu.
        Např.: [(10, 12, 1, 1), (10, 12, 2, 3), (13, 18, 1, 1), (12, 14, 2, 2), (18, 20, 1, 3)]
        znamená, že od 10. do 12. půlhodiny jsou dvě rezervace, jedna na kurt č. 1 a druhá
        na kurty 2 a 3. Od 12. do 14. půlhodiny je zarezervován kurt 2, a 14. půlhodinu i kurt 1,
        který je obsazen od 13. do 18 půlhodiny. Mezi 18. až 20. půlhodinou jsou obsazené všechny 3 kurty.

        Napište funkci, která dostane pole rezervací a časový interval a vrátí počet volných
        kurtů v tomto intervalu.
        """
        super_data = []
        for item in already_booked:
            data = [item] * (item[3] - item[2] + 1)
            super_data.extend(data)

        if self.check_single_tuple(super_data, interval):
            max_courts -= 1
        return max_courts

    def check_single_tuple(self, already_booked, interval):
        if self.available([(item[0], item[1]) for item in already_booked], interval):
            return True
        else:
            return False


def a():
    b = (6, 7, 9)
    b[0]  # => 6
    b[1]  # => 7
    b[2]  # => 9
