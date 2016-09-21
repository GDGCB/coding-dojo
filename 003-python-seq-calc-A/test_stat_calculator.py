from unittest import TestCase

from stat_calculator import StatCalculator


class TestStatCalculator(TestCase):

    def setUp(self):
        self.calculator = StatCalculator()
        self.data = [6, 9, 15, -2, 92, 11]

    def test_min(self):
        minimal = self.calculator.get_minimum(self.data)
        self.assertEqual(-2, minimal)

    def test_max(self):
        maximum = self.calculator.get_maximum(self.data)
        self.assertEqual(92, maximum)

    def test_count(self):
        count = self.calculator.get_count(self.data)
        self.assertEqual(6, count)

    def test_average(self):
        average = self.calculator.get_average(self.data)
        self.assertAlmostEqual(21.833, average, places=3)

    def test_sum(self):
        sum = self.calculator.get_sum(self.data)
        self.assertEqual(131, sum)

    def test_median(self):
        median = self.calculator.get_median(self.data)
        self.assertEqual(10, median)

    def test_median2(self):
        data = self.data
        data.append(0)
        median = self.calculator.get_median(data)
        self.assertEqual(9, median)

    def test_median3(self):
        data = self.data
        data.append(100)
        median = self.calculator.get_median(data)
        self.assertEqual(11, median)


    def test_median4(self):
        data = self.data
        data.extend([10, 12])
        median = self.calculator.get_median(data)
        self.assertEqual(10.5, median)
