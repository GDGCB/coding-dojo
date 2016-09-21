# -*- coding: utf-8 -*-


class StatCalculator(object):
    def get_minimum(self, sequence):
        return min(sequence)

    def get_maximum(self, sequence):
        return max(sequence)

    def get_count(self, sequence):
        return len(sequence)

    def get_average(self, sequence):
        return sum(sequence) / float(len(sequence))

    def get_sum(self, sequence):
        return sum(sequence)

    def get_median(self, sequence):
        sequence = sorted(sequence, reverse=True)
        size = self.get_count(sequence)
        if len(sequence) % 2 == 1:
            return sequence[size / 2]

        vals = sequence[int(size / 2) - 1: int(size / 2) + 1]
        return self.get_average(vals)
