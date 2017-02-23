using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Remoting.Messaging;
using System.Text;
using System.Threading.Tasks;

namespace Project_1
{
    class Program
    {
        static void Main(string[] args)
        {
            var data = Person.Data;

            var result = data
                .Where(person => person.Name == "Johny"  && person.Age > 15)
                .OrderByDescending(person => person.Age)
                .Take(10)
                .Select(x => x.Age)
                .Aggregate((acc, age) => acc + age);


            var tempList = new List<Person>();
            var totall = 0;
            foreach (Person person in data)
            {
                if (person.Name == "Pepa" && person.Age > 15)
                {
                    tempList.Add(person);
                    totall++;
                }

                if (totall == 10) break;
            }

            // vypomoc
            data.Sort((person, person1) =>
            person.Age == person1.Age ? 0 :
              person.Age < person1.Age ? 1 : -1
            );

            var result2 = 0;
            foreach (Person person in tempList)
            {
                result2 += person.Age;
            }











        }
    }
}
