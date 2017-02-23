using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Project_2
{
    class Program
    {
        private IGenericRepository<Person> repo; 
        public Program(IGenericRepository<Person> repo)
        {
            this.repo = repo;
        }

        void Main(string[] args)
        {
            //using (var uow = new FakeUOW())
            //{
            //    var person = repo.Get(new Guid());
            //    var cars = person.Cars;
            //}


        }
    }
}
