using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Project_2
{
    public interface IGenericRepository<T>
    {
        int Add(T item);
        T Get(int id);
    }
}
