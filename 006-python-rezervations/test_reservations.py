from unittest import TestCase

from reservations import Reservations


class TestReservations(TestCase):

    def setUp(self):
        self.ts = Reservations()

    def test_is_available(self):
        self.assertTrue(self.ts.available([(11, 12)], (10, 11)))
        self.assertFalse(self.ts.available([(10, 11)], (10, 11)))
        self.assertTrue(self.ts.available([(13, 14)], (14, 15)))
        self.assertFalse(self.ts.available([(13, 14), (14, 15)], (14, 16)))
        self.assertFalse(self.ts.available([(13, 14), (14, 15)], (12, 14)))
        self.assertFalse(self.ts.available([(13, 14), (15, 16)], (14, 17)))

    def test_is_available_courts(self):
        """
        <!-- -->  fi ff fff .. ... = == != <> -> --> === !== <=> <= >= @
        """
        self.assertEqual(4, self.ts.available_court([(11, 12, 1, 1)], (11, 12)))
        self.assertEqual(3, self.ts.available_court([(11, 12, 1, 2)], (11, 12)))
