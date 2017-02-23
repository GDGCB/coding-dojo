using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Project_1
{
    public class Person
    {
        private static List<Person> _data; 
        public string Name { get; set; }
        public string LastName { get; set; }
        public int Age { get; set; }

        static public List<Person> Data => _data ?? (_data = new List<Person>
        {
            new Person(),
            new Person(),
            new Person()
        });
    }
}
