from unittest import TestCase

from stat_calculator import StatCalculator


class TestStatCalculator(TestCase):

    def setUp(self):
        self.calculator = StatCalculator()

    def test_calc(self):
        self.assertEqual(1, 1)

    def test_minimum(self):
        self.assertEqual( self.calculator.calc([6, 9, 15, -2, 92, 11])["min"], -2 )
        self.assertEqual( self.calculator.calc([6, 9, 15, -3, 92, 11])["min"], -3 )

    def test_maximum(self):
        self.assertEqual( self.calculator.calc([6, 9, 15, -2, 92, 11])["max"], 92 )
        self.assertEqual( self.calculator.calc([6, 9, 15, -3, 93, 11])["max"], 93 )

    def test_number_of_elements(self):
        self.assertEqual( self.calculator.calc([6, 9, 15, -2, 92, 11])["count"], 6 )

    def test_average_value(self):
        self.assertEqual( self.calculator.calc([6, 9, 15, -2, 92, 11])["average"], 21.833333333333332 )
        self.assertEqual( self.calculator.calc([])["average"], None )

    def test_sum(self):
        self.assertEqual( self.calculator.calc([6, 9, 15, -2, 92, 11])["sum"], 131 )

    def test_median(self):
        self.assertEqual(self.calculator.calc([6, 9, 15, -2, 92, 11])["median"], 10)

    def test_removeDuplicates(self):
        self.assertEqual(self.calculator.calc([6, 9, 15, -2, 92, 11, 11], True)["median"], 10)

    def test_remove_odd_numbers(self):
        self.assertEqual(self.calculator.calc([1,2,3], remove_odd_numbers=True)["sum"], 4)

    def test_remove_even_numbers(self):
        self.assertEqual(self.calculator.calc([1,2,3], remove_even_numbers=True)["sum"], 2)

    def test_remove_minmal_and_maximal_numbers(self):
        self.assertEqual(self.calculator.calc([6, 9, 15, -2, 92, 11, 11], remove_minmal_and_maximal_numbers=True)["sum"], 52)



