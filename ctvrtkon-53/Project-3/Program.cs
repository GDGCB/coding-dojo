using System;
using System.Diagnostics;

namespace Project_3
{
    internal class Num
    {
        public int Value;
    }

    class Programa
    {
        static void Main(string[] args)
        {
            var pocet = 5000;
            var shuffled = 1000;
            var prototyp = new int[pocet];
            var shakeArray = new Num[shuffled, 5000];
            var asNum = new Num[pocet];
            var asNumNoShuffle = new Num[pocet];
            Random randNum = new Random();

            // incializace 
            for (int i = 0; i < pocet; i++)
            {
                for (int j = 0; j < shuffled; j++)
                {
                    shakeArray[j, i] = new Num();
                }
            }

            var asArray = new int[pocet];

            // prekopirovani do asCislo
            for (int i = 0; i < pocet; i++)
            {
                asNum[i] = shakeArray[0, i];
            }


            // no shuffle
            for (int i = 0; i < pocet; i++)
            {
                asNumNoShuffle[i] = new Num();
            }


            Action<int[]> vyplneni = delegate (int[] pole)
            {
                for (int i = 0; i < pocet; i++)
                {
                    pole[i] = randNum.Next();
                }
            };

            Action<int[]> selectSort = delegate (int[] arr)
            {
                for (int i = 0; i < arr.Length - 1; i++)
                {
                    int maxIndex = i;
                    for (int j = i + 1; j < arr.Length; j++)
                    {
                        if (arr[j] > arr[maxIndex]) maxIndex = j;
                    }

                    int tmp = arr[i];
                    arr[i] = arr[maxIndex];
                    arr[maxIndex] = tmp;
                }
            };


            Action<Num[]> selectSortCislo = delegate (Num[] arr)
            {
                for (int i = 0; i < arr.Length - 1; i++)
                {
                    int maxIndex = i;
                    for (int j = i + 1; j < arr.Length; j++)
                    {
                        if (arr[j].Value > arr[maxIndex].Value) maxIndex = j;
                    }
                    int tmp = arr[i].Value;
                    arr[i].Value = arr[maxIndex].Value;
                    arr[maxIndex].Value = tmp;
                }
            };


            Action<int[], int[]> copy = delegate (int[] old, int[] newArray)
            {
                for (int i = 0; i < pocet; i++)
                {
                    newArray[i] = old[i];
                }
            };

            Action<int[], Num[]> copyToCislo = delegate (int[] array, Num[] cisloArray)
            {
                for (int i = 0; i < pocet; i++)
                {
                    cisloArray[i].Value = array[i];
                }
            };

            vyplneni(prototyp);
            copy(prototyp, asArray);
            copyToCislo(prototyp, asNum);
            copyToCislo(prototyp, asNumNoShuffle);

           

            Stopwatch sw1 = new Stopwatch();
            sw1.Start();
            selectSort(asArray);
            sw1.Stop();
            Console.Write($"\n\nDoba jako pole: {sw1.Elapsed}");


            Stopwatch sw2 = new Stopwatch();
            sw2.Start();
            selectSortCislo(asNum);
            sw2.Stop();
            Console.Write($"\n\nDoba jako NUM - SHUFFLE: {sw2.Elapsed}");

            Stopwatch sw3 = new Stopwatch();
            sw3.Start();
            selectSortCislo(asNumNoShuffle);
            sw3.Stop();
            Console.Write($"\n\nDoba jako NUM NO SHUFFLE: {sw3.Elapsed}");

            

            Console.ReadKey();
        }
    }
}