# -*- coding: utf-8 -*-
from collections import defaultdict
class StatCalculator(object):

    def median(self, data):
        new_list = sorted(data)
        if len(new_list) % 2 > 0:
            return new_list[len(new_list) / 2]
        elif len(new_list) % 2 == 0:
            return (new_list[(len(new_list) / 2)] + new_list[(len(new_list) / 2) - 1]) / 2.0

    def is_odd(self, number):
        return number % 2 == 0

    def is_even(self, number):
        return number % 2 != 0

    def calc(self, sequence, remove_duplicates=False, remove_odd_numbers=False, remove_even_numbers=False, remove_minmal_and_maximal_numbers=False):
        if remove_minmal_and_maximal_numbers:
            sequence = sorted(sequence)[1:-1]

        if remove_duplicates:
            sequence = list(set(sequence))

        if remove_odd_numbers:
            sequence = [i for i in sequence if self.is_even(i)]

        if remove_even_numbers:
            sequence = filter(self.is_odd, sequence)

        if len(sequence) is 0:
            return {
                "min": None,
                "max": None,
                "count": None,
                "average": None,
                "sum": None,
                "median": None,
            }

        return {
            "min":min(sequence),
            "max": max(sequence),
            "count": len( sequence),
            "average": sum(sequence) / float(len(sequence)),
            "sum": sum(sequence),
            "median": self.median(sequence)
        }