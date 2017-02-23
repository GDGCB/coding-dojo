using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Project_4
{
    class Person : Entity
    {
        private int Money;
        public List<Car> Cars { get; set; }

        public Person(int money)
        {
            Money = money;
        }

        private bool CanBuyCar(Car car)
        {
            return Money >= car.Price;
        }

        public void PurchaseCar(Car car)
        {
            if (CanBuyCar(car))
            {
                Money -= car.Price;
                Cars.Add(car);
                // F A I L ?
                Update();
            }
        }
    }
}


