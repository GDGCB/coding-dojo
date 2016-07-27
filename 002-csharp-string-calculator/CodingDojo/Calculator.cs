using System;
using System.Text.RegularExpressions;

namespace CodingDojo
{
    public class Calculator
    {
        public int Add(string numbers)
        {
            if (string.IsNullOrEmpty(numbers))
            {
                return 0;
            }

            string delimiter = "";
            if (numbers.StartsWith("//"))
            {
                delimiter = FindDelimiter(ref numbers);
            }

            if (numbers.EndsWith(",\n"))
            {
                throw new NotSupportedException();
            }
 
            // int sum = fragments.Sum(int.Parse);

            int sum = 0;
            foreach (string fragment in ExtractNumbers(numbers, delimiter))
            {
                int number;
                if (int.TryParse(fragment, out number))
                {
                    sum += number;
                }
            }

            return sum;
        }

        private static string FindDelimiter(ref string numbers)
        {
            string delimiter = "";
            for (int i = 2, n = numbers.Length; i < n; i++)
            {
                char ch = numbers[i];
                if (ch == '\n')
                {
                    numbers = numbers.Substring(0, i + 1);
                    break;
                }
                delimiter += ch;
            }
            return delimiter;
        }


        public string[] ExtractNumbers(string numbers, string delimiter)
        {
            if (string.IsNullOrEmpty(delimiter))
            {
                delimiter = ",";
            }

            string[] fragments = Regex.Split(numbers, delimiter + "|\n");

            return fragments;
        }
    }
}